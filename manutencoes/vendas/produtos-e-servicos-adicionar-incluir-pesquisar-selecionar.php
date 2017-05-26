<table id="resultados" class="table-striped table-hover">
  <tr>
	<td class="col-sm-2">Código</td>
	<td class="col-sm-8">Nome</td>
	<td class="col-sm-2">Preço</td>
	<td class="col-sm-2">Qnt</td>
	<td class="col-sm-2">Total</td>
  </tr>
	<?php
	
	$id = $_GET['selecionar'];
	
	include("../../php/conexao-mysql.php");
	
	$mysqlListagem 	="
	SELECT id,nome,precoVenda
	FROM produtosEServicos
	WHERE id='$id'
	ORDER BY nome,precoVenda
	;"; 
	# $sqlListagem

	$queryListagem = mysqli_query($conexaoMysql, $mysqlListagem);

	if(!$queryListagem){
		echo "Erro: queryListagem!";
	};

	// output data of each row
	while($rowListagem = mysqli_fetch_assoc($queryListagem)) {

			// Faz captura de campos
			$id			= $rowListagem["id"];
			$nome		= $rowListagem["nome"];
			$precoVenda	= $rowListagem["precoVenda"];
			
	?>
  <tr>
	<td class="col-sm-2"><?php echo $id;?></td>
	<td class="col-sm-8"><?php echo $nome;?></td>
	<td class="col-sm-2"><?php echo $precoVenda;?></td>
	<td class="col-sm-2"><input type="text" size="4"></td>
	<td class="col-sm-2"><?php echo "Total";?></td>
  </tr>
	<?php
	
	};
	
	?>

</table>