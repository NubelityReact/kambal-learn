<?php

if (empty($_REQUEST["serie"]) || empty($_REQUEST["folio"]) || empty($_REQUEST["tipo"])) {
    echo 'Faltan parámetros';
    return;
}

include('facturar.php');
include './dataConect/conexion.php';

$cSql = "select * from factura where serie='" . $_REQUEST["serie"] . "' and folio=" . $_REQUEST["folio"];

$result = $conn->query($cSql);

if (!$result) {
    echo 'Ocurrio un error al obtener la factura';
} else {
    $row = $result->fetch_assoc();
    $xml = $row["xml"];
    $pdf = base64_decode($row["pdf"]);
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: inline; filename="' . $_REQUEST["serie"] . $_REQUEST["folio"] . "." . $_REQUEST["tipo"] . '"');
    header('Content-Transfer-Encoding: binary');
    if (strtolower($_REQUEST["tipo"]) == 'pdf') {
        echo $pdf;
    } else {
        echo $xml;
    }
}
?>