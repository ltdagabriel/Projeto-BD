<div class="row">
    <div id='menu' class="col-lg-12 col-md-12">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Inicio</a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filmes<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                      <li><a href="#">Mais Vistos</a></li>
                      <li><a href="#">Mais Favoritados</a></li>
                      <li><a href="#">Lancamentos</a></li>
                      </ul>
                  </li>
                </ul>
                <form class="navbar-form navbar-right">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Pesquise Aqui">
                  </div>
                  <button type="submit" class="btn btn-default">Pesquisar</button>
                </form>
                 <?php
                    if($_SESSION['logado']==1){
                     ?>
                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastro <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a type="button" href="Cadastro_Filme.php">Filme</a></li>
                          <li><a type="button" href="Cadastro_Serie.php">Serie</a></li>
                        </ul>
                      </li>
                    </ul>
                    <?php
                    }
                ?>
              </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </div>
</div>