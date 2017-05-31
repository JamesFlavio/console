<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../../bootstrap.php';

use NFePHP\NFe\ToolsNFe;

$nfe = new ToolsNFe('../../config/config.json');
$nfe->setModelo('55');

$chave = '53170512130675000134550010000000021000000021';
$tpAmb = '2';
$aResposta = array();
$xml = $nfe->sefazConsultaChave($chave, $tpAmb, $aResposta);
echo '<br><br><pre>';
echo htmlspecialchars($nfe->soapDebug);
echo '</pre><br><pre>';
print_r($aResposta);
echo "<pre><br>";
