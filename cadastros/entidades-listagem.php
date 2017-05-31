
<div class="col-lg-12">
	
	<div id="fornecedoresCentro">
	
		<div class="table-responsive">
	
	<table class="table table-striped" style="overflow: auto;">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Razão Social\Nome</th>
			<th>Nome Fantasia\Apelido</th>
			<th>CNPJ\CPF</th>
			<th>Cidade</th>
			<th>UF</th>
		  </tr>
		</thead>
		<tbody>
		
		<?php
		
		include("php/conexao-mysql.php");

		$mysqlListagem 	="
		SELECT id, cnpj_ou_cpf, razao_social_ou_nome, nome_fantasia_ou_sobrenome, ceps_cep,
		cidades.nome AS cidade, cidades.estados_uf AS uf
		FROM cadastros
		JOIN ceps
		JOIN cidades ON cidades.ibge = ceps.cidades_ibge
		WHERE cadastros.tipo LIKE '%$tipo%';
		"; 
		# $sqlListagem

		$queryListagem = mysqli_query($conexaoMysql, $mysqlListagem);

		if(!$queryListagem){
			echo "Erro: queryListagem!";
		};

		// output data of each row
		while($rowListagem = mysqli_fetch_assoc($queryListagem)) {

				// Faz captura de campos
				$id							= $rowListagem["id"];
				$cnpj_ou_cpf				= $rowListagem["cnpj_ou_cpf"];
				$razao_social_ou_nome		= $rowListagem["razao_social_ou_nome"];
				$nome_fantasia_ou_sobrenome	= $rowListagem["nome_fantasia_ou_sobrenome"];
				$cidade						= $rowListagem["cidade"];
				$uf							= $rowListagem["uf"];
		
		
		?>

		
		  <tr>
			<td><?php echo $id;?></td>
			<td><?php echo $razao_social_ou_nome;?></td>
			<td><?php echo $nome_fantasia_ou_sobrenome;?></td>
			<td><?php echo $cnpj_ou_cpf;?></td>
			<td><?php echo $cidade;?></td>
			<td><?php echo $uf;?></td>
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