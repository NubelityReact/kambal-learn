<?php

/**
 * Agrega un registro a la tabla de datos Generales
 * @param type $estatus
 * @param type $nombre
 * @param type $apellidos
 * @param type $genero
 * @param type $edad
 * @param type $curp
 * @param type $rfc
 * @param type $email
 * @param type $telefono
 * @param type $movil
 * @param type $email2
 * @param type $pais
 * @param type $ciudad
 * @param type $direccion
 * @param type $municipio
 * @param type $cp
 * @param type $escegreso
 * @param type $nivelegreso
 * @param type $fechaegreso
 * @param type $infoadicional
 * @param type $tiposangre
 * @param type $alergias
 * @param type $fecha_nacimiento
 */
function insertDatos_Generales($estatus, $nombre, $apellidos, $genero, $edad, $curp, $rfc, $email, $telefono, $movil, $email2, $pais, $ciudad, $direccion, $municipio, $cp, $escegreso, $nivelegreso, $fechaegreso, $infoadicional, $tiposangre, $alergias, $fecha_nacimiento) {
    include './conexion.php';
    $sql = "INSERT INTO datos_generales (estatus, nombre, apellidos, genero, edad, curp, rfc, email, telefono, movil, email2, pais, ciudad, direccion, municipio, cp, escegreso, nivelegreso, fechaegreso, infoadicional, tiposangre, alergias, fecha_nacimiento) VALUES "
            . "                         ('" . $estatus . "', '" . $nombre . "', '" . $apellidos . "', '" . $genero . "', '" . $edad . "', '" . $curp . "', '" . $rfc . "', '" . $email . "', '" . $telefono . "', '" . $movil . "', '" . $email2 . "', '" . $pais . "', '" . $ciudad . "', '" . $direccion . "', '" . $municipio . "', '" . $cp . "', '" . $escegreso . "', '" . $nivelegreso . "', '" . $fechaegreso . "', '" . $infoadicional . "', '" . $tiposangre . "', '" . $alergias . "', '" . $fecha_nacimiento . "');";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

/**
 * Actualiza un registro de la table de datos Generales
 * @param type $idigeneral
 * @param type $estatus
 * @param type $nombre
 * @param type $apellidos
 * @param type $genero
 * @param type $edad
 * @param type $curp
 * @param type $rfc
 * @param type $email
 * @param type $telefono
 * @param type $movil
 * @param type $email2
 * @param type $pais
 * @param type $ciudad
 * @param type $direccion
 * @param type $municipio
 * @param type $cp
 * @param type $escegreso
 * @param type $nivelegreso
 * @param type $fechaegreso
 * @param type $infoadicional
 * @param type $tiposangre
 * @param type $alergias
 * @param type $fecha_nacimiento
 */
function UpdateDatos_Generales($idigeneral, $nombre, $apellidos, $genero, $edad, $curp, $rfc, $email, $telefono, $movil, $email2, $pais, $ciudad, $direccion, $municipio, $cp, $escegreso, $nivelegreso, $fechaegreso, $infoadicional, $tiposangre, $alergias, $fecha_nacimiento) {
    include './conexion.php';
    $sql = "UPDATE datos_generales SET nombre = '" . $nombre . "', apellidos = '" . $apellidos . "', genero = '" . $genero . "', edad = '" . $edad . "', curp = '" . $curp . "', rfc = '" . $rfc . "', email = '" . $email . "', telefono = '" . $telefono . "', movil = '" . $movil . "', email2 = '" . $email2 . "', pais = '" . $pais . "', ciudad = '" . $ciudad . "', direccion = '" . $direccion . "', municipio = '" . $municipio . "', cp = '" . $cp . "', escegreso = '" . $escegreso . "', nivelegreso = '" . $nivelegreso . "', fechaegreso = '" . $fechaegreso . "', infoadicional = '" . $infoadicional . "', tiposangre = '" . $tiposangre . "', alergias = '" . $alergias . "', fecha_nacimiento = '" . $fecha_nacimiento . "' WHERE datos_generales.idigenerales = " . $idigeneral . ";";
    if ($conn->query($sql) === TRUE) {
        echo "Record Updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

/**
 * Actualiza el estatus de una persona de Pre-Inscrito a Inscrito
 * @param type $idigeneral
 */
function UpdateEstatusGeneral($idigeneral) {
    include './conexion.php';
    $sql = "UPDATE datos_generales SET estatus = 'Inscrito' WHERE datos_generales.idigenerales = " . $idigeneral . ";";
    if ($conn->query($sql) === TRUE) {
        echo "Record Updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function getDatosGenerales() {
    header('Content-Type: application/json');
    include './conexion.php';
    $sql = "SELECT * FROM datos_generales";
    $result = $conn->query($sql);
    $rows = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $rows['data'][] = $row;
        }
        print json_encode($rows, JSON_PRETTY_PRINT);
    } else {
        echo "0 results";
    }
    $conn->close();
}

function getOferta() {
    header('Content-Type: application/json');
    include './conexion.php';
    $sql = "SELECT * FROM carrera";
    $result = $conn->query($sql);
    $rows = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $rows['data'][] = $row;
        }
        print json_encode($rows, JSON_PRETTY_PRINT);
    } else {
        echo "0 results";
    }
    $conn->close();
}

