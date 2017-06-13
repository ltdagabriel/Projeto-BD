<?php
require_once ("classes/ConectBD/obra.php");
require_once ("classes/ConectBD/serie.php");
require_once("classes/Entidades/obra.php");
require_once("classes/Entidades/filme.php");
?>
<form id="cadastro" name="cadastro" method="post">
    <div class="form-group">
            <label for="exampleInputName2">Titulo: <a style="color:red">*</a></label>
            <input name="titulo" type="text" class="form-control" id="exampleInputName2" placeholder="Titulo">
    </div>
    <div class="form-group">
            <label for="exampleInputName2">Sinopse</label>
            <textarea name="sinopse" class="form-control" rows="3"></textarea>
    </div>
    <div class="form-group">
            <label for="exampleInputData2">Data de Lancamento: <a style="color:red">*</a></label>
            <input name="data" type="date" class="form-control" id="exampleInputName2" placeholder="dia/mes/ano">
    </div>
    <div class="form-group">
            <label for="exampleInputLink2">Imagem de Capa</label>
            <input name="foto" type="url" class="form-control" id="exampleInputName2" placeholder="http://asd.com">
    </div>
    <div class="form-group">
        <label for="exampleInputLink2">Status</label>
        <input name="status" type="text" class="form-control" id="exampleInputName2" placeholder="Em lançamento,completo,etc">
</div>
    <div class="form-group">
            <label>Faixa Etaria: <a style="color:red">*</a></label>
            <select name="classificacao" class="form-control">
                    <option>Selecione</option>
                    <option>Livre</option>
                    <option>+12</option>
                    <option>+14</option>
                    <option>+16</option>
                    <option>+18</option>
            </select>					
    </div>

    <div class="form-group">
        <label for="exampleInputLink2">Genero</label>
            <label class="checkbox-inline">
              <input name="genero1" type="checkbox" id="inlineCheckbox1" value="option1"> Ação
            </label>
            <label class="checkbox-inline">
              <input name="genero2" type="checkbox" id="inlineCheckbox2" value="option2"> Drama
            </label>
            <label class="checkbox-inline">
              <input name="genero3" type="checkbox" id="inlineCheckbox3" value="option3"> Terror
            </label>
    </div>

    <div class="form-inline">
            <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="cadastrar" type="submit" class="btn btn-default">Enviar</button>
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
            if ($obraDAO->cadastrar($obra)) {
                if($serieDAO->cadastrar($seriado)){                    
                    ?>
                    <script language='javascript' type='text/javascript'>
                        alert('Cadastrado com sucesso');window.location.href='<?php echo $map->PageIndex();?>';
                    </script>
                    <?php
                }
            }
        }
        else{
        ?>
            <script language='javascript' type='text/javascript'>
                alert('Seriado ja se encontar na "Base de Dados"');
            </script>
        <?php
        }
    }
}
?>
