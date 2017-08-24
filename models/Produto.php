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
}

