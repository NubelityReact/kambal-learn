<?php
include_once './BackEndSAP/session.php';
ob_start();
date_default_timezone_set('America/Mexico_City');
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
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
                padding: 3px;
                font-size: 9px;
            }
            #customers tr:nth-child(even){background-color: #f2f2f2;}
            #customers tr:hover {background-color: #ddd;}
            #customers th {
                font-size: 9px !important;
                padding-top: 6px;
                padding-bottom: 6px;
                text-align: left;
                background-color: #f0f0f5;
                color: #000;
            }
        </style>
    </head>
    <body>
        <table border="0" id="tableHeader">
            <tr>
                <th><img src="asset/images/ucp.png" width="120px"></th>
                <td style="text-align: right">Reporte de Pagos del Plantel Campus Gustavo Baz<br>
                    Caja: <?php echo $_GET["cajero"]; ?><br>
                    Fecha Inicial: <?php echo $_GET["inicio"]; ?><br>
                    Fecha final: <?php echo $_GET["fin"]; ?><br>
                    Fecha impresión: <?php echo date("Y/m/d h:i:sa"); ?>
                </td>
            </tr>
        </table>

        <table id="customers">
            <thead>
                <tr><td>#</td> <td>Folio</td> <td>Total</td> <td>Metodo de Pago</td><td>Fecha de cobro</td><td>Cajero</td></tr>
            </thead>
            <tbody>
                <?php

                function formatDollars($dollars) {
                    return "$" . number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $dollars)), 2);
                }

                $errorMSG = "";
                //cajero
                if (empty($_GET["cajero"])) {
                    $cajero = "";
                    $param = "";
                } else {
                    $idicajero = $_GET["cajero"];
                    $cajero = " AND idiusuario =  '$idicajero'";
                    $param = " WHERE idiusuario =  '$idicajero'";
                }
                //inicio
                if (empty($_GET["inicio"])) {
                    $errorMSG .= "inicio is required ";
                } else {
                    $inicio = $_GET["inicio"];
                }
                //fin
                if (empty($_GET["fin"])) {
                    $errorMSG .= "fin is required ";
                } else {
                    $fin = $_GET["fin"];
                }

                if ($errorMSG == "") {
                    include './dataConect/conexion.php';
                    $sql = "SELECT
                    p.idipago,
                    p.idiventa,
                    p.matricula,
                    p.folio,
                    p.estatus,
                    p.total,
                    p.metodo_pago,
                    p.fecha,
                    p.idiusuario,
                    ( SELECT SUM( total ) FROM pagos $param ) AS tot,
                    ( SELECT SUM( total ) FROM pagos WHERE metodo_pago = 'Efectivo' $cajero ) AS efectivo,
                    ( SELECT SUM( total ) FROM pagos WHERE metodo_pago = 'Tarjeta de Débito' $cajero ) AS tarjeta,
                    ( SELECT SUM( total ) FROM pagos WHERE metodo_pago = 'Depósito Bancario' $cajero ) AS deposito 
                    FROM
                    pagos AS p 
                    WHERE
                    p.fecha BETWEEN '$inicio 00:00:00' 
                    AND '$fin 23:59:59' $cajero";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        $a = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo "<td>" . ($a ++) . "</td>";
                            echo "<td> " . $row["folio"] . "</td>";
                            echo "<td> " . formatDollars($row["total"]) . "</td>";
                            echo "<td> " . $row["metodo_pago"] . "</td>";
                            echo "<td>" . $row["fecha"] . "</td>";
                            echo "<td> " . $row["idiusuario"] . "</td>";
                            echo '</tr>';
                            $total = formatDollars($row["tot"]);
                            $efectivo = formatDollars($row["efectivo"]);
                            $tarjeta = formatDollars($row["tarjeta"]);
                            $deposito = formatDollars($row["deposito"]);
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                } else {
                    if ($errorMSG == "") {
                        echo "Something went wrong :(";
                    } else {
                        echo $errorMSG;
                    }
                }
                ?>
            </tbody>
        </table>
        <br>
        <table border="0" id="tableHeader">
            <tr>
                <th></th>
                <td style="text-align: right">
                    Total Cobrado: <?php echo $total; ?><br>
                    Total en Efectivo: <?php echo $efectivo; ?><br>
                    Total en Transferencia: <?php echo $deposito; ?><br>
                    Total en Tarjeta de Débito: <?php echo $tarjeta; ?><br>
                </td
            </tr>
        </table>
    </body>
</html>


<?php include './footer.php'; ?>


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
//$customPaper = array(0,0,74, 172);
$dompdf->setPaper('A4', 'landscape');
//$dompdf->setPaper($customPaper);
// Render the HTML as PDF 
$dompdf->render();

// Output the generated PDF to Browser 
$dompdf->stream('FicheroEjemplo.pdf', array("Attachment" => false));

