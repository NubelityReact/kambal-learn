<?php

/**
 * @author Ing. Bernabe Gutierrez Rodriguez
 */
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

error_reporting(1);
$errorMSG = "";
//matricula
if (empty($_GET["matricula"])) {
    $errorMSG = "matricula is required ";
} else {
    $matricula = $_GET["matricula"];
}
//idiventa
if (empty($_GET["idiventa"])) {
    $errorMSG .= "idiventa is required ";
} else {
    $idiventa = $_GET["idiventa"];
}

// redirect to success page
if ($errorMSG == "") {
    // echo "success";
    //printCredencial();
    //
   getAlumno($matricula, $idiventa);
} else {
    if ($errorMSG == "") {
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

function getAlumno($matricula, $idiventa) {
    // header('Content-Type: application/json');
    include './dataConect/conexion.php';
    //$sql = "SELECT datos_generales.idigenerales, datos_generales.nombre as nomalu, datos_generales.apellido_paterno, datos_generales.apellido_materno, datos_generales.curp, datos_generales.email, alumno.idialumno, alumno.matricula,carrera.categoria, alumno.carrera, alumno.turno, alumno.cuatrimestre,alumno.generacion, archivo.idiarchivo, archivo.nombre as foto, credencial.codigo_credencial, credencial.vigencia, credencial.estatus FROM datos_generales, alumno, archivo, credencial, carrera where datos_generales.idigenerales = alumno.idigenerales AND archivo.idialumno= alumno.idialumno AND credencial.idialumno=alumno.idialumno and carrera.idicarrera = alumno.idicarrera AND alumno.matricula = '$matricula'";
    $sql = "SELECT datos_generales.idigenerales, datos_generales.nombre as nomalu, datos_generales.apellido_paterno, datos_generales.apellido_materno, datos_generales.curp, datos_generales.email, alumno.idialumno, alumno.matricula,carrera.categoria, alumno.carrera, alumno.turno, alumno.cuatrimestre,alumno.generacion, archivo.idiarchivo, archivo.nombre as foto, credencial.codigo_credencial, credencial.vigencia, credencial.estatus, pagos.folio, pagos.total, pagos.idiusuario, pagos.fecha FROM pagos, datos_generales, alumno, archivo, credencial, carrera where datos_generales.idigenerales = alumno.idigenerales AND archivo.idialumno= alumno.idialumno AND credencial.idialumno=alumno.idialumno and carrera.idicarrera = alumno.idicarrera AND alumno.matricula = '$matricula' and pagos.matricula = '$matricula' and idiventa = $idiventa";
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
            $contenido = $row["foto"];
            $generacion = $row["generacion"];
            $categoria = $row["categoria"];
            $folio = $row["folio"];
            $abono = $row["total"];
            $idiusuario = $row["idiusuario"];
            $fecha = $row["fecha"];
        }
        //

        require('./fpdf/fpdf.php');
        include './NumerosALetras.php';
        $titulo = 'COMPROBANTE DEL ALUMNO';
        $logoUCP = 'asset/images/ucp.png';
        $tituloInst = 'UNIVERSIDAD DE CIENCIAS    PENALES Y SOCIALES  S.C';
        $folio = $folio;
        $fechaYHoraDePago = "F y H de Pago: " . $fecha;
        $fechaYHoraDeImpresion = "F y H de Impresión: " . date("Y/m/d h:i:sa");
        $Plantel = 'Plantel: Gustavo Baz';
        $nombre = strtoupper("$nombre $apellido_paterno $apellido_materno");
        $matricula = $matricula;
        $Nivel = $categoria;
        $carrera = $carrera;
        $turno = $turno;
        $ciclo = $generacion;
        $cuatrimestre = $cuatrimestre;
        $total = $abono;
        $letras = NumeroALetras::convertir($total, 'Pesos Pesos 00/100 M.N', 'Pesos 00/100 M.N');
        $atendido = 'Atendido por: ' . $idiusuario;
        $notaAlPie = 'NOTA IMPORTANTE: UNA VEZ REALIZADO EL PAGO DE ESTE RECIBO, NO HABRÁ DEVOLUCIÓN BAJO NINGUNA CIRCUNSTANCIA';

        $pdf = new FPDF('P', 'mm', array(74, 172));
        $pdf->AddPage();
        $pdf->GetPageWidth(74);
        $pdf->SetFont('Arial', '', 8); //tipo de letra
        $pdf->SetXY(10, 10);
        $pdf->Cell(0, 0, charSet($titulo), 'C');
        $pdf->Image($logoUCP, '20', '12', '30', '25', 'PNG'); //Foto Alumno
        $pdf->SetXY(10, 39);
        $pdf->MultiCell(0, 3, charSet($tituloInst),0,1, 0, 'C');
        $pdf->SetXY(5, 50);
        $pdf->Cell(0, 3, "Folio: $folio", 0, 'C');
        $pdf->SetXY(5, 55);
        $pdf->Cell(0, 3, charSet($fechaYHoraDePago), 0, 'C');
        $pdf->SetXY(5, 60);
        $pdf->Cell(0, 3, charSet($fechaYHoraDeImpresion), 0, 'C');
        $pdf->SetXY(5, 65);
        $pdf->Cell(0, 3, charSet($Plantel), 0, 'C');
        $pdf->SetY(72);
        $pdf->SetX(5);
        $pdf->MultiCell(50, 3, charSet("Alumno: $nombre"), 0, 'L');
        $pdf->SetXY(5, 81);
        $pdf->Cell(0, 3, charSet("Matricula: $matricula"), 0, 'C');
        $pdf->SetXY(5, 85);
        $pdf->Cell(0, 3, charSet("Nivel: $Nivel"), 0, 'C');
        $pdf->SetXY(5, 90);
        $pdf->Cell(0, 3, charSet("Carrera: $carrera"), 0, 'C');
        $pdf->SetXY(5, 95);
        $pdf->Cell(0, 3, charSet("Turno: $turno"), 0, 'C');
        $pdf->SetXY(5, 100);
        $pdf->Cell(0, 3, charSet("Ciclo: $ciclo"), 0, 'C');
        $pdf->SetXY(5, 105);
        $pdf->Cell(0, 3, charSet("Cuatrimestre: $cuatrimestre"), 0, 'C');
        $pdf->SetFont('Arial', 'B', 8); //tipo de letra
        $pdf->SetXY(5, 110);
        //$pdf->Cell(0, 3, charSet("Concepto                                       Monto "), 0, 'L');
        $pdf->Cell(0, 3, charSet('CONCEPTO'), 0, 0, 'L');
        $pdf->Cell(0, 3, charSet('PRECIO'), 0, 1, 'R');

        //concepto
        $pdf->AddPage();
//        $pdf->SetX(5);
//        $pdf->MultiCell(40, 3, charSet("Colegiatura 1 licenciatura por que yo digo ue si afuerza que si"), 1,'L');
//        $pdf->SetXY(45,10);
//        $pdf->MultiCell(10, 3, charSet("$1000"), 1,'L');
        //$pdf->Ln();
        $pdf->SetFont('Arial', '', 8); //tipo de letra
        $sql = "SELECT venta_as_servicio.idiventa_as_servicio, venta_as_servicio.idialumno, venta_as_servicio.idiventa_as_servicio, servicios.descripcion, venta_as_servicio.estatus, venta_as_servicio.periodo, venta_as_servicio.comentario, venta_as_servicio.idiventa, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.total, venta_as_servicio.fecha FROM venta_as_servicio, servicios WHERE venta_as_servicio.idiservicio = servicios.idiservicio and venta_as_servicio.estatus='Pagado' and idiventa = $idiventa";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $pdf->SetX(5);
                $pdf->MultiCell(30, 3, charSet($row['descripcion']), 1,'L');
                $pdf->MultiCell(15, 3, charSet('$' . $row['precio']).'.00', 1,  'L');
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        
    } else {
        echo "0 results";
    }
    $conn->close();

    //pie
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 8); //tipo de letra
    $pdf->SetXY(5, 10);
    $pdf->Cell(0, 3, charSet("                                      Total: $$total.00"), 0, 'C');
    $pdf->SetXY(5, 20);
    $pdf->MultiCell(0, 3, "Monto con letra: " . $letras, 0, 'L');
    $pdf->SetXY(5, 30);
    $pdf->MultiCell(0, 3, charSet($atendido), 0, 'L');
    $pdf->SetXY(5, 40);
    $pdf->MultiCell(0, 3, charSet($notaAlPie), 0, 'L');
    $pdf->Output();
}

function charSet($param) {
    return utf8_decode($param);
}

?>
