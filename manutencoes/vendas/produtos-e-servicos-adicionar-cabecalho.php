<div class="col-lg-12" >

<?php

// BUGS
// 01:  


@$cmd 			= $_GET ["cmd"];

switch ($cmd) {
case "adicionar":
	include("cadastros/produtos-e-servicos-adicionar-cmd.php");
	break;
};	

?>

<form method="post" action="?console=manutencoesVendas&acao=adicionar">
	<div class="form-group ">
		<label>Cliente</label>
		<select id="id" name="id" class="form-control">
			<option value="0">Selecione um cliente</option>
		
			<?php 
	
			include("php/conexao-mysql.php");
	
			// SELECT dos estados
			$sqlEstados			= "SELECT id,razao_social_ou_nome FROM cadastros WHERE tipo LIKE '%0%';";
			$queryEstados		= mysqli_query($conexaoMysql,$sqlEstados);
			
			
			while($rowsEstados	= mysqli_fetch_assoc($queryEstados)){
				
				$id						= $rowsEstados['id'];
				$razao_social_ou_nome	= $rowsEstados['razao_social_ou_nome'];
				
			
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