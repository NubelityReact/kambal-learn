<?php
$errorMSG = "";
//idialumno
if (empty($_GET["org"])) {
    $errorMSG = "org is required ";
} else {
    $org = strtolower($_GET["org"]);
}
if (empty($_GET["oferta"])) {
    $errorMSG .= "oferta is required ";
} else {
    $oferta = $_GET["oferta"];
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

    <title>Kambal</title>
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
    <script src="asset/js/sweetalert2/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="asset/js/sweetalert2/sweetalert2.min.css">
    <!-- ICON personalite CSS -->
    <link rel="stylesheet" href="asset/css/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="asset/css/pe-icon-7-stroke/css/helper.css">
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
                    <div class="panel-heading"><div><a href="index.php"><img src="asset/images/logo/<?php echo "$logo";?>" width="20%"></a></div>
                        <h3 class="panel-title"></h3><br>   
                    </div>
                    <div class="panel-body">
                        <div class="container">
                            <h2 class="text-center text-dark vacante_oferta"></h2>
                            <br>
                        </div>
                        <div class="row" id="ofering">
                            <div class="col-sm-12">
                                <form role="form" id="contactForm" data-toggle="validator" class="shake" autocomplete="off">
                                    <div class="card">
                                        <div class="card-header text-danger"><strong>Es necesario que completes la siguiente información.</strong></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-7 text-dark">
                                                    <input type="hidden" class="form-control" name="query_action" id="query_action" value="insert" required>
                                                    <input type="hidden" class="form-control" name="org" id="org" value = "<?php echo $org; ?>" required>
                                                    <input type="hidden" class="form-control" name="idicampus" id="idicampus" required>
                                                    <input type="hidden" class="form-control" name="idicarrera" id="idicarrera" required>
                                                    <input type="hidden" class="form-control" name="NivelId" id="NivelId" required>
                                                    <input type="hidden" class="form-control" name="interes" id="interes" required>
                                                    <input type="hidden" class="form-control" name="idinotification" id="idinotification" required>
                                                    <input type="hidden" class="form-control" name="lms_course_id" id="lms_course_id" required>

                                                    <div id="oferta_form_inputs"></div>
                                                    <!-- <div class="form-group">
                                                        <label for="Captcha" class="text-primary">Marque la casilla del Captcha</label>
                                                        <div class="g-recaptcha" data-sitekey="6Le8idYUAAAAALn8sfT60hwpKpts7bmwGtT6F9CW"></div>
                                                    </div> -->
                                                </div>
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
                                        <div class="card-footer">
                                            <button type="submit" id="form-submit" class="btn btn-primary pull-right float-right">Regístrate ahora!</button><br>
                                        </div>
                                    </div>
                                </form>
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
                        <img src="asset/images/logo.png" width="15%"></img><br><a href="https://www.focusonservices.com/" target="_blank" class="text-primary">Power by Focus On Services</a>
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

    <script>
            $(document).ready(function () {
                $('#btnModal').click();
                get_oferta_form_idicarrera();
                getCampusPlantel();
                getCarreras();
            });
    </script> 
    <script>
        function getCarreras() {
            var idicarrera = "<?php echo $oferta; ?>";
            $.ajax({
                type: "GET",
                url: "dataConect/registration.php",
                data: "action=getCarrerasID&idicarrera=" + idicarrera,
                success: function (text) {
                    var date = text.data[0];
                    $('#idicarrera').val(date.idicarrera);
                    $('#idicampus').val(date.idicampus);
                    $('.vacante_oferta').html(date.nombre);
                    $('#interes').val(date.nombre);
                    $('.vacante_campus').html(date.campus);
                    $('#deadline').val(date.deadline);
                    $('#NivelId').val(date.NivelId);
                    $('#campus').val(date.campus);
                    $('#nivel').val(date.nivel);
                    $('#suspended').val(date.suspended);
                    $('#working_day').val(date.working_day);
                    $('#salary').val(date.salary);
                    $('#lms_course_id').val(date.lms_course_id);
                    $('#idinotification').val(date.idinotification);

                    $('.name_template').html(date.nombre);
                    $('#description').val(date.description);
                    $('#comments').val(date.comments);
                    $('#message').val(date.message);
                    $('#files_name').val(date.files_name);

                    var str = date.files_name;
                    var n = str.length;
                    if (n > 3) {
                        $('#arc_adjunto').html('<label onclick="showFile(' + idicarrera + ')" class="text-dark"><i class="fa fa-paperclip pe-2x text-success"></i> Ver archivo adjunto: <a href="#">' + date.files_name + '</a></label>  ');
                    } else {
                        $('#arc_adjunto').html('<br>');
                    }
                    $("#link-oferta").html('<a href="core_postularme.php?org=' + org + '&oferta=' + idicarrera + '" class="btn btn-danger text-light float-right">Postularme</a>');
                    $("#nivel").html(date.nivel);
                    $("#campus").html(date.campus);
                    $("#working_day").html(date.working_day);
                    $("#last_update").html('Publicado el ' + date.last_update);
                    $("#salary").html(date.salary);
                    $("#message").html(date.message);
                    $("#imagen_vacante").html('<center> <img src="asset/images/izzi/' + date.rvoe + '" width="100%"></center>');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
        }
        function get_oferta_form_idicarrera() {
            var idicarrera = "<?php echo $oferta; ?>";
            $("#oferta_form_inputs").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
            $.ajax({
                type: "GET",
                url: "dataConect/registration.php",
                data: "action=get_oferta_form_idicarrera&idicarrera=" + idicarrera,
                success: function (text) {
                    var date = text.data;
                    var txt = '<div class="row text-primary">';
                    for (x in date) {
                        txt += date[x].description;
                    }
                    txt += "</div>"
                    $("#oferta_form_inputs").html(txt);

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#oferta_form_inputs").html('<div class="alert alert-warning"><strong>Sin Resultados</strong> 0 resultados</i></div>');
                }
            });
        }
    </script>
    <script>
        $(document).ready(function () {
            getOferta();
            cMedioContacto();
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
        function cMedioContacto() {
            $(".cMedioContacto").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
            $.ajax({
                type: "GET",
                url: "dataConect/registration.php",
                data: "action=cMedioContacto",
                success: function (text) {
                    var date = text.data;
                    var txt = "";
                    txt += '<select class="form-control fill" id="idimedio" name="idimedio" required>';
                    for (x in date) {
                        txt += '<option value="' + date[x].idimedio + '">' + date[x].medio + '</option>';
                    }
                    txt += "</select>";
                    $(".cMedioContacto").html(txt);
                }
            });
        }

        function getCampusPlantel() {
            $(".divCampus").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
            $.ajax({
                type: "GET",
                url: "dataConect/registration.php",
                data: "action=getCampus",
                success: function (text) {
                    //console.log(text);
                    var date = text.data;
                    var txt = "";
                    txt += '<select class="form-control fill" id="idicampus" name="idicampus" required onchange="getOferta()">';
                    txt += '<option value="">Seleccione</option>';
                    for (x in date) {
                        txt += '<option value="' + date[x].idicampus + '">' + date[x].campus + '</option>';
                    }
                    txt += "</select>";
                    $(".divCampus").html(txt);
                }
            });
        }

        function getOferta() {
            var idicampus = $("#idicampus").val();
            //$(".seleOferta").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
            $.ajax({
                type: "GET",
                url: "dataConect/registration.php",
                data: "action=getCarrerasbyCampus&idicampus=" + idicampus,
                success: function (text) {
                    var date = text.data;
                    var txt = "";
                    txt += '<select class="form-control fill" id="idicarrera" name="idicarrera" required>';
                    txt += '<option value="">Seleccione</option>';
                    for (x in date) {
                        txt += '<option value="' + date[x].idicarrera + '">' + date[x].nombre + '</option>';
                    }
                    txt += "</select>";
                    $(".seleOferta").html(txt);
                    $('#idicarrera').on('change', function () {

                        var interes = $("#idicarrera option:selected").text();

                        $('#interes').val(interes);
                        var idicarrera = $('#idicarrera').val();

                        $.ajax({
                            type: "GET",
                            url: "dataConect/registration.php",
                            data: "action=getCarrerasID&idicarrera=" + idicarrera,
                            success: function (text) {
                                var imagen_vacante = text.data[0].rvoe;
                                $("#imagen_vacante").html('<br><center> <img src="asset/images/izzi/' + imagen_vacante + '" width="70%"></center>');
                            }
                        });
                    });
                }
            });
        }

        function getNivel() {
            var idicampus = $("#idicampus").val();
            $(".divNivel").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
            $.ajax({
                type: "GET",
                url: "dataConect/API.php",
                data: "action=getNivelbyCampus&idicampus=" + idicampus,
                success: function (text) {
                    var date = text.data;
                    var txt = "";
                    txt += '<select class="form-control fillNivelId" id="NivelId" name="NivelId" required>';
                    if (text == "0 results") {
                        txt += '<option value="">0 resultados</option>';
                    } else {
                        txt += '<option value="">Seleccione</option>';
                        for (x in date) {
                            txt += '<option value="' + date[x].NivelId + '" rc="' + date[x].Descripcion + '" >' + date[x].Descripcion + '</option>';
                        }
                    }
                    txt += "</select>";
                    $(".divNivel").html(txt);
                }
            });
        }

        $("#contactForm").validator().on("submit", function (event) {
            if (event.isDefaultPrevented()) {
                // handle the invalid form...
                swalert('Mensaje!', 'Llene los campos requeridos', 'info');
            } else {
                // everything looks good!
                event.preventDefault();
                AgregaAspirante();
            }
        });
        function AgregaAspirante() {
            var dataString = $('#contactForm').serialize();
            var username, firstname, lastname, email;
            email = $("#email").val();
            username = $("#email").val();
            firstname = $("#nombre").val();
            lastname = $("#apellido_paterno").val() + ' ' + $("#apellido_materno").val();
            var interes = $("#interes").val();
            var idinotification = $("#idinotification").val();
            var lms_course_id = $("#lms_course_id").val();
            var org = $("#org").val();
            //lms_course_id = parseInt(lms_course_id);
            idinotification = parseInt(idinotification);

            swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/registration.php",
                data: "action=addDatosGenerales&" + dataString,
                success: function (text) {
                    if (text.valid == "success") {
                        var idigenerales = text.idigenerales;
                        if (lms_course_id > 0) {
                            core_user_create_user_moodle(username, firstname, lastname, email, idigenerales, interes, lms_course_id, org, idinotification);
                        } else {
                            location.href = "./core_postularme_success.php?org=" + org + "&idinotification=" + idinotification;
                        }
                        $("#contactForm")[0].reset();
                    } else {
                        swalert('Mensaje!', text, 'info');
                    }
                }
            });
        }

        function refreshPage() {
            location.reload();
        }

        function swalert(title, texto, type) {
            Swal({
                title: title,
                text: texto,
                type: type,
                confirmButtonText: 'Cerrar'
            })
        }

        function core_user_create_user_moodle(username, firstname, lastname, email, idigenerales, interes, lms_course_id, org, idinotification) {
            $.ajax({
                type: "POST",
                url: "dataConect/moodle.php",
                data: 'action=core_user_create_user_moodle&username=' + username + '&firstname=' + firstname + '&lastname=' + lastname + '&email=' + email,
                success: function (text) {
                    var myJSON = JSON.stringify(text);
                    var valid = myJSON.includes("username");
                    if (valid) {
                        enrol_manual_enrol_users(text[0].id, lms_course_id, idigenerales);
                        core_user_update_institut(text[0].id, interes);
                        location.href = "./core_postularme_success.php?org=" + org + "&idinotification=" + idinotification + "&valid=" + valid;
                    } else {
                        location.href = "./core_postularme_success.php?org=" + org + "&idinotification=" + idinotification + "&valid=" + valid;
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swalert('Mensaje!', jqXHR + " " + textStatus + " " + errorThrown, 'warning');
                }
            });
        }

        function core_user_update_institut(idimoodle, institution) {
            //swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/moodle.php",
                data: 'action=core_user_update_institut&idimoodle=' + idimoodle + '&institution=' + institution,
                success: function (text) {
                    //      swalert('Mensaje!', text, 'info');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //    swalert('Mensaje!', jqXHR + " " + textStatus + " " + errorThrown, 'warning');
                }
            });
        }

        /**
         * Actualiza el campus de cedula almacenando el id de moodel del usuario almacenado
         * @returns {undefined}
         */
        function updateidmoodle(id, idigenerales) {
            $.ajax({
                type: "POST",
                url: "dataConect/registration.php",
                data: "action=updateidmoodle&id=" + id + "&idigenerales=" + idigenerales,
                success: function (text) {
                    console.log('updateidmoodle ' + text);
                }
            });
        }

        function enrol_manual_enrol_users(userid, courseid, idigenerales) {
            //swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/moodle.php",
                data: 'action=enrol_manual_enrol_users&userid=' + userid + '&courseid=' + courseid,
                success: function (text) {
                    console.log('enrol_manual_enrol_users ' + text);
                    updateidmoodle(userid, idigenerales);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swalert('Mensaje!', jqXHR + " " + textStatus + " " + errorThrown, 'warning');
                }
            });
        }

        function showFile(idicarrera) {
            window.open('core_carrera_show_file.php?file=' + idicarrera, 'popUpWindow', 'height=1000,width=800,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
        }

        $("#fecha_nacimiento").change(function (e) {
            var vals = e.target.value.split('-');
            var year = vals[0];
            var month = vals[1];
            var day = vals[2];
            var d = new Date();
            var n = d.getFullYear();
            var edad = n - year;
            console.log(edad);
            $("#edad").val(edad);
        });
    </script>
    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
</body>
</html>

