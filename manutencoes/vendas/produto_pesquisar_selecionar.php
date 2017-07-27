<script>

/**
 * Verifica se a venda já existe, se não adiciona a mesma a tabela "venda".
 */


/**
 * Adiciona o produto a venda na tabela "venda_item".
 */


/**
 * Volta a tela de pesquisa
 */
	


	function acaoAdicionar(){
	
	var id 				= document.getElementById("id").value;
	var precoUnitario 	= document.getElementById("valorUnitario").value;
	var quantidade		= document.getElementById("quantidade").value;
	
	//carrega o cmd na div divAcao para fazer o INSERT na base.
	$('#divAcao').load("manutencoes/vendas/produtos-e-servicos-adicionar-incluir-pesquisar-selecionar-cmd.php?id="+id+"&precoUnitario="+precoUnitario+"&quantidade="+quantidade);

	};

</script>

<form method="POST" action="linkModal()">
	<table id="resultados" class="table-striped table-hover">
	<tr>
		<td>Código</td>
		<td class="col-sm-1">Barras</td>
		<td class="col-sm-8">Nome</td>
		<td class="col-sm-1">Preço</td>
		<td class="col-sm-1">Qnt</td>
		<td class="col-sm-1">Total</td>
	</tr>
		<?php
		
		$id = $_GET['selecionar'];
		
		include("../../class/BancoMysql.php");
		
		$bd = new BancoMysql();
		$bd->setSelect("
			SELECT id,barra,nome,preco_venda
			FROM produto
			WHERE id='$id'
			ORDER BY nome,preco_venda
		;");
		
		// output data of each row
		while($rows = $bd->getSelect()) {
	
				// Faz captura de campos
				$id			= $rows["id"];
				$barra		= $rows["barra"];
				$nome		= $rows["nome"];
				$preco_venda= $rows["preco_venda"];
				
		?>
	<tr>
		<td class="text-center"><input type="hidden" id="id" value="<?php echo $id;?>"><?php echo $id;?></td>
		<td class="col-sm-1"><?php echo $barra;?></td>
		<td class="col-sm-8"><?php echo $nome;?></td>
		<td class="col-sm-1"><input id="valor_unitario" type="text" size="4" value="<?php echo number_format($preco_venda,2,',','');?>"></td>
		<td class="col-sm-1"><input id="quantidade" type="text" size="4"></td>
		<td class="col-sm-1"><input id="valor_total" type="text" size="4" value="<?php echo number_format("0",2,',','');?>"></td>
	</tr>
		<?php
		
		};
		
		?>
	
	</table>
	<hr>
	
	<div>
		<div class="col-sm-3">
			Estoque:
		</div>
		<div class="col-sm-3">
			06 Un
		</div>
		<div class="col-sm-3">
			CFOP
		</div>
		<div class="col-sm-3">
			<select>
				<option>5.102</option>
			</select>
		</div>
	</div>
	
	<hr><br>
	
	<button class="btn btn-default" type="button" onclick="acaoAdicionar();">
		<i class="glyphicon glyphicon-plus"> Incluir</i>
	</button>
	
</form>