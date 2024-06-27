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
$body_msg = "";
//idialumno
if (empty($_GET["org"])) {
    $errorMSG = "org is required ";
} else {
    $org = strtolower($_GET["org"]);
}
if (empty($_GET["interes"])) {
    //$errorMSG = "interes is required ";
} else {
    $interes = $_GET["interes"];
}

if (strpos($interes, 'webinar') !== false || strpos($interes, 'Webinar') !== false) {
    $body_msg .= '<div class="panel-body">
                    <div class="container">
                        <h2 class="text-center text-success">¡GRACIAS POR TU REGISTRO!</h2>
                        <h6 style="color: #d6532d" class="text-center"></h6><br>
                        <h6>
                            Te recordamos que este webinar ' . $interes . ' es totalmente gratuito, los datos de acceso y la demás información te llegarán en breve, siempre revisa tu bandeja de correo no deseado o SPAM.
                        </h6><br>  
                        <h6 class="text-info text-justify">
                            Si tienes más dudas puedes escribirnos a <a href="contacto@ortega-vasconcelos.com" target="_blank">contacto@ortega-vasconcelos.com</a><br> o a nuestro whastapp <a href="wa.link/y91yl8" target="_blank">wa.link/y91yl8</a>
                        </h6>
                        <br>
                    </div>
                  </div>';
} else {
    $body_msg .= '<div class="panel-body">
                    <div class="container">
                        <h2 class="text-center text-success">¡REGISTRO EXITOSO!</h2>
                        <h6 style="color: #d6532d" class="text-center"></h6><br>
                        <h6>
                            Gracias por interesarte en nuestro curso ' . $interes . ', ahora que tenemos tus datos más importantes, en breve un agente se pondrá en contacto contigo para continuar el proceso de inscripción.
                        </h6><br>  
                        <h6 class="text-info text-justify">
                            Si tienes más dudas puedes escribirnos a <a href="contacto@ortega-vasconcelos.com" target="_blank">contacto@ortega-vasconcelos.com</a><br> o a nuestro whastapp <a href="wa.link/y91yl8" target="_blank">wa.link/y91yl8</a>
                        </h6>
                        <br>
                    </div>
                  </div>';
}
// redirect to success page
if ($errorMSG == "") {
    include './dataConect/kambal.php';
    $sql = "SELECT idiorganization, fullname, summary, logo_back_ground, logo from organization where shortname = '$org'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            $idiorganization = $row["idiorganization"];
            $fullname = $row["fullname"];
            $summary = $row["summary"];
            $logo_back_ground = $row["logo_back_ground"];
            $logo = $row["logo"];
        }
        //Set Coockie idiorg
        $cookie_idiorganization = "_org";
        $cookie_user_value = $idiorganization;
        setcookie($cookie_idiorganization, $cookie_user_value, time() + (60 * 2), "/"); // 86400 = 1 day
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


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Registro | Gracias!</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="apple-mobile-Web-app-title" content="RockJS Framework®">
        <meta name="author" content="RockJS Framework®|Focus On Services">
        <meta name="keywords" content="Soporte tecnico,it,ti,soluciones,datacenter,consultoria,centro de datos,empresarial,administracion,proyectos,soporte multimarca, Focus On Services es un proveedor global de servicios con presencia en más de 16 países de Latinoamérica con un amplio portafolio de servicios en Tecnologías de Información y con los mejores tiempos de respuesta de la industria, Software, Desarrollo, app, apps, android, IOS, 
              Transformación digital, Software on demand, Software a la medida, Servicios de desarrollo de software, fabrica de software, Progress, 4GL, ABL, app server, PAS, Servicios Web Síncronos,protocolos REST JSON XML">
        <meta name="description" content="La forma más rápida de adoptar la Transformación Digital">

        <!-- Favicon -->
        <link href="asset/images/favicon.ico" rel="icon">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="asset/css/bootstrap.min.css">

        <!-- JQuery Export datatable csv,excel pdf -->
        <link rel="stylesheet" href="asset/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="asset/css/buttons.dataTables.min.css">
        <style>
            body {
                display: table;
                position: relative;
                background-image: url(asset/images/back.png);
                background-size: cover;
                background-attachment: fixed;
                padding: 0px 0;
                width: 100%;
                height: 100vh;
            }
            .panel {
                margin-bottom: 20px;
                background-color: #ffffff5c;
                border: 1px solid transparent;
                border-radius: 4px;
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
                box-shadow: 0 1px 1px rgba(0,0,0,.05);
            }
            .panel-default>.panel-heading {
                color: #3873ae;
                background-color: #f5f5f5c2;
                border-color: #ddd;
                text-align: center;
            }

            .tops{
                margin-top: 5em;
                margin-left: auto !important;
                margin-right: auto;

            }
            .loader {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url(asset/images/loader2.gif) 50% 50% no-repeat rgb(249,249,249);
                opacity: .8;
            }

            * {
                box-sizing: border-box;
            }

            body {
                background-color: #f1f1f1;
            }


            h1 {
                text-align: center;  
            }

            /* Mark input boxes that gets an error on validation: */
            input.invalid {
                background-color: #ffdddd;
            }

            /* Hide all steps by default: */
            .tab {
                display: none;
            }


            button:hover {
                opacity: 0.8;
            }

            #prevBtn {
                background-color: #bbbbbb;
            }

            /* Make circles that indicate the steps of the form: */
            .step {
                height: 15px;
                width: 15px;
                margin: 0 2px;
                background-color: #bbbbbb;
                border: none;  
                border-radius: 50%;
                display: inline-block;
                opacity: 0.5;
            }

            .step.active {
                opacity: 1;
            }

            /* Mark the steps that are finished and valid: */
            .step.finish {
                background-color: #4CAF50;
            }

            #resultado {
                background-color: red;
                color: white;
                font-weight: bold;
            }
            #resultado.ok {
                background-color: green;
            }
        </style>
    </head>
    <body>
        <div class="loader"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-offset-9 center-block" style="margin-left:  auto; margin-right: auto;">
                    <div class="login-panel panel panel-default tops center-block">
                        <div class="panel-heading"><div><a href="index.php"><img src="asset/images/kambal.png" width="100%"></a></div>
                            <h3 class="panel-title"></h3><br>   
                        </div>
                        <?php
                        echo $body_msg;
                        ?>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col">
                                    <div id="msgSubmit" class="h4 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>                                    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <img src="asset/images/logo.png" width="15%"></img><br><a href="https://www.focusonservices.com/" target="_blank" class="text-primary">Power by Focus On Services</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix">
            <span class="float-right text-muted">Kambal 1.0.0 <i class="pe-7s-science"></i></span>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="asset/js/jquery-3.2.1.slim.min.js"></script>
        <script src="asset/js/popper.min.js"></script>
        <script src="asset/js/bootstrap.min.js"></script>

        <!-- JQuery Export datatable csv,excel pdf -->
        <script src="asset/js/jquery-1.12.4.js"></script>
        <script src="asset/js/jquery.dataTables.min.js"></script>
        <script src="asset/js/dataTables.buttons.min.js"></script>
        <script src="asset/js/jszip.min.js"></script>
        <script src="asset/js/pdfmake.min.js"></script>
        <script src="asset/js/vfs_fonts.js"></script>
        <script src="asset/js/buttons.html5.min.js"></script>
        <script src="asset/js/calculaEdad.js"></script>
        <script src="asset/js/validaCURP.js"></script>

        <!-- Loader GIF JS -->
        <script type="text/javascript" src="asset/js/loader.js"></script>
        <!-- Draggable personalite CSS -->
        <script src="asset/js/sweetalert2/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="asset/js/sweetalert2/sweetalert2.min.css">

    </body>
</html>

