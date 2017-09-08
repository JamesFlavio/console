<?php

/** 
 * Plain Old PHP Object - (POPO) que mapeia a tabela Produto do banco de dados.
 * 
 */
class Produto{
    
    private $id;
    private $tipo;
    private $fabrica;
    private $barra;
    private $nome;
    private $unidade;
    private $ncm_ncm;                   //fk
    private $cest;
    private $grupo;
    private $cfop_entrada_cfop_cfop;    //fk
    private $cfop_saida_cfop_cfop;      //fk
    private $estoque;
    private $minimo;
    private $maximo;
    private $preco_custo;
    private $preco_venda;
    private $preco_minimo;
    private $observacao;
    /**
     */
    public function __construct(){}
    
    public function __get($name){
        return $this->$name;
    }
    
    public function getId(){
        return $this->id;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function getFabrica(){
        return $this->fabrica;
    }

    public function getBarra(){
        return $this->barra;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getUnidade(){
        return $this->unidade;
    }

    public function getNcm_ncm(){
        return $this->ncm_ncm;
    }

    public function getCest(){
        return $this->cest;
    }

    public function getGrupo(){
        return $this->grupo;
    }

    public function getCfop_entrada_cfop_cfop(){
        return $this->cfop_entrada_cfop_cfop;
    }

    public function getCfop_saida_cfop_cfop(){
        return $this->cfop_saida_cfop_cfop;
    }

    public function getEstoque(){
        return $this->estoque;
    }

    public function getMinimo(){
        return $this->minimo;
    }

    public function getMaximo(){
        return $this->maximo;
    }

    public function getPreco_custo(){
        return $this->preco_custo;
    }

    public function getPreco_venda(){
        return $this->preco_venda;
    }

    public function getPreco_minimo(){
        return $this->preco_minimo;
    }

    public function getObservacao(){
        return $this->observacao;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function setFabrica($fabrica){
        $this->fabrica = $fabrica;
    }

    public function setBarra($barra){
        $this->barra = $barra;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setUnidade($unidade){
        $this->unidade = $unidade;
    }

    public function setNcm_ncm($ncm_ncm){
        $this->ncm_ncm = $ncm_ncm;
    }

    public function setCest($cest){
        $this->cest = $cest;
    }

    public function setGrupo($grupo){
        $this->grupo = $grupo;
    }

    public function setCfop_entrada_cfop_cfop($cfop_entrada_cfop_cfop){
        $this->cfop_entrada_cfop_cfop = $cfop_entrada_cfop_cfop;
    }

    public function setCfop_saida_cfop_cfop($cfop_saida_cfop_cfop){
        $this->cfop_saida_cfop_cfop = $cfop_saida_cfop_cfop;
    }

    public function setEstoque($estoque){
        $this->estoque = $estoque;
    }

    public function setMinimo($minimo){
        $this->minimo = $minimo;
    }

    public function setMaximo($maximo){
        $this->maximo = $maximo;
    }

    public function setPreco_custo($preco_custo){
        $this->preco_custo = $preco_custo;
    }

    public function setPreco_venda($preco_venda){
        $this->preco_venda = $preco_venda;
    }

    public function setPreco_minimo($preco_minimo){
        $this->preco_minimo = $preco_minimo;
    }

    public function setObservacao($observacao){
        $this->observacao = $observacao;
    }

}

