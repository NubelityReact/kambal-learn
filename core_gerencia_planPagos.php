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
            <form role="form" id="formCiclo" data-toggle="validator" class="shake" autocomplete="off">
                <div class="card card-border-success">
                    <div class="card-body">
                        <a class="text-light btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#addPlan">Gestionar plannes de pago <i class="fas fa-cogs"></i></a>

                        <div class="row">
                            <div class="col-sm-12">
                                <h5>Llene la información que se solicita</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="ciclo"> Seleccione el plan de pago</label>
                                    <div id="selePlan"></div>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="ciclo">Seleccione un Ciclo escolar</label>
                                    <div id="seleCiclo"></div>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="ciclo">Seleccione el Nivel</label>
                                    <div id="seleOferta"></div>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="ciclo">Seleccione un turno</label>
                                    <div id="seleTurno"></div>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="ciclo">Seleccione un servicio</label>
                                    <div id="seleServicio"></div>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="ciclo">Seleccione el porcentaje de recargo</label>
                                    <input type="number" min="0" max="99" value ="10" class="form-control" id="porcentaje_cargo" name="porcentaje_cargo" placeholder="Enter porcentaje_cargo" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="ciclo">Seleccione fecha limite de pago</label>
                                    <input type="date" class="form-control" id="fecha_limite" name="fecha_limite" placeholder="Enter ciclo">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="ciclo">Mes de pago</label>
                                    <input type="text" class="form-control" id="mVence" name="mVence" readonly="true" value="-">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="form-submit" class="btn btn-success pull-right ">Guardar datos <i class="pe-7s-diskette"></i></button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>

                        <hr>
                        <h5>Calendario de pagos</h5>
                        <div id="tableCalendario"></div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar fecha limite de pago</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" id="formUpdateVencimiento" data-toggle="validator" class="shake">
                    <div class="col">
                        <div class="form-group">
                            <label for="ciclo">Servicio</label>
                            <input type="text" class="form-control" id="midivencimiento" name="midivencimiento" readonly="true">
                            <input type="text" class="form-control" id="mServicio" name="mServicio" readonly="true">
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="ciclo">Seleccione el porcentaje de recargo</label>
                            <input type="number" min="0" max="99" value ="10" class="form-control" id="mporcentaje_cargo" name="mporcentaje_cargo" placeholder="Enter porcentaje_cargo" required>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="ciclo">Seleccione fecha límite de pago</label>
                            <input type="date" class="form-control" id="mfecha_limite" name="mfecha_limite" placeholder="Enter ciclo">
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="ciclo">Mes de pago</label>
                            <input type="text" class="form-control" id="mmVence" name="mmVence" required readonly="true">
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <button type="submit" id="updateVencimiento" class="btn btn-success pull-right ">Actualizar datos</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="addPlan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Gestionar Planes de pago <i class="fas fa-cogs"></i></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-warning" data-toggle="tab" href="#xyz"><i class="fas fa-coins"></i> Crear nuevo Plan de Pago</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" data-toggle="tab" href="#xcv"><i class="fas fa-comments-dollar"></i> Administrar Planes de pago</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="xyz" class="tab-pane active">
                        <h5 class="modal-title"><i class="fas fa-coins"></i> Crear nuevo Plan de Pago</h5>
                        <form role="form" id="addNewPlanPago" data-toggle="validator" class="shake">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="clave">Clave</label>
                                        <input type="text" class="form-control" id="clave" name="clave" required maxlength="10">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion" required maxlength="240">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="updateVencimiento" class="btn btn-success pull-right ">Crear plan de pago</button>
                        </form>
                    </div>
                    <div id="xcv" class="tab-pane fade">
                        <h5 class="modal-title"><i class="fas fa-comments-dollar"></i></i> Administrar Planes de pago</h5>
                        <div id="tablePlanPago"></div>
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
        getPlanPago();
        getCiclo();
        getOferta();
        seleTurno();
        getServiciosEscolares();
    });

    function getPlanPago() {
        $("#selePlan").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getPlanPago",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control" id="idiplan" name="idiplan" onchange="sumarb()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idiplan + '">' + date[x].clave + ' > ' + date[x].descripcion + '</option>';
                }
                txt += "</select>";
                document.getElementById("selePlan").innerHTML = txt;
                showPlnaPago(text);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("selePlan").innerHTML = '0 resultados <a href="core_gerencia_planPagos.php" class="btn btn-sm btn-info">Crear uno nuevo?</a>';
            }
        });
    }

    function getCiclo() {
        $("#seleCiclo").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCicloByEstatus",
            success: function (text) {
                console.log(text);
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control" id="idiciclo" name="idiciclo" onchange="sumarb()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idiciclo + '"><i class="text-info">' + date[x].ciclo + '</i></option>';
                }
                txt += "</select>";
                document.getElementById("seleCiclo").innerHTML = txt;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                //alert("No fue posible conectar con el servidor");
                document.getElementById("seleCiclo").innerHTML = '0 resultados <a href="core_gerencia_getClicloEscolar.php" class="btn btn-sm btn-info">Crear uno nuevo?</a>';
            }
        });
    }

    function getOferta() {
        $("#seleOferta").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getNivel",
            success: function (text) {
                console.log(text);
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control" id="NivelId" name="NivelId" onchange="sumarb()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].NivelId + '"><i class="text-info">' + date[x].Descripcion + '</i></option>';
                }
                txt += "</select>";
                document.getElementById("seleOferta").innerHTML = txt;
            }
        });
    }

    function seleTurno() {
        $("#seleTurno").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getTurno",
            success: function (text) {
                console.log(text);
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control" id="TurnoId" name="TurnoId" onchange="sumarb()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].TurnoId + '"><i class="text-info">' + date[x].Descripcion + '</i></option>';
                }
                txt += "</select>";
                document.getElementById("seleTurno").innerHTML = txt;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                //alert("No fue posible conectar con el servidor");
                document.getElementById("seleTurno").innerHTML = '0 resultados <a href="core_cTurno_getcTurno.php" class="btn btn-sm btn-info">Crear uno nuevo?</a>';
            }
        });
    }

    function getServiciosEscolares() {
        $("#seleServicio").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: "action=getServiciosEscolares2",
            success: function (text) {
                console.log(text);
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control" id="idiservicio" name="idiservicio">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idiservicio + '"><i class="text-info">' + date[x].descripcion + ' $' + date[x].precio + '</i></option>';
                }
                txt += "</select>";
                document.getElementById("seleServicio").innerHTML = txt;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                //alert("No fue posible conectar con el servidor");
                document.getElementById("seleServicio").innerHTML = '0 resultados <a href="core_gerencia_getServicios.php" class="btn btn-sm btn-info">Crear uno nuevo?</a>';
            }
        });
    }

    $(document).ready(function () {
        $("#fecha_limite").change(function () {
            var date = new Date($('#fecha_limite').val());
            var month = date.getMonth() + 1;
            //swalert(month);
            var mes = "";
            switch (month) {
                case 1:
                    mes = "ENERO";
                    break;
                case 2:
                    mes = "FEBRERO";
                    break;
                case 3:
                    mes = "MARZO";
                    break;
                case 4:
                    mes = "ABRIL";
                    break;
                case 5:
                    mes = "MAYO";
                    break;
                case 6:
                    mes = "JUNIO";
                    break;
                case  7:
                    mes = "JULIO";
                    break;
                case  8:
                    mes = "AGOSTO";
                    break;
                case  9:
                    mes = "SEPTIEMBRE";
                    break;
                case  10:
                    mes = "OCTUBRE";
                    break;
                case  11:
                    mes = "NOVIEMBRE";
                    break;
                case  12:
                    mes = "DICIEMBRE";
                    break;
            }
            //swalert(mes);
            $('#mVence').val(mes);
        });
    });
