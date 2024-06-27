<?php

/**
 * @author Ing. Bernabe Gutierrez Rodriguez
 */
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './core_token_service_web_moodle.php';
$functionname = 'core_user_delete_users';//call service web


$user = array(
    8 //user ID
);

$users = array($user); // must be wrapped in an array because it's plural.

$param = array("userids" => array(3)); // the paramater to send


$serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' .
        $token . '&wsfunction=' . $functionname;

require_once('curl.php'); // You can put it in the top.
$curl = new curl;

$restformat = ($restformat == 'json') ? '&moodlewsrestformat=' .
        $restformat : '';

$resp = $curl->post($serverurl . $restformat, $param);

print_r($resp);
