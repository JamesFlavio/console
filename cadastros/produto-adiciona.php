<div class="col-lg-12" >
<?php

// BUGS
// 01: 

@$cmd 					= $_GET ["cmd"];

@$tipo					= $_POST ["tipo"];
@$barra					= $_POST ["barra"];
@$fabrica				= $_POST ["fabrica"];
@$nome					= $_POST ["nome"];
@$unidade				= $_POST ["unidade"];
@$ncm_ncm				= $_POST ["ncm_ncm"];
@$cest					= $_POST ["cest"];
@$grupo					= $_POST ["grupo"];
@$estoque				= $_POST ["estoque"];
@$minimo				= $_POST ["minimo"];
@$maximo				= $_POST ["maximo"];
@$cfop_entrada_cfop_cfop= $_POST ["cfop_entrada_cfop_cfop"];
@$cfop_saida_cfop_cfop	= $_POST ["cfop_saida_cfop_cfop"];
@$preco_custo			= $_POST ["preco_custo"];
@$preco_venda			= $_POST ["preco_venda"];
@$preco_minimo			= $_POST ["preco_minimo"];
@$observacao			= $_POST ["observacao"];
@$site					= $_POST ["site"];
$ncm_descricao          ='';
$cfop_entrada_descricao ='';
$cfop_saida_descricao   ='';

