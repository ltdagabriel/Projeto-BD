<?php
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();

require_once("Conexao.php");
require_once("classes/Entidades/personagem.php");
class personagemDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

   
    public function cadastrar(personagem $EntPersonagem) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO personagem VALUE (:nome, :foto)");
            $param = array(
                ":nome" => $EntPersonagem->get_nome(),
                ":foto" => $EntPersonagem->get_foto()             
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha no cadastro de personagem: {$ex->getMessage()} ";
        }
    }
    public function Retorna_Todos($nome){
        try {
            $stmt = $this->pdo->prepare("SELECT nome, foto FROM personagem WHERE :nome = nome");
            $param = array(
                ":nome" => $nome               
            );
            $stmt->execute($param);
            return $stmt;
        } catch (PDOException $ex) {
            echo " Falha ao retornar todos os personagens : {$ex->getMessage()} \n";
        }
    }

    public function atualizar(personagem $EntPersonagem, $nome) {
        $foto = $EntPersonagem->get_foto();

        try {
            $stmt = $this->pdo->prepare("UPDATE personagem SET foto = :foto WHERE foto = :foto");
            $param = array(
                ":nome" => $nome,
                ":foto" => $foto
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha na atualização do personagem : {$ex->getMessage()} ";
        }

    }
}

?>