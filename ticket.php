<?php
ini_set('memory_limit', '128M');
ob_start();
date_default_timezone_set('America/Mexico_City');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ticket Kambal</title>
        <style>
            html {
                margin: 15pt 15pt;
            }
            th{
                font-size: 11px;
            }

            p, label {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                font-size: 11px;
            }

            #tableHeader {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                font-size: 11px;
            }

            #customers {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                font-size: 11px;
            }

            #customers td, #customers th {
                padding: -1px;
                font-size: 11px;
            }

            #customers th {
                text-align: left;
                color: #000;
            }
            #suprim {
                padding: 0px;
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                font-size: 11px;
            }
        </style>

    </head>
    <?php include './core_ticket_query.php'; ?>
    <body> 
        <div id="original">
            <center><label>Comprobante de Pago</label></center>

            <table align="center" >
                <td><img src="asset/images/logo/<?php echo $frontpageimage; ?>" width="80%"></td>
            </table>
            <br>
            <table id="customers">
                <tr>
                    <td>Plantel:</td>
                    <td><?php echo $campus ?></td>
                </tr>
                <tr>
                    <td>Folio:</td>
                    <td><?php echo $folio ?></td>
                </tr>
                <tr>
                    <td>F y H de Pago: </td>
                    <td><?php echo $fechaYHoraDePago; ?></td>
                </tr>
                <tr>
                    <td>F y H de de impresión: </td>
                    <td><?php echo $fechaYHoraDeImpresion; ?></td>
                </tr>
                <tr>
                    <td>Alumno:</td>
                    <td><?php echo $nombre; ?></td>
                </tr>
                <tr>
                    <td>Matrícula:</td>
                    <td><?php echo $matricula; ?></td>
                </tr>
                <tr>
                    <td>Nivel:</td>
                    <td><?php echo $Nivel; ?></td>
                </tr>
                <tr>
                    <td>Oferta:</td>
                    <td><?php echo $carrera; ?></td>
                </tr>
                <tr>
                    <td>Turno:</td>
                    <td><?php echo $turno; ?></td>
                </tr>
                <tr>
                    <td>GDO:</td>
                    <td><?php echo $ciclo; ?></td>
                </tr>
                <tr>
                    <td>Metodo de pago:</td>
                    <td><?php echo $metodo_pago; ?></td>
                </tr>
            </table >
            <br>

            <table id="suprim" >
                <tr>
                    <th >Concepto </th>
                    <th> </th>
                    <th>Monto </th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr> ";
                        echo " <td>", strtoupper($row['comentario']), $row['periodo'], " ", "</td> ";
                        echo "<td align='right'> PRECIO <br> DESCUENTO <br> RECARGO<br> SUBTOTAL", "</td> ";
                        echo " <td>$", $row['precio'],
                        "<br>"
                        . "- $", $row['realdiscount'], "<br>", "+ $", $row['realsurcharge'], "<br>", " $", $row['total'], "</td> ";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<th colspan='3'> <hr> </th>";
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
                <tr>
                    <th>Total </th>
                    <th></th>
                    <th>$<?php echo $total; ?></th>
                </tr>
            </table>

            <table id="customers" >
                <td>Monto con letra: <?php echo $letras; ?></td>
            </table>
            <table id="customers" >
                <td>Atentido por <?php echo $idiusuario; ?> </td>
            </table>
            <table id="customers" >
                <td>NOTA IMPORTANTE: UNA VEZ REALIZADO EL PAGO DE ESTE RECIBO, NO HABRA DEVOLUCION BAJO NINGUNA CIRCUSTANCIA</td>
            </table>
            <table id="customers" >
                <td>Este no es un comprobante fiscal </td>
            </table>
            <table align="right" id="customers"   >
                <tr>
                    <td >Kambal 1.0</td>
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

$customPaper = array(0, 0, 209.7716535433, 1984.1968504);

//$dompdf->setPaper('A4', 'landscape');
$dompdf->setPaper($customPaper);
// Render the HTML as PDF 

$dompdf->render();

// Output the generated PDF to Browser 

$dompdf->stream('Comprovante.pdf', array("Attachment" => false));
