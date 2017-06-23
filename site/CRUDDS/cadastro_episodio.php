<?php
$nome2="";
$numero2="";
$sinopse2="";
$video2="";
$data2="";
if(isset($_GET['numero2'])){
    $numero2=$_GET['numero2'];
}
if(isset($_GET['nome2'])){
    $nome2=$_GET['nome2'];
}
if(isset($_GET['sinopse2'])){
    $sinopse2=$_GET['sinopse2'];
}
if(isset($_GET['video2'])){
    $video2=$_GET['video2'];
}
if(isset($_GET['data2'])){
    $data2=$_GET['data2'];
}
?>
<form id="cadastro" name="cadastro" method="get">
    <div class="form-group">
            <label for="exampleInputName2">Titulo:</label>
            <input name="nome2" value="<?php echo $nome2;?>" type="text" class="form-control" id="exampleInputName2" placeholder="Nome do Episodio">
    </div>
    <div class="form-group">
            <label for="exampleInputName2">Numero: <a style="color:red">*</a></label>
            <input name="numero2" value="<?php echo $numero2;?>" type="text" class="form-control" id="exampleInputName2" placeholder="Numero">
    </div>
    <div class="form-group">
            <label for="exampleInputName2">Sinopse</label>
            <textarea name="sinopse2" class="form-control" rows="3"><?php echo $sinopse2;?></textarea>
    </div>

    <div class="form-group">
            <label for="exampleInputLink2">Video</label>
            <input name="video2" value="<?php echo $video2;?>" type="url" class="form-control" id="exampleInputName2" placeholder="youtube.com/algumacoisaaqui">
    </div>

    <div class="form-group">
            <label for="exampleInputData2">Data de Lancamento:</label>
            <input name="data2" value="<?php echo $data2;?>" type="date" class="form-control" id="exampleInputName2" placeholder="dia/mes/ano">
    </div>


    <div class="form-inline">
            <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="cadastrar_episodio<?php echo $temporada_numero;?>" type="submit" class="btn btn-default">Enviar</button>
                    </div>
            </div>
            <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="limpar" type="reset" class="btn btn-default">Limpar</button>
                    </div>
            </div>
            <div class="form-group">
            <span class="style1" style="color:red">* Campos com * s&atilde;o obrigat&oacute;rios!          </span>
            </div>
    </div>
</form>


<?php
if (isset($_GET['cadastrar_episodio'.$temporada_numero])) {
    $episodioDAO = new episodioDAO();
    
    $episodio = new episodio();
    $episodio->set_nome($_GET['nome2']);
    $episodio->set_obra_data($obra_data_2);
    $episodio->set_obra_titulo($obra_titulo_2);
    $episodio->set_numero($_GET['numero2']);
    $episodio->set_sinopse($_GET['sinopse2']);
    $episodio->set_data_lancamento($_GET['data2']);
    $episodio->set_temporada_numero($temporada_numero);
    $episodio->set_video($_GET['video2']);
    
    if ($episodioDAO->cadastrar($episodio)) {
        ?>
        <script language='javascript' type='text/javascript'>
            alert('Cadastrado com sucesso');window.location.href='read_update_obra.php';
        </script>
        <?php
    }     
    else{
         ?>
            <script language='javascript' type='text/javascript'>
                alert('Ja existente');
            </script>
        <?php
    }
}

?>
