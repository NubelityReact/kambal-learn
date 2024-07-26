<?php

/**
 * @author Ing. Bernabe Gutierrez Rodriguez
 */
/*
 * Update users.
 * Argumentos
 * users (Requerido)
 * Argumentos
 * users (Requerido)
 * suspended int  Opcional 
 * Suspend user account, either false to enable user login or true to disable it
 */
include './core_token_service_web_moodle.php';
$functionname = 'core_user_update_users';//call service web

$errorMSG = "";
//idmoodle
if (empty($_GET["idmoodle"])) {
    $errorMSG = "idmoodle is required ";
} else {
    $idmoodle = $_GET["idmoodle"];
}
//suspended
if (empty($_GET["suspended"])) {
    echo 'Se activo la cuenta de usuario Moodle';
    $suspended = "0";
} else {
    echo 'Se suspendio la cuenta de usuario Moodle';
    $suspended = $_GET["suspended"];
}

// redirect to success page
if ($errorMSG == "") {
    $user = array(
        "id" => $idmoodle,
        "suspended" => $suspended
    );
    $users = array($user); // must be wrapped in an array because it's plural.
    $param = array("users" => $users); // the paramater to send
    $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $functionname;
    require_once('curl.php'); // You can put it in the top.
    $curl = new curl;
    $restformat = ($restformat == 'json') ? '&moodlewsrestformat=' . $restformat : '';
    $resp = $curl->post($serverurl . $restformat, $param);
    print_r($resp);
} else {
    if ($errorMSG == "") {
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}


