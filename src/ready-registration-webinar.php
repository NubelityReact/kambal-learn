<?php
//first delete all cookies
//if (isset($_SERVER['HTTP_COOKIE'])) {//do we have any
//    $cookies = explode(';', $_SERVER['HTTP_COOKIE']); //get all cookies 
//    foreach ($cookies as $cookie) {//loop
//        $parts = explode('=', $cookie); //get the bits we need
//        $name = trim($parts[0]);
//        setcookie($name, '', time() + (86400 * 30)); //kill it
//        setcookie($name, '', time() + (86400 * 30), '/'); //kill it more
//    }
//}

// LOAD URLs COMPANY
// MSALVARADO 31 JUL 2024
$company_name = $_ENV['COMPANY_NAME'];
$url_company_site = $_ENV['URL_COMPANY_SITE'];
$url_company_facebook = $_ENV['URL_COMPANY_FACEBOOK'];
$url_company_kambal = $_ENV['URL_COMPANY_KAMBAL'];

$errorMSG = "";
//idialumno
if (empty($_GET["org"])) {
    $org= 'live';
} else {
    $org = $_GET["org"];
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
        <title>Registro</title>
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
                background: url(asset/images/kambal.png) 50% 50% no-repeat rgb(249,249,249);
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
                        <div class="panel-heading"><div><a href="index.php"><img src="asset/images/kambal.png" width="60%"></a></div>
                            <h3 class="panel-title"></h3><br>   
                        </div>
                        <div class="panel-body">
                            <div class="container">
                                <h2 class="text-center text-dark"><?php echo $fullname; ?></h2>
                                <h6 style="color: #d6532d" class="text-center"><?php echo $summary; ?></h6><br>
                                <h3 class="text-dark" >Pre Registro</h3>
                                <br>
                                <form role="form" id="contactForm" data-toggle="validator" class="shake" autocomplete="off">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="Nombre" class="text-primary">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Paterno" class="text-primary">Apellido Paterno</label>
                                            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Ingrese su Apellido Paterno" required>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Materno" class="text-primary">Apellido Materno</label>
                                            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Ingrese su Apellido Materno" required>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="correo" class="text-primary">Correo electrónico</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su Correo electrónico" required>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono" class="text-primary">Teléfono de contacto</label>
                                            <input type="text" max="20" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su Teléfono" required>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="medio" class="text-primary">Como nos conoció?</label>
                                            <div id="cMedioContacto" class="cMedioContacto"></div>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email2" class="text-primary">Recomienda Kambal Learn a un amigo </label>
                                            <input type="email" class="form-control" id="email2" name="email2" placeholder="Ingrese el email" maxlength="140" required>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="escegreso" class="text-primary">Institución educativa</label>
                                            <input type="text" class="form-control" id="escegreso" name="escegreso" placeholder="Ingrese Escuela donde labora" maxlength="140" required>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nivelegreso" class="text-primary">Nivel de la Institución educativa</label>
                                            <select class="form-control" id="nivelegreso" name="nivelegreso" placeholder="Ingrese nivel de egreso" required>
                                                <option value="Medio Superior">Medio Superior</option>
                                                <option value="Superior Licenciatura">Superior Licenciatura</option>
                                                <option value="Superior Maestría">Superior Maestría</option>
                                                <option value="Superior Doctorado">Superior Doctorado</option>
                                                <option value="Básico">Básico</option>
                                            </select>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="infoadicional" class="text-primary">¿Está usted interesado en: Kabal Control Escolar / Kambal Learn - Plataforma de Ensañanza / Diseño instruccional ?</label>
                                            <select class="form-control" id="infoadicional" name="infoadicional" placeholder="Ingrese nivel de egreso" required>
                                                <option value="Sí">Sí</option>
                                                <option value="No">No</option>
                                            </select>

                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <!--                                                <label for="comment" class="text-primary">Comentarios:</label>-->
                                                <input type="hidden" class="form-control" id="comentarios" name="comentarios" value="Webinar Herramientas digitales para la docencia a distancia (parte 2)" placeholder="puede sugerir horario de llamada, o agregar alguna solicitud particular.">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="6Le8idYUAAAAALn8sfT60hwpKpts7bmwGtT6F9CW"></div>
                                        </div>
                                        <!-- Change this to a button or input when using this as a form -->
                                        <!--                                        <button type="button" class="btn btn-outline-success pull-left float-left" data-toggle="modal" data-target="#modal_complete_form">Formulario Completo!</button>-->
                                        <button type="submit" id="form-submit" class="btn btn-primary pull-right float-right">Registrate ahora!</button><br>
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
                        <div class="form-group col-sm-6">
                            <img src="asset/images/logo.png" width="15%"></img><br><a href=<?php echo $url_company_site ?> target="_blank" class="text-primary">Power by <?php echo $company_name ?></a>
                        </div>
                        <div class="form-group col-sm-6"><br>
                            <div class="fb-share-button" data-href="<?php echo $url_company_kambal ?>/livedemo/ready-registration-form.php" data-layout="button_count" data-size="small"><a target="_blank" href=<?php echo $url_company_facebook ?> class="fb-xfbml-parse-ignore">Compartir</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button id= "btnModal" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style= "display:none;">Open Modal</button>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h2 class="modal-title text-primary">Aviso De Privacidad</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <p class="text-dark">
                            Al dar clic al siguiente botón acepta los términos establecidos por Kambal. Para más información <a href="https://www.focusonservices.com/aviso_privacidad_fos_2013.pdf" target="_blank" class="btn btn-link">aviso</a> de privacidad.
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success" data-dismiss="modal">Acepto Términos de Privacidad</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- The Modal -->
        <div class="modal" id="modal_complete_form">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-success"><span class="pe pe-2x pe-7s-pen text-success"></span>Pre Registro Por favor llene la información que se solicita</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="card text-dark">
                            <div class="card-body">
                                <form role="form" id="datosGenerales" data-toggle="validator" class="shake" autocomplete="off">
                                    <div>
                                        <h5>Oferta</h5>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="Nombre" class="text-success">¿Quién suscribe?</label>
                                                    <select class="form-control" id="tipo_registro" name="tipo_registro" required>
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="interesado">Interesado</option>
                                                        <option value="tutor">Tutor</option>
                                                        <option value="otro">Otro</option>
                                                    </select>
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="interes">Carrera de interés</label>
                                                    <div id="seleOferta" class="seleOferta"></div>
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="Campus">Seleccione el Campus</label>
                                                    <div id="divCampus" class="divCampus"></div>
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="turno">Turno de interés</label>
                                                        <select class="form-control" id="turno" name="turno" required>
                                                            <option value="Matutino">Matutino</option>
                                                            <option value="Vespertino">Vespertino</option>
                                                            <option value="Nocturno">Nocturno</option>
                                                            <option value="Sabatino">Sabatino</option>
                                                            <option value="Dominical">Dominical</option>
                                                            <option value="Martes y Jueves">Martes y Jueves</option>
                                                        </select>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="medio" class="text-primary">Como nos conoció?</label>
                                                    <div id="cMedioContacto" class="cMedioContacto"></div>
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Datos personales</h5>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre</label>
                                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required maxlength="140" >
                                                        <input type="hidden" class="form-control" id="estatus" name="estatus" value="pre-inscrito">
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="apellido_paterno">Apellido paterno</label>
                                                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Ingrese apellido paterno" required maxlength="140" >
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="apellido_materno">Apellido materno</label>
                                                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Ingrese apellido materno" maxlength="140" required >
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label for="email">Correo electrónico</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email" required maxlength="140">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="fecha_nacimiento">F. de nacimiento</label>
                                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Enter fecha_nacimiento" required>
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="edad">Edad</label>
                                                        <input type="number" class="form-control" id="edad" name="edad" placeholder="Ingrese edad" min="17" max="100" required>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="genero">Género</label>
                                                        <select class="form-control" id="genero" name="genero" placeholder="Ingrese genero" required>
                                                            <option value="">Seleccione genero</option>
                                                            <option value="Femenino">Femenino</option>
                                                            <option value="Masculino">Masculino</option>
                                                        </select>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="curp">CURP</label>
                                                        <input type="text" class="form-control" id="curp" name="curp" placeholder="Opcional" maxlength="20" oninput="validarInput(this)" style="text-transform: uppercase" required>
                                                        <pre id="resultado"></pre>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="rfc">RFC</label>
                                                        <input type="text" class="form-control" id="rfc" name="rfc" placeholder="Opcional" maxlength="20" style="text-transform: uppercase" >
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="nss">Seguridad social</label>
                                                        <input type="text" class="form-control" id="nss" name="nss" placeholder="Ingrese nss" style="text-transform: uppercase" >
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="tiposangre">Tipo de sangre</label>
                                                        <input type="text" class="form-control" id="tiposangre" name="tiposangre" placeholder="Ingrese tipo de sangre" maxlength="15" style="text-transform: uppercase">
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="alergias">Alergias</label>
                                                    <input type="text" class="form-control" id="alergias" name="alergias" placeholder="Ingrese alergias" maxlength="200">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Datos de contacto</h5>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="emergencias">Tel emergencias</label>
                                                    <input type="text" class="form-control" id="emergencias" name="emergencias" placeholder="Enter emergencias">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="telefono">Teléfono</label>
                                                        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingrese telefono" maxlength="20" required>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="movil">Móvil</label>
                                                        <input type="tel" class="form-control" id="movil" name="movil" placeholder="Ingrese movil" maxlength="20" required>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="email2">Correo alterno</label>
                                                        <input type="email" class="form-control" id="email2" name="email2" placeholder="Ingrese email2" maxlength="140">
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Dirección</h5>
                                        <div class="row">
                                            <div id="locationField" class="col-sm-12">
                                                <label for="email2">Ingrese la dirección</label>
                                                <input id="autocomplete" class="form-control" placeholder="Escriba la dirección de la persona" onFocus="geolocate()" type="text"/>
                                            </div>
                                        </div>
                                        <!-- Note: The address components in this sample are typical. You might need to adjust them for
                                                   the locations relevant to your app. For more information, see
                                             https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
                                        -->
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="Dirección">Dirección</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control col-sm-2" placeholder="#" name="num" id="street_number">
                                                    <input type="text" class="form-control" id="route" name="direccion" disabled="true">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="ciudad">Ciudad</label>
                                                    <input type="text" class="form-control" id="locality" name="ciudad" disabled="true">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="estado">Estado</label>
                                                    <input type="text" class="form-control" id="administrative_area_level_1" name="municipio" disabled="true">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="cp">CP</label>
                                                    <input type="text" class="form-control" id="postal_code" name="cp" disabled="true">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="pais">País</label>
                                                    <input type="text" class="form-control" id="country" name="pais" disabled="true">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5>Datos escolares</h5>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="escegreso">Escuela de procedencia</label>
                                                        <input type="text" class="form-control" id="escegreso" name="escegreso" placeholder="Ingrese Escuela de egreso" maxlength="140" required>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="nivelegreso">Nivel de procedencia</label>
                                                        <select class="form-control" id="nivelegreso" name="nivelegreso" placeholder="Ingrese nivel de egreso" required>
                                                            <option value="Medio Superior">Medio Superior</option>
                                                            <option value="Superior Licenciatura">Superior Licenciatura</option>
                                                            <option value="Superior Maestría">Superior Maestría</option>
                                                            <option value="Superior Doctorado">Superior Doctorado</option>
                                                        </select>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="fechaegreso">Año de egreso</label>
                                                        <input type="number" class="form-control" id="fechaegreso" name="fechaegreso" placeholder="Ingrese año de egreso" required="">
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="infoadicional">Información Adicional</label>
                                                <textarea class="form-control" rows="2" id="infoadicional" name="infoadicional" placeholder="Ingrese Info Adicional" maxlength="200"></textarea>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="comment" class="text-primary">Comentarios:</label>
                                                <textarea class="form-control" rows="5" id="comentarios" name="comentarios" placeholder="puede sugerir horario de llamada, o agregar alguna solicitud particular."></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="g-recaptcha pull-left" data-sitekey="6Le8idYUAAAAALn8sfT60hwpKpts7bmwGtT6F9CW"></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="submit" id="btn_form" class="btn btn-success btn-lg pull-right ">Registrarse Ahora!</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="msg" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </form>
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

        <!-- Loader GIF JS -->
        <script type="text/javascript" src="asset/js/loader.js"></script>
        <!-- Draggable personalite CSS -->
        <script src="asset/js/sweetalert2/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="asset/js/sweetalert2/sweetalert2.min.css">

        <!-- Web Service Login -->
        <script src="asset/js/validator.min.js"></script>
        <script src="asset/js/ready-registration-form.js"></script>

        <script>
                                                    $(document).ready(function () {
                                                        $('#btnModal').click();
                                                        getOferta();
                                                        cMedioContacto();
                                                        getCampusPlantel();
                                                    });
        </script>

        <script>
            $("#datosGenerales").validator().on("submit", function (event) {
                if (event.isDefaultPrevented()) {
                    // handle the invalid form...
                    formError();
                    submitMSG(false, "Llene los campos obligatorios");
                } else {
                    // everything looks good!
                    event.preventDefault();
                    submitForm();
                }
            });

            function submitForm() {
                var dataString = $('#datosGenerales').serialize();
                //alert('data '+dataString);
                swalert('Mensaje!', 'Procesando...', 'info');


                $.ajax({
                    type: "POST",
                    url: "dataConect/registration.php",
                    data: "action=addDatosGenerales&" + dataString,
                    success: function (text) {
                        console.log(text);
                        if (text == "success") {
                            swalert('Exito!', 'Muchas Gracias, en breve nos comunicaremos con usted', 'success');
                            formSuccess();
                        } else {
                            swalert('Mensaje!', text, 'info');
                            submitMSG(false, text);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);
                        console.log(textStatus);
                        console.log(errorThrown);
                        alert("No fue posible conectar con el servidor");
                        submitMSG(false, "No fue posible conectar con el servidor");
                    }
                });
            }

            function formSuccess() {
                $("#datosGenerales")[0].reset();
                $("#modal_complete_form .close").click()
            }

            function formError() {
                $("#datosGenerales").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                    $(this).removeClass();
                });
            }

            function submitMSG(valid, msg) {
                if (valid) {
                    var msgClasses = "h3 text-center tada animated text-success";
                } else {
                    var msgClasses = "h3 text-center text-danger";
                }
                $("#msg").removeClass().addClass(msgClasses).text(msg);
            }
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
        <script>
            function validarInput(input) {
                var curp = input.value.toUpperCase(),
                        resultado = document.getElementById("resultado"),
                        valido = "No válido";
                if (curpValida(curp)) {
                    valido = "Válido";
                    resultado.classList.add("ok");
                } else {
                    resultado.classList.remove("ok");
                }
                // resultado.innerText = "CURP: " + curp + "\nFormato: " + valido;
                resultado.innerText = "Formato: " + valido;
            }

            function curpValida(curp) {
                var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0\d|1[0-2])(?:[0-2]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
                        validado = curp.match(re);
                if (!validado)  //Coincide con el formato general?
                    return false;
                //Validar que coincida el dígito verificador
                function digitoVerificador(curp17) {
                    //Fuente https://consultas.curp.gob.mx/CurpSP/
                    var diccionario = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
                            lngSuma = 0.0,
                            lngDigito = 0.0;
                    for (var i = 0; i < 17; i++)
                        lngSuma = lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
                    lngDigito = 10 - lngSuma % 10;
                    if (lngDigito == 10)
                        return 0;
                    return lngDigito;
                }
                if (validado[2] != digitoVerificador(validado[1]))
                    return false;
                return true; //Validado
            }
        </script>
        <script>
            // This sample uses the Autocomplete widget to help the user select a
            // place, then it retrieves the address components associated with that
            // place, and then it populates the form fields with those details.
            // This sample requires the Places library. Include the libraries=places
            // parameter when you first load the API. For example:
            // <script
            // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

            var placeSearch, autocomplete;

            var componentForm = {
                street_number: 'short_name',
                route: 'long_name',
                locality: 'long_name',
                administrative_area_level_1: 'short_name',
                country: 'long_name',
                postal_code: 'short_name'
            };

            function initAutocomplete() {
                // Create the autocomplete object, restricting the search predictions to
                // geographical location types.
                autocomplete = new google.maps.places.Autocomplete(
                        document.getElementById('autocomplete'), {types: ['geocode']});

                // Avoid paying for data that you don't need by restricting the set of
                // place fields that are returned to just the address components.
                autocomplete.setFields('address_components');

                // When the user selects an address from the drop-down, populate the
                // address fields in the form.
                autocomplete.addListener('place_changed', fillInAddress);
            }

            function fillInAddress() {
                // Get the place details from the autocomplete object.
                var place = autocomplete.getPlace();

                for (var component in componentForm) {
                    document.getElementById(component).value = '';
                    document.getElementById(component).disabled = false;
                }

                // Get each component of the address from the place details,
                // and then fill-in the corresponding field on the form.
                for (var i = 0; i < place.address_components.length; i++) {
                    var addressType = place.address_components[i].types[0];
                    if (componentForm[addressType]) {
                        var val = place.address_components[i][componentForm[addressType]];
                        document.getElementById(addressType).value = val;
                    }
                }
            }

            // Bias the autocomplete object to the user's geographical location,
            // as supplied by the browser's 'navigator.geolocation' object.
            function geolocate() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var geolocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        var circle = new google.maps.Circle(
                                {center: geolocation, radius: position.coords.accuracy});
                        autocomplete.setBounds(circle.getBounds());
                    });
                }
            }
        </script>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v6.0"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCABXOLbXlqxpYVeGDggtlghS5DLASUCxU&libraries=places&callback=initAutocomplete" async defer></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </body>
</html>

