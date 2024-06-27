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
<div class="card card-border-warning" ng-app="MyFirstApp">
    <div class="card-body" ng-controller="FirstController">
        <div>
            <div class="card-body"> 
                <form role="form" id="datosGenerales" data-toggle="validator" class="shake" autocomplete="off">
                    <div ng-repeat="cliente in posts">
                        <div class="d-flex">
                            <div class="p-2 mr-auto">
                                <div class="page-header-title">
                                    <i class="pe-7s-pen bg-c-yellow"></i>
                                    <div class="d-inline">
                                        <h4>{{cliente.nombre}} {{cliente.apellido_paterno}} {{cliente.apellido_materno}}</h4>
                                        <label><?php echo $breadcrumb_resumen; ?></label><br>
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
                        <hr>
                        <div>
                            <div class="dropdown dropleft float-right">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                    Preferencias <i class="fas fa-cogs"></i>
                                </button>                           
                                <div class="dropdown-menu bg-light">
                                    <a class="dropdown-item" data-toggle="modal" data-target="#modal-email"><i class="pe-7s-mail pe-2x"></i> Enviar Correo Electrónico </a>
                                    <a class="dropdown-item"><i class="pe-7s-date pe-2x"></i>Última actualización: {{cliente.created}}</a>

                                </div>
                            </div><br>
                            <input type="hidden" name="interes" id="interes" value="{{cliente.interes}}">
                            <input type="hidden" name="turno" id="turno" value="{{cliente.turno}}">
                            <h5><span class="text-primary">Oferta</span>: {{cliente.interes}}, <span class="text-success">Estatus</span>: {{cliente.estatus}}</h5>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{cliente.nombre}}" placeholder="Ingrese nombre" required maxlength="140">
                                        <input type="hidden" class="form-control" id="estatus" name="estatus" value="{{cliente.estatus}}">
                                        <input type="hidden" class="form-control" id="idigenerales" name="idigenerales" value="{{cliente.idigenerales}}">
                                        <div class="help-block with-errors text-danger text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="apellido_paterno">Apellido paterno</label>
                                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="{{cliente.apellido_paterno}}" placeholder="Ingrese apellido paterno" required maxlength="140">
                                        <div class="help-block with-errors text-danger text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="apellido_materno">Apellido materno</label>
                                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="{{cliente.apellido_materno}}"placeholder="Ingrese apellido materno" maxlength="140">
                                        <div class="help-block with-errors text-danger text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="interes">Carrera de interés</label>
                                        <input type="text" class="form-control" id="interes" name="interes" value="{{cliente.interes}}" readonly="true" maxlength="140">
                                        <div class="help-block with-errors text-danger text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="email">Correo electrónico</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{cliente.email}}" placeholder="Ingrese email" required maxlength="140">
                                        <div class="help-block with-errors text-danger text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="fecha_nacimiento">F. de nacimiento</label>
                                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{cliente.fecha_nacimiento}}" placeholder="Enter fecha_nacimiento">
                                        <div class="help-block with-errors text-danger text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="edad">Edad</label>
                                            <input type="number" class="form-control" id="edad" name="edad" value="{{cliente.edad}}" placeholder="Ingrese edad" max="100">
                                            <div class="help-block with-errors text-danger text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="genero" title="Previamente seleccionado">Género</label>
                                            <select class="form-control" id="genero" name="genero" placeholder="Ingrese genero" required>
                                                <option value="{{cliente.genero}}">{{cliente.genero}}</option>
                                                <option value="Femenino">Femenino</option>
                                                <option value="Masculino">Masculino</option>
                                            </select>
                                            <div class="help-block with-errors text-danger text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="curp" title="Previamente ingresado">CURP <i class="text-info">({{cliente.curp}})</i></label>
                                            <input type="text" class="form-control" id="curp" name="curp" value="{{cliente.curp}}" placeholder="Ingrese curp" maxlength="20"><pre id="resultado"></pre>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="rfc" title="Previamente ingresado">RFC <i class="text-info">({{cliente.rfc}})</i></label>
                                            <input type="text" class="form-control" id="rfc" name="rfc" value="{{cliente.rfc}}" placeholder="Ingrese rfc" maxlength="20">
                                            <div class="help-block with-errors text-danger text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="nss">Numero de seguridad social</label>
                                            <input type="text" class="form-control" id="nss" name="nss" value="{{cliente.nss}}" placeholder="Ingrese nss">
                                            <div class="help-block with-errors text-danger text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="tiposangre">Tipo de sangre</label>
                                            <input type="text" class="form-control" id="tiposangre" name="tiposangre" value="{{cliente.tiposangre}}" placeholder="Ingrese tipo de sangre" maxlength="15">
                                            <div class="help-block with-errors text-danger text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="alergias">Alergias</label>
                                        <input type="text" class="form-control" id="alergias" name="alergias" value="{{cliente.alergias}}" placeholder="Ingrese alergias" maxlength="200">
                                        <div class="help-block with-errors text-danger text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h5>Datos de contacto</h5>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="emergencias">Teléfono de emergencias</label>
                                        <input type="text" class="form-control" id="emergencias" name="emergencias" value="{{cliente.emergencias}}" placeholder="Enter emergencias">
                                        <div class="help-block with-errors text-danger text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <input type="tel" class="form-control phone" id="telefono" name="telefono" value="{{cliente.telefono}}" placeholder="Ingrese telefono" maxlength="20">
                                            <div class="help-block with-errors text-danger text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="movil">Móvil</label>
                                            <input type="tel" class="form-control phone" id="movil" name="movil" placeholder="Ingrese movil" value="{{cliente.movil}}" maxlength="20">
                                            <div class="help-block with-errors text-danger text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="email2">Correo electrónico alterno</label>
                                            <input type="email" class="form-control" id="email2" name="email2" value="{{cliente.email2}}" placeholder="Ingrese email2" maxlength="140">
                                            <div class="help-block with-errors text-danger text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h5>Dirección</h5>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="pais">País</label>
                                        <input type="text" class="form-control" value="México" id="pais" name="pais" value="{{cliente.pais}}" placeholder="Ingrese pais" maxlength="140">
                                        <div class="help-block with-errors text-danger text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad</label>
                                        <select id="jmr_contacto_estado" class="form-control"  name="ciudad">
                                            <option>Selecciona el estado</option>
                                        </select>
                                        <div class="help-block with-errors text-danger text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="municipio">Municipio/Alcaldia</label>
                                        <select id="jmr_contacto_municipio" class="form-control"  name="municipio">
                                            <option>Selecciona el municipio</option>
                                        </select>
                                        <div class="help-block with-errors text-danger text-danger"></div>
                                    </div>
                                </div>                               
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="direccion">Calle y numero</label>
                                        <input type="text" class="form-control" id="direccion" value="{{cliente.direccion}}" name="direccion" placeholder="Ingrese direccion" maxlength="140">
                                        <div class="help-block with-errors text-danger text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="cp">Código postal</label>
                                            <input type="text" class="form-control" id="cp" name="cp" value="{{cliente.cp}}" placeholder="Ingrese CP" maxlength="5">
                                            <div class="help-block with-errors text-danger text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="escegreso">Escuela de procedencia</label>
                                            <input type="text" class="form-control" id="escegreso" name="escegreso" value="{{cliente.escegreso}}" placeholder="Ingrese Escuela de egreso" maxlength="140">
                                            <div class="help-block with-errors text-danger text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="nivelegreso">Nivel de procedencia</label>
                                            <select class="form-control" id="nivelegreso" name="nivelegreso" placeholder="Ingrese nivel de egreso" required>
                                                <option value="{{cliente.nivelegreso}}">{{cliente.nivelegreso}}</option>
                                                <option value="Medio Superior">Medio Superior</option>
                                                <option value="Superior Licenciatura">Superior Licenciatura</option>
                                                <option value="Superior Maestría">Superior Maestría</option>
                                                <option value="Superior Doctorado">Superior Doctorado</option>
                                            </select>
                                            <div class="help-block with-errors text-danger text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="fechaegreso">Año de egreso</label>
                                            <input type="number" class="form-control" value="{{cliente.fechaegreso}}" id="fechaegreso" name="fechaegreso" placeholder="Ingrese año de egreso">
                                            <div class="help-block with-errors text-danger text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="infoadicional">Información Adicional</label>
                                        <input type="text" class="form-control" id="infoadicional" value="{{cliente.infoadicional}}" name="infoadicional" maxlength="200"></textarea>
                                        <div class="help-block with-errors text-danger text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="comentarios">Comentarios</label>
                                        <input type="text" class="form-control" id="comentarios" value="{{cliente.comentarios}}" name="comentarios" maxlength="200"></textarea>
                                        <div class="help-block with-errors text-danger text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="last_update">Última modificación</label>
                                        <input type="text" class="form-control" id="last_update" value="{{cliente.last_update}}" name="last_update" readonly="true"></textarea>
                                        <div class="help-block with-errors text-danger text-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right "><span class="pe-7s-diskette"></span> Guardar datos</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="modal-preferencias">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fas fa-cogs text-primary"></i> Preferencias > Cambiar estatus </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <span>Si usted desea cambiar el estatus del aspirante seleccione la opción que mejor se ajuste a la situación.</span>
                        <hr>
                        <div id="seleEstatus"></div>
                        <br>
                        <div id="seleMotivos"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="modal-email">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fas fa-cogs text-primary"></i> Preferencias > Enviar un correo electrónico al aspirante </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <span>
                            Puedes enviar por correo electrónico cualquier mensaje al aspirante con el fin de motivarlo a inscribirse. Puedes enviarla tantas veces como quieras.
                        </span>
                        <hr>
                        <form role="form" id="sendEmailForm" data-toggle="validator" class="shake">
                            <div ng-repeat="cliente in posts">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="name" class="h4">Nombre</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{cliente.nombre}} {{cliente.apellido_paterno}} {{cliente.apellido_materno}}" placeholder="Enter name" required readonly="true">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="email" class="h4">Correo electrónico</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{cliente.email}}" placeholder="Enter email" required>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
