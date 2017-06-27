<form id="cadastro" name="cadastro" method="get">
    <div class="form-group ">
        <textarea name="texto" type="fieldtext" class="form-control" placeholder=".col-xs-10" rows="3"> </textarea>
    </div> 
    <div class="form-group">
        <div class="col-sm-offset-2 navbar-right">
          <button name="comentar" type="submit" class="btn btn-default">Enviar</button>
        </div>
    </div>
</form>


<?php
if (isset($_GET['comentar'])) {
    require_once 'classes/ConectBD/comentario.php';

    $comentarioDAO = new comentarioDAO();

    $texto = $_GET['texto'];
    $login = $_SESSION['user'];
    $datta = date("Y-m-d H:i:s");
    $obra_titulo = $_SESSION['titulo'];
    $obra_data = $_SESSION['data'];
    if ($comentarioDAO->comentar($texto, $login, $datta, $obra_titulo, $obra_data)) {
        ?>
        <script language='javascript' type='text/javascript'>
            alert('Comentado!');
        </script>
        <?php
    }     
    else{
         ?>
            <script language='javascript' type='text/javascript'>
                alert('Este comentário já foi feito!');
            </script>
        <?php
    }
}

?>
