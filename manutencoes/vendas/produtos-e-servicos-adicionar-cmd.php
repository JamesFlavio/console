<?php

$barras					= $_POST ["barras"];
$fabrica				= $_POST ["fabrica"];
$nome					= $_POST ["nome"];
$unidade				= $_POST ["unidade"];
$ncm_codigo					= $_POST ["ncm_codigo"];
$cest					= $_POST ["cest"];
$grupo					= $_POST ["grupo"];
$estoque				= $_POST ["estoque"];
$minimo					= $_POST ["minimo"];
$maximo					= $_POST ["maximo"];
$cfopEntrada_cfops_id	= $_POST ["cfopEntrada_cfops_id"];
$cfopSaida_cfops_id		= $_POST ["cfopSaida_cfops_id"];
$observacoes			= $_POST ["observacoes"];
$site					= $_POST ["site"];
$observacoes			= $_POST ["observacoes"];


include("php/conexao-mysql.php");

# Consulta se o Codigo de Barras ja não consta na base de dados
$sqlConsulta 	= "SELECT barras FROM produtosEServicos WHERE barras = '$barras';";
$queryConsulta	= mysqli_query($conexaoMysql, $sqlConsulta);
$quantidade		= mysqli_num_rows($queryConsulta);

if(!$queryConsulta){ # Verifica se a consulta não deu erro
	echo "Erro: queryConsulta! ".mysqli_error($queryConsulta);
};


if($quantidade==0){

	if($nome != ""){

		// ??? A CIDADE NÃO FOI INCLUSA AQUI POIS VIRÁ ATRAVÉS DA SELEÇÃO DO CEP
		$cmdprodutosAdicionar 	="
		INSERT INTO produtosEServicos	(  tipo,	barras,	  fabrica,	  nome,	  unidade,	  ncm_codigo,   cest,	  grupo,	estoque,	minimo,		maximo,   cfopEntrada_cfops_id,   cfopSaida_cfops_id,	observacoes)
		VALUES 							('$tipo', '$barras','$fabrica',	'$nome','$unidade',	'$ncm_codigo','$cest',	'$grupo', '$estoque', '$minimo',  '$maximo','$cfopEntrada_cfops_id','$cfopSaida_cfops_id','$observacoes');
		"; 
		#cmdprodutosAdicionar

		$query = mysqli_query($conexaoMysql, $cmdprodutosAdicionar);

		if(!$query){
			echo "Erro!";
		} else {
			echo "Cadastro realizado com sucesso!";
		};

	};
	
} else {
	
	// Carregar em Modal
	$msgAtencao	= "Já cadastrado!";
	echo $msgAtencao;
	
};
?>