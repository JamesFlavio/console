<?php

$barra					= $_POST ["barra"];
$fabrica				= $_POST ["fabrica"];
$nome					= $_POST ["nome"];
$unidade				= $_POST ["unidade"];
$ncm_ncm				= $_POST ["ncm_ncm"];
$cest					= $_POST ["cest"];
$grupo					= $_POST ["grupo"];
$estoque				= $_POST ["estoque"];
$minimo					= $_POST ["minimo"];
$maximo					= $_POST ["maximo"];
$cfop_entrada_cfop_cfop	= $_POST ["cfop_entrada_cfop_cfop"];
$cfop_saida_cfop_cfop	= $_POST ["cfop_saida_cfop_cfop"];
$observacao				= $_POST ["observacao"];
$site					= $_POST ["site"];


	require_once("class/BancoMysql.php");

	# Consulta se o Codigo de Barras ja não consta na base de dados
	$bd		= new BancoMysql();
		
	$dados	= [	
				"id"					=> "null",
				"tipo"					=> "$tipo",
				"fabrica"				=> "$fabrica",
				"barra"					=> "$barra",
				"nome"					=> "$nome",
				"unidade"				=> "$unidade",
				"ncm_ncm"				=> "$ncm_ncm",
				"cest"					=> "$cest",
				"grupo"					=> "$grupo",
				"cfop_entrada_cfop_cfop"=> "$cfop_entrada_cfop_cfop",
				"cfop_saida_cfop_cfop"	=> "$cfop_saida_cfop_cfop",
				"estoque"				=> "$estoque",
				"minimo"				=> "$minimo",
				"maximo"				=> "$maximo",
				"preco_custo"			=> "$preco_custo",
				"preco_venda"			=> "$preco_venda",
				"preco_minimo"			=> "$preco_minimo",
				"observacao"			=> "$observacao"
	];
	
	$bd->setInsert("produto",$dados);

?>