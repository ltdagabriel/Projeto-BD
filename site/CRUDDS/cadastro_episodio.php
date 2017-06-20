<?php 
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();
require_once ($map->Conect_Serie());
require_once($map->Entidade_Serie());
require_once ($map->Conect_Obra());
require_once($map->Entidade_Obra());
require_once($map->Conect_Episodio());
require_once($map->Entidade_Episodio());
?>
<form id="cadastro" name="cadastro" method="post">
    <div class="form-group">
            <label for="exampleInputName2">Nome: <a style="color:red">*</a></label>
            <input name="nome" type="text" class="form-control" id="exampleInputName2" placeholder="Nome do Episodio">
    </div>
    <div class="form-group">
            <label for="exampleInputName2">Sinopse</label>
            <textarea name="sinopse" class="form-control" rows="3"></textarea>
    </div>
    <div class="form-group">
            <label for="exampleInputData2">Data de Lancamento: <a style="color:red">*</a></label>
            <input name="data" type="date" class="form-control" id="exampleInputName2" placeholder="dia/mes/ano">
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

    $filmeDAO= new filmeDAO();
    $filme=new filme($_POST['video'],$_POST['titulo'],$_POST['data']);
    
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
                if($filmeDAO->cadastrar($filme)){
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
                alert('Filme ja se enconta na "Base de Dados"');
            </script>";
        <?php
        }
    }
}
?>