function addAlumno() {
    $sql = "INSERT INTO `alumno` (`idialumno`, `idicarrera`, `carrera`, `idigenerales`, `matricula`, `nombre`, `apellidos`, `curp`, `email`, `generacion`, `alta`) VALUES (NULL, '1', 'Derecho', '1', '191070100', 'Bender', 'Doblador Rodriguez', 'DOROBE880hhdftdr02', 'mail@gmail.com', '19-1', CURRENT_TIMESTAMP);";
}

function getDatosGeneralesbyId($idi) {
    header('Content-Type: application/json');
    include './conexion.php';
    $sql = "SELECT * FROM datos_generales WHERE idigenerales =" . $idi;
    $result = $conn->query($sql);
    $rows = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $rows['data'][] = $row;
        }
        print json_encode($rows, JSON_PRETTY_PRINT);
    } else {
        echo "0 results";
    }
    $conn->close();
}

function getcardAlumnow() {
    header('Content-Type: application/json');
    include './conexion.php';
    //$sql = "SELECT a.idialumno, a.nombre, a.apellido_paterno, a.apellido_materno, a.carrera, a.cuatrimestre, a.vigencia, a.matricula, a.turno,i.idiarchivo, i.contenido from alumno as a, archivo as i where a.idialumno = i.idiarchivo";
    //$sql = "SELECT a.idialumno, g.idigenerales,  g.nombre, g.apellido_paterno, g.apellido_materno, a.carrera, a.cuatrimestre, c.vigencia, a.matricula, a.turno ,c.idicredencial, c.codigo_credencial, c.estatus, c.bloqueo ,i.idiarchivo, i.contenido from credencial as c, datos_generales as g, alumno as a, archivo as i where a.idialumno = i.idiarchivo and a.idialumno = g.idigenerales and a.idialumno = c.idialumno";
    $sql = "SELECT a.idialumno, g.idigenerales,  g.nombre as nomalu , g.apellido_paterno, g.apellido_materno, a.carrera, a.cuatrimestre, c.vigencia, a.matricula, a.turno ,c.idicredencial, c.codigo_credencial, c.estatus, c.bloqueo ,i.idiarchivo, i.nombre as foto from credencial as c, datos_generales as g, alumno as a, archivo as i where a.idialumno = i.idiarchivo and a.idialumno = g.idigenerales and a.idialumno = c.idialumno";
    $result = $conn->query($sql);
    $rows = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $idialumno = $row["idialumno"];
            $idigenerales = $row["idigenerales"];
            $nombre = $row["nomalu"];
            $apellido_paterno = $row["apellido_paterno"];
            $apellido_materno = $row["apellido_materno"];
            $carrera = $row["carrera"];
            $cuatrimestre = $row["cuatrimestre"];
            $vigencia = $row["vigencia"];
            $matricula = $row["matricula"];
            $turno = $row["turno"];
            $idicredencial = $row["idicredencial"];
            $codigo_credencial = $row["codigo_credencial"];
            $estatus = $row["estatus"];
            $bloqueo = $row["bloqueo"];
            $idiarchivo = $row["idiarchivo"];
            $contenido = $row["foto"];
            $foto = base64url_encode($contenido);
            $data = array(
                'idialumno' => $idialumno,
                'idigenerales' => $idigenerales,
                'nombre' => $nombre,
                'apellido_paterno' => $apellido_paterno,
                'apellido_materno' => $apellido_materno,
                'carrera' => $carrera,
                'cuatrimestre' => $cuatrimestre,
                'idicredencial' => $idicredencial,
                'codigo_credencial' => $codigo_credencial,
                'estatus' => $estatus,
                'bloqueo' => $bloqueo,
                'vigencia' => $vigencia,
                'matricula' => $matricula,
                'turno' => $turno,
                'idiarchivo' => $idiarchivo,
                'contenido' => '<center><img width="160px;" src="dataConect/upload/' . $contenido . '"></center>',
            );
            $rows['data'][] = $data;
        }
        print json_encode($rows, JSON_PRETTY_PRINT);
    } else {
        echo "0 results";
    }
    $conn->close();
}

