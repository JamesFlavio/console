<script>

	function acaoAdicionar(){
	
	var id 				= document.getElementById("id").value;
	var precoUnitario 	= document.getElementById("valorUnitario").value;
	var quantidade		= document.getElementById("quantidade").value;
	
	//carrega o cmd na div divAcao para fazer o INSERT na base.
	$('#divAcao').load("manutencoes/vendas/produtos-e-servicos-adicionar-incluir-pesquisar-selecionar-cmd.php?id="+id+"&precoUnitario="+precoUnitario+"&quantidade="+quantidade);

	};

</script>

<form>
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
		
		include("../../php/conexao-mysql.php");
		
		$mysqlListagem 	="
		SELECT id,barras,nome,precoVenda
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
				$barras		= $rowListagem["barras"];
				$nome		= $rowListagem["nome"];
				$precoVenda	= $rowListagem["precoVenda"];
				
		?>
	<tr>
		<td class="text-center"><input type="hidden" id="id" value="<?php echo $id;?>"><?php echo $id;?></td>
		<td class="col-sm-1"><?php echo $barras;?></td>
		<td class="col-sm-8"><?php echo $nome;?></td>
		<td class="col-sm-1"><input id="valorUnitario" type="text" size="4" value="<?php echo number_format($precoVenda,2,',','');?>"></td>
		<td class="col-sm-1"><input id="quantidade" type="text" size="4"></td>
		<td class="col-sm-1"><input id="valorTotal" type="text" size="4" value="<?php echo number_format("0",2,',','');?>"></td>
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

	<div id="divAcao">divAcao
	</div>
	
</form>