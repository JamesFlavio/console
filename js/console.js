/**
 * 
 */

function linkModal(link, id){
	var valor = '';
	
	if(id){
		var valor = document.getElementById(id).value; //
	}
	
	if(link){

		// Abre link em Modal com o valor digitado
		$('.modal-body').load(link+valor);

		$('#myModal').modal('show');

	}

}

function setValue(id, value) {
    document.getElementById(id).value = value;
}

function setHtml(id, value) {
    document.getElementById(id).innerHTML = value;
}

function closeModal(){
	$('#myModal').modal('hide');
}