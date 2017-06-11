<?php

class serie {

    private $status;
    private $obra_titulo;
    private $obra_data;

    public function get_status() {
        return $this->status;
    }
    public function set_status($status) {
        $this->status=$status;
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