<div class="col-lg-12" >

<?php

// BUGS
// 01:  


@$cmd 			= $_GET ["cmd"];

?>

<form method="post" action="?console=manutencoesVendas&acao=adicionar">
	<div class="form-group ">
		<label>Cliente</label>
		<select id="id" name="id" class="form-control">
			<option value="0">Selecione um cliente</option>
		
			<?php 
	
			include("class/BancoMysql.php");
	
			$bd	= new BancoMysql();
			$bd->setSelect("SELECT id,razao_social_ou_nome FROM cadastro WHERE tipo LIKE '%0%';");
			
			while($rows	= $bd->getSelect()){
				
				$id						= $rows['id'];
				$razao_social_ou_nome	= $rows['razao_social_ou_nome'];
				
			
				// Imprime os resultados
				echo "<option id='$id' value='$id'>$id - $razao_social_ou_nome</option>";
			
			}
			
			?>
		</select>
	
		<button class="btn btn-default" type="submit">
			<i class="glyphicon glyphicon-ok"></i>
		</button>
	
	</div>
</form>