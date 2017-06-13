<?php 
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();
require_once ($map->Conect_Usuario());
require_once($map->Entidade_Usuario());

?>
<script type="text/javascript">
    function validarSenha(senha1, senha2, campo) {
        var resultado = document.getElementById(campo);

        var senhaPrimaria = document.getElementById(senha1).value;
        var senhaSecundaria = document.getElementById(senha2).value;
        if (senhaPrimaria === senhaSecundaria) {
            resultado.innerHTML = "Senhas iguais";
            resultado.style.color = "green";
        } else {
            resultado.innerHTML = "Senhas Incorretas";
            resultado.style.color = "red";
        }
    }
</script>
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
        <input name="senha1" id="senha1" type="password" onKeyUp="validarSenha('senha1', 'senha2', 'resultadoCadastro');" class="form-control" placeholder="******">
        <p></p>
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
    $usuarioDAO = new usuarioDAO();
    $usuario = new usuario();
    
    $usuario->set_nome($_POST['nome']);
    $usuario->set_email($_POST['email']);
    $usuario->set_login($_POST['login']);
    $usuario->set_senha($_POST['senha2']);
    $usuario->set_foto($_POST['foto']);
    
    if($usuario->get_login() == "" || $usuario->get_login() == null){
        ?>
            <script language='javascript' type='text/javascript'>
                alert('O campo login deve ser preenchido');
            </script>
        <?php
    }
    else if($_POST['senha2']!=$_POST['senha1'] || $_POST['senha1']=="" || $_POST['senha1'] ==null){
         ?>
        <script language='javascript' type='text/javascript'>
            alert('Senhas incorreta');
        </script>
        <?php
    }
    else if($_POST['nome']=="" || $_POST['nome']==null){
        ?>
        <script language='javascript' type='text/javascript'>
            alert('Campo nome deve ser Preenchido');
        </script>
        <?php
    }
    else if($_POST['email']=="" || $_POST['email']==null){
        ?>
        <script language='javascript' type='text/javascript'>
            alert('Campo E-Mail deve ser Preenchido');
        </script>
        <?php
    }
    else
    {
        if(!$usuarioDAO->consultarUsername($usuario->get_login())){
            if ($usuarioDAO->cadastrar($usuario)) {
                ?>
                <script language='javascript' type='text/javascript'>
                    alert('Cadastrado com sucesso');window.location.href='<?php echo $map->PageIndex();?>';
                </script>
                <?php
            }     
        }
        else{
             ?>
                <script language='javascript' type='text/javascript'>
                    alert('Login em uso');
                </script>
            <?php
        }
    }
}
?>
