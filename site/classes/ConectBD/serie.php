<?php

require_once("Conexao.php");

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
            $stmt = $this->pdo->prepare("SELECT titulo,sinopse,foto,Faixa_Etaria_Idade,data_lancamento FROM serie,obra WHERE titulo = obra_titulo and data_lancamento = obra_data order by data_adicionado and hora_adicionado desc");
            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo " Falha ao Retornar todos os Seriados : {$ex->getMessage()} \n";
        }
    }

}

?>