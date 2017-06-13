<?php

class mapa {
    private $page1;
    private $page2;
    private $page3;
    private $page4;
    private $conectfilme;
    private $conectserie;
    private $conectobra;
    private $menu;
    private $cadastro_serie;
    private $cadastro_filme;
    private $cadastro_usuario;
    private $interfaceobra;
    private $logologin;
    public function __construct() {
        $this->page1="/Projeto-BD/site/index.php";
        $this->page2="/Projeto-BD/site/Cadastro.php";
        $this->page3="/Projeto-BD/site/Cadastro_Filme.php";
        $this->page4="/Projeto-BD/site/Cadastro_Serie.php";
        $this->menu="includes/menu.php";
        $this->interfaceobra="classes/UserInterface/Obra.php";
        $this->logologin='includes/header.php';
        $this->cadastro_serie="CRUDDS/cadastro_serie.php";
        $this->cadastro_filme="CRUDDS/cadastro_filme.php";
        $this->cadastro_usuario="CRUDDS/cadastro.php";
        $this->conectfilme="classes/ConectBD/filme.php";
        $this->conectserie="classes/ConectBD/serie.php";
        $this->conectobra="classes/ConectBD/obra.php";
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
}
