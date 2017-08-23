<?php
//namespace Models;

/**
 * Plain Old Java Object - (POJO) que mapeia a tabela Cadastro do banco de dados.
 *
 */
class Cadastro{
    
    private $id = "";
    private $tipo;
    private $cnpj_ou_cpf;
    private $ie_ou_rg;
    private $im;
    private $razao_social_ou_nome;
    private $nome_fantasia_ou_sobrenome;
    private $apelido;
    private $cep_cep;
    private $endereco;
    private $numero;
    private $bairro;
    private $complemento;
    private $telefone;
    private $ramal;
    private $fax;
    private $celular;
    private $responsavel;
    private $site;
    private $novidade;
    private $promocao;
    private $observacao;
    
    public function __construct(){}
    
    /**
     * Método mágico para acesso aos atributos.
     * 
     * @param mixed $name Nome do atributo a ser acessado.
     * @return mixed O atributo.
     */
    public function __get($name){
        return $this->$name;
    }
    
    public function getId(){
        return $this->id;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function getCnpj_ou_cpf(){
        return $this->cnpj_ou_cpf;
    }

    public function getIe_ou_rg(){
        return $this->ie_ou_rg;
    }

    public function getIm(){
        return $this->im;
    }

    public function getRazao_social_ou_nome(){
        return $this->razao_social_ou_nome;
    }

    public function getNome_fantasia_ou_sobrenome(){
        return $this->nome_fantasia_ou_sobrenome;
    }

    public function getApelido(){
        return $this->apelido;
    }

    public function getCep_cep(){
        return $this->cep_cep;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function getComplemento(){
        return $this->complemento;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function getRamal(){
        return $this->ramal;
    }

    public function getFax(){
        return $this->fax;
    }

    public function getCelular(){
        return $this->celular;
    }

    public function getResponsavel(){
        return $this->responsavel;
    }

    public function getSite(){
        return $this->site;
    }

    public function getNovidade(){
        return $this->novidade;
    }

    public function getPromocao(){
        return $this->promocao;
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

    public function setCnpj_ou_cpf($cnpj_ou_cpf){
        $this->cnpj_ou_cpf = $cnpj_ou_cpf;
    }

    public function setIe_ou_rg($ie_ou_rg){
        $this->ie_ou_rg = $ie_ou_rg;
    }

    public function setIm($im){
        $this->im = $im;
    }

    public function setRazao_social_ou_nome($razao_social_ou_nome){
        $this->razao_social_ou_nome = $razao_social_ou_nome;
    }

    public function setNome_fantasia_ou_sobrenome($nome_fantasia_ou_sobrenome){
        $this->nome_fantasia_ou_sobrenome = $nome_fantasia_ou_sobrenome;
    }

    public function setApelido($apelido){
        $this->apelido = $apelido;
    }

    public function setCep_cep($cep_cep){
        $this->cep_cep = $cep_cep;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function setComplemento($complemento){
        $this->complemento = $complemento;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function setRamal($ramal){
        $this->ramal = $ramal;
    }

    public function setFax($fax){
        $this->fax = $fax;
    }

    public function setCelular($celular){
        $this->celular = $celular;
    }

    public function setResponsavel($responsavel){
        $this->responsavel = $responsavel;
    }

    public function setSite($site){
        $this->site = $site;
    }

    public function setNovidade($novidade){
        $this->novidade = $novidade;
    }

    public function setPromocao($promocao){
        $this->promocao = $promocao;
    }

    public function setObservacao($observacao){
        $this->observacao = $observacao;
    }

}

