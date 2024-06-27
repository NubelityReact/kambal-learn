<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?> 
    <script> location.href = "menu.php";</script>
    <?php
}
$errorMSG = "";
//idialumno
if (empty($_GET["org"])) {
    $errorMSG = "org is required ";
} else {
    $org = $_GET["org"];
}
// redirect to success page
if ($errorMSG == "") {
    include './dataConect/kambal.php';
    $sql = "SELECT * FROM organization  where shortname = '$org'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            $idiorganization = $row["idiorganization"];
            $fullname = $row["fullname"];
            $summary = $row["summary"];
            $logo = $row["logo"];
            $logo_back_ground = $row["logo_back_ground"];
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
        <title>Kambal</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="apple-mobile-Web-app-title" content="Kambal Learn®">
        <meta name="author" content="Kambal Learn® | Focus On Services">
        <meta name="keywords" content="CRM Escolar, LMS, Soporte tecnico,it,ti,soluciones,datacenter,consultoria,centro de datos,empresarial,administracion,proyectos,soporte multimarca, Focus On Services es un proveedor global de servicios con presencia en más de 16 países de Latinoamérica con un amplio portafolio de servicios en Tecnologías de Información y con los mejores tiempos de respuesta de la industria, Software, Desarrollo, app, apps, android, IOS, 
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
                background: url(asset/images/loader4.gif) 50% 50% no-repeat rgb(249,249,249);
                opacity: .8;
            }
        </style>
    </head>
    <body>
        <!--        <div class="loader"></div>-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-5 center-block" style="margin-left:  auto; margin-right: auto;">
                    <div class="login-panel panel panel-default tops center-block">
                        <div class="panel-heading"><div><a href="index.php"><img src="asset/images/logo/<?php echo "$logo";?>" width="100%"></a></div>
                            <h3 class="panel-title"></h3><br>                        </div>
                        <div class="panel-body">
                            <div class="container">
                                <h2 class="text-center text-dark"><?php echo $fullname; ?></h2>
                                <h6 style="color: #d6532d" class="text-center"><?php echo $summary; ?></h6><br>
                                <label class="text-dark" >Iniciar Sesión</label>
                                <br>
                                <form role="form" id="contactForm" data-toggle="validator" class="shake" autocomplete="off">
                                    <fieldset>
                                        <input type="hidden" class="form-control" id="org" name="org" placeholder="Ingrese su Organización" required value="<?php echo $org; ?>" readonly="true">
                                        <div class="form-group">
                                            <label for="usuario" class="text-primary">Usuario</label>
                                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su usuario" required>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Password" class="text-primary">Contraseña</label>
                                            <input type="password" class="form-control" id="Password" name="Password" placeholder="Ingrese su Password" required>
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
                            <div class="row">
                                <div class="col-sm-6">
                                    <br><br>
                                    <a style="font-size: 10px" class="text-success" data-toggle="modal" data-target="#modalForgot">¿Olvidó su contraseña? <br>
                                        ¿Está bloqueado su acceso?
                                    </a>
                                </div>
                                <div class="col-sm-6">  <br><br><a href="ready-registration-form.php?org=<?php echo $_GET['org']; ?>" class="btn-default float-right align-bottom">Registro Aspirantes</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <img src="asset/images/logo.png" width="15%"></img><br><a href="https://www.focusonservices.com/" target="_blank" class="text-primary">Power by Focus On Services</a>
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

<!-- The Modal -->
<div class="modal" id="modalForgot">
    <div class="modal-dialog modal-lg">
        <div class="modal-content text-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"> ¯\_(シ)_/¯ Olvidaste la contraseña</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-dark">
                <label>
                    Para restablecer su contraseña, envíe su dirección de correo electrónico a continuación.<br> 
                    Si podemos encontrarlo en la base de datos, se le enviará un mensaje a su dirección de correo electrónico, con instrucciones sobre cómo volver a acceder.
                </label>
                <form role="form" id="forgot-password" data-toggle="validator" class="shake" autocomplete="off">
                    <fieldset>
                        <input type="hidden" class="form-control" id="org" name="org" placeholder="Ingrese su Organización" required value="<?php echo $org; ?>" readonly="true">
                        <div class="form-group">
                            <label for="usuario" class="text-primary">Correo electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" maxlength="100" required>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6Le8idYUAAAAALn8sfT60hwpKpts7bmwGtT6F9CW"></div>
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        <button type="submit" id="form-submit" class="btn btn-success pull-right float-right">Buscar</button><br>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
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
<script src="asset/js/forgot-password.js"></script>
<script src="asset/js/form-scripts.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>
</html>
