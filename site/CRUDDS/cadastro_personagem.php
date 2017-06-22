<form id="cadastro" name="cadastro" method="get">
    <div class="form-group">
            <label for="exampleInputName2">Nome <a style="color:red">*</a></label>
            <input name="nome" type="text" class="form-control" id="exampleInputName2" placeholder="Nome do Personagem">
    </div>

    <div class="form-group">
            <label for="exampleInputLink2">Foto</label>
            <input name="foto" type="url" class="form-control" id="exampleInputName2" placeholder="<imagemlink>">
    </div>


    <div class="form-inline">
            <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="cadastrar_personagem" type="submit" class="btn btn-default">Enviar</button>
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