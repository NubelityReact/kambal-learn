<?php

include './core_token_service_web_moodle.php';
$functionname = 'core_user_create_users';
$restformat = 'json';

$user = array(
    'username' => '1010701563', // must be unique.
    'password' => '1234567891011',
    'firstname' => 'BEnder',
    'lastname' => 'last name',
    'email' => 'your_user@email.com',
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
