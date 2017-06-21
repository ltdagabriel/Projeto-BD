<?php
$numero="";
$trailer="";
$foto="";
if(isset($_GET['numero'])){
    $numero=$_GET['numero'];
}
if(isset($_GET['trailer'])){
    $trailer=$_GET['trailer'];
}
if(isset($_GET['foto'])){
    $foto=$_GET['foto'];
}
?>
<form id="cadastro" name="cadastro" method="get">
        <div class="form-group">
            <label for="exampleInputName2">Numero: <a style="color:red">*</a></label>
            <input name="numero" value="<?php echo $numero;?>"type="text" class="form-control" id="exampleInputName2" placeholder="Numero">
    </div>

    <div class="form-group">
            <label for="exampleInputLink2">Trailer</label>
            <input name="trailer" value="<?php echo $trailer; ?>" type="url" class="form-control" id="exampleInputName2" placeholder="youtube.com/algumacoisaaqui">
    </div>

    <div class="form-group">
            <label for="exampleInputName2">Foto: </label>
            <input name="foto" value="<?php echo $foto;?>" type="url" class="form-control" id="foto" placeholder="http://pinterest... .jpg/png">
    </div>

    <div class="form-inline">
            <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="cadastrar_temporada" type="submit" class="btn btn-default">Enviar</button>
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
if (isset($_GET['cadastrar_temporada'])) {
    require_once 'classes/Entidades/temporada.php';
    require_once 'classes/ConectBD/temporada.php';
    $temporadaDAO = new temporadaDAO();
    $temporada = new temporada();
    $temporada->set_numero($_GET['numero']);
    $temporada->set_foto($_GET['foto']);
    $temporada->set_trailer($_GET['trailer']);
    $temporada->set_titulo($_SESSION['titulo']);
    $temporada->set_data($_SESSION['data']);
    if ($temporadaDAO->cadastrar($temporada)) {
        ?>
        <script language='javascript' type='text/javascript'>
            alert('Cadastrado com sucesso');
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
