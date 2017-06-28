<?php 
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();
?>
<html lang="pt-BR">
<head>
<?php
    session_start();
    $_COOKIE['sessao']=1;
    if(!$_SESSION['logado']){
        $_SESSION['logado']=0;
        $_SESSION['user']="user";
        $_SESSION['senha']="password";
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
        <script src="style/js/bootbox.min.js"></script>
        <script src="style/js/jquery.js"></script>
        
<body>
    
<div class="container col-lg-12 col-md-12 com-sm-12" style="padding:15px" >
    <div class="container">
        <?php include $map->IncludeLogoLogin();?>
        <?php include($map->IncludeMenu());?>
           
        <div class="row container">
            <div id='conteudo'>
                <?php 
                require_once($map->Interface_Obra());
                require_once($map->Conect_Filme());
                require_once($map->Conect_Serie());
                require_once($map->Conect_Obra());
                require_once($map->Conect_Usuario());
                $obra=new UIObra();
                $user=new usuarioDAO();
                $filme=new filmeDAO();
                $serie=new serieDAO();
                $obraDAO=new obraDAO();
                if($user->consultarUsername($_SESSION['user'])){
                    $obra->adicionar($obraDAO->all_coment_not_view($_SESSION['user']),"Todas as obras que eu comentei mas nao assisti");
                }
                $obra->adicionar($obraDAO->all_coments(),"Todas as obras que foram comentadas por todos os usuários");
                $obra->adicionar($obraDAO->all_not_coments(),"Todas as obras que não foram comentadas nenhuma vez");
                $obra->adicionar($obraDAO->obras_genero_idade("+16","terror"),"Todas as obras de terror com faixa etária +16");
                $obra->adicionar($obraDAO->by_ator("Auli Cravalho"),"Todas as obras que o ator Auli Cravalho representa algum personagem");
                $obra->adicionar($obraDAO->all_by_genero("feminino"),"Todas as obras onde todos os atores são mulheres");
                $obra->adicionar($serie->mais_3_temporada(),"Todas as séries com mais de 3 temporadas");
                $obra->adicionar($serie->menores_by_idade('40'),"Todas as séries onde todos os atores tem menos de 40 anos");
                $obra->adicionar($serie->titulo_minimo_temporada("Game of Thrones", 1),"Todas as séries com título = Game of Thrones e pelo menos 1 temporada");
                $obra->adicionar($serie->series_temporada_status(1,"Completo"),"Todas as séries com pelo menos 1 temporada e status completo");
                
                $obra->adicionar($filme->Retorna_Todos(),"Filme");
                $obra->adicionar($serie->Retorna_Todos(),"Seriado");
                ?>
            </div>
            
        </div>
    </div>
</div>
    
</body>
</html> 