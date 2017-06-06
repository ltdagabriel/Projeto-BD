<?php 
include("conector.php"); 
if(isset($_COOKIE['login'])){
    $login_cookie = $_COOKIE['login'];
}
 else {
    $login_cookie = NULL;
}

?>
<html lang="pt-BR">
<html>
<head>
	<title>MyHobbieFIlmeSeries</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Informações sobre filmes e séries.">
	<meta name="author" content="Caio">
	<meta name="author" content="Gabriel">
	<link rel="stylesheet" href ="style\css\bootstrap.css">
	<link rel="stylesheet" href ="style\css\layout.css">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	
	
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
<div id='menu' class="col-lg-12 col-md-12 container navbar ">
	<div class="col-lg-12 col-md-12 container">
			<div class="dropdown">
				<button onclick="myFunction()" class="dropbtn">Filmes</button>
				<div id="myDropdown" class="dropdown-content">
					<a href="#home">Mais Vistos</a>
					<a href="#about">Mais Favoritados</a>
					<a href="#contact">Lançamentos</a>
				</div>
			</div>
			 
			<div class="dropdown">
				<button onclick="myFunction()" class="dropbtn">Séries</button>
				<div id="myDropdown" class="dropdown-content">
					<a href="#home">Mais Vistos</a>
					<a href="#about">Mais Favoritados</a>
					<a href="#contact">Lançamentos</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div id='conteudo'>
	<h1> Lista de Episódios</h1>
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
	<script src="style/js/jquery.js"></script>
	<script type='text/javascript'  src ="style\js\include.js">	</script>
	<script src="style/js/bootstrap.js"></script>
	<script src="style/js/bootstrap.min.js"></script>
	<script src="style/js/navbar-animation-fix.js"></script>
	
</body>
</html> 