<?php
// LOAD URLs COMPANY
// MSALVARADO 31 JUL 2024
$company_name = $_ENV['COMPANY_NAME'];
$url_company_site = $_ENV['URL_COMPANY_SITE'];
$url_company_facebook = $_ENV['URL_COMPANY_FACEBOOK'];
$url_company_kambal = $_ENV['URL_COMPANY_KAMBAL'];

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?> 
    <script> location.href = "menu.php";</script>
    <?php
} 
$errorMSG = "";

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
        <title>Registro | <?php echo "$fullname"; ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="apple-mobile-Web-app-title" content="RockJS Framework®">
        <meta name="author" content=<?php echo $company_name ?>>
        <meta name="keywords" content="Soporte tecnico,it,ti,soluciones,datacenter,consultoria,centro de datos,empresarial,administracion,proyectos,soporte multimarca, <?php echo $company_name ?> es un proveedor global de servicios con presencia en más de 16 países de Latinoamérica con un amplio portafolio de servicios en Tecnologías de Información y con los mejores tiempos de respuesta de la industria, Software, Desarrollo, app, apps, android, IOS, 
              Transformación digital, Software on demand, Software a la medida, Servicios de desarrollo de software, fabrica de software, Progress, 4GL, ABL, app server, PAS, Servicios Web Síncronos,protocolos REST JSON XML">
        <meta name="description" content="La forma más rápida de adoptar la Transformación Digital">
        <!-- Favicon -->
        <link href="asset/images/favicon.ico" rel="icon">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="asset/css/bootstrap.min.css">
        <!-- ICON personalite CSS -->
        <link rel="stylesheet" href="asset/css/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
        <link rel="stylesheet" href="asset/css/pe-icon-7-stroke/css/helper.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
                <div class="col-md-12 col-md-offset-9 center-block" style="margin-left:  auto; margin-right: auto;">
                    <div class="login-panel panel panel-default tops center-block">
                        <div class="panel-heading"><div><a href="index.php"><img src="asset/images/logo/<?php echo "$logo";?>" width="15%"></a></div>
                            <h3 class="panel-title"></h3><br>   
                        </div>
                        <div class="panel-body">
                            <div class="container">
                                <h1 class="text-center text-dark"><?php echo $fullname; ?></h1>
                                <h6 style="color: #d6532d" class="text-center"><?php echo $summary; ?></h6><br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h6 class="text-dark">
                                            Es necesario que completes la siguiente información.
                                        </h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="Campus" class="text-primary">Selecciona un campus</label>
                                            <div id="divCampus" class="divCampus"></div>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="interes" class="text-primary">Selecciona la oferta</label>
                                            <input type="hidden" id="interes" name="interes" class="form-control">
                                            <div id="seleOferta" class="seleOferta">
                                                <select class="form-control">
                                                    <option value="">Selecciona una opción</option>
                                                </select>
                                            </div>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row" style="display: none;" id="ofering">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header text-danger"><strong>Detalle de la oferta</strong></div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-7 text-dark" id="message"></div>
                                                    <div class="col-sm-5">
                                                        <div class="card">
                                                            <div class="card-body"> 
                                                                <div id="imagen_vacante"></div>
                                                                <hr>
                                                                <i class="pe pe-2x pe-7s-clock text-danger"></i> <label class="text-dark" id="last_update"></label><br>
                                                                <i class="pe pe-2x pe-7s-map-marker text-danger"></i> <label class="text-dark" id="campus"></label><hr>
                                                                <i class="pe pe-2x pe-7s-clock text-primary"></i> <label class="text-dark" id="working_day"></label><br>
                                                                <i class="pe pe-2x pe-7s-cash text-primary"></i> <label class="text-dark" id="salary"></label><br>
                                                                <i class="pe pe-2x pe-7s-box2 text-primary"></i> <label class="text-dark" id="nivel"></label>
                                                                <div id="arc_adjunto"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer" id="link-oferta">
                                                <a href="#" class="btn btn-danger text-light float-right">Registrarse!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <img src="asset/images/logo.png" width="15%"></img><br><a href=<?php echo $url_company_site ?> target="_blank" class="text-primary">Power by <?php echo $company_name ?></a>
                        </div>
                        <div class="form-group col-sm-6"><br>
                            <div class="fb-share-button" data-href="<?php echo $url_company_kambal ?>capital_humano/ready-registration-form.php" data-layout="button_count" data-size="small"><a target="_blank" href=<?php echo $url_company_facebook ?> class="fb-xfbml-parse-ignore">Compartir</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include './core_modal_aviso_privacidad.php'; ?>

        <div class="clearfix">
            <span class="float-right text-muted">Kambal Talent 1.0.0 <i class="pe-7s-science"></i></span>
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

        <!-- Web Service Login -->
        <script src="asset/js/validator.min.js"></script>
        <script src="asset/js/ready-registration-form.js"></script>

        <script>
            var org = "<?php echo $_GET['org']; ?>";
            $(document).ready(function () {
                // $('#btnModal').click();
                //getOferta();
                // cMedioContacto();
                getCampusPlantel();
            });
        </script>

        <script>
            $(document).ready(function () {
                getOferta();
                $("#fecha_nacimiento").change(function (e) {
                    var vals = e.target.value.split('-');
                    var year = vals[0];
                    var month = vals[1];
                    var day = vals[2];
                    var d = new Date();
                    var n = d.getFullYear();
                    var edad = n - year;
                    console.info(edad);
                    $("#edad").val(edad);
                    //console.info(day, month, year);
                });
            });
        </script>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v6.0"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </body>
</html>

