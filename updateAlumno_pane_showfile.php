<?php

header('Content-type: application/pdf');
include './dataConect/conexion.php';
$sql = "select * from cDocumentosGenerales where ididocgral = " . $_GET['file'];
$result = $conn->query($sql);
$rows = array();
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $archivo = $row["files"];
    }
    echo $archivo;
} else {
    echo "0 results";
}
$conn->close();
?>
    