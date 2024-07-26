<?php
//include_once './BackEndSAP/session.php';
ini_set('memory_limit', '128M');
ob_start();
date_default_timezone_set('America/Mexico_City');
?>

<?php
$idialumno = $_GET["idialumno"];
$parte = $_GET["parte"];
include './dataConect/conexion.php';
$sql = "SELECT
        alumno.matricula,
        datos_generales.nombre,
        datos_generales.apellido_paterno,
        datos_generales.apellido_materno
        FROM
        alumno
        INNER JOIN datos_generales ON alumno.idigenerales = datos_generales.idigenerales
        WHERE alumno.idialumno = $idialumno";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $matricula = $row["matricula"];
        $nombre = ucfirst($row["nombre"]);
        $apellido_paterno = ucfirst($row["apellido_paterno"]);
        $apellido_materno = ucfirst($row["apellido_materno"]);
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Constancia</title>
        <style>
            @page { margin: 0in; }
            body {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                <?php
                if ($parte == 'p4') {
                    echo 'background-image: url(asset/images/constancy.png);';
                }
                if ($parte == 'p3') {
                    echo 'background-image: url(asset/images/p3.png);';
                }
                if ($parte == 'p2') {
                    echo 'background-image: url(asset/images/p2.png);';
                }
                ?>

                background-position: center;
                background-repeat: no-repeat;
                background-size: 100%;
                padding: 300px 100px 10px 100px;
                width:100%;
                height:100%;

            }
            .person {
                font-size: 30px;
                width: 400px;
                margin: auto;
                text-align: center; 
            }
            .signature {
                font-size: 20px;
                margin-top: 9em;
                margin-left: 7em;
                text-align: left;
                color: #d65356;
            }

            .dated {
                font-size: 13px;
                margin-top: 7.5em;
                margin-left: 6.5em;
                text-align: left;

            }
        </style>
    </head>
    <body>

        <p class="person"><?php echo $nombre; ?><br>
<?php echo $apellido_paterno . ' ' . $apellido_materno; ?></p>
        <p class="signature">       <?php echo $matricula; ?></p>
        <p class="dated">Lugar y Fecha: México, CDMX 18-06-2020</p>
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
//$customPaper = array(0,0,1056, 816);
$dompdf->setPaper('A4', 'landscape');
//$dompdf->setPaper($customPaper);
// Render the HTML as PDF 
$dompdf->render();
$pdf = $dompdf->output();

// Output the generated PDF to Browser 
$dompdf->stream($matricula, array("Attachment" => false));

$file_location = "./webinar04/" . $matricula . ".pdf";
file_put_contents($file_location, $pdf);
?>

