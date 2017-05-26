// função linkModal()

function linkModal(link){
	
	// Abre link em Modal com o link chamado na função
	$('.modal-body').load(link);
    
	$('#myModal').modal('show');
	
}