<?php

error_reporting(1);
$errorMSG = "";
//idialumno
if (empty($_GET["idiprofesor"])) {
    $errorMSG = "idiprofesor is required ";
} else {
    $idiprofesor = $_GET["idiprofesor"];
}


// redirect to success page
if ($errorMSG == "") {
    getCardProfesor($idiprofesor);
} else {
    if ($errorMSG == "") {
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

function getCardProfesor($idiprofesor) {
    // header('Content-Type: application/json');
    include './dataConect/conexion.php';
    //$sql = "SELECT imagen_perfil, idiprofesor, plantel, nombre, apellido_paterno, apellido_materno FROM profesor WHERE idiprofesor = $idiprofesor";
    $sql = "SELECT
            p.imagen_perfil,
            p.imagen_firma,
            p.idiprofesor,
            c.campus AS plantel,
            p.nombre,
            p.apellido_paterno,
            p.apellido_materno 
            FROM
            profesor AS p,
            campus AS c 
            WHERE
            p.idicampus = c.idicampus 
            AND idiprofesor = $idiprofesor";
    $result = $conn->query($sql);
    $rows = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            //$idialumno = $row["idialumno"];
            $nombre = $row["nombre"];
            $apellido_paterno = $row["apellido_paterno"];
            $apellido_materno = $row["apellido_materno"];
            $contenido = $row["imagen_perfil"];
            $imagen_firma = $row["imagen_firma"];
            $plantel = $row["plantel"];
        }

        // print_r($contenido);
        $nombre_compreto = strtoupper("$apellido_paterno $apellido_materno $nombre");
        //$fotoAlumno = "data:image/jpeg;base64," . base64_encode($contenido) . "";
        $fotoAlumno = "dataConect/upload/$contenido";

        $imagen = 'asset/images/profe.jpg';
        $sign = "sign/doc_signs/$imagen_firma";

        require('./fpdf/PDF_Rotate.php');

        class PDF extends PDF_Rotate {

            function RotatedText($x, $y, $txt, $angle) {
                //Text rotated around its origin
                $this->Rotate($angle, $x, $y);
                $this->Text($x, $y, $txt);
                $this->Rotate(0);
            }

            function RotatedImage($file, $x, $y, $w, $h, $angle) {
                //Image rotated around its upper-left corner
                $this->Rotate($angle, $x, $y);
                $this->Image($file, $x, $y, $w, $h);
                $this->Rotate(0);
            }

        }

        // require('./fpdf/fpdf.php');

        $pdf = new PDF('P', 'mm', array(54, 172));
        $pdf->AddPage();
        $pdf->GetPageWidth(40);
        $pdf->Image($imagen, '0', '0', '54', '172', 'JPG'); //dise単o de credencial
        //$pdf->SetTextColor(255, 255, 255);
        //$pdf->SetFont('Arial', 'B', 7); //tipo de letra
        $pdf->AddFont('CaviarDreams', '', 'CaviarDreams.php');
        $pdf->SetFont('CaviarDreams', '', 7);
        $pdf->SetXY(18, 59);
        $pdf->MultiCell(30, 3, charSet($nombre_compreto), 0, 'C'); //Apellido Paterno
        $pdf->SetXY(18, 69);
        $pdf->AddFont('CaviarDreams_Bold', '', 'CaviarDreams_Bold.php');
        $pdf->SetFont('CaviarDreams_Bold', '', 11);
        $pdf->SetTextColor(126, 28, 27);
        $pdf->MultiCell(30, 4, charSet($plantel), 0, 'C'); //Grado
        $pdf->SetXY(23, 71.5);
        $pdf->Cell(0, 0, charSet($cuatrimestre), 'C');
        $pdf->SetXY(18, 75.5);
        $pdf->Cell(0, 0, charSet($vigencia), 'C'); //Vigencia
        $pdf->SetXY(6, 82.5);
        $pdf->Cell(0, 0, charSet($matricula), 'C'); //Matricula
        $pdf->SetXY(30, 82.5);
        $pdf->Cell(0, 0, charSet($turno), 'C'); //Turno
        $pdf->Image($fotoAlumno, '24', '32', '17', '22', 'JPG'); //Foto Alumno

        $pdf->AddPage();
        $pdf->Image('asset/images/anverso.jpg', '0', '0', '54', '85', 'JPG'); //dise単o de credencial
        //$pdf->Image($sign, '15', '44', '25', '10', 'PNG'); 
//Firma
        $pdf->RotatedImage("$sign", '40', '53', '25', '10', 180);


        $pdf->Output();
    } else {
        echo "0 results";
    }
    $conn->close();
}

function charSet($param) {
    return utf8_decode($param);
}
