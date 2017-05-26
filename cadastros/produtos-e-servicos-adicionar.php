<div class="col-lg-12" >

<?php

// BUGS
// 01:  


@$cmd 			= $_GET ["cmd"];

@$tipo					= $_POST ["tipo"];
@$barras				= $_POST ["barras"];
@$fabrica				= $_POST ["fabrica"];
@$nome					= $_POST ["nome"];
@$unidade				= $_POST ["unidade"];
@$ncm_codigo					= $_POST ["ncm_codigo"];
@$cest					= $_POST ["cest"];
@$grupo					= $_POST ["grupo"];
@$estoque				= $_POST ["estoque"];
@$minimo				= $_POST ["minimo"];
@$maximo				= $_POST ["maximo"];
@$cfopEntrada_cfops_id	= $_POST ["cfopEntrada_cfops_id"];
@$cfopSaida_cfops_id	= $_POST ["cfopSaida_cfops_id"];
@$observacoes			= $_POST ["observacoes"];
@$site					= $_POST ["site"];
@$observacoes			= $_POST ["observacoes"];


switch ($cmd) {
case "adicionar":
	include("cadastros/produtos-e-servicos-adicionar-cmd.php");
	break;
};	

?>


<ul class="nav nav-tabs" style="padding-top: 15px;">
  <li class="active"><a href="#">Principal</a></li>
  <li><a href="#">Impostos</a></li>
  <li><a href="#">Adicionais</a></li>
</ul>


    <form id="cadastro" name="cadastro" role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>&cmd=adicionar" onsubmit="return validaCampo(); return false;" style="padding-top: 10px;">
	
		<div class="form-group has-warning">
			<label>Tipo</label>
			<select id="tipo" name="tipo" class="form-control">
				<option value="0" <?php if($tipo==0){echo "selected";};?>>Produto</option>
				<option value="1" <?php if($tipo==1){echo "selected";};?>>Serviço</option>
			</select>
		</div>
	
		<div class="form-group has-warning">
			<label>Cod. de Barras</label>
			<input type="text" name="barras" value="<?php echo $barras;?>" class="form-control" placeholder="Cód. de Barras">
		</div>
		
		<div class="form-group has-warning">
			<label for="barras">Cod. de Fábrica</label>
			<input type="text" name="fabrica" value="<?php echo $fabrica;?>" class="form-control" placeholder="Codigo de Fábrica">
		</div>
		
		<div class="form-group has-warning">
			<label for="nome">Nome</label>
			<input type="text" name="nome" value="<?php echo $nome;?>" class="form-control" placeholder="Nome">
		</div>
		
		<div class="form-group has-warning">
			<label>Unidade</label>
			<input type="text" name="unidade" value="<?php echo $unidade;?>" class="form-control" placeholder="Unidade">
		</div>
		
		<div class="form-group">
			<label>NCM</label>
			<input type="text" name="ncm_codigo" value="<?php echo $ncm_codigo;?>" class="form-control" placeholder="NCM">
		</div>

		<div class="form-group">
			<label>CEST</label>
			<input type="text" name="cest" value="<?php echo $cest;?>" class="form-control" placeholder="CEST">
		</div>
<hr>
		<div class="form-group has-warning">
			<label>Grupo</label>
			<input type="text" id="grupo" name="grupo" value="<?php echo $grupo;?>" onfocusout="consultaCep();" class="form-control" placeholder="CEP">
		</div>

		<div class="form-group has-warning">
			<label>Estoque</label>
			<input type="text" id="estoque" name="estoque" value="<?php echo $estoque;?>" class="form-control" placeholder="Estoque">
		</div>

		<div class="row col-lg-6">
			<div class="form-group has-warning col-xs-6">
				<label>Mínimo</label>
				<input type="text" id="minimo" name="minimo" value="<?php echo $minimo;?>" class="form-control" placeholder="Mínimo">
			</div>

			<div class="form-group has-warning col-xs-6">
				<label>Máximo</label>
				<input type="text" id="maximo" name="maximo" value="<?php echo $maximo;?>" class="form-control" placeholder="Máximo">
			</div>
		</div>

		<div class="row col-lg-6">
			<div class="form-group has-warning col-xs-6">
				<label>CFOP de Entrada</label>
				<input type="text" id="cfopEntrada_cfops_id" name="cfopEntrada_cfops_id" value="<?php echo $cfopEntrada_cfops_id;?>" class="form-control" placeholder="CFOP de Entrada">
			</div>

			<div class="form-group col-xs-6">
				<label>CFOP de Saída</label>
				<input type="text" id="cfopSaida_cfops_id" name="cfopSaida_cfops_id" value="<?php echo $cfopSaida_cfops_id;?>" class="form-control" placeholder="CFOP de Saída">
			</div>
		</div>
		
		<div class="form-group has-warning col-xs-12">
			<label>Observações</label>
			<input type="text" name="observacoes" value="<?php echo $observacoes;?>" class="form-control" placeholder="Observações">
		</div>
		
        <div class="form-group">
            <label>Aplicações</label>
            <div class="checkbox">
                <label>
                    <input name="site" type="checkbox" value="ATIVO" checked="checked">Site
                </label>
            </div>
        </div>

        <button type="button" class="btn btn-prnomeary" onclick="document.getElementById('cadastro').submit();">Cadastrar</button>

    </form>

<br>
</div>
<!-- /.row -->

<script src="js/produtos-e-servicos-adicionar.js"></script>