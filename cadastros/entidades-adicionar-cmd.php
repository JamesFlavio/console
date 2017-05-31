<?php

$cnpj_ou_cpf				= $_POST ["cnpj_ou_cpf"];
$ie_ou_rg					= $_POST ["ie_ou_rg"];
$im							= $_POST ["im"];
$razao_social_ou_nome		= $_POST ["razao_social_ou_nome"];
$nome_fantasia_ou_sobrenome	= $_POST ["nome_fantasia_ou_sobrenome"];
$apelido					= $_POST ["apelido"];
$cep						= $_POST ["cep"];
$cidade						= $_POST ["cidade"]; // ??? NÃO UTILIZADO POIS VEM DO CEP
$ibge						= $_POST ["ibge"];
$endereco					= $_POST ["endereco"];
$numero						= $_POST ["numero"];
$bairro						= $_POST ["bairro"];
$telefones					= $_POST ["telefones"];
$ramais						= $_POST ["ramais"];
$fax						= $_POST ["fax"];
$celular					= $_POST ["celular"];
$responsaveis				= $_POST ["responsaveis"];
$sites						= $_POST ["sites"];
$novidades					= $_POST ["novidades"];
$promocoes					= $_POST ["promocoes"];
$observacoes				= $_POST ["observacoes"];

/*
echo "
cnpj_ou_cpf							:	$cnpj_ou_cpf				<br>
ie_ou_rg							:	$ie_ou_rg					<br>
im									:	$im							<br>
razao_social_ou_nome				:	$razao_social_ou_nome		<br>
nome_fantasia_ou_sobrenome			:	$nome_fantasia_ou_sobrenome	<br>
apelido								:	$apelido					<br>
cep									:	$cep						<br>
cidade								:	$cidade						<br>
uf									:	$uf							<br>
ibge								:	$ibge						<br>
endereco							:	$endereco					<br>
numero								:	$numero						<br>
bairro								:	$bairro						<br>
telefones							:	$telefones					<br>
ramais								:	$ramais						<br>
fax									:	$fax						<br>
celular								:	$celular					<br>
responsaveis						:	$responsaveis				<br>
sites								:	$sites						<br>
novidades							:	$novidades					<br>
promocoes							:	$promocoes					<br>
observacoes							:	$observacoes				<br>
";
*/


include("php/conexao-mysql.php");

# Consulta se o CNPJ ou CPF ja não consta na base de dados
$sqlConsulta 	= "SELECT cnpj_ou_cpf FROM cadastros WHERE cnpj_ou_cpf = '$cnpj_ou_cpf';";
$queryConsulta	= mysqli_query($conexaoMysql, $sqlConsulta);
$quantidade		= mysqli_num_rows($queryConsulta);

if(!$queryConsulta){ # Verifica se a consulta não deu erro
	echo "Erro: queryConsulta! ".mysqli_error($queryConsulta);
};


if($quantidade==0){

	if($razao_social_ou_nome != ""){

		// ??? A CIDADE NÃO FOI INCLUSA AQUI POIS VIRÁ ATRAVÉS DA SELEÇÃO DO CEP
		$cmdcadastrosAdicionar 	="
		INSERT INTO cadastros	(  tipo,	cnpj_ou_cpf,	  ie_ou_rg,		  im,	  razao_social_ou_nome,	  nome_fantasia_ou_sobrenome,   apelido,	 ceps_cep,    endereco,   numero,   bairro,		  telefones,	ramais,	 fax,	  celular,	  responsaveis,		  sites,	novidades,	  promocoes,	 observacoes)
		VALUES 					('$tipo', '$cnpj_ou_cpf',	'$ie_ou_rg',	'$im',	'$razao_social_ou_nome','$nome_fantasia_ou_sobrenome','$apelido',		'$cep', '$endereco','$numero','$bairro',	'$telefones', '$ramais', '$fax',	'$celular', '$responsaveis',	'$sites', '$novidades', '$promocoes' , '$observacoes');
		"; 
		#cmdcadastrosAdicionar

		$query = mysqli_query($conexaoMysql, $cmdcadastrosAdicionar);

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