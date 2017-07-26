<script>
/**
 * Verifica se algum cliente foi selecionado ao pressionar o botão adicionar "+".
 */
 function valida(){
	 
 	if (form_cabecalho.id_cliente.value == ""){
 	 	
		alert("Campos obrigatórios faltando!");
 		form_cabecalho.id_cliente.focus();
 		
	} else {
		form_cabecalho.submit();
	}
	
 }


 
/**
 * Adiciona venda a table "venda" com o cliente selecionado e a data atual.
 */

/**
 * Fecha o cabeçalho e segue para a venda.
 */


 /**
  * Pesquisa o produto conforme o digitado
  */
 function pesquisa(){
 	
 	//verifica o valor pesquisado
 	var valor = document.getElementById("razao_social_nome").value;	

 	//imprime o select retornado na div resultados
 	$('#listaCliente').load("manutencoes/vendas/cliente_pesquisa.php?valor="+valor);
 	
 }

</script>


<?php

// BUGS
// 01:  


?>
    <div class="modal-body">
    	<form name="form_cabecalho" action="<?php echo $_SERVER['HTTP_REFERER']."&acao=venda"; ?>" method="POST">
        	<div class="form-group row">
          		<div class="col-xs-2">
                    <label for="id">ID</label>
                    <input class="form-control" type="text" id="id_cliente" disabled>
                    <input type="hidden" id="hiddenId_cliente" name="id" >
    			</div>
                
                <label for="cliente">Cliente</label>
        		<div class="col-xs-10 input-group">
            		<input class="form-control" type="text" id="razao_social_nome" onkeypress="pesquisa();">
        			<div class="input-group-btn">
            			<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
            			<button class="btn btn-default" onclick="valida()" type="button"><i class="glyphicon glyphicon-ok"></i></button>
        			</div>      
        		</div>
    		</div>
        </form>
    </div>
    <div id="listaCliente">
    	<?php 
        	include("cliente_pesquisa.php");
        ?>
    </div>