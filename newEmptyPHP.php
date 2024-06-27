<?php

$errorMSG = "";

if ($errorMSG == "") {
    if (0 < $_FILES['tmp_file']['error']) {
        echo 'Error: ' . $_FILES['tmp_file']['error'];
    } else {
        // A list of permitted file extensions
        $allowed = array('pdf');
        $extension = pathinfo($_FILES['tmp_file']['name'], PATHINFO_EXTENSION);
        $tamanio = $_FILES['tmp_file']['size'];

        if (!in_array(strtolower($extension), $allowed) || $tamanio > 5242880) {// 5 MB (this size is in bytes)
            echo 'Solamente se permiten archivos en formato PDF con un tamaño máximo de 5 Mb';
        } else {
            $nombre = $_FILES['tmp_file']['name'];
            $tipo = $_FILES['tmp_file']['type'];
            $image = $_FILES['tmp_file']['tmp_name'];
            $archivo = addslashes(file_get_contents($image));
            //$archivo = file_get_contents($image);

            echo 'success';
        }
    }
} else {
    if ($errorMSG == "") {
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}