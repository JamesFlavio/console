<?php

class VendaItem{

    private $id;
    private $venda_id;
    private $produto_id;
    private $quantidade;
    private $valor_unitario;
    
    public function __construct(){}
    
    public function __get($name){
        return $this->$name;
    }
    
    public function getId(){
        return $this->id;
    }

    public function getVenda_id(){
        return $this->venda_id;
    }

    public function getProduto_id(){
        return $this->produto_id;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function getValor_unitario(){
        return $this->valor_unitario;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setVenda_id($venda_id){
        $this->venda_id = $venda_id;
    }

    public function setProduto_id($produto_id){
        $this->produto_id = $produto_id;
    }

    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

    public function setValor_unitario($valor_unitario){
        $this->valor_unitario = $valor_unitario;
    }

}

