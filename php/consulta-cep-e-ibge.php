<?php
$cep	= $_GET['cep'];

// Captura o conteúdo da pagina exibido em XML
$url = file_get_contents("https://viacep.com.br/ws/$cep/xml");

// Faz o load do arquivo de uma página exibido em XML e retorna um objeto
$arquivo_xml = simplexml_load_string($url);
 
// meus_links.xml pode ser uma URL também

$cep 		=$arquivo_xml	->cep 			;
$ibge 		=$arquivo_xml	->ibge 			;
$logradouro	=$arquivo_xml	->logradouro	;
$complemento=$arquivo_xml	->complemento	;
$bairro		=$arquivo_xml	->bairro		;
$localidade	=$arquivo_xml	->localidade	;
$uf			=$arquivo_xml	->uf			;
$unidade	=$arquivo_xml	->unidade		;


?>

<div class="col-sm-3">CEP			</div>	<div>: <?php echo $cep			;?></div>
<div class="col-sm-3">logradouro	</div>	<div>: <?php echo $logradouro	;?></div>
<div class="col-sm-3">Complemento	</div>	<div>: <?php echo $complemento	;?></div>
<div class="col-sm-3">Bairro		</div>	<div>: <?php echo $bairro		;?></div>
<div class="col-sm-3">Localidade	</div>	<div>: <?php echo $localidade	;?></div>
<div class="col-sm-3">UF			</div>	<div>: <?php echo $uf			;?></div>
<div class="col-sm-3">IBGE			</div>	<div>: <?php echo $ibge 		;?></div>
<div class="col-sm-3">Unidade		</div>	<div>: <?php echo $unidade		;?></div>

<br>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Adicionar</button>