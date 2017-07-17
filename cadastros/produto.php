<!-- 
BUGs
01: Criar página de visualização de informações do cadastro selecionado
02: Criar página de edição do cadastro selecionado

 -->

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Produtos e Serviços
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="./">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> <a href="?console=cadastroProduto">Produtos e Serviços</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

			<div name="formularios" class="row">
			
			<form
			
			class="
					col-xs-2
					col-sm-1
					col-md-1
					col-lg-1
				  "
			
			method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>&acao=adicionar">
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
	
	
    <div class="row">
	
	<?php
	
	@$console = $_GET ['acao'];
	
	// Filtro para ações da página Cadastros filtrado do campo cadastros>cadastros.tipo
	$tipo = 2;
	
	switch ($console) {
	case "adicionar":
		include("cadastros/produto-adiciona.php");
		break;
	default:
		include("cadastros/produto-listagem.php");
	
	}
	?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
<!-- / <script type="text/javascript" src="js/cadastros-formatacao-de-campos.js"></script>  -->