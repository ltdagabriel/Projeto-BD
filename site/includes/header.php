<?php
/* Realizar Login */
require_once ("classes/ConectBD/usuario.php");

$usuarioDAO = new usuarioDAO();

if (isset($_POST['loginSubmit'])) {

    if ($usuarioDAO->login($_POST['username'], $_POST['senha'])) {

    $_SESSION['logado'] = '1';
    $_SESSION['user'] = $_POST['username'];
    $_SESSION['nome'] = $usuarioDAO->RetornaNome($_POST['username']);
	  
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
        <div class=" col-lg-8 col-md-8 col-sm-8">
                <form class="form-inline" name="cadastro" method="post">
                    <div class="form-group">
                      <label class="sr-only" for="exampleInputName3">Usuario</label>
                      <input type="login" name="username" class="form-control" id="exampleInputName3" placeholder="Login">
                    </div>
                    <div class="form-group">
                      <label class="sr-only" for="exampleInputPassword3">Senha</label>
                      <input type="password" name="senha" class="form-control" id="exampleInputPassword3" placeholder="Password">
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Lembrar
                      </label>
                    </div>
                    <button type="submit" name="loginSubmit" class="btn btn-default">Entrar</button>
                </form>
            <a type="button" id="registre-se" href="Cadastro.php">Registre-se</a>  
        </div>
        <?php
        }
        else{
            echo"Bem Vindo ". $_SESSION['nome'];
            ?>
            <div class="container">
                <div class="row">
                    <form class="form-inline" name="deslogar" method="post">
                        <button type="submit" name="sair" class="btn btn-default">Sair</button>
                    </form>
                </div>
            </div>

            <?php
        } 
        ?>
        </div>
    </div>
</div>


