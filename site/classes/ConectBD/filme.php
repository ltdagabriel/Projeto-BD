<?php

require_once("Conexao.php");

class filmeDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function cadastrar(filme $EntFilme) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO filme VALUE (:trailer, :titulo, :data)");
            $param = array(
                ":trailer" => $EntFilme->get_trailer(),
                ":titulo" => $EntFilme->get_titulo(),
                ":data" => $EntFilme->get_data()                
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha na inserção de seriado : {$ex->getMessage()} \n";
        }
    }

}

?>