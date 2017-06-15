<?php

class obra {

    private $titulo;
    private $sinopse;
    private $foto;
    private $Faixa_Etaria;
    private $data_lancamento;
    private $data_add;
    private $hora_add;
    private $view;

    public function __construct() {
        $this->view="true";
    }

    public function get_Titulo() {
        return $this->titulo;
    }
    public function get_Sinopse() {
        return $this->sinopse;
    }
    public function get_Foto() {
        return $this->foto;
    }
    public function get_FEtaria() {
        return $this->Faixa_Etaria;
    }
    public function get_DataLancamento() {
        return $this->data_lancamento;
    }
    public function get_DataAdd() {
        return $this->data_add;
    }
    public function get_HoraAdd() {
        return $this->hora_add;
    }
    public function set_Titulo($titulo){
        $this->titulo=$titulo;
    }
    public function set_Sinopse($sinopse){
        $this->sinopse=$sinopse;
    }
    public function set_Foto($foto){
        if($foto=="" || $foto==null){
            $this->foto="https://ilhafutebol.files.wordpress.com/2011/07/verminho.jpg";
        }
        else{  
            $this->foto=$foto;
        }
    }
    public function set_FEtaria($F_Etaria){
        $this->Faixa_Etaria=$F_Etaria;
    }
    public function set_Data_Lancamento($data){
        $this->data_lancamento=$data;
    }
    public function set_Data_Add($data){
        $this->data_add=$data;
    }
    public function set_Hora_Add($hora){
        $this->hora_add=$hora;
    }
    public function get_View(){
        return $this->view;
    }
    public function set_View($view){
        $this->view=$view;
    }
}

?>