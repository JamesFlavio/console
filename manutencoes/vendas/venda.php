<div class="col-xs-12">

    <?php
        
        // BUGS
        // 01:  1
        		
        
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
    	$bd->setSelect("SELECT id, razao_social_ou_nome,cnpj_ou_cpf FROM cadastro WHERE id = '$id'");
    	
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
    	<div class="col-lg-4">
        	<table class="table table-condensed table-responsive">
        		<tr>
        			<td>ID:</td>
        			<td><?php echo $id?></td>
        		</tr>
        		<tr>
        			<td>Razão Social:</td>
        			<td><?php echo $razao_social_ou_nome?></td>
        		</tr>
        		<tr>
        			<td>CNPJ/CPF:</td>
        			<td><?php echo $cnpj_ou_cpf?></td>
        		</tr>
        		<tr>
        			<td>Contato:</td>
        			<td><?php echo "Nome do contato"?></td>
        		</tr>
        		<tr>
        			<td>Telefone:</td>
        			<td><?php echo "(61)3046-6866"?></td>
        		</tr>
        	</table>
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


        	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalFaturar">
        		<i class="glyphicon glyphicon-usd"></i>
        		Faturar
        	</button>


        	<button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalNotaFiscal">
        		<i class="glyphicon glyphicon-file"></i>
        		Nota Fiscal
        	</button>
		
        	<button class="btn btn-default" type="submit">
        		<i class="glyphicon glyphicon-floppy-disk"></i>
        		Salvar como
        	</button>
		</div>
    </div>
    
	<table class="table table-striped">
        <tr>
            <th>Cod.</th>
            <th>Nome</th>
            <th>Qnt</th>
            <th>Preço Unt.</th>
            <th>Total</th>
            <th>Excluir</th>
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
        	<td>
        		<input type="number" class="form-control">
        	</td>
        	<td>Nome de produto excepcionalmente grande para fins de teste do layout.</td>
        	<td>
        		<input id="qtd" type="number" class="form-control">
    		</td>
        	<td>
        		<input type="number" class="form-control">
    		</td>
        	<td>
        		<input type="number" class="form-control">
    		</td>
        	<td>
        		<button class="btn btn-default" type="button">
        			<i class="glyphicon glyphicon-remove"></i>
        			Excluir
    			</button>
			</td>
        </tr>
	</table>
	
<div class="row col-lg-12">
 
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4 col-lg-4">
      <div class="panel panel-warning">
        <div class="panel-heading">Espécie</div>
        <div class="panel-body">Espécie:
            <select>
              <option value="volvo">Dinheiro</option>
              <option value="saab">Cartão</option>
              <option value="saab">Boleto</option>
              <option value="opel">Cheque</option>
              <option value="audi">Outros</option>
            </select>
        </div>
      </div>
    </div>
    
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-lg-4">
      <div class="panel panel-success">
      
        <div class="panel-heading">Condição de pagamento</div>
        
        <div class="panel-body">
        	<div calss="row col-lg-12">
    			<div class=" row col-lg-5">
        		  <div class="input-group">
        			<input type="text" class="form-control" placeholder="Cód.">
        			<div class="input-group-btn">
        			  <button class="btn btn-default" type="submit">
        				<i class="glyphicon glyphicon-search"></i>
        			  </button>
        			</div>
        		  </div>
    		  	</div>
    			<div class="col-lg-7">6x com 30 dias.</div>
		  	</div>
		  	<div class="row col-lg-12 text-center">Parcelas</div>
		  	<div class="row col-lg-12">
             	<div class="col-lg-6"><span class="badge badge-primary">1º</span>18/08/2017</div>
            	<div class="col-lg-6"><span class="badge badge-primary">2º</span>18/09/2017</div>
            	<div class="col-lg-6"><span class="badge badge-primary">3º</span>18/10/2017</div>
            	<div class="col-lg-6"><span class="badge badge-primary">4º</span>18/11/2017</div>
            	<div class="col-lg-6"><span class="badge badge-primary">5º</span>18/12/2017</div>
            	<div class="col-lg-6"><span class="badge badge-primary">6º</span>18/01/2018</div>
        	</div>
        </div>

      </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-lg-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Resumo</div>
        <div class="panel-body">
			<div>
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
            	</table>
			</div>
		</div>
      </div>
    </div>

