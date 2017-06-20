<form id="cadastro" name="cadastro" method="post">
    <div class="form-group">
            <label for="exampleInputName2">Nome: <a style="color:red">*</a></label>
            <input name="titulo" type="text" class="form-control" id="exampleInputName2" placeholder="Titulo do Filme">
    </div>
    <div class="form-group">
            <label for="exampleInputName2">Idade:</label>
            <input name="idade" class="text"></input>
    </div>
    <div class="form-group">
            <label for="exampleInputData2">Sexo:</label>
            <select name="sexo" class="form-control">
                    <option>Masculino</option>
                    <option>Feminino</option>
            </select>
    </div>
    <div class="form-group">
            <label for="exampleInputLink2">Biografia:</label>
            <textarea name="biografia" type="text" class="form-control" id="exampleInputName2"> </textarea>
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