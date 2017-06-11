
<html lang="pt-BR">
<head>
<?php
    session_start();
    
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
    <div id="header" class="col-lg-12 col-md-12 col-sm-12">
        <?php include("includes/header.php");?>
    </div>
    <div id='menu' class="col-lg-12 col-md-12">
        <?php include("includes/menu.php");?>
    </div>

    <div id='conteudo'>
        <?php include("includes/conteudo_index.php");?>
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