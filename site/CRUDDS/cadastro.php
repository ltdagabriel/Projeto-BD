<?php
require_once ("classes/ConectBD/usuario.php");
require_once("classes/Entidades/usuario.php");

$usuarioDAO = new usuarioDAO();
$usuario = new usuario();

?>

<form id="cadastro" name="cadastro" method="post">
    <div class="form-group">
            <label for="exampleInputName2">Nome: <a style="color:red">*</a></label>
            <input name="nome" type="text" class="form-control" id="exampleInputName2" placeholder="Seu nome">
    </div>
    <div class="form-group">
            <label for="exampleInputEmail2">Email<a style="color:red">*</a></label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail2" placeholder="seuemail@exemplo.com">
    </div>
    <div class="form-group">
            <label for="exampleInputName2">Login: <a style="color:red">*</a></label>
            <input name="login" type="text" class="form-control" id="exampleInputName2" placeholder="Seu login">
    </div>
    <div class="form-group">
            <label for="exampleInputName2">Foto: </label>
            <input name="foto" type="url" class="form-control" id="foto" placeholder="http://pinterest... .jpg/png">
    </div>
    <div class="form-group">
        <label for="inputPassword3">Senha: <a style="color:red">*</a></label>
        <input name="senha1" id="senha1" type="password" class="form-control" placeholder="******">
    </div>
    <div class="form-group">
        <label for="inputPassword3">Confirmar senha: <a style="color:red">*</a></label>
        <input name="senha2" id="senha2" type="password" onKeyUp="validarSenha('senha1', 'senha2', 'resultadoCadastro');" class="form-control" placeholder="******">
    </div>
    <div class="form-inline">
        <div class="form-group">
            <p id="resultadoCadastro" style="font-weight: bold;">&nbsp;</p>
        </div>
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
           
    if (!$usuarioDAO->consultarUsername($_POST['login'])) {

        if ($usuarioDAO->cadastrar($usuario)) {
            ?>
            <script type = "text/javascript">
                document.getElementById("resultadoCadastro").innerHTML = "Cadastrado com sucesso.";
                document.getElementById("resultadoCadastro").style.color = "green";</script>
            <?php
        }
    }   
    else {
        ?>
        <script type="text/javascript">
            document.getElementById("resultadoCadastro").innerHTML = "O Login ja esta em uso.";
            document.getElementById("resultadoCadastro").style.color = "red";</script>
        <?php
    }
}
?>
