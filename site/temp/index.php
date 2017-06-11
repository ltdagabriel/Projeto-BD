
<html lang="pt-BR">
<head>
    <?php 

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
                          <label class="sr-only" for="exampleInputName3">Usuario</label>
                          <input type="login" name="login" class="form-control" id="exampleInputName3" placeholder="Login">
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
                        <button type="submit" name="entrar" class="btn btn-default">Entrar</button>
                    </form>
                <a type="button" data-toggle="modal" data-target="#CadastroUsuario">Registre-se</a>  
            </div>
            <?php
            }
            else{
                echo"Bem Vindo $login_cookie";
                echo" <form class='form-inline' name='deslogar' method='post' action='deslogar.php'> ";
                echo" <button type='submit' name='entrar' class='btn btn-default'>Sair</button>";
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
            <a class="navbar-brand" href="#">Inicio</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filmes<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                  <li><a href="#">Mais Vistos</a></li>
                  <li><a href="#">Mais Favoritados</a></li>
                  <li><a href="#">Lancamentos</a></li>
                  </ul>
              </li>
            </ul>
            <form class="navbar-form navbar-right">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Pesquise Aqui">
              </div>
              <button type="submit" class="btn btn-default">Pesquisar</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastro <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a type="button" data-toggle="modal" data-target="#CadastroFilme">Filme</a></li>
                  <li><a type="button" data-toggle="modal" data-target="#CadastroSerie">Serie</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    </div>

    <div id='conteudo'>
        <div class="panel-group" id="accordion"">
         
            <div class="panel panel-default">
                <h4 style="padding-left:5em">Lista de todos os episódios</h4>
                <div class="panel-collapse">
                  <div class="panel-body">
                    <?php
        
                        // definições de host, database, usuário e senha
                        $host = "localhost";
                        $db   = "myrobbie";
                        $user = "gabriel";
                        $pass = "";
                        // conecta ao banco de dados
                        $con = new mysqli($host, $user, $pass,$db); 

                          // cria a instrução SQL que vai selecionar os dados
                        $sql = "SELECT obra_titulo,numero, nome, datta,sinopse,foto FROM episodio order by data_adicionado desc";
                        // executa a query
                        $dados = $con->query($sql) or die(mysql_error());

                        if ($dados->num_rows > 0) {
                            while($row = $dados->fetch_assoc()) {

                            ?>
                                <div class="row">
                                  <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                      <?php
                                      echo "<img src='".$row["foto"]."' alt='...'>";
                                      ?>
                                      <div class="caption">
                                        <h3>Thumbnail label</h3>
                                        <p>...</p>
                                        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                                            <?php
                                            echo "<h3> Episodio " . $row["numero"]. " - " . $row["nome"]. "</h3 <p>" . $row["sinopse"]."</p> <p>".$row["datta"]."</p>" ;
                                            ?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            <?php
                            }
                        } else {
                                echo "0 results";
                        }
                        $con->close();
                     ?>
                  </div>
                </div>
            </div>  
            
            <div class="panel panel-default ">
                <h4 style="padding-left:5em">Lista de todos as Obras</h4>
                <div class="panel-collapse">
                  <div class="panel-body">
                    <?php
                        // definições de host, database, usuário e senha
                        $host = "localhost";
                        $db   = "myrobbie";
                        $user = "gabriel";
                        $pass = "";
                        // conecta ao banco de dados
                        $con = new mysqli($host, $user, $pass,$db); 
                        
                        // cria a instrução SQL que vai selecionar os dados
                        $sql2 = "SELECT titulo,foto,sinopse,faixa_etaria_idade,data_lancamento FROM obra order by data_adicionado desc";
                        // executa a query
                        $dados = $con->query($sql2);

                        if ($dados->num_rows > 0) {
                            while($row = $dados->fetch_assoc()) {

                            ?>
                                <div class=" col-sm-6 col-md-4">
                                  <div class="">
                                    <div class="thumbnail">
                                      <?php
                                      echo "<img src='".$row["foto"]."' alt='".$row["titulo"]."'>";
                                      $obra_titulo=$row["titulo"];
                                      $obra_data=$row["data_lancamento"];
                                      
                                      ?>
                                      <div class="caption">
                                           <?php
                                            echo "<h3>" . $row["titulo"]. "</h3 <p>" . $row["sinopse"]."</p>" ;
                                            ?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            <?php
                            }
                        } else {
                                echo "0 results";
                        }
                        $con->close();
                     ?>
                  </div>
                </div>
            </div> 
            
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
    <!-- Cadastro de Filme -->
    
    <div id="CadastroFilme" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="CadastroFilme">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cadastro de Filme</h4>
             </div>

            <div class="modal-body">
                <form id="cadastro" name="cadastro" method="post" action="cadastroFilme.php">
                    <div class="form-group">
                            <label for="exampleInputName2">Titulo: <a style="color:red">*</a></label>
                            <input name="titulo" type="text" class="form-control" id="exampleInputName2" placeholder="Titulo do Filme">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputName2">Sinopse</label>
                            <textarea name="sinopse" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                            <label for="exampleInputName2">Data de Lancamento: <a style="color:red">*</a></label>
                            <input name="data" type="datetime" class="form-control" id="exampleInputName2" placeholder="dia/mes/ano">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputLink2">Imagem de Capa</label>
                            <input name="foto" type="url" class="form-control" id="exampleInputName2" placeholder="http://asd.com">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputLink2">Video</label>
                            <input name="video" type="url" class="form-control" id="exampleInputName2" placeholder="youtube.com/asdasd">
                    </div>
                    <div class="form-group">
                            <label>Faixa Etaria: <a style="color:red">*</a></label>
                            <select name="classificacao" class="form-control">
                                    <option>Nada</option>
                                    <option>Livre</option>
                                    <option>+12</option>
                                    <option>+14</option>
                                    <option>+16</option>
                                    <option>+18</option>
                            </select>					
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputLink2">Genero</label>
                            <label class="checkbox-inline">
                              <input name="genero1" type="checkbox" id="inlineCheckbox1" value="option1"> Ação
                            </label>
                            <label class="checkbox-inline">
                              <input name="genero2" type="checkbox" id="inlineCheckbox2" value="option2"> Drama
                            </label>
                            <label class="checkbox-inline">
                              <input name="genero3" type="checkbox" id="inlineCheckbox3" value="option3"> Terror
                            </label>
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
	
     <!-- Cadastro de Serie -->
    
    <div id="CadastroSerie" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="CadastroSerie">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cadastro de Series</h4>
             </div>

            <div class="modal-body">
                <form id="cadastro" name="cadastro" method="post" action="cadastroSerie.php">
                    <div class="form-group">
                            <label for="exampleInputName2">Titulo: <a style="color:red">*</a></label>
                            <input name="titulo" type="text" class="form-control" id="exampleInputName2" placeholder="Titulo da Serie">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputName2">Sinopse</label>
                            <textarea name="sinopse" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                            <label for="exampleInputName2">Data de Lancamento: <a style="color:red">*</a></label>
                            <input name="data" type="datetime" class="form-control" id="exampleInputName2" placeholder="dia/mes/ano">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputLink2">Imagem de Capa</label>
                            <input name="foto" type="url" class="form-control" id="exampleInputName2" placeholder="http://asd.com">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputLink2">Status</label>
                            <input name="status" type="text" class="form-control" id="exampleInputName2" placeholder="Em lançamento,completo,etc">
                    </div>
                    <div class="form-group">
                            <label>Faixa Etaria: <a style="color:red">*</a></label>
                            <select name="classificacao" class="form-control">
                                    <option>Nada</option>
                                    <option>Livre</option>
                                    <option>+12</option>
                                    <option>+14</option>
                                    <option>+16</option>
                                    <option>+18</option>
                            </select>					
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputLink2">Genero</label>
                            <label class="checkbox-inline">
                              <input name="genero1" type="checkbox" id="inlineCheckbox1" value="option1"> Ação
                            </label>
                            <label class="checkbox-inline">
                              <input name="genero2" type="checkbox" id="inlineCheckbox2" value="option2"> Drama
                            </label>
                            <label class="checkbox-inline">
                              <input name="genero3" type="checkbox" id="inlineCheckbox3" value="option3"> Terror
                            </label>
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
     <script>
         function deletarObra(param1,param2){
             console.log(param1);
         }
     </script>
	
    
   
</body>
</html> 