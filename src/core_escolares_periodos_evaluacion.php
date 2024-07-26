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
        <div class="card card-border-success">
            <div class="card-body">
                <div class="form-group float-left">
                    <h5 for="ciclos">Seleccione un ciclo escolar</h5>
                    <div class="ciclo"></div>
                    <div class="help-block with-errors text-danger"></div>
                </div>
                <div class="form-group float-right">
                    <label for="ciclos"></label>
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#modalPeriodos">
                        <i class="<?php echo "$breadcrumb_icon"; ?>"></i>  Agregar nuevo periodo de evaluación
                    </button>
                </div>
            </div>
            <div class="card-body" style="padding-top: 0px;">
                <h5>Periodos</h5>
                <div id="loadPeriodoByGrupoId"></div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="modalPeriodos">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"> <i class="<?php echo "$breadcrumb_icon"; ?>"></i>  Agregar nuevo Periodo de evaluación</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" id="FormPeriodo" data-toggle="validator" class="shake">
                    <h5>Configure los Perdiodos de evaluación</h5><br>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="ciclo">Ciclo Escolar</label>
                                <div class="ciclo"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="Descripcion">Descripción</label>
                                <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Enter Descripcion" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="FechaInicio">Fecha Inicio</label>
                                <input type="date" class="form-control" id="FechaInicio" name="FechaInicio" placeholder="Enter FechaInicio" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="FechaFin">Fecha Fin</label>
                                <input type="date" class="form-control" id="FechaFin" name="FechaFin" placeholder="Enter FechaFin" required>
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
                        <div class="col-sm-4">
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
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        ciclo();
        getcTipoEvaluacionPeriodo();
    });
    function ciclo() {
        $(".ciclo").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCicloByEstatus",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="CicloId" name="CicloId" required onchange="getPeriodoByGrupoId()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idiciclo + '">' + date[x].ciclo + '</option>';
                }
                txt += "</select>";
                $(".ciclo").html(txt);
            }
        });
    }

    function getcTipoEvaluacionPeriodo() {
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcTipoEvaluacionPeriodo",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].TipoEvaluacionPeriodoId + '">' + date[x].Descripcion + '</option>';
                }
                $("#labelTipoEvaluacionPeriodoId").after('<select class="form-control" id="TipoEvaluacionId" name="TipoEvaluacionId" title="Enter TipoEvaluacionId" required>' + txt + '</select>');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#labelTipoEvaluacionPeriodoId").html(errorThrown)
            }
        });
    }

    function getPeriodoByGrupoId() {
        var CicloId = $("#CicloId").val();
        $("#loadPeriodoByGrupoId").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getPeriodoByGrupoId&CicloId=" + CicloId,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="PeriodoByGrupoId" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Eliminar</th> <th>Decripcion</th> <th>Abreviatura</th> <th>Inicio</th><th>Fin</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    txt += '<tr>';
                    txt += "<td>" + (a + 1) + "</td>";
                    txt += '<td><button type="button" class="btn btn-danger btn-sm" title="Eliminar Periodo" onclick="deletePeriodo(' + date[x].PeriodoId + ')"><i class="pe-7s-close-circle"></i></button></td>';
                    txt += "<td>" + date[x].Descripcion + "</td>";
                    txt += "<td>" + date[x].Abreviatura + "</td>";
                    txt += "<td>" + date[x].FechaInicio + "</td>";
                    txt += "<td>" + date[x].FechaFin + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("loadPeriodoByGrupoId").innerHTML = txt;
                var table = $('#PeriodoByGrupoId').DataTable({
                    async: true,
                    responsive: false,
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Entradas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("loadTableByCarrera").innerHTML = '0 Periodos';
            }
        });
    }

    function deletePeriodo(PeriodoId) {
        var txt;
        var r = confirm("Desea eliminar este Periodo? ");
        if (r) {
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: 'action=deletePeriodo&PeriodoId=' + PeriodoId,
                success: function (text) {
                    if (text == "success") {
                        swalert('Mensaje', 'Periodo eliminado', 'info');
                        getPeriodoByGrupoId();
                    } else {
                        swalert('Mensaje', text, 'info');
                    }
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }

    $("#FormPeriodo").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            swalert('Mensaje!', 'Llene los campos requeridos', 'info');
        } else {
            event.preventDefault();
            addPerdiodo();
        }
    });

    function addPerdiodo() {
        var CicloId = $("#CicloId").val();
        var dataString = $('#FormPeriodo').serialize();
        swalert('Mensaje!', 'Procesando...', 'info');
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=addPeriodo&CicloId=" + CicloId + "&" + dataString,
            success: function (text) {
                if (text == "success") {
                    swalert('Mensaje!', 'El Periodo se guardó correctamente', 'success');
                    getPeriodoByGrupoId();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }
</script>

