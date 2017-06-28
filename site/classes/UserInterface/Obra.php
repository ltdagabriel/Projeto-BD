<?php 
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();

class UIObra{
    private $map;
    public function __construct() {
        $this->map=new mapa();
    }
    public function adicionar($array,$tituloobra){
        ?>
        <div class="panel panel-default ">
            <h4 style="padding-left: 5px"><a style="text-decoration: none" role="button" data-toggle="collapse" href="#<?php echo strtr($tituloobra,array(' ' => "_", "=" =>"_","+" =>"_","-" =>"_")) ?>" aria-expanded="false"><?php echo$tituloobra;?></a></h4>
            <div class="panel-collapse">
              <div class="collapse panel-body" id="<?php echo strtr($tituloobra,array(' ' => "_", "=" =>"_","+" =>"_","-" =>"_")) ?>">
                <?php
                if($array){
                    while($row = $array->fetch(PDO::FETCH_ASSOC)){
                        ?>

                              <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                  <img src="<?php echo $row["foto"];?>" alt="<?php echo $row["titulo"];?>" class="img-responsive">
                                  <div class="caption">
                                    <h3><?php echo $row["titulo"];?></h3>
                                    <p><?php echo $row["sinopse"];?></p>
                                    <p><?php echo " recomendado para ".strtr($row["Faixa_Etaria_Idade"],array('+' => 'maiores de ','Livre' => "todos",'12'=>"12 anos",'14'=>"14 anos",'16'=>"16 anos",'18'=>"18 anos"));?></p>
                                    <p>
                                    <form method="get" action="<?php echo$this->map->Info_Obra();?>">
                                                <div class="collapse">
                                                    <div class="form-group">
                                                        <input value="<?php echo $row["titulo"];?>" name="titulo" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <input value="<?php echo $row["data_lancamento"];?>" name="data" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <button name="info" type="submit" class="btn btn-default">Informações</button>
                                            </form>
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

                        <?php
                    }
                }
                ?>
              </div>
            </div>
        </div>
    <?php
   if (isset($_POST['delete'])) {
            require_once ($this->map->Conect_Obra());
            $obra= new obraDAO();
            $titulo=$_POST['titulo'];
            $data= $_POST['data'];
            $obra->delete($titulo,$data);
            
        }
    }
}
