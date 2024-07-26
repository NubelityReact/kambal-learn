<?php

$servername = "192.169.153.236";
$username = "kambal_root";
$password = "1q2w3e!Q!Q";
$dbname = "kambal_tenand";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn, "SET CHARACTER SET 'utf8'");
// Check connection
//echo 'Connected!';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 