function base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

/**
 * Agrega los datos de la credencial asociados al elstudiante
 * @param type $idialimno
 */
function addDataCredencial($idialimno) {
    $errorMSG = "";
    //idialumno
    if (empty($_POST["idialumno"])) {
        $errorMSG = "idialumno is required ";
    } else {
        $idialumno = $_POST["idialumno"];
    }
    //codigo_credencial
    if (empty($_POST["codigo_credencial"])) {
        $errorMSG .= "codigo_credencial is required ";
    } else {
        $codigo_credencial = $_POST["codigo_credencial"];
    }
    //vigencia
    if (empty($_POST["vigencia"])) {
        $errorMSG .= "vigencia is required ";
    } else {
        $vigencia = $_POST["vigencia"];
    }
    //estatus
    if (empty($_POST["estatus"])) {
        $errorMSG .= "estatus is required ";
    } else {
        $estatus = $_POST["estatus"];
    }
    if ($errorMSG == "") {
        include './conexion.php';
        $sql = "INSERT INTO credencial (idialumno, codigo_credencial, vigencia, estatus, fecha_mod) VALUES  ('" . $idialumno . "', '" . $codigo_credencial . "', '" . $vigencia . "', 'Activo', CURRENT_TIMESTAMP);";
        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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

function generarCodigo($longitud) {
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern) - 1;
    for ($i = 0; $i < $longitud; $i++)
        $key .= $pattern{mt_rand(0, $max)};
    return "UCP-" . $key;
}

//getcardAlumno();
//retorna el ultimo id para generar consecutivo
function lastIdVenta() {
    //SELECT MAX(idiventa) FROM venta
    include './conexion.php';
    $sql = "SELECT MAX(idiventa) FROM venta";
    $result = $conn->query($sql);
    $rows = null;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $rows = $row["MAX(idiventa)"];
        }
        return $rows;
    } else {
        return $row + 1;
    }
    $conn->close();
}

function getSubtotalVentaASservicio() {
    header('Content-Type: application/json');
    include './conexion.php';
    $errorMSG = "";
    //idiventa
    if (empty($_GET["idiventa"])) {
        $errorMSG = "idiventa is required ";
    } else {
        $idiventa = $_GET["idiventa"];
    }
    //idialumno
    if (empty($_GET["idialumno"])) {
        $errorMSG .= "idialumno is required ";
    } else {
        $idialumno = $_GET["idialumno"];
    }

    if ($errorMSG == "") {
        $sql = "SELECT SUM(venta_as_servicio.total) as subtotal FROM venta_as_servicio WHERE idiventa = $idiventa and idialumno = $idialumno";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
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

function getPago() {
    header('Content-Type: application/json');
    include './conexion.php';
    $sql = "SELECT idipago, idiventa, folio, estatus, subtotal, descuento, total, metodo_pago, comentarios, fecha, idiusuario FROM pagos";
    $result = $conn->query($sql);
    $rows = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $rows['data'][] = $row;
        }
        print json_encode($rows, JSON_PRETTY_PRINT);
    } else {
        echo "0 results";
    }
    $conn->close();
}

/**
 * Consulta el ultimo id de la tabla matrucila para obtener el
 * consecutivo
 * @return type
 */
function getLastIdMatricula() {
    //SELECT MAX(idiventa) FROM venta
    include './conexion.php';
    $sql = "SELECT MAX(idimatricula) FROM matricula";
    $result = $conn->query($sql);
    $rows = null;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $rows = $row["MAX(idimatricula)"];
        }
        return $rows;
    } else {
        return 0;
    }
    $conn->close();
}

//$numeroConsecutivo = getLastIdMatricula();
//
//if ($numeroConsecutivo == null) {
//    echo $numeroConsecutivo = 1;
//} else {
//    echo $numeroConsecutivo;
//}
//// $cons = lastIdVenta();
//// $key = generarCodigo(6);
//// print_r($key.'-'.$cons);
//////echo generarCodigo(6);

