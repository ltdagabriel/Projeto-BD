<?php

class personagem{

    private $nome;
    private $foto;

    public function get_nome() {
        return $this->nome;
    }
    public function set_nome($nome) {
        $this->nome=$nome;
    }

    public function get_foto() {
        return $this->foto;
    }
    public function set_foto($foto) {
        $this->foto=$foto;
    }

}

?>