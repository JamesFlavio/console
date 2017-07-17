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
		
		require_once("class/BancoMysql.php");
		
		$bd = new BancoMysql();
		$bd->setSelect("	SELECT id,fabrica,barra,nome,estoque,preco_venda
							FROM produto;
		");
		

		// output data of each row
		while($rows = $bd->getSelect()) {

				// Faz captura de campos
				$id			= $rows["id"];
				$fabrica	= $rows["fabrica"];
				$barra		= $rows["barra"];
				$nome		= $rows["nome"];
				$estoque	= $rows["estoque"];
				$preco_venda= $rows["preco_venda"];
		
		
		?>

		
		  <tr>
			<td><?php echo $id;?></td>
			<td><?php echo $barra;?></td>
			<td><?php echo $fabrica;?></td>
			<td><?php echo "<a href='".$_SERVER['REQUEST_URI']."&acao=adicionar&id=$id'>$nome</a>";?></td>
			<td><?php echo number_format($estoque,0,',','.');?></td>
			<td><?php echo number_format($preco_venda,2,',','.');?></td>
		  </tr>

		<?php

		};

		?>
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