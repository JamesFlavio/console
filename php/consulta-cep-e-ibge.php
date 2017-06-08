<?php
/**
 * BUGS/ALTERAÇÕES
 * 01 - Criar Classe para estas funções.
 */
?>

<script>

// BUGs
// ##: Futuramente criar uma função para atualiar toda tabela CEP com no me de bairros novamente para se por acaso haja alterações
// 01: Falta verificar se o CEP não existe na nossa base de dados inicialmente

// Atualiza os campos dentro do formulário cadastro

	function atualizaCampos(){

		document.getElementById("cep").value			= document.getElementById("hiddenCep").value	;
		document.getElementById("cidade").value			= document.getElementById("hiddenLocalidade").value	;
		document.getElementById("ibge").value			= document.getElementById("hiddenIbge").value	;
		document.getElementById(document.getElementById("hiddenUf").value).selected = true;
		document.getElementById("bairro").value			= document.getElementById("hiddenBairro").value	;
		document.getElementById("endereco").value		= document.getElementById("hiddenLogradouro").value	;
		document.getElementById("complemento").value	= document.getElementById("hiddenComplemento").value	;
		
	}


</script>



<?php
$cepConsultado	= $_GET['cep']; // Formato #####-### ou ####### pode variar de acordo com a digitação

// Captura o conteúdo da pagina exibido em XML
@$url = file_get_contents("https://viacep.com.br/ws/$cepConsultado/xml");

// Verifica se o CEP foi encontrado, se sim, executa os comandos ao contrário
// Mostra mensagem de erro

	$arquivo_xml = simplexml_load_string($url);
	$erro 		=$arquivo_xml	->erro;
	
	// Verifica se deu erro na Url ou se a consulta retornou algum erro
	if(!$url or $erro==true){
		
		echo "<div class='text-center'>CEP não encontrado ou inválido.</div>";

	// Começa a executar o INSERT tendo em vista que foi encontra e ainda não está cadastrado
	} else {


		// Faz o load do arquivo de uma página exibido em XML e retorna um objeto
		$arquivo_xml = simplexml_load_string($url);
		 
		$cep 		=$arquivo_xml	->cep 			; // Formato #####-###
		$ibge 		=$arquivo_xml	->ibge 			;
		$logradouro	=$arquivo_xml	->logradouro	;
		$complemento=$arquivo_xml	->complemento	;
		$bairro		=$arquivo_xml	->bairro		;
		$cidade		=$arquivo_xml	->localidade	;
		$uf			=$arquivo_xml	->uf			;
		$unidade	=$arquivo_xml	->unidade		;

		include("../php/conexao-mysql.php");

		$sqlConsulta	= "SELECT cep FROM cep WHERE cep='$cep'";

		$sqlResultado	= mysqli_query($conexaoMysql,$sqlConsulta);

		$sqlQuantidade	= mysqli_num_rows($sqlResultado);

		// Condição para verificar se existe a cidade no site ViaCEP,
		// FALTA AQUI se existir e não tiver em nossa base de dados efetua o cadastro
		
		if($sqlQuantidade>0){

			// Se existir, chama a função java atualizaCampos(); e fechar Modal
			echo "
			<div class='text-center'>
			<img src='imagens/layout/carregando.gif'/>
			<script>
			atualizaCampos();
			
			$('#myModal').modal('hide');
			</script>
			</div>
			";
			
		} else {
						
		?>

			<div class="col-sm-3">CEP			</div>	<div>: <?php echo $cep			;?></div>
			<div class="col-sm-3">Complemento	</div>	<div>: <?php echo $complemento	;?></div>
			<div class="col-sm-3">Bairro		</div>	<div>: <?php echo $bairro		;?></div>
			<div class="col-sm-3">logradouro	</div>	<div>: <?php echo $logradouro	;?></div>
			<div class="col-sm-3">Cidade		</div>	<div>: <?php echo $cidade		;?></div>
			<div class="col-sm-3">UF			</div>	<div>: <?php echo $uf			;?></div>
			<div class="col-sm-3">IBGE			</div>	<div>: <?php echo $ibge 		;?></div>
			<div class="col-sm-3">Unidade		</div>	<div>: <?php echo $unidade		;?></div>
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="atualizaCampos();">Adicionar</button>

			<?php

			// Incluir cidade

				// Verifica se a cidadade já está cadastrada
				$sqlConsultaCidades		= "SELECT ibge FROM cidade WHERE ibge = '$ibge';";
				$queryConsultaCidades	= mysqli_query($conexaoMysql,$sqlConsultaCidades);
				$rowsCidades			= mysqli_num_rows($queryConsultaCidades);
				
				if($rowsCidades==0){
				
					// INSERT INTO da tabela cidade se a cidade já não existir na base
					$sqlCadastroCidades	= " INSERT INTO cidade	(estado_uf,   nome,	 ibge)
											VALUES				(	   '$uf','$cidade','$ibge');";
					$sqlQueryCidades	= mysqli_query ($conexaoMysql,$sqlCadastroCidades)
												or die ("Erro ao cadastrar a cidade!");
				
				}
				// if $rowsCidades - Verifica se a cidadade já está cadastrada
					
					// INSERT INTO da tabela cep
					// retira o ífem do cep se houver
					$cepCorrigido = str_replace('-','',$cep);
					
					$sqlCadastroCeps	= " INSERT INTO cep 	(  cep,				bairro,	cidade_ibge)
											VALUES				('$cepCorrigido', '$bairro',	  '$ibge');";
					$sqlQueryCeps		= mysqli_query ($conexaoMysql,$sqlCadastroCeps)
												or die ("Erro ao cadastrar o CEP!");

		}
		// sqlquantidade else

			
		?>

		<input type="hidden" id="hiddenCep" 		value="<?php echo $cep			;?>"/>
		<input type="hidden" id="hiddenComplemento"	value="<?php echo $complemento	;?>"/>
		<input type="hidden" id="hiddenBairro"		value="<?php echo $bairro		;?>"/>
		<input type="hidden" id="hiddenLogradouro"	value="<?php echo $logradouro	;?>"/>
		<input type="hidden" id="hiddenLocalidade"	value="<?php echo $cidade		;?>"/>
		<input type="hidden" id="hiddenUf"			value="<?php echo $uf			;?>"/>
		<input type="hidden" id="hiddenIbge"		value="<?php echo $ibge			;?>"/>
		<input type="hidden" id="hiddenUnidade"		value="<?php echo $unidade		;?>"/>
	<?php

}
// url else
?>