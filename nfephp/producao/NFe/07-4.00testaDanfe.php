<?php
/**
 * ATENÇÃO : Esse exemplo usa classe PROVISÓRIA que será removida assim que 
 * a nova classe DANFE estiver refatorada e a pasta EXTRAS será removida.
 */

error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once '../../bootstrap.php';

use NFePHP\NFe\ToolsNFe;
use NFePHP\Extras\Danfe;
use NFePHP\Common\Files\FilesFolders;

$nfe = new ToolsNFe('../../config/config.json');

$chave = '53170512130675000134550010000000021000000021';
$xmlProt = "C:/xampp/htdocs/desenvolvimento/console/usuarios/12130675000134/nfe/homologacao/enviadas/aprovadas/201705/{$chave}-protNFe.xml";
// Uso da nomeclatura '-danfe.pdf' para facilitar a diferenciação entre PDFs DANFE e DANFCE salvos na mesma pasta...
$pdfDanfe = "C:/xampp/htdocs/desenvolvimento/console/usuarios/12130675000134/nfe/homologacao/pdf/201705/{$chave}-danfe.pdf";

$docxml = FilesFolders::readFile($xmlProt);
$danfe = new Danfe($docxml, 'P', 'A4', $nfe->aConfig['aDocFormat']->pathLogoFile, 'I', '');
$id = $danfe->montaDANFE();
$salva = $danfe->printDANFE($pdfDanfe, 'F'); //Salva o PDF na pasta
$abre = $danfe->printDANFE("{$id}-danfe.pdf", 'I'); //Abre o PDF no Navegador
