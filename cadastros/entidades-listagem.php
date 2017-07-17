<?php
/**
 * BUGS/ALTERAÇÕES
 * 01 - Criar condição if antes de começar a listagem para ver se o resultado da pesquisa é maior que zero.
 * 02 - Retirar link de edição da razão social e colocar como duplo clique na linha inteira
 */
?>
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

		require_once 'class/BancoMysql.php';
		
		$bd = new BancoMysql();
		$bd->setSelect("
    		SELECT id, cnpj_ou_cpf, razao_social_ou_nome, nome_fantasia_ou_sobrenome, cep_cep,
    		cidade.nome AS cidade, cidade.estado_uf AS uf
    		FROM cadastro
    		JOIN cep ON cep.cep = cadastro.cep_cep
    		JOIN cidade ON cidade.ibge = cep.cidade_ibge
    		WHERE cadastro.tipo LIKE '%$tipo%';
        ");
		
		while($rows = $bd->getSelect()) {

				// Faz captura de campos
				$id							= $rows["id"];
				$cnpj_ou_cpf				= $rows["cnpj_ou_cpf"];
				$razao_social_ou_nome		= $rows["razao_social_ou_nome"];
				$nome_fantasia_ou_sobrenome	= $rows["nome_fantasia_ou_sobrenome"];
				$cidade						= $rows["cidade"];
				$uf							= $rows["uf"];
		
		
		?>
	
		  <tr>
			<td><?php echo $id;?></td>
			<td><?php echo "<a href='".$_SERVER['REQUEST_URI']."&acao=adicionar&id=$id'>$razao_social_ou_nome</a>";?></td>
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