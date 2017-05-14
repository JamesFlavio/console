<?php

$cnpj_ou_cpf				= $_POST ["cnpj_ou_cpf"];
$ie_ou_rg					= $_POST ["ie_ou_rg"];
$im							= $_POST ["im"];
$razao_social_ou_nome		= $_POST ["razao_social_ou_nome"];
$nome_fantasia_ou_sobrenome	= $_POST ["nome_fantasia_ou_sobrenome"];
$apelido					= $_POST ["apelido"];
$cep						= $_POST ["cep"];
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

# Consulta se o CNPJ ou CPF ja não consta na base de dados

include("conexao-mysql.php");

$sqlConsulta 	= "SELECT cnpj_ou_cpf FROM fornecedores WHERE cnpj_ou_cpf = $cnpj_ou_cpf;";

$queryConsulta	= mysqli_query($conexaoMysql, $sqlConsulta);

if(!$queryConsulta){ # Verifica se a consulta não deu erro
	echo "Erro: queryConsulta!";
};

$quantidade = mysqli_num_rows($queryConsulta);

if($quantidade=0){

	if($razao_social_ou_nome != ""){


		$cmdFornecedoresAdicionar 	="
		INSERT INTO fornecedores	(cnpj_ou_cpf, ie_ou_rg, im, razao_social_ou_nome, nome_fantasia_ou_sobrenome, apelido, cep, endereco, numero, bairro, telefones, ramais, fax, celular, responsaveis, sites, novidades, promocoes, observacoes)
		VALUES 						('$cnpj_ou_cpf' , '$ie_ou_rg' , '$im' , '$razao_social_ou_nome' , '$nome_fantasia_ou_sobrenome' , '$apelido' , '$cep' , '$endereco' , '$numero' , '$bairro' , '$telefones' , '$ramais' , '$fax' , '$celular' , '$responsaveis' , '$sites' , '$novidades' , '$promocoes' , '$observacoes');
		"; 
		#cmdFornecedoresAdicionar

		$query = mysqli_query($conexaoMysql, $cmdFornecedoresAdicionar);

		if(!$query){
			echo "Erro!";
		} else {
			echo "Cadastro realizado com sucesso!";
		};

	};
	
} else {
	
	echo "Já cadastrado!";
	
};
?>