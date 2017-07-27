<script>
/**
 * Pesquisa o produto conforme o digitado
 */
function pesquisar(){
	
	//verifica o valor pesquisado
	var pesquisar = document.getElementById("inputPesquisar").value;	

	//imprime o select retornado na div resultados
	$('#divPesquisar').load("manutencoes/vendas/produto_pesquisar.php?pesquisar="+pesquisar);
	
}

/**
 * Seleciona o produto e segue para tela de detalhes do produto como quantidade, CFOP, desconto etc.
 */
function selecionar(id){

	//imprime o select retornado na div resultados
	$('#divPesquisar').load("manutencoes/vendas/produto_pesquisar_selecionar.php?selecionar="+id);
	
}

</script>

<div>
	
	<div class="input-group form-group">
		<label>Código</label>
		<div class="input-group">
			<input id="inputPesquisar" type="text" name="barras" onkeypress="pesquisar();" class="form-control" placeholder="Código/Cód. de Barras">
			<div class="input-group-btn">
				<button class="btn btn-default" type="submit" onclick="pesquisar();">
					<i class="glyphicon glyphicon-search"></i>
				</button>
			</div>
		</div>
	</div>
	
</div>

<div id="divPesquisar">

</div>