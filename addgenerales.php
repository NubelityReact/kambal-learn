<?php include 'headers.php'; ?>
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
<div class="card card-border-success">
    <div class="card-body">
        <form role="form" id="datosGenerales" data-toggle="validator" class="shake" autocomplete="off">
            <div>
                <div class="d-flex">
                    <div class="p-2 mr-auto">
                        <div class="page-header-title">
                            <i class="<?php echo "$breadcrumb_icon $breadcrumb_icon_color"; ?>"></i>
                            <div class="d-inline">
                                <h4><?php echo $breadcrumb_descripcion; ?></h4>            
                                <label><?php echo $breadcrumb_resumen; ?></label><br>
                                <span><a href="<?php echo $breadcrumb_btnBack; ?>"><p class="pe-7s-back-2"></p>Regresar</a></span>
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
                <hr>
                <div class="card-body">
                    <h5>Oferta</h5>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="interes">Carrera de interés</label>
                                <div id="Oferta-Academica"></div>
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
                                <label for="medio" class="text-primary">Medio por el cual nos conoció</label>
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
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email" required maxlength="140">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="fecha_nacimiento">F. de nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Enter fecha_nacimiento">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="edad">Edad</label>
                                    <input type="number" class="form-control" id="edad" name="edad" placeholder="Ingrese edad" min="17" max="100">
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
                                    <input type="text" class="form-control" id="curp" name="curp" placeholder="Opcional" maxlength="20" oninput="validarInput(this)" style="text-transform: uppercase">
                                    <pre id="resultado"></pre>
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
                                    <label for="nss">Numero de seguridad social</label>
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
                                <label for="emergencias">Teléfono de emergencias</label>
                                <input type="text" class="form-control" id="emergencias" name="emergencias" placeholder="Enter emergencias">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingrese telefono" maxlength="20">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="movil">Móvil</label>
                                    <input type="tel" class="form-control" id="movil" name="movil" placeholder="Ingrese movil" maxlength="20">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="email2">Email alterno</label>
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
                                <label for="cp">Código Postal</label>
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
                                    <input type="text" class="form-control" id="escegreso" name="escegreso" placeholder="Ingrese Escuela de egreso" maxlength="140">
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
                </div>
            </div>
            <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right "><span class="pe pe-7s-diskette"></span> Guardar datos</button>
            <div id="msgSubmit" class="h3 text-center hidden"></div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>



<?php include './footer.php'; ?>
<script src="asset/js/ready-registration-form.js"></script>
<script>
                                $(document).ready(function () {
                                    cMedioContacto();
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
        //swalert('Exito', dataString, 'success');


        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=addGeneral&" + dataString,
            success: function (text) {
                console.log(text);
                if (text == "success") {
                    swalert('!Exito¡', 'Registro guardado correctamente', 'success');
                    formSuccess();
                } else {
                    var KeyDuplicate = text.includes("Duplicate entry");
                    if (KeyDuplicate) {
                        swalert('Error', 'El CURP o RFC Están Duplicados', 'error');
                    } else {
                        formError();
                        submitMSG(false, text);
                    }
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
        submitMSG(true, "Bienvenido!");
        location.href = "getDatosGenerales.php";
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
        $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
    }
</script>
<script>
    $(document).ready(function () {
        getOferta(); //consulta ofrta academica
//        $("#fecha_nacimiento").mouseleave(function () {
//            var cumple = $("#fecha_nacimiento").val();
//            var hoy = new Date();
//            alert(cumple - hoy);
//        });

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
    function getOferta() {
        $("#Oferta-Academica").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getOferta",
            success: function (text) {
                console.log(text);
                console.log(text.data);
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control" id="interes" name="interes" required>';
                txt += '<option value="">Selecciona un elemento de la lista</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].categoria + ' en ' + date[x].nombre + '"><i class="text-info">' + date[x].categoria + '</i> en ' + date[x].nombre + '</option>';
                }
                txt += "</select>";
                document.getElementById("Oferta-Academica").innerHTML = txt;
                $('#idicarrera').on('change', function () {
                    var idiCarrera = this.value;
                    console.log(idiCarrera);
                    getOfertabyId(idiCarrera);
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                alert("No fue posible conectar con el servidor");
                document.getElementById("Solpes").innerHTML = errorThrown;
            }
        });
    }
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCABXOLbXlqxpYVeGDggtlghS5DLASUCxU&libraries=places&callback=initAutocomplete"
async defer></script>