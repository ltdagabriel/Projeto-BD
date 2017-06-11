
<html lang="pt-BR">
<head>
<?php
    session_start();
    if($_SESSION['logado']!=1){
        header ("Location: index.php");
    }
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
    <div id="header" class="col-lg-12 col-md-12 col-sm-12">
        <?php include("includes/header.php");?>
    </div>
    <div id='menu' class="col-lg-12 col-md-12">
        <?php include("includes/menu.php");?>
    </div>

    <div id='conteudo'>
        <div class="container">
            <div class="row">
                <?php include("CRUDDS/cadastro_filme.php");?>
            </div>
        </div>
    </div>
</div>
</body>
</html> 