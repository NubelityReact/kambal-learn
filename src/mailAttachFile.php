<?php

function multi_attach_mail($to, $subject, $message, $senderMail, $senderName, $files) {

    $from = $senderName . " <" . $senderMail . ">";
    $headers = "From: $from";
    // Bcc email
    $headers .= "\nBcc: development@focusonservices.com";

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
    $mail = @mail($to, $subject, $message, $headers, $returnpath);

    //function return true, if email sent, otherwise return fasle
    if ($mail) {
        return TRUE;
    } else {
        return FALSE;
    }
}

$errorMSG = "";
//to
if (empty($_POST["to"])) {
    $errorMSG .= "to is required ";
} else {
    $to = $_POST["to"];
}
//factura
if (empty($_POST["factura"])) {
    $errorMSG .= "factura is required ";
} else {
    $factura = $_POST["factura"];
}


if ($errorMSG == "") {
    //email variables
    //$to = 'bernita.gutierrez@gmail.com';
    $from = 'contacto@universidaducp.com';
    $from_name = 'UNIVERSIDAD DE CIENCIAS PENALES Y SOCIALES S.C';

//attachment files path array
    $files = array('./cfdi/UCP' . $factura . '.pdf', './cfdi/UCP' . $factura . '.xml');
    $subject = 'UNIVERSIDAD DE CIENCIAS PENALES Y SOCIALES S.C.: Solicitud de factura CFDI';
    $html_content = '<h1>UNIVERSIDAD DE CIENCIAS PENALES Y SOCIALES S.C.</h1>
            <h3>Hola.<br>
Usted solicitó su factura CFDI 
en la UNIVERSIDAD DE CIENCIAS PENALES Y SOCIALES S.C..
</h3>';

//call multi_attach_mail() function and pass the required arguments
    $send_email = multi_attach_mail($to, $subject, $html_content, $from, $from_name, $files);

//print message after email sent
    echo $send_email ? "success" : "No se pudo enviar la factura!";
} else {
    if ($errorMSG == "") {
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
?>