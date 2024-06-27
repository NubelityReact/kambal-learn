<?php

/**
 * @author Ing. Bernabe Gutierrez Rodriguez
 */
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//error_reporting(1);
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
if ($errorMSG == "") {
    // header('Content-Type: application/json');
    include './dataConect/conexion.php';
    $sql = "SELECT
            venta_as_servicio.idiventa_as_servicio,
            venta_as_servicio.idialumno,
            venta_as_servicio.idiservicio,
            venta_as_servicio.idiventa,
            venta_as_servicio.precio,
            venta_as_servicio.realdiscount,
            venta_as_servicio.realsurcharge,
            venta_as_servicio.unidad,
            venta_as_servicio.idiuser,
            venta_as_servicio.periodo,
            venta_as_servicio.comentario,
            venta_as_servicio.fecha_mod,
            venta_as_servicio.migrado,
            venta_as_servicio.descuento,
            venta_as_servicio.recargo,
            venta_as_servicio.fecha_limite,
            alumno.matricula,
            alumno.cuatrimestre,
            datos_generales.nombre AS nomalu,
            datos_generales.apellido_paterno,
            datos_generales.apellido_materno,
            datos_generales.email,
            carrera.nombre AS carrera,
            cNiveles.Descripcion AS categoria,
            campus.campus,
            venta.folio,
            venta.fecha as fecha_pago,
            pagos.estatus,
            pagos.subtotal,
            pagos.total,
            pagos.metodo_pago,
            pagos.comentarios,
            pagos.idiusuario,
            pagos.facturado,
            cTurno.Descripcion AS turno
            FROM
            venta_as_servicio
            INNER JOIN alumno ON venta_as_servicio.idialumno = alumno.idialumno
            INNER JOIN datos_generales ON alumno.idigenerales = datos_generales.idigenerales
            INNER JOIN carrera ON alumno.idicarrera = carrera.idicarrera
            INNER JOIN cNiveles ON carrera.NivelId = cNiveles.NivelId
            INNER JOIN campus ON carrera.idicampus = campus.idicampus
            INNER JOIN venta ON venta_as_servicio.idiventa = venta.idiventa
            INNER JOIN pagos ON pagos.idiventa = venta.idiventa
            INNER JOIN cTurno ON alumno.TurnoId = cTurno.TurnoId
            WHERE
            venta.idiventa = $idiventa";
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
            //$vigencia = $row["vigencia"];
            $matricula = $row["matricula"];
            $turno = $row["turno"];
            $generacion = $row["cuatrimestre"];
            $Nivel = $row["categoria"];
            $folio = $row["folio"];
            $abono = $row["total"];
            $idiusuario = $row["idiusuario"];
            $metodo_pago = $row["metodo_pago"];
            $fecha_pago = $row["fecha_pago"];
            $campus = $row["campus"];
        }
        //
        include './NumerosALetras.php';
        include './BackEndSAP/session.php';


        $titulo = 'COMPROBANTE DEL ALUMNO';
        $logoInst = "asset/images/logo/$frontpageimage";
        $tituloInst = strtoupper($fullname);

        $folio = $folio;
        $fechaYHoraDePago = "$fecha_pago HRS";
        $fechaYHoraDeImpresion = date("Y/m/d h:i:sa");
        $Plantel = strtoupper('PLANTEL: ' . $campus);
        $nombre = strtoupper("$nombre $apellido_paterno $apellido_materno");
        $matricula = $matricula;
        $Nivel = $Nivel;
        $carrera = $carrera;
        $turno = $turno;
        $ciclo = $generacion;
        $cuatrimestre = $cuatrimestre;
        $total = $abono;
        $letras = NumeroALetras::convertir($total, ' Pesos 00/100 M.N', 'Pesos 00/100 M.N');
        $atendido = $idiusuario;
        $notaAlPie = 'NOTA IMPORTANTE: UNA VEZ REALIZADO EL PAGO DE ESTE RECIBO, NO HABRÁ DEVOLUCIÓN BAJO NINGUNA CIRCUNSTANCIA  ';
        $notaAlPie2 = 'Este no es un comprobante fiscal. Kambal2.0';


        $sql = "SELECT venta_as_servicio.idiventa_as_servicio, "
                . "venta_as_servicio.idialumno, "
                . "venta_as_servicio.idiventa_as_servicio, "
                . "servicios.descripcion, "
                . "venta_as_servicio.estatus, "
                . "venta_as_servicio.periodo, "
                . "venta_as_servicio.comentario, "
                . "venta_as_servicio.idiventa, "
                . "venta_as_servicio.precio, "
                . "venta_as_servicio.unidad, "
                . "venta_as_servicio.total, "
                . "venta_as_servicio.fecha, "
                . "venta_as_servicio.descuento, "
                . "venta_as_servicio.recargo, "
                . "venta_as_servicio.realdiscount, "
                . "venta_as_servicio.realsurcharge "
                . "FROM venta_as_servicio, servicios "
                . "WHERE venta_as_servicio.idiservicio = servicios.idiservicio "
                . "and venta_as_servicio.estatus='Pagado' "
                . "and idiventa = $idiventa";
        $result = $conn->query($sql);
        $rows = array();


//        if ($result->num_rows > 0) {
//            // output data of each row
//            while ($row = $result->fetch_assoc()) {
//                $pdf->MultiCell(62, 5, charSet($row['descripcion'] . ' - ' . strtoupper($row['comentario']) . ' - CICLO:' . $row['periodo'] . ' ************************************>$' . $row['total'] . '.00'), 0, 'L');
//                $pdf->Cell(10, 3, charSet('$' . $row['precio']), 0, 1, 'L');
//            }
//        } else {
//            echo "0 results";
//        }
        $conn->close();
        //
    } else {
        echo "0 results";
    }
} else {
    if ($errorMSG == "") {
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

function charSet($param) {
    return utf8_decode($param);
}

?>