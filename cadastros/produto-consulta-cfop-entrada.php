<?php

    $cfop_consultado = $_GET["cfop"];
    
    require_once '../class/BancoMysql.php';
    
    $db = new BancoMysql();
    $db->setSelect("SELECT * FROM cfop WHERE cfop LIKE '%$cfop_consultado%'");
    
    $rows = $db->getSelect();
    
    $cfop        = $rows["cfop"];

?>
	<label>CFOP</label>
	<div class="input-group">
		<input type="text" id="cfop" name="cfop" value="<?php echo $cfop_consultado;?>" class="form-control" placeholder="CFOP" onfocusout="linkModal('cadastros/produto-consulta-cfop.php?cfop=','cfop');">
		<div class="input-group-btn">
			<button class="btn btn-default" type="button">
				<i class="glyphicon glyphicon-search"></i>
			</button>
		</div>
	</div>
	<div id="centro">
        <table class="table table-responsive table-stripped table-hover" >
          <tr>
            <td>CFOP</td>
            <td>Descrição</td>
          </tr>
<?php
    $db2 = new BancoMysql();
    $db2->setSelect("SELECT * FROM cfop WHERE cfop LIKE '$cfop_consultado%'");
        
    $rows2 = $db->getSelect();

    while($rows2 = $db2->getSelect()){

        $cfop       = $rows2["cfop"];
        $descricao  = $rows2["descricao"];
        
          echo "
          <tr ondblclick=\"setValue('cfop_entrada_cfop_cfop','$cfop'); setHtml('cfop_entrada_descricao','Descrição: $descricao'); closeModal();\">
            <td>$cfop</td>
            <td>$descricao</td>
          </tr>
          ";
    }
?>
              <tr>
            <td colspan="2" class="text-center"><?php if(!$cfop){ echo "CFOP ".$cfop_consultado." não encontrado";}; ?></td>
          </tr>
        </table>
	</div>
<?php       

    // 2.2: Se existir fecha o modal e atualiza automaticamente a descrição na página principal de adicionar o produto

?>