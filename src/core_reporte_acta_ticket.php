<?php
include_once './BackEndSAP/session.php';
ob_start();
date_default_timezone_set('America/Mexico_City');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ticket</title>
        <style>
            @page {
                margin: 0px 0px 0px 0px !important;
                padding: 0px 0px 0px 0px !important;
            }
            #tableHeader {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border: 0;
                width: 100%;
                font-size: 6px !important;
            }
            #customers {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                font-size: 6px !important;
            }
            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 6px;
                font-size: 6px !important;
            }
            #customers tr:nth-child(even){background-color: #f2f2f2;}
            #customers tr:hover {background-color: #ddd;}
            #customers th {
                font-size: 6px !important;
                padding-top: 6px;
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
        <div id="original">
            <center>
                <p style="font-size: 4px; padding-bottom: 0px;">COMPROBANTE DEL ALUMNO</p>
                <img src="asset/images/ucp.png" width="30%" style="padding-top: 0px;">
            </center>

            <table id="customers">
                <thead style=" background-color: #f0f0f5 !important;">
                    <tr>
                        <td>#</td>
                        <td>MATRÍCULA</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>CLAVE</td>
                    </tr>
                </tbody>
            </table><br>
            <table border="0" id="tableHeader">
                <tr>
                    <td>___________________________________
                        <div class="a">MAESTRO: </div>
                    </td>
                </tr>
            </table>
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

// (Optional) Setup the paper size and orientation 74, 172
$customPaper = array(0, 0, 74, 172);
//$dompdf->setPaper('A4', 'landscape');
$dompdf->setPaper($customPaper);
// Render the HTML as PDF 
$dompdf->render();

// Output the generated PDF to Browser 
$dompdf->stream('ticket.pdf', array("Attachment" => false));
?>

