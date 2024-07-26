<div class="card card-border-primary">
    <div class="card-body">
        <div class="d-flex mb-3">
            <div class="p-2">
                <div class="page-header-title">
                    <i class="icon fa fa-table  bg-primary"></i>
                    <div class="d-inline">
                        <h4>Calificaciones</h4>
                        <a href="core_escolares_grupo.php"><span><p class="pe-7s-back-2"></p> Regresar</span></a>
                        <span class="subcabecera"></span>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <form role="form" id="formRevalida" data-toggle="validator" class="shake" autocomplete="off">       
            <h5>Capture la calificacion del alumno</h5><br>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="MateriaId" id="labelMateriaC">Materia</label>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Aula">Alumno</label>
                        <div id="SelectAlumno"></div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>  
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="periodo">Periodo de evaluación</label>
                        <div id="SelectPeriodo"></div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="Calificacion">Calificacion</label>
                        <input type="number" min="0" max="10" class="form-control" id="Promedio" name="Promedio" placeholder="Enter Calificacion" required>
                        <input type="hidden" class="form-control" id="NivelId" name="NivelId"  placeholder="Enter NivelId" required>
                        <input type="hidden" class="form-control" id="idicarrera" name="idicarrera" placeholder="Enter idicarrera" required>
                        <input type="hidden" class="form-control CicloId" id="CicloId" name="CicloId" placeholder="Enter CicloId" required>
                        <input type="hidden" class="form-control GrupoId" id="GrupoId" name="GrupoId" placeholder="Enter GrupoId" required>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="button" id="core_reporte_boleta" class="btn btn-primary btn-sm pull-left" data-toggle="tooltip" data-placement="top" title="Generar acta de calificaciones!"><i class="icon fa fa-table"></i> Acta de calificaciones</button>
                    <button type="submit" id="form-submit" class="btn btn-success pull-right"><i class="icon fa fa-table"></i> Guardar calificacion</button>
                </div>
            </div>
            <div id="spinner-form"></div>                        
            <div id="msgSubmit" class="h3 text-center hidden"></div>
            <div class="clearfix"></div>
        </form>
        <hr>
        <div id="loadTableCalificaciones"></div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="modalUpdateNota">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modificar la Nota</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" id="formUpdateNota" data-toggle="validator" class="shake">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nota">Nueva Nota</label>
                                <input type="number" class="form-control" id="Promedio" name="Promedio" required maxlength="3">
                                <input type="hidden" class="form-control" id="CalificacionId" name="CalificacionId" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for=""></label><br>
                                <button type="submit" id="form-submit" class="btn btn-success btn-sm pull-right ">Cambiar Nota</button>
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
