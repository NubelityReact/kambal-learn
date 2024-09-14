<?php include './headers.php'; ?>
<style>
    #resultado {
        background-color: red;
        color: white;
        font-weight: bold;
    }
    #resultado.ok {
        background-color: green;
    }
</style>
<div>
    <div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="p-2 mr-auto">
                        <div class="page-header-title">
                            <i class="<?php echo "$breadcrumb_icon $breadcrumb_icon_color"; ?>"></i>
                            <div class="d-inline">
                                <h4 id="cabecera"></h4>
                                <label id="subcabecera" style="font-size: 16px !important;"></label><br>
                                <input type="hidden" id="idigenerales">
                                <input type="hidden" id="idialumno">
                                <span><a href="<?php echo $breadcrumb_btnBack; ?>"><p class="pe-7s-back-2"></p> Regresar</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="page-header-breadcrumb">
                        <div class="breadcrumb-title">
                            <span class="breadcrumb-item">
                                <a href="menu.php">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </span>
                            <span class="breadcrumb-item"><?php echo $breadcrumb_categoria; ?></span>
                            <span class="breadcrumb-item"><?php echo'<a href="' . $breadcrumb_permiso . '">' . $breadcrumb_descripcion . '</a>' ?>
                            </span>
                        </div>
                    </div> 
                </div>
                <!-- Nav pills -->
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-primary" data-toggle="pill" href="#home"><i class="fas fa-id-card-alt"></i> Generales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" data-toggle="pill" href="#Escolares"><i class="fas fa-info-circle"></i> Información escolar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" data-toggle="pill" href="#updateGen"><i class="fas fa-pencil-alt"></i> Información personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" data-toggle="pill" href="#tabtutores"><i class="fas fa-house-damage"></i> Tutores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" data-toggle="pill" href="#documentacion"><i class="far fa-file-word"></i> Documentación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" data-toggle="pill" href="#Adeudos"><i class="fas fa-comments-dollar"></i> Adeudos</a>
                    </li>
                    <!--                    <li class="nav-item">
                                            <a class="nav-link text-c-orange" data-toggle="pill" href="#facturas"><i class="fas fa-file-pdf"></i> Facturas</a>
                                        </li>-->
                    <li class="nav-item">
                        <a class="nav-link text-success" data-toggle="pill" href="#Academico"><i class="fas fa-landmark"></i> Historia Académica</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="home" class="tab-pane active">
                        <?php include './updateAlumno_pane_home.php'; ?>
                    </div>
                    <div id="Escolares" class="tab-pane">
                        <?php include './updateAlumno_pane_card.php'; ?>
                    </div>
                    <div id="updateGen" class="tab-pane">
                        <?php include './updateAlumno_pane_generales.php'; ?>
                    </div>
                    <div id="tabtutores" class="tab-pane">
                        <?php include './updateAlumno_pane_tutores.php'; ?>
                    </div>
                    <div id="documentacion" class="tab-pane">
                        <?php include './updateAlumno_pane_documentacion.php'; ?>
                    </div>
                    <div id="Adeudos" class="tab-pane">
                        <?php include './updateAlumno_pane_cobros.php'; ?>
                        <script src="asset/js/cobro_update_price_vas.js"></script>
                    </div>
                    <div id="facturas" class="tab-pane">
                        <?php include './updateAlumno_pane_facturas.php'; ?>
                    </div>
                    <div id="Academico" class="tab-pane">
                        <?php include './updateAlumno_pane_tabs_academico.php'; ?>
                    </div>
                    <div id="Reporte" class="tab-pane">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './footer.php'; ?>
    <script src="asset/js/dataTableSumColumn.js"></script>
    <script>
        $(document).ready(function () {
            var idigenerales = <?php echo $idi = $_GET['p'] ?>;
            var idialumno = <?php echo $idi = $_GET['idialumno'] ?>;
            $("#idigenerales").val(idigenerales);
            $("#idialumno").val(idialumno);
            getAlumnbyID(idigenerales); //consulta ofrta academica
            getTutoresByID(); //consulta tutores de alumnos
            getImageUserByID(idialumno); //consulta getImageUserByID de alumnos
        });
    </script>
    <script>
        function getImageUserByID() {
            var idialumno = <?php echo $idi = $_GET['idialumno'] ?>;
            $("#imageUser").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
            $.ajax({
                type: "GET",
                url: "dataConect/API.php",
                data: "action=getImageAlumnoByID&idialumno=" + idialumno,
                success: function (text) {
                    //console.log(text.data.nombre);
                    $("#imageUser").html('<img src="dataConect/upload/' + text.data[0].perfil + '" alt="" class="img-fluid p-b-10">');
                    $("#imageSign").html('<img src="sign/doc_signs/' + text.data[0].firma + '" alt="" class="img-fluid p-b-10">');
                }
            });
        }
    </script>
    <script>
        function getTutoresByID() {
            var idialumno = <?php echo $idi = $_GET['idialumno'] ?>;
            $("#tableTutores").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
            $.ajax({
                type: "GET",
                url: "dataConect/API.php",
                data: "action=getTutoresByID&idialumno=" + idialumno,
                success: function (text) {
                    var date = text.data;
                    var txt = "";
                    txt += '<div class="table-responsive"> <table id="tbTu0r" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                    txt += '<thead class="table-primary text-light"> <tr><th>accion</th><th>Parentesco</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Celular</th><th>Correo Electrónico</th><th>Correo Electrónico 2</th><th>pais</th>\n\
                <th>Ciudad</th><th>CP</th><th>Dirección</th><th>Informacion adicional</th><th>Fecha de alta</th></tr> </thead>';
                    for (x in date) {
                        txt += '<tr>';
                        txt += '<td><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar" onclick="deleteTutor(' + date[x].iditutor + ');"><i class="fa fa-trash-alt"></i></button></td>';
                        txt += "<td>" + date[x].parentesco + "</td>";
                        txt += "<td>" + date[x].nombre + "</td>";
                        txt += "<td>" + date[x].apellidos + "</td>";
                        txt += "<td>" + date[x].telefono + "</td>";
                        txt += "<td>" + date[x].celular + "</td>";
                        txt += "<td>" + date[x].email + "</td>";
                        txt += "<td>" + date[x].email2 + "</td>";
                        txt += "<td>" + date[x].pais + "</td>";
                        txt += "<td>" + date[x].cuidad + "</td>";
                        txt += "<td>" + date[x].cp + "</td>";
                        txt += "<td>" + date[x].direccion + "</td>";
                        txt += "<td>" + date[x].addinfo + "</td>";
                        txt += "<td>" + date[x].fecha + "</td>";
                        txt += "</tr>";
                    }
                    txt += "</table> </div>"
                    document.getElementById("tableTutores").innerHTML = txt;
                    var table = $('#tbTu0r').DataTable({
                        responsive: true,
                        dom: 'Bfrtip',
                        buttons: ['excel'],
                        language: {
                            "decimal": "",
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ Entradas",
                            "loadingRecords": "Cargando...",
                            "processing": "Procesando...",
                            "search": "Buscar:",
                            "zeroRecords": "Sin resultados encontrados",
                            "paginate": {
                                "first": "Primero",
                                "last": "Ultimo",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        }
                    });

                    $('#tbTu0r tbody').on('click', 'tr', function () {
                        var datos = table.row(this).data();
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    document.getElementById("tableTutores").innerHTML = "No ha agregado ningún tutor";
                }
            });
        }

        function deleteTutor(iditutor) {
            //swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deleteTutor&iditutor=" + iditutor,
                success: function (text) {
                    if (text == "success") {
                        //swalert('Mensaje!', 'El tutor se eliminó correctamente', 'success');
                        getTutoresByID();
                    } else {
                        swalert('Mensaje!', text, 'info');
                    }
                }
            });
        }
    </script>
    <script src="asset/js/validaCURP.js"></script>
    <script src="asset/js/calculaEdad.js"></script>
    <script src="asset/js/updateAlumno.js"></script>
    <script src="asset/js/updateAlumnoDocumentos.js"></script>
    <script src="asset/js/updateAlumnoTutores.js"></script>
    <script>
        function getAlumnbyID(idigenerales) {
            $.ajax({
                type: "GET",
                url: "dataConect/API.php",
                data: "action=getGeneralesbyID&idigenerales=" + idigenerales,
                success: function (text) {
                    //console.log(text);
                    var date = text.data;
                    for (x in date) {
                        var estado_civil = date[x].estado_civil;
                        var alergias = date[x].alergias;
                        var apellido_materno = date[x].apellido_materno;
                        var apellido_paterno = date[x].apellido_paterno;
                        var ciudad = date[x].ciudad;
                        var cp = date[x].cp;
                        var curp = date[x].curp;
                        var direccion = date[x].direccion;
                        var edad = date[x].edad;
                        var email = date[x].email;
                        var email2 = date[x].email2;
                        var emergencias = date[x].emergencias;
                        var escegreso = date[x].escegreso;
                        var estatus = date[x].estatus;
                        var fecha = date[x].fecha;
                        var fecha_nacimiento = date[x].fecha_nacimiento;
                        var fechaegreso = date[x].fechaegreso;
                        var genero = date[x].genero;
                        var idigenerales = date[x].idigenerales;
                        var infoadicional = date[x].infoadicional;
                        var interes = date[x].interes;
                        var movil = date[x].movil;
                        var municipio = date[x].municipio;
                        var nivelegreso = date[x].nivelegreso;
                        var nombre = date[x].nombre;
                        var nss = date[x].nss;
                        var pais = date[x].pais;
                        var rfc = date[x].rfc;
                        var telefono = date[x].telefono;
                        var tiposangre = date[x].tiposangre;
                        var turno = date[x].turno;
                        var entidad_fed = date[x].entidad_fed;
                        var fecha_inicio = date[x].fecha_inicio;
                        var cedula = date[x].cedula;
                    }
                    $("#estado_civil").val(estado_civil);
                    $("#alergias").val(alergias);
                    $("#apellido_materno").val(apellido_materno);
                    $("#apellido_paterno").val(apellido_paterno);
                    $("#locality").val(ciudad);
                    $("#postal_code").val(cp);
                    $("#curp").val(curp);
                    $("#route").val(direccion);
                    $("#edad").val(edad);
                    $("#email").val(email);
                    $("#email2").val(email2);
                    $("#emergencias").val(emergencias);
                    $("#escegreso").val(escegreso);
                    $("#estatus").val(estatus);
                    $("#fecha").val(fecha);
                    $("#fecha_nacimiento").val(fecha_nacimiento);
                    $("#fechaegreso").val(fechaegreso);
                    $("#genero").val(genero);
                    $("#idigenerales2").val(idigenerales);
                    $("#infoadicional").val(infoadicional);
                    $("#interes").val(interes);
                    $("#movil").val(movil);
                    $("#administrative_area_level_1").val(municipio);
                    $("#nivelegreso").val(nivelegreso);
                    $("#nombre").val(nombre);
                    $("#nss").val(nss);
                    $("#country").val(pais);
                    $("#rfc").val(rfc);
                    $("#telefono").val(telefono);
                    $("#tiposangre").val(tiposangre);
                    $("#turno").val(turno);
                    $("#entidad_fed").val(entidad_fed);
                    $("#fecha_inicio").val(fecha_inicio);
                    $("#cedula").val(cedula);
                    $("#cabecera").append(nombre + " " + apellido_paterno + " " + apellido_materno);

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    document.getElementById("Solpes").innerHTML = errorThrown;
                }
            });
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCABXOLbXlqxpYVeGDggtlghS5DLASUCxU&libraries=places&callback=initAutocomplete"
    async defer></script>

    <link href="sign/css/jquery.signaturepad.css" rel="stylesheet">
    <script src="sign/js/numeric-1.2.6.min.js"></script> 
    <script src="sign/js/bezier.js"></script>
    <script src="sign/js/jquery.signaturepad.js"></script> 

    <script src="asset/js/html2canvas.js"></script>
    <script src="sign/js/json2.min.js"></script>
    <script>
        /**
         fucnciones para el pad de firma
         */
        $(document).ready(function () {
            $('.sigPad').signaturePad({drawOnly: true, drawBezierCurves: true, lineTop: 90});
            getEntdadesFederativas();
        });

        $("#btnSaveSign").click(function (e) {
            html2canvas([document.getElementById('sign-pad')], {
                onrendered: function (canvas) {
                    var canvas_img_data = canvas.toDataURL('image/png');
                    var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
                    //ajax call to save image inside folder
                    console.log("making ajax request")
                    $.ajax({
                        url: 'sign/save_sign.php',
                        data: {img_data: img_data},
                        type: 'post',
                        dataType: 'json',
                        success: function (response) {
                            console.log("Saving sign")
                            var sign = response.file_name;
                            //console.log(idialumno);
                            //updateSignByIdiAlumno
                            updateSignByIdiAlumno(sign, idialumno);
                        },
                        error: function(err) {
                            console.log({err})
                        }
                    });
                }
            });
        });

        function updateSignByIdiAlumno(sign, idialumno) {
            swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: 'action=updateSignByIdiAlumno&sign=' + sign + '&idialumno=' + idialumno,
                success: function (text) {
                    swalert('Mensaje!', text, 'success');
                    getImageUserByID();
                }
            });
        }

        function getEntdadesFederativas() {
            $('#entidades').html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
            $.ajax({
                type: "GET",
                url: "asset/estados/estados.php",
                data: 'estados=Mexico',
                success: function (text) {
                    var date = text.data;
                    var txt = "";
                    txt += '<select class="form-control" id="entidad_fed" name="entidad_fed" placeholder="Ingrese nivel de egreso" required';
                    txt += '<option value="">Selecciona tu estado</option>';
                    for (x in date) {
                        txt += '<option value="' + date[x].estado + '">' + date[x].estado + '</option>';
                    }
                    txt += '</select>';
                    $("#entidades").html(txt);
                }
            });
        }
    </script>

    <script>
        function crear_user_moodle() {
            var txt;
            var r = confirm("Esta seguro inscribir al alumno al Campus virtual?");
            if (r) {
                //
                var username = $('#myMatricula').val();
                var firstname = $('#nombre').val();
                var lastname = $('#apellido_paterno').val() + ' ' + $('#apellido_materno').val();
                var email = $('#email').val();
                var idialumno = "<?php echo $_GET['idialumno']; ?>";
                core_user_create_user_moodle(username, firstname, lastname, email, idialumno);
                //core_user_create_user_moodle()
                getCardAlumnoByID();
            } else {
                txt = "You pressed Cancel!";
            }
        }

        $("#btn_new_password").click(function () {
            var idigenerales = <?php echo $idi = $_GET['p'] ?>;
            var new_password = $('#new_password').val();
            var idimoodle = $('#myidmoodle').val();
            core_user_update_password(idimoodle, new_password);
            restore_password(idigenerales, new_password);
        });

        function update_password_user_moodle(idimoodle, new_password) {
            //var new_password = 'new_password';
            //var idimoodle = $('#myidmoodle').val();
            core_user_update_password(idimoodle, new_password);
        }

        function restore_password(idigenerales, new_password) {
            swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: 'action=restore_password&idigenerales=' + idigenerales + '&new_password=' + new_password,
                success: function (text) {
                    swalert('Mensaje!', text, 'info');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swalert('Mensaje!', jqXHR + " " + textStatus + " " + errorThrown, 'warning');
                }
            });
        }
    </script>

    <script src="asset/js/moodle.js"></script>