<div class="col-xs-12">

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
    
    	/**
    	 * Faz o insert no banco de uma nova venda ao cliente selecionado
    	 */
    
    	// SELECT
    	
    	include("class/BancoMysql.php");
    
    	$bd	= new BancoMysql();
    	$bd->setSelect("SELECT id, razao_social_ou_nome,cnpj_ou_cpf FROM cadastro WHERE id = '".$_SESSION['venda']['cadastro_id']."';");
    	
    	$rows	= $bd->getSelect();
    		
		$id						= $rows['id'];
		$razao_social_ou_nome	= $rows['razao_social_ou_nome'];
		$cnpj_ou_cpf         	= $rows['cnpj_ou_cpf'];
		 
	?>

	<div class="row">
    	<div class="col-xs-12">
        	<button class="btn btn-default" type="button" onclick="linkModal('manutencoes/vendas/venda_cabecalho.php');">
        		<span class="glyphicon glyphicon-user"></span>
        		Alterar cliente
        	</button>
    	</div>
	</div>

	<div class="row">	
		<div class="col-lg-2">
			<div>ID:</div>
			<div>Razão Social:</div>
			<div>CNPJ/CPF:</div>
    		<div>Contato:</div>
    		<div>Telefone:</div>
		</div>
		<div class="col">
    		<div><?php echo $id?></div>	
			<div><?php echo $razao_social_ou_nome?></div>
    		<div><?php echo $cnpj_ou_cpf?></div>
    		<div><?php echo "Nome do contato"?></div>
    		<div><?php echo "(61)3046-6866"?></div>
		</div>
	</div>

    <div class="row">
		<div class="col-xs-12">
        	<button class="btn btn-default" type="button" onclick="linkModal('manutencoes/vendas/produto_incluir.php');">
        		<i class="glyphicon glyphicon-ok"></i>
        		Incluir
        	</button>

	
        	<button class="btn btn-default" type="submit">
        		<i class="glyphicon glyphicon-remove"></i>
        		Excluir Tudo
        	</button>


        	<button class="btn btn-default" type="submit">
        		<i class="glyphicon glyphicon-usd"></i>
        		Faturar
        	</button>


        	<button class="btn btn-default" type="submit">
        		<i class="glyphicon glyphicon-file"></i>
        		Nota Fiscal
        	</button>
		
        	<button class="btn btn-default" type="submit">
        		<i class="glyphicon glyphicon-floppy-disk"></i>
        		Salvar como
        	</button>
		</div>
    </div>
    
	<table class="table table-striped" style="overflow: auto;">
        <tr>
            <th class="col-sm-1">Cod.</th>
            <th class="col-sm-4">Nome</th>
            <th class="col-sm-2 text-center">Qnt</th>
            <th class="col-sm-2">Preço Unt.</th>
            <th class="col-sm-2">Total</th>
            <th class="col-sm-1">Excluir</th>
        </tr>

		
	<?php
    	
    	$bdproduto = new BancoMysql();
    	$bdproduto->setSelect("
    		SELECT venda_item.produto_id, produto.nome, venda_item.quantidade, venda_item.valor_unitario
    		FROM venda_item
    		JOIN produto
    		ON produto.id = venda_item.produto_id
    		WHERE venda_id = '1'
    	;");
    	
    
    
    	// output data of each row
    	while($rowproduto = $bdproduto->getSelect()) {
    
    			// Faz captura de campos
    			$produto_id	= $rowproduto["produto_id"];
    			$nome					= $rowproduto["nome"];
    			$quantidade				= $rowproduto["quantidade"];
    			$valor_unitario			= $rowproduto["valor_unitario"];
    	
    	
	?>

    
        <tr>
            <td>Produto <?php echo $produtosEServicos_id;?></td>
            <td><?php echo $nome;?></td>
            <td><?php echo $quantidade;?></td>
            <td><?php echo $preco;?></td>
            <td>Total <?php echo $quantidade*$preco;?></td>
        </tr>

	<?php

	   };
    
	?>
        <tr>
        	<td>Produto </td>
        	<td>Nome</td>
        	<td>
                <div class="input-group form-group">
                	<!-- <div class="input-group-btn">
                    	<button class="btn btn-default" type="submit">
                    		<i class="glyphicon glyphicon-minus"></i>
                    	</button>
                    </div> -->
                	
                	<input id="qtd" type="number" class="form-control">
                	
                	<!-- <div class="input-group-btn">
                    	<button class="btn btn-default" type="submit">
                    		<i class="glyphicon glyphicon-plus"></i>
                    	</button>
                    </div> -->
                    </div>
        	</td>
        	<td>
        		<div class="input-group form-group">
        			<input type="number" class="form-control">
        		</div>
        	</td>
        	<td>
				<div class="input-group form-group">
        			<input type="number" class="form-control">
        		</div>
			</td>
        	<td>	
        		<button class="btn btn-default" type="button">
        			<i class="glyphicon glyphicon-remove"></i>
        			Excluir
        		</button>
        	</td>
        </tr>
	</table>
	
	<div class="row">
		<div class="col-lg-4 col-lg-offset-8">
        	<table class="table table-condensed table-responsive">
        		<tr>
        			<td>Total de produtos:</td>
        			<td>Valor total</td>
        		</tr>
        		<tr>
        			<td>Total de serviços:</td>
        			<td>Valor total</td>
        		</tr>
        		<tr>
        			<td>Frete/acréscimos:</td>
        			<td>Valor total</td>
        		</tr>
        		<tr>
        			<td>Descontos:</td>
        			<td>Valor total</td>
        		</tr>
        		<tr>
        			<td>Total do pedido:</td>
        			<td>Valor total</td>
        		</tr>
        		<tr>
        			<td>Espécie:</td>
        			<td>Valor total</td>
        		</tr>
        		<tr>
        			<td>Condição de pagamento:</td>
        			<td>Condição</td>
        		</tr>
        	</table>
        </div>
    </div>
</div>
<script src="manutencoes/vendas/js/produtos-e-servicos-adicionar.js"></script>