<?php
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();

require_once("Conexao.php");
require_once($map->Entidade_Filme());
class filmeDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    public function cadastrar(filme $EntFilme) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO filme VALUE (:trailer, :titulo, :data)");
            $param = array(
                ":trailer" => $EntFilme->get_trailer(),
                ":titulo" => $EntFilme->get_titulo(),
                ":data" => $EntFilme->get_data()                
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha na inserção do filme : {$ex->getMessage()} ";
        }
    }
    public function Retorna_Todos(){
        try {
            $stmt = $this->pdo->prepare("SELECT titulo,sinopse,foto,Faixa_Etaria_Idade,data_lancamento FROM filme,obra WHERE titulo = obra_titulo and data_lancamento = obra_data and user_view != :view order by data_adicionado and hora_adicionado desc");
             $param= array(
                ":view"=>"false"
            );
            $stmt->execute($param);
            return $stmt;
        } catch (PDOException $ex) {
            echo " Falha ao Retornar todos os Filmes : {$ex->getMessage()} \n";
        }
    }
    public function Get($titulo,$data){
        try {
            $stmt = $this->pdo->prepare("SELECT trailer,obra_titulo,obra_data FROM filme WHERE obra_titulo = :titulo and obra_data = :data");
            $param = array(
                ":titulo" => $titulo,
                ":data" => $data               
            );
            $stmt->execute($param);
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            return new filme($row['trailer'],$row['obra_titulo'],$row['obra_data']);
        } catch (PDOException $ex) {
            echo " Falha ao Retornar filme : {$ex->getMessage()} \n";
        }
    }
    
        public function atualizar(filme $EntFilme, $titulo_obra, $data_obra) {
        $trailer = $EntFilme->get_trailer();

        try {
            $stmt = $this->pdo->prepare("UPDATE filme "
                        . "SET trailer= :trailer "
                        . "WHERE obra_titulo = :obra_titulo and obra_data = :obra_data ");
            $param = array(
                ":obra_data" => $data_obra,
                ":obra_titulo" => $titulo_obra,
                ":trailer" => $trailer                
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha na atualização do filme : {$ex->getMessage()} ";
        }
    }  

}

?>