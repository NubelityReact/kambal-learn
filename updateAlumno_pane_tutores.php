<div class="card card-border-primary">
    <div class="card-header bg-white cfos"> <h4 class="float-right">Tutores</h4></div>
    <div class="card-body">
        <button class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#colapseTutores">Agregar Tutor</button>
        <div id="colapseTutores" class="collapse">
            <form role="form" id="FormaTutores" data-toggle="validator" class="shake" autocomplete="off">                        
                <div class="card">
                    <div class="card-body">
                        <h5>Datos del tutor</h5>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="sel1">Perentesco</label>
                                    <select class="form-control" id="parentesco" name="parentesco" required>
                                        <option value="Madre">Madre</option>
                                        <option value="Padre">Padre</option>
                                        <option value="Hermano">Hermano</option>
                                        <option value="Esposa">Esposa</option>
                                        <option value="Esposo">Esposo</option>
                                        <option value="Tio">Tio</option>
                                        <option value="Tia">Tia</option>
                                        <option value="Primo">Primo</option>
                                        <option value="Sobrino">Sobrino</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombreTutor" name="nombre" placeholder="Enter nombre" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidosTutor" name="apellidos" placeholder="Enter apellidos" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" class="form-control" id="telefonoTutor" name="telefono" placeholder="Enter telefono">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="celular">Teléfono celular</label>
                                    <input type="text" class="form-control" id="celularTutor" name="celular" placeholder="Enter celular">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="emailTutor" name="email" placeholder="Enter email">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="email2">Email Alterno</label>
                                    <input type="email" class="form-control" id="email2Tutor" name="email2" placeholder="Enter email2">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="pais">País</label>
                                    <input type="text" class="form-control" id="paisTutor" value="México" name="pais" placeholder="Enter pais">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cuidad">Ciudad</label>
                                    <input type="text" class="form-control" id="cuidadTutor" name="cuidad" placeholder="Enter cuidad">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="cp">Codigo Postal</label>
                                    <input type="text" class="form-control" id="cpTutor" name="cp" placeholder="Enter cp">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" class="form-control" id="direccionTutor" name="direccion" placeholder="Enter direccion">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="addinfo">Información Adicional</label>
                                    <input type="text" class="form-control" id="addinfoTutor" name="addinfo" placeholder="Enter addinfo">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="form-submit2" class="btn btn-success pull-right ">Guardar datos</button>
                        <div id="msgTS" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
        <hr>
        <div id="tableTutores"></div>
    </div>
</div>