<?php 
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();
require_once ($map->Conect_Usuario());
require_once($map->Entidade_Usuario());

?>

<form method="post">
    <div class="form-group">
            <label for="exampleInputName2">Nome:</label>
            <input value="<?php echo $usuario->get_nome();?>" name="nome" type="text" class="form-control" id="exampleInputName2">
    </div>
    <div class="form-group">
            <label for="exampleInputEmail2">Email</label>
            <input value="<?php echo $usuario->get_email();?>" name="email" type="email" class="form-control" id="exampleInputEmail2">
    </div>

    <div class="form-group">
            <label for="exampleInputName2">Foto: </label>
            <input value="<?php echo $usuario->get_foto();?>" name="foto" type="url" class="form-control" id="foto" placeholder="http://pinterest... .jpg/png">
    </div>
    <div class="form-group">
        <label for="inputPassword3">Nova Senha:</label>
        <input name="senha1" id="senha1" type="password" onKeyUp="validarSenha('senha1', 'senha2', 'resultadoCadastro');" class="form-control" placeholder="******">
        <p></p>
    </div>
    <div class="form-group">
        <label for="inputPassword3">Confirmar Nova Senha: <a style="color:red">*</a></label>
        <input name="senha2" id="senha2" type="password" onKeyUp="validarSenha('senha1', 'senha2', 'resultadoCadastro');" class="form-control" placeholder="******">
    </div>
    <div class="form-inline">
        <div class="form-group">
            <p id="resultadoAtualizarCadastro" style="font-weight: bold;">&nbsp;</p>
        </div>
            <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="atualizar" type="submit" class="btn btn-default">Enviar</button>
                    </div>
            </div>
            <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="limpar" type="reset" class="btn btn-default">Limpar</button>
                    </div>
            </div>
    </div>
</form>

