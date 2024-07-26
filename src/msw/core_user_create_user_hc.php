<?php

/**
 * core_user_create_user
 * username
 * firstname
 * lastname
 * email
 */
function core_user_create_user($username, $firstname, $lastname, $email) {
    $errorMSG = "";
////username
//    if (empty($_POST["username"])) {
//        $errorMSG = "username is required ";
//    } else {
//        $username = $_POST["username"];
//    }
////firstname
//    if (empty($_POST["firstname"])) {
//        $errorMSG .= "firstname is required ";
//    } else {
//        $firstname = $_POST["firstname"];
//    }
////lastname
//    if (empty($_POST["lastname"])) {
//        $errorMSG .= "lastname is required ";
//    } else {
//        $lastname = $_POST["lastname"];
//    }
////email
//    if (empty($_POST["email"])) {
//        $errorMSG .= "email is required ";
//    } else {
//        $email = $_POST["email"];
//    }
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
}

core_user_create_user("19201A31", "Valeria", "Gutierrez Ozorio", "mailval@gmail.com");
