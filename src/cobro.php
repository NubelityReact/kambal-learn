<?php include './headers.php'; ?>
<div class="card card-border-danger">
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
        <div class="float-right">
            <div class="input-group">
                <div class="input-group-append">
                    <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#alumno" id="abreAspirantes" data-toggle="tooltip" title="Ver lista de alumnos"><i class="pe-7s-exapnd2"></i></button> 
                </div>
                <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Ingrese matricula" required maxlength="30" data-toggle="tooltip" autofocus="true">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"  id="buscaAlumno" title="Ver adeudos">Buscar <i class="pe-7s-search"></i></button> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="loadTableServicios"></div>
            </div>
        </div>
        <div id="tableAdeudosByAlumno"></div>
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
                        <thead class="table-primary text-light"> <tr><th>#</th><th>Matrícula</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Carrera</th><th>Turno</th><th>Estatus</th></tr> </thead>
                        <tbody></tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="modalEditarCargo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar Cargo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" id="EditForm" data-toggle="validator" class="shake">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="comentario">Descripción</label>
                                <input type="text" class="form-control" id="comentario" name="comentario" placeholder="Enter comentario" readonly="true">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="idiventa_as_servicio">Código</label>
                                <input type="text" class="form-control" id="idiventa_as_servicio" name="idiventa_as_servicio" placeholder="Enter idiventa_as_servicio" readonly="true">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="estatus">Estatus</label>
                                <input type="text" class="form-control" id="estatus" name="estatus" placeholder="Enter estatus" readonly="true">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="periodo">Período</label>
                                <input type="text" class="form-control" id="periodo" name="periodo" placeholder="Enter periodo" readonly="true">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="precio">Precio $</label>
                                <input type="text" class="form-control" id="precio" name="precio" placeholder="Enter precio" readonly="true">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="recargo">% Recargos</label>
                                <input type="number" min="-100" max="100" class="form-control" id="recargo" name="recargo" placeholder="Enter recargo" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="total">Total a pagar $</label>
                                <input type="number" min="0" class="form-control" id="total" name="total" placeholder="Enter total" required readonly="true"> 
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" id="form-submit" class="btn btn-sm btn-success pull-right ">Salvar Cambios</button>
                    <button type="button" id="delServicio" class="btn btn-sm btn-danger pull-right ">Cancelar Cargo <i class="pe-7s-trash pe-va"></i></button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalEditarCargo" id="openEditarCargo" data-toggle="tooltip" style="display: none;"><i class="pe-7s-exapnd2"></i></button> 


<?php include './footer.php'; ?>
<script src="asset/js/cobro_update_price_vas.js"></script>
<script src="asset/js/tararMontos.js"></script>
<script>
    var idiRoleGerencia = "<?php echo $edit; ?>";
    $(document).ready(function () {
        sumarb();
        $('#abreAspirantes').click();//simular clic para abrir modal aspirantes
        $("#buscaAlumno").click(function () {
            var matricula = $("#matricula").val();
            buscaAlumno(matricula);
        });

        $('#matricula').on('input', function (e) {
            var matricula = $("#matricula").val();
            buscaAlumno(matricula);
        });
    });
    function buscaAlumno(matricula) {
        $("#loadTableServicios").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcardAlumnoMatricula&matricula=" + matricula,
            success: function (text) {
                console.log({text})
                var date = text.data;
                var idialumno = text.data[0].idialumno;
                var txt = "";
                getPartidasPendientesByIdiAlumno(idialumno);
                txt += '<div class="card card-border-warning"><div class="d-flex"><div class="p-2 mr-auto"><div class="page-header-title"><i class="pe-7s-user bg-c-pink"></i><div class="d-inline">';
                for (x in date) {
                    txt += '<h4 id="cabecera"><input type="hidden" id="idialumno" value = "' + date[x].idialumno + '">' + date[x].nombre + ' ' + date[x].apellido_paterno + ' ' + date[x].apellido_materno + '</h4>\n\
                    <span id="subcabecera"><strong>Carrera: </strong>' + date[x].carrera + ' <strong>Matrícula:</strong> ' + date[x].matricula + ' <strong>Turno:</strong> ' + date[x].cTurno + '<strong> Estatus: </strong>' + date[x].estatus + ' <strong>GDO: </strong>' + date[x].cuatrimestre + '</span> <span class="badge badge-success text-light">Beca: %' + date[x].beca_colegiatura + '</span><br>';
                }
                txt += '</div></div></div></div></div>';
                document.getElementById("loadTableServicios").innerHTML = txt;
                $("#matricula").val('');
                $("#matricula").focus();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("loadTableServicios").innerHTML = "0 Resultados";
                $("#matricula").val('');
                $("#matricula").focus();
            }
        });
    }

