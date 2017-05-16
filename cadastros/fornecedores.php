<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Fornecedores
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="./">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> <a href="?console=cadastrosFornedores">Fornecedores</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

			<div name="formularios" class="row">
			
			<form class="col-xs-6" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>&acao=adicionar">
			  <div class="input-group">
				<input type="text" name="cnpj_ou_cpf" class="form-control" placeholder="CNPJ ou CPF" br-input="cnpj">
				<div class="input-group-btn">
				  <button class="btn btn-default" type="submit">
					<i class="glyphicon glyphicon-plus"></i>
				  </button>
				</div>
			  </div>
			</form>
		
			<form class="col-xs-6">
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
	
	
    <div class="row">
	
	<?php
	
	@$console = $_GET ['acao'];
	
	switch ($console) {
	case "adicionar":
		include("cadastros/fornecedores-adicionar.php");
		break;
	default:
		include("cadastros/fornecedores-listagem.php");
	
	}
	?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
<!-- / <script type="text/javascript" src="js/cadastros-formatacao-de-campos.js"></script>  -->