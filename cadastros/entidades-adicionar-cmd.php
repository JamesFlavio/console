<?php

$cnpj_cpf				    = $_POST ["cnpj_ou_cpf"];
$ie_ou_rg					= $_POST ["ie_ou_rg"];
$im							= $_POST ["im"];
$razao_social_nome		    = $_POST ["razao_social_ou_nome"];
$nome_fantasia_sobrenome	= $_POST ["nome_fantasia_ou_sobrenome"];
$apelido					= $_POST ["apelido"];
$cep						= str_ireplace("-","",$_POST ["cep"]); // CEP no formato ########
$endereco					= $_POST ["endereco"];
$numero						= $_POST ["numero"];
$bairro						= $_POST ["bairro"];
$telefone					= $_POST ["telefone"];
$ramal						= $_POST ["ramal"];
$fax						= $_POST ["fax"];
$celular					= $_POST ["celular"];
$responsavel				= $_POST ["responsavel"];
$site						= $_POST ["site"];
$novidade					= $_POST ["novidade"];
$promocao					= $_POST ["promocao"];
$observacao					= $_POST ["observacao"];




//include("php/conexao-mysql.php");

require_once 'models/Connection.php';
require_once 'models/CadastroDAO.php';
require_once 'models/Cadastro.php';

$conn = new Connection();
$cadastroDao = new CadastroDAO($conn);

$cadastros = $cadastroDao->listByCnpjCpf($cnpj_cpf);

if(!$cadastros){
    $cadastro = new Cadastro();
    //$cadastro->setId('');
    $cadastro->setTipo($tipo);
    $cadastro->setCnpj_cpf($cnpj_cpf);
    $cadastro->setIe_rg($ie_ou_rg);
    $cadastro->setIm($im);
    $cadastro->setRazao_social_nome($razao_social_nome);
    $cadastro->setNome_fantasia_sobrenome($nome_fantasia_sobrenome);
    $cadastro->setApelido($apelido);
    $cadastro->setCep_cep($cep);
    $cadastro->setEndereco($endereco);
    $cadastro->setNumero($numero);
    $cadastro->setBairro($bairro);
    $cadastro->setTelefone($telefone);
    $cadastro->setRamal($ramal);
    $cadastro->setFax($fax);
    $cadastro->setCelular($celular);
    $cadastro->setResponsavel($responsavel);
    $cadastro->setSite($site);
    $cadastro->setNovidade($novidade);
    $cadastro->setPromocao($promocao);
    $cadastro->setObservacao($observacao);
    
    $cadastroDao->createOrUpdate($cadastro);
}











/* # Consulta se o CNPJ ou CPF ja não consta na base de dados
$sqlConsulta 	= "SELECT cnpj_ou_cpf FROM cadastro WHERE cnpj_ou_cpf = '$cnpj_cpf';";
$queryConsulta	= mysqli_query($conexaoMysql, $sqlConsulta);
$quantidade		= mysqli_num_rows($queryConsulta);

if(!$queryConsulta){ # Verifica se a consulta não deu erro
	echo "Erro: queryConsulta! ".mysqli_error($queryConsulta);
};


if($quantidade==0){

	if($razao_social_ou_nome != ""){

		// ??? A CIDADE NÃO FOI INCLUSA AQUI POIS VIRÁ ATRAVÉS DA SELEÇÃO DO CEP
		$cmdcadastrosAdicionar 	="
		INSERT INTO cadastro	(  tipo,	cnpj_ou_cpf,	  ie_ou_rg,		  im,	  razao_social_ou_nome,	  nome_fantasia_ou_sobrenome,   apelido,	  cep_cep,    endereco,   numero,   bairro,		  telefone,		ramal,	 fax,	  celular,	  responsavel,	 site,	  novidade,	  promocao,	  observacao)
		VALUES 					('$tipo', '$cnpj_ou_cpf',	'$ie_ou_rg',	'$im',	'$razao_social_ou_nome','$nome_fantasia_ou_sobrenome','$apelido',	'$cep',		'$endereco','$numero','$bairro',	'$telefone',  '$ramal', '$fax',	'$celular', '$responsavel','$site', '$novidade','$promocao','$observacao');
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
	
}; */
?>