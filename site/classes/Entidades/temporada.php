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
    public function set_numero($status) {
        $this->numero=$numero;
    }
    public function get_foto() {
        return $this->foto;
    }
    public function set_foto($status) {
        $this->foto=$foto;
    }
    public function get_trailer() {
        return $this->trailer;
    }
    public function set_trailer($status) {
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
    function __construct($status,$obra_titulo,$obra_data){
        $this->status=$status;
        $this->obra_data=$obra_data;
        $this->obra_titulo=$obra_titulo;
    }

}

?>