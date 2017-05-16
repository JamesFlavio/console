function validaCampo()
{
if(document.cadastro.razao_social_ou_nome.value=="")
	{
	alert("O Campo Razão Social ou Nome é obrigatório!");
	return false;
	}
else
return true;
}
// Fim do JavaScript que validará os campos obrigatórios!



// função consultaCep()

function consultaCep(){
	
	// Ceptura o valor do campo CEP e adiciona ele a uma variável
	var cep			= document.getElementById("cep").value.replace("-",""); //replace para remover o ifén - dse igitado no cep
	
	
	if(cep){

		// Abre link em Modal com o CEP digitado
		$('.modal-body').load('php/consulta-cep-e-ibge.php?cep='+cep);

		$('#myModal').modal('show');
		
		
		
		//		data-toggle="modal" data-target="#myModal";
	
	}

}


$('#cadastro').ready(function () {
   $('input').keypress(function (e) {
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);                
        return (code == 13) ? false : true;
   });
});;

