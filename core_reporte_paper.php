<?php
include_once './BackEndSAP/session.php';
ob_start();
date_default_timezone_set('America/Mexico_City');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Credencia</title>
        <style>
            @page {
                margin: 0px 0px 0px 0px !important;
                padding: 0px 0px 0px 0px !important;
            }
            div.page_break + div.page_break{
                page-break-before: always;
            }
            #frente{
               
                background-size: cover;
            }
            #atras{
                background-image: url("asset/images/anverso.jpg") !important;
                background-size: cover;
            }
            #tableHeader {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border: 0;
                width: 100%;
                font-size: 9px;
            }
            #customers {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                font-size: 9px;
            }
            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 6px;
                font-size: 11px;
            }
            #customers tr:nth-child(even){background-color: #f2f2f2;}
            #customers tr:hover {background-color: #ddd;}
            #customers th {
                font-size: 11px !important;
                padding-top: 9px;
                padding-bottom: 6px;
                text-align: left;
                background-color: #f0f0f5;
                color: #000;
            }

            div.a {
                -webkit-text-decoration-line: overline; /* Safari */
                text-decoration-line: overline; 
            }
        </style>
    </head>
    <body>
        <div id="frente">
            <img src="asset/images/licenciatura.jpg"/>
        </div>
 
        <div id="atras">
            <img src="asset/images/anverso.jpg"/>
        </div>
    </body>
</html>

<?php
$html = ob_get_clean();

// Include autoloader 
require_once './dompdf/autoload.inc.php';

// Reference the Dompdf namespace 
use Dompdf\Dompdf;

// Instantiate and use the dompdf class 
$dompdf = new Dompdf();
// Load HTML content 
$dompdf->loadHtml($html);
$customPaper = array(0, 0, 232, 372);
$dompdf->set_paper($customPaper);
// (Optional) Setup the paper size and orientation 74, 172
//$customPaper = array(0,0,74, 172);
//$dompdf->setPaper('A4', 'landscape');
//$dompdf->setPaper($customPaper);
// Render the HTML as PDF 
$dompdf->render();

// Output the generated PDF to Browser 
$dompdf->stream('Credencia.pdf', array("Attachment" => false));
?>