<!--                                    <div class="form-group col-sm-12">
                                        <label for="doc" class="h4">Documento adjunto (Opcional)</label>
                                        <input type="file" class="form-control" name="archivo" id="archivo" size="30">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>-->
                                </div>
                                <div class="form-group">
                                    <label for="Mensaje" class="h4 ">Cuerpo del mensaje</label>
                                    <textarea id="message" name="message" class="form-control" rows="10" placeholder="Enter your message" required></textarea>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                                <button type="submit" id="form-submit" class="btn btn-success pull-right "><span class="pe-7s-mail-open-file"></span> Guardar datos</button>
                            </div>
                        </form>

                        <div id="msg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
<script type="text/javascript" src="asset/js/validator.min.js"></script>
<script src="asset/js/angular.min.js"></script>
<script>
                                            angular.module('MyFirstApp', []).controller("FirstController", function ($scope, $http) {
                                                $scope.posts = [];
                                                var my_var = <?php echo $idi = $_GET['p'] ?>;
                                                //console.log(my_var);
                                                $http.get("dataConect/API.php?action=getAspirantesById&idigenerales=" + my_var)
                                                        .success(function (data) {
                                                            //console.log(data.data);
                                                            $scope.posts = data.data;
                                                        })
                                                        .error(function (err) {
                                                            console.log(err);
                                                        });
                                            });
