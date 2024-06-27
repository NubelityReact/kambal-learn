<?php
include_once './BackEndSAP/session.php';
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



        <?php
        $var = "";
        $var .= '<table border="0" id="tableHeader">';
        $var .= '<tr><td><img src="asset/images/logo/' . $frontpageimage . '" width="90px"></td>';
        $GrupoId = $_GET["GrupoId"];
        include './dataConect/conexion.php';
        $sql = "SELECT
                tbGrupos.GrupoId,
                tbGrupos.idicarrera,
                tbGrupos.GradosId,
                tbGrupos.idiciclo,
                tbGrupos.TurnoId,
                tbGrupos.deleted,
                tbGrupos.suspended,
                tbGrupos.Clave,
                tbGrupos.Descripcion as grupo,
                tbGrupos.created,
                carrera.nombre as carrera,
                cGrados.Descripcion as grado,
                cliclo.ciclo,
                cTurno.Descripcion as turno
                FROM
                tbGrupos
                INNER JOIN carrera ON tbGrupos.idicarrera = carrera.idicarrera
                INNER JOIN cGrados ON tbGrupos.GradosId = cGrados.GradosId
                INNER JOIN cliclo ON tbGrupos.idiciclo = cliclo.idiciclo
                INNER JOIN cTurno ON tbGrupos.TurnoId = cTurno.TurnoId
                WHERE tbGrupos.GrupoId = $GrupoId";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $var .= "<td>";
                $var .= "<td>";
                $var .= 'OFERTA ACADÉMICA: ' . $row["carrera"] . '<br>';
                $var .= 'CICLO: ' . $row["ciclo"] . '<br>';
                $var .= 'GRADO: ' . $row["grado"] . '<br>';
                $var .= 'GRUPO: ' . $row["grupo"] . '';
                $var .= "</td>";
                $var .= "</td>";
                //columna
                $var .= "<td>";
                $var .= 'TURNO: ' . $row["turno"] . '<br>';
                $var .= "</td>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        $var .= '<td style="text-align: right"><strong>Horario Escolar</strong><br></td>';
        $var .= '</tr></table>';
        echo $var;
        ?>





        <?php
        $GrupoId = $_GET["GrupoId"];
        $txt = "";
        $txt .= '        <table id="customers">
            <thead style=" background-color: #f0f0f5 !important;">
                <tr>
                    <td>Horario</td>
                    <td>Lunes</td>
                    <td>Martes</td>
                    <td>Miercoles</td>
                    <td>Jueves</td>
                    <td>Viernes</td>
                    <td>Sabado</td>
                    <td>Domingo</td>
                </tr>
            </thead>
            <tbody>';
        include './dataConect/conexion.php';
        $sql = "SELECT hg.HorarioGrupoId, hg.GrupoId, hh.HoraHorarioId, hh.HoraInicial, hh.HoraFinal, hg.Lun, hg.AulaLunId, hg.profLunId, hg.asgLunId, hg.Mar, hg.AulaMarId, hg.profMarId, hg.asgMarId, hg.Mie, hg.AulaMieId, hg.profMieId, hg.asgMieId, hg.Jue, hg.AulaJueId, hg.profJueId, hg.asgJueId, hg.Vie, hg.AulaVieId, hg.profVieId, hg.asgVieId, hg.Sab, hg.AulaSabId, hg.profSabId, hg.asgSabId, hg.Dom, hg.AulaDomId, hg.profDomId, hg.asgDomId FROM tbHorarioGrupo AS hg, cHorasHorario AS hh WHERE hg.HorarioId = hh.HoraHorarioId AND hg.GrupoId = $GrupoId ORDER BY hh.HoraInicial ASC";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                //$row["Nombre"] 
                $HorarioGrupoId = $row["HorarioGrupoId"];
                $GrupoId = $row["GrupoId"];
                $HoraHorarioId = $row["HoraHorarioId"];
                $HoraInicial = $row["HoraInicial"];
                $HoraFinal = $row["HoraFinal"];

                $Lun = $row["Lun"];
                $AulaLunId = $row["AulaLunId"];
                $profLunId = $row["profLunId"];
                $asgLunId = $row["asgLunId"];

                $Mar = $row["Mar"];
                $AulaMarId = $row["AulaMarId"];
                $profMarId = $row["profMarId"];
                $asgMarId = $row["asgMarId"];

                $Mie = $row["Mie"];
                $AulaMieId = $row["AulaMieId"];
                $profMieId = $row["profMieId"];
                $asgMieId = $row["asgMieId"];

                $Jue = $row["Jue"];
                $AulaJueId = $row["AulaJueId"];
                $profJueId = $row["profJueId"];
                $asgJueId = $row["asgJueId"];

                $Vie = $row["Vie"];
                $AulaVieId = $row["AulaVieId"];
                $profVieId = $row["profVieId"];
                $asgVieId = $row["asgVieId"];

                $Sab = $row["Sab"];
                $AulaSabId = $row["AulaSabId"];
                $profSabId = $row["profSabId"];
                $asgSabId = $row["asgSabId"];

                $Dom = $row["Dom"];
                $AulaDomId = $row["AulaDomId"];
                $profDomId = $row["profDomId"];
                $asgDomId = $row["asgDomId"];
                $txt .= '<tr>';
                $txt .= "<td><center>$HoraInicial <br> a <br> $HoraFinal</center></td>";
                // echo "<td>" . $row["Nombre"] . "</td>";
                if ($Lun == 0) {
                    $txt .= "<td>-</td>";
                } else {
                    $txt .= "<td><i>" . $asgLunId . "</i><br>Prof: " . $profLunId . "<br>" . $AulaLunId . "</td>";
                }
                if ($Mar == 0) {
                    $txt .= "<td>-</td>";
                } else {
                    $txt .= "<td><i>" . $asgMarId . "</i><br>Prof: " . $profMarId . "<br>" . $AulaMarId . "</td>";
                }
                if ($Mie == 0) {
                    $txt .= "<td>-</td>";
                } else {
                    $txt .= "<td><i>" . $asgMieId . "</i><br>Prof: " . $profMieId . "<br>" . $AulaMieId . "</td>";
                }
                if ($Jue == 0) {
                    $txt .= "<td>-</td>";
                } else {
                    $txt .= "<td><i>" . $asgJueId . "</i><br>Prof: " . $profJueId . "<br>" . $AulaJueId . "</td>";
                }
                if ($Vie == 0) {
                    $txt .= "<td>-</td>";
                } else {
                    $txt .= "<td><i>" . $asgVieId . "</i><br>Prof: " . $profVieId . "<br>" . $AulaVieId . "</td>";
                }
                if ($Sab == 0) {
                    $txt .= "<td>-</td>";
                } else {
                    $txt .= "<td><i>" . $asgSabId . "</i><br>Prof: " . $profSabId . "<br>" . $AulaSabId . "</td>";
                }
                if ($Dom == 0) {
                    $txt .= "<td>-</td>";
                } else {
                    $txt .= "<td><i>" . $asgDomId . "</i><br>Prof: " . $profDomId . "<br>" . $AulaDomId . "</td>";
                }
                $txt .= '</tr>';
            }
            $txt .= ' </tbody></table>';
            echo $txt;
        } else {
            echo "0 results";
        }
        $conn->close();

        echo '<br><hr><br>';
        echo $var;
        echo $txt;
        ?>
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
$dompdf->stream('Lista de Asistencia.pdf', array("Attachment" => false));
?>

