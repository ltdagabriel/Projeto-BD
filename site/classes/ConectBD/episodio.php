<?php
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();

require_once("Conexao.php");
require_once($map->Entidade_Episodio());
class episodioDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

   
    public function cadastrar(episodio $EntEpisodio) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO episodio VALUE (:nome, :numero, :sinopse, :video, :data_lancamento, :obra_titulo, :obra_data, :temporada_numero)");
            $param = array(
                ":nome" => $EntEpisodio->get_nome(),
                ":numero" => $EntEpisodio->get_numero(),
                ":sinopse" => $EntEpisodio->get_sinopse(),                
                ":video" => $EntEpisodio->get_video(),
                ":data_lancamento" => $EntEpisodio->get_data_lancamento(),                
                ":obra_titulo" => $EntEpisodio->get_obra_titulo(),                
                ":obra_titulo" => date("Y/m/d"),                
                ":obra_data" => $EntEpisodio->get_obra_data(),                
                ":temporada_numero" => $EntEpisodio->temporada_numero()                
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha na inserção do episodio : {$ex->getMessage()} ";
        }
    }
    public function Retorna_Todos($titulo_obra,$temp_numero){
        try {
            $stmt = $this->pdo->prepare("SELECT nome,numero,sinopse,video,foto FROM filme,obra WHERE :titulo = obra_titulo :temp_numero = temporada_numero");
            $param = array(
                ":titulo" => $titulo_obra,
                ":temp_numero" => $temp_numero               
            );
            $stmt->execute($param);
            return $stmt;
        } catch (PDOException $ex) {
            echo " Falha ao Retornar todos os Episodios : {$ex->getMessage()} \n";
        }
    }

    public function atualizar(episodio $EntEpisodio, $obra_titulo, $obra_data, $temporada_numero, $numero) {
        $nome = $EntEpisodio->get_nome();
        $sinopse = $EntEpisodio->get_sinopse();
        $video = $EntEpisodio->get_video();
        $data_lancamento = $EntEpisodio->get_data_lancamento();

        try {
            $stmt = $this->pdo->prepare("UPDATE episodio SET nome= :nome, sinopse = :sinopse, video = :video, data_lancamento =:data_lancamento WHERE obra_titulo = :obra_titulo and obra_data = :obra_data and temporada_numero = :temporada_numero and numero = :numero");
            $param = array(
                ":obra_data" => $obra_data,
                ":obra_titulo" => $obra_titulo,
                ":temporada_numero" => $temporada_numero,                
                ":numero" => $numero,                
                ":nome" => $nome,                
                ":sinopse" => $sinopse,                
                ":video" => $video,                
                ":data_lancamento" => $data_lancamento             
            );

            return $stmt->execute($param);
        } catch (PDOException $ex) {
            echo " Falha na atualização do episodio : {$ex->getMessage()} ";
        }

    }
}

?>