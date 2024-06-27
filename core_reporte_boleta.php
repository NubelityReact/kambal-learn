<?php
include_once './BackEndSAP/session.php';
ob_start();
date_default_timezone_set('America/Mexico_City');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Acta de calificaciones</title>
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
                padding: 6px;
                font-size: 9px;
            }
            #customers tr:nth-child(even){background-color: #f2f2f2;}
            #customers tr:hover {background-color: #ddd;}
            #customers th {
                font-size: 9px !important;
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
        <div id="original">
            <center style=' font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;'>ACTA DE CALIFICACIONES</center>
            <table border="0" id="tableHeader">
                <tr>
                    <?php echo ' <td><img src="asset/images/logo/' . $frontpageimage . '" width="90px"></td>'; ?>
                    <td><br>
                        CARRERA: <br>
                        MATERIA: <br>
                        CLAVE: <br>
                        MAESTRO: <br>
                    </td>
                    <td><br>
                        PARCIAL: <br>
                        CICLO: <br>
                        TURNO: <br>
                        CUATRIMESTRE: <br>
                        GRUPO: <br>
                    </td>
                </tr>
            </table><br>

            <table id="customers">
                <thead style=" background-color: #f0f0f5 !important;">
                    <tr>
                        <td>#</td>
                        <td>MATRÍCULA</td>
                        <td>APELLIDOS</td>
                        <td>NOMBRE</td>
                        <td>PERIODO</td>
                        <td>CALIFICACIÓN</td>
                        <td>LETRA</td>
                        <td>FIRMA DE ENTERADO</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $errorMSG = "";
                    $andPeriodo = "";
                    $andMateria = "";
                    if (empty($_GET["GrupoId"])) {
                        $errorMSG = "GrupoId is required ";
                    } else {
                        $GrupoId = $_GET["GrupoId"];
                    }
                    if (empty($_GET["MateriaId"])) {
                        $errorMSG .= "MateriaId ";
                    } else {
                        $MateriaId = $_GET["MateriaId"];
                        $andMateria .= " and tbCalificaciones.MateriaId = $MateriaId";
                    }
                    if (empty($_GET["PeriodoId"])) {
                        $errorMSG .= "PeriodoId ";
                    } else {
                        $PeriodoId = $_GET["PeriodoId"];
                        $andPeriodo .= " and tbCalificaciones.PeriodoId = $PeriodoId";
                    }
                    // redirect to success page
                    if ($errorMSG == "") {
                        include './dataConect/conexion.php';
                        include './NumerosALetras.php';
                        $sql = "SELECT
                                tbCalificaciones.CalificacionId,
                                tbCalificaciones.NivelId,
                                tbCalificaciones.CarreraId,
                                tbCalificaciones.GrupoId,
                                tbCalificaciones.MateriaId,
                                tbCalificaciones.CicloId,
                                tbCalificaciones.PeriodoId,
                                tbCalificaciones.AlumnoId,
                                tbCalificaciones.Promedio,
                                alumno.matricula,
                                datos_generales.nombre,
                                datos_generales.apellido_paterno,
                                datos_generales.apellido_materno,
                                tbPeriodo.Descripcion AS periodo
                                FROM
                                tbCalificaciones
                                INNER JOIN alumno ON tbCalificaciones.AlumnoId = alumno.idialumno
                                INNER JOIN datos_generales ON alumno.idigenerales = datos_generales.idigenerales
                                INNER JOIN tbPeriodo ON tbCalificaciones.PeriodoId = tbPeriodo.PeriodoId
                                WHERE
                                tbCalificaciones.GrupoId = $GrupoId $andPeriodo $andMateria";
                        $result = $conn->query($sql);
                        $rows = array();
                        if ($result->num_rows > 0) {
                            // output data of each row
                            $a = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo "<td>" . ($a ++) . "</td>";
                                echo "<td>" . $row["matricula"] . "</td>";
                                echo "<td>" . $row["apellido_paterno"] . " " . $row["apellido_materno"] . "</td>";
                                echo "<td>" . $row["nombre"] . "</td>";
                                echo "<td>" . $row["periodo"] . "</td>";
                                echo "<td>" . $row["Promedio"] . "</td>";
                                echo "<td>" . NumeroALetras::convertir($row["Promedio"]) . "</td>";
                                echo "<td> </td>";
                                echo '</tr>';
                            }
                        } else {
                            $rows['error'][] = "0 results";
                            print json_encode($rows, JSON_PRETTY_PRINT);
                        }
                        $conn->close();
                    } else {
                        if ($errorMSG == "") {
                            $rows['error'][] = "Something went wrong :(";
                            print json_encode($rows, JSON_PRETTY_PRINT);
                        } else {
                            $rows['error'][] = $errorMSG;
                            print json_encode($rows, JSON_PRETTY_PRINT);
                        }
                    }
                    ?>
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
//$customPaper = array(0,0,74, 172);
//$dompdf->setPaper('A4', 'landscape');
//$dompdf->setPaper($customPaper);
// Render the HTML as PDF 
$dompdf->render();

// Output the generated PDF to Browser 
$dompdf->stream('Acta de calificaciones.pdf', array("Attachment" => false));
?>