</div>

  <!-- Modal Nota Fiscal-->

  <div class="modal fade" id="modalNotaFiscal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content" id="nfContent">
      	<!-- Modal header-->
        <div class="modal-header" id="nfHeader">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Nota Fiscal</h4>
        </div>
        <!-- Modal body-->
        <div class="modal-body" id="nfBody">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#cabecalho">Cabeçalho</a></li>
              <li><a data-toggle="tab" href="#transportador">Transportador</a></li>
              <li><a data-toggle="tab" href="#adicionais">Dados Adicionais</a></li>
            </ul>

            <div class="tab-content">
              
              <!-- cabecalho -->
              <div id="cabecalho" class="tab-pane fade in active">
                
                <div class="row">
                  
                  <div class="col-xs-12 col-md-6">
                    <h5>Método de impressão de Nota Fiscal</h5>
                      <div class="radio">
                        <label><input type="radio" name="nfe">Nota Fiscal Eletrônica</label>
                      </div>
                      <div class="radio">
                        <label><input type="radio" name="nfe">Nota Fiscal em Contingência</label>
                      </div>
                      <label class="checkbox-inline">
                      	<input type="checkbox" value="nfsimples">Nota Fiscal de Simples Lançamento (sem impressão)
                      </label>
                  </div>
                  
                  <div class="col-xs-12 col-md-2">
                    <label for="serie">Série Eletrônica:</label>
                    <input type="text" class="form-control" id="serie">
                    <label for="cfop">CFOP:</label>
                    <div class="input-group">
                      <input type="text" class="form-control">
                      <div class="input-group-btn">
                        <button class="btn btn-default" type="button">
                          <i class="glyphicon glyphicon-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-xs-12 col-md-3">
                    <label for="emissao">Emissão:</label>
                    <input type="date" class="form-control" id="emissao">
                    <label for="data">Data Saída / Entrada:</label>
                    <input type="date" class="form-control" id="data">
                  </div>
                  
                </div>
              </div>
              
              <!-- transportador -->
              <div id="transportador" class="tab-pane fade">
              	
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12"><h4>Transportador / Volumes transportados:</h4></div>
                  <div class="col-xs-12 col-sm-6 col-md-4">
                  	Frete por conta de:
                    <div class="radio">
                      <label><input type="radio" name="frete">Emitente</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="frete">Destinatário/Remetente</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="frete">Terceiros</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="frete">Sem Frete</label>
                    </div> 
                  </div>
                  
                </div>
                
                <div class="row">
                
                  <div class="col-xs-12 col-sm-6 col-md-4">
                    <label for="transportadora">Transportadora:</label>
                    <div class="input-group">
                      <input type="text" class="form-control">
                      <div class="input-group-btn">
                        <button class="btn btn-default" type="button">
                          <i class="glyphicon glyphicon-search"></i>
                        </button>
                      </div>
                    </div>
                    <label for="cfoptransporte">CFOP Transporte:</label>
                    <div class="input-group">
                      <input type="text" class="form-control">
                      <div class="input-group-btn">
                        <button class="btn btn-default" type="button">
                          <i class="glyphicon glyphicon-search"></i>
                        </button>
                      </div>
                    </div>
                    <label for="placa">Placa:</label>
                    <div class="input-group">
                      <input type="text" class="form-control">
                      <div class="input-group-btn">
                        <button class="btn btn-default" type="button">
                          <i class="glyphicon glyphicon-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-xs-12 col-sm-6 col-md-4">
                    <label for="cep">Cep:</label>
                    <div class="input-group">
                      <input type="text" class="form-control">
                      <div class="input-group-btn">
                        <button class="btn btn-default" type="button">
                          <i class="glyphicon glyphicon-search"></i>
                        </button>
                      </div>
                    </div>
                    <label for="uf">UF:</label>  
                    <input type="text" class="form-control" placeholder="" name="voutras" id="uf">
                    <label for="antt">Código ANTT:</label>  
                  	<input type="text" class="form-control" placeholder="" name="antt" id="antt">
                  </div>
                  
                  <div class="col-xs-12 col-sm-6 col-md-4">
                    <label for="vfrete">Valor Frete:</label>  
                    <input type="text" class="form-control" placeholder="0,00" name="vfrete" id="vfrete">
                    <label for="vseguro">Valor Seguro:</label>  
                    <input type="text" class="form-control" placeholder="0,00" name="vseguro" id="vseguro">
                    <label for="voutras">Valor Outras Despesas:</label>  
                    <input type="text" class="form-control" placeholder="0,00" name="voutras" id="voutras">
                  </div>
                  
                </div>
              	
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12"><h4>Volumes:</h4></div>
                  
                  <div class="col-xs-12 col-sm-6 col-md-4">
                    <label for="quantidade">Quantidade:</label>  
                    <input type="text" class="form-control" placeholder="0" name="quantidade" id="quantidade">
                    <label for="especie">Espécie:</label>  
                    <input type="text" class="form-control" placeholder="" name="especie" id="especie">
                  </div>

                  <div class="col-xs-12 col-sm-6 col-md-4">
                    <label for="marca">Marca:</label>  
                    <input type="text" class="form-control" placeholder="" name="marca" id="marca">
                    <label for="numero">Número:</label>  
                    <input type="text" class="form-control" placeholder="" name="numero" id="numero">
                  </div>

                  <div class="col-xs-12 col-sm-6 col-md-4">
                    <label for="pbruto">Peso Bruto:</label>  
                    <input type="text" class="form-control" placeholder="0,000" name="pbruto" id="pbruto">
                    <label for="pliquido">Peso Líquido:</label>  
                    <input type="text" class="form-control" placeholder="0,000" name="pliquido" id="pliquido">
                  </div>
                
                
                </div>
              </div><!-- transportador -->
              
              <!-- adicionais -->
              <div id="adicionais" class="tab-pane fade">
                
                <div class="row">
                  <div class="col-xs-12 col-md-12 col-lg-12">
                  	<h4>Mensagens:</h4>
                  </div>

                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label class="col-xs-12 col-sm-7 col-md-5"for="mensagem">Mensagem ICMS:</label>
                      <div class="input-group col-xs-12 col-sm-5 col-md-7">
                        <input type="text" class="form-control input-sm">
                        <div class="input-group-btn">
                          <button class="btn btn-default input-sm" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                          </button>
                        </div>
                      </div>
                      <textarea class="form-control" rows="5" id="mensagem"></textarea>
                    </div>
                  </div>
				
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <label for="fisco">Informações de interesse ao Fisco:</label>
                      <textarea class="form-control" rows="5" id="fisco"></textarea>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        
        <!-- Modal Footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div> <!-- Modal content-->
      
    </div>
  </div> <!-- Modal -->
  
  <!-- Modal Faturar-->
  <div class="modal fade" id="modalFaturar" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Condição de Pagamento</h4>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <tr>
                  <td>Cód.</td>
                  <td>Parcelas</td>
                  <td>Qtd. Parcelas</td>
                  <td>Descrição</td>
              </tr>
              <tr>
                  <td>1</td>
                  <td>0</td>
                  <td>01</td>
                  <td>À Vista</td>
              </tr>
              <tr>
                  <td>2</td>
                  <td>30/60</td>
                  <td>02</td>
                  <td>Duas vezes</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
<script src="manutencoes/vendas/js/produtos-e-servicos-adicionar.js"></script>

