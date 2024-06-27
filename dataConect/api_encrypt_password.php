<?php

/**
 * @author Ing. Bernabe Gutierrez Rodriguez
 */
class api_encrypt_password {

    public $idiconfig;
    public $idifactura;
    public $fullname;
    public $shortname;
    public $summary;
    public $clave_instituto;
    public $website;
    public $lms_token;
    public $lms_domainname;
    public $frontpageimage;
    public $frontpagecolor;
    public $theme;
    public $sessiontimeout;
    public $forcetimezone;
    public $country;
    public $defaultcity;
    public $lang;
    public $fecha;
    public $id;
    public $rfc;
    public $Nombre;
    public $persona;
    public $Calle;
    public $NoExterior;
    public $NoInterior;
    public $Colonia;
    public $Localidad;
    public $Referencia;
    public $Municipio;
    public $estado;
    public $pais;
    public $cp;
    public $regimen_fiscal;
    public $banco;
    public $NoCuenta;
    public $ClaveInterbancaria;
    public $Telefono;
    public $Estatus;
    public $esPruebas;
    public $Email;
    public $deployment_folder;

    function getIdiconfig() {
        return $this->idiconfig;
    }

    function getIdifactura() {
        return $this->idifactura;
    }

    function getFullname() {
        return $this->fullname;
    }

    function getShortname() {
        return $this->shortname;
    }

    function getSummary() {
        return $this->summary;
    }

    function getClave_instituto() {
        return $this->clave_instituto;
    }

    function getWebsite() {
        return $this->website;
    }

    function getLms_token() {
        return $this->lms_token;
    }

    function getLms_domainname() {
        return $this->lms_domainname;
    }

    function getFrontpageimage() {
        return $this->frontpageimage;
    }

    function getFrontpagecolor() {
        return $this->frontpagecolor;
    }

    function getTheme() {
        return $this->theme;
    }

    function getSessiontimeout() {
        return $this->sessiontimeout;
    }

    function getForcetimezone() {
        return $this->forcetimezone;
    }

    function getCountry() {
        return $this->country;
    }

    function getDefaultcity() {
        return $this->defaultcity;
    }

