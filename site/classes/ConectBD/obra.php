<?php

require_once("Conexao.php");
require_once("serie.php");

    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();
require_once($map->Entidade_Obra());

class obraDAO {

    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function cadastrar(obra $entObra) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO obra VALUE (:titulo, :sinopse, :foto, :idade, :dataL, :data, :hora,:view)");
            $param = array(
                ":titulo" => $entObra->get_Titulo(),
                ":sinopse" => $entObra->get_Sinopse(),
                ":foto" => $entObra->get_Foto(),
                ":idade" => $entObra->get_FEtaria(),
                ":dataL" => $entObra->get_DataLancamento(),
                ":data" => date("Y/m/d"),
                ":hora" => date("h:i:s"),
                ":view" => $entObra->get_View()
            );
            
            return $stmt->execute($param);            
        } catch (PDOException $ex) {
            echo " Falha ao Cadastrar: {$ex->getMessage()} ";
        }
    }
    
    function consultartitulo($titulo,$data) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM obra WHERE titulo = :titulo and data_lancamento = :data and user_view='true' ");
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
    function delete($titulo,$data){
        try{

                $stmt = $this->pdo->prepare("UPDATE obra SET user_view='false' WHERE titulo = :titulo and data_lancamento = :data ");
                $param = array(
                        ":titulo"  => $titulo,
                        ":data"  => $data
                );

                $stmt->execute($param);

        }catch (PDOException $ex) {
            echo "Deu para apagar Não: {$ex->getMessage()}";
			return null;
        }
    }
    public function Get($titulo,$data){
        try {
            $stmt = $this->pdo->prepare("SELECT titulo,sinopse,foto,Faixa_Etaria_idade,data_lancamento,data_adicionado,hora_adicionado FROM obra WHERE titulo = :titulo and data_lancamento = :data and user_view != :view ");
            $param = array(
                ":titulo" => $titulo,
                ":view" => "false",
                ":data" => $data               
            );
            $stmt->execute($param);
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $obra= new obra();
            $obra->set_Titulo($row['titulo']);
            $obra->set_Data_Add($row['data_adicionado']);
            $obra->set_Data_Lancamento($row['data_lancamento']);
            $obra->set_FEtaria($row['Faixa_Etaria_idade']);
            $obra->set_Foto($row['foto']);
            $obra->set_Sinopse($row['sinopse']);
            $obra->set_Hora_Add($row['hora_adicionado']);
            return $obra;
        } catch (PDOException $ex) {
            echo " Falha ao Retornar obra : {$ex->getMessage()} \n";
        }
    }

        function atualizar(obra $entObra, $obra_titulo, $obra_dataLanc) {
        try {
            $sinopse = $entObra->get_Sinopse();      
            $foto = $entObra->get_Foto();
            $FEtaria = $entObra->get_FEtaria();

            $stmt = $this->pdo->prepare("UPDATE obra "
                    . "SET sinopse=:sinopse,foto = :foto,Faixa_Etaria_Idade=:faixa "
                    . "WHERE titulo = :titulo and data_lancamento = :data ");
                $param = array(
                        ":titulo"  => $obra_titulo,
                        ":sinopse"  => $sinopse,
                        ":foto"  => $foto,
                        ":faixa"  => $FEtaria,
                        ":data"  => $obra_dataLanc
                );
            
            return $stmt->execute($param);            
        } catch (PDOException $ex) {
            echo " Falha ao atualizar obra: {$ex->getMessage()} ";
        }
    }

}

?>