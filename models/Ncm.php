<?php

class Ncm{
    
    public $ncm;
    public $descricao;
    
    public function __construct(){}
    
    public function __get($name){
        return $this->$name;
    }
    
    public function getNcm(){
        return $this->ncm;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setNcm($ncm){
        $this->ncm = $ncm;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }   
    
}

