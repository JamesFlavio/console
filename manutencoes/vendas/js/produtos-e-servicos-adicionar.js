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