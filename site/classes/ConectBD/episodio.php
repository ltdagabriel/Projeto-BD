<?php
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();

require_once("Conexao.php");
require_once($map->Entidade_Filme());
class EpisodioDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

   
    public function Retorna_Todos($titulo_obra,$temp_numero){
        try {
            $stmt = $this->pdo->prepare("SELECT nome,numero,sinopse,video,foto FROM filme,obra WHERE :titulo = obra_titulo :temp_numero = temporada_numero");
            $param = array(
                ":titulo" => $titulo_obra,
                ":temp_numero" => $temp_numero               
            );
            $stmt->execute($param);
            return $stmt;
        } catch (PDOException $ex) {
            echo " Falha ao Retornar todos os Episodios : {$ex->getMessage()} \n";
        }
    }

}

?>