    function getLang() {
        return $this->lang;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getId() {
        return $this->id;
    }

    function getRfc() {
        return $this->rfc;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getPersona() {
        return $this->persona;
    }

    function getCalle() {
        return $this->Calle;
    }

    function getNoExterior() {
        return $this->NoExterior;
    }

    function getNoInterior() {
        return $this->NoInterior;
    }

    function getColonia() {
        return $this->Colonia;
    }

    function getLocalidad() {
        return $this->Localidad;
    }

    function getReferencia() {
        return $this->Referencia;
    }

    function getMunicipio() {
        return $this->Municipio;
    }

    function getEstado() {
        return $this->estado;
    }

    function getPais() {
        return $this->pais;
    }

    function getCp() {
        return $this->cp;
    }

    function getRegimen_fiscal() {
        return $this->regimen_fiscal;
    }

    function getBanco() {
        return $this->banco;
    }

    function getNoCuenta() {
        return $this->NoCuenta;
    }

    function getClaveInterbancaria() {
        return $this->ClaveInterbancaria;
    }

    function getTelefono() {
        return $this->Telefono;
    }

    function getEstatus() {
        return $this->Estatus;
    }

    function getEsPruebas() {
        return $this->esPruebas;
    }

    function getEmail() {
        return $this->Email;
    }

    function getDeployment_folder() {
        return $this->deployment_folder;
    }

    public function __construct() {
        error_reporting(0);
        $this->get_config_kambal();
    }

    /**
     * get_config_kambal
     * @return type $json_config_kambal
     */
    public function get_config_kambal() {
        include './conexion.php';
        $sql = "SELECT
                tbconfig.idiconfig,
                tbconfig.idifactura,
                tbconfig.fullname,
                tbconfig.shortname,
                tbconfig.summary,
                tbconfig.clave_instituto,
                tbconfig.website,
                tbconfig.lms_token,
                tbconfig.lms_domainname,
                tbconfig.frontpageimage,
                tbconfig.frontpagecolor,
                tbconfig.theme,
                tbconfig.sessiontimeout,
                tbconfig.forcetimezone,
                tbconfig.country,
                tbconfig.defaultcity,
                tbconfig.lang,
                tbconfig.fecha,
                factura_emisor.id,
                factura_emisor.rfc,
                factura_emisor.Nombre,
                factura_emisor.persona,
                factura_emisor.Calle,
                factura_emisor.NoExterior,
                factura_emisor.NoInterior,
                factura_emisor.Colonia,
                factura_emisor.Localidad,
                factura_emisor.Referencia,
                factura_emisor.Municipio,
                factura_emisor.estado,
                factura_emisor.pais,
                factura_emisor.cp,
                factura_emisor.regimen_fiscal,
                factura_emisor.banco,
                factura_emisor.NoCuenta,
                factura_emisor.ClaveInterbancaria,
                factura_emisor.Telefono,
                factura_emisor.Estatus,
                factura_emisor.esPruebas,
                factura_emisor.Email,
                tbconfig.deployment_folder
                FROM
                tbconfig
                INNER JOIN factura_emisor ON tbconfig.idifactura = factura_emisor.id
                WHERE
                tbconfig.idifactura = factura_emisor.id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $idiconfig = $row["idiconfig"];
                $idifactura = $row["idifactura"];
                $fullname = $row["fullname"];
                $shortname = $row["shortname"];
                $summary = $row["summary"];
                $clave_instituto = $row["clave_instituto"];
                $website = $row["website"];
                $lms_token = $row["lms_token"];
                $lms_domainname = $row["lms_domainname"];
                $frontpageimage = $row["frontpageimage"];
                $frontpagecolor = $row["frontpagecolor"];
                $theme = $row["theme"];
                $sessiontimeout = $row["sessiontimeout"];
                $forcetimezone = $row["forcetimezone"];
                $country = $row["country"];
                $defaultcity = $row["defaultcity"];
                $lang = $row["lang"];
                $fecha = $row["fecha"];
                $id = $row["id"];
                $rfc = $row["rfc"];
                $Nombre = $row["Nombre"];
                $persona = $row["persona"];
                $Calle = $row["Calle"];
                $NoExterior = $row["NoExterior"];
                $NoInterior = $row["NoInterior"];
                $Colonia = $row["Colonia"];
                $Localidad = $row["Localidad"];
                $Referencia = $row["Referencia"];
                $Municipio = $row["Municipio"];
                $estado = $row["estado"];
                $pais = $row["pais"];
                $cp = $row["cp"];
                $regimen_fiscal = $row["regimen_fiscal"];
                $banco = $row["banco"];
                $NoCuenta = $row["NoCuenta"];
                $ClaveInterbancaria = $row["ClaveInterbancaria"];
                $Telefono = $row["Telefono"];
                $Estatus = $row["Estatus"];
                $esPruebas = $row["esPruebas"];
                $Email = $row["Email"];
                $deployment_folder = $row["deployment_folder"];
            }
            $this->idiconfig = $idiconfig;
            $this->idifactura = $idifactura;
            $this->fullname = $fullname;
            $this->shortname = $shortname;
            $this->summary = $summary;
            $this->clave_instituto = $clave_instituto;
            $this->website = $website;
            $this->lms_token = $lms_token;
            $this->lms_domainname = $lms_domainname;
            $this->frontpageimage = $frontpageimage;
            $this->frontpagecolor = $frontpagecolor;
            $this->theme = $theme;
            $this->sessiontimeout = $sessiontimeout;
            $this->forcetimezone = $forcetimezone;
            $this->country = $country;
            $this->defaultcity = $defaultcity;
            $this->lang = $lang;
            $this->fecha = $fecha;
            $this->id = $id;
            $this->rfc = $rfc;
            $this->Nombre = $Nombre;
            $this->persona = $persona;
            $this->Calle = $Calle;
            $this->NoExterior = $NoExterior;
            $this->NoInterior = $NoInterior;
            $this->Colonia = $Colonia;
            $this->Localidad = $Localidad;
            $this->Referencia = $Referencia;
            $this->Municipio = $Municipio;
            $this->estado = $estado;
            $this->pais = $pais;
            $this->cp = $cp;
            $this->regimen_fiscal = $regimen_fiscal;
            $this->banco = $banco;
            $this->NoCuenta = $NoCuenta;
            $this->ClaveInterbancaria = $ClaveInterbancaria;
            $this->Telefono = $Telefono;
            $this->Estatus = $Estatus;
            $this->esPruebas = $esPruebas;
            $this->Email = $Email;
            $this->deployment_folder = $deployment_folder;
        }
        $conn->close();
    }

