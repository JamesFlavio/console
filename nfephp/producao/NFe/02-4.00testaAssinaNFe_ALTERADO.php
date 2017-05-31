<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../../bootstrap.php';

use NFePHP\NFe\ToolsNFe;

$nfe = new ToolsNFe('../../config/config.json');

$chave = '53170512130675000134550010000000021000000021';
// $filename = "/var/www/nfe/homologacao/entradas/{$chave}-nfe.xml"; // Ambiente Linux
$filename = "C:/xampp/htdocs/desenvolvimento/console/usuarios/12130675000134/nfe/homologacao/entradas/{$chave}-nfe.xml"; // Ambiente Windows
$xml = file_get_contents($filename);
$xml = $nfe->assina($xml);
// $filename = "/var/www/nfe/homologacao/assinadas/{$chave}-nfe.xml"; // Ambiente Linux
$filename = "C:/xampp/htdocs/desenvolvimento/console/usuarios/12130675000134/nfe/homologacao/assinadas/{$chave}-nfe.xml"; // Ambiente Windows
file_put_contents($filename, $xml);
chmod($filename, 0777);
echo $chave;
