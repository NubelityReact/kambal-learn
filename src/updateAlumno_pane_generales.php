<form role="form" id="datosGenerales" data-toggle="validator" class="shake" autocomplete="off">
    <div>
        <div class="card card-border-danger">
            <div class="card-header bg-white cfos"> <h4 class="float-right">Información Personal</h4></div>
            <div class="card-body">
                <h5 class="text-primary"><i class="icofont icofont-surgeon"></i> Datos personales</h5>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required maxlength="140">
                                <input type="hidden" class="form-control" id="estatus" name="estatus" >
                                <input type="hidden" class="form-control" id="idigenerales2" name="idigenerales" >
                                <input type="hidden" class="form-control" id="query_action" name="query_action" value="update">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="apellido_paterno">Apellido paterno</label>
                                <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno"  placeholder="Ingrese apellido paterno" required maxlength="140">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="apellido_materno">Apellido materno</label>
                                <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Ingrese apellido materno" maxlength="140">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
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
                        <div class="form-group">
                            <label for="edad">Edad</label>
                            <input type="number" class="form-control" id="edad" name="edad" placeholder="Ingrese edad" max="100">
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="genero" title="Previamente seleccionado">Género</label>
                            <select class="form-control" id="genero" name="genero" placeholder="Ingrese genero" required>
                                <option value="Sin especificar">Sin especificar</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="genero" title="Previamente seleccionado">Estado Civil</label>
                            <select class="form-control" id="estado_civil" name="estado_civil" title="seleccione Estado Civil" required>
                                <option value="Sin especificar">Sin especificar</option>
                                <option value="Soltero / a">Soltero / a</option>
                                <option value="Casado / a">Casado / a</option>
                                <option value="Unión libre o unión de hecho">Unión libre o unión de hecho</option>
                                <option value="Separado / a">Separado / a</option>
                                <option value="Viudo / a">Viudo / a</option>
                            </select>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="curp" title="Previamente ingresado">CURP</label>
                            <input type="text" class="form-control" id="curp" name="curp" placeholder="Ingrese CURP" maxlength="20" oninput="validarInput(this)" style="text-transform: uppercase" required>
                            <pre id="resultado"></pre>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="rfc" title="Previamente ingresado">RFC </label>
                            <input type="text" class="form-control" id="rfc" name="rfc"  placeholder="Ingrese rfc" maxlength="20">
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="nss">Numero de seguridad social</label>
                            <input type="text" class="form-control" id="nss" name="nss" placeholder="Ingrese nss">
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="tiposangre">Tipo de sangre</label>
                            <input type="text" class="form-control" id="tiposangre" name="tiposangre" placeholder="Ingrese tipo de sangre" maxlength="15">
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="alergias">Alergias</label>
                            <input type="text" class="form-control" id="alergias" name="alergias"  placeholder="Ingrese alergias" maxlength="200">
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
                <hr>
                <h5 class="text-primary"><i class="icofont icofont-ui-touch-phone"></i> Datos de contacto</h5>
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
                <h5 class="text-primary"><i class="icofont icofont-ui-home"></i> Dirección</h5>
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
                            <input type="text" class="form-control" id="postal_code" name="cp" >
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
                <hr>
                <h5 class="text-primary"><i class="icofont icofont-school-bag"></i> Antecedentes escolares</h5>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="escegreso">Institución de procedencia</label>
                            <input type="text" class="form-control" id="escegreso" name="escegreso" placeholder="Ingrese Escuela de egreso" maxlength="140">
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nivelegreso">Nivel de estudios de procedencia</label>
                            <select class="form-control" id="nivelegreso" name="nivelegreso" placeholder="Ingrese nivel de egreso" required>
                                <option value="Medio Superior">Medio Superior</option>
                                <option value="Superior Licenciatura">Superior Licenciatura</option>
                                <option value="Superior Maestría">Superior Maestría</option>
                                <option value="Superior Doctorado">Superior Doctorado</option>
                                <option value="Nivel Básico">Nivel Básico</option>
                            </select>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nivelegreso">Entidad Federativa</label>
                            <div id="entidades"></div>   
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="fecha_inicio">Fecha de Inicio</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="fechaegreso">Fecha de egreso</label>
                            <input type="date" class="form-control" id="fechaegreso" name="fechaegreso" placeholder="Ingrese año de egreso">
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cedula">Cédula</label>
                            <input type="text" maxlength="30" class="form-control" id="cedula" name="cedula" placeholder="Ingrese cedula">
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
                <hr>
                <h5 class="text-primary"><i class="icofont icofont-star"></i> Información Adicional</h5>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="infoadicional">Información Adicional</label>
                        <input class="form-control" id="infoadicional" name="infoadicional" placeholder="Ingrese Info Adicional" maxlength="200">
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <button type="submit" id="form-submit" class="btn btn-success pull-right ">Guardar datos</button>
                <div id="msgSubmit" class="h3 text-center hidden"></div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

</form>