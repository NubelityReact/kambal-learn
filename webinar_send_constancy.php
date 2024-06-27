<?php

$errorMSG = "";
//cajero
if (empty($_POST["idialumno"])) {
    echo 'Idialumno is requied';
} else {
    $idialumno = $_POST["idialumno"];
}
// redirect to success page
if ($errorMSG == "") {
    include './dataConect/conexion.php';
    $sql = "SELECT
        alumno.matricula,
        datos_generales.nombre,
        datos_generales.apellido_paterno,
        datos_generales.apellido_materno,
        datos_generales.email
        FROM
        alumno
        INNER JOIN datos_generales ON alumno.idigenerales = datos_generales.idigenerales
        WHERE alumno.idialumno = $idialumno";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $matricula = $row["matricula"];
            $emailUser = $row["email"];
            $nombre = ucfirst($row["nombre"]);
            $apellido_paterno = ucfirst($row["apellido_paterno"]);
            $apellido_materno = ucfirst($row["apellido_materno"]);

            /**
             * ENVIO DE CORREO
             */
            include_once ('./phpmailer/src/PHPMailer.php');
            $email = new PHPMailer\PHPMailer\PHPMailer('true');
            $email->From = 'kambalearn@gmail.com';
            $email->FromName = 'Kambal Learn';
            $email->AddCC    =('kambalearn@gmail.com');
            $email->AddCC    =('development@focusonservices.com');
            $email->Subject = 'Constancia de Participación al Webinar: Herramientas digitales para la docencia a distancia.';
            $email->Body = "Hola $nombre!, Muchas Gracias por tu participación, para el equipo de Kambal Learn tu eres muy importante.

                ¡Muchas Gracias!
                Kambal Learn
                
                ¡Tenemos tiempo de aprender!

                #Webinar #KambalLearn
                
                Si requieres asistencia envíanos un correo: development@focusonservices.com o kambalearn@gmail.com";
            $email->AddAddress("$emailUser");

            $file_to_attach = "./webinar04/$matricula.pdf";

            $mail_sent = $email->AddAttachment($file_to_attach, "$matricula.pdf");


            if ($email->send()) {
                $mensaje = 'success';
            } else {
                $mensaje = 'TREMENDO ERROR';
            }
            //if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"
            echo $mensaje;
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



