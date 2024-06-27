<?php

header('Content-type: application/pdf');
//header('Content-Disposition: inline; filename=name.pdf');
//header('Content-Transfer-Encoding: binary');
//header('Accept-Ranges: bytes');
include './dataConect/conexion.php';
$sql = "select * from cDocumentosProfe where DocumentoProfeId = " . $_GET['file'];
$result = $conn->query($sql);
$rows = array();
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $archivo = $row["archivo"];
    }

    //@readfile("data:application/pdf;base64,$archivo");
//            echo '<iframe>';
    echo $archivo;
//            echo '</iframe>';
} else {
    echo "0 results";
}
$conn->close();
?>
    