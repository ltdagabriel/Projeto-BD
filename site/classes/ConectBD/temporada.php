<?php
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();

require_once("Conexao.php");
require_once($map->Entidade_Episodio());
class temporadaDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

   
    public function cadastrar(temporada $enttemporada) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO temporada VALUE (:trailer,:foto,:numero,:obra_titulo,:obra_data)");
            $param = array(
                ":trailer" => $enttemporada->get_trailer(),
                ":foto" => $enttemporada->get_foto(),
                ":numero" => $enttemporada->get_numero(),                
                ":obra_titulo" => $enttemporada->get_titulo(),                
                ":obra_data" => $enttemporada->get_data()
                                    
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha na inserção do episodio : {$ex->getMessage()} ";
        }
    }
    public function Retorna_Todos($titulo_obra,$obra_data){
        try {
            $stmt = $this->pdo->prepare("SELECT trailer,foto,numero FROM temporada WHERE :titulo = obra_titulo and obra_data=:data");
            $param = array(
                ":titulo" => $titulo_obra,
                ":data" => $obra_data               
            );
            $stmt->execute($param);
            return $stmt;
        } catch (PDOException $ex) {
            echo " Falha ao Retornar todos os Episodios : {$ex->getMessage()} \n";
        }
    }

}

?>