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