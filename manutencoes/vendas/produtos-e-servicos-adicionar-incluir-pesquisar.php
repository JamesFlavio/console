<table id="resultados" class="table-striped table-hover">
  <tr>
	<td class="col-sm-1">Código</td>
	<td class="col-sm-2">Barras</td>
	<td class="col-sm-7">Nome</td>
	<td class="col-sm-2">Preço</td>
  </tr>
	<?php
	
	$pesquisar = $_GET['pesquisar'];
	
	include("../../php/conexao-mysql.php");
	
	$mysqlListagem 	="
	SELECT id,barras,nome,precoVenda
	FROM produtosEServicos
	WHERE nome LIKE '%$pesquisar%'
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
			$barras		= $rowListagem["barras"];
			$nome		= $rowListagem["nome"];
			$precoVenda	= $rowListagem["precoVenda"];
			
	?>
  <tr ondblclick="selecionar('<?php echo $id;?>');">
	<td class="col-sm-1"><?php echo $id;?></td>
	<td class="col-sm-2"><?php echo $barras;?></td>
	<td class="col-sm-7"><?php echo $nome;?></td>
	<td class="col-sm-2"><?php echo number_format($precoVenda,2,",",".");?></td>
  </tr>
	<?php
	
	};
	
	?>

</table>