
<?php 
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();;
    require_once($map->Conect_Filme());
    require_once($map->Conect_Serie());
    require_once($map->Conect_Obra());
    require_once($map->Entidade_Obra());
    require_once($map->Entidade_Filme());
    require_once($map->Entidade_Serie());
    $serie=null;
    $filme=null;
    $obraDAO= new obraDAO();
    $obra=$obraDAO->Get($_POST['titulo'],$_POST['data']);
    if( $serieDAO= new serieDAO() ){
        $serie=$serieDAO->Get($_POST['titulo'],$_POST['data']);
    }
    if($filmeDAO=new filmeDAO()){
        $filme=$filmeDAO->Get($_POST['titulo'],$_POST['data']);
    }
    $editar;
    
    /*** Variaveis
     * $serie   ---   contem entidade Serie
     * $filme   ---   contem entidade Filme
     * $obra    ---   contem uma obra
     * $editar  ---   Verifica se o botao editar foi precionado 
     */
    ?>
<html lang="pt-BR">
<head>
<?php
    session_start();
    if(!$_SESSION['logado']){
        $_SESSION['logado']=0;                                                                
    }
$_SESSION['editar']=0;    
?>
	<title>MyHobbieFIlmeSeries</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Informações sobre filmes e séries.">
	<meta name="author" content="Caio">
	<meta name="author" content="Gabriel">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href ="style\css\layout.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="style/js/include.js"></script>
        <script src="style/js/jquery-1.10.2.js"></script>
        <script src="style/js/jquery.js"></script>
        
<body>
    
<div class="container col-lg-12 col-md-12 com-sm-12" style="padding:15px" >
    <div class="container">
        <?php include $map->IncludeLogoLogin();?>
        <?php include($map->IncludeMenu());?>
           
        <div class="row container">
            <div id='conteudo'>
                <div class=" panel-default panel">
                    <div class="panel-body">
                        <div id="obra_info">
                                <div class="navbar-left col-md-4 col-lg-4">
                                    <img class="img-responsive img-rounded" src="<?php echo $obra->get_Foto();?>">
                                </div>
                            

                                <div class="navbar-left col-md-8 col-lg-8">
                                    <h3><?php echo $obra->get_Titulo();?></h3>
                                    <p>Sinopse: <?php echo $obra->get_Sinopse();?></p>
                                </div>

                                <div class="navbar-left col-md-8 col-lg-8">
                                    <p>Faixa Etária: <?php echo $obra->get_FEtaria();?></p>
                                </div>

                                <?php
                                if($filme->get_Titulo()==$obra->get_Titulo()){
                                ?>
                                    <?php 
                                }
                                if($serie->get_Titulo()==$obra->get_Titulo()){
                                    ?>
                                    <div class="navbar-left col-md-8 col-lg-8">
                                        <p>Status: <?php echo $serie->get_status();?></p>
                                    </div>
                                    <?php 
                                }
                            
                            if($_SESSION['logado']==1){
                                ?>
                                <div class="col-md-12 col-lg-12 col-sm-12"> 
                                    <div class="navbar-right"    
                                         <p> </p> 
                                        <?php
                                        $titulo_obra=$obra->get_Titulo();
                                        $data_obra=$obra->get_DataLancamento();
                                         if($filme->get_Titulo()==$obra->get_Titulo()){
                                         ?>
                                         <button class="btn btn-default" data-toggle="modal" data-target="#editar_filme">Editar</button> 
                                         <?php
                                         }else{
                                         ?>
                                         <button  class="btn btn-default" data-toggle="modal" data-target="#editar_serie">Editar</button>
                                         <?php
                                         }
                                         ?>
                                         <form method="post" class="navbar-right">
                                                <div class="collapse">
                                                    <div class="form-group">
                                                        <input value="<?php echo $row["titulo"];?>" name="titulo" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <input value="<?php echo $row["data_lancamento"];?>" name="data" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <button name="delete" type="submit" class="btn btn-default">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div id="editar_filme" class="modal fade editar_serie" tabindex="-1" role="dialog" aria-labelledby="editar_filme">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <?php include ($map->Alterar_Filme());?>
            </div>
        </div>
      </div>
    </div>
    
    <div id="editar_serie" class="modal fade editar_serie" tabindex="-1" role="dialog" aria-labelledby="editar_serie">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <?php include ($map->Alterar_Serie());?>
            </div>
        </div>
      </div>
    </div>
</body>
</html>
<?php
if (isset($_POST['delete'])) {
    require_once ($this->map->Conect_Obra());
    $obra= new obraDAO();
    $titulo=$_POST['titulo'];
    $data= $_POST['data'];
    ?>
    <script language='javascript' type='text/javascript'>
        var r=confirm('A Obra <?php echo$titulo;?> será removida');
        if(r==true){
            <?php $obra->delete($titulo,$data);?>
            window.location.href='<?php echo $this->map->PageIndex();?>';
        }
    </script>
<?php
}