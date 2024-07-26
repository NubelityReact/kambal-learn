<?php include './headers.php'; ?>
<div class="card">
    <div class="card-body">
        <form role="form" id="FormInscrpcion" data-toggle="validator" class="shake" autocomplete="off">
            <div>
                <div class="d-flex">
                    <div class="p-2 mr-auto">
                        <div class="page-header-title">
                            <i class="<?php echo "$breadcrumb_icon $breadcrumb_icon_color"; ?>"></i>
                            <div class="d-inline">
                                <h4><?php echo $breadcrumb_descripcion; ?></h4>            
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
                <div class="card card-border-success">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="apellidos">Nombre</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required maxlength="140" readonly="true">
                                            <input type="hidden" class="form-control" id="idigenerales" name="idigenerales">
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#myModal" id="abreAspirantes">Aspirantes <i class="pe-7s-search"></i></button> 
                                            </div>
                                        </div>
                                    </div>                                            
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="apellido_paterno">Apellido paterno</label>
                                            <input type="text" readonly="true" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Ingrese apellido paterno" required maxlength="140">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="apellido_materno">Apellido materno</label>
                                            <input type="text" readonly="true" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Ingrese apellido materno" maxlength="140">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Correo electrónico</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email" required maxlength="140" readonly="true">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <center> <label for="certificado">Desea inscribir al alumno a Moodle? No / Sí</label></center><br>
                                        <label class="switch float-right">
                                            <input type="checkbox" name="moodle" id="moodle" value="si">
                                            <span class="slider round"></span>
                                        </label>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group" data-toggle="tooltip" data-placement="top" title="Puede asignar un porcentaje de descuento a las colegiaturas del estudiante">
                                            <label for="beca_colegiatura">Beca en colegiatura</label>
                                            <input type="number" value="0" min="0" max="100" class="form-control" id="beca_colegiatura" name="beca_colegiatura" placeholder="Enter beca_colegiatura" required>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="idicampus">Plantel</label>
                                            <div id="selectPlantel"></div>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="nivelegreso">Carrera</label>
                                            <div id="Oferta-Academica"></div>
                                            <input type="hidden" class="form-control" id="carrera" name="carrera"  readonly="true">
                                            <input type="hidden" class="form-control" id="categoria" name="categoria"   readonly="true">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="nivelegreso">Ciclo escolar</label>
                                                <div id="divCiclo"></div>
<!--                                                <select class="form-control" id="generacion" name="generacion" required>
                                                    <option value="">Seleccione</option>
                                                    <option value="192">2019-2</option>
                                                    <option value="193">2019-3</option>
                                                    <option value="194">2019-4</option>
                                                    <option value="201">2020-1</option>
                                                    <option value="202">2020-2</option>
                                                </select>-->
                                                <input type="hidden" class="form-control" id="clave" name="clave" placeholder="Enter clave" required>
                                                <input type="hidden" class="form-control" id="nivel" name="nivel" placeholder="Enter nivel" required>
                                                <input type="hidden" class="form-control" id="idiCarrera" name="idiCarrera" placeholder="Enter idiCarrera" required>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--div class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="matricula">Matrícula</label>
                                                <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Ingrese matricula" maxlength="20" required>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>

                                    </div-->
                                </div>
                                <hr>
                                <div class="row">
                                    <input type="hidden" class="form-control" id="cuatrimestre" name="cuatrimestre" value="1" placeholder="Ingrese cuatrimestre" required readonly="true">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="turno">Turno</label>
                                                <select class="form-control" id="turno" name="turno" required>
                                                    <option value="">Seleccione uno</option>
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
                                            <label for="vigencia">Vigencia de la credencial</label>
                                            <input type="date" class="form-control" id="vigencia" name="vigencia" placeholder="Ingrese vigencia" required>
                                            <input type="hidden" class="form-control" id="estatus" name="estatus" value="Activo" required>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="codigo_credencial">Número de la credencial</label>
                                            <input type="text" class="form-control" id="codigo_credencial" name="codigo_credencial" placeholder="Ingrese codigo_credencial">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 bg-light border">
                                <input type="hidden" name="image" class="image-tag">
                                <input type="hidden" name="titulo" value="imagen_perfil">
                                <div id="results" class="text-success text-center">La imagen capturada aparecerá aquí ... <br> Recuerde habilitar el permiso para usar la Camara</div><br>
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#photo"><i class="fa fa-camera-retro"></i> Tomar Foto</button>                                
                            </div>
                        </div>
                    </div>

                </div>
                <div id="spinner-form"></div>
                <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Guardar datos</button>
                <div id="msgSubmit" class="h3 text-center hidden"></div>
                <div class="clearfix"></div>
        </form>
    </div>
</div>
</div>



<!-- The Modal -->
<div class="modal" id="photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Capturar foto</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <center>
                    <div id="my_camera"></div>
                    <div id="results" class="text-success text-center"></div>
                    <input class="btn btn-primary" type=button value="Tomar foto" onClick="take_snapshot()">
                </center>
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Seleccione un aspirante</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="Solpes"></div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="alumno">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Seleccione Un alumno de la lista</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="TablaAlumnos"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>



<?php include './footer.php'; ?>
<script src="asset/js/validaCURP.js"></script>
<script src="asset/js/webcam.min.js"></script>
<script src="asset/js/addalumno_webcam.js"></script>
<script src="asset/js/addalumno_forrms.js"></script>
<script src="asset/js/addalumno_getaOferta.js"></script>
<script src="asset/js/addalumno_setNivel.js"></script>
<script src="asset/js/getCicloEscolar.js"></script>

