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
		include("php/conexao-mysql.php");

		// SELECT dos estados
		$sqlEstados			= "	SELECT id, razao_social_ou_nome
								FROM cadastros
								WHERE id = '$id';";
								
		$queryEstados		= mysqli_query($conexaoMysql,$sqlEstados);
		
		
		$rowsEstados	= mysqli_fetch_assoc($queryEstados);
			
			$id						= $rowsEstados['id'];
			$razao_social_ou_nome	= $rowsEstados['razao_social_ou_nome'];
		
		// Imprime os resultados
			echo "$id: $razao_social_ou_nome";
		
		?>
</div>
	<button class="btn btn-default" type="button" onclick="linkModal('manutencoes/vendas/produtos-e-servicos-adicionar-incluir.php');">
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
		
		include("php/conexao-mysql.php");

		$mysqlListagem 	="
		SELECT vendasItens.produtosEServicos_id, produtosEServicos.nome, vendasItens.quantidade, vendasItens.preco
		FROM vendasItens
		JOIN produtosEServicos
		ON produtosEServicos.id = vendasItens.produtosEServicos_id
		WHERE vendas_id = '1'
		;"; 
		# $sqlListagem

		$queryListagem = mysqli_query($conexaoMysql, $mysqlListagem);

		if(!$queryListagem){
			echo "Erro: queryListagem!";
		};

		// output data of each row
		while($rowListagem = mysqli_fetch_assoc($queryListagem)) {

				// Faz captura de campos
				$produtosEServicos_id	= $rowListagem["produtosEServicos_id"];
				$nome					= $rowListagem["nome"];
				$quantidade				= $rowListagem["quantidade"];
				$preco					= $rowListagem["preco"];
		
		
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

		  <tr>
			<td>---</td>
			<td>---</td>
			<td>---</td>
			<td>---</td>
		  </tr>
		</tbody>
	</table>

<br>
</div>
<!-- /.row -->

<script src="js/produtos-e-servicos-adicionar.js"></script>