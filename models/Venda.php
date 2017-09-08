<?php

class Venda{

    private $id;
    private $cadastro_id;
    private $data;
    
    public function __construct(){}
    
    public function __get($name){
        return $this->$name;
    }
    
    public function getId(){
        return $this->id;
    }

    public function getCadastro_id(){
        return $this->cadastro_id;
    }

    public function getData(){
        return $this->data;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setCadastro_id($cadastro_id){
        $this->cadastro_id = $cadastro_id;
    }

    public function setData($data){
        $this->data = $data;
    }

}

