<?php

class Cfop{
    private $cfop;
    private $descricao;
    
    public function __construct(){}
    
    public function __get($name){
        return $this->$name;
    }
    
    public function getCfop(){
        return $this->cfop;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setCfop($cfop){
        $this->cfop = $cfop;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
}

