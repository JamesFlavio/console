<div class="col-lg-12" >

<?php

// BUGS
// 01: Fazer o cadastro automaticamente após o CEP for consultado sem mostrar tela
// 02: Ao CEP estar sendo adicionado na consulta, atualizar a impressão do Cod. IBGE na página
// 03: Verificar as adições novidades e promoções
// 04: Ajustar layout de exibição do Já cadastrado ou de erros para o Modal
// 05: Correção de Charset no banco e ná página. Ex: Campo Estados
// 06: Verificar a adição de CEP caso o mesmo não seja encontrado.
// 07: URGENTE - CEPS não estão sendo adicionados quando a cidade é a mesma para DF
// 08: Quando o CEP da função 7 não está sendo cadastrado, não está sendo exibido o erro
// 09: Está sendo obrigado a informar o cep, então verificar a mensagem de erro na hora
// do cadastro sem o CEP e informar ao usuário
// 10: Deopis de cadastrado um fornecedor, se tentar consultar outro CNPJ ele apresenta
// uma mensagem de erro. 


@$cmd 						= $_GET ["cmd"];

@$cnpj_ou_cpf				= $_POST ["cnpj_ou_cpf"];
@$ie_ou_rg					= $_POST ["ie_ou_rg"];
@$im						= $_POST ["im"];
@$razao_social_ou_nome		= $_POST ["razao_social_ou_nome"];
@$nome_fantasia_ou_sobrenome= $_POST ["nome_fantasia_ou_sobrenome"];
@$apelido					= $_POST ["apelido"];
@$cep						= $_POST ["cep"];
@$cidade					= $_POST ["cidade"]; // ??? NÃO UTILIZADA POIS VEM DO CEP
@$ibge						= $_POST ["ibge"];
@$uf						= $_POST ["uf"];
@$endereco					= $_POST ["endereco"];
@$numero					= $_POST ["numero"];
@$bairro					= $_POST ["bairro"];
@$complemento				= $_POST ["complemento"];
@$telefones					= $_POST ["telefones"];
@$ramais					= $_POST ["ramais"];
@$fax						= $_POST ["fax"];
@$celular					= $_POST ["celular"];
@$responsaveis				= $_POST ["responsaveis"];
@$emails					= $_POST ["emails"];
@$sites						= $_POST ["sites"];
@$novidades					= $_POST ["novidades"];
@$promocoes					= $_POST ["promocoes"];
@$observacoes				= $_POST ["observacoes"];

switch ($cmd) {
case "adicionar":
	include("cadastros/entidades-adicionar-cmd.php");
	break;
};	

?>


<ul class="nav nav-tabs" style="padding-top: 15px;">
  <li class="active"><a href="#">Identificação</a></li>
  <li><a href="#">Endereço</a></li>
  <li><a href="#">Contato</a></li>
</ul>


    <form id="cadastro" name="cadastro" role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>&cmd=adicionar" onsubmit="return validaCampo(); return false;" style="padding-top: 10px;">
	
		<div class="form-group has-warning">
			<label>Tipo de fornecedor.</label>
			<select class="form-control">
				<option>PF - Pessoa Física</option>
				<option>PJ - Pessoa Jurídica</option>
			</select>
		</div>
	
		<div class="form-group has-warning">
			<label>CNPJ ou CPF</label>
			<input type="text" name="cnpj_ou_cpf" value="<?php echo $cnpj_ou_cpf;?>" class="form-control" placeholder="CNPJ ou CPF">
		</div>
		
		<div class="form-group has-warning">
			<label for="ie_ou_rg">IE ou RG</label>
			<input type="text" name="ie_ou_rg" value="<?php echo $ie_ou_rg;?>" class="form-control" placeholder="IE ou RG">
		</div>
		
		<div class="form-group has-warning">
			<label for="im">IM</label>
			<input type="text" name="im" value="<?php echo $im;?>" class="form-control" placeholder="IM">
		</div>
		
		<div class="form-group has-warning">
			<label>Razão Social ou Nome</label>
			<input type="text" name="razao_social_ou_nome" value="<?php echo $razao_social_ou_nome;?>" class="form-control" placeholder="Razão Social ou Nome">
		</div>
		
		<div class="form-group">
			<label>Nome Fantasia ou Sobrenome</label>
			<input type="text" name="nome_fantasia_ou_sobrenome" value="<?php echo $nome_fantasia_ou_sobrenome;?>" class="form-control" placeholder="Nome Fantasia ou Sobrenome">
		</div>

		<div class="form-group">
			<label>Apelido</label>
			<input type="text" name="apelido" value="<?php echo $apelido;?>" class="form-control" placeholder="Apelido">
		</div>
