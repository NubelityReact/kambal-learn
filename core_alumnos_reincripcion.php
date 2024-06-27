<?php include 'headers.php'; ?>
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
        <form role="form" id="FormReInscripcion" data-toggle="validator" class="shake" autocomplete="off">

            <div class="card card-border-success">
                <div class="card-body">
                    <h4>Datos del Alumno</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="apellidos">Nombre</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary" type="button" data-toggle="tooltip" title="Ver perfil del Alumno!" id="showProfile"><i class="pe-7s-share"></i></button> 
                                </div>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required maxlength="140" readonly="true">
                                <input type="hidden" class="form-control" id="idialumno" name="idialumno" placeholder="Enter idialumno" required>
                                <input type="hidden" class="form-control" id="idiarchivo" name="idiarchivo" placeholder="Enter idiarchivo" required>                                            <div class="input-group-prepend">
                                    <input type="hidden" class="form-control" id="idigenerales" name="idigenerales" placeholder="Enter idigenerales" required>                                            <div class="input-group-prepend">
                                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#alumno" id="abreAspirantes">Buscar <i class="pe-7s-search"></i></button> 
                                    </div>
                                </div>
                            </div>   
                        </div>  
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="apellido_paterno">Apellido paterno</label>
                                <input type="text" readonly="true" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Ingrese apellido paterno" required maxlength="140">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="apellido_materno">Apellido materno</label>
                                <input type="text" readonly="true" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Ingrese apellido materno" maxlength="140">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="matricula">Matrícula</label>
                                <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Enter matricula" readonly="true">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
                                <input type="hidden" class="form-control" id="idicarrera" name="idicarrera" placeholder="Enter carrera"  readonly="true">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="cuatrimestre">Grado Actual</label>
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
                    <h4>Datos del Escolares</h4>
                    <div class="row">                                   
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="promovido">Grado Promovido</label>
                                <input type="number" min="1" max="9"   class="form-control" id="promovido" name="promovido" placeholder="Enter promovido" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="nivelegreso">Ciclo Escolar</label>
                                <div id="divCiclo"></div>
                                <input type="hidden" class="form-control" id="periodo" name="periodo">
                                <input type="hidden" class="form-control" id="idiciclo" name="idiciclo">
                                <input type="hidden" class="form-control" id="CicloId" name="CicloId">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="turno">Turno</label>
                                    <div id="seleTurno"></div>
                                    <input type="hidden" id="TurnoId" name = "TurnoId">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="grupos">Grupo</label>
                                    <div id="seleGrupo"></div>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="vigencia">Vigencia</label>
                                <input type="date" class="form-control" id="vigencia" name="vigencia" placeholder="Ingrese vigencia" required onchange="validAdeudos()">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">                                            
                                <label for="codigo_credencial"># de credencial</label>
                                <div class="input-group">
                                    <input autofocus type="text" class="form-control" id="iSiteCode" name="iSiteCode" placeholder="xxx" maxlength="10" onchange="validAdeudos()" data-toggle="tooltip" title="penúltima serie numerica!" id="showProfile">
                                    <input autofocus type="text" class="form-control" id="codigo_credencial" name="codigo_credencial" placeholder="xxxxx" maxlength="20" onchange="validAdeudos()" data-toggle="tooltip" title="Ultima serie numerica!" id="showProfile">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4>Plan de Pago</h4>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="vigencia">Plan de Pago</label>
                                <div id="selePlan"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <center> <label for="certificado">Desea inscribir al alumno a la Plataforma Educativa? No / Sí</label></center><br>
                            <label class="switch float-right">
                                <input type="checkbox" name="moodle" id="moodle" value="si">
                                <span class="slider round"></span>
                            </label>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div id="spinner-form"></div>
                    <button type="submit" id="form-submit" class="btn btn-success pull-right ">Reinscribir Alumno <i class="far fa-thumbs-up"></i></button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </form>
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
                <div class="table-responsive">
                    <table id="sumab" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">
                        <thead class="table-primary text-light"> <tr><th>#</th><th>Matrícula</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Carrera</th><th>Turno</th><th>Cuatrimestre</th><th>Beca</th><th>Categoria</th><th>CarreraID</th><th>General</th><th>Archivo</th> </tr> </thead>
                        <tbody></tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
<script src="asset/js/moodle.js"></script>
<script src="asset/js/getCicloEscolar.js"></script>
<script src="asset/js/reinscription_getAlumnos.js"></script>
<script src="asset/js/reinscription_form.js"></script>
<script>
                        function validAdeudos() {
                            $('#form-submit').show();
                            var idialumno = $("#idialumno").val();
                            var roleadmin = "<?php echo $edit ?>";
                            $.ajax({
                                type: "GET",
                                url: "dataConect/pagos.php",
                                data: "action=validAdeudos&idialumno=" + idialumno,
                                success: function (text) {
                                    console.log(text);
                                    var adeudo = text.data[0].total;
                                    if (adeudo > 0) {
                                            swalert('Alerta!', 'El alumno tiene una deuda pendiente de: $' + adeudo, 'warning');
                                        if (!edit) {
                                            //location.href = "CxC2.php?idialumno="+idialumno;
                                            $('#form-submit').hide();
                                        }
                                    }
                                }
                            });
                        }

                        //showProfile
                        $("#showProfile").click(function () {
                            var idialumno = $('#idialumno').val();
                            var idigenerales = $('#idigenerales').val();
                            var idiarchivo = $('#idiarchivo').val();
                            window.open('updateAlumno.php?p=' + idigenerales + '&idialumno=' + idialumno + '&idiarchivo=' + idiarchivo);
                        });
</script>





