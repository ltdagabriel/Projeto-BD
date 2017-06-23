<?php
$episodioDAO = new episodioDAO();
$episodio=new episodio();
$epi=$episodioDAO->Get($_SESSION['titulo'],$numero_temporada,$numero);
$epi=$epi->fetch(PDO::FETCH_ASSOC);
$nome2=$epi['nome'];
$sinopse2=$epi['sinopse'];
$video2=$epi['video'];
$data2=$epi['datta'];
if(isset($_GET['nome3'])){
    $nome2=$_GET['nome3'];
}
if(isset($_GET['sinopse3'])){
    $sinopse2=$_GET['sinopse3'];
}
if(isset($_GET['video3'])){
    $video2=$_GET['video3'];
}
if(isset($_GET['data3'])){
    $data2=$_GET['data3'];
}
?>

<form id="alterar" name="alterar" method="get">

    <div class="form-group">
        <label for="exampleInputLink2">Nome</label>
        <input  value="<?php echo $nome2;?>" name="nome3" type="text" class="form-control" id="exampleInputName2">
    </div>

    <div class="form-group">
        <label for="exampleInputName2">Sinopse</label>
        <textarea  name="sinopse3" class="form-control" rows="3"><?php echo $sinopse2;?></textarea>
    </div>

    <div class="form-group">
            <label for="exampleInputLink2">Video</label>
            <input value="<?php echo $video2;?>" name="video3" type="url" class="form-control" id="exampleInputName2" placeholder="http://linkdovideo.com">

    </div>

     <div class="form-group">
            <label for="exampleInputData2">Data de Lancamento</label>
            <input value="<?php echo $data2;?>" name="data3" type="date" class="form-control" id="exampleInputName2">
    </div>


    <div class="form-inline">
            <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="alterar_episodio" type="submit" class="btn btn-default">Atualizar</button>
                    </div>
            </div>
            
            <div class="form-group">
            <span class="style1" style="color:red">* Campos com * s&atilde;o obrigat&oacute;rios!          </span>
            </div>
    </div>
</form>


<?php
if (isset($_GET['alterar_episodio'])) {
    
    $episodio->set_nome($_GET['nome3']);
    $episodio->set_sinopse($_GET['sinopse3']);
    $episodio->set_video($_GET['video3']);
    $episodio->set_data_lancamento($_GET['data3']);
    

   
        $x=$episodioDAO->atualizar($episodio,$_SESSION['titulo'],$_SESSION['data'],$numero_temporada,$numero);
        if($x){
            ?>
            <script language='javascript' type='text/javascript'>
                alert('Alterado com sucesso');window.location.href='read_update_obra.php';
            </script>
            <?php
        }
            
        
        else{
        ?>
            <script language='javascript' type='text/javascript'>
                alert('Falhou!!');
            </script>";
        <?php
        }
    
}
?>
