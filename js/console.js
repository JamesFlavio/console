// fun��o linkModal()

function linkModal(link){
	
	// Abre link em Modal com o link chamado na fun��o
	$('.modal-body').load(link);
    
	$('#myModal').modal('show');
	
}