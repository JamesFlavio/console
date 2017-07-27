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
	/**
	 * @author James Flávio Nunes da Cruz
	 * @version 1.0.0.0
	 * @param var $console Captura o valor de 'acao' pela função GET para ver o que incluir
	 */	
	@$console = $_GET ['acao'];
	
	/**
	 * @var int |0|1|2| Ver onde está sendo utilizada
	 */
	$tipo = 2;
	
	//Filtro para ações da página Cadastros filtrado do campo manutencoes>manutencoes.tipo
	
	switch ($console) {
	case "venda":
		include("manutencoes/vendas/venda.php");
		break;
/*	APAGAR
 * case "adicionarCabecalho":
		include("manutencoes/vendas/venda_cabecalho.php");
		break;
*/
	default:
		include("manutencoes/vendas/venda_listagem.php");
	
	}
	?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
<!-- / <script type="text/javascript" src="js/manutencoes-formatacao-de-campos.js"></script>  -->