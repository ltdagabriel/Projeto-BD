<form id="alterar" name="alterar" method="post">

    <div class="form-group">
        <label for="exampleInputLink2">Nome</label>
        <input  name="nome" type="text" class="form-control" id="exampleInputName2">
    </div>

    <div class="form-group">
        <label for="exampleInputName2">Sinopse</label>
        <textarea   name="sinopse" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
            <label for="exampleInputLink2">Video</label>
<<<<<<< HEAD
            <input  name="foto" type="url" class="form-control" id="exampleInputName2" placeholder="http://linkdovideo.com">
=======
            <input value="<?php echo $episodio->get_video();?>" name="video" type="url" class="form-control" id="exampleInputName2" placeholder="http://linkdovideo.com">
>>>>>>> 620f20e598100829a4c562fce340e8c702e83efe
    </div>

     <div class="form-group">
            <label for="exampleInputData2">Data de Lancamento</label>
            <input  name="data" type="date" class="form-control" id="exampleInputName2">
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
