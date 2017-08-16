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
