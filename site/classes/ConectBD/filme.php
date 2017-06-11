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
    function Retorna_Todos(){
        try {
            $stmt = $this->pdo->prepare("SELECT titulo,sinopse,foto,Faixa_Etaria_Idade,data_lancamento,trailer FROM filme,obra WHERE titulo = obra_titulo and data_lancamento = obra_data order by data_adicionado and hora_adicionado desc");
            $stmt->execute();
            return $stmt;
        } catch (PDOException $ex) {
            echo " Falha ao Retornar todos os Filmes : {$ex->getMessage()} \n";
        }
    }

}

?>