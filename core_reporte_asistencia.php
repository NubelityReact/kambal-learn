<?php
include_once './BackEndSAP/session.php';
ini_set('memory_limit','128M');
ob_start();
date_default_timezone_set('America/Mexico_City');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lista de asistencia</title>
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

                <?php
                echo ' <td><img src="asset/images/logo/' . $frontpageimage . '" width="90px"></td>';
                $GrupoId = $_GET["GrupoId"];
                include './dataConect/conexion.php';
                $sql = "SELECT
                        gr.Descripcion AS grado,
                        n.Descripcion AS nivel,
                        c.nombre AS carrera,
                        ci.ciclo AS ciclo,
                        tg.clave AS grupo,
                        t.Descripcion AS turno 
                        FROM
                        carrera AS c,
                        cliclo AS ci,
                        cGrados AS gr,
                        cTurno AS t,
                        tbGrupos AS tg,
                        cNiveles AS n 
                        WHERE
                        tg.NivelId = n.NivelId 
                        AND tg.CarreraId = c.idicarrera 
                        AND tg.CicloId = ci.idiciclo 
                        AND tg.GradoId = gr.GradosId 
                        AND tg.TurnoId = t.TurnoId 
                        AND tg.GrupoId = $GrupoId";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<td>";
                        echo "<td>";
                        echo 'CARRERA: ' . $row["nivel"] . ' en ' . $row["carrera"] . '<br>';
                        echo 'CICLO: ' . $row["ciclo"] . '<br>';
                        echo 'CUATRIMESTRE: ' . $row["grado"] . '<br>';
                        echo 'GRUPO: ' . $row["grupo"] . '';
                        echo "</td>";
                        echo "</td>";
                        //columna
                        echo "<td>";
                        echo 'TURNO: ' . $row["turno"] . '<br>';
                        echo "</td>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
                <!--td>
                   MATERIA: <span id="idimateria"></span><br>
                   CLAVE: <span id="idiclave"></span><br>
                   PROFESOR: <span id="idiprofesor"></span><br>
               </td-->
                <td style="text-align: right"><strong>Lista de asistencia</strong><br></td>
            </tr>
        </table>

        <table id="customers">
            <thead style=" background-color: #f0f0f5 !important;">
                <tr>
                    <td>#</td>
                    <td>MATRÍCULA</td>
                    <td>APELLIDOS</td>
                    <td>NOMBRE</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>1° Par</td>
                    <td>2° Par</td>
                    <td>Prom. Acum</td>
                    <td>Final</td>
                    <td>Extra</td>
                    <td>Cal. Final</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $GrupoId = $_GET["GrupoId"];
                include './dataConect/conexion.php';
                $sql = "SELECT
                    a.matricula AS Matricula,
                    d.apellido_paterno AS Apellido_Paterno,
                    d.apellido_materno AS Apellido_Materno,
                    d.nombre AS Nombre
                    FROM
                    datos_generales AS d,
                    alumno AS a,
                    tbAlumnoGrupo AS g 
                    WHERE
                    g.idialumno = a.idialumno 
                    AND a.idigenerales = d.idigenerales
                    AND g.GrupoId = $GrupoId
                    ORDER BY d.apellido_paterno ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    $a = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo "<td>" . ($a ++) . "</td>";
                        echo "<td>" . $row["Matricula"] . "</td>";
                        echo "<td>" . $row["Apellido_Paterno"] . " " . $row["Apellido_Materno"] . "</td>";
                        echo "<td>" . $row["Nombre"] . "</td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo "<td> </td>";
                        echo '</tr>';
//                        $fila = intval($a ++);
//                        if ($fila === 25){
//                            echo '<div style="page-break-after:always;"></div>';
//                        }
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <?php signLine(); ?>


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
$dompdf->setPaper('A4', 'landscape');
//$dompdf->setPaper($customPaper);
// Render the HTML as PDF 
$dompdf->render();
// Output the generated PDF to Browser 
$dompdf->stream('Lista de Asistencia.pdf', array("Attachment" => false));

function signLine() {
    echo ' 
            <!--div style="page-break-after:always;"></div-->        
            <br>
            <table id="customers">
            <thead style=" background-color: #f0f0f5 !important;">
                <tr>
                    <td>Entrega 1° Parcial</td>
                    <td>Entrega 2° Parcial</td>
                    <td>Final</td>
                    <td>Extraordinario</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>´ </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td><center>                      Nombre y firma del maestro      </center> </td>
                </tr>
            </tbody>
        </table>
            ';
}
?>




