
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
	
	
</head>
<body>
 
<div id="logo" class="col-lg-12 col-md-12 col-sm-12">
	<div id="logo" class="logo col-lg-4 col-md-4 col-sm-4 text-center">
		<a href="index.php"><h1>My Hobbie Filmes e Series</h1></a>
	</div>
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
            <a href="cadastro.html">Registre-se</a>
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
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
	<script src="style/js/jquery.js"></script>
        <script src="style/js/jquery-1.10.2.js"></script>
	<script src="style/js/include.js"></script>
	<script src="style/js/npm.js"></script>
	<script src="style/js/bootstrap.js"></script>
	<script src="style/js/bootstrap.min.js"></script>
	<script src="style/js/navbar-animation-fix.js"></script>
	
</body>
</html> 