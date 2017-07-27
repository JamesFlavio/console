<table id="resultados" class="table-striped table-hover">
  <tr>
	<td class="col-sm-1">Código</td>
	<td class="col-sm-2">Barras</td>
	<td class="col-sm-7">Nome</td>
	<td class="col-sm-2">Preço</td>
  </tr>
	<?php
	
	$pesquisar = $_GET['pesquisar'];
	
	include("../../class/BancoMysql.php");
	
	$bd = new BancoMysql();
	$bd->setSelect("
		SELECT id,barra,nome,preco_venda
		FROM produto
		WHERE nome LIKE '%$pesquisar%'
		ORDER BY nome,preco_venda;
	");
	
	// output data of each row
	while($rows = $bd->getSelect()) {

			// Faz captura de campos
			$id			= $rows["id"];
			$barra		= $rows["barra"];
			$nome		= $rows["nome"];
			$preco_venda= $rows["preco_venda"];
			
	?>
  <tr ondblclick="selecionar('<?php echo $id;?>');">
	<td class="col-sm-1"><?php echo $id;?></td>
	<td class="col-sm-2"><?php echo $barra;?></td>
	<td class="col-sm-7"><?php echo $nome;?></td>
	<td class="col-sm-2"><?php echo number_format($preco_venda,2,",",".");?></td>
  </tr>
	<?php
	
	};
	
	?>

</table>