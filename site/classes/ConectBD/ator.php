<?php
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();

require_once("Conexao.php");
require_once($map->Entidade_Filme());
class EpisodioDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function consultar($nome) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM ator WHERE nome=:nome");
            $param = array(
                ":nome" => $nome
                );


            $stmt->execute($param);

            return ($stmt->rowCount() > 0);
        } catch (PDOException $ex) {
            echo "Falha na consulta: {$ex->getMessage()} \n";
        }
    }

}

?>