<div class="card card-border-info">
    <div class="card-body">
        <div class="d-flex mb-3">
            <div class="p-2">
                <div class="page-header-title">
                    <i class="fas fa-poll bg-c-yellow"></i>
                    <div class="d-inline">
                        <h4>Perdiodos de evaluación</h4>
                        <a href="core_escolares_grupo.php"><span><p class="pe-7s-back-2"></p> Regresar</span></a>
                        <span class="subcabecera"></span>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <form role="form" id="FormPeriodo" data-toggle="validator" class="shake">
            <h5>Configure los Perdiodos de evaluación</h5><br>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="FechaInicio">Fecha Inicio</label>
                        <input type="date" class="form-control" id="FechaInicio" name="FechaInicio" placeholder="Enter FechaInicio" required>
                        <input type="hidden" class="form-control CicloId" id="CicloId" name="CicloId" placeholder="Enter CicloId" required>
                        <input type="hidden" class="form-control" value="<?php echo $_GET['GrupoId']; ?>"id="GrupoId" name="GrupoId" placeholder="Enter GrupoId" required readonly="true">
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="FechaFin">Fecha Fin</label>
                        <input type="date" class="form-control" id="FechaFin" name="FechaFin" placeholder="Enter FechaFin" required>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="Descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Enter Descripcion" required>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="Abreviatura">Abreviatura</label>
                        <input type="text" class="form-control" id="Abreviatura" name="Abreviatura" placeholder="Enter Abreviatura" required>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="Aula" id="labelTipoEvaluacionPeriodoId">Tipo de evaluacion</label>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for=""></label><br>
                        <button type="submit" id="form-submit" class="btn btn-success pull-right "><i class="fas fa-poll"></i> Guardar Periodo</button>
                    </div>
                </div>
            </div>
            <div id="msgSubmit" class="h3 text-center hidden"></div>
            <div class="clearfix"></div>    
        </form>
        <hr>
        <div class="row">
            <div class="col-sm-10">
                <h5>Periodos</h5>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12" id="loadPeriodoByGrupoId"></div>
        </div>
    </div>
</div>