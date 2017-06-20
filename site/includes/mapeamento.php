<?php

class mapa {
    private $page1;
    private $page2;
    private $page3;
    private $page4;
    private $conectfilme;
    private $conectserie;
    private $conectobra;
    private $conectepisodio;
    private $menu;
    private $cadastro_serie;
    private $cadastro_filme;
    private $cadastro_usuario;
    private $alterar_serie;
    private $alterar_filme;
    private $alterar_usuario;
    private $read_filme;
    private $interfaceobra;
    private $logologin;
    private $conectusuario;
    private $entidadeUsuario;
    private $entidadeSerie;
    private $entidadeObra;
    private $entidadeFilme;
    private $perfil;
    public function __construct() {
        $this->page1="/Projeto-BD/site/index.php";
        $this->page2="/Projeto-BD/site/Cadastro.php";
        $this->page3="/Projeto-BD/site/Cadastro_Filme.php";
        $this->page4="/Projeto-BD/site/Cadastro_Serie.php";
        $this->menu="includes/menu.php";
        $this->interfaceobra="classes/UserInterface/Obra.php";
        $this->logologin='includes/header.php';
        $this->perfil='CRUDDS/alterar_usuario.php';
        $this->cadastro_serie="CRUDDS/cadastro_serie.php";
        $this->cadastro_filme="CRUDDS/cadastro_filme.php";
        $this->alterar_serie="CRUDDS/alterar_serie.php";
        $this->alterar_filme="CRUDDS/alterar_filme.php";
        $this->read_filme="/Projeto-BD/site/read_update_obra.php";
        $this->cadastro_usuario="CRUDDS/cadastro.php";
        $this->conectfilme="classes/ConectBD/filme.php";
        $this->conectserie="classes/ConectBD/serie.php";
        $this->conectobra="classes/ConectBD/obra.php";
        $this->conectusuario="classes/ConectBD/usuario.php";
        $this->conectepisodio="classes/ConectBD/episodio.php";
        $this->entidadeUsuario="classes/Entidades/usuario.php";
        $this->entidadeSerie="classes/Entidades/serie.php";
        $this->entidadeObra="classes/Entidades/obra.php";
        $this->entidadeFilme="classes/Entidades/filme.php";
        $this->cadastro_usuario="CRUDDS/cadastro.php";
    }
    public function PageIndex(){
        return $this->page1;
    }
    public function PageCadastroUsuario(){
        return $this->page2;
    }
    public function PageCadastroFilme(){
        return $this->page3;
    }
    public function PageCadastroSerie(){
        return $this->page3;
    }
    public function IncludeMenu(){
        return $this->menu;
    }
    public function IncludeLogoLogin(){
        return $this->logologin;
    }
    public function Cadastro_Serie(){
        return $this->cadastro_serie;
    }
    public function Cadastro_Filme(){
        return $this->cadastro_filme;
    }
    public function Alterar_Filme(){
        return $this->alterar_filme;
    }
    public function Alterar_Serie(){
        return $this->alterar_serie;
    }
    public function Info_Obra(){
        return $this->read_filme;
    }
    public function Cadastro_Usuario(){
        return $this->cadastro_usuario;
    }
    public function Interface_Obra(){
        return $this->interfaceobra;
    }
    public function Conect_Filme(){
        return $this->conectfilme;
    }
    public function Conect_Serie(){
        return $this->conectserie;
    }
    public function Conect_Obra(){
        return $this->conectobra;
    }
    public function Conect_Usuario(){
        return $this->conectusuario;
    }
    public function Conect_Episodio(){
        return $this->conectepisodio;
    }
    public function Entidade_Usuario(){
        return $this->entidadeUsuario;
    }
    public function Entidade_Obra(){
        return $this->entidadeObra;
    }
    public function Entidade_Filme(){
        return $this->entidadeFilme;
    }
    public function Entidade_Serie(){
        return $this->entidadeSerie;
    }
    public function Alterar_Usuario(){
        return $this->perfil;
    }
}
