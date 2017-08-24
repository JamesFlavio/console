<?php

class Cep{
    
    private $cep;
    private $bairro;
    private $cidade_ibge;
    
    public function getCep(){
        return $this->cep;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function getCidade_ibge(){
        return $this->cidade_ibge;
    }

    public function setCep($cep){
        $this->cep = $cep;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function setCidade_ibge($cidade_ibge){
        $this->cidade_ibge = $cidade_ibge;
    }

}

?>

