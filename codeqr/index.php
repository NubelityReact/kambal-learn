<?php

require '../fpdf/fpdf.php';
require '../dataConect/conexion.php';
//include 'barcode.php';

$sql = "SELECT idialumno FROM alumno";
$result = $conn->query($sql);

//$pdf = new FPDF();
//$pdf->AddPage();
//$pdf->SetAutoPageBreak(true, 20);
//$y = $pdf->GetY();

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $idialumno = $row["idialumno"];
        echo '<br>'.$idialumno;
    }
}
?>