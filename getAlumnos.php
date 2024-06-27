<?php include './headers.php'; ?>
<div class="card card-border-primary">
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
        <span class="float-right"><a href="core_alumno_addAlumno.php" class="btn btn-success btn-sm">Nuevo alumno <i class="pe-7s-add-user"></i></a></span>
        <br><br>
        <div id="divAlumno"></div>
    </div>
</div>
<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        getcardAlumnoAll();
    });
    function getcardAlumnoAll() {
        $("#divAlumno").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcardAlumnoAll",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tableAlumno" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"><tr><th>#</th> <th>Acción</th> <th>Matricula</th><th>Nombre</th><th>Apellido paterno</th> <th>Apellido materno</th> <th>Nivel</th><th>Oferta</th><th>Turno</th><th>Generación</th><th>Grado</th><th>Estatus</th><th>Género</th><th>Estado civil</th><th>Edad</th><th>CURP</th><th>RFC</th><th>NSS</th><th>Email</th><th>Teléfono</th><th>Móvil</th></tr></thead>';
                for (x in date) {
                    var a = parseInt(x);
                    var idigenerales = date[x].idigenerales;
                    var idialumno = date[x].idialumno;
                    var suspended = date[x].suspended;
                    var btn_update = '<a href= "updateAlumno.php?p=' + idigenerales + '&idialumno=' + idialumno + '" type="button" class="btn btn-sm">Editar <i class="fa fa-pen-square"></i></a>';
                    var btn_delete = '<button type="button" class="btn btn-danger btn-sm" onclick="delete_(' + idigenerales + ')">Eliminar <i class="fa fa-trash"></i></button>';
                    var btn_suspended = '<button type="button" class="btn btn-warning btn-sm" onclick="suspended_(' + idigenerales + ',1)">Suspender <i class="fa fa-ban"></i></button>';
                    var btn_actived = '<button type="button" class="btn btn-success btn-sm" onclick="suspended_(' + idigenerales + ',0)">Activar <i class="fa fa-check-circle"></i></button>';
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
                    txt += "<td>" + date[x].matricula + "</td>";
                    txt += "<td>" + date[x].nombre + "</td>";
                    txt += "<td>" + date[x].apellido_paterno + "</td>";
                    txt += "<td>" + date[x].apellido_materno + "</td>";
                    txt += "<td>" + date[x].cNiveles + "</td>";
                    txt += "<td>" + date[x].carrera + "</td>";
                    txt += "<td>" + date[x].cTurno + "</td>";
                    txt += "<td>" + date[x].generacion + "</td>";
                    txt += "<td>" + date[x].cuatrimestre + "</td>";
                    txt += suspended_;
                    txt += "<td>" + date[x].genero + "</td>";
                    txt += "<td>" + date[x].estado_civil + "</td>";
                    txt += "<td>" + date[x].edad + "</td>";
                    txt += "<td>" + date[x].curp + "</td>";
                    txt += "<td>" + date[x].rfc + "</td>";
                    txt += "<td>" + date[x].nss + "</td>";
                    txt += "<td>" + date[x].email + "</td>";
                    txt += "<td>" + date[x].telefono + "</td>";
                    txt += "<td>" + date[x].movil + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                $("#divAlumno").html(txt);
                var table = $('#tableAlumno').DataTable({
                    responsive: false,
                    dom: 'Bfrtip',
                    buttons: ['excel'],
                    "destroy": true,
                    orderCellsTop: true,
                    fixedHeader: true,
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
                $("#divAlumno").html('0 resultados');
            }
        });
    }
</script>
<script>

    function delete_(idigenerales) {
        var txt;
        var r = confirm("Desea eliminar el Usuario? " + idigenerales);
        if (r) {
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deleteidigenerales&idigenerales=" + idigenerales,
                success: function (text) {
                    if (text == "success") {
                        swalert('Exito!', 'Usuario Eliminado', 'success');
                        getcardAlumnoAll();
                    } else {
                        swalert('Error!', text, 'error');
                    }
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }

    function suspended_(idigenerales, suspended) {
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=suspended_idigenerales&idigenerales=" + idigenerales + '&suspended=' + suspended,
            success: function (text) {
                if (text == "success") {
                    getcardAlumnoAll();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }
</script>