<?php

$response = [];
$response["success"] = false;

if (!isset($_REQUEST["rfc"]) or ! isset($_REQUEST["nombrefact"]) or ! isset($_REQUEST["emailfact"])
        or ! isset($_REQUEST["metodopagofact"]) or ! isset($_REQUEST["formaPago"]) or ! isset($_REQUEST["usoCfdi"])
        or ! isset($_REQUEST["venta"]) or ! isset($_REQUEST["ticket"])) {
    $response["error"] = "Faltan parametros";
    echo json_encode($response);
    return;
}

// Recibo como parametro idiventa y los campos de la modal.
$rfcr = $_REQUEST["rfc"];
$nombrer = $_REQUEST["nombrefact"];
$email1 = $_REQUEST["emailfact"];
$metodop = $_REQUEST["metodopagofact"];
$formap = $_REQUEST["formaPago"];
$usocfdi = $_REQUEST["usoCfdi"];
$venta = $_REQUEST["venta"];
$ticket = $_REQUEST["ticket"];

$email2 = (isset($_REQUEST["email2fact"])) ? $_REQUEST["email2fact"] : "";
$digicta = (isset($_REQUEST["cuentafact"])) ? $_REQUEST["cuentafact"] : "";

$foliofactura = 0;

date_default_timezone_set('America/Mexico_City');
include('facturar.php');
include './dataConect/conexion.php';

$sql = "SELECT a.idiventa_as_servicio, a.idialumno, a.idiventa_as_servicio, b.descripcion, a.estatus, a.periodo, a.comentario, a.unidad as cantidad, a.idiventa, a.precio, a.unidad, a.total, a.fecha, c.codigo as codigo_sat, d.clave as unidad_sat FROM venta_as_servicio a inner join servicios b on b.idiservicio=a.idiservicio inner join sat_claveprodserv c on c.id=b.codigo_sat inner join sat_claveunidad d on d.id=b.unidad_sat WHERE a.estatus='Pagado' and  a.idiventa = ". $venta." and b.es_facturable='Si'";

$result = $conn->query($sql);
if (!$result) {
    $response["error"] = "Error en la consulta " . $conn->error . $sql;
    echo json_encode($response);
    return;
}

if ($result->num_rows == 0) {
    $response["error"] = "No hay partidas facturables";
    echo json_encode($response);
    return;
} else {

    $rowgral = $result->fetch_assoc();
    $result2 = $conn->query($sql);

    $opciones = array("Agente" => "QV1TAXSH", "PasswordEmisor" => "QV1TAXSH");
    $factura = new facturacion33("https://invoiceone.mx/fachadacore/fachadacore.asmx?wsdl", $opciones);

    // $factura->agregaEmisor("UCP1307158UA", "UNIVERSIDAD DE CIENCIAS PENALES Y SOCIALES", "601");
    $factura->agregaEmisor("AAA010101AAA", "UNIVERSIDAD DE CIENCIAS PENALES Y SOCIALES", "601");
    $factura->agregaReceptor($rfcr, $nombrer, $usocfdi);

    // Aqui se corre el procedimiento almacenado
// 	set @foliofact = 0;
// 	call sp_creaFactura(7,9,'XAXA010101000','Alumno de Prueba','PUE','01','G03',9,'me@me.com','',@foliofact);
// 	select @foliofact;
    $spquery = "CALL sp_creaFactura(" . $venta . ",'" . $ticket . "','" . $rfcr . "','" . $nombrer . "','" . $metodop . "','" . $formap . "','" . $usocfdi . "'," . $rowgral["idialumno"] . ",'" . $email1 . "','" . $email2 . "' ,@foliofact)";
    //var_dump($spquery);
    if (!$conn->query("SET @foliofact = 0") || !$conn->query($spquery)) {
        $response["error"] = "No se pudo crear la factura " . $conn->error;
        echo json_encode($response);
        return;
    }

    if (!($foliof = $conn->query("SELECT @foliofact as foliofactura"))) {
        $response["error"] = "No se pudo obtener el folio " . $mysqli->error;
        echo json_encode($response);
        return;
    }

    $fila = $foliof->fetch_assoc();
    $foliofactura = $fila["foliofactura"];

    // Se agregan las partidas al XML
    while ($row = $result2->fetch_assoc()) {
        $partida = [];
        $partida["ClaveProdServ"] = $row["codigo_sat"];
        $partida["Cantidad"] = $row["cantidad"] * 1;
        $partida["ClaveUnidad"] = $row["unidad_sat"];
        $partida["Descripcion"] = $row["descripcion"];
        $partida["ValorUnitario"] = $row["precio"] * 1;
        $partida["Importe"] = $row["total"] * 1;

        $Impuestos = array();

        $Impuestos["Base"] = $row["total"] * 1;
        $Impuestos["Impuesto"] = "002";
        $Impuestos["TipoFactor"] = "Tasa";
        $Impuestos["TasaOCuota"] = 0.000000;
        $Impuestos["Importe"] = 0.00;

        $factura->agregaPartidas($partida, $Impuestos);
    }

    $factura->Serie = "UCP";
    $factura->Folio = $foliofactura;
    $factura->FormaPago = $formap;
    $factura->MetodoPago = $metodop;

    $factura->generarXML();

    $archivo2 = fopen("test33.xml", "w");
    fwrite($archivo2, $factura->xml);

    $sellado = $factura->sellarXML($factura->xml, "30001000000300023708", "utilerias/certificados/CSD01_AAA010101AAA.cer", "utilerias/certificados/CSD01_AAA010101AAA.key.pem");

    $resultado = $factura->timbrarXML($sellado);

    if ($resultado) {
        $archivo3 = fopen("cfdi/UCP" . $foliofactura . ".xml", "w");
        fwrite($archivo3, $factura->xml);
        fclose($archivo3);
        $qrfile = "cfdi/UCP" . $foliofactura . ".png";
        $datosqr = $factura->getQr();
        $factura->generaQr($datosqr, $qrfile);
        $xmlquery = "update factura set xml = '" . $factura->xml . "', uuid='" . $factura->UUID . "', nocertificado='" . $factura->nocertificado . "', sello='" . $factura->sello . "', certificado='" . $factura->certificado . "', fecha_timbrado='" . $factura->fecha_timbrado . "', cadena_original='" . $factura->cadena_original . "', sellosat='" . $factura->sello_sat . "', certificado_sat='" . $factura->certificado_sat . "', sellocfd='" . $factura->sello_cfd . "', rfcprov_certificacion='" . $factura->rfcprov_certif . "', qr='" . base64_encode($factura->qr) . "' where  serie='" . $factura->Serie . "' and folio=" . $factura->Folio;
        if (!$conn->query($xmlquery)) {
            $response["error"] = "Ocurrio un error al grabar los datos del XML " . $conn->error;
            $response["serie"] = "UCP";
            $response["folio"] = $foliofactura;
            echo json_encode($response);
            return;
        } else {
            $response["success"] = true;
            $response["serie"] = "UCP";
            $response["folio"] = $foliofactura;
            $factura->generaPDF("UCP", $foliofactura, false);
            $pdfquery = "update factura set pdf = '" . base64_encode($factura->pdf) . "' where  serie='" . $factura->Serie . "' and folio=" . $factura->Folio;
            $conn->query($pdfquery);
            echo json_encode($response);
            return;
        }
    } else {
        $response["error"] = 'Error al timbrar' . $factura->ultimoCodigoError . ' - ' . $factura->ultimoError;
        echo json_encode($response);
        return;
    }
}
?>
