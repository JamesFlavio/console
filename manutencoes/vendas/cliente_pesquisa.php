<table class="table table-stripped">
  <tr>
    <th>ID</th>
    <th>Razão Social</th>
  </tr>
  <?php 
    @$pesquisa = $_GET['valor'];

    //echo $pesquisa;
    
	include("../../class/BancoMysql.php");

	$bd	= new BancoMysql();
	$bd->setSelect("SELECT id,razao_social_ou_nome FROM cadastro WHERE tipo LIKE '%0%' AND razao_social_ou_nome LIKE '%$pesquisa%';");
	
	while($rows	= $bd->getSelect()){
		
		$id						= $rows['id'];
		$razao_social_ou_nome	= $rows['razao_social_ou_nome'];
	
        echo "
          <tr ondblclick=\"setValue('hiddenId_cliente','$id'); setValue('id_cliente','$id'); setValue('razao_social_nome','$razao_social_ou_nome');\">
            <td>$id</td>
            <td>$razao_social_ou_nome</td>
          </tr>
        ";

	}

?>
</table>