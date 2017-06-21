<?php

require_once("Conexao.php");

    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();
require_once($map->Entidade_Serie());

class serieDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function cadastrar(serie $EntSerie) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO serie VALUE (:status, :titulo, :data)");
            $param = array(
                ":status" => $EntSerie->get_status(),
                ":titulo" => $EntSerie->get_titulo(),
                ":data" => $EntSerie->get_data()                
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha na inserção de seriado : {$ex->getMessage()} \n";
        }
    }
    function Retorna_Todos(){
        try {
            $stmt = $this->pdo->prepare("SELECT titulo,sinopse,foto,Faixa_Etaria_Idade,data_lancamento FROM serie,obra WHERE titulo = obra_titulo and data_lancamento = obra_data and user_view != :view order by data_adicionado and hora_adicionado desc");
            $param= array(
                ":view"=>"false"
            );
            $stmt->execute($param);
            return $stmt;
        } catch (PDOException $ex) {
            echo " Falha ao Retornar todos os Seriados : {$ex->getMessage()} \n";
        }
    }
    public function Get($titulo,$data){
        try {
            $stmt = $this->pdo->prepare("SELECT stattus,obra_titulo,obra_data FROM serie WHERE obra_titulo = :titulo and obra_data = :data");
            $param = array(
                ":titulo" => $titulo,
                ":data" => $data               
            );
            $stmt->execute($param);
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            return new serie($row['stattus'],$row['obra_titulo'],$row['obra_data']);
        } catch (PDOException $ex) {
            echo " Falha ao Retornar filme : {$ex->getMessage()} \n";
        }
    }

        function atualizar(serie $EntSerie, $titulo_obra, $data_obra) {
        $status = $EntSerie->get_status();

        try {
            $stmt = $this->pdo->prepare("UPDATE serie SET status= :status WHERE obra_titulo = :titulo_obra and obra_data = :data_obra");
            $param = array(
                ":obra_data" => $data_obra,
                ":obra_titulo" => $titulo_obra,
                ":status" => $status               
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha na atualização do seriado : {$ex->getMessage()} \n";
        }
    }

}

?>