</script>
<script>
    $("#formCiclo").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Todos los campos son requeridos");
        } else {
            // everything looks good!
            event.preventDefault();
            submitForm();
        }
    });
    function submitForm() {
        // Initiate Variables With Form Content
        var dataString = $('#formCiclo').serialize();
        //alert('data ' + dataString);
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=addVencimiento&" + dataString,
            success: function (text) {
                if (text == "success") {
                    formSuccess();
                    swalert("Exito!", 'Fecha agregada', 'success');
                    sumarb();
                } else {
                    formError();
                    swalert("Mensaje!", text, 'info');
                }
            }
        });
    }
    function formSuccess() {
        //location.href = "core_gerencia_getClicloEscolar.php";
        //$("#formCiclo")[0].reset();
        //submitMSG(true, "Servicio Agregado Correctamente!")
    }
    function formError() {
        $("#formCiclo").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass();
        });
    }
    function submitMSG(valid, msg) {
        if (valid) {
            var msgClasses = "h3 text-center tada animated text-success";
        } else {
            var msgClasses = "h3 text-center text-danger";
        }
        $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
    }
</script>

<script>
    function sumarb() {
        var idiplan = $("#idiplan").val();
        $("#tableCalendario").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            "url": "dataConect/API.php",
            data: "action=getVencimiento&idiplan=" + idiplan,
            success: function (text) {
                console.log(text);
                console.log(text.data);
                var date = text.data;
                var txt = "";
                console.log(date);
                txt += '<div class="table-responsive"> <table id="tbxd09" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Editar</th><th>Ciclo</th><th>Nivel</th><th>Turno</th><th>Servicio</th><th>Precio</th><th>Recargo</th><th>Mes</th><th>Fecha límite de pago</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    txt += '<tr>';
                    txt += "<td>" + (a + 1) + "</td>";
                    txt += "<td>" + ' <a data-toggle="modal" data-target="#myModal" onclick="fillData(' + date[x].idivencimiento + ');"><i class="pe-7s-note pe-2x pe-va" title="Editar"></i></a>\n\
                <button class="btn btn-link" onclick="deleteFechaPago(' + date[x].idivencimiento + ');"><i class="pe-7s-close-circle pe-2x pe-va text-danger" title="Eliminar"></i></button></td>';
                    //txt += "<td>"+ date[x].clave +" - " + date[x].plan + "</td>";
                    txt += "<td>" + date[x].ciclo + "</td>";
                    txt += "<td>" + date[x].nivel + "</td>";
                    txt += "<td>" + date[x].turno + "</td>";
                    txt += "<td>" + date[x].servicio + "</td>";
                    txt += "<td>$" + date[x].precio + "</td>";
                    txt += "<td>" + date[x].recargo + "%</td>";
                    txt += "<td>" + date[x].mes + "</td>";
                    txt += "<td>" + date[x].vencimiento + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("tableCalendario").innerHTML = txt;
                var table = $('#tbxd09').DataTable({
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
                document.getElementById("tableCalendario").innerHTML = "0 Partidas agregadas";
            }
        });
    }
