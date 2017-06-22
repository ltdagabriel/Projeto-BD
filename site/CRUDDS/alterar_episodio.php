<?php 
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();
require_once ($map->Conect_Serie());
require_once($map->Entidade_Serie());
require_once ($map->Conect_Obra());
require_once($map->Entidade_Obra());
require_once ($map->Conect_Temporada());
require_once($map->Entidade_Temporada());
require_once ($map->Conect_Episodio());
require_once($map->Entidade_Episodio());

?>
<form id="alterar" name="alterar" method="post">

    <div class="form-group">
        <label for="exampleInputLink2">Nome</label>
        <input value="<?php echo $episodio->get_nome();?>" name="nome" type="text" class="form-control" id="exampleInputName2">
    </div>

    <div class="form-group">
        <label for="exampleInputName2">Sinopse</label>
        <textarea   name="sinopse" class="form-control" rows="3"><?php echo $episodio->get_sinopse();?></textarea>
    </div>

    <div class="form-group">
            <label for="exampleInputLink2">Video</label>
            <input value="<?php echo $episodio->get_video();?>" name="video" type="url" class="form-control" id="exampleInputName2" placeholder="http://linkdovideo.com">
    </div>

     <div class="form-group">
            <label for="exampleInputData2">Data de Lancamento</label>
            <input value="<?php echo $episodio->get_data_lancamento();?>" name="data" type="date" class="form-control" id="exampleInputName2">
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
