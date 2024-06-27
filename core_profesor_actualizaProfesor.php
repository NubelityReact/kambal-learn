
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
<div class="card">
    <div class="card-body">
        <form role="form" id="contactForm" data-toggle="validator" class="shake" autocomplete="off">
            <div>
                <div class="card card-border-success">
                    <div class="card-body">
                        <h5>Datos personales</h5>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required maxlength="140" >
                                        <input type="hidden" class="form-control" id="idiprofesor" name="idiprofesor" placeholder="Ingrese idicampus" required maxlength="140" >
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
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Enter fecha_nacimiento">
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
                                        <label for="email2">Correo electrónico alterno</label>
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
                                    <input type="text" class="form-control" id="route" name="direccion" >
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="ciudad">Ciudad</label>
                                    <input type="text" class="form-control" id="locality" name="ciudad" >
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <input type="text" class="form-control" id="administrative_area_level_1" name="municipio" >
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="cp">Código Postal</label>
                                    <input type="text" class="form-control" id="postal_code" name="cp">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="pais">País</label>
                                    <input type="text" class="form-control" id="country" name="pais" >
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <h5>Datos Profesionales</h5>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="cedula">Cedula profesional</label>
                                    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Enter cedula" >
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="grado">Último grado de estudios certificado</label>
                                        <select class="form-control" id="grado" name="grado" placeholder="Ingrese nivel de egreso" required>
                                            <option value="">Seleccione uno</option>
                                            <option value="Licenciatura">Licenciatura</option>
                                            <option value="Maestría">Maestría</option>
                                            <option value="Doctorado">Doctorado</option>
                                            <option value="Técnico">Técnico</option>
                                            <option value="Sin especificar">Sin especificar</option>
                                        </select>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="perfil">Perfil</label>
                                    <input type="text" class="form-control" id="perfil" name="perfil" placeholder="Describa el área de especialidad" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="plantel">Plantel</label>
                                        <div id="divCampus"></div>
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
            </div>
            <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Actualizar datos</button>
            <div id="msgSubmit" class="h3 text-center hidden"></div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        getCampus();
    });
    function getCampus() {
        $("#divCampus").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acciÃ³n puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCampus",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="idicampus" name="idicampus" required>';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idicampus + '">' + date[x].campus + '</option>';
                }
                txt += "</select>";
                $("#divCampus").html(txt);
            }
        });
    }
</script>
<script>
    var idiprofesor = "<?php echo $_GET["idiprofesor"] ?>";

    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getprofesorId&idiprofesor=" + idiprofesor,
            success: function (text) {
                //console.log(text);
                var profesor = text.data[0];
                $("#idiprofesor").val(profesor.idiprofesor);
                $("#idicampus").val(profesor.idicampus);
                $("#nombre").val(profesor.nombre);
                $("#apellido_paterno").val(profesor.apellido_paterno);
                $("#apellido_materno").val(profesor.apellido_materno);
                $("#fecha_nacimiento").val(profesor.fecha_nacimiento);
                $("#email").val(profesor.email);
                $("#telefono").val(profesor.telefono);
                $("#edad").val(profesor.edad);
                $("#genero").val(profesor.genero);
                $("#curp").val(profesor.curp);
                $("#rfc").val(profesor.rfc);
                $("#nss").val(profesor.nss);
                $("#movil").val(profesor.movil);
                $("#route").val(profesor.direccion);
                $("#locality").val(profesor.ciudad);
                $("#administrative_area_level_1").val(profesor.municipio);
                $("#postal_code").val(profesor.cp);
                $("#country").val(profesor.pais);
                $("#tiposangre").val(profesor.tiposangre);
                $("#alergias").val(profesor.alergias);
                $("#infoadicional").val(profesor.infoadicional);
                $("#cedula").val(profesor.cedula);
                $("#grado").val(profesor.grado);
                $("#perfil").val(profesor.perfil);
            }
        });
    });
</script>

<script src="asset/js/updateProfesor.js"></script>
<!--<script src="asset/js/addalumno_setNivel.js"></script>-->