</script>

<script>
    $("#sendEmailForm").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formErrormodal();
            submitMSGModal(false, "Complete los campos requeridos");
        } else {
            // everything looks good!
            event.preventDefault();
            sendEmail();
        }
    });

    function sendEmail() {
        $("#modal-email .close").click();
        swalert('Mensaje', "Procesando...", 'info');
        //Initiate Variables With Form Content
        var dataString = $('#sendEmailForm').serialize();
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=sendEmail&" + dataString,
            success: function (text) {
                swalert("Mensaje!", text, 'success');
            }
        });
    }

    function formErrormodal() {
        $("#datosGenerales").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass();
        });
    }

    function submitMSGModal(valid, msg) {
        if (valid) {
            var msgClasses = "h3 text-center tada animated text-success";
        } else {
            var msgClasses = "h3 text-center text-danger";
        }
        $("#msg").removeClass().addClass(msgClasses).text(msg);
    }
</script>
<script>
    $("#datosGenerales").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Llene los campos obligatorios");
            swalert('Mensaje!', 'Llene los campos obligatorios', 'info');
        } else {
            // everything looks good!
            event.preventDefault();
            submitForm();
        }
    });

    function submitForm() {
        var dataString = $('#datosGenerales').serialize();
        swalert('Mensaje', "Procesando", 'info');
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=putGenerales&" + dataString,
            success: function (text) {
                console.log(text);
                if (text == "Registro actualizado") {
                    swalert('!Exito¡', 'Registro Actualizado correctamente', 'success');
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
        //$("#datosGenerales")[0].reset();
        //submitMSG(true, "Bienvenido!");
        //location.href = "getDatosGenerales.php";
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
        getEstatusAspirante();
        getMotivosAspirante();
        $('.phone').mask('0000-0000');
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
// Obtener estados
    $.ajax({
        type: "POST",
        url: "asset/estados/estados.php",
        data: {estados: "Mexico"}
    }).done(function (data) {
        $("#jmr_contacto_estado").html(data);
    });
// Obtener municipios
    $("#jmr_contacto_estado").change(function () {
        var estado = $("#jmr_contacto_estado option:selected").val();
        $.ajax({
            type: "POST",
            url: "asset/estados/estados.php",
            data: {municipios: estado}
        }).done(function (data) {
            $("#jmr_contacto_municipio").html(data);
        });
    });


    function borrarAspirante(idiuser) {
        var txt;
        var r = confirm("Desea eliminar permanente al aspirante? ");
        if (r) {
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=borrarAspirante&idigenerales=" + idiuser,
                success: function (text) {
                    if (text == "success") {
                        swalert('Exito!', 'Aspirante Eliminado', 'success');
                        location.href = "getDatosGenerales.php";
                    } else {
                        swalert('Error!', text, 'error');
                    }
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }

    function getEstatusAspirante() {
        $("#seleEstatus").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getEstatusAspirante",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<label class="text-primary">Tipo:</label>';
                txt += '<select class="form-control" id="estatus2" name="estatus2" required onchange="setEstatusAspirante()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].value + '">' + date[x].value + '</option>';
                }
                txt += "</select>";
                $("#seleEstatus").html(txt);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#seleEstatus").html('0 resultados ');
            }
        });
    }

    function setEstatusAspirante() {
        var estatus = $('#estatus2').val();
        var idigenerales = "<?php echo $_GET['p']; ?>";
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=setEstatusAspirante&idigenerales=" + idigenerales + "&estatus=" + estatus,
            success: function (text) {
                //swalert('Exito!', text, 'success');
            }
        });
    }

    function getMotivosAspirante() {
        $("#seleMotivos").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getMotivosAspirante",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<label class="text-success">Estatus:</label>';
                txt += '<select class="form-control" id="idiregistromotivo" name="idiregistromotivo" onchange="setMotivosAspirante()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idiregistromotivo + '">' + date[x].motivo + '</option>';
                }
                txt += "</select>";
                $("#seleMotivos").html(txt);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#seleMotivos").html('0 resultados ');
            }
        });
    }

    function setMotivosAspirante() {
        var idiregistromotivo = $('#idiregistromotivo').val();
        var idigenerales = "<?php echo $_GET['p']; ?>";
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=setMotivosAspirante&idigenerales=" + idigenerales + "&idiregistromotivo=" + idiregistromotivo,
            success: function (text) {
                //swalert('Exito!', text, 'success');
            }
        });
    }
</script>