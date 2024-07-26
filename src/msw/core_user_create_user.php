<?php

$errorMSG = "";
//username
if (empty($_GET["username"])) {
    $errorMSG = "username is required ";
} else {
    $username = $_GET["username"];
}
//firstname
if (empty($_GET["firstname"])) {
    $errorMSG .= "firstname is required ";
} else {
    $firstname = $_GET["firstname"];
}
//lastname
if (empty($_GET["lastname"])) {
    $errorMSG .= "lastname is required ";
} else {
    $lastname = $_GET["lastname"];
}
//email
if (empty($_GET["email"])) {
    $errorMSG .= "email is required ";
} else {
    $email = $_GET["email"];
}

// redirect to success page
if ($errorMSG == "") {
    include './core_token_service_web_moodle.php';
    $functionname = 'core_user_create_users';
    $restformat = 'json';

    $user = array(
        'username' => strtolower($username), // must be unique string in lowercase
        'password' => '1234567891011',
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email, //unique
        'auth' => 'manual',
        'lang' => 'en'
    );

    $users = array($user); // must be wrapped in an array because it's plural.

    $param = array("users" => $users); // the paramater to send


    $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' .
            $token . '&wsfunction=' . $functionname;

    require_once('curl.php'); // You can put it in the top.
    $curl = new curl;

    $restformat = ($restformat == 'json') ? '&moodlewsrestformat=' .
            $restformat : '';

    $resp = $curl->post($serverurl . $restformat, $param);
    header('Content-Type: application/json');
    print_r($resp);
} else {
    if ($errorMSG == "") {
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
