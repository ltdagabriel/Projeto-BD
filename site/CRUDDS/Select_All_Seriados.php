<?php
    require_once("classes/ConectBD/serie.php");        
    require_once("classes/ConectBD/obra.php");        
?>
<div class="panel panel-default ">
    <h4 style="padding-left: 5px">Seriado Adicionados</h4>
    <div class="panel-collapse">
      <div class="panel-body">
        <?php
        $serie=new serieDAO();
        $array= $serie->Retorna_Todos();
        if($array){
            while($row = $array->fetch(PDO::FETCH_ASSOC)){
                ?>
                    
                      <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                          <img src="<?php echo $row["foto"];?>" alt="<?php echo $row["titulo"];?>" class="img-responsive">
                          <div class="caption">
                            <h3><?php echo $row["titulo"];?></h3>
                            <p><?php echo $row["sinopse"];?></p>
                            <p><?php echo " recomendado para ".strtr($row["Faixa_Etaria_Idade"],array('+' => 'maiores de','Livre' => "todos",'12'=>"12 anos",'14'=>"14 anos",'16'=>"16 anos",'18'=>"18 anos"));?></p>
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
                                        <button name="delete2" type="submit" class="btn btn-default">Excluir</button>
                                    </form>
                                    <?php
                                   }
                                ?>
                            </p>
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
if (isset($_POST['delete2'])) {
    $obra= new obraDAO();
    $titulo=$_POST['titulo'];
    $data= $_POST['data'];
    
    ?>
    <script language='javascript' type='text/javascript'>
        var r=confirm('O Seriado <?php echo$titulo;?> será removido');
        if(r==true){
            <?php $obra->delete($titulo,$data);?>
            window.location.href='index.php';
        }
    </script>";
    <?php
    }
?>