<?php

/**
 * 1: valida y busca los datos de la organizacion
 * 2: valida el acceso del usuario en la db de la organizacion
 * 3: carga variables de entorno si access true
 */
$errorMSG = "";
//ORG
if (empty($_POST["org"])) {
    $errorMSG .= "org is required ";
} else {
    $org = $_POST["org"];
}

if ($errorMSG == "") {
    include '../dataConect/kambal.php';
    $sql = "SELECT idiorganization, dbusername, dbpassword, dbname, privatekey, servername  from organization where shortname = '$org'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            $idiorganization = $row["idiorganization"];
            $dbusername = $row["dbusername"];
            $dbpassword = $row["dbpassword"];
            $dbname = $row["dbname"];
            $privatekey = $row["privatekey"];
            $servername = $row["servername"];
        }
        access($idiorganization, $servername, $dbusername, $dbpassword, $dbname, $privatekey);
    } else {
        print_r("su organización no existe en Kambal!");
    }
    $conn->close();
} else {
    if ($errorMSG == "") {
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

//Select Data From a MySQL Database to ORG
function access($idiorganization, $servername, $dbusername, $dbpassword, $dbname, $privatekey) {
    $errorMSG = "";
    //Nombre
    if (empty($_POST["usuario"])) {
        $errorMSG .= "usuario is required ";
    } else {
        $usuario = trim($_POST["usuario"]);
    }
    //Nombre
    if (empty($_POST["Password"])) {
        $errorMSG .= "Password is required ";
    } else {
        $Password = set_password_hash($_POST["Password"]);
    }

    if ($errorMSG == "") {
        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        mysqli_query($conn, "SET CHARACTER SET 'utf8'");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT
                tbuser.idiuser,
                tbuser.idigenerales,
                tbuser.idiconfig,
                tbuser.idirole,
                tbuser.user,
                tbuser.estatus,
                tbuser.categoria,
                datos_generales.nombre,
                datos_generales.apellido_paterno,
                datos_generales.apellido_materno,
                datos_generales.email,
                role.role,
                role.edit,
                tbconfig.idifactura,
                tbconfig.fullname,
                tbconfig.shortname,
                tbconfig.website,
                tbconfig.lms_token,
                tbconfig.lms_domainname,
                tbconfig.summary,
                tbconfig.frontpageimage,
                tbconfig.frontpagecolor,
                tbconfig.theme,
                tbconfig.sessiontimeout,
                tbconfig.forcetimezone,
                tbconfig.country,
                tbconfig.defaultcity,
                tbconfig.lang,
                tbuser.force_change_password 
                FROM
                tbuser
                INNER JOIN datos_generales ON tbuser.idigenerales = datos_generales.idigenerales
                INNER JOIN role ON tbuser.idirole = role.idirole
                INNER JOIN tbconfig ON tbuser.idiconfig = tbconfig.idiconfig 
                WHERE
                tbuser.user = '$usuario' 
                AND tbuser.password = '$Password' 
                AND tbuser.estatus = 'Activo'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            header('Content-Type: text/html; charset=utf-8');
            // output data of each row
            session_start();
            //Load vars session  
            $_SESSION['loggedin'] = true;
            $_SESSION['start'] = time();
            $_SESSION['idiorganization'] = $idiorganization;
            while ($row = $result->fetch_assoc()) {
                $_SESSION['idiuser'] = $row["idiuser"];
                $_SESSION['idigenerales'] = $row["idigenerales"];
                $_SESSION['idiconfig'] = $row["idiconfig"];
                $_SESSION['idirole'] = $row["idirole"];
                $_SESSION['categoria'] = $row["categoria"];
                $_SESSION['force_change_password'] = $row["force_change_password"];
                $_SESSION['fullname'] = $row["fullname"];
                $_SESSION['shortname'] = $row["shortname"];
                $_SESSION['summary'] = $row["summary"];
                $_SESSION['website'] = $row["website"];
                $_SESSION['lms_token'] = $row["lms_token"];
                $_SESSION['lms_domainname'] = $row["lms_domainname"];
                $_SESSION['summary'] = $row["summary"];
                $_SESSION['frontpageimage'] = $row["frontpageimage"];
                $_SESSION['frontpagecolor'] = $row["frontpagecolor"];
                $_SESSION['theme'] = $row["theme"];
                $_SESSION['sessiontimeout'] = $row["sessiontimeout"];
                $_SESSION['forcetimezone'] = $row["forcetimezone"];
                $_SESSION['country'] = $row["country"];
                $_SESSION['lang'] = $row["lang"];
                $_SESSION['email'] = $row["email"];
                $_SESSION['edit'] = $row["edit"];
                $_SESSION['role'] = $row["role"];
                $_SESSION['nombre'] = $row["nombre"] . ' ' . $row["apellido_paterno"] . ' ' . $row["apellido_materno"];
            }

            //Set Coockie idiorg
            $cookie_idiorganization = "_org";
            $cookie_user_value = $idiorganization;
            setcookie($cookie_idiorganization, $cookie_user_value, time() + (60 * $_SESSION['sessiontimeout']), "/"); // 86400 = 1 day

            $_SESSION['expire'] = $_SESSION['start'] + (60 * $_SESSION['sessiontimeout']);
            $userid = $_SESSION['idiuser'];
            print_r("success");
        } else {
            print_r("Datos Incorrectos");
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

function clean_string($string) {
    $s = trim($string);
    $s = iconv("UTF-8", "UTF-8//IGNORE", $s); // drop all non utf-8 characters
    // this is some bad utf-8 byte sequence that makes mysql complain - control and formatting i think
    $s = preg_replace('/(?>[\x00-\x1F]|\xC2[\x80-\x9F]|\xE2[\x80-\x8F]{2}|\xE2\x80[\xA4-\xA8]|\xE2\x81[\x9F-\xAF])/', ' ', $s);
    $s = preg_replace('/\s+/', ' ', $s); // reduce all multiple whitespace to a single space
    return $s;
}

function getPermisionsHasRole($idirole) {
    include '../dataConect/conexion.php';
    $sql = "SELECT
            role_as_permiso.idirol_permiso,
            role.role,
            role.idirole,
            permiso.idipermiso,
            permiso.descripcion,
            permiso.permiso,
            permiso.categoria,
            permiso.resumen,
            permiso.btnBack,
            permiso.showInMenu,
            permiso.icon,
            permiso.icon_color
            FROM
            role_as_permiso
            INNER JOIN role ON role_as_permiso.idirole = role.idirole
            INNER JOIN permiso ON role_as_permiso.idipermiso = permiso.idipermiso
            WHERE
            role.idirole = $idirole";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows['data'][] = $row;
        }
        return $rows;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function bitacoraAcceso($userid) {
    include '../dataConect/conexion.php';
    $adress = getUserIP();
    $sql = "INSERT INTO tbBitacoraAcceso (idiusuario, adress) VALUES ('$userid', '$adress')";
    if ($conn->query($sql) === TRUE) {
        //echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function xss($data) {
    $data = htmlspecialchars(addslashes(stripslashes(strip_tags(trim($data)))));
    return $data;
}

// Function to get the user IP address
function getUserIP() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function set_password_hash($plaintext_password) {
    $errorMSG = '';
    $pswd_hash = null;
//plaintext_password 
    if (empty($plaintext_password)) {
        $errorMSG = 'Password is required';
    }
// redirect to success page
    if ($errorMSG == '') {
        $pswd_hash = hash('sha256', $plaintext_password);
        return $pswd_hash;
    } else {
        if ($errorMSG == "") {
            echo "Something went wrong :(";
            return $pswd_hash;
        } else {
            echo $errorMSG;
            return $pswd_hash;
        }
    }
}
