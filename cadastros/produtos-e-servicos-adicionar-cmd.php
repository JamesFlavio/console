<?php

$barras					= $_POST ["barras"];
$fabrica				= $_POST ["fabrica"];
$nome					= $_POST ["nome"];
$unidade				= $_POST ["unidade"];
$ncms_codigo			= $_POST ["ncms_codigo"];
$cest					= $_POST ["cest"];
$grupo					= $_POST ["grupo"];
$estoque				= $_POST ["estoque"];
$minimo					= $_POST ["minimo"];
$maximo					= $_POST ["maximo"];
$cfopEntrada_cfops_cfop	= $_POST ["cfopEntrada_cfops_cfop"];
$cfopSaida_cfops_cfop	= $_POST ["cfopSaida_cfops_cfop"];
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

if($quantidade==0 or $barras == ""){

	if($nome != ""){

		// ??? A CIDADE NÃO FOI INCLUSA AQUI POIS VIRÁ ATRAVÉS DA SELEÇÃO DO CEP
		$cmdprodutosAdicionar 	="
		INSERT INTO produtosEServicos	(  tipo,	barras,	  fabrica,	  nome,	  unidade,   ncms_codigo,	  cfopEntrada_cfops_cfop,   cfopSaida_cfops_cfop,   cest,	  grupo,	estoque,	minimo,		maximo,       observacoes)
		VALUES 							('$tipo', '$barras','$fabrica',	'$nome','$unidade','$ncms_codigo',	'$cfopEntrada_cfops_cfop','$cfopSaida_cfops_cfop','$cest',	'$grupo', '$estoque', '$minimo',  '$maximo','$observacoes');
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