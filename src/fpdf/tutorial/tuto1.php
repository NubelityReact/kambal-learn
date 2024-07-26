<?php
require('../fpdf.php');

$pdf = new FPDF('P','mm',array(54,172));
$pdf->AddPage();
$pdf->GetPageWidth(40);
$pdf->Image('1.png','0','0','54','172','PNG'); //diseño de credencial
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','B',6); //tipo de letra
$pdf->SetXY(27,50);
$pdf->Cell(0,0,'GUTÍERREZ','C'); //Apellido Paterno
$pdf->SetXY(27,53);
$pdf->Cell(0,0,'RODRÍGUEZ','C'); //Apellido Materno
$pdf->SetXY(27,56);
$pdf->Cell(0,0,'BERNABÉ','C'); //Nombres
$pdf->SetXY(27,59);
$pdf->Cell(0,0,'NOË','C'); //Nombre 2
$pdf->SetXY(27,65);
$pdf->Cell(0,0,'Licenciatura en','C'); //Grado
$pdf->SetXY(27,68);
$pdf->Cell(0,0,'Criminalística y','C'); //Carrera
$pdf->SetXY(27,71);
$pdf->Cell(0,0,'Criminología','C');
$pdf->SetXY(23,71.5);
$pdf->Cell(0,0,'7','C');
$pdf->SetXY(18,75.5);
$pdf->Cell(0,0,'24/12/2019','C'); //Vigencia
$pdf->SetXY(6,82.5);
$pdf->Cell(0,0,'101070174','C'); //Matricula
$pdf->SetXY(30,82.5);
$pdf->Cell(0,0,'Sabatino','C'); //Turno
$pdf->Image('firmaerick.jpg','15','115','25','10','JPG'); //Firma
$pdf->Image('benn.jpg','6.5','46','17','22','JPG'); //Foto Alumno
$pdf->Output();
?>
