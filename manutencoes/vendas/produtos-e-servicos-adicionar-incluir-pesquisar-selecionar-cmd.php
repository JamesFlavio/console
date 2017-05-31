<div>

	<?php 
	
	@$cmd = $_GET['cmd'];
	
	if($cmd=="adicionar"){

		// Incluir este produto na base vendasItens
		$vendas_id				=$_GET['vendas_id'];
		$produtosEServicos_id	=$_GET['produtosEServicos_id'];
		$quantidade				=$_GET['quantidade'];
		$valorUnitario			=$_GET['valorUnitario'];
		
		$sqlAdicionar	= "INSERT INTO vendasIntens VALUES (null, '$vendas_id', '$produtosEServicos_id', '$quantidade', '$valorUnitario');";
		$sqlQuery = mysqli_query($conexaoMysql,$sqlAdicionar) or die ("Erro ao adicionar produto!");

	};
	
	?>
</div>
