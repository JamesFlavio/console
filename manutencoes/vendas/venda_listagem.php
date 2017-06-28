<!--
BUGS
01: Criar um script para ver se o cliente trabalha com 2 ou 4 digitos de casas decimais
02: Exibir casas decimais em quantidade somente quando for item pesado, litros etc.
-->
<div class="col-lg-12">

	<div name="formularios" class="row">
		
		<form
		
		class="
				col-xs-2
				col-sm-1
				col-md-1
				col-lg-1
			  "
		
		method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>&acao=adicionarCabecalho">
		  <div class="input-group">
			<div class="input-group-btn">
			  <button class="btn btn-default" type="submit">
				<i class="glyphicon glyphicon-plus"></i>
			  </button>
			</div>
		  </div>
		</form>
	
		<form
		
		class="
				col-xs-10
				col-sm-11
				col-md-11
				col-lg-11
			  "
		
		>
		  <div class="input-group">
			<input type="text" class="form-control" placeholder="Pesquisar">
			<div class="input-group-btn">
			  <button class="btn btn-default" type="submit">
				<i class="glyphicon glyphicon-search"></i>
			  </button>
			</div>
		  </div>
		</form>
		
		</div>
		<!-- /.formularios -->

	<ul class="nav nav-tabs" style="padding-top: 15px;">
	  <li class="active"><a href="#">Abertos</a></li>
	  <li><a href="#">Fechados</a></li>
	  <li><a href="#">Cancelados</a></li>
	</ul>
	

	
	<div id="fornecedoresCentro">
	
		<div class="table-responsive">
	
	<table class="table table-striped" style="overflow: auto;">
		<thead>
		  <tr>
			<th class="col-sm-1">Pedido</th>
			<th>Cliente</th>
			<th class="col-sm-2">Total</th>
			<th class="col-sm-2">Data</th>
		  </tr>
		</thead>
		<tbody>
		
		<?php
		
		require_once("class/BancoMysql.php");

		$bd = new BancoMysql();
		$bd->setSelect("
			SELECT venda.id, venda.cadastro_id, cadastro.razao_social_ou_nome, venda.data
			FROM venda
			JOIN cadastro ON cadastro.id = venda.cadastro_id;
		");

		// output data of each row
		while($rows	= $bd->getSelect()) {

				// Faz captura de campos
				$id						= $rows["id"];
				$razao_social_ou_nome	= $rows["razao_social_ou_nome"];
				$data					= $rows["data"];
		
		
		?>

		
		  <tr>
			<td><?php echo $id;?></td>
			<td><?php echo $razao_social_ou_nome;?></td>
			<td><?php echo "Total";?></td>
			<td><?php echo $data;?></td>
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