<?php include './headers.php'; ?>
<div class="card">
    <div class="card-body">
        <div>
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
            <div class="card card-border-inverse">
                <div class="card-body">
                    <a class="btn btn-primary btn-sm pull-right text-light" data-toggle="modal" data-target="#modalNewRole">Gestionar Roles <i class="fas fa-cogs"></i></a>
                    <form role="form" id="formPermision" data-toggle="validator" class="shake" autocomplete="off">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="ciclo"> Seleccione un Rol</label>
                                    <div id="seleRol"></div>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="ciclo">Seleccione una Categoria</label>
                                    <div id="seleCat"></div>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="ciclo">Selecciona un Privilegio</label>
                                    <div id="selePermiso"></div>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <button type="submit" id="form-submit" class="btn btn-sm btn-warning pull-right ">Asignar Privilegio <i class="pe-7s-date"></i></button>
                                </div>
                            </div>
                        </div>                  

                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                        <hr>
                        <h5>Lista de privilegio asignados </h5>
                        <div id="tablePermision"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="modalNewRole">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Gestionar Roles <i class="fas fa-cogs"></i></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-primary" data-toggle="tab" href="#xyz"><i class="fas fa-user-tag"></i> Crear nuevo Rol</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" data-toggle="tab" href="#xcv"><i class="fas fa-key"></i> Administrar Roles</i></a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="xyz" class="tab-pane active">
                        <h5 class="modal-title">Crear nuevo Rol</h5>
                        <form role="form" id="formNewRol" data-toggle="validator" class="shake">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion</label>
                                        <input type="text" class="form-control" id="role" name="role" required maxlength="240">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="edit">Permisos de edición</label>
                                        <select class="form-control" id="edit" name="edit" required>
                                            <option value="">Seleccione</option>
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <label><strong>Permisos de edición:</strong> Sirve para realizar funciones administrativas y relacionadas con los informes (como agregar, editar o suprimir colegiaturas, vistas, filtros, etc.), así como para exportar los datos de los informes en formatos Excel y PDF.<br>
                                Este permiso incluye el permiso para otorgar becas escolares.</label>
                            <button type="submit" class="btn btn-success pull-right ">Crear nuevo Rol</button>
                        </form>
                    </div>
                    <div id="xcv" class="tab-pane fade">
                        <h5 class="modal-title">Administrar Roles</h5>
                        <div id="tableRoleList"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>
