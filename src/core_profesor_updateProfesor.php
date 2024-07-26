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
    <div class="card">
        <div class="d-flex">
            <div class="p-2 mr-auto">
                <div class="page-header-title">
                    <i class="<?php echo "$breadcrumb_icon $breadcrumb_icon_color"; ?>"></i>
                    <div class="d-inline">
                        <h4 id="cabecera"></h4>
                        <span id="subcabecera"></span><br>
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
                <a class="nav-link text-warning" data-toggle="pill" href="#updateGen"><i class="fas fa-info-circle"></i> Actualizar información personal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-info" data-toggle="pill" href="#docs"><i class="far fa-file-word"></i> Documentación</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-success" data-toggle="pill" href="#Academico"><i class="fas fa-landmark"></i> Grupos</a>
            </li>
        </ul>
    </div>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="home" class="tab-pane active">
            <?php include './editarProfesorProfile.php'; ?>
        </div>
        <div id="updateGen" class="tab-pane">
            <?php include './core_profesor_actualizaProfesor.php'; ?>
        </div>
        <div id="docs" class="tab-pane">
            <?php include './core_profesor_documentacion.php'; ?>
        </div>
        <div id="Academico" class="tab-pane">
            noting to do...
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        var idigenerales = <?php echo $idi = $_GET['idiprofesor'] ?>;
        var idiprofesor = <?php echo $_GET['idiprofesor'] ?>;
        getProfesorById(idigenerales); //consulta ofrta academica
        getImageUserByID(idiprofesor); //consulta getImageUserByID de alumnos
        getSignUserByID(idiprofesor);
    });
</script>
<script>
    function getImageUserByID(idiprofesor) {
        //getImageAlumnoByID
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getImageProfesorByID&idiprofesor=" + idiprofesor,
            success: function (text) {
                //console.log(text.data.nombre);
                $("#imageUser").html('<img src="dataConect/upload/' + text.data[0].imagen_perfil + '" alt="" class="img-fluid p-b-10">');
            }
        });
    }

    function getSignUserByID(idiprofesor) {
        //getImageAlumnoByID
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getSignUserByID&idiprofesor=" + idiprofesor,
            success: function (text) {
                //console.log(text.data.nombre);
                $("#imageFirma").html('<img src="sign/doc_signs/' + text.data[0].imagen_firma + '" alt="" class="img-fluid p-b-10">');
            }
        });
    }
</script>
<script src="asset/js/validaCURP.js"></script>
<script src="asset/js/calculaEdad.js"></script>
<script>
    function getProfesorById(idiprofesor) {
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getDatosProfesorbyId&idiprofesor=" + idiprofesor,
            success: function (text) {
                console.log(text);
                var date = text.data;
                for (x in date) {
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
                    var grado = date[x].grado;
                    var campus = date[x].campus;
                    var perfil = date[x].perfil;
                }
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
                $("#cabecera").append(nombre + " " + apellido_paterno + " " + apellido_materno);
                $("#subcabecera").append('Perfil: ' + perfil + " Grado: " + grado + " Campus: " + campus);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                // alert("No fue posible conectar con el servidor");

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
    var idiprofesor = <?php echo $_GET['idiprofesor'] ?>;
    /**
     fucnciones para el pad de firma
     */
    $(document).ready(function () {
        $('.sigPad').signaturePad({drawOnly: true, drawBezierCurves: true, lineTop: 90});
    });

    $("#btnSaveSign").click(function (e) {
        html2canvas([document.getElementById('sign-pad')], {
            onrendered: function (canvas) {
                var canvas_img_data = canvas.toDataURL('image/png');
                var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
                //ajax call to save image inside folder
                $.ajax({
                    url: 'sign/save_sign.php',
                    data: {img_data: img_data},
                    type: 'post',
                    dataType: 'json',
                    success: function (response) {
                        var sign = response.file_name;
                        //console.log(idialumno);
                        //updateSignByIdiAlumno
                        updateSignProfesorById(sign, idiprofesor);
                    }
                });
            }
        });
    });

    function updateSignProfesorById(sign, idiprofesor) {
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: 'action=updateSignProfesorById&sign=' + sign + '&idiprofesor=' + idiprofesor,
            success: function (text) {
                swalert(text);
            }
        });
    }
</script>