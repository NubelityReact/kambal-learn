<?php

getbAlumnoGrupoByIdGrupo();

function getbAlumnoGrupoByIdGrupo() {
    $errorMSG = "";
//GrupoId
    if (empty($_GET["GrupoId"])) {
        $errorMSG = "GrupoId is required ";
    } else {
        $GrupoId = $_GET["GrupoId"];
    }
    if (empty($_GET["parte"])) {
        $errorMSG = "parte is required ";
    } else {
        $parte = $_GET["parte"];
    }
// redirect to success page
    if ($errorMSG == "") {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                tbAlumnoGrupo.AlumnoGruposId,
                alumno.idialumno,
                alumno.matricula AS Matricula,
                alumno.idigenerales,
                datos_generales.nombre AS Nombre,
                datos_generales.apellido_paterno AS Apellido_Paterno,
                datos_generales.apellido_materno AS Apellido_Materno,
                datos_generales.email,
                credencial.idicredencial
                FROM
                tbAlumnoGrupo
                INNER JOIN alumno ON tbAlumnoGrupo.idialumno = alumno.idialumno
                INNER JOIN datos_generales ON alumno.idigenerales = datos_generales.idigenerales
                INNER JOIN credencial ON credencial.idialumno = alumno.idialumno
                WHERE
                datos_generales.email = '$GrupoId' 
                ORDER BY
                Apellido_Paterno ASC";

        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                //echo 'success';
                $rows['data'][] = $row;
                //$idialumno = $row["idialumno"];
                //window.open('webinar_constancy.php?idialumno=' + idialumno, this.target, width = 500, height = 500);
                //  echo "window.open('webinar_constancy.php?idialumno=' + " . $row["idialumno"] . ", this.target, width = 500, height = 500);";
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
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
}

?>
