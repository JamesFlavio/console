<!-- 
BUGs
01: Criar página de visualização de informações do cadastro selecionado
02: Criar página de edição do cadastro selecionado

 -->

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Vendas</h1>
            <ol class="breadcrumb">
				<li>
					<i class="fa fa-dashboard"></i> <a href="./">Dashboard</a>
				</li>
				<li class="active">
					<i class="fa fa-wrench"></i> <a href="?console=manutencoes">Manutenções</a>
				</li>
				<li class="active">
					<i class="fa fa-wrench"></i> <a href="?console=manutencoesVendas">Vendas</a>
				</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

	
	
    <div class="row">
	
	<?php
	
	@$console = $_GET ['acao'];
	
	// Filtro para ações da página Cadastros filtrado do campo manutencoes>manutencoes.tipo
	$tipo = 2;
	
	switch ($console) {
	case "adicionar":
		include("manutencoes/vendas/produtos-e-servicos-adicionar.php");
		break;
	case "adicionarCabecalho":
		include("manutencoes/vendas/produtos-e-servicos-adicionar-cabecalho.php");
		break;
	default:
		include("manutencoes/vendas/vendas-listagem.php");
	
	}
	?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
<!-- / <script type="text/javascript" src="js/manutencoes-formatacao-de-campos.js"></script>  -->