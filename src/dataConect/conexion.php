<?php

/**

 * @author Ing. Bernabe Gutierrez Rodriguez

 */
// this is qa kambal db in godaddy server
// $db_host_ip = "192.169.153.236";
// $db_user_model = "kambal_livedemo";
// $db_model_psw = '1q2w3e!Q"W#E';
// $db_model_name = "kambal_ovmx_qa";

$db_host_ip = getenv('DB_HOST_IP');
$db_user_model = getenv('DB_USER_MODEL');
$db_model_psw = getenv('DB_MODEL_PSW');
$db_model_name = getenv('DB_MODEL_NAME');

// echo "<pre>";
// print_r([
//     'DB_HOST' => $db_host_ip,
//     'DB_USER' => $db_user_model,
//     'DB_PASSWORD' => $db_model_psw,
//     'DB_NAME' => $db_model_name,
// ]);
// echo "</pre>";


// Create connection
$conn = new mysqli($db_host_ip, $db_user_model, $db_model_psw, $db_model_name);

mysqli_query($conn, "SET CHARACTER SET 'utf8'");

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}   