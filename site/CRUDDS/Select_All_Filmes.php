<?php
    require_once("classes/ConectBD/filme.php");        
    require_once("classes/ConectBD/obra.php");        
?>
<div class="panel panel-default ">
    <h4>Filmes Adicionados</h4>
    <div class="panel-collapse">
      <div class="panel-body">
        <?php
        $filme=new filmeDAO();
        $array= $filme->Retorna_Todos();
        if($array){
            while($row = $array->fetch(PDO::FETCH_ASSOC)){
                ?>
                    <div class="row">
                      <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                          <img src="<?php echo $row["foto"];?>" alt="<?php echo $row["titulo"];?>" class="img-responsive">
                          <div class="caption">
                            <h3><?php echo $row["titulo"]." Recomendado para".$row["Faixa_Etaria_Idade"];?></h3>
                            <p><?php echo $row["sinopse"];?></p>
                            <p>
                                <a href="info_obra.php/titulo=<?php echo $row["titulo"];?>&data=<?php echo $row["data_lancamento"];?>" class="btn btn-primary" role="button">Mais Informações</a>
                                <?php 
                                   if($_SESSION['logado']==1){
                                    ?>
                                    <form method="post">
                                        <div class="collapse">
                                            <div class="form-group">
                                                <input value="<?php echo $row["titulo"];?>" name="titulo" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input value="<?php echo $row["data_lancamento"];?>" name="data" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <button name="delete" type="submit" class="btn btn-default">Excluir</button>
                                    </form>
                                    <?php
                                   }
                                ?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php
            }
        }
        ?>
      </div>
    </div>
</div>
<?php
if (isset($_POST['delete'])) {
    $obra= new obraDAO();
    $obra->delete($_POST['titulo'],$_POST['data']);
}
?>