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
              

    function atualizar(usuario $entUsuario, $login) {
        try {
            $nome = $entUsuario->get_nome();
            $senha = $entUsuario->get_senha();
            $foto = $entUsuario->get_foto();
            $email = $entUsuario->get_email();

            $stmt = $this->pdo->prepare("UPDATE usuario SET nome = :nome, senha = :senha, foto = :foto, email = :email WHERE login = :login");
            $param = array(
                ":login" => $login,
                ":nome" => $nome,
                ":senha" => $senha,
                ":foto" => $foto,
                ":email" => $email
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha ao atualizar dados do usuário: {$ex->getMessage()} \n";
        }
    }

}

?>