<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../../bootstrap.php';

//NOTA: o envio de email com o DANFE somente funciona para modelo 55
//      o modelo 65 nunca requer o envio do DANFCE por email

use NFePHP\NFe\ToolsNFe;

$nfe = new ToolsNFe('../../config/config.json');
$nfe->setModelo('55');

$chave = '53170512130675000134550010000000021000000021';
$pathXml = "C:/xampp/htdocs/desenvolvimento/console/usuarios/12130675000134/nfe/homologacao/enviadas/aprovadas/201705/{$chave}-protNFe.xml";
$pathPdf = "C:/xampp/htdocs/desenvolvimento/console/usuarios/12130675000134/nfe/homologacao/pdf/201705/{$chave}-danfe.pdf";

$aMails = array('JamesFlavioNDC@Gmail.com'); //se for um array vazio a classe Mail irá pegar os emails do xml
$templateFile = ''; //se vazio usará o template padrão da mensagem
$comPdf = true; //se true, anexa a DANFE no e-mail
try {
    $nfe->enviaMail($pathXml, $aMails, $templateFile, $comPdf, $pathPdf);
    echo "DANFE enviada com sucesso!!!";
} catch (NFePHP\Common\Exception\RuntimeException $e) {
    echo $e->getMessage();
}