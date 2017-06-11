<?php

require_once("Conexao.php");
require_once("serie.php");
require_once("filme.php");

class obraDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function cadastrar(obra $entObra) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO obra VALUE (:titulo, :sinopse, :foto, :idade, :dataL, :data, :hora)");
            $param = array(
                ":titulo" => $entObra->get_Titulo(),
                ":sinopse" => $entObra->get_Sinopse(),
                ":foto" => $entObra->get_Foto(),
                ":idade" => $entObra->get_FEtaria(),
                ":dataL" => $entObra->get_DataLancamento(),
                ":data" => date("Y/m/d"),
                ":hora" => date("h:i:s")
            );
            
            $stmt->execute($param);
            if($entObra->isSerie()){
                $seriado=new serieDAO();
                return $seriado->cadastrar($entObra->get_Obra());
            }
            if($entObra->isFilme()){
                $filme= new filmeDAO();
                return $filme->cadastrar($entObra->get_Obra());
            }
            
        } catch (PDOException $ex) {
            echo " Falha ao Cadastrar: {$ex->getMessage()} ";
        }
    }
    
    function consultartitulo($titulo,$data) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM obra WHERE titulo = :titulo and data_lancamento = :data");
            $param = array(
                ":titulo" => $titulo,
                ":data" => $data,
                );


            $stmt->execute($param);

            return ($stmt->rowCount() > 0);
        } catch (PDOException $ex) {
            echo "Falha na consulta: {$ex->getMessage()} \n";
        }
    }
	
    public function isSerie($titulo){
        try{

                $stmt = $this->pdo->prepare("SELECT * FROM obra,serie WHERE  titulo = :titulo and titulo = obra_titulo");
                $param = array(
                        ":titulo"  => $titulo
                );

                $stmt->execute($param);

                
                return ($stmt->rowCount() > 0);


        }catch (PDOException $ex) {
            echo "ERRO 04: {$ex->getMessage()}";
			return null;
        }
    }
    public function isFilme($titulo){
        try{

                $stmt = $this->pdo->prepare("SELECT * FROM obra,filme WHERE  titulo = :titulo and titulo = obra_titulo");
                $param = array(
                        ":titulo"  => $titulo
                );

                $stmt->execute($param);

                
                return ($stmt->rowCount() > 0);


        }catch (PDOException $ex) {
            echo "ERRO 04: {$ex->getMessage()}";
			return null;
        }
    }

}

?>