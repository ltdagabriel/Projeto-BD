<div class="panel-group" id="accordion"">
    <div class="panel panel-default">
        <h4 style="padding-left:5em">Lista de todos os episódios</h4>
        <div class="panel-collapse">
          <div class="panel-body">
            <?php

                // definições de host, database, usuário e senha
                $host = "localhost";
                $db   = "myrobbie";
                $user = "gabriel";
                $pass = "";
                // conecta ao banco de dados
                $con = new mysqli($host, $user, $pass,$db); 

                  // cria a instrução SQL que vai selecionar os dados
                $sql = "SELECT obra_titulo,numero, nome, datta,sinopse,foto FROM episodio order by data_adicionado desc";
                // executa a query
                $dados = $con->query($sql) or die(mysql_error());

                if ($dados->num_rows > 0) {
                    while($row = $dados->fetch_assoc()) {

                    ?>
                        <div class="row">
                          <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                              <?php
                              echo "<img src='".$row["foto"]."' alt='...'>";
                              ?>
                              <div class="caption">
                                <h3>Thumbnail label</h3>
                                <p>...</p>
                                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                                    <?php
                                    echo "<h3> Episodio " . $row["numero"]. " - " . $row["nome"]. "</h3 <p>" . $row["sinopse"]."</p> <p>".$row["datta"]."</p>" ;
                                    ?>
                              </div>
                            </div>
                          </div>
                        </div>
                    <?php
                    }
                } else {
                        echo "0 results";
                }
                $con->close();
             ?>
          </div>
        </div>
    </div>  

     

</div>
