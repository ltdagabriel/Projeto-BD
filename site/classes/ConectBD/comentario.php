<?php
 require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();
require_once("Conexao.php");

class comentarioDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function comentar($texto, $login, $datta, $obra_titulo, $obra_data) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO comentario VALUE (:texto, :usuario_login, :datta, :obra_titulo, :obra_data)");
            $param = array(
                ":texto" => $texto,
                ":usuario_login" => $login,
                ":datta" => $datta,
                ":obra_titulo" => $obra_titulo,
                ":obra_data" => $obra_data
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha ao Comentar: {$ex->getMessage()} \n";
        }
    }
              

    function atualizar($texto, $obra_titulo, $obra_data, $login, $datta) {
        try {

            $stmt = $this->pdo->prepare("UPDATE comentario SET texto = :texto WHERE login = :login and datta = :datta and obra_titulo = :obra_titulo and obra_data = :obra_data");
            $param = array(
                ":texto" => $texto,
                ":login" => $login,
                ":datta" => $datta,
                ":obra_titulo" => $obra_titulo,
                ":obra_data" => $obra_data
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha ao atualizar comentario: {$ex->getMessage()} \n";
        }
    }

    function exibe_comentario($obra_titulo, $obra_data, $login){
        try {
            $stmt = $this->pdo->prepare("SELECT texto FROM comentario WHERE usuario_login = :login and obra_titulo = :obra_titulo and obra_data = :obra_data");
            $param = array(
                ":login" => $login,
                ":obra_titulo" => $obra_titulo,
                ":obra_data" => $obra_data              
            );
            $stmt->execute($param);
            return $stmt;
        } catch (PDOException $ex) {
            echo " Falha ao exibir comentarios : {$ex->getMessage()} \n";
        }
    }

}

?>