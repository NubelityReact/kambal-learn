<?php

error_reporting(1);
$errorMSG = "";
//idialumno
if (empty($_GET["idialumno"])) {
    $errorMSG = "idialumno is required ";
} else {
    $idialumno = $_GET["idialumno"];
}


// redirect to success page
if ($errorMSG == "") {
    // echo "success";
    //printCredencial();
    //
   getcardAlumno($idialumno);
} else {
    if ($errorMSG == "") {
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

function getcardAlumno($alumno) {
    // header('Content-Type: application/json');
    include './dataConect/conexion.php';
    //$sql = "SELECT datos_generales.idigenerales, datos_generales.nombre as nomalu, datos_generales.apellido_paterno, datos_generales.apellido_materno, datos_generales.curp, datos_generales.email, alumno.idialumno, alumno.matricula,alumno.carrera, alumno.turno, alumno.cuatrimestre, archivo.idiarchivo, archivo.nombre as foto, credencial.codigo_credencial, credencial.vigencia, credencial.estatus, carrera.categoria FROM datos_generales, alumno, archivo, credencial, carrera where datos_generales.idigenerales = alumno.idigenerales AND archivo.idialumno= alumno.idialumno AND credencial.idialumno=alumno.idialumno AND carrera.idicarrera = alumno.idicarrera AND archivo.idialumno = $alumno And archivo.titulo = 'perfil'";
    $sql = "SELECT
            datos_generales.idigenerales,
            datos_generales.nombre AS nomalu,
            datos_generales.apellido_paterno,
            datos_generales.apellido_materno,
            datos_generales.curp,
            datos_generales.email,
            alumno.idialumno,
            alumno.matricula,
            alumno.carrera,
            alumno.turno,
            alumno.cuatrimestre,
            alumno.perfil,
            alumno.firma,
            credencial.codigo_credencial,
            credencial.vigencia,
            credencial.estatus,
            carrera.categoria,
            campus.campus 
            FROM
            datos_generales,
            alumno,
            credencial,
            carrera,
            campus 
            WHERE
            datos_generales.idigenerales = alumno.idigenerales 
            AND alumno.idicampus = campus.idicampus 
            AND credencial.idialumno = alumno.idialumno 
            AND carrera.idicarrera = alumno.idicarrera 
            AND alumno.idialumno = $alumno ";
    $result = $conn->query($sql);
    $rows = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $idialumno = $row["idialumno"];
            $nombre = $row["nomalu"];
            $apellido_paterno = $row["apellido_paterno"];
            $apellido_materno = $row["apellido_materno"];
            $carrera = $row["carrera"];
            $cuatrimestre = $row["cuatrimestre"];
            $vigencia = $row["vigencia"];
            $matricula = $row["matricula"];
            $turno = $row["turno"];
            $idiarchivo = $row["idiarchivo"];
            $contenido = $row["perfil"];
            $categoria = $row["categoria"];
            $campus = $row["campus"];
        }

        // print_r($contenido);
        $nombre_compreto = strtoupper("$apellido_paterno $apellido_materno $nombre");
        //$fotoAlumno = "data:image/jpeg;base64," . base64_encode($contenido) . "";
        $fotoAlumno = "dataConect/upload/$contenido";

        $R = 255;
        $G = 191;
        $B = 0;
        if (strpos($categoria, 'Licenciatura') !== false) {
            $imagen = 'asset/images/credencial_lic.png';
        }
        if (strpos($categoria, 'Maestría') !== false) {
            $imagen = 'asset/images/credencial_maes.png';
            $R = 126;
            $G = 28;
            $B = 27;
        }
        if (strpos($categoria, 'Doctorado') !== false) {
            $imagen = 'asset/images/credencial_doc.png';
        }
        if (strpos($categoria, 'Diplomado') !== false) {
            $imagen = 'asset/images/credencial_diplo.png';
        }

        require('./fpdf/PDF_Rotate.php');
        include './codebar/barcode.php';

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

        $pdf = new PDF('P', 'mm', array(54, 172));
        $pdf->AddPage();
        $pdf->AddFont('CaviarDreams', '', 'CaviarDreams.php');
        $pdf->SetFont('CaviarDreams', '', 11);
        $pdf->GetPageWidth(40);
        $pdf->Image($imagen, '0', '0', '54', '172', 'PNG'); //dise単o de credencial
        $pdf->SetTextColor(255, 255, 255);
        //$pdf->SetFont('Arial', 'B', 7); //tipo de letra
        $pdf->SetFont('CaviarDreams', '', 7);
        $pdf->SetXY(40, 12);
        $pdf->SetTextColor($R, $G, $B);
        $pdf->AddFont('CaviarDreams_Bold', '', 'CaviarDreams_Bold.php');
        $pdf->SetFont('CaviarDreams_Bold', '', 7);
        $pdf->MultiCell(15, 3, charSet('PLANTEL '), 0, 'C'); //Apellido Paterno
        $pdf->SetXY(32, 15);
        $pdf->MultiCell(22, 3, charSet(strtoupper($campus)), 0, 'C'); //Apellido Paterno
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetXY(0, 22);
        //$pdf->SetFont('CaviarDreams', '', 8);
        $pdf->SetFont('CaviarDreams_Bold', '', 8);
        $pdf->MultiCell(50, 3, charSet(strtoupper($categoria)), 0, 'C'); //Apellido Paterno
        //$pdf->SetFont('CaviarDreams', '', 7);
        $pdf->SetFont('CaviarDreams', '', 7);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY(3, 35);
        $pdf->MultiCell(23, 3, charSet($nombre_compreto), 0, 'D'); //Apellido Paterno
        $pdf->SetXY(3, 49);
        $pdf->MultiCell(23, 3, charSet($carrera), 0, 'D'); //Grado
        $pdf->SetXY(10, 71);
        $pdf->Cell(0, 0, charSet($cuatrimestre), 'C');
        $pdf->SetXY(4, 77);
        $pdf->Cell(0, 0, charSet($vigencia), 'C'); //Vigencia
        $pdf->SetXY(29, 69);
        $pdf->Cell(0, 0, charSet($matricula), 0, 'C'); //Matricula
        $pdf->SetXY(30, 77);
        $pdf->Cell(0, 0, charSet($turno), 'C'); //Turno
        $pdf->Image($fotoAlumno, '32', '30', '17', '22', 'JPG'); //Foto Alumno

        $pdf->AddPage();
        $pdf->AddFont('CaviarDreams', '', 'CaviarDreams.php');
        $pdf->SetFont('CaviarDreams', '', 11);
        $pdf->Image('asset/images/credencial_anverso.png', '0', '0', '54', '85', 'PNG'); //dise単o de credencial

        barcode('codigos/' . charSet($matricula) . '.png', charSet($matricula), 20, 'horizontal', 'code128', false);
        $pdf->Image('codigos/' . charSet($matricula) . '.png', 13, 45, 25, 10, 'PNG');
        //$pdf->RotatedImage('codigos/' . charSet($matricula) . '.png', 13, 45, 25, 10, 180);

        $sql2 = "SELECT firma from alumno WHERE idialumno = $alumno";
        $resultd = $conn->query($sql2);

        if ($resultd->num_rows > 0) {
            // output data of each row
            while ($row = $resultd->fetch_assoc()) {
                //$pdf->Image('sign/doc_signs/' . $row["nombre"], '15', '44', '25', '10', 'PNG'); //Firma
                $pdf->RotatedImage('sign/doc_signs/' . $row["firma"], '37', '40', '25', '10', 180);
            }
        } else {
            $pdf->RotatedImage('sign/doc_signs/empty_sing.png', '37', '40', '25', '10', 180);
        }

        $pdf->Output();
    } else {
        echo "0 results";
    }
    $conn->close();
}

function charSet($param) {
    return utf8_decode($param);
}
