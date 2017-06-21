<?php

class temporada {

    private $numero;
    private $foto;
    private $trailer;
    private $obra_titulo;
    private $obra_data;

    public function get_numero() {
        return $this->numero;
    }
    public function set_numero($numero) {
        $this->numero=$numero;
    }
    public function get_foto() {
        return $this->foto;
    }
    public function set_foto($foto) {
        $this->foto=$foto;
    }
    public function get_trailer() {
        return $this->trailer;
    }
    public function set_trailer($trailer) {
        $this->trailer=$trailer;
    }
    public function get_titulo() {
        return $this->obra_titulo;
    }
    public function set_titulo($titulo) {
        $this->obra_titulo=$titulo;
    }
    public function get_data() {
        return $this->obra_data;
    }
    public function set_data($data) {
        $this->obra_data=$data;
    }
   

}

?>