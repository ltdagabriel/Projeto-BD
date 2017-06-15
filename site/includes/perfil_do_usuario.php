 
$usuario

 <div class=" panel-default panel">
                <div class="panel-body">
                    <div id="obra_info">
                            <div class="navbar-left col-md-4 col-lg-4">
                                <img class="img-responsive img-rounded" src="<?php echo $usuario->get_foto();?>">
                            </div>                            
                            <div class="navbar-left col-md-8 col-lg-8">
                                <h3>Perfil</h3>
                                   <p>Nome: <?php echo $usuario->get_nome();?></p>
                            </div>
                            <div class="navbar-left col-md-8 col-lg-8">
                                <p>Email: <?php echo $usuario->get_email();?></p>
                            </div>

                            <?php 
                            if($_SESSION['logado']==1){
                            }
                            ?>
                        </div>
                    </div>
                </div>