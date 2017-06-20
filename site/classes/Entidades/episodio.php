<?php

class episodio{

    private $nome;
    private $numero;
    private $sinopse;
    private $video;
    private $data_lancamento;
    private $obra_titulo;
    private $obra_data;
    private $temporada_numero;

    public function get_nome() {
        return $this->nome;
    }
    public function set_nome($nome) {
        $this->nome=$nome;
    }

    public function get_numero() {
        return $this->numero;
    }
    public function set_numero($numero) {
        $this->numero=$numero;
    }

    public function get_sinopse() {
        return $this->sinopse;
    }
    public function set_sinopse($sinopse) {
        $this->sinopse=$sinopse;
    }

    public function get_video() {
        return $this->video;
    }
    public function set_video($video) {
        $this->video=$video;
    }

    public function get_data_lancamento() {
        return $this->data_lancamento;
    }
    public function set_data_lancamento($data_lancamento) {
        $this->data_lancamento=$data_lancamento;
    }

    public function get_obra_titulo() {
        return $this->obra_titulo;
    }
    public function set_obra_titulo($obra_titulo) {
        $this->obra_titulo=$obra_titulo;
    }

    public function get_obra_data() {
        return $this->obra_data;
    }
    public function set_obra_data($obra_data) {
        $this->obra_data=$obra_data;
    }

    public function get_temporada_numero() {
        return $this->obra_temporada_numero;
    }
    public function set_temporada_numero($temporada_numero) {
        $this->temporada_numero=$temporada_numero;
    }

    function __construct($nome, $numero, $sinopse, $video, $data_lancamento, $obra_titulo, $obra_data, $temporada_numero){
        
        $this->nome=$nome;
        $this->numero=$numero;
        $this->sinopse=$sinopse;
        $this->video=$video;
        $this->data_lancamento=$data_lancamento;
        $this->obra_titulo=$obra_titulo;
        $this->obra_data=$obra_data;
        $this->temporada_numero=$temporada_numero;
    }

}

?>