<script type="text/javascript" src="asset/js/validator.min.js"></script>
<script>
    $(document).ready(function () {
        getRole();
        getCategoriaPermision();
    });

    function getPermisions() {
        var categoria = $('#categoria').val();
        $("#selePermiso").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getPermisions&categoria=" + categoria,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control" id="idipermiso" name="idipermiso" required>';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idipermiso + '">' + date[x].descripcion + '</option>';
                }
                txt += "</select>";
                $("#selePermiso").html(txt);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#selePermiso").html('0 resultados');
            }
        });
    }

    function getCategoriaPermision() {
        $("#seleCat").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCategoriaPermision",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control" id="categoria" name="categoria" onchange="getPermisions()" required>';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].categoria + '">' + date[x].categoria + '</option>';
                }
                txt += "</select>";
                $("#seleCat").html(txt);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#seleCat").html('0 resultados ');
            }
        });
    }

    function getRole() {
        $("#seleRol").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getRole",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control" id="idirole" name="idirole" required onchange="getPermisionsInTable()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idirole + '">' + date[x].role + '</option>';
                }
                txt += "</select>";
                $("#seleRol").html(txt);
                showRoleInTable(text);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#seleRol").html('0 resultados ');
            }
        });
    }

    $("#formPermision").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            swalert('Mensaje', "Todos los campos son requeridos", 'warning');
        } else {
            // everything looks good!
            event.preventDefault();
            addPermision();
        }
    });

    function addPermision() {
        swalert('Mensaje', "Procesando...", 'info');
        // Initiate Variables With Form Content
        var dataString = $('#formPermision').serialize();
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=addRoleAsPermision&" + dataString,
            success: function (text) {
                swalert("Mensaje!", text, 'success');
                getPermisionsInTable();
            }
        });
    }

    function showRoleInTable(text) {
        $("#tableRoleList").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        var date = text.data;
        var txt = "";
        txt += '<div class="table-responsive"> <table id="luff" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
        txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Eliminar</th><th>Descripción</th><th>Permisos de edición</th><th>Estatus</th><th>Creación</th></tr> </thead>';
        for (x in date) {
            var a = parseInt(x);
            txt += '<tr>';
            txt += "<td>" + (a + 1) + "</td>";
            txt += "<td>" + '<button class="btn btn-link" onclick="deleteRole(' + date[x].idirole + ');"><i class="pe-7s-close-circle pe-2x pe-va text-danger" title="Eliminar rol"></i></button></td>';
            //txt += "<td>"+ date[x].clave +" - " + date[x].plan + "</td>";
            txt += "<td>" + date[x].role + "</td>";
            if (date[x].edit == '1') {
                txt += '<td>Sí  <a onclick="updateEditPermision(' + "false" + ', ' + date[x].idirole + ');" class = "btn btn-sm btn-warning" title="Quitar Permisos de edición"><i class="fa fa-lock"></i></a></td>';
            } else {
                txt += '<td>No  <a onclick="updateEditPermision(' + "true" + ', ' + date[x].idirole + ');" class = "btn btn-sm btn-success" title="Otorgar Permisos de edición"><i class="fa fa-unlock"></i></a></td>';
            }


            txt += "<td>" + date[x].estatus + "</td>";
            txt += "<td>" + date[x].fecha + "</td>";

            txt += "</tr>";
        }
        txt += "</table> </div>"
        $("#tableRoleList").html(txt);
        var table = $('#luff').DataTable({
            responsive: true,
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
    }
    function getPermisionsInTable() {
        var idirole = $("#idirole").val();
        $("#tablePermision").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            "url": "dataConect/API.php",
            data: "action=getRoleAsPermision&idirole=" + idirole,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tbxd10" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Revocar privilegio</th><th>Descripción</th><th>Categoría</th><th>Rol</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    txt += '<tr>';
                    txt += "<td>" + (a + 1) + "</td>";
                    txt += "<td>" + '<button class="btn btn-link" onclick="deletPermision(' + date[x].idirol_permiso + ');"><i class="pe-7s-close-circle pe-2x pe-va text-danger" title="Eliminar"></i></button></td>';
                    //txt += "<td>"+ date[x].clave +" - " + date[x].plan + "</td>";
                    txt += "<td>" + date[x].descripcion + "</td>";
                    txt += "<td>" + date[x].categoria + "</td>";
                    txt += "<td>" + date[x].role + "</td>";

                    txt += "</tr>";
                }
                txt += "</table> </div>"
                $("#tablePermision").html(txt);
                var table = $('#tbxd10').DataTable({
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: ['excel'],
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

                $('#tbxd09 tbody').on('click', 'tr', function () {
                    var datos = table.row(this).data();
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#tablePermision").html('Sin Permisos Asignados');
            }
        });
    }

    function deletPermision(idirol_permiso) {
        var txt;
        var r = confirm("Desea revocar este privilegio? ");
        if (r) {
            $("#formPermision")[0].reset();
            swalert('Mensaje', "Procesando...", 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deletPermision&idirol_permiso=" + idirol_permiso,
                success: function (text) {
                    swalert('Exito!', text, 'success');
                    getPermisionsInTable();
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }

    function deleteRole(idirole) {
        var txt;
        var r = confirm("Desea eliminar este rol? ");
        if (r) {
            $("#modalNewRole .close").click();
            $("#formPermision")[0].reset();
            swalert('Mensaje', "Procesando...", 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deleteRole&idirole=" + idirole,
                success: function (text) {
                    swalert('Exito!', text, 'success');
                    getRole();
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }


    function updateEditPermision(option, idirole) {
        swalert('Mensaje', "Procesando...", 'info');
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=updateEditPermision&idirole=" + idirole + "&edit=" + option,
            success: function (text) {
                swalert('Exito!', text, 'success');
                getRole();
            }
        });
    }

    $("#formNewRol").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            swalert('Mensaje', "Todos los campos son requeridos", 'warning');
        } else {
            // everything looks good!
            event.preventDefault();
            addNewRole();
        }
    });

    function addNewRole() {
        $("#modalNewRole .close").click();
        swalert('Mensaje', "Procesando...", 'info');
        // Initiate Variables With Form Content
        var dataString = $('#formNewRol').serialize();
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=addNewRole&" + dataString,
            success: function (text) {
                swalert("Mensaje!", text, 'success');
                getRole();
            }
        });
    }

</script>