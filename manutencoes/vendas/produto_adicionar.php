<div class="col-lg-12" >

<?php

// BUGS
// 01:  
		

@$cmd 			= $_GET ["cmd"];
@$id			= $_POST ["id"];


switch ($cmd) {
case "adicionar":
	include("cadastros/produtos-e-servicos-adicionar-cmd.php");
	break;
};	

?>
<div class="form-group ">
	Cliente
		<?php 

		/**
		 * Faz o insert no banco de uma nova venda ao cliente selecionado
		 */
		 $_SESSION['venda']=[
			"cadastro_id"	=> "$id",
			"data"			=> date("Y-m-d H:i:s")
		 ];
		 
		 var_dump($_SESSION['venda']);
		 
		 echo $_SESSION['venda']['cadastro_id']." AQUI";

		// SELECT
		
		include("class/BancoMysql.php");
	
		$bd	= new BancoMysql();
		$bd->setSelect("SELECT id, razao_social_ou_nome FROM cadastro WHERE id = '".$_SESSION['venda']['cadastro_id']."';");
		
		$rows	= $bd->getSelect();
			
			$id						= $rows['id'];
			$razao_social_ou_nome	= $rows['razao_social_ou_nome'];
				
		
		/**
		 * Imprime resultados
		 */
		 echo "$id: $razao_social_ou_nome";
		
		
		$_SESSION['venda_cliente']="$id";
		
		 
		 //$bd->setInsert("venda",$dados);
		 
		?>
</div>
	<button class="btn btn-default" type="button" onclick="linkModal('manutencoes/vendas/produto_incluir.php');">
		<i class="glyphicon glyphicon-ok"> Incluir</i>
	</button>

	<button class="btn btn-default" type="submit">
		<i class="glyphicon glyphicon-remove"> Excluir</i>
	</button>

	<button class="btn btn-default" type="submit">
		<i class="glyphicon glyphicon-remove-circle"> Excluir Tudo</i>
	</button>

	<button class="btn btn-default" type="submit">
		<i class="glyphicon glyphicon-file"> Nota Fiscal</i>
	</button>
	
	<button class="btn btn-default" type="submit">
		<i class="glyphicon glyphicon-floppy-disk"> Salvar</i>
	</button>

	<table class="table table-striped" style="overflow: auto;">
		<thead>
		  <tr>
			<th class="col-sm-1">Cod.</th>
			<th>Nome</th>
			<th class="col-sm-2">Qnt</th>
			<th class="col-sm-2">Preço Unt.</th>
			<th class="col-sm-2">Total</th>
		  </tr>
		</thead>
		<tbody>
		
		<?php
		
		$bdproduto = new BancoMysql();
		$bdproduto->setSelect("
			SELECT venda_item.produto_id, produto.nome, venda_item.quantidade, venda_item.valor_unitario
			FROM venda_item
			JOIN produto
			ON produto.id = venda_item.produto_id
			WHERE venda_id = '1'
		;");
		


		// output data of each row
		while($rowproduto = $bdproduto->getSelect()) {

				// Faz captura de campos
				$produto_id	= $rowproduto["produto_id"];
				$nome					= $rowproduto["nome"];
				$quantidade				= $rowproduto["quantidade"];
				$valor_unitario			= $rowproduto["valor_unitario"];
		
		
		?>

		
		  <tr>
			<td><?php echo $produtosEServicos_id;?></td>
			<td><?php echo $nome;?></td>
			<td><?php echo $quantidade;?></td>
			<td><?php echo $preco;?></td>
			<td><?php echo $quantidade*$preco;?></td>
		  </tr>

		<?php

		};

		?>

		</tbody>
	</table>

<br>
</div>
<!-- /.row -->

<script src="manutencoes/vendas/js/produtos-e-servicos-adicionar.js"></script>