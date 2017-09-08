<?php

class Cidade{

    private $ibge;
    private $nome;
    private $estado_uf;
    
    public function __construct(){}
    
    public function __get($name){
        return $this->$name;
    }
    
    public function getIbge(){
        return $this->ibge;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getEstado_uf(){
        return $this->estado_uf;
    }

    public function setIbge($ibge){
        $this->ibge = $ibge;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setEstado_uf($estado_uf){
        $this->estado_uf = $estado_uf;
    }

}