function getMatriculaByID($id) {
    //SELECT MAX(idiventa) FROM venta
    include './conexion.php';
    $sql = "SELECT matricula FROM matricula WHERE idimatricula = $id";
    $result = $conn->query($sql);
    $rows = "";
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $rows = $row["matricula"];
        }
        return $rows;
    } else {
        return "0 results";
    }
    $conn->close();
}

function setMatricula() {
    $errorMSG = "";
    //generacion
    if (empty($_POST["generacion"])) {//ciclo escolar
        $errorMSG = "generacion is required ";
    } else {
        $generacion = $_POST["generacion"];
    }
    //clave
    if (empty($_POST["clave"])) {//Plantel
        $errorMSG .= "clave is required ";
    } else {
        $clave = $_POST["clave"];
    }
    //nivel
    if (empty($_POST["nivel"])) {//nivel de estudios
        $errorMSG .= "nivel is required ";
    } else {
        $nivel = $_POST["nivel"];
    }
    //idiCarrera
    if (empty($_POST["idiCarrera"])) {//Numero de carrera
        $errorMSG .= "idiCarrera is required ";
    } else {
        $idiCarrera = $_POST["idiCarrera"];
    }
    $numeroConsecutivo = getLastIdMatricula(); //numero Consecutivo
    if ($numeroConsecutivo == null) {
        $numeroConsecutivo = 1;
    } else {
        $numeroConsecutivo;
    }
    // redirect to success page
    if ($errorMSG == "") {
        $matriculaEscolar = $generacion . $clave . $nivel . $idiCarrera . $numeroConsecutivo;
        include './conexion.php';
        $sql = "INSERT INTO matricula (matricula, ciclo_escolar, plantel, nivel, carrera, consecutivo) VALUES ('" . $matriculaEscolar . "', '" . $generacion . "', '" . $clave . "', '" . $nivel . "', '" . $idiCarrera . "', '" . $numeroConsecutivo . "')";
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id; //recupero ultimo id insertado
            $actualyMatricula = getMatriculaByID($last_id); //consulto la matrucula del ultimo id y lo almaceno en $actualyMatricula
            return $actualyMatricula; //retono la matricula
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    } else {
        if ($errorMSG == "") {
            return "Something went wrong :(";
        } else {
            return $errorMSG;
        }
    }
}

function getPrecioServicioByID($idiservicio) {
    //SELECT MAX(idiventa) FROM venta
    include './conexion.php';
    $sql = "SELECT precio FROM servicios WHERE idiservicio = $idiservicio";
    $result = $conn->query($sql);
    $rows = null;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $rows = $row["precio"];
        }
        return $rows;
    }
    $conn->close();
}

function getFolioPago($last_id) {
    //SELECT MAX(idiventa) FROM venta
    include './conexion.php';
    $sql = "SELECT folio FROM venta WHERE idiventa = $last_id";
    $result = $conn->query($sql);
    $rows = null;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $rows = $row["folio"];
        }
        return $rows;
    } else {
        return $row + 1;
    }
    $conn->close();
}

function getSubtotal($idiventa, $idialumno) {
    include './conexion.php';
    $sql = "SELECT SUM(venta_as_servicio.total) as subtotal FROM venta_as_servicio WHERE idiventa = $idiventa and idialumno = $idialumno";
    $result = $conn->query($sql);
    $rows = null;
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $rows = $row["subtotal"];
        }
        return $rows;
    }
    $conn->close();
}

