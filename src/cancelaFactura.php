<?php

$response = [];
$response["success"] = false;

// Recibo como parametro serie y folio.
$serie = $_REQUEST["serie"];
$folio = $_REQUEST["folio"];

date_default_timezone_set('America/Mexico_City');
include('facturar.php');
include './dataConect/conexion.php';

$sql = "select * from factura where serie='".$serie."' and folio=".$folio;
$sql2= "select sum(importe) as total from factura_detalle where factura=".$folio;

$result=$conn->query($sql);
$result2=$conn->query($sql2);
if (!$result) {
    $response["error"] = "Error en la consulta " . $conn->error . $sql;
    echo json_encode($response);
    return;
}

if (!$result2) {
    $response["error"] = "Error en la consulta " . $conn->error . $sql2;
    echo json_encode($response);
    return;
}


$row=$result->fetch_assoc();
$row2=$result2->fetch_assoc();

// $opciones = array("Agente" => "4U6LWO58", "PasswordEmisor" => "4U6LWO58");
$opciones = array("Agente" => "QV1TAXSH", "PasswordEmisor" => "QV1TAXSH");
$factura = new facturacion33("https://invoiceone.mx/fachadacore/fachadacore.asmx?wsdl", $opciones);

$uuid=$row["uuid"];
// var_dump($uuid);
$rfce=$row["rfc_emisor"];
$rfce="AAA010101AAA";
// var_dump($rfce);
$rfcr=$row["rfc"];
// var_dump($rfcr);
$total=$row2["total"];
// var_dump($total);
$cert=base64_encode(file_get_contents("utilerias/certificados/CSD01_AAA010101AAA.cer"));
$key=base64_encode(file_get_contents("utilerias/certificados/CSD01_AAA010101AAA.key"));
$pass=base64_encode("12345678a");

$resultadoc=$factura->cancelaCFDI($uuid,$rfce,$rfcr,$total,$cert,$key,$pass);
