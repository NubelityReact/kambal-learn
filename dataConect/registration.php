<?php

/**
 * Description of registro
 *
 * @author Ing. Bernabe Gutierrez Rodriguez
 */
class registro {

    public function __construct() {
        date_default_timezone_set('America/Mexico_City');
        error_reporting(0);
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET'://consulta             
                $action = $_GET['action'];
                if ($action == 'getOferta') {
                    $this->getOferta();
                }
                if ($action == 'getTurno') {
                    $this->getTurno();
                }
                if ($action == 'cMedioContacto') {
                    $this->cMedioContacto();
                }
                if ($action == 'getCampus') {
                    $this->getCampus();
                }
                if ($action == 'getCarrerasbyCampus') {
                    $this->getCarrerasbyCampus();
                }
                if ($action == 'getCarrerasID') {
                    $this->getCarrerasID();
                }
                if ($action == 'get_oferta_form_idicarrera') {
                    $this->get_oferta_form_idicarrera();
                }
                if ($action == 'getcarrerabyId') {
                    $this->getcarrerabyId();
                }
                if ($action == 'get_notifications_id') {
                    $this->get_notifications_id();
                }
                break;
            case 'POST'://inserta
                $action = $_POST['action'];
                $this->call_notification_event($action);

                if ($action == 'addDatosGenerales') {
                    $this->addDatosGenerales();
                }
                if ($action == 'forgotPassword') {
                    $this->forgotPassword();
                }
                if ($action == 'valid_token') {
                    $this->valid_token();
                }
                if ($action == 'updateidmoodle') {
                    $this->updateidmoodle();
                }
                if ($action == 'informe_aspirante') {
                    $this->informe_aspirante('Bernabe', 'integracion@focusonservices.com');
                }
                if ($action == 'informe_webinar') {
                    $this->informe_webinar('Bernabe', 'integracion@focusonservices.com');
                }
                break;
            case 'PUT':
                echo 'METODO NO SOPORTADO';
                break;
            case 'DELETE'://elimina
                echo 'METODO NO SOPORTADO';
                break;
            default://metodo NO soportado
                echo 'METODO NO SOPORTADO';
                break;
        }
    }

    function call_notification_event($action) {
        include_once './api_encrypt_password.php';
        $ency = new api_encrypt_password();
        //email
        if (empty($_POST["email"])) {
            $notifications_to = null;
        } else {
            $notifications_to = $_POST["email"];
        }
        //idinotification
        if (empty($_POST["idinotification"])) {
            $idinotification = null;
        } else {
            $idinotification = $_POST["idinotification"];
        }
        $ency->post_trigger_notification_target($action, $notifications_to, $idinotification);
    }

    function get_notifications_id() {
        $errorMSG = "";
        if (empty($_GET["idinotification"])) {
            $errorMSG .= 'idinotification is required ';
        } else {
            $idinotification = $_GET["idinotification"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    notifications.idinotification,
                    notifications.suspended,
                    notifications.deleted,
                    notifications.name,
                    notifications.description,
                    notifications.comments,
                    notifications.subject,
                    notifications.message,
                    notifications.sender_email,
                    notifications.sender_name,
                    notifications.created,
                    notifications.files_name
                    FROM
                    notifications
                    WHERE notifications.idinotification = $idinotification";
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

    function getTurno() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM cTurno WHERE Estatus = 1";
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

    function getCarrerasbyCampus() {
        $errorMSG = '';
        //idicampus
        if (empty($_GET["idicampus"])) {
            $errorMSG = "idicampus is required ";
        } else {
            $idicampus = $_GET["idicampus"];
        }

        if ($errorMSG == '') {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT 
                carrera.idicarrera,
                carrera.NivelId,
                carrera.idicampus,
                carrera.idinotification,
                carrera.deleted,
                carrera.suspended,
                carrera.nombre,
                carrera.description,
                carrera.comments,
                carrera.working_day,
                carrera.salary,
                carrera.message,
                carrera.available,
                carrera.rvoe,
                carrera.lms_course_id,
                carrera.files_name,
                carrera.deadline,
                carrera.last_update
                FROM carrera WHERE idicampus = $idicampus and deleted = 0 and suspended = 0";
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
            echo $errorMSG;
        }
    }

    function getCarrerasID() {
        $errorMSG = '';
        //idicampus
        if (empty($_GET["idicarrera"])) {
            $errorMSG = "idicarrera is required ";
        } else {
            $idicarrera = $_GET["idicarrera"];
        }

        if ($errorMSG == '') {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    carrera.idicarrera,
                    carrera.NivelId,
                    carrera.idicampus,
                    carrera.idinotification,
                    carrera.deleted,
                    carrera.suspended,
                    carrera.nombre,
                    carrera.description,
                    carrera.comments,
                    carrera.working_day,
                    carrera.salary,
                    carrera.message,
                    carrera.available,
                    carrera.rvoe,
                    carrera.numero_carrera,
                    carrera.lms_course_id,
                    carrera.files_name,
                    carrera.files_size,
                    carrera.files_type,
                    carrera.deadline,
                    carrera.clave,
                    carrera.last_update,
                    carrera.nivel,
                    carrera.categoria,
                    carrera.duracion,
                    cNiveles.Descripcion as nivel
                    FROM
                    carrera
                    INNER JOIN cNiveles ON carrera.NivelId = cNiveles.NivelId
                    WHERE 
                    carrera.idicarrera = $idicarrera";
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
            echo $errorMSG;
        }
    }

    /**
     * getOferta()
     * consulta la table de ccarrera
     */
    function getOferta() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                carrera.idicarrera,
                carrera.idicampus,
                carrera.numero_carrera,
                carrera.nivel,
                carrera.categoria,
                carrera.clave,
                carrera.nombre,
                carrera.rvoe,
                carrera.available,
                carrera.deadline,
                carrera.duracion,
                carrera.NivelId,
                carrera.deleted,
                carrera.suspended 
                FROM
                carrera 
                WHERE
                carrera.deleted = 0 
                AND carrera.suspended = 0 ";
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

    function cMedioContacto() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM cMedioContacto";
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

    function restore_password($idiusuario, $newPassword, $intentos) {
        include './conexion.php';
        $sql = "UPDATE tbuser 
            SET PASSWORD = sha2 ( '$newPassword', 256 ) 
            WHERE
            idiuser = $idiusuario;";
        $sql .= "UPDATE forgot_password SET valid = '0', intentos = intentos + 1 WHERE idigenerales = '$idiusuario';";
        if ($conn->multi_query($sql) === TRUE) {
            echo "success";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function valid_token() {
        $errorMSG = "";
        if (empty($_POST["org"])) {
            $errorMSG .= " org is required";
        } else {
            $org = $_POST["org"];
        }
        if (empty($_POST["token"])) {
            $errorMSG .= " token is required";
        } else {
            $token = $_POST["token"];
        }
        if (empty($_POST["idigenerales"])) {
            $errorMSG .= " idigenerales is required";
        } else {
            $idigenerales = $_POST["idigenerales"];
        }
        if (empty($_POST["clave"])) {
            $errorMSG .= " clave is required";
        } else {
            $clave = $_POST["clave"];
        }
        if (empty($_POST["repeat"])) {
            $errorMSG .= " repeat is required";
        } else {
            $repeat = $_POST["repeat"];
        }
        /**
         * verificar si el correo existe
         * si enviar link de recuperacion
         * no no hacer nada
         */
        if ($errorMSG == "") {
            if ($repeat == $clave) {
                $thisAlert = "";
                include './conexion.php';
                $sql = "SELECT idiforgot,valid,intentos,token,idigenerales,creacion,limite_min FROM forgot_password WHERE token = '$token'";
                $result = $conn->query($sql);
                $rows = array();
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $idiforgot = $row["idiforgot"];
                        $valid = $row["valid"];
                        $intentos = $row["intentos"];
                        $token = $row["token"];
                        $creacion = $row["creacion"];
                        $limite_min = $row["limite_min"];
                        $idigenerales = $row["idigenerales"];
                    }
                    /**
                     * validaciones
                     * que el token sea valido
                     * que el toque no haya expirado
                     */
                    if (boolval($valid)) {
                        $date = new DateTime($creacion);
                        $date->modify('+' . $limite_min . ' minute');
                        $expiracion = $date->format('d-m-Y H:i:s');
                        if ($expiracion > date('d-m-Y H:i:s')) {
                            $this->restore_password($idigenerales, $clave, $intentos);
                        } else {
                            $thisAlert = " El token que usted proporciono ya expiro! Comuníquese con el administrador del sitio.";
                        }
                    } else {
                        $thisAlert .= " El token que usted proporciono ya no es válido! Comuníquese con el administrador del sitio.";
                    }
                } else {
                    $thisAlert .= " El token que usted proporciono no existe! Comuníquese con el administrador del sitio.";
                }
                $conn->close();
                if ($thisAlert == '') {
                    //noting to do
                } else {
                    echo $thisAlert;
                }
            } else {
                echo 'Las Contraseñas deben coincidir';
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function forgotPassword() {
        $errorMSG = "";
        //g-recaptcha-response: 
        // if (empty($_POST["g-recaptcha-response"])) {
        //     $errorMSG = "";
        // } else {
        //     $recapcha = $_POST["g-recaptcha-response"];
        // }
        if (empty($_POST["correo"])) {
            $errorMSG = " correo is required";
        } else {
            $email = $_POST["correo"];
        }
        // if (empty($_POST["org"])) {
        //     $errorMSG .= " org is required";
        // } else {
        //     $org = $_POST["org"];
        // }
        /**
         * verificar si el correo existe
         * si enviar link de recuperacion
         * no no hacer nada
         */
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT
                    datos_generales.idigenerales,
                    datos_generales.estatus,
                    datos_generales.nombre,
                    datos_generales.apellido_paterno,
                    datos_generales.apellido_materno,
                    datos_generales.email
                    FROM
                    datos_generales
                     where datos_generales.email = '$email' LIMIT 1";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $idigenerales = $row["idigenerales"];
                    $nombre = $row["nombre"];
                }
                $this->sendEmailForgot($idigenerales, $email, $nombre, $org);
            } else {
                echo "La dirección de correo electrónico que usted proporciono no existe! Comuníquese con el administrador del sitio.";
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

    function getDeployment_folder() {
        include './conexion.php';
        $sql = "SELECT
            tbconfig.deployment_folder
            FROM
            tbconfig";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $deployment_folder = $row["deployment_folder"];
            }
            return $deployment_folder;
        }
        $conn->close();
    }

    function sendEmailForgot($idigenerales, $email, $fullname, $org) {
        $deployment_folder = $this->getDeployment_folder();
        $errorMSG = "";
        if ($errorMSG == "") {
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            // Token: special char
            $tkn = substr(str_shuffle($permitted_chars), 0, 10);
            $tknmd5 = md5($tkn);
            //email variables
            $from = 'kambal@focusonservices.com';
            $from_name = 'Kambal Learn';

            //attachment files path array
            $subject = 'Solicitud de restablecimiento de contraseña!';
            $html_content = "Hola $fullname.

Usted solicitó un restablecimiento de contraseña para su cuenta '$email'
en Kambal Learn

Para confirmar esta petición, y establecer una nueva contraseña para su
cuenta, por favor vaya a la siguiente dirección de Internet:
https://kambal.com.mx/$deployment_folder/forgot_password.php?org=$org&token=$tknmd5
(Este enlace es válido durante  30 minutos desde el momento en que hizo la
solicitud por primera vez .

Si usted no ha solicitado este restablecimiento de contraseña, no necesita
realizar ninguna acción.

Si necesita ayuda, por favor póngase en contacto con el administrador del
sitio.";

            include_once './api_encrypt_password.php';
            $objs = new api_encrypt_password();
            $send_email = $objs->multi_attach_mail($email, $subject, $html_content, null, null, null, null);
            //print message after email sent
            if ($send_email) {
                include './conexion.php';
                $sql = "INSERT INTO forgot_password (idigenerales, token) VALUES ('$idigenerales', '$tknmd5')";
                if ($conn->query($sql) === TRUE) {
                    echo 'success';
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            } else {
                echo "No se pudo enviar el correo!";
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * añade un registro a la tabla de datos_generales
     * created by bennderodriguez
     */
    function addDatosGenerales() {
        $errorMSG = "";
        //estatus
        $estatus = "pre-inscrito";
        //post input string nombre
        if (empty($_POST["nombre"])) {
            $errorMSG .= "nombre is required ";
        } else {
            $nombre = $_POST["nombre"];
        }
        //post input string apellido_paterno
        if (empty($_POST["apellido_paterno"])) {
            $apellido_paterno = null;
        } else {
            $apellido_paterno = $_POST["apellido_paterno"];
        }
        //post input string apellido_materno
        if (empty($_POST["apellido_materno"])) {
            $apellido_materno = null;
        } else {
            $apellido_materno = $_POST["apellido_materno"];
        }
        //post input string estado_civil
        if (empty($_POST["estado_civil"])) {
            $estado_civil = 'Sin especificar';
        } else {
            $estado_civil = $_POST["estado_civil"];
        }
        //post input string genero
        if (empty($_POST["genero"])) {
            $genero = 'Sin especificar';
        } else {
            $genero = $_POST["genero"];
        }
        //post input string edad
        if (empty($_POST["edad"])) {
            $edad = '18';
        } else {
            $edad = $_POST["edad"];
        }
        //post input string curp
        if (empty($_POST["curp"])) {
            $curp = null;
        } else {
            $curp = $_POST["curp"];
        }
        //post input string rfc
        if (empty($_POST["rfc"])) {
            $rfc = null;
        } else {
            $rfc = $_POST["rfc"];
        }
        //post input string nss
        if (empty($_POST["nss"])) {
            $nss = null;
        } else {
            $nss = $_POST["nss"];
        }
        //post input string email
        if (empty($_POST["email"])) {
            $errorMSG .= "email is required ";
        } else {
            $email = $_POST["email"];
        }
        //post input string telefono
        if (empty($_POST["telefono"])) {
            $telefono = null;
        } else {
            $telefono = $_POST["telefono"];
        }
        //post input string movil
        if (empty($_POST["movil"])) {
            $movil = null;
        } else {
            $movil = $_POST["movil"];
        }
        //post input string email2
        if (empty($_POST["email2"])) {
            $email2 = null;
        } else {
            $email2 = $_POST["email2"];
        }
        //post input string pais
        if (empty($_POST["pais"])) {
            $pais = null;
        } else {
            $pais = $_POST["pais"];
        }
        //post input string ciudad
        if (empty($_POST["ciudad"])) {
            $ciudad = null;
        } else {
            $ciudad = $_POST["ciudad"];
        }
        //post input string direccion
        if (empty($_POST["direccion"])) {
            $direccion = null;
        } else {
            $direccion = $_POST["direccion"];
        }
        //post input string municipio
        if (empty($_POST["municipio"])) {
            $municipio = null;
        } else {
            $municipio = $_POST["municipio"];
        }
        //post input string cp
        if (empty($_POST["cp"])) {
            $cp = null;
        } else {
            $cp = $_POST["cp"];
        }
        //post input string escegreso
        if (empty($_POST["escegreso"])) {
            $escegreso = null;
        } else {
            $escegreso = $_POST["escegreso"];
        }
        //post input string nivelegreso
        if (empty($_POST["nivelegreso"])) {
            $nivelegreso = null;
        } else {
            $nivelegreso = $_POST["nivelegreso"];
        }
        //post input string entidad_fed
        if (empty($_POST["entidad_fed"])) {
            $entidad_fed = null;
        } else {
            $entidad_fed = $_POST["entidad_fed"];
        }
        //post input string fecha_inicio
        if (empty($_POST["fecha_inicio"])) {
            $fecha_inicio = null;
        } else {
            $fecha_inicio = $_POST["fecha_inicio"];
        }
        //post input string fechaegreso
        if (empty($_POST["fechaegreso"])) {
            $fechaegreso = null;
        } else {
            $fechaegreso = $_POST["fechaegreso"];
        }
        //post input string infoadicional
        if (empty($_POST["infoadicional"])) {
            $infoadicional = null;
        } else {
            $infoadicional = $_POST["infoadicional"];
        }
        //post input string tiposangre
        if (empty($_POST["tiposangre"])) {
            $tiposangre = '';
        } else {
            $tiposangre = $_POST["tiposangre"];
        }
        //post input string alergias
        if (empty($_POST["alergias"])) {
            $alergias = null;
        } else {
            $alergias = $_POST["alergias"];
        }
        //post input string fecha_nacimiento
        if (empty($_POST["fecha_nacimiento"])) {
            $fecha_nacimiento = null;
        } else {
            $fecha_nacimiento = $_POST["fecha_nacimiento"];
        }
        //post input string lugar_nacimiento
        if (empty($_POST["lugar_nacimiento"])) {
            $lugar_nacimiento = null;
        } else {
            $lugar_nacimiento = $_POST["lugar_nacimiento"];
        }
        //post input string interes
        if (empty($_POST["interes"])) {
            $interes = null;
        } else {
            $interes = $_POST["interes"];
        }
        //post input string emergencias
        if (empty($_POST["emergencias"])) {
            $emergencias = null;
        } else {
            $emergencias = $_POST["emergencias"];
        }
        //idicampus
        if (empty($_POST["idicampus"])) {
            $idicampus = "1";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        //emergencias
        if (empty($_POST["idimedio"])) {
            $idimedio = "1";
        } else {
            $idimedio = $_POST["idimedio"];
        }
        //tipo_registro
        if (empty($_POST["tipo_registro"])) {
            $tipo_registro = "interesado";
        } else {
            $tipo_registro = $_POST["tipo_registro"];
        }
        //medio_contacto
        if (empty($_POST["medio_contacto"])) {
            $medio_contacto = "1";
        } else {
            $medio_contacto = $_POST["medio_contacto"];
        }
        //comentarios
        if (empty($_POST["comentarios"])) {
            $comentarios = null;
        } else {
            $comentarios = $_POST["comentarios"];
        }
        //g-recaptcha-response: 
        // if (empty($_POST["g-recaptcha-response"])) {
        //     $errorMSG .= "Marque la casilla del recaptcha";
        // } else {
        //     $recapcha = $_POST["g-recaptcha-response"];
        // }
        //post input string query_action
        if (empty($_POST["query_action"])) {
            $errorMSG .= "query_action is required ";
        } else {
            $query_action = $_POST["query_action"];
        }

        // run query
        if ($errorMSG == "") {
            if ($query_action == 'insert') {
                include "./conexion.php";
                $sql = "INSERT INTO datos_generales (estatus, idimedio, nombre, apellido_paterno, apellido_materno, estado_civil, genero, edad, curp, rfc, nss, email, telefono, movil, email2, pais, ciudad, direccion, municipio, cp, escegreso, nivelegreso, entidad_fed, fecha_inicio, fechaegreso, infoadicional, tiposangre, alergias, fecha_nacimiento, interes, emergencias) 
                    VALUES ('$estatus','$idimedio','$nombre', '$apellido_paterno', '$apellido_materno', '$estado_civil', '$genero', '$edad', '$curp', '$rfc', '$nss', '$email', '$telefono', '$movil', '$email2', '$pais', '$ciudad', '$direccion', '$municipio', '$cp', '$escegreso', '$nivelegreso', '$entidad_fed', '$fecha_inicio', '$fechaegreso', '$infoadicional', '$tiposangre', '$alergias', '$fecha_nacimiento', '$interes', '$emergencias');";
                if ($conn->query($sql) === TRUE) {
                    $idigenerales = $conn->insert_id;
                    $this->setDataRegistro($idigenerales, $tipo_registro, $medio_contacto, $comentarios, $idicampus);
                    //$this->addAlumno($idigenerales);
                } else {
                    echo "Error: " . $conn->error;
                }
                $conn->close();
            }
            if ($query_action == 'update') {
                //post input string idigenerales
                if (empty($_POST["idigenerales"])) {
                    $errorMSG = "idigenerales is required ";
                } else {
                    $idigenerales = $_POST["idigenerales"];
                }
                if ($errorMSG == "") {
                    include "./conexion.php";
                    $sql = "UPDATE datos_generales SET estatus = '$estatus', idimedio = '$idimedio', nombre = '$nombre', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', estado_civil = '$estado_civil', genero = '$genero', edad = '$edad', curp = '$curp', rfc = '$rfc', nss = '$nss', email = '$email', telefono = '$telefono', movil = '$movil', email2 = '$email2', pais = '$pais', ciudad = '$ciudad', direccion = '$direccion', municipio = '$municipio', cp = '$cp', escegreso = '$escegreso', nivelegreso = '$nivelegreso', entidad_fed = '$entidad_fed', fecha_inicio = '$fecha_inicio', fechaegreso = '$fechaegreso', infoadicional = '$infoadicional', tiposangre = '$tiposangre', alergias = '$alergias', fecha_nacimiento = '$fecha_nacimiento', interes = '$interes', emergencias = '$emergencias' WHERE idigenerales = '$idigenerales';";
                    if ($conn->query($sql) === TRUE) {
                        $idigenerales = $conn->insert_id;
                        $this->setDataRegistro($idigenerales, $tipo_registro, $medio_contacto, $comentarios, $idicampus);
                        //$this->addAlumno($idigenerales);
                    } else {
                        echo "Error: " . $conn->error;
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
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addDatosGenerales2() {
        $errorMSG = "";
        //estatus
        $estatus = "pre-inscrito";
        //nombre
        if (empty($_POST["nombre"])) {
            $errorMSG = "nombre is required ";
        } else {
            $nombre = ucfirst($_POST["nombre"]);
        }
        //apellidos
        if (empty($_POST["apellido_paterno"])) {
            $errorMSG .= "apellido_paterno is required ";
        } else {
            $apellido_paterno = ucfirst($_POST["apellido_paterno"]);
        }
        if (empty($_POST["apellido_materno"])) {
            $apellido_materno = "";
        } else {
            $apellido_materno = ucfirst($_POST["apellido_materno"]);
        }
        //genero
        if (empty($_POST["genero"])) {
            $genero = 'Sin especificar';
        } else {
            $genero = $_POST["genero"];
        }
        //edad
        if (empty($_POST["edad"])) {
            $edad = null;
        } else {
            $edad = $_POST["edad"];
        }
        //curp
        if (empty($_POST["curp"])) {
            $curp = null;
        } else {
            $curp = strtoupper($_POST["curp"]);
        }
        //rfc
        if (empty($_POST["rfc"])) {
            $rfc = null;
        } else {
            $rfc = $_POST["rfc"];
        }
        //nss
        if (empty($_POST["nss"])) {
            $nss = null;
        } else {
            $nss = $_POST["nss"];
        }
        //email
        if (empty($_POST["email"])) {
            $errorMSG .= 'email is required';
        } else {
            $email = $_POST["email"];
        }
        //telefono
        if (empty($_POST["telefono"])) {
            $telefono = null;
        } else {
            $telefono = $_POST["telefono"];
        }
        //movil
        if (empty($_POST["movil"])) {
            $movil = null;
        } else {
            $movil = $_POST["movil"];
        }
        //email2
        if (empty($_POST["email2"])) {
            $email2 = null;
        } else {
            $email2 = $_POST["email2"];
        }
        //pais
        if (empty($_POST["pais"])) {
            $pais = null;
        } else {
            $pais = $_POST["pais"];
        }
        //ciudad
        if (empty($_POST["ciudad"])) {
            $ciudad = null;
        } else {
            $ciudad = $_POST["ciudad"];
        }
        //direccion
        if (empty($_POST["direccion"])) {
            $direccion = null;
        } else {
            $direccion = $_POST["direccion"];
        }
        //num
        if (empty($_POST["num"])) {
            $num = null;
        } else {
            $num = "#" . $_POST["num"] . " ";
        }
        //municipio
        if (empty($_POST["municipio"])) {
            $municipio = null;
        } else {
            $municipio = $_POST["municipio"];
        }
        //cp
        if (empty($_POST["cp"])) {
            $cp = null;
        } else {
            $cp = $_POST["cp"];
        }
        //escegreso
        if (empty($_POST["escegreso"])) {
            $escegreso = null;
        } else {
            $escegreso = $_POST["escegreso"];
        }
        //nivelegreso
        if (empty($_POST["nivelegreso"])) {
            $nivelegreso = null;
        } else {
            $nivelegreso = $_POST["nivelegreso"];
        }
        //fechaegreso
        if (empty($_POST["fechaegreso"])) {
            $fechaegreso = null;
        } else {
            $fechaegreso = $_POST["fechaegreso"];
        }
        //infoadicional
        if (empty($_POST["infoadicional"])) {
            $infoadicional = null;
        } else {
            $infoadicional = $_POST["infoadicional"];
        }
        //tiposangre
        if (empty($_POST["tiposangre"])) {
            $tiposangre = null;
        } else {
            $tiposangre = $_POST["tiposangre"];
        }
        //alergias
        if (empty($_POST["alergias"])) {
            $alergias = null;
        } else {
            $alergias = $_POST["alergias"];
        }
        //fecha_nacimiento
        if (empty($_POST["fecha_nacimiento"])) {
            $fecha_nacimiento = null;
        } else {
            $fecha_nacimiento = $_POST["fecha_nacimiento"];
        }
        //interes
        if (empty($_POST["interes"])) {
            $interes = null;
        } else {
            $interes = $_POST["interes"];
        }
        //turno
        if (empty($_POST["turno"])) {
            $turno = null;
        } else {
            $turno = $_POST["turno"];
        }
        //emergencias
        if (empty($_POST["emergencias"])) {
            $emergencias = null;
        } else {
            $emergencias = $_POST["emergencias"];
        }
        //idicampus
        if (empty($_POST["idicampus"])) {
            $idicampus = "1";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        //emergencias
        if (empty($_POST["idimedio"])) {
            $idimedio = "1";
        } else {
            $idimedio = $_POST["idimedio"];
        }

        //tipo_registro
        if (empty($_POST["tipo_registro"])) {
            $tipo_registro = "interesado";
        } else {
            $tipo_registro = $_POST["tipo_registro"];
        }
        //medio_contacto
        if (empty($_POST["medio_contacto"])) {
            $medio_contacto = "1";
        } else {
            $medio_contacto = $_POST["medio_contacto"];
        }
        //comentarios
        if (empty($_POST["comentarios"])) {
            $comentarios = null;
        } else {
            $comentarios = $_POST["comentarios"];
        }

        //g-recaptcha-response: 
        // if (empty($_POST["g-recaptcha-response"])) {
        //     $errorMSG .= "Marque la casilla del recaptcha";
        // } else {
        //     $recapcha = $_POST["g-recaptcha-response"];
        // }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO datos_generales (estatus, nombre, apellido_paterno, apellido_materno, genero, edad, curp, rfc, nss, email, telefono, movil, email2, pais, ciudad, direccion, municipio, cp, escegreso, nivelegreso, fechaegreso, infoadicional, tiposangre, alergias, fecha_nacimiento, interes, turno, emergencias, idimedio) VALUES "
                    . "('$estatus', '" . ucfirst($nombre) . "', '" . ucfirst($apellido_paterno) . "', '" . ucfirst($apellido_materno) . "','$genero', '$edad', '$curp', '$rfc', '$nss','" . strtolower($email) . "', '$telefono', '$movil', '$email2', '$pais', '$ciudad', '" . $num . $direccion . "', '$municipio', '$cp', '$escegreso', '$nivelegreso', '$fechaegreso', '$infoadicional', '$tiposangre', '$alergias', '$fecha_nacimiento','$interes','$turno', '$emergencias', '$idimedio');";
            if ($conn->query($sql) === TRUE) {
                //echo "success";
                $idigenerales = $conn->insert_id;
                $this->setDataRegistro($idigenerales, $tipo_registro, $medio_contacto, $comentarios, $idicampus);
                $this->addAlumno($idigenerales);
            } else {
                echo "AVISO: Tus datos ya existen en nuestra Base de Datos, espera a que te contactemos. " . $conn->error;
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

    //Crea un alumno de nuevo ingreso
    function addAlumno($idigenerales) {
        $errorMSG = "";
        //idicampus
        if (empty($_POST["idicampus"])) {
            $errorMSG .= "idicampus is required ";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        //idicarrera
        if (empty($_POST["idicarrera"])) {
            $errorMSG .= "idicarrera is required ";
        } else {
            $idicarrera = $_POST["idicarrera"];
        }
        //carrera
        if (empty($_POST["interes"])) {
            $carrera = 'Vacancy';
        } else {
            $carrera = $_POST["interes"];
        }
        if (empty($_POST["periodo"])) {
            $periodo = '2020-1M';
        } else {
            $periodo = $_POST["periodo"];
        }
        //turno
        if (empty($_POST["turno"])) {
            $turno = '-';
        } else {
            $turno = $_POST["turno"];
        }
        //codigo_credencial
        if (empty($_POST["codigo_credencial"])) {
            $codigo_credencial = "";
        } else {
            $codigo_credencial = $_POST["codigo_credencial"];
        }
        if (empty($_POST["image"])) {
            //$errorMSG = "Capture la foto del estudiante! ";
            $img = null;
            $var = false;
        } else {
            $img = $_POST["image"];
        }
        //idiCarrera
        if (empty($_POST["idicarrera"])) {//Numero de carrera
            $errorMSG .= "idicarrera is required ";
        } else {
            $idiCarrera = $_POST["idicarrera"];
        }
        //moodle
        if (empty($_POST["moodle"])) {
            $moodle = "no";
        } else {
            $moodle = $_POST["moodle"];
        }
        //beca_colegiatura
        if (empty($_POST["beca_colegiatura"])) {
            $beca_colegiatura = "0";
        } else {
            $beca_colegiatura = $_POST["beca_colegiatura"];
        }
        //idiplan
        if (empty($_POST["idiplan"])) {
            $idiplan = '0';
        } else {
            $idiplan = $_POST["idiplan"];
        }
        //email
        if (empty($_POST["email"])) {
            $errorMSG .= "email is required ";
        } else {
            $matricula = $_POST["email"];
        }

        if ($errorMSG == "") {


            include './conexion.php';
            $sql = "INSERT INTO alumno (idicampus, idicarrera, carrera, idigenerales, matricula, generacion, turno) VALUES "
                    . "( '$idicampus' ,'$idicarrera ', '$carrera', '$idigenerales', '$matricula', '$periodo', '$turno');";

            if ($conn->multi_query($sql) === TRUE) {
                $last_id = $conn->insert_id; // devuelve el id de registro
                $this->UpdateEstatusGeneral($idigenerales, $matricula); //actualiza el estatus a Inscrito en la table de Datos Generales
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

    function setDataRegistro($idigenerales, $tipo_registro, $medio_contacto, $comentarios, $idicampus) {
        $errorMSG = "";
        //estatus
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE tbregistro_generales SET tipo_registro = '$tipo_registro', medio_contacto = '$medio_contacto', comentarios = '$comentarios', idicampus= '$idicampus' WHERE idigenerales = '$idigenerales'";
            if ($conn->query($sql) === TRUE) {
                $aspirante = array(
                    'valid' => 'success',
                    'idigenerales' => $idigenerales,
                );
                header('Content-Type: application/json');
                print json_encode($aspirante, JSON_PRETTY_PRINT);
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

    function getCampus() {
        $errorMSG = "";
// redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM campus where deleted = 0 and suspended = 0;";
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
     * Actualiza el campus de cedula almacenando el id de moodel del usuario almacenado
     * @returns {undefined}
     */
    function updateidmoodle() {
        $errorMSG = "";
        if (empty($_POST["id"])) {
            $errorMSG .= " id is required";
        } else {
            $id = $_POST["id"];
        }
        if (empty($_POST["idigenerales"])) {
            $errorMSG .= " idigenerales is required";
        } else {
            $idigenerales = $_POST["idigenerales"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE datos_generales SET cedula = $id WHERE idigenerales = $idigenerales";
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

    //Actualiza el estatus de una persona de Pre-Inscrito a Inscrito
    function UpdateEstatusGeneral($idigeneral, $matricula) {
        include './conexion.php';
        $sql = "UPDATE datos_generales SET estatus = 'Inscrito' WHERE datos_generales.idigenerales = " . $idigeneral . ";";
        $sql .= "UPDATE tbuser SET user = '$matricula' WHERE idigenerales = $idigenerales ;";
        if ($conn->multi_query($sql) === TRUE) {
            //echo "Estatus Updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function get_oferta_form_idicarrera() {
        $errorMSG = "";
        if (empty($_GET["idicarrera"])) {
            $errorMSG .= 'idicarrera is required ';
        } else {
            $idicarrera = $_GET["idicarrera"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    oferta_form.idioferta,
                    oferta_form.idicarrera,
                    oferta_form.idiform,
                    carrera.nombre,
                    form_datos_generales.`name`,
                    form_datos_generales.category,
                    form_datos_generales.description
                    FROM
                    oferta_form
                    INNER JOIN carrera ON oferta_form.idicarrera = carrera.idicarrera
                    INNER JOIN form_datos_generales ON oferta_form.idiform = form_datos_generales.idiform
                    WHERE
                    oferta_form.idicarrera = $idicarrera
                    ORDER BY
                    oferta_form.idiform ASC";
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

    function getcarrerabyId() {//se anexo por la eliminacion de la tabla cCarreras
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["idicarrera"])) {
            $errorMSG .= "idicarrera is required ";
        } else {
            $idicarrera = $_GET["idicarrera"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    carrera.idicarrera,
                    carrera.NivelId,
                    carrera.idinotification,
                    carrera.idicampus,
                    carrera.deleted,
                    carrera.suspended,
                    carrera.nombre,
                    carrera.description,
                    carrera.comments,
                    carrera.working_day,
                    carrera.salary,
                    carrera.message,
                    carrera.available,
                    carrera.lms_course_id,
                    carrera.rvoe,
                    carrera.files_name,
                    carrera.deadline,
                    carrera.last_update,
                    campus.campus,
                    cNiveles.Descripcion as nivel
                    FROM
                    carrera
                    INNER JOIN campus ON carrera.idicampus = campus.idicampus
                    INNER JOIN cNiveles ON cNiveles.idicampus = campus.idicampus 
                    AND carrera.NivelId = cNiveles.NivelId 
                    WHERE
                    carrera.deleted = 0 and 
                    carrera.idicarrera = '$idicarrera'";
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

}

$api = new registro();