function getCobrosPendientesToAlumnoById() {
    header('Content-Type: application/json');
    $errorMSG = "";
    //idialumno
    if (empty($_GET["idialumno"])) {
        $errorMSG = "idialumno is required ";
    } else {
        $idialumno = $_GET["idialumno"];
    }
    // redirect to success page
    if ($errorMSG == "") {
        include './conexion.php';
        $sql = "SELECT alumno.nombre, alumno.apellido_paterno, alumno.apellido_materno, alumno.matricula, servicios.idiservicio, servicios.descripcion, venta_as_servicio.comentario, venta_as_servicio.periodo, servicios.precio, venta_as_servicio.unidad, venta_as_servicio.descuento, venta_as_servicio.total, venta_as_servicio.fecha, user.Nombre as nom, user.apellido_paterno as app , user.apellido_materno as apm FROM venta_as_servicio, alumno, servicios, user WHERE venta_as_servicio.idiuser = user.idiuser AND servicios.idiservicio = venta_as_servicio.idiservicio and alumno.idialumno = venta_as_servicio.idialumno and alumno.idialumno = $idialumno ORDER BY idiventa_as_servicio ASC";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
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

function getcardAlumnoById() {
    $errorMSG = "";
    //idialumno
    if (empty($_GET["idialumno"])) {
        $errorMSG = "idialumno is required ";
    } else {
        $idialumno = $_GET["idialumno"];
    }
    // redirect to success page
    if ($errorMSG == "") {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT alumno.carrera, alumno.matricula, alumno.generacion, alumno.cuatrimestre, alumno.cuatrimestres_trasncurridos, alumno.turno, credencial.idicredencial, credencial.codigo_credencial, credencial.vigencia, credencial.estatus, credencial.bloqueo, alumno.doc_nacimiento, alumno.doc_certificado, alumno.doc_curp, alumno.doc_ine, alumno.doc_fotos, alumno.doc_comprobante FROM alumno, credencial WHERE credencial.idialumno = alumno.idialumno AND alumno.idialumno = 13";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
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

/**
 * Esta funcion muestra las cuentas por cobrar de los servicios pendientes de pago 
 * que se le han asignado al alumno
 * en formato JSON
 */
function getCuentasPorCobrar() {
    header('Content-Type: application/json');
    $errorMSG = "";
    //idialumno
    if (empty($_GET["matricula"])) {
        $errorMSG = "matricula is required ";
    } else {
        $matricula = $_GET["matricula"];
    }
    // redirect to success page
    if ($errorMSG == "") {
        include './conexion.php';
        $sql = "SELECT * FROM pagos WHERE matricula = '" . $matricula . "'";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
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

function getMatriculaAlumnoByID() {
    $errorMSG = "";
    //idialumno
    if (empty($_GET["idialumno"])) {
        $errorMSG = "idialumno is required ";
    } else {
        $idialumno = $_GET["idialumno"];
    }
    // redirect to success page
    if ($errorMSG == "") {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT matricula from alumno where idialumno = $idialumno";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
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

function getCxC() {
    $errorMSG = "";
    //idialumno
    if (empty($_GET["idiventa"])) {
        $errorMSG = "idiventa is required ";
    } else {
        $idiventa = $_GET["idiventa"];
    }
    // redirect to success page
    if ($errorMSG == "") {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT venta_as_servicio.idiventa_as_servicio, venta_as_servicio.idialumno, venta_as_servicio.idiventa_as_servicio, servicios.descripcion, venta_as_servicio.estatus, venta_as_servicio.periodo, venta_as_servicio.comentario, venta_as_servicio.idiventa, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.total, venta_as_servicio.fecha FROM venta_as_servicio, servicios WHERE venta_as_servicio.idiservicio = servicios.idiservicio and idiventa = $idiventa";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
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

function getPartidasPagadas() {
    $errorMSG = "";
    //idiventa
    if (empty($_GET["idiventa"])) {
        $errorMSG = "idiventa is required ";
    } else {
        $idiventa = $_GET["idiventa"];
    }

    // redirect to success page
    if ($errorMSG == "") {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT venta_as_servicio.idiventa_as_servicio, venta_as_servicio.idialumno, venta_as_servicio.idiventa_as_servicio, servicios.descripcion, venta_as_servicio.estatus, venta_as_servicio.periodo, venta_as_servicio.comentario, venta_as_servicio.idiventa, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.total, venta_as_servicio.fecha FROM venta_as_servicio, servicios WHERE venta_as_servicio.idiservicio = servicios.idiservicio and venta_as_servicio.estatus = 'Pagado' and idiventa = $idiventa";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
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

function getTotalAbonoByIdFolio() {
    $errorMSG = "";
    //folio
    if (empty($_GET["folio"])) {
        $errorMSG .= "folio is required ";
    } else {
        $folio = $_GET["folio"];
    }

    // redirect to success page
    if ($errorMSG == "") {
        include './conexion.php';
        $sql = "select total from pagos WHERE folio = '" . $folio . "'";
        $result = $conn->query($sql);
        $abono = "";
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $abono = $row["total"];
            }
            return $abono;
        } else {
            return "0 results";
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

function getTotalAbonoByIdVenta() {
    $errorMSG = "";
    //folio
    if (empty($_GET["idiventa"])) {
        $errorMSG = "idiventa is required ";
    } else {
        $idiventa = $_GET["idiventa"];
    }

    // redirect to success page
    if ($errorMSG == "") {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "select abono from pagos WHERE idiventa = '" . $idiventa . "'";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
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

function getcardAlumnoByMatricula() {
    $errorMSG = "";
    //idialumno
    if (empty($_GET["matricula"])) {
        $errorMSG = "matricula is required ";
    } else {
        $matricula = $_GET["matricula"];
    }
    // redirect to success page
    if ($errorMSG == "") {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT alumno.carrera,alumno.nombre, alumno.apellido_paterno,alumno.apellido_materno, alumno.matricula, alumno.generacion, alumno.cuatrimestre, alumno.cuatrimestres_trasncurridos, alumno.turno, credencial.idicredencial, credencial.codigo_credencial, credencial.vigencia, credencial.estatus, credencial.bloqueo, alumno.doc_nacimiento, alumno.doc_certificado, alumno.doc_curp, alumno.doc_ine, alumno.doc_fotos, alumno.doc_comprobante FROM alumno, credencial WHERE credencial.idialumno = alumno.idialumno AND alumno.matricula = '" . $matricula . "'";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
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

function getNumero_Carrera($idiCarrera) {
    $numero = "";
    include './conexion.php';
    $sql = "select numero_carrera from carrera WHERE idicarrera= $idiCarrera";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $numero = $row["numero_carrera"];
        }
        return $numero;
    } else {
        return "";
    }
    $conn->close();
}

function getTotalFromPagosByIdVenta($idiventa) {
    $numero = "";
    include './conexion.php';
    $sql = "SELECT total FROM pagos where idiventa = $idiventa";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $numero = $row["total"];
        }
        return $numero;
    } else {
        return "";
    }
    $conn->close();
}

function getAbonoFromPagosByIdVenta($idiventa) {
    $numero = "";
    include './conexion.php';
    $sql = "SELECT abono FROM pagos where idiventa = $idiventa";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $numero = $row["abono"];
        }
        return $numero;
    } else {
        return "";
    }
    $conn->close();
}

//echo $abono = getAbonoFromPagosByIdVenta(20);

function comparaSiTotal_Abono_son_Iguales($idiventa) {
    echo $abono = getAbonoFromPagosByIdVenta($idiventa);
    echo $total = getTotalFromPagosByIdVenta($idiventa);

    if ($total === $abono) {
        $accion = CambiaEstatusPago($idiventa, "Pagado");
        if ($accion) {
            echo 'Pagado';
        }
    } else {
        $accion = CambiaEstatusPago($idiventa, "Pendiente");
        if ($accion) {
            echo 'Pendiente';
        }
    }
}

function CambiaEstatusPago($idiventa, $estatus) {
    include './conexion.php';
    $sql = "UPDATE pagos SET estatus = '$estatus' WHERE pagos.idiventa = $idiventa";
    if ($conn->query($sql) === TRUE) {
        return true;
        echo "Record updated successfully";
    } else {
        return false;
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
}

//comparaSiTotal_Abono_son_Iguales(20);
//echo $accion = CambiaEstatusPago(20, "Pagado");

function getcardAlumno() {
    header('Content-Type: application/json');
    include './conexion.php';
    //$sql = "SELECT datos_generales.idigenerales, alumno.beca_colegiatura,datos_generales.nombre as nomalu, datos_generales.apellido_paterno, datos_generales.apellido_materno, datos_generales.curp, datos_generales.email, alumno.idialumno, alumno.matricula,alumno.carrera, alumno.turno, alumno.cuatrimestre, archivo.idiarchivo, archivo.nombre, credencial.codigo_credencial,credencial.idicredencial, credencial.bloqueo,  credencial.vigencia, credencial.estatus , carrera.categoria FROM datos_generales, alumno, archivo, credencial, carrera where carrera.idicarrera = alumno.idicarrera AND datos_generales.idigenerales = alumno.idigenerales AND archivo.idialumno= alumno.idialumno AND credencial.idialumno=alumno.idialumno ORDER BY alumno.alta DESC";
    $sql = "SELECT datos_generales.idigenerales, alumno.beca_colegiatura,datos_generales.nombre as nomalu, datos_generales.apellido_paterno, datos_generales.apellido_materno, datos_generales.curp, datos_generales.email, alumno.idialumno, alumno.matricula,alumno.carrera, alumno.turno, alumno.cuatrimestre, archivo.idiarchivo, archivo.nombre, credencial.codigo_credencial,credencial.idicredencial, credencial.bloqueo,  credencial.vigencia, credencial.estatus , carrera.categoria FROM datos_generales inner join alumno on datos_generales.idigenerales = alumno.idigenerales inner join archivo on archivo.idialumno= alumno.idialumno inner join credencial on credencial.idialumno=alumno.idialumno inner join carrera on carrera.idicarrera = alumno.idicarrera ORDER BY alumno.alta DESC";
    $result = $conn->query($sql);
    $rows = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $idialumno = $row["idialumno"];
            $idigenerales = $row["idigenerales"];
            $nombre = $row["nomalu"];
            $apellido_paterno = $row["apellido_paterno"];
            $apellido_materno = $row["apellido_materno"];
            $carrera = $row["carrera"];
            $cuatrimestre = $row["cuatrimestre"];
            $vigencia = $row["vigencia"];
            $matricula = $row["matricula"];
            $turno = $row["turno"];
            $idicredencial = $row["idicredencial"];
            $codigo_credencial = $row["codigo_credencial"];
            $estatus = $row["estatus"];
            $bloqueo = $row["bloqueo"];
            $idiarchivo = $row["idiarchivo"];
            $contenido = $row["nombre"];
            $foto = explode(',', $contenido);
            $data = array(
                'idialumno' => $idialumno,
                'idigenerales' => $idigenerales,
                'nombre' => $nombre,
                'apellido_paterno' => $apellido_paterno,
                'apellido_materno' => $apellido_materno,
                'carrera' => $carrera,
                'cuatrimestre' => $cuatrimestre,
                'idicredencial' => $idicredencial,
                'beca_colegiatura' => $row["beca_colegiatura"],
                'codigo_credencial' => $codigo_credencial,
                'estatus' => $estatus,
                'bloqueo' => $bloqueo,
                'vigencia' => $vigencia,
                'matricula' => $matricula,
                'turno' => $turno,
                'idiarchivo' => $idiarchivo,
                'categoria' => $row["categoria"],
                'contenido' => '<center><img width="160px;" src="dataConect/upload/' . $contenido . '"></center>',
                'btnEditar' => '<a href="updateAlumno.php?p=' . $idigenerales . '&idialumno=' . $idialumno . '&idiarchivo=' . $idialumno . '"" target="_blank"><i class="pe-7s-note pe-2x pe-va" title="Editar"></i></a>',
                'btnCredencial' => '<a href="credencialEstudiante.php?idialumno=' . $idialumno . '&idiarchivo=' . $idialumno . '" target="_blank"><i class="pe-7s-id pe-2x pe-va" title="Imprimir Credencial"></i></a></td>',
            );
            $rows['data'][] = $data;
        }
        print json_encode($rows, JSON_PRETTY_PRINT);
    } else {
        echo "0 results";
    }
    $conn->close();
}

/**
 * Trigger que inserta a alumno en moodle
 */
function core_user_create_user_moodle($username, $firstname, $lastname, $email) {
    try {
        include '../msw/core_token_service_web_moodle.php';
        $functionname = 'core_user_create_users';
        $restformat = 'json';

        $user = array(
            'username' => strtolower($username), // must be unique string in lowercase
            'password' => '1234567891011',
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email, //unique
            'auth' => 'manual',
            'lang' => 'en',
            'department' => 'core',
            'preferences' => array(
                $preferences = array(
            'type' => 'auth_forcepasswordchange',
            'value' => '1'
                )
            )
        );

        $users = array($user); // must be wrapped in an array because it's plural.
        $param = array("users" => $users); // the paramater to send
        $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $functionname;
        require_once('../msw/curl.php'); // You can put it in the top.
        $curl = new curl;
        $restformat = ($restformat == 'json') ? '&moodlewsrestformat=' . $restformat : '';
        $resp = $curl->post($serverurl . $restformat, $param);
        print_r($resp);
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function core_user_create_user_moodle2($username, $firstname, $lastname, $email) {
    try {
        include '../msw/core_token_service_web_moodle.php';
        $functionname = 'core_user_create_users';
        $restformat = 'json';


        $user = array(
            'username' => strtolower($username), // must be unique string in lowercase
            'password' => '1234567891011',
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email, //unique
            'auth' => 'manual',
            'lang' => 'en',
            'department' => 'core',
            'preferences' => array(
                $preferences = array(
            'type' => 'auth_forcepasswordchange',
            'value' => 'true'
                )
            )
        );

        $users = array($user); // must be wrapped in an array because it's plural.
        $param = array("users" => $users); // the paramater to send
        header('Content-Type: application/json');
        print json_encode($param, JSON_PRETTY_PRINT);
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function core_user_create_user_moodle3($username, $firstname, $lastname, $email) {
    try {
        include '../msw/core_token_service_web_moodle.php';
        $functionname = 'core_user_create_users';
        $restformat = 'json';


        $user1 = new stdClass();
        $user1->username = 'testusername1';
        $user1->password = 'Uk3@0d5w';
        $user1->firstname = 'testfirstname1';
        $user1->lastname = 'testlastname1';
        $user1->email = 'testemail1@moodle.com2';
        $user1->auth = 'manual';
        $user1->idnumber = '';
        $user1->lang = 'en';
        $user1->timezone = 'Australia/Sydney';
        $user1->mailformat = 0;
        $user1->description = '';
        $user1->city = '';
        $user1->country = 'AU';     //list of abrevations is in yourmoodle/lang/en/countries
        $preferencename1 = 'auth_forcepasswordchange';
        $user1->preferences = array(
            array('type' => $preferencename1, 'value' => '1')
        );

        $users = array($user1);
        $params = array('users' => $users);


        header('Content-Type: application/json');
        print json_encode($params, JSON_PRETTY_PRINT);



        $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $functionname;
        require_once('../msw/curl.php'); // You can put it in the top.
        $curl = new curl;
        $restformat = ($restformat == 'json') ? '&moodlewsrestformat=' . $restformat : '';
        $resp = $curl->post($serverurl . $restformat, $params);
        print_r($resp);
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}

function services_apply_surcharge($idiventa_as_servicio) {
    $surcharge = false;
    echo '<br>' . $today = date('Y-m-d');
    include './conexion.php';
    $sql = "SELECT
                venta_as_servicio.fecha_limite
                FROM
                venta_as_servicio
                WHERE venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<br>' . $fecha_limite = $row["fecha_limite"];
        }
    }
    $conn->close();
    if ($today > $fecha_limite) {
        $surcharge = true;
    } else {
        $surcharge = false;
    }

    return $surcharge;
}

function services_apply_discount($idiventa_as_servicio) {
    $discount = false;
    include './conexion.php';
    $sql = "SELECT
                servicios.apply_discount
                FROM
                venta_as_servicio
                INNER JOIN servicios ON venta_as_servicio.idiservicio = servicios.idiservicio
                WHERE
                venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $apply_discount = boolval($row["apply_discount"]);
        }
    }
    $conn->close();
    if ($apply_discount) {
        $discount = true;
    } else {
        $discount = false;
    }
    return $discount;
}

function service_cost($idiventa_as_servicio) {
    $cost = 0;
    include './conexion.php';
    $sql = "SELECT
                venta_as_servicio.precio
                FROM
                venta_as_servicio
                WHERE
                venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $cost = $row["precio"];
        }
    }
    return $cost;
    $conn->close();
}

function user_discount_rate($idiventa_as_servicio) {
    $discount_rate = 0;
    include './conexion.php';
    $sql = "SELECT
                alumno.beca_colegiatura
                FROM
                alumno
                INNER JOIN venta_as_servicio ON venta_as_servicio.idialumno = alumno.idialumno
                WHERE
                venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $discount_rate = $row["beca_colegiatura"];
        }
    }
    return $discount_rate;
    $conn->close();
}

function service_surcharge_percentage($idiventa_as_servicio) {
    $surcharge_percentage = 0;
    include './conexion.php';
    $sql = "SELECT
                venta_as_servicio.recargo
                FROM
                venta_as_servicio
                WHERE
                venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $surcharge_percentage = $row["recargo"];
        }
    }
    return $surcharge_percentage;
    $conn->close();
}

function getPaswwordTbuser() {
    header('Content-Type: application/json');
    include './conexion.php';
    $sql = "SELECT
            tbuser.`password`,
            tbuser.idiuser
            FROM
            tbuser
            ";
    $result = $conn->query($sql);
    $rows = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $rows['data'][] = $row;
            $idiuser = $row["idiuser"];
            $password = $row["password"];
            updatePasswordSha256($idiuser, $password);
        }
        print json_encode($rows, JSON_PRETTY_PRINT);
    } else {
        echo "0 results";
    }
    $conn->close();
}

function updatePasswordSha256($idiuser, $pdw_user) {
    include './conexion.php';
    $sql = "UPDATE tbuser SET `password`=sha2('$pdw_user',256) where idiuser=$idiuser;";
    $result = $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        echo "Record Updated successfully id:" . $idiuser;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

getPaswwordTbuser();
