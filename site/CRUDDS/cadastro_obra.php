<?php
require_once ("classes/ConectBD/obra.php");
require_once("classes/Entidades/obra.php");

$usuarioDAO = new usuarioDAO();
$usuario = new usuario();

?>
<script type="text/javascript">
    function validarSenha(senha1, senha2, campo) {
        var resultado = document.getElementById(campo);

        senhaPrimaria = document.getElementById(senha1).value;
        senhaSecundaria = document.getElementById(senha2).value;
        if (senhaPrimaria == senhaSecundaria) {
            resultado.innerHTML = "Senhas iguais";
            resultado.style.color = "green";
        } else {
            resultado.innerHTML = "Senhas Incorretas";
            resultado.style.color = "red";
        }
    }
</script>
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


<?php
if (isset($_POST['cadastrar'])) {
    $usuario->set_nome($_POST['nome']);
    $usuario->set_email($_POST['email']);
    $usuario->set_login($_POST['login']);
    $usuario->set_senha($_POST['senha2']);
    $usuario->set_foto($_POST['foto']);
    
    if($usuario->get_login() == "" || $usuario->get_login() == null){
        ?>
            <script language='javascript' type='text/javascript'>
                alert('O campo login deve ser preenchido');window.location.href='cadastro.php';
            </script>";
        <?php
    }
    else if($_POST['senha2']!=$_POST['senha1'] || $_POST['senha1']=="" || $_POST['senha1'] ==null){
         ?>
        <script language='javascript' type='text/javascript'>
            alert('Senhas incorreta');window.location.href='cadastro.php';
        </script>";
        <?php
    }
    else if($_POST['nome']=="" || $_POST['nome']==null){
        ?>
        <script language='javascript' type='text/javascript'>
            alert('Campo nome deve ser Preenchido');window.location.href='cadastro.php';
        </script>";
        <?php
    }
    else if($_POST['email']=="" || $_POST['email']==null){
        ?>
        <script language='javascript' type='text/javascript'>
            alert('Campo E-Mail deve ser Preenchido');window.location.href='cadastro.php';
        </script>";
        <?php
    }
    else
    {
        if(!$usuarioDAO->consultarUsername($usuario->get_login())){
            if ($usuarioDAO->cadastrar($usuario)) {
                ?>
                <script language='javascript' type='text/javascript'>
                    alert('Cadastrado com sucesso');window.location.href='index.php';
                </script>";
                <?php
            }     
        }
        else{
             ?>
                <script language='javascript' type='text/javascript'>
                    alert('Login em uso');window.location.href='cadastro.php';
                </script>";
            <?php
        }
    }
}
?>
