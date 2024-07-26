<!-- The Modal -->
<div class="modal fade" id="editaGrupo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ajustes de grupo</h4><br>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" id="editGroup" data-toggle="validator" class="shake" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control GrupoId" id="GrupoId" name="GrupoId" required readonly="true">
                            <div id="descripcion-grupo"></div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="NivelId">Nivel</label>
                                <div id="seleNivel2"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="CarreraId">Carrera</label>
                                <div id="seleCarrera2"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="CicloId">Ciclo</label>
                                <div id="seleCiclo"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="GradoId">Grado</label>
                                <div id="seleGrado2"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="AulaId">Aula</label>
                                <div id="seleAulas2"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="TurnoId">Turno</label>
                                <div id="seleTurno"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="Clave">Clave</label>
                                <input type="text" class="form-control" id="Clave" name="Clave" placeholder="Enter Clave" required max="20">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div> 
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="Descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Enter Descripcion" required max="250">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="btnAddGrupo" class="btn btn-success pull-right ">Guardar datos</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="Alumno">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Inscribir Alumnos</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="alert"></div>
                <div id="loadTableByCarrera"></div>
            </div>        
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="modalCalificaciones">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ítem de calificación</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="matricula">Matricula</label>
                                <input type="hidden" class="form-control" id="idialumno" name="idialumno" placeholder="Enter idialumno" required>
                                <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Enter matricula" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter nombre" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>