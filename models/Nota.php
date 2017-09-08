<?php

class Nota{

    private $cNF;
    private $dataDaAutorizacao;
    private $cUF;
    private $natOp;
    private $indPag;
    private $mod;
    private $serie;
    private $nNF;
    private $dhEmi;
    private $dhSaiEnt;
    private $tpNF;
    private $idDest;
    private $cMunFG;
    private $tpImp;
    private $tpEmis;
    private $tpAmb;
    private $finNFe;
    private $indFinal;
    private $indPres;
    private $procEmi;
    private $verProc;
    private $dhCont;
    private $xJust;
    private $notascol;
    private $cadastro_id;
    
    public function __construct(){}
    
    public function __get($name){
        return $this->$name;
    }
    
    public function getCNF(){
        return $this->cNF;
    }

    public function getDataDaAutorizacao(){
        return $this->dataDaAutorizacao;
    }

    public function getCUF(){
        return $this->cUF;
    }

    public function getNatOp(){
        return $this->natOp;
    }

    public function getIndPag(){
        return $this->indPag;
    }

    public function getMod(){
        return $this->mod;
    }

    public function getSerie(){
        return $this->serie;
    }

    public function getNNF(){
        return $this->nNF;
    }

    public function getDhEmi(){
        return $this->dhEmi;
    }

    public function getDhSaiEnt(){
        return $this->dhSaiEnt;
    }

    public function getTpNF(){
        return $this->tpNF;
    }

    public function getIdDest(){
        return $this->idDest;
    }

    public function getCMunFG(){
        return $this->cMunFG;
    }

    public function getTpImp(){
        return $this->tpImp;
    }

    public function getTpEmis(){
        return $this->tpEmis;
    }

    public function getTpAmb(){
        return $this->tpAmb;
    }

    public function getFinNFe(){
        return $this->finNFe;
    }

    public function getIndFinal(){
        return $this->indFinal;
    }

    public function getIndPres(){
        return $this->indPres;
    }

    public function getProcEmi(){
        return $this->procEmi;
    }

    public function getVerProc(){
        return $this->verProc;
    }

    public function getDhCont(){
        return $this->dhCont;
    }

    public function getXJust(){
        return $this->xJust;
    }

    public function getNotascol(){
        return $this->notascol;
    }

    public function getCadastro_id(){
        return $this->cadastro_id;
    }

    public function setCNF($cNF){
        $this->cNF = $cNF;
    }

    public function setDataDaAutorizacao($dataDaAutorizacao){
        $this->dataDaAutorizacao = $dataDaAutorizacao;
    }

    public function setCUF($cUF){
        $this->cUF = $cUF;
    }

    public function setNatOp($natOp){
        $this->natOp = $natOp;
    }

    public function setIndPag($indPag){
        $this->indPag = $indPag;
    }

    public function setMod($mod){
        $this->mod = $mod;
    }

    public function setSerie($serie){
        $this->serie = $serie;
    }

    public function setNNF($nNF){
        $this->nNF = $nNF;
    }

    public function setDhEmi($dhEmi){
        $this->dhEmi = $dhEmi;
    }

    public function setDhSaiEnt($dhSaiEnt){
        $this->dhSaiEnt = $dhSaiEnt;
    }

    public function setTpNF($tpNF){
        $this->tpNF = $tpNF;
    }

    public function setIdDest($idDest){
        $this->idDest = $idDest;
    }

    public function setCMunFG($cMunFG){
        $this->cMunFG = $cMunFG;
    }

    public function setTpImp($tpImp){
        $this->tpImp = $tpImp;
    }

    public function setTpEmis($tpEmis){
        $this->tpEmis = $tpEmis;
    }

    public function setTpAmb($tpAmb){
        $this->tpAmb = $tpAmb;
    }

    public function setFinNFe($finNFe){
        $this->finNFe = $finNFe;
    }

    public function setIndFinal($indFinal){
        $this->indFinal = $indFinal;
    }

    public function setIndPres($indPres){
        $this->indPres = $indPres;
    }

    public function setProcEmi($procEmi){
        $this->procEmi = $procEmi;
    }

    public function setVerProc($verProc){
        $this->verProc = $verProc;
    }

    public function setDhCont($dhCont){
        $this->dhCont = $dhCont;
    }

    public function setXJust($xJust){
        $this->xJust = $xJust;
    }

    public function setNotascol($notascol){
        $this->notascol = $notascol;
    }

    public function setCadastro_id($cadastro_id){
        $this->cadastro_id = $cadastro_id;
    }

}