    /**
     * Esta funcion se ejecuta cada ves que se incova a constructor del API, 
     * pagos, Registration
     * Envia como parametro POST_['action']
     * Si la accion o evento esta registrado y activo, 
     * Selecciona a los destinatarios y elije la plantilla a enviar
     * @param type $action
     * @param type $notifications_to
     */
    function post_trigger_notification_target($action, $notifications_to = null, $idinotification) {
        include './conexion.php';
        $sql = "SELECT
                notifications_targets.iditarget,
                notifications_targets.idinotification,
                notifications_targets.idigenerales,
                notifications_events.idievent,
                notifications_events.suspended,
                notifications_events.deleted,
                notifications_events.name,
                notifications_events.description 
                FROM
                notifications_targets
                INNER JOIN notifications_events ON notifications_targets.idievent = notifications_events.idievent 
                WHERE
                notifications_events.suspended = 0 
                AND notifications_events.deleted = 0
                AND notifications_events.description = '$action' LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                //$idinotification_ = $row["idinotification"];
                $idievent = $row["idievent"];
            }

            if (empty($idinotification) || $idinotification == null) {
                $idinotification = 1;
            }
            if (empty($notifications_to) || $notifications_to == null) {
                $notifications_to = $this->getEmail();
            } else {
                $notifications_to = $notifications_to;
            }