</script>
<script>
    function getPartidasPendientesByIdiAlumno(idialumno) {
        tarar(idialumno);
        $("#subtotal").html('');
        $("#tableAdeudosByAlumno").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: "action=getHistorialPagosByIdiAlumno&idialumno=" + idialumno,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="card card-border-info">';
                txt += '<div class="card-header bg-white cfos"> <h4 class="float-left">Historial de pagos</h4> <h4 id="subtotal" class="float-right"></h4></div>';
                txt += '<div class="card-body"><div> <span class="float-right"><a href="CxC2.php?idialumno=' + idialumno + '" class="btn btn-success">Caja <i class="pe-7s-cart"></i></a></span><br><br><br></div>';
                txt += '<div class="table-responsive"> <table id="tbPag0q" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>Código</th><th>Estatus</th><th>Descripción</th><th>Limite de pago</th><th>Precio</th><th>Recargo</th><th>Total</th><th>Periodo</th>\n\
                <th>Facturable</th><th>Fecha de la transacción</th><th>Fecha cobro</th></tr> </thead>';
                for (x in date) {
                    var payment = '<a href="core_referenced_payment.php?idialumno=' + idialumno + '&idiventa_as_servicio=' + date[x].idiventa_as_servicio + '" target="_blank"><button type="button" id="payment" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Imprimir Ficha de deposito"><i class="pe-7s-piggy pe-va"></i></button></a>';
                    txt += '<tr>';
                    txt += "<td>" + date[x].idiventa_as_servicio + "</td>";
                    if (date[x].estatus == "Pendiente" && idiRoleGerencia == 1) {
                        txt += '<td class="table-danger">' + payment + ' <button type="button" id="btnE" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Editar Cargo" onclick="EditarServicio(' + date[x].idiventa_as_servicio + ');"><i class="pe-7s-note pe-va"></i></button> ' + date[x].estatus + "</td>";
                    } else if (date[x].estatus == "Pendiente") {
                        txt += '<td class="table-danger">' + payment + ' ' + date[x].estatus + "</td>";
                    } else if (date[x].estatus == "Cancelado") {
                        txt += '<td class="table-secondary">' + date[x].estatus + "</td>";
                    } else {
                        if (idiRoleGerencia == 1) {
                            txt += '<td class="table-success"><button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="Anular Cargo" onclick="anularPago(' + date[x].idiventa_as_servicio + ');"><i class="pe-7s-note pe-va"></i></button> ' + date[x].estatus + "</td>";
                        } else {
                            txt += '<td class="table-success">' + date[x].estatus + "</td>";
                        }
                    }
                    var fecha_limite = date[x].fecha_limite;
                    var estatus = date[x].estatus;
                    var currentday = "<?php echo date("Y-m-d") ?>";
                    var recargo = parseInt(date[x].recargo);
                    var re = 0;
                    var pagar = 0;
                    var total = parseInt(date[x].total);
                    if (estatus != 'Pendiente') {
                        pagar = 0;
                    } else if (fecha_limite < currentday) {
                        re = (total * recargo) / 100;
                        pagar = parseInt(re) + parseInt(total);
                    } else {
                        pagar = total;
                    }
                    txt += "<td>" + date[x].descripcion + "</td>";
                    txt += "<td>" + date[x].fecha_limite + "</td>";
                    txt += "<td>$ " + date[x].precio + "</td>";
                    txt += "<td>%" + date[x].recargo + "</td>";
                    txt += "<td>" + parseInt(pagar) + "</td>";
                    txt += "<td>" + date[x].periodo + "</td>";
                    txt += "<td>" + date[x].es_facturable + "</td>";
                    txt += "<td>" + date[x].fecha + "</td>";
                    txt += "<td>" + date[x].fecha_mod + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div></div></div>"
                $("#tableAdeudosByAlumno").html(txt);
                // document.getElementById("tableAdeudosByAlumno").innerHTML = txt;
                var table = $('#tbPag0q').DataTable({
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
                var sumas = table.column(6).data().sum();
                $("#subtotal").html('Adeudo total : $ ' + sumas);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#tableAdeudosByAlumno").html("Sin Adeudos");
            }
        });
    }
