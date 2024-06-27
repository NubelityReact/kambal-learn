<?php

//error_reporting(0);
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    //Set global vars in instance logedin
    //Load vars session ORG
    $fullname = $_SESSION['fullname'];
    $shortname = $_SESSION['shortname'];
    $summary = $_SESSION['summary'];
    $website = $_SESSION['website'];
    $lms_token = $_SESSION['lms_token'];
    $lms_domainname = $_SESSION['lms_domainname'];
    $frontpageimage = $_SESSION['frontpageimage'];
    $frontpagecolor = $_SESSION['frontpagecolor'];
    $theme = $_SESSION['theme'];
    $sessiontimeout = $_SESSION['sessiontimeout'];
    $forcetimezone = $_SESSION['forcetimezone'];
    $country = $_SESSION['country'];
    $lang = $_SESSION['lang'];

    $idiorganization = $_SESSION['idiorganization'];
    //Load vars session USER
    $globalIdiUsurio = $_SESSION['idiuser'];
    $globalidigenerales = $_SESSION['idigenerales'];
    $globalIdirole = $_SESSION['idirole'];
    $globaEmail = $_SESSION['email'];
    $globalNombre = $_SESSION['nombre'];
    $edit = $_SESSION['edit'];
    $role = $_SESSION['role'];
//    $PermisionsHasRole = $_SESSION['PermisionsHasRole'];
//    $PermisionsHasRoleJson = json_encode($PermisionsHasRole, JSON_PRETTY_PRINT);
    $categoria = $_SESSION['categoria'];
} else {
    ?> 
    <script>
        alert('La sesion ha expirado');
        location.href = "index.php";
    </script>
    <?php

}
$now = time();
//si el tiempo de la session se ha excedido termina
if ($now > $_SESSION['expire']) {
    session_destroy();
    ?> 
    <script>
        alert('La sesion ha expirado');
        location.href = "logout.php";
    </script>
    <?php

}
?>
