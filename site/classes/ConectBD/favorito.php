<?php

require_once("Conexao.php");


class favoritaDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    public function cadastrar() {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO favorita VALUE (:user,:titulo,:data)");
            $param = array(
                ":user" => $_SESSION['user'],
                ":titulo" => $_SESSION['titulo'],
                ":data" => $_SESSION['data']               
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha na inserção do episodio : {$ex->getMessage()} ";
        }
    }
    public function remover() {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM favorita WHERE usuario_login= :user and obra_titulo= :titulo and obra_data=:data");
            $param = array(
                ":user" => $_SESSION['user'],
                ":titulo" => $_SESSION['titulo'],
                ":data" => $_SESSION['data']               
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha na inserção do episodio : {$ex->getMessage()} ";
        }
    }

    function consultar() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM favorita WHERE usuario_login=:user and obra_titulo= :titulo and obra_data= :data");
            $param = array(
                ":user" => $_SESSION['user'],
                ":titulo" => $_SESSION['titulo'],
                ":data" => $_SESSION['data']               
            );


            $stmt->execute($param);
            if(($stmt->rowCount() > 0)){
            return true;    
            }
            else {
                return false;
            }
        } catch (PDOException $ex) {
            echo "Falha na consulta: {$ex->getMessage()} \n";
        }
    }
    

}

?>