<hr>
		<div class="form-group has-warning">
			<label>CEP</label>
			<input type="text" id="cep" name="cep" value="<?php echo $cep;?>" onfocusout="consultaCep();" class="form-control" placeholder="CEP">
		</div>

		<div class="form-group has-warning">
			<label>Cidade</label>
			<input type="text" id="cidade" name="cidade" value="<?php echo $cidade;?>" class="form-control" placeholder="Cidade">
			<input type="hidden" id="ibge" name="ibge" value="<?php echo $ibge;?>"> <?php echo " Codigo IBGE:$ibge";?>
		</div>

		<div class="form-group has-warning">
			<label>UF</label>
			<select id="uf" name="uf" class="form-control">
				<option>Selecione</option>

				<?php 

				include("php/conexao-mysql.php");

				// SELECT dos estados
				$sqlEstados			= "SELECT uf,nome FROM estados;";
				$queryEstados		= mysqli_query($conexaoMysql,$sqlEstados);
				
				while($rowsEstados	= mysqli_fetch_assoc($queryEstados)){
					
					$estadosUf		= $rowsEstados['uf'];
					$estadosNome	= $rowsEstados['nome'];
					
					// Veirifica se algum estado será selecionado com base na variável
					// $uf retornada do formulário
					if($estadosUf==$uf){$selected = "selected";} else {$selected ="";}
					
					// Imprime os resultados
					echo "<option id='$estadosUf' value='$estadosUf' $selected>$estadosUf - $estadosNome</option>";
				
				}
				
				?>
			</select>
		</div>

		<div class="form-group has-warning">
			<label>Endereço</label>
			<input type="text" id="endereco" name="endereco" value="<?php echo $endereco;?>" class="form-control" placeholder="Endereço">
		</div>

		<div class="form-group has-warning">
			<label>Número</label>
			<input type="text" id="numero" name="numero" value="<?php echo $numero;?>" class="form-control" placeholder="Número">
		</div>

		<div class="form-group has-warning">
			<label>Bairro</label>
			<input type="text" id="bairro" name="bairro" value="<?php echo $bairro;?>" class="form-control" placeholder="Bairro">
		</div>

		<div class="form-group">
			<label>Complemento</label>
			<input type="text" id="complemento" name="complemento" value="<?php echo $complemento;?>" class="form-control" placeholder="Complemento">
		</div>
<hr>
		<div class="form-group has-warning">
			<label>Telefone fixo</label>
			<input type="text" id="telefones" name="telefones" value="<?php echo $telefones;?>" class="form-control" placeholder="Telefone fixo">
		</div>
		
		<div class="form-group has-warning">
			<label>Ramais</label>
			<input type="text" name="ramais" value="<?php echo $ramais;?>" class="form-control" placeholder="Ramais">
		</div>
		
		<div class="form-group">
			<label>Fax</label>
			<input type="text" name="fax" value="<?php echo $fax;?>" class="form-control" placeholder="Fax">
		</div>

		<div class="form-group">
			<label>Celular</label>
			<input type="text" name="celular" value="<?php echo $celular;?>" class="form-control" placeholder="Celular">
			<select>
				<option>Claro</option>
				<option>Nextel</option>
				<option>Oi</option>
				<option>Tim</option>
				<option>Vivo</option>
			</select>
		</div>

		<div class="form-group">
			<label>Responsáveis</label>
			<input type="text" name="responsaveis" value="<?php echo $responsaveis;?>" class="form-control" placeholder="Responsáveis">
		</div>

		<div class="form-group input-group has-warning">
			<span class="input-group-addon">@</span>
			<input type="text" name="email" value="<?php echo $emails;?>" class="form-control" placeholder="E-mail">
		</div>

		<div class="form-group">
			<label>Sites</label>
			<input type="text" name="sites" value="<?php echo $sites;?>" class="form-control" placeholder="Sites">
		</div>

		<div class="form-group">
			<label>Tabela de preços</label>
			<select class="form-control">
				<option>01 - Consumidor Final</option>
				<option>02 - Revenda</option>
			</select>
		</div>

		<div class="form-group">
			<label>Vendedor</label>
			<select class="form-control">
				<option>Selecione um vendedor</option>
				<option>01 - João</option>
				<option>02 - Pedro</option>
			</select>
		</div>

        <div class="form-group">
            <label>Arquivos</label>
            <input type="file">
        </div>

        <div class="form-group">
            <label>Observações</label>
            <textarea name="observacoes" value="<?php echo $observacoes;?>" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label>Assinaturas</label>
            <div class="checkbox">
                <label>
                    <input name="novidades" type="checkbox" value="ATIVO" checked="checked">Novidades
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input name="promocoes" type="checkbox" value="ATIVO" checked="checked">Promoções
                </label>
            </div>
        </div>

        <button type="button" class="btn btn-primary" onclick="document.getElementById('cadastro').submit();">Cadastrar</button>

    </form>

<br>
</div>
<!-- /.row -->

<script src="js/entidades-adicionar.js"></script>