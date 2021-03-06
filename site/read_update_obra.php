
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
        <script src="style/js/bootbox.min.js"></script>
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
                    <?php
                    if($_SESSION['logado']==1){
                        ?>
                        <div class="col-md-12 col-lg-12 col-sm-12"> 
                            <div >    
                                 <p> </p> 
                                <?php
                                $titulo_obra=$obra->get_Titulo();
                                $data_obra=$obra->get_DataLancamento();
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
                                        <button name="delete" type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="panel-body">
                        <div id="obra_info">
                            <div class="navbar-left col-md-4 col-lg-4">
                                <img class="img-responsive img-rounded" src="<?php echo $obra->get_Foto();?>">
                            </div>
                            <div class="navbar-left col-md-8 col-lg-8">
                                <h3><?php echo $obra->get_Titulo();?>
                                <?php
                                if($_SESSION['logado']==1){
                                    if($filme->get_Titulo()==$obra->get_Titulo()){
                                        ?><a href="#"  data-toggle="modal" data-target="#editar_filme"><img src="http://icon-icons.com/icons2/685/PNG/128/edit_icon-icons.com_61193.png" style="width:1em" ></a> <?php
                                    }
                                    else{ 
                                        ?><a href="#" data-toggle="modal" data-target="#editar_serie"><img src="http://icon-icons.com/icons2/685/PNG/128/edit_icon-icons.com_61193.png" style="width:1em" ></a><?php
                                    }
                                }
                                ?>

                                </h3>
                                <p>Sinopse: <?php echo $obra->get_Sinopse();?></p>
                            </div>
                            <?php favorito(); 
                            /**personagem();**/?>

                            <div class="navbar-left col-md-8 col-lg-8">
                                <p>Faixa Etária: <?php echo $obra->get_FEtaria();?></p>
                            </div>

                            <?php
                            if($serie->get_Titulo()==$obra->get_Titulo()){
                            ?>
                                <div class="navbar-left col-md-12 col-lg-12">
                                    <p>Status: <?php echo $serie->get_status();?></p>
                                    <?php
                                    if($_SESSION['logado']==1){   
                                        add_temporada();
                                     }
                                     list_temporada(); 
                                     ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php comentar();?>
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
if(isset($_POST['delete_episodio'])){
    $titulo=$_POST['titulo'];
    $data= $_POST['data'];
    $temp_numero= $_POST['temp_numero'];
    $numero= $_POST['numero'];
    ?>
    <script language='javascript' type='text/javascript'>
    var ans=confirm("tem certeza que deseja apagar?");
        if(ans==true){
        
        <?php
        $episodio->delete($titulo, $data, $temp_numero, $numero);
        ?>
                window.location.href='read_update_obra.php';
        }
    </script>
<?php   
}
if(isset($_POST['delete_temporada'])){
    require_once 'classes/ConectBD/temporada.php';
    $titulo=$_POST['titulo'];
    $data= $_POST['data'];
    $numero= $_POST['numero'];
    $temporadaDAO=new temporadaDAO();
    ?>
    <script language='javascript' type='text/javascript'>
    var ans=confirm("tem certeza que deseja apagar?");
        if(ans==true){
        
        <?php
        $temporadaDAO->delete($titulo, $data,$numero);
        ?>
                window.location.href='read_update_obra.php';
        }
    </script>
<?php   
}
function add_temporada(){
    ?>
    <div style="padding-left: 4px">
        <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#form_temporada" aria-expanded="false" aria-controls="collapseExample">
            ADD Temporada
        </button>     
    </div>
    <div class="col-sm-12 col-lg-12 col-md-12 navbar navbar-left">        
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
            <div class="panel">
                <?php if($_SESSION['logado']==1){?>
                <form method="post" class="navbar-right">
                <div class="collapse">
                    <div class="form-group">
                        <input value="<?php echo $_SESSION['titulo'];?>" name="titulo" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <input value="<?php echo $_SESSION['data'];?>" name="data" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <input value="<?php echo $row['numero'];?>" name="numero" type="text" class="form-control">
                    </div>
                </div>
                <button name="delete_temporada" type="submit" class="btn btn-sm btn-danger">Excluir</button>
                
                </form>
                <?php }?>
                  <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree<?php echo $row['numero'];?>" aria-expanded="false" aria-controls="collapseThree">
                          <h4>Temporada <?php echo $row['numero'];?></h4>
                          
                      </a>
                    </h4>
                  </div>
                <div id="collapseThree<?php echo $row['numero'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
        <?php
        if($_SESSION['logado']==1){   
            add_Episodio($row['numero']);
        }
                                  
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

function add_Episodio($temporada_numero){
    $obra_titulo_2=$_SESSION['titulo'];    
    $obra_data_2=$_SESSION['data'];    
    ?>
    
        <div class="navbar-right"">
            <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#form_episodio<?php echo $temporada_numero; ?>" aria-expanded="false" aria-controls="collapseExample">
                ADD Episodio
            </button>     
        </div>
        
      <div class="collapse col-lg-10 col-md-10 col-sm-10" id="form_episodio<?php echo $temporada_numero; ?>">
        <div class="well">
            <h4>Cadastro de Episodio</h4>
            <?php
            include("CRUDDS/cadastro_episodio.php");
             ?>
        </div>
      </div>
        <?php
    }
  
    function editar_episodio($numero,$numero_temporada){
    $obra_titulo=$_SESSION['titulo'];    
    $obra_data=$_SESSION['data'];    
    ?>
    
    <div class="navbar-right" style="padding-left: 4px">
            <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#form_episodio_editar<?php echo $numero_temporada; ?>" aria-expanded="false" aria-controls="collapseExample">
                Editar
            </button>     
        </div>
        
      <div class="collapse col-lg-12 col-md-12 col-sm-10" id="form_episodio_editar<?php echo $numero_temporada; ?>">
        <div class="well">
            <h4>Editar Episodio</h4>
            <?php
            include("CRUDDS/alterar_episodio.php");
             ?>
        </div>
      </div>
        <?php
    }
function list_episodio($numero){
    require_once 'classes/ConectBD/episodio.php';
    $episodio=new episodioDAO();
    $str=$episodio->Retorna_Todos($_SESSION['titulo'],$numero);          
    ?>
    <div class="col-md-11 col-lg-11 com-sm-11 navbar-left">
    <?php 
    
    while($epi = $str->fetch(PDO::FETCH_ASSOC)){
        ?>
    <div class="col-lg-6 col-md-4">
        <div class="thumbnail">
           <?php /** COLOCAR VIDEO**/?> 
          <div class="caption">
            <h3><?php echo $epi['nome']." ".$epi['numero'];?></h3>
            <p><?php echo $epi["sinopse"];?></p>
        <?php 
               if($_SESSION['logado']==1){
                   editar_episodio($epi['numero'],$numero);
                   ?> 
            <form method="post" class="navbar-right">
                <div class="collapse">
                    <div class="form-group">
                        <input value="<?php echo $_SESSION['titulo'];?>" name="titulo" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <input value="<?php echo $_SESSION['data'];?>" name="data" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <input value="<?php echo $numero;?>" name="temp_numero" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <input value="<?php echo $epi['numero'];?>" name="numero" type="text" class="form-control">
                    </div>
                </div>
                <button name="delete_episodio" type="submit" class="btn btn-sm btn-danger">Excluir</button>
                
            </form>
                <?php
               }
            ?>
        </div>
      </div>
    </div>
    
        <?php
    }
    ?>
    </div>
    <?php 
}
function comentar(){
    $obra_titulo_2=$_SESSION['titulo'];    
    $obra_data_2=$_SESSION['data'];    
    ?>
    
        
      <div class="col-lg-12 col-md-12 col-sm-12" id="form_comentario">
        <div class="well">
            <h4>Comentar</h4>
            <?php
            include("CRUDDS/comentario.php");
             ?>
        </div>
          <?php
          mostra_comentario();
          ?>
      </div>
        <?php
}

function mostra_comentario(){
    require_once 'classes/ConectBD/comentario.php';
    $comentario=new comentarioDAO();
    $str=$comentario->exibe_comentario($_SESSION['titulo'],$_SESSION['data']);          
    ?>
    <div>
        <?php 
        $usuarioDAO=new usuarioDAO();
        $user=new usuario();
        
        while($coment = $str->fetch(PDO::FETCH_ASSOC)){
           $user=$usuarioDAO->Get($coment['usuario_login']); 
            ?>
            <div >
                <div class="well">
                    <p><?php echo $user->get_nome();?> comentou: <?php echo $coment['datta'];?></p>
                    <p><?php echo $coment['texto']?>
                    <?php if($coment['usuario_login']==$_SESSION['user']){ echo alterar_comentario($coment['datta'],$coment['texto']);?> </p>
                <form method="post" class="navbar-right">
                    <div class="collapse">
                        <div class="form-group">
                            <input value="<?php echo $_SESSION['titulo'];?>" name="titulo" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <input value="<?php echo $_SESSION['data'];?>" name="data" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <input value="<?php echo $coment['datta'];?>" name="data_coment" type="text" class="form-control">
                        </div>
                    </div>
                    <button name="delete_comentario" type="submit" class="btn btn-sm btn-danger">Excluir</button>
                </form>
                    <?php } ?>
                </div>
 
            </div>
            
            
            <?php
            
        }
        ?>
    </div>
    <?php 
}
if(isset($_POST['delete_comentario'])){
    require_once 'classes/ConectBD/comentario.php';
    $titulo=$_POST['titulo'];
    $data= $_POST['data'];
    $data2= $_POST['data_coment'];
    $comentarioDAO=new comentarioDAO();
    ?>
    <script language='javascript' type='text/javascript'>
    var ans=confirm("tem certeza que deseja apagar?");
        if(ans==true){
        
        <?php
        $comentarioDAO->delete($titulo, $data,$data2);
        ?>
                window.location.href='read_update_obra.php';
        }
    </script>
<?php   
}

function alterar_comentario($data,$comentario){
    ?>
    
            <a href"#" class="btn" type="button" data-toggle="collapse" data-target="#alterar_comentario<?php echo strtr($data,array( " " =>"_", "/" => "_", "-" => "_", ":" => "_")); ?>" aria-expanded="false" aria-controls="collapseExample">
               <img src="http://icon-icons.com/icons2/685/PNG/128/edit_icon-icons.com_61193.png" style="width:1em" >
            </a>     
        
        
      <div class="collapse col-lg-10 col-md-10 col-sm-10" id="alterar_comentario<?php echo strtr($data,array( " " =>"_", "/" => "_", "-" => "_", ":" => "_")); ?>">
        <div class="well">
            <?php
            include("CRUDDS/alterar_comentario.php");
             ?>
        </div>
      </div>
    <?php
}
function atores(){
    
}
function personagem(){
    add_personagem();
    list_personagem();
}
function add_personagem(){
    $obra_titulo_2=$_SESSION['titulo'];    
    $obra_data_2=$_SESSION['data'];    
    ?>
    
        <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#form_personagem" aria-expanded="false" aria-controls="collapseExample">
            ADD Personagem
        </button>
        
      <div class="collapse col-lg-12 col-md-12 col-sm-12" id="form_personagem">
        <div class="well">
            <h4>Cadastro de Personagem</h4>
            <?php
            include("CRUDDS/cadastro_personagem.php");
             ?>
        </div>
      </div>
    <?php
}
function list_personagem(){
     ?>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        
    <?php
        include_once ("classes/ConectBD/personagem.php");
        include_once ("classes/Entidades/personagem.php");
        $personagemDAO=new personagemDAO();
        $list=$personagemDAO->Retorna_Todos($_SESSION['titulo'], $_SESSION['data']);
        
    if($list){
        while($row = $list->fetch(PDO::FETCH_ASSOC)){           
            ?>
            <div class="panel">
                <?php if($_SESSION['logado']==1){?>
                <form method="post" class="navbar-right">
                <div class="collapse">
                    <div class="form-group">
                        <input value="<?php echo $_SESSION['titulo'];?>" name="titulo" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <input value="<?php echo $_SESSION['data'];?>" name="data" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <input value="<?php echo $row['nome'];?>" name="personagem_nome" type="text" class="form-control">
                    </div>
                </div>
                <button name="delete_personagem" type="submit" class="btn btn-sm btn-danger">Excluir</button>
                
                </form>
                <?php }?>
                  <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree<?php echo $row['numero'];?>" aria-expanded="false" aria-controls="collapseThree">
                          <h4>Temporada <?php echo $row['numero'];?></h4>
                          
                      </a>
                    </h4>
                  </div>
                <div id="collapseThree<?php echo $row['numero'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
        <?php
        if($_SESSION['logado']==1){   
            add_Episodio($row['numero']);
        }
                                  
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
function favorito(){
    include_once 'classes/ConectBD/favorito.php';
    $favorito=new favoritaDAO();
    if($favorito->consultar()==false){
    ?>
    <form tipe="get" onsubmit="<?php $favorito->cadastrar();?>">
        <button  name="add_fav" class="btn btn-sm bg-success" type="submit" >ADD Favorito</button>
    </form>
    <?php
    }
    else{
        ?>
    <form tipe="get" onsubmit="<?php $favorito->remover();?>">
       <button type="button" name="rem_fav" class="btn btn-sm bg-success" type="submit" >REMOVE Favorito</button>
    </form><?php
       }
}

function deseja_assistir(){
    
}
function assistiu(){
    
}