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

}

?>