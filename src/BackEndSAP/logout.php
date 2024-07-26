<?php
/**
 * Eminina la sesion y todas las coockies
 */
header("Location: ../index.php");
session_start();
unset($_SESSION["loggedin"]);
session_destroy();

//delete all cookies
if (isset($_SERVER['HTTP_COOKIE'])) {//do we have any
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']); //get all cookies 
    foreach ($cookies as $cookie) {//loop
        $parts = explode('=', $cookie); //get the bits we need
        $name = trim($parts[0]);
        setcookie($name, '', time() + (86400 * 30)); //kill it
        setcookie($name, '', time() + (86400 * 30), '/'); //kill it more
    }
}
exit;
?>
<script>
    location.href = "../index.php";
</script>