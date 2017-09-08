<?php

class Estado{

    private $uf;
    private $codigo;
    private $nome;
    
    public function __construct(){}
    
    public function __get($name){
        return $this->$name;
    }
    
    public function getUf(){
        return $this->uf;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setUf($uf){
        $this->uf = $uf;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    
}