</script>
<script>
    function deleteFechaPago(idivencimiento) {
        $("#formCiclo")[0].reset();
        var txt;
        var r = confirm("Desea eliminar la fecha de pago? ");
        if (r) {
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deleteFechaPago&idivencimiento=" + idivencimiento,
                success: function (text) {
                    if (text == "success") {
                        swalert('Exito!', 'Fecha Eliminada', 'success');
                        sumarb();
                    } else {
                        swalert('Error!', text, 'error');
                    }
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }

    function fillData(idivencimiento) {
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getVencimientoByID&idivencimiento=" + idivencimiento,
            success: function (text) {
                //swalert('Exito!', text, 'success');
                var date = text.data;
                console.log(date);
                $("#midivencimiento").val(date[0].idivencimiento);
                $("#mServicio").val(date[0].servicio);
                $("#mporcentaje_cargo").val(date[0].recargo);
                $("#mfecha_limite").val(date[0].vencimiento);
                $("#mmVence").val(date[0].mes);
            }
        });
    }

    $(document).ready(function () {
        $("#mfecha_limite").change(function () {
            var date = new Date($('#mfecha_limite').val());
            var month = date.getMonth() + 1;
            //swalert(month);
            var mes = "";
            switch (month) {
                case 1:
                    mes = "ENERO";
                    break;
                case 2:
                    mes = "FEBRERO";
                    break;
                case 3:
                    mes = "MARZO";
                    break;
                case 4:
                    mes = "ABRIL";
                    break;
                case 5:
                    mes = "MAYO";
                    break;
                case 6:
                    mes = "JUNIO";
                    break;
                case  7:
                    mes = "JULIO";
                    break;
                case  8:
                    mes = "AGOSTO";
                    break;
                case  9:
                    mes = "SEPTIEMBRE";
                    break;
                case  10:
                    mes = "OCTUBRE";
                    break;
                case  11:
                    mes = "NOVIEMBRE";
                    break;
                case  12:
                    mes = "DICIEMBRE";
                    break;
            }
            $('#mmVence').val(mes);
        });
    });
