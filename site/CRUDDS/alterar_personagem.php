<?php 
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();
require_once ($map->Conect_Personagem());
require_once($map->Entidade_Personagem());
require_once ($map->Conect_Obra());
require_once($map->Entidade_Obra());

?>
<form id="alterar" name="alterar" method="post">

    <div class="form-group">
            <label for="exampleInputLink2">Foto</label>
            <input value="<?php echo $personagem->get_foto();?>" name="foto" type="url" class="form-control" id="exampleInputName2" placeholder="http://linkdaimagemaqui.com">
    </div>

    <div class="form-inline">
            <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="cadastrar" type="submit" class="btn btn-default">Atualizar</button>
                    </div>
            </div>
            
            <div class="form-group">
            <span class="style1" style="color:red">* Campos com * s&atilde;o obrigat&oacute;rios!          </span>
            </div>
    </div>
</form>
