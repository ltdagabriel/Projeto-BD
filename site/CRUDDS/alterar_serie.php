<?php 
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();
require_once ($map->Conect_Serie());
require_once($map->Entidade_Serie());
require_once ($map->Conect_Obra());
require_once($map->Entidade_Obra());
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
            <label for="exampleInputLink2">Status</label>
            <input value="<?php echo $serie->get_status();?>" name="status" type="text" class="form-control" id="exampleInputName2">
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
                      <button name="cadastrar" type="submit" class="btn btn-default">Atualizar</button>
                    </div>
            </div>
            
            <div class="form-group">
            <span class="style1" style="color:red">* Campos com * s&atilde;o obrigat&oacute;rios!          </span>
            </div>
    </div>
</form>


<?php
if (isset($_POST['cadastrar'])) {
    $obraDAO = new obraDAO();
    $obra = new obra();
    $serieDAO= new serieDAO();
    $seriado=new Serie($_POST['status'],$_POST['titulo'],$_POST['data']);

    $obra->set_Titulo($_POST['titulo']);
    $obra->set_Sinopse($_POST['sinopse']);
    $obra->set_Data_Lancamento($_POST['data']);
    $obra->set_Foto($_POST['foto']);
    $obra->set_FEtaria($_POST['classificacao']);
    if($obra->get_FEtaria()=="Selecione"){
         ?>
            <script language='javascript' type='text/javascript'>
                alert('Selecione uma Faixa Etaria');
            </script>
        <?php
    }
    else if ($obra->get_Titulo()=="" || $obra->get_Titulo()==null){
        ?>
            <script language='javascript' type='text/javascript'>
                alert('O campo "Titulo" deve ser preenchido');
            </script>
        <?php
    }
    else if($obra->get_DataLancamento()=="" || $obra->get_DataLancamento()==null){
        ?>
            <script language='javascript' type='text/javascript'>
                alert('O campo "Data de Lançamento" deve ser preenchido');
            </script>
        <?php
    }
    else{
        if(!$obraDAO->consultartitulo($obra->get_Titulo(), $obra->get_DataLancamento())){
            $x=$obraDAO->alterar($obra,$titulo_obra,$data_obra);
            $y=$filmeDAO->alterar($filme,$titulo_obra,$data_obra);
                if($x && $y){
                    ?>
                    <script language='javascript' type='text/javascript'>
                        alert('Alterado com sucesso');window.location.href='<?php echo $map->PageIndex();?>';
                    </script>
                    <?php
                }
            
        }
        else{
        ?>
            <script language='javascript' type='text/javascript'>
                alert('Seriado ja se enconta na "Base de Dados"');
            </script>
        <?php
        }
    }
}
?>
