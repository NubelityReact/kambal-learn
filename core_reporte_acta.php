<?php
include_once './BackEndSAP/session.php';
include './NumerosALetras.php';
ob_start();
date_default_timezone_set('America/Mexico_City');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Acta de calificaciones</title>
        <style>
            @page {
                margin: 10px 10px 10px 10px !important;
                padding: 10px 10px 10px 10px !important;
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
        <div id="original">
            <center style=' font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;'>BOLETA DE CALIFICACIONES</center>
            <table border="0" id="tableHeader">
                <tr>
                    <td><img src="asset/images/ucp.png" width="120px"></td>
                    <?php
                    $idialumno = $_GET["idialumno"];
                    include './dataConect/conexion.php';
                    $sql = "SELECT
                            alumno.matricula,
                            datos_generales.apellido_paterno,
                            datos_generales.apellido_materno,
                            datos_generales.nombre,
                            carrera.categoria,
                            carrera.nombre as carrera,
                            alumno.turno,
                            alumno.cuatrimestre 
                            FROM
                            alumno
                            INNER JOIN datos_generales ON alumno.idigenerales = datos_generales.idigenerales
                            INNER JOIN carrera ON alumno.idicarrera = carrera.idicarrera 
                            WHERE
                            alumno.idialumno = $idialumno";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $matricula = $row["matricula"];
                            $apellido_paterno = $row["apellido_paterno"];
                            $apellido_materno = $row["apellido_materno"];
                            $nombre = $row["nombre"];
                            $categoria = $row["categoria"];
                            $carrera = $row["carrera"];
                            $turno = $row["turno"];
                            $cuatrimestre = $row["cuatrimestre"];
                            echo "<td><br>
                                MATRÍCULA: $matricula<br>
                                ALUMNO: $apellido_paterno $apellido_materno $nombre<br>
                                CURSO LAS MATERIAS QUE SE SEÑALAN: <br>
                                MODALIDAD: Escolarizado<br>
                                </td>
                                <td><br>
                                CARRERA: $categoria en $carrera<br>
                                TURNO: $turno<br>
                                CUATRIMESTRE: $cuatrimestre<br>
                                </td>";
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </tr>
            </table><br>

            <table id="customers">
                <thead style=" background-color: #f0f0f5 !important;">
                    <tr>
                        <td>#</td>
                        <td>GRADO</td>
                        <td>CLAVE</td>
                        <td>NOMBRE DE LA ASIGNATURA</td>
                        <td>CICLO EN QUE CURSO</td>
                        <td>CALIFICACIÓN</td>
                        <td>LETRA</td>
                        <td>OBSERVACIONES</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $idialumno = $_GET["idialumno"];
                    $andCiclo = "";
                    if (empty($_GET["idiciclo"]) ||$_GET["idiciclo"] === 'undefined') {
                        $andCiclo .= "";
                    } else {
                        $idiciclo = $_GET["idiciclo"];
                        $andCiclo .= " AND cl.idiciclo = $idiciclo";
                    }
                    include './dataConect/conexion.php';
                    $sql = "SELECT
                            c.CalificacionId,
                            cl.ciclo,
                            cGrados.Descripcion AS grado,
                            m.Clave,
                            m.Nombre,
                            p.Descripcion,
                            c.Promedio,
                            cTipoEvaluacionPeriodo.Descripcion  as final
                            FROM
                            tbCalificaciones AS c,
                            tbMaterias AS m
                            INNER JOIN cGrados ON m.GradoId = cGrados.GradosId,
                            tbPeriodo AS p
                            INNER JOIN cTipoEvaluacionPeriodo ON p.TipoEvaluacionId = cTipoEvaluacionPeriodo.TipoEvaluacionPeriodoId,
                            alumno AS a,
                            cliclo AS cl 
                            WHERE
                            c.MateriaId = m.MateriaId 
                            AND c.PeriodoId = p.PeriodoId 
                            AND c.AlumnoId = a.idialumno 
                            AND c.CicloId = cl.idiciclo 
                            AND p.TipoEvaluacionId = 1
                            AND c.AlumnoId = $idialumno $andCiclo
                            ORDER BY m.Clave ASC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $a = 1;
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $Clave = $row["Clave"];
                            $Nombre = $row["Nombre"];
                            $ciclo = $row["ciclo"];
                            $grado = $row["grado"];
                            $Promedio = $row["Promedio"];
                            $Descripcion = $row["Descripcion"];
                            echo "<tr>
                                <td>" . ($a ++) . "</td>
                                <td><center>$grado</center></td>
                                <td><center>$Clave</center></td>
                                <td>$Nombre</td>
                                <td><center>$ciclo</center></td>";
                            if ($Promedio == "") {
                                $letra = "-";
                                echo "<td><center>-</center></td>";
                            } else {
                                $letra = NumeroALetras::convertir($Promedio);
                                echo "<td><center>$Promedio</center></td>";
                            }
                            echo "<td><center>$letra</center></td>
                            <td>$Descripcion</td>
                            </tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table><br>
            <table border="0" id="tableHeader">
                <tr>
                    <td><center>DOCUMENTO SÓLO DE CARÁCTER INFORMATIVO<br> SIN VALOR OFICIAL</center>
                </td>
                <td>
                <center>____________________________________
                    <div class="a">Alumno: </div>
                </center>
                </td>
                </tr>
            </table>
        </div>
        <br><br><hr><br>
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