switch ($cmd) {
case "adicionar":
	include("cadastros/produto-adiciona-cmd.php");
	break;
};	

    require_once 'class/BancoMysql.php';
    
    @$id = $_GET["id"];
    
    if($id){
        $db = new BancoMysql();
        $db->setSelect("SELECT  tipo,
                                barra,
                                fabrica,
                                nome,
                                unidade,
                                ncm_ncm,
                                ncm.descricao as ncm_descricao,
                                cest,
                                grupo,
                                estoque,
                                minimo,
                                maximo,
                                cfop_entrada_cfop_cfop,
                                cfop_saida_cfop_cfop,
                                cfop_entrada.descricao as cfop_entrada_descricao,
                                cfop_saida.descricao as cfop_saida_descricao,
                                preco_custo,
                                preco_venda,
                                preco_minimo,
                                observacao                                
                        FROM produto
                        JOIN ncm ON ncm.ncm = produto.ncm_ncm
                        JOIN cfop as cfop_entrada ON cfop_entrada.cfop = produto.cfop_entrada_cfop_cfop
                        JOIN cfop as cfop_saida   ON cfop_saida.cfop = produto.cfop_saida_cfop_cfop
                        WHERE id = '$id'
        ");
        $rows = $db->getSelect();
        
        $tipo					= $rows["tipo"];
        $barra					= $rows["barra"];
        $fabrica				= $rows["fabrica"];
        $nome					= $rows["nome"];
        $unidade				= $rows["unidade"];
        $ncm_ncm				= $rows["ncm_ncm"];
        $ncm_descricao          = $rows["ncm_descricao"];
        $cest					= $rows["cest"];
        $grupo					= $rows["grupo"];
        $estoque				= $rows["estoque"];
        $minimo				    = $rows["minimo"];
        $maximo				    = $rows["maximo"];
        $cfop_entrada_cfop_cfop = $rows["cfop_entrada_cfop_cfop"];
        $cfop_saida_cfop_cfop	= $rows["cfop_saida_cfop_cfop"];
        $cfop_entrada_descricao = $rows["cfop_entrada_descricao"];
        $cfop_saida_descricao   = $rows["cfop_saida_descricao"];
        $preco_custo			= $rows["preco_custo"];
        $preco_venda			= $rows["preco_venda"];
        $preco_minimo			= $rows["preco_minimo"];
        $observacao			    = $rows["observacao"];
        #$site					= $rows["site"];
        
    }
?>


<ul class="nav nav-tabs" style="padding-top: 15px;">
  <li class="active"><a href="#">Principal</a></li>
  <li><a href="#">Impostos</a></li>
  <li><a href="#">Adicionais</a></li>
</ul>


    <form id="cadastro" name="cadastro" role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>&cmd=adicionar" onsubmit="return validaCampo(); return false;" style="padding-top: 10px;">
	
		<div class="form-group ">
			<label>Tipo</label>
			<select id="tipo" name="tipo" class="form-control">
				<option value="0" <?php if($tipo==0){echo "selected";};?>>Produto</option>
				<option value="1" <?php if($tipo==1){echo "selected";};?>>Serviço</option>
			</select>
		</div>
	
		<div class="form-group ">
			<label>Cod. de Barras</label>
			<input type="text" name="barra" value="<?php echo $barra;?>" class="form-control" placeholder="Cód. de Barras">
		</div>
		
		<div class="form-group ">
			<label for="barra">Cod. de Fábrica</label>
			<input type="text" name="fabrica" value="<?php echo $fabrica;?>" class="form-control" placeholder="Codigo de Fábrica">
		</div>
		
		<div class="form-group ">
			<label for="nome">Nome</label>
			<input type="text" name="nome" value="<?php echo $nome;?>" class="form-control" placeholder="Nome">
		</div>
		
		<div class="form-group ">
			<label>Unidade</label>
			<input type="text" name="unidade" value="<?php echo $unidade;?>" class="form-control" placeholder="Unidade">
		</div>

		<label>NCM</label>
		<div class="input-group">
			<input type="text" id="ncm_ncm" name="ncm_ncm" value="<?php echo $ncm_ncm;?>" class="form-control" placeholder="NCM" onfocusout="linkModal('cadastros/produto-consulta-ncm.php?ncm=', 'ncm_ncm');">
			<div class="input-group-btn">
				<button class="btn btn-default" type="button">
					<i class="glyphicon glyphicon-search"></i>
				</button>
			</div>
		</div>
		<div id="ncm_descricao">Descrição: <?php echo $ncm_descricao;?></div>

		<div class="form-group">
			<label>CEST</label>
			<input type="text" name="cest" value="<?php echo $cest;?>" class="form-control" placeholder="CEST">
		</div>
<hr>
		<div class="form-group ">
			<label>Grupo</label>
			<input type="text" id="grupo" name="grupo" value="<?php echo $grupo;?>" onfocusout="consultaCep();" class="form-control" placeholder="Grupo">
		</div>

		<div class="form-group ">
			<label>Estoque</label>
			<input type="text" id="estoque" name="estoque" value="<?php echo $estoque;?>" class="form-control" placeholder="Estoque">
		</div>

		<div class="row col-lg-6">
			<div class="form-group col-xs-6">
				<label>Mínimo</label>
				<input type="text" id="minimo" name="minimo" value="<?php echo $minimo;?>" class="form-control" placeholder="Mínimo">
			</div>

			<div class="form-group col-xs-6">
				<label>Máximo</label>
				<input type="text" id="maximo" name="maximo" value="<?php echo $maximo;?>" class="form-control" placeholder="Máximo">
			</div>
		</div>

		<div class="row col-lg-6">
			<label>CFOP de Entrada</label>
			<div class="form-group col-xs-6  input-group">
				<input type="text" id="cfop_entrada_cfop_cfop" name="cfop_entrada_cfop_cfop" value="<?php echo $cfop_entrada_cfop_cfop;?>" class="form-control" placeholder="CFOP de Entrada" onfocusout="linkModal('cadastros/produto-consulta-cfop-entrada.php?cfop=', 'cfop_entrada_cfop_cfop');">
				<div class="input-group-btn">
    				<button class="btn btn-default" type="button">
    					<i class="glyphicon glyphicon-search"></i>
    				</button>
				</div>
			</div>
			<div id="cfop_entrada_descricao">Descrição: <?php echo $cfop_entrada_descricao ?></div>
			
			<label>CFOP de Saída</label>
			<div class="form-group col-xs-6 input-group">
				<input type="text" id="cfop_saida_cfop_cfop" name="cfop_saida_cfop_cfop" value="<?php echo $cfop_saida_cfop_cfop;?>" class="form-control" placeholder="CFOP de Saída" onfocusout="linkModal('cadastros/produto-consulta-cfop-saida.php?cfop=', 'cfop_saida_cfop_cfop');">
				<div class="input-group-btn">
    				<button class="btn btn-default" type="button">
    					<i class="glyphicon glyphicon-search"></i>
    				</button>
				</div>
			</div>
		</div>
		<div id="cfop_saida_descricao">Descrição: <?php echo $cfop_saida_descricao ?></div>
		
		<div class="form-group col-xs-12">
			<label>Preço de custo</label>
			<input type="text" name="preco_custo" value="<?php echo $preco_custo;?>" class="form-control" placeholder="Preço custo">
		</div>

		<div class="form-group col-xs-12">
			<label>Preço de venda</label>
			<input type="text" name="preco_venda" value="<?php echo $preco_venda;?>" class="form-control" placeholder="Preço venda">
		</div>

		<div class="form-group col-xs-12">
			<label>Preço míximo</label>
			<input type="text" name="preco_minimo" value="<?php echo $preco_minimo;?>" class="form-control" placeholder="Preço mínimo">
		</div>

		<div class="form-group col-xs-12">
			<label>Observações</label>
			<input type="text" name="observacao" value="<?php echo $observacao;?>" class="form-control" placeholder="Observações">
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
