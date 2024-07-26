<?php include './headers.php'; ?>
<div class="card">
    <div class="card-body">
        <div class="card card-border-warning">
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
                <form role="form" id="FormHorarioGrupo" data-toggle="validator" class="shake">
                    <h5>Seleccione los datos de la materia</h5><br>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="GrupoId">Grupo</label>
                                <input type="text" class="form-control" id="GrupoId" name="GrupoId" placeholder="Enter GrupoId" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="HorarioId">Horario</label>
                                <input type="text" class="form-control" id="HorarioId" name="HorarioId" placeholder="Enter HorarioId" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="MateriaId">Materia</label>
                                <input type="text" class="form-control" id="MateriaId" name="MateriaId" placeholder="Enter MateriaId" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="MaestroId">Profesor</label>
                                <input type="text" class="form-control" id="MaestroId" name="MaestroId" placeholder="Enter MaestroId" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>                      
                    </div>
                    <h5>Seleccione los dias y el aula en la que se impartirá esta materia</h5><br>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="AulaLunId">Lunes</label><br>
                            <div class="input-group">
                                <div class="input-group-prepend" id="cLunes">
                                    <div class="input-group-text bg-c-blue">
                                        <input type="checkbox" id="Lun" name="Lun"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="AulaMarId">Martes</label><br>
                            <div class="input-group">
                                <div class="input-group-prepend" id="cMartes">
                                    <div class="input-group-text bg-c-green">
                                        <input type="checkbox" id="Mar" name="Mar"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="AulaMieId">Miercoles</label><br>
                            <div class="input-group">
                                <div class="input-group-prepend" id="cMiercoles">
                                    <div class="input-group-text bg-c-orenge">
                                        <input type="checkbox" id="Mie" name="Mie"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="AulaJueId">Jueves</label><br>
                            <div class="input-group">
                                <div class="input-group-prepend" id="cJueves">
                                    <div class="input-group-text bg-c-pink">
                                        <input type="checkbox" id="Jue" name="Jue"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="AulaVieId">Viernes</label><br>
                            <div class="input-group">
                                <div class="input-group-prepend" id="cViernes">
                                    <div class="input-group-text bg-c-lite-green">
                                        <input type="checkbox" id="Vie" name="Vie"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="AulaSabId">Sabado</label><br>
                            <div class="input-group">
                                <div class="input-group-prepend" id="cSabado">
                                    <div class="input-group-text bg-c-yellow">
                                        <input type="checkbox" id="Sab" name="Sab"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="AulaDomId">Domingo</label><br>
                            <div class="input-group">
                                <div class="input-group-prepend" id="cDomingo">
                                    <div class="input-group-text">
                                        <input type="checkbox" id="Dom" name="Dom"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for=""></label><br>
                                <button type="submit" id="form-submit" class="btn btn-success pull-right ">Guardar</button>
                            </div>
                        </div>
                    </div>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>    
                </form>
                <hr>
                <h5>Horario</h5><br>
                <div class="row">
                    <div class="col-sm-12" id="tableEntradas"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        getcAulas();
    });
    function getcAulas() {
        $("#loadOptionAulas").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcAulas",
            success: function (text) {
                console.log(text);
                var date = text.data;
                var txt = "";
                //txt += '<select class="form-control fill" id="AulaId" name="AulaId" required>';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].AulaId + '">' + date[x].Descripcion + '</option>';
                }
                $("#cLunes").after('<select class="form-control" placeholder="Aula" id="AulaLunId" name="AulaLunId">' + txt + '</select>');
                $("#cMartes").after('<select class="form-control" placeholder="Aula" id="AulaLunId" name="AulaMarId">' + txt + '</select>');
                $("#cMiercoles").after('<select class="form-control" placeholder="Aula" id="AulaLunId" name="AulaMierId">' + txt + '</select>');
                $("#cJueves").after('<select class="form-control" placeholder="Aula" id="AulaLunId" name="AulaJueId">' + txt + '</select>');
                $("#cViernes").after('<select class="form-control" placeholder="Aula" id="AulaLunId" name="AulaVieId">' + txt + '</select>');
                $("#cSabado").after('<select class="form-control" placeholder="Aula" id="AulaLunId" name="AulaSabId">' + txt + '</select>');
                $("#cDomingo").after('<select class="form-control" placeholder="Aula" id="AulaLunId" name="AulaDomId">' + txt + '</select>');

            }
        });
    }
</script>

