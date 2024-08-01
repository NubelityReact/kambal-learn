<?php

// URLs COMPANY
// MSALVARADO 31 JUL 2024
$company_name = $_ENV['COMPANY_NAME'];
$url_company_site = $_ENV['URL_COMPANY_SITE'];
$url_company_facebook = $_ENV['URL_COMPANY_FACEBOOK'];

$errorMSG = "";
if (empty($_GET["org"])) {
    $errorMSG = "org is required ";
} else {
    $org = strtolower($_GET["org"]);
}
if (empty($_GET["idinotification"])) {
    $idinotification = 1;
} else {
    $idinotification = $_GET["idinotification"];
}
 
// redirect to success page
if ($errorMSG == "") {
    include './dataConect/conexion.php';
    $sql = "SELECT * FROM tbconfig;";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            $idiorganization = $row["idiconfig"];
            $fullname = $row["fullname"];
            $summary = $row["summary"];
            $logo = $row["frontpageimage"];
            $logo_back_ground = "back.png";
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
        <meta name="author" content=<?php echo  $company_name ?>>
        <meta name="keywords" content="Soporte tecnico,it,ti,soluciones,datacenter,consultoria,centro de datos,empresarial,administracion,proyectos,soporte multimarca, <?php echo  $company_name ?> es un proveedor global de servicios con presencia en más de 16 países de Latinoamérica con un amplio portafolio de servicios en Tecnologías de Información y con los mejores tiempos de respuesta de la industria, Software, Desarrollo, app, apps, android, IOS, 
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
                background-image: url(asset/images/<?php echo "$logo_back_ground";?>);
                background-size: cover;
                background-attachment: fixed;
                padding: 0px 0;
                color: #fff;
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
            .panel-body {
                background-color: white;
            }
            .panel-footer {
                background-color: white;
            }
            .panel-default>.panel-heading {
                color: #3873ae;
                background-color:#f7f7f7;
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
                background: url(asset/images/loader4.gif) 50% 50% no-repeat rgb(249,249,249);
                opacity: .8;
            }
        </style>
    </head>
    <body>
        <div class="loader"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-offset-9 center-block" style="margin-left:  auto; margin-right: auto;">
                    <div class="login-panel panel panel-default tops center-block">
                        <div class="panel-heading"><div><a href="index.php"><img src="asset/images/logo/<?php echo "$logo";?>" width="25%"></a></div>
                            <h3 class="panel-title"></h3><br>   
                        </div>
                        <div class="panel-body">
                            <div class="container text-dark" id="message"></div>
                        </div>
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
                            <img src="asset/images/logo.png" width="15%"></img><br><a href=<?php echo  $url_company_site ?> target="_blank" class="text-primary">Power by <?php echo  $company_name ?></a>
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
        <script>
            $(document).ready(function () {
                get_notifications_id();
            });

            function get_notifications_id() {
                $("#message").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
                $('#btns_actions').html('');
                var idinotification = "<?php echo $idinotification; ?>";
                $.ajax({
                    type: "GET",
                    url: "dataConect/registration.php",
                    data: "action=get_notifications_id&idinotification=" + idinotification,
                    success: function (text) {
                        var date = text.data[0];
                        var suspended = date.suspended;
                        var deleted = date.deleted;
                        $('#name').val(date.name);
                        $('.name_template').html(date.name);
                        $('#message').html(date.message);
                        $('#description').val(date.description);
                        $('#comments').val(date.comments);
                        $('#subject').val(date.subject);
                        $('#message').val(date.message);
                        $('#sender_email').val(date.sender_email);
                        $('#sender_name').val(date.sender_name);
                        $('#files_name').val(date.files_name);

                        var str = date.files_name;
                        var n = str.length;
                        if (n <= 0) {
                            $('#arc_adjunto').html('<br>');
                        } else {
                            $('#arc_adjunto').html('<label onclick="showFile(' + idinotification + ')"><i class="fa fa-paperclip pe-2x text-success"></i> Ver archivo adjunto actual: <a href="#">' + date.files_name + '</a></label>  <button type="button" class="btn btn-danger btn-sm" onclick="notification_file_remove(' + idinotification + ')"> Remover <i class="fa fa-trash"></i></button><br>');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        swalert('Error', "No ha agregado ninguna plantilla", 'danger');
                    }
                });
            }

        </script>

    </body>
</html>

