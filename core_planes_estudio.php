<?php include './headers.php'; ?>
<div class="row">
    <div class="col-12">
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
                <span class="float-right"><a href="core_planes_materias_add.php" class="btn btn-success btn-sm">Nueva Materia <i class="pe-7s-add-user"></i></a></span>
                <br><br>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="nivelegreso">Seleccione una oferta académica</label>
                            <div id="Oferta-Academica">
                                <select class="form-control" id="idicarrera" name="idicarrera" required>
                                    <option value="">Seleccione uno</option>
                                </select>
                            </div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="Grado">Grado</label>
                            <div id="grado">
                                <select class="form-control" id="GradosId" name="GradosId" required>
                                    <option value="">Seleccione uno</option>
                                </select>
                            </div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="Grado">Acción</label><br>
                            <button class="btn btn-sm btn-primary" id="buscar">Buscar</button>
                        </div>
                    </div>
                </div>
                <div id="divMaterias"></div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        getOferta();
    });
    $("#buscar").click(function () {
        getMaterias();
    });

    function getMaterias() {
        var idicarrera = $('#idicarrera').val();
        var GradosId = $('#GradosId').val();
        $("#divMaterias").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getMateriasByCarreraAndGradoID&idicarrera=" + idicarrera + "&GradosId=" + GradosId,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tableMaterias" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"><tr><th>#</th> <th>Acción</th> <th>Campus</th><th>Nivel</th><th>Oferta</th> <th>Asignatura</th> <th>Clave</th> <th>Creditos</th><th>Unidades</th><th>Horas por semana</th><th>Estatus</th></tr></thead>';
                for (x in date) {
                    var a = parseInt(x);
                    var MateriaId = date[x].MateriaId;
                    var suspended = date[x].suspended;
                    var btn_update = '<a href= "core_planes_materia_update.php?MateriaId=' + MateriaId + '" type="button" class="btn btn-sm">Editar <i class="fa fa-pen-square"></i></a>';
                    var btn_delete = '<button type="button" class="btn btn-danger btn-sm" onclick="delete_(' + MateriaId + ')">Eliminar <i class="fa fa-trash"></i></button>';
                    var btn_suspended = '<button type="button" class="btn btn-warning btn-sm" onclick="suspended_(' + MateriaId + ',1)">Suspender <i class="fa fa-ban"></i></button>';
                    var btn_actived = '<button type="button" class="btn btn-success btn-sm" onclick="suspended_(' + MateriaId + ',0)">Activar <i class="fa fa-check-circle"></i></button>';
                    if (suspended == 0) {
                        var suspended_ = '<td class="table-success">Activo</td>';
                    } else {
                        var suspended_ = '<td class="table-danger">Inactivo</td>';
                    }
                    txt += '<tr>';
                    txt += "<td>" + (a + 1) + "</td>";
                    txt += '<td>';
                    txt += '<div class="btn-group" id="btns_actions">';
                    if (suspended == 0) {
                        txt += btn_update;
                        txt += btn_suspended;
                        txt += btn_delete;
                    } else {
                        txt += btn_actived;
                        txt += btn_delete;
                    }
                    txt += '</div>';
                    txt += '</td>';
                    txt += "<td>" + date[x].campus + "</td>";
                    txt += "<td>" + date[x].nivel + "</td>";
                    txt += "<td>" + date[x].carrera + "</td>";
                    txt += "<td>" + date[x].Nombre + "</td>";
                    txt += "<td>" + date[x].Clave + "</td>";
                    txt += "<td>" + date[x].Creditos + "</td>";
                    txt += "<td>" + date[x].Unidades + "</td>";
                    txt += "<td>" + date[x].HorasSemana + "</td>";
                    txt += suspended_;
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                $("#divMaterias").html(txt);
                var table = $('#tableMaterias').DataTable();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#divMaterias").html('0 resultados');
            }
        });
    }
</script>
<script>
    function delete_(MateriaId) {
        var r = confirm("Desea Eliminar esta registro?");
        if (r) {
            swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deleted_tbMaterias&MateriaId=" + MateriaId,
                success: function (text) {
                    if (text == "success") {
                        swalert('Mensaje!', 'El registro se eliminó correctamente', 'success');
                        getMaterias();
                    } else {
                        swalert('Mensaje!', text, 'info');
                    }
                }
            });
        }
    }

    function suspended_(MateriaId, suspended) {
        swalert('Mensaje!', 'Procesando...', 'info');
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=suspended_tbMaterias&MateriaId=" + MateriaId + '&suspended=' + suspended,
            success: function (text) {
                if (text == "success") {
                    getMaterias();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }
</script>
<script>
    function getOferta() {
        $("#Oferta-Academica").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getOferta",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control" id="idicarrera" name="idicarrera" required onchange="getGradosByID()">';
                txt += '<option value="">Seleccione uno</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idicarrera + '">' + date[x].nivel + ' ' + date[x].nombre + '</option>';
                }
                txt += "</select>";
                $("#Oferta-Academica").html(txt);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#Oferta-Academica").html('0 resultados');
            }
        });
    }
    function getGradosByID() {
        var idicarrera = $('#idicarrera').val();
        $("#grado").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getGradosByID&idicarrera=" + idicarrera,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control" id="GradosId" name="GradosId" required>';
                txt += '<option value="">Seleccione uno</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].GradosId + '">Grado: ' + date[x].Descripcion + '</option>';
                }
                txt += "</select>";
                $("#grado").html(txt);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#grado").html('0 resultados');
            }
        });
    }
</script>