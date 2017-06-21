
<?php 
if(!isset($_COOKIE['sessao'])){
    session_start();
    $_COOKIE['sessao']=1;
}
require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();
    require_once($map->Conect_Filme());
    require_once($map->Conect_Serie());
    require_once($map->Conect_Obra());
    require_once($map->Entidade_Obra());
    require_once($map->Entidade_Filme());
    require_once($map->Entidade_Serie());
    require_once($map->Entidade_Episodio());
    require_once($map->Conect_Episodio());
    $serie=null;
    $filme=null;
    $episodio= new EpisodioDAO();
    $obraDAO= new obraDAO();
    if(isset($_GET['titulo'])){
        $_SESSION['titulo']=$_GET['titulo'];
    }
    if(isset($_GET['data'])){
        $_SESSION['data']=$_GET['data'];
    }
    
    $obra=$obraDAO->Get($_SESSION['titulo'],$_SESSION['data']);
    if( $serieDAO= new serieDAO() ){
        $serie=$serieDAO->Get($_SESSION['titulo'],$_SESSION['data']);
    }
    if($filmeDAO=new filmeDAO()){
        $filme=$filmeDAO->Get($_SESSION['titulo'],$_SESSION['data']);
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
</head>  
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
                                         <div class="navbar-right col-md-12 col-sm-12 col-lg-12">
                                             <?php
                                                add_temporada();
                                                list_temporada();
                                             ?>
                                         </div>
                                         <?php
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
    require_once ($map->Conect_Obra());
    $obra= new obraDAO();
    $titulo=$_POST['titulo'];
    $data= $_POST['data'];
    ?>
    <script language='javascript' type='text/javascript'>
        var r=confirm('A Obra <?php echo$titulo;?> será removida');
        if(r==true){
            <?php $obra->delete($titulo,$data);?>
            window.location.href='<?php echo $map->PageIndex();?>';
        }
    </script>
<?php
}
function add_temporada(){
    ?>
    <div class="col-sm-12 col-lg-12 col-md-12 navbar navbar-left">        
        <div class="navbar-left"><h5> Temporada</h5></div>
        <div class="navbar-left" style="padding-left: 4px">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#form_temporada" aria-expanded="false" aria-controls="collapseExample">
                Adicionar novos
            </button>     
        </div>
        
      <div class="collapse col-lg-12 col-md-12 col-sm-12" id="form_temporada">
        <div class="well">
            <h4>Cadastro de Temporada</h4>
            <?php
            include("CRUDDS/cadastro_temporada.php");
             ?>
        </div>
      </div>
    
    </div>
        <?php
    }
    function list_temporada(){
    ?>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        
    <?php
        include_once ("classes/ConectBD/temporada.php");
        include_once ("classes/Entidades/temporada.php");
        $temporadaDAO=new temporadaDAO();
        $list=$temporadaDAO->Retorna_Todos($_SESSION['titulo'], $_SESSION['data']);
        
        if($list){
            while($row = $list->fetch(PDO::FETCH_ASSOC)){
                
            ?>
            <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Temporada <?php echo $row['numero'];?>
                          <?php add_Episodio();?>
                      </a>
                    </h4>
                  </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
    <?php
                              list_episodio($row['numero']);
                       
    ?>
                    </div>
                </div>
            </div>
    <?php
            }
        }
    ?>
        </div>
    <?php
    }
function add_Episodio(){
        ?>
    <div class="col-sm-12 col-lg-12 col-md-12 navbar navbar-left">        
        <div class="navbar-left"><h5>-> Episodios <-</h5></div>
        <div class="navbar-left" style="padding-left: 4px">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#form_episodio" aria-expanded="false" aria-controls="collapseExample">
                Adicionar novos
            </button>     
        </div>
        
      <div class="collapse col-lg-12 col-md-12 col-sm-12" id="form_episodio">
        <div class="well">
            <h4>Cadastro de Episodio</h4>
            <?php
            include("CRUDDS/cadastro_episodio.php");
             ?>
        </div>
      </div>
    
    </div>
        <?php
    }
function list_episodio($numero){
    require_once 'classes/ConectBD/episodio.php';
    $episodio=new episodioDAO();
    $str=$episodio->Retorna_Todos($_SESSION['titulo'],$numero);          
    while($epi = $str->fetch(PDO::FETCH_ASSOC)){
        ?>
    <div class="col-md-4 col-lg-4 com-sm-6">
        <p>doideiraaaaaaaaaaaaaaaaaaaa</p>
        <p><?php echo $epi->get_sinopse(); ?></p>
        <h4><?php echo $epi->get_obra_titulo(); ?></h4>
    </div>
        <?php
    }
    ?>   
}
function add_Ator(){
        ?>
    <div class="col-sm-12 col-lg-12 col-md-12 navbar navbar-left">        
        <div class="navbar-left"><h5> Atores</h5></div>
        <div class="navbar-left" style="padding-left: 4px">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#form_ator" aria-expanded="false" aria-controls="collapseExample">
                Adicionar novos
            </button>     
        </div>
        
      <div class="collapse col-lg-12 col-md-12 col-sm-12" id="form_ator">
        <div class="well">
            <h4>Cadastro de Atores</h4>
            <?php
             include("CRUDDS/cadastro_ator.php");
             ?>
        </div>
      </div>
    
    </div>
        <?php
    }
    function listar_Ator(){
        ?>
    
        <?php
    }