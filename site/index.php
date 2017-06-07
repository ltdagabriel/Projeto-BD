
<html lang="pt-BR">
<head>
    <?php 
        include("conector.php"); 
        if(isset($_COOKIE['login'])){
            $login_cookie = $_COOKIE['login'];
        }
         else {
            $login_cookie = NULL;
        }
    ?>
	<title>MyHobbieFIlmeSeries</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Informações sobre filmes e séries.">
	<meta name="author" content="Caio">
	<meta name="author" content="Gabriel">
	<link rel="stylesheet" href ="style\css\bootstrap.css">
	<link rel="stylesheet" href ="style\css\bootstrap.min.css">
	<link rel="stylesheet" href ="style\css\layout.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="style/css/layout.css"></script>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="style/js/include.js"></script>
        <script src="style/js/jquery-1.10.2.js"></script>
        <script src="style/js/jquery.js"></script>
	
</head>
<body>
<div class="container col-lg-12 col-md-12 com-sm-12" style="padding:15px" >
    <div id="logo" class="col-lg-12 col-md-12 col-sm-12">
            <div id="logo" class="logo col-lg-4 col-md-4 col-sm-4 text-center">
                    <a href="index.php"><h1>My Hobbie Filmes e Series</h1></a>
            </div>
            <div class="container" style="padding:15px">
            <?php 
            if(!isset($login_cookie)){
            ?>
            <div class=" col-lg-8 col-md-8 col-sm-8">
                    <form class="form-inline" name="cadastro" method="post" action="login.php">
                        <div class="form-group">
                          <label class="sr-only" for="exampleInputName3">Login</label>
                          <input type="login" name="login" class="form-control" id="exampleInputName3" placeholder="Login">
                        </div>
                        <div class="form-group">
                          <label class="sr-only" for="exampleInputPassword3">Password</label>
                          <input type="password" name="senha" class="form-control" id="exampleInputPassword3" placeholder="Password">
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> Lembrar
                          </label>
                        </div>
                        <button type="submit" name="entrar" class="btn btn-default">Entrar</button>
                    </form>
                <a type="button" data-toggle="modal" data-target="#CadastroUsuario">Registre-se</a>  
            </div>
            <?php
            }
            else{
                echo"Bem Vindo $login_cookie";
                echo" <form class='form-inline' name='deslogar' method='post' action='deslogar.php'> ";
                echo" <button type='submit' name='entrar' class='btn btn-default'>Deslogar</button>";
                echo" </form>";
            } 
            ?>
            </div>
    </div>

    <div id='menu' class="col-lg-12 col-md-12">
        <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
              <li><a href="#">Link</a></li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ASD<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                  <li><a href="#">??</a></li>
                  </ul>
              </li>
            </ul>
            <form class="navbar-form navbar-left">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Link</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastro <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a type="button" data-toggle="modal" data-target="#CadastroObra">Obra</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    </div>

    <div id='conteudo'>
        <div id="last" class="collapse-in">	
            <h2> Lista de Episódios</h2>
            <?php
            // cria a instrução SQL que vai selecionar os dados
            $sql = "SELECT numero, nome, datta FROM episodio";
            // executa a query
            $dados = $con->query($sql) or die(mysql_error());

            if ($dados->num_rows > 0) {
        // output data of each row
                    while($row = $dados->fetch_assoc()) {
                            echo "
                                    <div class='col-lg-3 col-md-3 col-sm-6'>
                                    Episodio: " . $row["numero"]. " - Nome: " . $row["nome"]. " Lançado em: " . $row["datta"]. "</div>";
                    }
            } else {
                    echo "0 results";
            }
            $con->close();
            ?>
        </div>
    </div>
 </div>
    <!-- Cadastro de usuario -->
    <div id="CadastroUsuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="CadastroUsuario">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cadastre-se</h4>
             </div>

            <div class="modal-body">
                <form id="cadastro" name="cadastro" method="post" action="cadastro.php" onsubmit="return validaCampo(); return false;">
                    <div class="form-group">
                            <label for="exampleInputName2">Nome: <a style="color:red">*</a></label>
                            <input name="nome" type="text" class="form-control" id="exampleInputName2" placeholder="Seu nome">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputEmail2">Email <a style="color:red">*</a></label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail2" placeholder="seuemail@exemplo.com">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputName2">Login: <a style="color:red">*</a></label>
                            <input name="login" type="text" class="form-control" id="exampleInputName2" placeholder="Seu login">
                    </div>
                    <div class="form-group">
                            <label for="inputPassword3">Senha: <a style="color:red">*</a></label>
                            <input name="senha" type="password" class="form-control" id="inputPassword3" placeholder="Digite sua senha">
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
            </div>
        </div>
      </div>
    </div>
    <!-- Cadastro de obra -->
    
    <div id="CadastroObra" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="CadastroObra">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cadastro de Obras</h4>
             </div>

            <div class="modal-body">
                <form id="cadastro" name="cadastro" method="post" action="cadastro.php" onsubmit="return validaCampo(); return false;">
                    <div class="form-group">
                            <label for="exampleInputName2">Titulo: <a style="color:red">*</a></label>
                            <input name="nome" type="text" class="form-control" id="exampleInputName2" placeholder="Titulo da Obra">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputEmail2">Sinopse <a style="color:red">*</a></label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail2" placeholder="Sinopse da Obra">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputName2">Data de Lancamento: <a style="color:red">*</a></label>
                            <input name="login" type="text" class="form-control" id="exampleInputName2" placeholder="dia/mes/ano">
                    </div>
                    <div class="form-group">
                            <label for="inputPassword3">Faixa Etaria: <a style="color:red">*</a></label>
                            <select class="form-control">
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
            </div>
        </div>
      </div>
    </div>
    
   
</body>
</html> 