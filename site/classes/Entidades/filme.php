<?php

class filme {

    private $trailer;
    private $obra_titulo;
    private $obra_data;

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
    function __construct($trailer,$obra_titulo,$obra_data){
        $this->trailer=$trailer;
        $this->obra_data=$obra_data;
        $this->obra_titulo=$obra_titulo;
    }

}

?>