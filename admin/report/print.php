<?php 
include('../lib/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start();

require('template/payment.php'); 

$html =ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream("payment.pdf",['Attachment'=>false]);
 
// if (isset($_GET['service'])) {
//   $service = ucfirst($_GET['service']);
//   if (isset($_GET['attach'])) {
//     $dompdf->stream("$service-Form.pdf",['Attachment'=>true]);
//   }else{
//     $dompdf->stream("$service-Form.pdf",['Attachment'=>false]);
//   }
  
// }
 


