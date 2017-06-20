<?php
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();

require_once("Conexao.php");
require_once($map->Conect_Ator());
require_once($map->Entidade_Ator());

class atorDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    public function cadastrar(ator $EntAtor) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO ator VALUE (:nome, :idade, :foto, :sexo, :biografia)");
            $param = array(
                ":nome" => $EntAtor->get_nome(),
                ":idade" => $EntAtor->get_numero(),
                ":foto" => $EntAtor->get_sinopse(),                
                ":sexo" => $EntAtor->get_video(),                
                ":biografia" => $EntAtor->get_data_lancamento()               
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha na inserção do episodio : {$ex->getMessage()} ";
        }
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