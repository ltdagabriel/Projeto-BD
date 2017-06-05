<?php include("conector.php"); ?>
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
	<div id="logo" class="logo col-lg-6 col-md-6 col-sm-6 text-center">
		<a href="index.html"><h1>My Hobbie Filmes e Series</h1></a>
	</div>
	<div class=" espaco col-lg-4 col-md-4 col-sm-4">
		<div class="logo col-lg-6 col-md-6 col-sm-6 text-center">
		<a class="text-center btn btn-default" role="button" data-toggle="collapse" href="#login" aria-expanded="false" aria-controls="login">
			Logar
		</a>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 text-center">
		<a class="text-center btn btn-default" role="button"href="cadastro.html" aria-expanded="false" aria-controls="login">
			Cadastro
		</a>
		</div>
	</div>
	<div id="login" class="collapse">
		<form class="form-inline">
			<div class="form-group">
				<label class="sr-only" for="exampleInputName2">Login</label>
				<input type="email" class="form-control" id="exampleInputName2" placeholder="Login">
			</div>
			<div class="form-group">
				<label class="sr-only" for="exampleInputPassword3">Password</label>
				<input type="password" class="form-control" id="exampleInputPassword3" placeholder="Senha">
			</div>
			<button type="submit" class="btn btn-default">Login</button>  
		</form>
	</div>
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
	<?php
	// cria a instrução SQL que vai selecionar os dados
	$sql = "SELECT numero, nome, datta FROM episodio";
	// executa a query
	$dados = $con->query($sql) or die(mysql_error());

	if ($dados->num_rows > 0) {
    // output data of each row
		while($row = $dados->fetch_assoc()) {
			echo "
				<div clas='col-lg-3 col-md-3 col-sm-6'>
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