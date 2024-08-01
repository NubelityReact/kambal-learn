<?php
date_default_timezone_set('america/mexico_city');
$errorMSG = "";
//org
if (empty($_GET["org"])) {
    $errorMSG = "org is required ";
} else {
    $org = $_GET["org"];
}
//token
if (empty($_GET["token"])) {
    $errorMSG = "token is required ";
} else {
    $token = $_GET["token"];
}
// redirect to success page
if ($errorMSG == "") {
    $thisAlert = "";
    include './dataConect/conexion.php';
    $sql = "SELECT idiforgot,valid,intentos,token,idigenerales,creacion,limite_min FROM forgot_password WHERE token = '$token'";
    $result = $conn->query($sql);
    $rows = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $idiforgot = $row["idiforgot"];
            $valid = $row["valid"];
            $intentos = $row["intentos"];
            $token = $row["token"];
            $creacion = $row["creacion"];
            $limite_min = $row["limite_min"];
            $idigenerales = $row["idigenerales"];
        }
        /**
         * validaciones
         * que el token sea valido
         * que el toque no haya expirado
         */
        if (boolval($valid)) {
            $date = new DateTime($creacion);
            $date->modify('+' . $limite_min . ' minute');
            $expiracion = $date->format('d-m-Y H:i:s');
            if ($expiracion > date('d-m-Y H:i:s')) {
                //Noting to do... every ok
            } else {
                $thisAlert = " El token que usted proporciono ya expiro! Comuníquese con el administrador del sitio.";
            }
        } else {
            $thisAlert .= " El token que usted proporciono ya no es válido! Comuníquese con el administrador del sitio.";
        }
    } else {
        $thisAlert .= " El token que usted proporciono no existe! Comuníquese con el administrador del sitio.";
    }
    $conn->close();

    if ($thisAlert == '') {
        //noting to do
    } else {
        echo '<script> alert("' . $thisAlert . '");</script>';
        echo ' <script> location.href = "index.php";</script>';
    }
} else {
    if ($errorMSG == "") {
        echo "Something went wrong :(";
    } else {
        echo '<script> alert("' . $errorMSG . '");</script>';
        echo ' <script> location.href = "index.php";</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Kambal</title>
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

        <!-- JQuery Export datatable csv,excel pdf -->
        <link rel="stylesheet" href="asset/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="asset/css/buttons.dataTables.min.css">
        <script src="asset/js/sweetalert2/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="asset/js/sweetalert2/sweetalert2.min.css">
        <style>
            body {
                display: table;
                position: relative;
                background-image: url(asset/images/back.png);
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
        </style>
    </head>
    <body>
        <div class="loader"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-5 center-block" style="margin-left:  auto; margin-right: auto;">
                    <div class="login-panel panel panel-default tops center-block">

                        <div class="panel-heading"><div><a href="index.php"><img src="asset/images/kambal.png" width="100%"></a></div>
                            <h3 class="panel-title"></h3><br>
                        </div>
                        <div class="panel-body">
                            <div class="container">
                                <h2 class="text-center text-dark"><?php echo $fullname; ?></h2>
                                <h6 style="color: #d6532d" class="text-center"><?php echo $summary; ?></h6><br>
                                <label class="text-dark" >Recuperar contraseña</label>
                                <br>
                                <form role="form" id="forgot-password" data-toggle="validator" class="shake" autocomplete="off">
                                    <fieldset>
                                        <input type="hidden" class="form-control" id="org" name="org" placeholder="Ingrese su Organización" required value="<?php echo $org; ?>" readonly="true">
                                        <input type="hidden" class="form-control" id="idigenerales" name="idigenerales" placeholder="Ingrese su usuario" value="<?php echo $idigenerales; ?>" required>
                                        <input type="hidden" class="form-control" id="token" name="token" required value="<?php echo $token; ?>" readonly="true">
                                        <div class="form-group">
                                            <label for="clave" class="text-primary">Nueva Contraseña</label>
                                            <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingrese su Password" required>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="repeat" class="text-primary">Repita la Contraseña</label>
                                            <input type="password" class="form-control" id="repeat" name="repeat" placeholder="Ingrese su Password" required>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <!-- Change this to a button or input when using this as a form -->
                                        <button type="submit" id="form-submit" class="btn btn-primary pull-right float-right">Ingresar</button><br>
                                    </fieldset>
                                </form>
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
                        <div class="form-group col-sm-12">
                            <img src="asset/images/logo.png" width="15%"></img><br><a href=<?php echo $url_company_site ?> target="_blank" class="text-primary">Power by <?php echo $company_name ?></a>
                        </div>
                    </div>
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
<script>
    function swalert(title, texto, type) {
        Swal({
            title: title,
            text: texto,
            type: type,
            confirmButtonText: 'Cerrar'
        })
    }
</script>
<!-- Loader GIF JS -->
<script type="text/javascript" src="asset/js/loader.js"></script>
<!-- Web Service Login -->
<script src="asset/js/validator.min.js"></script>
<script src="asset/js/restore_password.js"></script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>
</html>
