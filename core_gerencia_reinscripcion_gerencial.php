<?php include './headers.php'; ?>
<!--<div class="card">
    <div class="card-header bg-fos text-light">Reinscripción de alumnos</div>
</div>-->

<div class="card">
    <div class="card-body">
        <form role="form" id="FormReInscripcion" data-toggle="validator" class="shake" autocomplete="off">
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
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="apellidos">Nombre</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required maxlength="140" readonly="true">
                                            <input type="hidden" class="form-control" id="idialumno" name="idialumno" placeholder="Enter idialumno" required>
                                            <input type="hidden" class="form-control" id="idiarchivo" name="idiarchivo" placeholder="Enter idiarchivo" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#alumno" id="abreAspirantes">Buscar <i class="pe-7s-search"></i></button> 
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
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="matricula">Matrícula</label>
                                            <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Enter matricula" readonly="true">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="categoria">Categoría</label>
                                            <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Enter categoria" required readonly="true">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="carrera">Carrera</label>
                                            <input type="text" class="form-control" id="carrera" name="carrera" placeholder="Enter carrera"  readonly="true">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="cuatrimestre">Cuatrimestre actual</label>
                                            <input type="text" class="form-control" id="cuatrimestre" name="cuatrimestre" placeholder="Enter cuatrimestre"  readonly="true">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="beca_colegiatura">% de beca en colegiaturas</label>
                                            <input type="text" class="form-control" id="beca_colegiatura" name="beca_colegiatura" placeholder="Enter beca_colegiatura" readonly="true">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="promovido">Cuatrimestre promovido</label>
                                            <input type="number" class="form-control" id="promovido" name="promovido" placeholder="Enter promovido" required>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nivelegreso">Ciclo escolar</label>
                                            <div id="divCiclo"></div>
                                            <input type="hidden" class="form-control" id="periodo" name="periodo">
<!--                                            <select class="form-control" id="generacion" name="generacion" required onchange="validAdeudos()">
                                                <option value="">Seleccione</option>
                                                <option value="192">2019-2</option>
                                                <option value="193">2019-3</option>
                                                <option value="194">2019-4</option>
                                                <option value="201">2020-1</option>
                                                <option value="202">2020-2</option>
                                            </select>-->
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group" data-toggle="tooltip" data-placement="top" title="Despues de esta fecha se generará un cargo adicional del 10% en el costo de reincripción">
                                            <label for="termino">Fecha límite para inscripciones</label>
                                            <input type="date" class="form-control" id="termino" name="termino" placeholder="Enter termino" required>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="turno">Turno</label>
                                                <select class="form-control" id="turno" name="turno" required onchange="validAdeudos()">
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
                                            <input type="date" class="form-control" id="vigencia" name="vigencia" placeholder="Ingrese vigencia" required onchange="validAdeudos()">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="codigo_credencial">Número de la credencial</label>
                                            <input autofocus type="text" class="form-control" id="codigo_credencial" name="codigo_credencial" placeholder="Ingrese codigo_credencial" onchange="validAdeudos()">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                </div>
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
<div class="modal fade" id="alumno">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Seleccione un alumno de la lista</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">

                <!--                <div class="float-right">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="inpmatricula" name="inpmatricula" placeholder="Ingrese matricula" required maxlength="30">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button"  id="buscaAlumno">Buscar <i class="pe-7s-search"></i></button> 
                                        </div>
                                    </div>
                                </div>
                                <div id="TablaAlumnos"></div>-->
                <div class="table-responsive">
                    <table id="sumab" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">
                        <thead class="table-primary text-light"> <tr><th>#</th><th>Matricula</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Carrera</th><th>Turno</th><th>Cuatrimestre</th><th>Beca</th><th>Categoria</th> </tr> </thead>
                        <tbody></tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>



<?php include './footer.php'; ?>
<!--<script src="asset/js/webcam.min.js"></script>
<script src="asset/js/addalumno_webcam.js"></script>-->
<script src="asset/js/reinscription_getAlumnos.js"></script>
<script src="asset/js/reinscripcion_gerencial.js"></script>
<script src="asset/js/getCicloEscolar.js"></script>

