<!--
BUGS
01: Criar um script para ver se o cliente trabalha com 2 ou 4 digitos de casas decimais
02: Exibir casas decimais em quantidade somente quando for item pesado, litros etc.
-->
<div class="col-lg-12">
	
	<div id="fornecedoresCentro">
	
		<div class="table-responsive">
	
	<table class="table table-striped" style="overflow: auto;">
		<thead>
		  <tr>
			<th>ID</th>
			<th class="col-sm-2">Cod. de Barras</th>
			<th class="col-sm-2">Cod. de Fábrica</th>
			<th>Nome</th>
			<th class="col-sm-1">Qnt</th>
			<th class="col-sm-1">Preco</th>
		  </tr>
		</thead>
		<tbody>
		
		<?php
		
		include("php/conexao-mysql.php");

		$mysqlListagem 	="
		SELECT id,fabrica,barras,nome,estoque,precoVenda
		FROM produtosEServicos
		"; 
		# $sqlListagem

		$queryListagem = mysqli_query($conexaoMysql, $mysqlListagem);

		if(!$queryListagem){
			echo "Erro: queryListagem!";
		};

		// output data of each row
		while($rowListagem = mysqli_fetch_assoc($queryListagem)) {

				// Faz captura de campos
				$id		= $rowListagem["id"];
				$fabrica	= $rowListagem["fabrica"];
				$barras		= $rowListagem["barras"];
				$nome		= $rowListagem["nome"];
				$estoque	= $rowListagem["estoque"];
				$precoVenda	= $rowListagem["precoVenda"];
		
		
		?>

		
		  <tr>
			<td><?php echo $id;?></td>
			<td><?php echo $barras;?></td>
			<td><?php echo $fabrica;?></td>
			<td><?php echo $nome;?></td>
			<td><?php echo number_format($estoque,0,',','.');?></td>
			<td><?php echo number_format($precoVenda,2,',','.');?></td>
		  </tr>

		<?php

		};

		?>

		  <tr>
			<td>---</td>
			<td>---</td>
			<td>---</td>
			<td>---</td>
			<td>---</td>
			<td>---</td>
		  </tr>
		</tbody>
	</table>
	
		</div>
		<!-- /#fornecedoresCentro -->
	
	</div>
		<!-- /#table-responsive -->

</div>

<ul class="pager">
  <li class="previous"><a href="#">Previous</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li class="next"><a href="#">Next</a></li>
</ul>
<!-- /.pager -->