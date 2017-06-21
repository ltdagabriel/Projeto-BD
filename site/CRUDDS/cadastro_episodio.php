<form id="cadastro" name="cadastro" method="get">
    <div class="form-group">
            <label for="exampleInputName2">Titulo:</label>
            <input name="nome" type="text" class="form-control" id="exampleInputName2" placeholder="Nome do Episodio">
    </div>
    <div class="form-group">
            <label for="exampleInputName2">Numero: <a style="color:red">*</a></label>
            <input name="numero" type="text" class="form-control" id="exampleInputName2" placeholder="Numero">
    </div>
    <div class="form-group">
            <label for="exampleInputName2">Sinopse</label>
            <textarea name="sinopse" class="form-control" rows="3"></textarea>
    </div>

    <div class="form-group">
            <label for="exampleInputLink2">Video</label>
            <input name="video" type="url" class="form-control" id="exampleInputName2" placeholder="youtube.com/algumacoisaaqui">
    </div>

    <div class="form-group">
            <label for="exampleInputData2">Data de Lancamento:</label>
            <input name="data" type="date" class="form-control" id="exampleInputName2" placeholder="dia/mes/ano">
    </div>


    <div class="form-inline">
            <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="cadastrar_episodio" type="submit" class="btn btn-default">Enviar</button>
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
if (isset($_GET['cadastrar_episodio'])) {
    $episodioDAO = new episodioDAO();
    $episodio = new episodio();
    $episodio->set_nome($_GET['nome']);
    $episodio->set_obra_data($_SESSION['data']);
    $episodio->set_obra_titulo($_SESSION['titulo']);
    $episodio->set_numero($_GET['numero']);
    $episodio->set_sinopse($_GET['sinopse']);
    $episodio->set_data_lancamento($_GET['data']);
    $episodio->set_temporada_numero($temporada_numero);
    $episodio->set_video($_GET['video']);
    if ($episodioDAO->cadastrar($episodio)) {
        ?>
        <script language='javascript' type='text/javascript'>
            alert('Cadastrado com sucesso');
        </script>
        <?php
    }     
    else{
         ?>
            <script language='javascript' type='text/javascript'>
                alert('Ja existente');
            </script>
        <?php
    }
}

?>