</script>
<script>
    function getSubTotalOfServiciosByAlumno(idialumno) {
        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: "action=getSubTotalOfServiciosByAlumno&idialumno=" + idialumno,
            success: function (text) {
                if (text.data[0].subtotal === null) {
                    $("#subtotal").append('Adeudo total: $ 0');
                } else {
                    $("#subtotal").append('Adeudo total: $' + text.data[0].subtotal);
                }
            }
        });
    }
</script>
<script>
    var sumarb = function () {
        var spin = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';
        var table = $("#sumab").DataTable({
            "destroy": true,
            "responsive": true,
            "deferRender": true,
            //"responsive": true,
            "ajax": {
                "url": "dataConect/API.php?action=getcardAlumno",
                "type": "GET"
            },
            "columns": [
                {"data": "idialumno"},
                {"data": "matricula"},
                {"data": "nomalu"},
                {"data": "apellido_paterno"},
                {"data": "apellido_materno"},
                {"data": "carrera"},
                {"data": "turno"},
                {"data": "estatus"},
            ],
            //"dom": 't',
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": spin,
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
        $('#sumab tbody').on('click', 'tr', function () {
            var datos = table.row(this).data();
            $("#matricula").val(datos.matricula);
            buscaAlumno(datos.matricula);
            $("#alumno .close").click();
        });

    }

</script>
<script>
    function EditarServicio(idiventa_as_servicio) {
        $('#openEditarCargo').click();
        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: "action=getVASByIDI&idiventa_as_servicio=" + idiventa_as_servicio,
            success: function (text) {
                //console.log(text);
                var re = 0;
                var pagar = 0;
                var json = text.data[0];
                var fecha_limite = json.fecha_limite;
                var current_day = "<?php echo date("Y-m-d"); ?>";
                if (current_day > fecha_limite) {
                    re = (parseInt(json.total) * parseInt(json.recargo)) / 100;
                    pagar = parseInt(re) + parseInt(json.total);
                } else {
                    pagar = json.total;
                }
                $('#recargo').val(json.recargo);
                $('#idiventa_as_servicio').val(json.idiventa_as_servicio);
                $('#estatus').val(json.estatus);
                $('#comentario').val(json.comentario);
                $('#periodo').val(json.periodo);
                $('#precio').val(json.precio);
                //$('#total').val(parseInt(json.precio) + parseInt(recargo));
                $('#total').val(pagar);
            }
        });
    }

    $("#delServicio").click(function () {
        var idiventa_as_servicio = $('#idiventa_as_servicio').val();
        var comentario = $('#comentario').val();
        //swalert(idiventa_as_servicio);
        var r = confirm("Está seguro de cancelar el cargo? Esta acción es definitiva y no se podrá reestablecer el cargo.");
        if (r) {
            $.ajax({
                type: "POST",
                url: "dataConect/pagos.php",
                data: "action=deleteVASByID&idiventa_as_servicio=" + idiventa_as_servicio + "&comentario=" + comentario,
                success: function (text) {
                    //console.log(text);
                    if (text == "success") {
                        //swalert('Exito!', 'Cobro cancelado', 'success');
                        swal({
                            title: "Exito!",
                            text: "Cobro cancelado",
                            timer: 1,
                            showConfirmButton: false
                        });
                        var idialumno = $("#idialumno").val();
                        getPartidasPendientesByIdiAlumno(idialumno);
                        $('#openEditarCargo').click();
                    } else {
                        swalert('Error!', text, 'error');
                    }
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    });

    /**
     * Cambia es estado de una partida PAGADA a PENDIENTE
     * Se usa en caso de que el Cagero haya cometido el Error de cobrar un servicio
     * que no correspondia 
     * @returns {undefined}
     */
    function anularPago(idiventa_as_servicio) {
        var r = confirm("Está seguro de ANULAR el cargo? Esta acción cambiará el pago a PENDIENTE");
        if (r) {
            $.ajax({
                type: "POST",
                url: "dataConect/pagos.php",
                data: "action=anularPago&idiventa_as_servicio=" + idiventa_as_servicio + "&comentario=" + comentario,
                success: function (text) {
                    swalert('Exito!', text, 'success');
                    var idialumno = $("#idialumno").val();
                    getPartidasPendientesByIdiAlumno(idialumno);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swalert('Mensaje!', jqXHR + ' ' + textStatus + ' ' + errorThrown, 'warning');
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }

</script>
<script src="asset/js/dataTableSumColumn.js"></script>
