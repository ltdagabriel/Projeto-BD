<?php 
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();
require_once ($map->Conect_Comentario());

?>
<form id="alterar" name="alterar" method="post">
    <div class="form-group">
            <label for="exampleInputName2">Sinopse</label>
            <textarea   name="sinopse" class="form-control" rows="3"><?php echo $obra->get_Sinopse();?></textarea>
    </div>
    <div class="form-group">
            <label for="exampleInputLink2">Imagem de Capa</label>
            <input value="<?php echo $obra->get_Foto();?>" name="foto" type="url" class="form-control" id="exampleInputName2" placeholder="http://asd.com">
    </div>
    <div class="form-group">
            <label for="exampleInputLink2">Video</label>
            <input value="<?php echo $filme->get_trailer();?>" name="video" type="url" class="form-control" id="exampleInputName2" placeholder="youtube.com/asdasd">
    </div>
    <div class="form-group">
            <label>Faixa Etaria: <a style="color:red">*</a></label>
            <select name="classificacao" class="form-control">
                    <option><?php echo $obra->get_FEtaria();?></option>
                    <option>Selecione</option>
                    <option>Livre</option>
                    <option>+12</option>
                    <option>+14</option>
                    <option>+16</option>
                    <option>+18</option>
            </select>					
    </div>

    <div class="form-inline">
            <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="alterar_filme" type="submit" class="btn btn-default">Alterar</button>
                    </div>
            </div>
            
            <div class="form-group">
            <span class="style1" style="color:red">* Campos com * s&atilde;o obrigat&oacute;rios!          </span>
            </div>
    </div>
</form>


<?php
if (isset($_POST['alterar_filme'])) {
    $obraDAO = new obraDAO();
    $obra = new obra();

    $filmeDAO= new filmeDAO();
    $filme=new filme($_POST['video']," "," ");
    
    $obra->set_Sinopse($_POST['sinopse']);
    $obra->set_Foto($_POST['foto']);
    $obra->set_FEtaria($_POST['classificacao']);

    if($obra->get_FEtaria()=="Selecione"){
         ?>
            <script language='javascript' type='text/javascript'>
                alert('Selecione uma Faixa Etaria');
            </script>
        <?php
    }
    else{
        if(!$obraDAO->consultartitulo($obra->get_Titulo(), $obra->get_DataLancamento())){
            $x=$obraDAO->atualizar($obra,$_SESSION['titulo'],$_SESSION['data']);
            $y=$filmeDAO->atualizar($filme,$_SESSION['titulo'],$_SESSION['data']);
                if($x && $y){
                    ?>
                    <script language='javascript' type='text/javascript'>
                        alert('Alterado com sucesso');window.location.href='read_update_obra.php';
                    </script>
                    <?php
                }
            
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