</script>

<script>
    $("#formUpdateVencimiento").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Todos los campos son requeridos");
        } else {
            // everything looks good!
            event.preventDefault();
            submitFormUpdate();
        }
    });

    function submitFormUpdate() {
        // Initiate Variables With Form Content
        var dataString = $('#formUpdateVencimiento').serialize();
        //alert('data ' + dataString);
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=updateVencimiento&" + dataString,
            success: function (text) {
                //swalert("Mensaje!", text, 'info');
                sumarb();
                $("#myModal .close").click();
            }
        });
    }

</script>

<script>
    $("#addNewPlanPago").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            swalert('Mensaje', "Todos los campos son requeridos", 'info');
        } else {
            // everything looks good!
            event.preventDefault();
            addNewPlanPago();
        }
    });

    function addNewPlanPago() {
        // Initiate Variables With Form Content
        var dataString = $('#addNewPlanPago').serialize();
        //alert('data ' + dataString);
        swalert('Mensaje', "Procesando...", 'info');
        $.ajax({
            type: "POST",
            url: "dataConect/pagos.php",
            data: "action=addNewPlanPago&" + dataString,
            success: function (text) {
                swalert("Mensaje!", text, 'info');
                sumarb();
                getPlanPago();
                $("#addPlan .close").click();
            }
        });
    }


    function showPlnaPago(text) {
        $("#tablePlanPago").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        var date = text.data;
        var txt = "";
        txt += '<div class="table-responsive"> <table id="truDrak" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
        txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Eliminar</th><th>Clave</th><th>Descripción</th><th>Estatus</th></tr> </thead>';
        for (x in date) {
            var a = parseInt(x);
            txt += '<tr>';
            txt += "<td>" + (a + 1) + "</td>";
            txt += "<td>" + '<button class="btn btn-link" onclick="deletePlan(' + date[x].idiplan + ');"><i class="pe-7s-close-circle pe-2x pe-va text-danger" title="Eliminar"></i></button></td>';
            //txt += "<td>"+ date[x].clave +" - " + date[x].plan + "</td>";
            txt += "<td>" + date[x].clave + "</td>";
            txt += "<td>" + date[x].descripcion + "</td>";
            txt += "<td>" + date[x].estatus + "</td>";
            txt += "</tr>";
        }
        txt += "</table> </div>"
        $("#tablePlanPago").html(txt);
        var table = $('#truDrak').DataTable({
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

    function deletePlan(idiplan) {
        var txt;
        var r = confirm("Desea eliminar el plan de pago? ");
        if (r) {
            $("#addPlan .close").click();
            $("#formCiclo")[0].reset();
            swalert('Mensaje', "Procesando...", 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deletePlan&idiplan=" + idiplan,
                success: function (text) {
                    swalert('Exito!', text, 'success');
                    getPlanPago();
                    $("#addPlan").click();
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }

</script>