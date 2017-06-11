
<html lang="pt-BR">
<head>
<?php
    session_start();
    if(!$_SESSION['logado']){
        $_SESSION['logado']=0;
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
        <script type="text/javascript">
            $(document).ready(function() {
                    $("#registre-se").click(function(event) {
                            $("#conteudo").load("CRUDDS/cadastro.php");
                    });
            });
        </script>
<body>
    
<div class="container col-lg-12 col-md-12 com-sm-12" style="padding:15px" >
    <div class="container">
        
        <div id="header" class="col-lg-12 col-md-12 col-sm-12">
            <?php include("includes/header.php");?>
        </div>
        <div id='menu' class="col-lg-12 col-md-12">
            <?php include("includes/menu.php");?>
        </div>
        <div class="row container">
            <div id='conteudo'>
                <?php include("CRUDDS/Select_All_Filmes.php");?>
            </div>
        </div>
    </div>
</div>
    
   
</body>
</html> 