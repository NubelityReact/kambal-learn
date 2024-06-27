<?php include './headers.php'; ?>
<div class="card">
    <div class="card-body">
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
        <div class="card card-border-warning">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="nivel">Seleccione el Nivel</label>
                            <div id="divNivel"></div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="turno">Seleccione un Turno</label>
                            <div id="divTurno"></div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>                        
                </div>
                <hr>
                <h5>Tabla de Horarios</h5>
                <span class="float-right">
                    <div class="btn-group">
                        <a data-toggle="modal" data-target="#modalHoras"><button class="btn btn-success btn-sm"><i class="pe-7s-note"></i> Registrar Nuevo Horario</button></a>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCSV">Subir Horarios CSV <i class="pe-7s-file"></i></button>
                    </div>
                </span>
                <div class="row">
                    <div class="col-sm-12" id="tableCalendario"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="modalHoras">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Registrar Nuevo Horario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" id="formcHorasHorario" data-toggle="validator" class="shake" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="HoraInicial">Hora de Inicio</label>
                                <input type="hidden" class="form-control" id="idiNivel" name="idiNivel" placeholder="Enter idiNivel" required>
                                <input type="hidden" class="form-control" id="idiTurno" name="idiTurno" placeholder="Enter idiTurno" required>
                                <input type="time" class="form-control" id="HoraInicial" name="HoraInicial" placeholder="Enter HoraInicial" required max="20">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div> 
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="HoraFinal">Hora de Término</label>
                                <input type="time" class="form-control time" id="HoraFinal" name="HoraFinal" placeholder="Enter HoraFinal" required max="20">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label></label><br>
                                <button type="submit" id="btnAddHoras" class="btn btn-success pull-right "><i class="ti-alarm-clock"></i> Guardar horario</button>
                            </div>
                        </div>
                    </div>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalUpdateHoras">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar Horario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" id="formUpdateHoras" data-toggle="validator" class="shake" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="HoraInicial">Hora de Inicio</label>
                                <input type="hidden" class="form-control" id="HoraHorarioId" name="HoraHorarioId" placeholder="Enter HoraHorarioId" required>
                                <input type="hidden" class="form-control" id="upNivel" name="upNivel" placeholder="Enter idiNivel" required>
                                <input type="hidden" class="form-control" id="upTurno" name="upTurno" placeholder="Enter idiTurno" required>
                                <input type="time" class="form-control" id="upHoraInicial" name="upHoraInicial" placeholder="Enter upHoraInicial" required max="20">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div> 
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="HoraFinal">Hora de Término</label>
                                <input type="time" class="form-control time" id="upHoraFinal" name="upHoraFinal" placeholder="Enter HoraFinal" required max="20">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label></label><br>
                                <button type="submit" id="btnupHoras" class="btn btn-success pull-right "><i class="ti-alarm-clock"></i> Guardar horario</button>
                            </div>
                        </div>
                    </div>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal" id="modalCSV">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-primary">Subir Horarios CSV <i class="pe-7s-file"></i></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="core_horarios_upload_csv.php" method="post" enctype="multipart/form-data">
                    <h5>Descargue el archivo de muestra y llene las celdas de los campos que se solicitan. </h5>
                    <h5>Despues guardelo en formato CSV delimitado por comas. </h5><br>
                    <label><i class="pe-7s-info pe-2x text-danger"></i> Evite una carga lenta procurando que el archivo no contenga mas de 1000 filas por subida</label>
                    <label><i class="pe-7s-info pe-2x text-warning"></i> Evite agregar filas sin datos.</label>
                    <label><i class="pe-7s-info pe-2x text-info"></i> En la primera columna deberá escribir Número  <strong>ID del Nivel</strong> que está visible en el panel principal, en la lista desplegable de la Izquierda "Seleccione el Nivel"</label>
                    <label><i class="pe-7s-info pe-2x text-info"></i> En la segunda columna deberá escribir Número  <strong>ID del Turno</strong> que está visible en el panel principal, en la lista desplegable de la Izquierda "Seleccione un Turno"</label>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="d">Archivo CSV de ejemplo: </label>
                            <a href="cHorasHorario.csv" class="text-primary">cHorasHorario.csv</a>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="aulas_csv">Seleccione un Archivo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="cHorasHorario" name="cHorasHorario" accept=".csv" required>
                                <label class="custom-file-label" for="customFile">Seleccionar archivo</label>
                            </div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Subir Archivo <i class="pe-7s-file"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include './footer.php'; ?>

<script type="text/javascript" src="asset/js/core_escolares_horario.js"></script>
