    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

<?php

	$tipo = $_GET['tipo']; // 0 = Alerta, 1 Carregamento, 2 = Confirmação e 3 = Erro 
	$msg  = $_GET['msg']; // mensagem a ser exibida




?>

<input type="hidden" id="tipo" value="<?php echo $tipo; ?>" />


<div id="alerta" style="display:<?php if($tipo=="0") {} else { echo "none;"; }?>" >

	<div class="col-sm-2">

		<i class="glyphicon glyphicon-warning-sign"></i>

	</div>
	
	<div class="text-centro">

		<?php echo $msg;?>
		
	</div>

</div>

