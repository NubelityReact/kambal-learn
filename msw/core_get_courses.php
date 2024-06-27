<?php

/**
 * core_get_courses
 * username
 * firstname
 * lastname
 * email
 */
function core_get_courses() {
// redirect to success page
    $errorMSG = "";
    if ($errorMSG == "") {
        include './core_token_service_web_moodle.php';
        $functionname = 'core_course_get_courses';
        $restformat = 'json';

        $course = array(
//            'username' => strtolower($username), // must be unique string in lowercase
//            'password' => '1234567891011',
//            'firstname' => $firstname,
//            'lastname' => $lastname,
//            'email' => $email, //unique
//            'auth' => 'manual',
//            'lang' => 'en'
        );

        $courses = array($course); // must be wrapped in an array because it's plural.

        $param = array("options" => $courses); // the paramater to send


        $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' .
                $token . '&wsfunction=' . $functionname;

        require_once('curl.php'); // You can put it in the top.
        $curl = new curl;

        $restformat = ($restformat == 'json') ? '&moodlewsrestformat=' .
                $restformat : '';

        $resp = $curl->post($serverurl . $restformat, $param);
        header('Content-Type: application/json');
        //print_r($resp);
        $arrays = json_decode($resp);
        $data = array("data" => $arrays);
        print json_encode($data, JSON_PRETTY_PRINT);
    } else {
        if ($errorMSG == "") {
            echo "Something went wrong :(";
        } else {
            echo $errorMSG;
        }
    }
}

core_get_courses();
