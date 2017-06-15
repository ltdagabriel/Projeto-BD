<?php
/* Realizar Login */
require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();
require_once ($map->Conect_Usuario());
require_once ($map->Entidade_Usuario());

$usuarioDAO = new usuarioDAO();

if (isset($_POST['loginSubmit'])) {

    if ($usuarioDAO->login($_POST['username'], $_POST['senha'])) {

    $_SESSION['logado'] = '1';
    $_SESSION['user'] = $_POST['username'];
    $_SESSION['senha'] = $_POST['senha'];
	  
	  header ("Location: index.php");
    } else {
        ?>
        <script type="text/javascript">
            alert("Usuário ou senha inválido.");
        </script>
        <?php
    }
}
if (isset($_GET['erro'])) {
    switch ($_GET['erro']) {
        case "1":
            ?>
            <script type="text/javascript">
                alert("Você não tem permissão para acessar o painel.");
            </script>
            <?php
            break;
        case "2":
            ?>
            <script type="text/javascript">
                alert("Você saiu do painel.");
            </script>
            <?php
            break;
    }
}

/* end Realizar Login */
/* Sair*/
if (isset($_POST['sair'])){
    $_SESSION['logado'] = '0';
    $_SESSION['nome'] = "";
    header ("Location: index.php");
}
?>
<div class="row">
    <div id="header" class="col-lg-12 col-md-12 col-sm-12">
        <div id="logo" class="logo col-lg-4 col-md-4 col-sm-4 text-center">
                <a href="index.php"><h1>My Hobbie Filmes e Series</h1></a>
        </div>
        <div class="container" style="padding:15px">
            <?php 
            if($_SESSION['logado'] != 1){
            ?>
            <div class="col-lg-8 col-md-8 col-sm-8 ">
                    <form class="form-inline" name="cadastro" method="post">
                        <div class="form-group">
                          <label class="sr-only" for="exampleInputName3">Usuario</label>
                          <input value="<?php echo $_SESSION['user'];?>" type="login" name="username" class="form-control" id="exampleInputName3" placeholder="Login">
                        </div>
                        <div class="form-group">
                          <label class="sr-only" for="exampleInputPassword3">Senha</label>
                          <input value="<?php echo $_SESSION['senha'];?>" type="password" name="senha" class="form-control" id="exampleInputPassword3" placeholder="Password">
                        </div>
                        <button type="submit" name="loginSubmit" class="btn btn-default">Entrar</button>
                    </form>
                <a type="button" id="registre-se" href="Cadastro.php">Registre-se</a>  
            </div>
            <?php
            }
            else{
                $user=$usuarioDAO->Get($_SESSION['user']);
                $usuario=$user;
                ?>
                <div class="container col-lg-8 col-md-8 col-sm-8">
                    <div class="row">
                      <div class="col-md-2 col-lg-2">
                        <div class="img-responsive">
                            <img src="<?php echo $user->get_foto(); ?>" class="img-responsive">
                        </div>

                      </div>
                        <div class="col-md-10 col-lg-10">
                            <div class="caption">
                                <h3>Olá novamente <?php echo $user->get_nome(); ?></h3>
                                <p>
                                <form method="post"><button type="submit" name="sair" class="btn btn-default">Sair</button></form>
                                    <button class="btn btn-default" data-toggle="modal" data-target="#perfil">Mais Informações</button>
                                </p>
                            </div>
                        </div>
                        <div id="perfil" class="modal fade editar_serie" tabindex="-1" role="dialog" aria-labelledby="editar_filme">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>

                                <div class="modal-body">

                                    <div class=" panel-default panel">
                                        <div class="panel-body">
                                            <div>
                                                <div class="navbar-left col-md-2 col-lg-2">
                                                    <img class="img-responsive img-rounded" src="<?php echo $usuario->get_foto();?>">
                                                </div>                            
                                                <div class="navbar-left col-md-10 col-lg-10">
                                                    <h3>Perfil</h3>
                                                       <p>Nome: <?php echo $usuario->get_nome();?></p>
                                                       <p>Email: <?php echo $usuario->get_email();?></p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>

                <?php
            } 
            ?>
        </div>
    </div>
</div>



