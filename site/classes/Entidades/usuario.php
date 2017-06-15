<?php

class usuario {

    private $login;
    private $nome;
    private $senha;
    private $foto;
    private $data;
    private $hora;
    private $ip;
    private $email;
    public function __construct() {
        $this->foto="http://www.reggaeraiz.com.br/imagens/visitante-comentario.jpg";
    }

    public function get_login() {
        return $this->login;
    }

    public function get_nome() {
        return $this->nome;
    }

    public function get_email() {
        return $this->email;
    }

    public function get_senha() {
        return $this->senha;
    }

    public function get_data() {
        return $this->data;
    }
    public function get_foto() {
        return $this->foto;
    }

    public function get_hora() {
        return $this->hora;
    }

    public function get_ip() {
        return $this->ip;
    }

    public function set_login($us_login) {
        $this->login = $us_login;
    }

    public function set_nome($us_nome) {
        $this->nome = $us_nome;
    }

    public function set_email($us_email) {
        $this->email = $us_email;
    }

    public function set_senha($us_senha) {
        $this->senha = $us_senha;
    }

    public function set_data($us_data) {
        $this->data = $us_data;
    }
    public function set_foto($us_foto) {
        $this->foto = $us_foto;
    }

    public function set_hora($us_hora) {
        $this->hora = $us_hora;
    }

    public function set_ip($us_ip) {
        $this->ip = $us_ip;
    }

}

?>