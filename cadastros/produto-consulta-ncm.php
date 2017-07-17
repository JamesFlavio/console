<?php

//BUGS/ALTERAÇÕES
// 01: Se o NCM for digitado parcialmente, deve continuar na mesma página e listar os encontrados com base no conteúdo

    // 1: Captura valor digitador através da url pelo método $_GET
    $ncm_consultado = $_GET["ncm"];
    
    
    // 2: Inclui a class do BancoMysl.php e faz a consulta do NCM capturado
    require_once '../class/BancoMysql.php';
    
    $db = new BancoMysql();
    $db->setSelect("SELECT * FROM ncm WHERE ncm LIKE '%$ncm_consultado%'");

    $rows = $db->getSelect();
    
    $ncm        = $rows["ncm"];

    
    // 2.1: Se não encontrado o NCM digitado/capturado, permanece na página para outra consulta
        
?>
		<label>NCM</label>
		<div class="input-group">
			<input type="text" id="ncm" name="ncm" value="<?php echo $ncm_consultado;?>" class="form-control" placeholder="NCM" onfocusout="linkModal('cadastros/produto-consulta-ncm.php?ncm=','ncm');">
			<div class="input-group-btn">
				<button class="btn btn-default" type="button">
					<i class="glyphicon glyphicon-search"></i>
				</button>
			</div>
		</div>
		<div id="centro">
            <table class="table table-responsive table-stripped table-hover" >
              <tr>
                <td>NCM</td>
                <td>Descrição</td>
              </tr>
<?php
        $db2 = new BancoMysql();
        $db2->setSelect("SELECT * FROM ncm WHERE ncm LIKE '$ncm_consultado%'");
        
        $rows2 = $db->getSelect();

        while($rows2 = $db2->getSelect()){

            $ncm        = $rows2["ncm"];
            $descricao  = $rows2["descricao"];
            
              echo "
              <tr ondblclick=\"setValue('ncm_ncm','$ncm'); setHtml('ncm_descricao','Descrição: $descricao'); closeModal();\">
                <td>$ncm</td>
                <td>$descricao</td>
              </tr>
              ";
        }
?>
                  <tr>
                <td colspan="2" class="text-center"><?php if(!$ncm){ echo "NCM ".$ncm_consultado." não encontrado";}; ?></td>
              </tr>
            </table>
		</div>
<?php       

    // 2.2: Se existir fecha o modal e atualiza automaticamente a descrição na página principal de adicionar o produto

?>