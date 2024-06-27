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
                <a href="core_escolares_grupo_add.php" class="float-right"><button class="btn btn-success"><i class="pe-7s-note"></i> Registrar Nuevo Grupo</button></a>
                <hr>
                <h5>Tabla de grupos</h5>
                <div class="row">
                    <div class="col-sm-12" id="divGrupo"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        getGrupos();
    });
    function getGrupos() {
        $("#divGrupo").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getGrupos",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tableGrupo" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"><tr><th>#</th> <th>Acción</th> <th>Descripción</th><th>Oferta</th><th>Grado</th><th>Ciclo</th><th>Turno</th> <th>Estatus</th> <th>Creado</th></tr></thead>';
                for (x in date) {
                    var a = parseInt(x);
                    var GrupoId = date[x].GrupoId;
                    var suspended = date[x].suspended;
                    var btn_update = '<a href= "core_escolares_getbAlumnoGrupo.php?GrupoId=' + GrupoId + '" type="button" class="btn btn-sm">Editar <i class="fa fa-pen-square"></i></a>';
                    var btn_delete = '<button type="button" class="btn btn-danger btn-sm" onclick="delete_(' + GrupoId + ')">Eliminar <i class="fa fa-trash"></i></button>';
                    var btn_suspended = '<button type="button" class="btn btn-warning btn-sm" onclick="suspended_(' + GrupoId + ',1)">Suspender <i class="fa fa-ban"></i></button>';
                    var btn_actived = '<button type="button" class="btn btn-success btn-sm" onclick="suspended_(' + GrupoId + ',0)">Activar <i class="fa fa-check-circle"></i></button>';
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
                        //txt += btn_update;
                        txt += btn_actived;
                        txt += btn_delete;
                    }
                    txt += '</div>';
                    txt += '</td>';
                    txt += "<td>" + date[x].Descripcion + "</td>";
                    txt += "<td>" + date[x].carrera + "</td>";
                    txt += "<td>" + date[x].cGrados + "</td>";
                    txt += "<td>" + date[x].ciclo + "</td>";
                    txt += "<td>" + date[x].cTurno + "</td>";
                    txt += suspended_;
                    txt += "<td>" + date[x].created + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                $("#divGrupo").html(txt);
                var table = $('#tableGrupo').DataTable();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#divGrupo").html('0 resultados');
            }
        });
    }
</script>
<script>

    function delete_(GrupoId) {
        var txt;
        var r = confirm("Desea eliminar el Grupo? " + GrupoId);
        if (r) {
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deleteGrupo&GrupoId=" + GrupoId,
                success: function (text) {
                    if (text == "success") {
                        swalert('Exito!', 'Grupo Eliminado', 'success');
                        getGrupos();
                    } else {
                        swalert('Error!', text, 'error');
                    }
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }

    function suspended_(GrupoId, suspended) {
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=suspended_Grupo&GrupoId=" + GrupoId + '&suspended=' + suspended,
            success: function (text) {
                if (text == "success") {
                    getGrupos();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }
</script>
