<?php

/**
 * @author Ing. Bernabe Gutierrez Rodriguez
 */
$errorMSG = "";

if ($errorMSG == "") {
    // header('Content-Type: application/json');
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
            tbconfig.fecha
            FROM
            tbconfig";
    $result = $conn->query($sql);
    $rows = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $token = $row["lms_token"];
            $domainname = $row["lms_domainname"];
        }
        $restformat = 'json';
        $conn->close();
        //
    } else {
        echo "0 results";
    }
} else {
    if ($errorMSG == "") {
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

function charSet($param) {
    return utf8_decode($param);
}

?>
