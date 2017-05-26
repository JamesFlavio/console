<script>

function pesquisar(){
	
	//verifica o valor pesquisado
	var pesquisar = document.getElementById("inputPesquisar").value;	

	//imprime o select retornado na div resultados
	$('#divPesquisar').load("manutencoes/vendas/produtos-e-servicos-adicionar-incluir-pesquisar.php?pesquisar="+pesquisar);
	
}

function selecionar(id){

	//imprime o select retornado na div resultados
	$('#divPesquisar').load("manutencoes/vendas/produtos-e-servicos-adicionar-incluir-pesquisar-selecionar.php?selecionar="+id);
	
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