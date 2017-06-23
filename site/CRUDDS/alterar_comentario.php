<?php 
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();
require_once ($map->Conect_Comentario());

?>
<form id="alterar" name="alterar" method="post">
    <div class="form-group">
            <label for="exampleInputName2">Comentário</label>
            <textarea   name="comentario" class="form-control" rows="3"><?php echo $comentario ?></textarea>
    </div>


    <div class="form-inline">
            <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="alterar_comentario" type="submit" class="btn btn-default">Alterar</button>
                    </div>
            </div>
            
            <div class="form-group">
            <span class="style1" style="color:red">* Campos com * s&atilde;o obrigat&oacute;rios!          </span>
            </div>
    </div>
</form>


<?php
if (isset($_POST['alterar_comentario'])) {
    $comentarioDAO = new comentarioDAO();
    
    $texto = $_POST['comentario'];


    
   
$y=$comentarioDAO->alterar_comentario($texto, $_SESSION['titulo'], $_SESSION['data'], $_SESSION['user'], $data);
    if($y){
        ?>
        <script language='javascript' type='text/javascript'>
            alert('Comentário alterado!');window.location.href='read_update_obra.php';
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
}
?>
