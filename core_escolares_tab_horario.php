<div class="card card-border-warning">
    <div class="card-body">
        <div class="d-flex mb-3">
            <div class="p-2">
                <div class="page-header-title">
                    <i class="ti-alarm-clock bg-pic"></i>
                    <div class="d-inline">
                        <h4>Configure el horario escolar</h4>
                        <a href="core_escolares_grupo.php"><span><p class="pe-7s-back-2"></p> Regresar</span></a>
                        <span class="subcabecera"></span>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <form role="form" id="FormHorarioGrupo" data-toggle="validator" class="shake">
            <h5>Seleccione los datos de la materia</h5><br>
            <div class="row">
                <div class="col-sm-1">
                    <div class="form-group">
                        <label for="GrupoId">Grupo</label>
                        <input type="text" class="form-control" id="GrupoId" name="GrupoId" placeholder="Enter GrupoId" required readonly="true">
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="HorarioId" id="labelHorario">Horario</label>
<!--                                        <input type="text" class="form-control" id="HorarioId" name="HorarioId" placeholder="Enter HorarioId" required>-->
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="MateriaId" id="labelMateria">Materia</label>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="MaestroId" id="labelMaestros">Profesor</label>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>                      
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="Aula" id="labelAula">Aula</label>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>                      
            </div>
            <h5>Seleccione los dias en la que se impartirá esta materia</h5><br>
            <div class="row">
                <div class="form-group col-sm-1">
                    <label for="AulaLunId">Lunes</label><br>
                    <label class="switch">
                        <input type="checkbox" id="Lun" name="Lun"> 
                        <span class="slider round"></span>
                    </label>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-1">
                    <label for="AulaMarId">Martes</label><br>
                    <label class="switch">
                        <input type="checkbox" id="Mar" name="Mar"> 
                        <span class="slider round"></span>
                    </label>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-1">
                    <label for="AulaMieId">Miercoles</label><br>
                    <label class="switch">
                        <input type="checkbox" id="Mie" name="Mie"> 
                        <span class="slider round"></span>
                    </label>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-1">
                    <label for="AulaJueId">Jueves</label><br>
                    <label class="switch">
                        <input type="checkbox" id="Jue" name="Jue"> 
                        <span class="slider round"></span>
                    </label>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-1">
                    <label for="AulaVieId">Viernes</label><br>
                    <label class="switch">
                        <input type="checkbox" id="Vie" name="Vie"> 
                        <span class="slider round"></span>
                    </label>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-1">
                    <label for="AulaSabId">Sabado</label><br>
                    <label class="switch">
                        <input type="checkbox" id="Sab" name="Sab"> 
                        <span class="slider round"></span>
                    </label>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-sm-1">
                    <label for="AulaDomId">Domingo</label><br>
                    <label class="switch">
                        <input type="checkbox" id="Dom" name="Dom"> 
                        <span class="slider round"></span>
                    </label>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for=""></label><br>
                        <button type="submit" id="form-submit" class="btn btn-success pull-right "><i class="ti-alarm-clock"></i> Guardar Horario</button>
                    </div>
                </div>
            </div>
            <div id="msgSubmit" class="h3 text-center hidden"></div>
            <div class="clearfix"></div>    
        </form>
        <hr>
        <div class="row">
            <div class="col-sm-10">
                <h5>Horario</h5>
            </div>
            <div class="col-sm-2 align-self-sm-center">
                <a href="core_reporte_horario_escolar.php?GrupoId=<?php echo $_GET['GrupoId']; ?>" target="_blank" onclick="window.open(this.href, this.target, 'width=1000,height=500'); return false;" class="btn btn-primary btn-sm" title="Imprimir Horario Escolar"><i class="pe-7s-print"></i> Imprimir Horario Escolar</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12" id="divTableHorarioEscolar"></div>
        </div>
    </div>
</div>