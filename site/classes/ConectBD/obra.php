<?php

require_once("Conexao.php");

class obraDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function cadastrar(obra $entUsuario) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO usuario VALUE (:login, :nome, :email, :senha, :foto, :data, :hora, :ip)");
            $param = array(
                ":login" => $entUsuario->get_login(),
                ":nome" => $entUsuario->get_nome(),
                ":senha" => $entUsuario->get_senha(),
                ":foto" => $entUsuario->get_foto(),
                ":data" => date("Y/m/d"),
                ":hora" => date("h:i:s"),
                ":ip" => $_SERVER["REMOTE_ADDR"],
                ":email" => $entUsuario->get_email()
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha ao Cadastrar: {$ex->getMessage()} \n";
        }
    }
    
    function consultarUsername($us_username) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE login = :username");
            $param = array(":username" => $us_username);


            $stmt->execute($param);

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo "Falha na consulta: {$ex->getMessage()} \n";
        }
    }
    function login($us_username, $us_senha) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE  senha = :us_senha and login = :us_username");

            $param = array(
                ":us_username" => $us_username,
                ":us_senha" => $us_senha
            );


            $stmt->execute($param);

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo "ERRO 04: {$ex->getMessage()}";
        }
    }
	
	public function RetornaNome($username){
		try{
			
			$stmt = $this->pdo->prepare("SELECT nome FROM usuario WHERE login = :username");
			$param = array(
				":username"  => $username
			);
			
		 $stmt->execute($param);
			
			$dados = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $dados["nome"];
			
			
		}catch (PDOException $ex) {
            echo "ERRO 04: {$ex->getMessage()}";
			return null;
        }
	}

}

?>