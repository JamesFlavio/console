function validaCampo()
{
if(document.cadastro.razao_social_ou_nome.value=="")
	{
	alert("O Campo Raz�o Social ou Nome � obrigat�rio!");
	return false;
	}
else
return true;
}
// Fim do JavaScript que validar� os campos obrigat�rios!



// fun��o consultaCep()

function consultaCep(){
	
	// Ceptura o valor do campo CEP e adiciona ele a uma vari�vel
	var cep			= document.getElementById("cep").value.replace("-",""); //replace para remover o if�n - dse igitado no cep
	
	
	if(cep){

		// Abre link em Modal com o CEP digitado
		$('.modal-body').load('php/consulta-cep-e-ibge.php?cep='+cep);

		$('#myModal').modal('show');
		
	
	}

}

