<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../../bootstrap.php';

use NFePHP\NFe\ToolsNFe;

$nfe = new ToolsNFe('../../config/config.json');
$aResposta = array();

$indSinc = '1'; //0=asíncrono, 1=síncrono
$chave = '53170512130675000134550010000000021000000021';
$recibo = '149607143406275';
$pathNFefile = "C:/xampp/htdocs/desenvolvimento/console/usuarios/12130675000134/nfe/homologacao/assinadas/{$chave}-nfe.xml";
if (! $indSinc) {
    $pathProtfile = "C:/xampp/htdocs/desenvolvimento/console/usuarios/12130675000134/nfe/homologacao/temporarias/201705/{$recibo}-retConsReciNFe.xml";
} else {
    $pathProtfile = "C:/xampp/htdocs/desenvolvimento/console/usuarios/12130675000134/nfe/homologacao/temporarias/201705/{$recibo}-retEnviNFe.xml";
}
$saveFile = true;
$retorno = $nfe->addProtocolo($pathNFefile, $pathProtfile, $saveFile);
echo '<br><br><pre>';
echo htmlspecialchars($retorno);
echo "</pre><br>";
