<?php

//first delete all cookies
if (isset($_SERVER['HTTP_COOKIE'])) {//do we have any
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']); //get all cookies 
    foreach ($cookies as $cookie) {//loop
        $parts = explode('=', $cookie); //get the bits we need
        $name = trim($parts[0]);
        setcookie($name, '', time() + (86400 * 30)); //kill it
        setcookie($name, '', time() + (86400 * 30), '/'); //kill it more
    }
}

$errorMSG = "";
//idialumno
if (empty($_GET["org"])) {
    $errorMSG = "org is required ";
} else {
    $org = $_GET["org"];
}
if (empty($_GET["token"])) {
    $errorMSG = "token is required ";
} else {
    $token = $_GET["token"];
}
// redirect to success page
if ($errorMSG == "") {
    include './dataConect/kambal.php';
    $sql = "SELECT idiorganization, fullname, summary from organization where shortname = '$org'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            $idiorganization = $row["idiorganization"];
            $fullname = $row["fullname"];
            $summary = $row["summary"];
        }
        //Set Coockie idiorg
        $cookie_idiorganization = "_org";
        $cookie_user_value = $idiorganization;
        setcookie($cookie_idiorganization, $cookie_user_value, time() + (60 * 2), "/"); // 86400 = 1 day
        echo '<script>location.href = "forgot_password_set_new_password.php?org=' . $org . '&token=' . $token . '";</script>';
    } else {
        ?> <script>
                    alert('Lo sentimos, su organización no existe en Kambal');
                    location.href = "index.php";
        </script><?php

    }
    $conn->close();
} else {
    if ($errorMSG == "") {
        echo "Something went wrong :(";
    } else {
        ?> <script> location.href = "index.php";</script><?php

    }
}
?>