            $this->send_notification($notifications_to, $idinotification, $idievent);
        }
        $conn->close();
    }

    /**
     * set_password_hash
     * @param type $plaintext_password
     * @return type $pswd_hash = hash('sha256', $plaintext_password);
     */
    public function set_password_hash($plaintext_password) {
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

    /**
     * Valida el password
     * @param type $plaintext_password
     * @param type $hash_password
     * @return boolean
     */
    public function validate_password_hash($plaintext_password, $hash_password) {
        $cPasswd = utf8_decode($plaintext_password);
        if (hash('sha256', $cPasswd) != $hash_password) {
            return false; //bad
        } else {
            return true; //success
        }
    }

    /**
     * Actualiza el password directo en la base de datos
     * @param type $plaintext_password > string
     * @param type $id user > number
     * @return boolean
     */
    public function update_model_password_hash($plaintext_password, $id) {
        $errorMSG = '';
        if (empty($plaintext_password)) {
            $errorMSG = 'Password is required ';
        }
        if (empty($id)) {
            $errorMSG .= '$id is required ';
        }
// redirect to success page
        if ($errorMSG == '') {
            include './conexion.php';
            $sql = "UPDATE tbuser 
                    SET PASSWORD = sha2 ( '$plaintext_password', 256 ) 
                    WHERE
                    idiuser = $id;";
            if ($conn->query($sql) === TRUE) {
                return true;
            } else {
                $error = "Error : " . $conn->error;
                return $error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                return false;
            } else {
                return false;
            }
        }
    }

    /**
     * multi_attach_mail
     * @param type $to
     * @param type $subject
     * @param type $message
     * @param type $senderMail
     * @param type $senderName
     * @param type $files
     * @return boolean
     */
    public function multi_attach_mail($to, $subject, $message, $senderMail = null, $senderName = null, $files = null, $bcc = null) {
        if (empty($senderMail) || $senderMail == null) {
            $senderMail = $this->getEmail();
        } else {
            $senderMail = $senderMail;
        }
        if (empty($senderName) || $senderName == null) {
            $senderName = $this->getFullname();
        } else {
            $senderName = $senderName;
        }
        if (empty($files) || $files == null) {
            //$files = 0;
            $files = array();
        }

        $from = $senderName . " <" . $senderMail . ">";
        $headers = "From: $from";
        // Bcc email
        $headers .= "\nBcc:" . $bcc;

        // boundary 
        $semi_rand = md5(time());
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

        // headers for attachment 
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

        // multipart boundary 
        $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
                "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";

        // preparing attachments
        if (count($files) > 0) {
            for ($i = 0; $i < count($files); $i++) {
                if (is_file($files[$i])) {
                    $message .= "--{$mime_boundary}\n";
                    $fp = @fopen($files[$i], "rb");
                    $data = @fread($fp, filesize($files[$i]));

                    @fclose($fp);
                    $data = chunk_split(base64_encode($data));
                    $message .= "Content-Type: application/octet-stream; name=\"" . basename($files[$i]) . "\"\n" .
                            "Content-Description: " . basename($files[$i]) . "\n" .
                            "Content-Disposition: attachment;\n" . " filename=\"" . basename($files[$i]) . "\"; size=" . filesize($files[$i]) . ";\n" .
                            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                }
            }
        }

        $message .= "--{$mime_boundary}--";
        $returnpath = "-f" . $senderMail;

        //send email
        $mail_request = @mail($to, $subject, $message, $headers, $returnpath);
        return $mail_request;
    }

    /**
     * get_notifications_targets
     * @param type $idinotification
     * @param type $idievent
     * @return type $array_targets
     */
    public function get_notifications_targets($idinotification, $idievent) {
        $errorMSG = "";
        if ($errorMSG == "") {
//header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    notifications_targets.iditarget,
                    notifications_targets.idievent,
                    notifications.idinotification,
                    notifications.name,
                    datos_generales.idigenerales,
                    datos_generales.deleted,
                    datos_generales.suspended,
                    datos_generales.nombre,
                    datos_generales.apellido_paterno,
                    datos_generales.apellido_materno,
                    datos_generales.email 
                    FROM
                    notifications_targets
                    INNER JOIN notifications ON notifications_targets.idinotification = notifications.idinotification
                    INNER JOIN datos_generales ON notifications_targets.idigenerales = datos_generales.idigenerales 
                    WHERE
                    notifications.idinotification = '$idinotification' 
                    AND notifications_targets.idievent = '$idievent' 
                    AND datos_generales.deleted = 0 
                    AND datos_generales.suspended = 0";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
// output data of each row
                while ($row = $result->fetch_assoc()) {
                    $email = $row["email"];
                    array_push($rows, $email);
                }
                return $rows;
            } else {
                return $rows;
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
     * send_notification
     * @param type $idinotification
     * @param type $notifications_to
     * @return boolean
     */
    function send_notification($notifications_to, $idinotification, $idievent) {
        $errorMSG = '';
        if ($errorMSG == '') {
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
                    notifications.files_name,
                    notifications.files,
                    notifications.files_size,
                    notifications.files_type
                    FROM
                    notifications
                    WHERE notifications.idinotification = $idinotification 
                    AND notifications.suspended = 0";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
// output data of each row
                while ($row = $result->fetch_assoc()) {
                    $idinotification = $row["idinotification"];
                    $subject = $row["subject"];
                    $message = $row["message"];
                    $sender_email = $row["sender_email"];
                    $sender_name = $row["sender_name"];
                    $files_name = $row["files_name"];
                    $files = $row["files"];
                }
                $basedir = './upload/';
                file_put_contents($basedir . $files_name, $files);
                $files = array($basedir . $files_name);

                $targets_ = $this->get_notifications_targets($idinotification, $idievent);
                $bcc = '';
                foreach ($targets_ as $key => $value) {
                    $bcc .= "$value, ";
                }
                $bcc = substr_replace($bcc, "", -2);

                $request_mail = $this->multi_attach_mail($notifications_to, $subject, $message, $sender_email, $sender_name, $files, $bcc);
                return $request_mail;
            } else {
                return false;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                return false;
            }
        }
    }

}
