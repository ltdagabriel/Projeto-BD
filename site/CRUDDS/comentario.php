<form id="cadastro" name="cadastro" method="get">
    
    <div class="form-group">
            <label for="exampleInputLink2">Comentário</label>
            <textarea name="texto" type="fieldtext" class="form-control" id="exampleInputName2"> </textarea>
    </div>

    <div class="form-inline">
            <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="comentar" type="submit" class="btn btn-default">Enviar</button>
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
if (isset($_GET['comentar'])) {
    require_once 'classes/ConectBD/comentario.php';

    $comentarioDAO = new comentarioDAO();

    $texto = $_GET['texto'];
    $login = $_SESSION['user'];
    $datta = date("Y/m/d").date("h:i:s");
    $obra_titulo = $_SESSION['titulo'];
    $obra_data = $_SESSION['data'];
    if ($comentarioDAO->comentar($texto, $login, $datta, $obra_titulo, $obra_data)) {
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
