<?php

/**
 * @author Ing. Bernabe Gutierrez Rodriguez
 */
$errorMSG = "";
//fin
if (empty($globalidigenerales)) {
    $errorMSG .= "globalidigenerales is required ";
} else {
    $id = $globalidigenerales;
}

if ($errorMSG == "") {
    include './dataConect/conexion.php';
    $sql = "SELECT
            datos_generales.idigenerales,
            alumno.idialumno,
            alumno.matricula
            FROM
            datos_generales
            INNER JOIN alumno ON alumno.idigenerales = datos_generales.idigenerales
            WHERE
            datos_generales.idigenerales = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $a = 1;
        while ($row = $result->fetch_assoc()) {
            $idigenerales = $row["idigenerales"];
            $idialumno = $row["idialumno"];
            $matricula = $row["matricula"];
        }
    } else {
        echo "0 results";
    }
    $conn->close();
} else {
    if ($errorMSG == "") {
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
?>
