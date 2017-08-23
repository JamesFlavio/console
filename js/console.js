/**
 * Alterações a serem feitas
 * closeModal(), adicionar o nome do modal a ser fechado dentro da função, pois podemos ter modais em cima de modais.
 */

/**
 * Abre em modal alguma página
 * @param $link	Link ou endereço da página a ser aberto
 * @param $id	Se houver pesquisa o ID é informado, ID é o ID do campo a ser capturado o valor a pesquisar.
 * @returns
 */

function linkModal(link, id){
	var valor = '';
	
	if(id){
		var valor = document.getElementById(id).value; //
	}
	
	if(link){

		// Abre link em Modal com o valor digitado
		$('#modal-body').load(link+valor);

		$('#myModal').modal('show');

	}

}

/**
 * Seta um valor para o conteúdo de um campo input.
 * @param id	ID do campo onde será alterado o conteúdo.
 * @param value	Valor que será escrito dentro do campo.
 * @returns
 */
function setValue(id, value) {
    document.getElementById(id).value = value;
}

/**
 * Imprime um texto ou conteúdo em uma determinada div.
 * @param id	ID do local a ser alterado o conteúdo.
 * @param value	Valor ou conteúdo a ser exibido.
 * @returns
 */
function setHtml(id, value) {
    document.getElementById(id).innerHTML = value;
}

/**
 * Fecha o modal
 * @returns
 */
function closeModal(){
	$('#myModal').modal('hide');
}

/**
 * Funções para vendas
 * Multiplicação
 */
function calcular(){

	form = document.getElementById('formVenda');						//Passa o id do formulário como parâmentro
	var hiddensEncontrados =0;											//Define a variável hiddensEncontrados = 0
	
 		for (i=0; i<form.elements.length; i++){ 						//Faz um loop por todos os campos do formulário		
			if (form.elements.item(i).getAttribute('type')=="hidden"){	//Captura os hiddens que indentificam a linha de cada produto dentro do formulário
				
				hiddensEncontrados+=1;									//Ver se está sendo usado - Incrementa mais 1 a cada hidden encontrado
				
				var produtoId			= form.elements.item(i).getAttribute('id');		//Id do item atual no loop. --- idProduto1.2 onde 1 é a Id do fonecedor e 2 a Id do produto ---
				var idProduto			= document.getElementById(produtoId).value;		//Captura o valor do hidden --- 1.2 onde 1 é a Id do fonecedor e 2 a Id do produto---
				var quantidade			= document.getElementById('quantidade'+idProduto).value.replace(',','.');	//Captura o valor do campo quantidade e corrige a "," por ".".
				var precoUnitario		= document.getElementById('precoUnitario'+idProduto).value.replace(',','.');		//Captura o valor do campo valor_unitario e corrige a "," por ".".
				
			    document.getElementById('precoTotal'+idProduto).value = quantidade * precoUnitario;
				
			}
		}
 		
 		// AQICIONAR AQUI UMA FUNÇÃO QUE TODA VEZ QUE EXECUTADA A FUNÇÃO CALCULAR, ELE ATUALIZA O CONTEÚDO DE RESUMO.
 		
}