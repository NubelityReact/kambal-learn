<?php include 'headers.php'; ?>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #f1f1f1;
    }


    h1 {
        text-align: center;  
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }


    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;  
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #4CAF50;
    }
</style>

<div class="card card-border-primary">
    <!--    <div class="card-header bg-fos text-light">Cobrar servicio a estudiante</div>-->
    <div class="card-body">
        <form role="form" id="regForm" data-toggle="validator" class="shake" autocomplete="off">     
            <div class="tab">
                <div class="d-flex">
                    <div class="p-2 mr-auto">
                        <div class="page-header-title">
                            <i class="pe-7s-cart bg-c-pink"></i>
                            <div class="d-inline">
                                <h4><?php echo $breadcrumb_descripcion; ?></h4>
                                <label id="infoAlumno"></label><br>
                                <span><a href="cobro.php"><p class="pe-7s-back-2"></p> Regresar</a></span>
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
                <div class="card card-border-success">
                    <div class="card-body">
                        <div>
                            <input name="nombre" title="Nombre del estudiante" id="nombre" class="form-control" placeholder="Nombre del alumno" type="hidden" required readonly="true">
                            <input name="idialumno" title="Nombre del estudiante" id="idialumno" class="form-control" type="hidden" required>
                            <input name="idiventa" title="Nombre del estudiante" id="idiventa" class="form-control" type="hidden" required>
                            <input name="folio" title="Folio" id="folio" class="form-control" type="hidden" required readonly="true">
                            <input type="hidden" class="form-control" id="carrera" name="carrera" required  readonly="true">
                            <input type="hidden" class="form-control" id="matricula" name="matricula" required  readonly="true">
                            <input type="hidden" class="form-control" id="turno" name="turno" required  readonly="true">
                            <input type="hidden" class="form-control" id="cuatrimestre" name="cuatrimestre" required  readonly="true">
                            <input type="hidden" class="form-control" id="beca_colegiatura" name="beca_colegiatura" required  readonly="true">
                        </div>
                        <div class="row form-group mb-1">
                            <div class="col-sm-8">
                                <h4>Detalle del Servicio</h4>
                                <div class="input-group" style="margin-bottom: 0px;">
                                    <input type="text"  class="form-control" id="descripcion" name="descripcion" required readonly="true">
                                    <input type="text"  class="form-control" id="comentario_des" name="comentario_des" required readonly="true">
                                    <input type="text"  class="form-control" id="fecha_corte" name="fecha_corte" required readonly="true">
                                    <input name="idiservicio" title="idiservicio" id="idiservicio" class="form-control" placeholder="Nombre del idiservicio" type="hidden" required>
                                    <input name="idiventa_as_servicio" id="idiventa_as_servicio" class="form-control" type="hidden" required>
                                    <input name="control" id="control" class="form-control" type="hidden" required>
                                    <input type="hidden" min="1" value="1" class="form-control" id="unidad" name="unidad" placeholder="Ingrese unidad" required>
                                    <input type="hidden" class="form-control" id="precio" name="precio" placeholder="Ingrese precio" required readonly="true">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-sm btn-primary" id="btnModalServicios" data-toggle="modal" data-target="#modalServicios"><i class="pe-7s-search" data-toggle="tooltip" data-placement="top" title="Busque y seleccione un producto o servicio pendiente de cobro al estudiante"></i> Buscar Servicios</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <h4 for="metodo_pago">Método pago</h4>
                                    <select class="form-control" class="form-control" id="metodo_pago" name="metodo_pago" placeholder="Ingrese metodo_pago" required>
                                        <!--                                        'Efectivo','Cheque','Transferencia','Tarjetas de crédito','Monederos electrónicos','Dinero electrónico','Vales de despensa','Tarjeta de Débito','Tarjeta de Servicio','Por Definir'-->
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Tarjeta de Débito">Tarjeta de Débito</option>
                                        <option value="Tarjetas de crédito">Tarjetas de crédito</option>
                                        <option value="deposito">Depósito Bancario</option>
                                    </select>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>

                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <h4>Agregar</h4>
                                    <button type="button" id="add-partida" class="btn btn-success btn-sm" onclick="agregaServicio()" data-toggle="tooltip" data-placement="top" title="Una vez seleccionado un producto o servicio, de clic para agregarlo al cargo"> <i class="pe-7s-cart"></i> Agregar Servicio</button>
                                </div>
                            </div>
                        </div>
                        <div id="MainFrameOptions" style="display:none">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Banco">Banco:</label>
                                        <select class="form-control" class="form-control" id="banco" name="banco" data-toggle="tooltip" data-placement="top" title="Seleccione un banco" required>
                                            <option value="N/A">Seleccione un banco</option>
                                            <option value="BANAMEX">BANAMEX</option>
                                            <option value="BANCOMER">BANCOMER</option>
                                            <option value="BANORTE">BANORTE</option>
                                            <option value="SCOTIA BANK">SCOTIA BANK</option>
                                            <option value="SANTANDER">SANTANDER</option>
                                            <option value="HSBC">HSBC</option>                                            
                                            <option value="OXXO">OXXO</option>                                        
                                        </select>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="drp" class="h6">ID de la transacción:</label><br>
                                        <input type="text" class="form-control input-sm" name="iditransaccion" id="iditransaccion" placeholder="ID Transacción, Sí no aplica escriba N/A" data-toggle="tooltip" data-placement="top" title="ID de la Transacción, Sí no aplica escriba N/A" maxlength="30">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="drp" class="h6">Últimos 4 digitos de la tarjeta:</label><br>
                                        <input type="text" class="form-control input-sm" name="digitos" id="digitos" placeholder="4 últimos Digitos "  data-toggle="tooltip" data-placement="top" title="4 últimos Digitos de la tarjeta, Sí no aplica escriba N/A" maxlength="4">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="drp" class="h6">Titular de la tarjeta:</label><br>
                                        <input type="text" class="form-control input-sm" name="titular_tarjeta" id="titular_tarjeta" placeholder="Titular de la tarjeta, Sí no aplica escriba N/A"  data-toggle="tooltip" data-placement="top" title="Titular de la tarjeta, Sí no aplica escriba N/A" maxlength="240">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="drp" class="h6">Fecha del baucher:</label><br>
                                        <input type="date" class="form-control input-sm" name="fecha_deposito" id="fecha_deposito" placeholder="Ingrese la fecha del baucher"  data-toggle="tooltip" data-placement="top" title="Ingrese la fecha del baucher, Seleccione la fecha de hoy" maxlength="240" value="<?php echo date("Y-m-d"); ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"><div id="partidasServicios"></div></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9"></div>
                            <div class="col-sm-3"><div id="subtotalVent" class="pull-right"></div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <!-- Invoice card start -->
                <div class="card">
                    <center><h2>Resumen del Cobro</h2></center>
                    <div class="card-block">
                        <div class="row invoive-info">
                            <div class="col-md-4 col-xs-12 invoice-client-info">
                                <h6>Información del alumno :</h6>
                                <h6 class="m-0" id="invoice-alumno"></h6>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <h6>Información del cobro :</h6>
                                <table class="table table-responsive invoice-table invoice-order table-borderless">
                                    <tbody>
                                        <tr>
                                            <th>Fecha :</th>
                                            <td id="invoice-fecha"></td>
                                        </tr>
                                        <tr>
                                            <th>Método de pago :</th>
                                            <td>
                                                <span class="label label-success" id="invoice-mp"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>folio :</th>
                                            <td id="invloice-folio">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <h6 class="text-uppercase text-primary">Atendido por: <?php echo $globalNombre ?></h6>
                                <!-- <div class="form-group">
                                    <label for="certificado">Requiere Factura? No / Sí</label><br>
                                    <label class="switch float-right">
                                        <input type="checkbox" name="factura" id="factura" value="si">
                                        <span class="slider round"></span>
                                    </label>
                                    <div class="help-block with-errors"></div>
                                </div> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <div id="invoice-detail-table"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="comentarios">Comentarios</label>
<!--                                            <input type="text" class="form-control" id="comentarios" name="comentarios">-->
                                            <textarea name="comentarios"  class="form-control" id="comentarios" name="comentarios"></textarea>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div id="invoice-total"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Invoice card end -->
            </div>
            <div id="partida"></div>
            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" class="btn btn-warning" id="Cancel">Cancelar</button>
                    <button type="button" class="btn btn-info" id="prevBtn" onclick="nextPrev(-1)">Regresar</button>
                    <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Siguente</button>
                    <button type="submit" id="form-submit" class="btn btn-primary" style="display: none;">Guardar Cargos</button>
                </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
<!--                <span class="step"></span>-->
            </div>
            <div id="msgSubmit" class="h3 text-center hidden"></div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>

<!-- The Modal Materiales -->
<div class="modal" id="modalServicios">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Seleccione un servicio</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->            
            <div class="modal-body">
                <h5>Servicios pendientes de cobro</h5>
                <div id="loadTableServicios"></div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "dataConect/pagos.php",
            data: "action=generarFolioPago",
            success: function (text) {
                //console.log(text.data);
                //console.log(text.data[0].idiventa);
                var idiventa = $("#idiventa").val();
                $("#idiventa").val(text.data[0].idiventa);
                $("#folio").val(text.data[0].folio);
            }
        });
    });

    var idialumno = "<?php echo $_GET['idialumno']; ?>";
    $(document).ready(function () {
        tarar(idialumno);
        gets(idialumno);
        getServicios(idialumno);
    });

    function gets(idialumno) {
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcardAlumnoById&idialumno=" + idialumno,
            success: function (text) {
                //console.log(text.data[0]);
                var datos = text.data[0];
                var folio = $("#folio").val();
                //alert(datos[0]);
                $("#idialumno").val(datos.idialumno);
                $("#carrera").val(datos.carrera);
                $("#matricula").val(datos.matricula);
                $("#turno").val(datos.turno);
                $("#cuatrimestre").val(datos.cuatrimestre);
                $("#estatus").val(datos.estatus);
                $("#beca_colegiatura").val(datos.beca_colegiatura);
                $("#nombre").val(datos.nombre + " " + datos.apellido_paterno + " " + datos.apellido_materno);
                $("#infoAlumno").html('<strong>Alumno:</strong> ' + datos.nombre + " " + datos.apellido_paterno + " " + datos.apellido_materno + ' <strong>Matrícula: </strong>' + datos.matricula + ' <strong>Carrera: </strong>' + datos.carrera + ' <strong>Folio: ' + folio + '</strong> <span class="badge badge-success text-light">Beca: %' + datos.beca_colegiatura + '</span>');
            }
        });
    }
</script>
<script src="asset/js/tararMontos.js"></script>
<script>
    function getServicios(idialumno) {
        $("#loadTableServicios").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: "action=getPartidasPendientesByIdiAlumno&idialumno=" + idialumno,
            success: function (text) {
                var date = text.data;
                var txt = "";
                console.log(text);
                txt += '<div class="table-responsive"> <table id="tableServicios" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>Código</th><th>Servicio</th><th>Precio</th><th>Detalles</th><th>Estatus</th><th>Fecha Vencimiento</th><th>Servicio</th></tr> </thead>';
                for (x in date) {
                    txt += '<tr>';
                    txt += "<td>" + date[x].idiservicio + '   <button class="btn btn-sm btn-success"><i class="pe-7s-like2"></i></button></td>';
                    txt += "<td>" + date[x].comentario + "</td>";
                    txt += "<td>" + date[x].precio + "</td>";
                    txt += "<td>" + date[x].descripcion + "</td>";
                    if (date[x].estatus == 'Proceso') {
                        txt += '<td class="bg-warning">' + date[x].estatus + "</td>";
                    } else {
                        txt += '<td class="bg-warning">' + date[x].estatus + "</td>";
                    }
                    txt += "<td>" + date[x].fecha_limite + "</td>";
                    txt += "<td>" + date[x].idiventa_as_servicio + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("loadTableServicios").innerHTML = txt;
                var table = $('#tableServicios').DataTable({
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
                $('#tableServicios tbody').on('click', 'tr', function () {
                    var datos = table.row(this).data();
                    if ($(this).hasClass('selected')) {
                        $(this).removeClass('selected');
                    } else {
                        table.$('tr.selected').removeClass('selected');
                        $(this).addClass('selected');
                    }
                    //alert(datos[0]);
                    $("#idiservicio").val(datos[0]);
                    $("#descripcion").val(datos[3]);
                    $("#precio").val(datos[2]);
                    $("#idiventa_as_servicio").val(datos[6]);
                    $("#fecha_corte").val(datos[5]);
                    $("#comentario_des").val(datos[1]);
                    $("#modalServicios .close").click();
                    var delayInMilliseconds = 200; //1 second
                    setTimeout(function () {
                        $("#add-partida").click();
                    }, delayInMilliseconds);
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("loadTableServicios").innerHTML = "0 Resultados";
            }
        });
    }
</script>
<script src="asset/js/cobro_invoice.js"></script>
<script>
    function agregaServicio() {
        // Initiate Variables With Form Content
        var errorMSG = "";
        var idiventa = $("#idiventa").val();
        var metodo_pago = $("#metodo_pago").val();
        var fecha_deposito = $("#fecha_deposito").val();
        var idiventa_as_servicio = $("#idiventa_as_servicio").val();//Alumno seleccionado
        var beca_colegiatura = $("#beca_colegiatura").val();
        var precio = $("#precio").val();
        var comentario_des = $("#comentario_des").val();
        if (typeof idiventa === "undefined" || idiventa == "") {
            errorMSG += "idiventa es required ";
        }
        if (typeof idiventa_as_servicio === "undefined" || idiventa_as_servicio == "") {
            errorMSG += "Seleccione un servicio ";
        }
        if (errorMSG == "") {
            swalert('Procesando...', 'Espere', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/pagos.php",
                data: "action=agregaServicio&idiventa_as_servicio=" + idiventa_as_servicio + "&idiventa=" + idiventa + "&metodo_pago=" + metodo_pago + "&fecha_deposito=" + fecha_deposito,
                success: function (text) {
                    //console.log(text);
                    if (text == "success") {
                        swal({
                            title: "Exito!",
                            text: "Cobro agregado correctamente",
                            timer: 1,
                            showConfirmButton: false
                        });
                        //setDescuentoBeca(idiventa_as_servicio, beca_colegiatura, precio, comentario_des);
                        var delayInMilliseconds = 400; //1 second
                        setTimeout(function () {
                            getPartidasPagadas(idiventa);//tabla de partidas pagadas
                            getSubtotalVent(idiventa);//muestra totales a pagar
                        }, delayInMilliseconds);

                        $('#btnModalServicios').click();
                        var table = $('#tableServicios').DataTable();
                        table.row('.selected').remove().draw(false);
                        invoice();
                    } else {
                        swalert('Error!', text, 'error');
                    }
                }
            });
        } else {
            $('#btnModalServicios').click();
            if (errorMSG == "") {
                swalert('Cuidado!', 'Something went wrong :(', 'warning');
            } else {
                swalert('Error!', errorMSG, 'error');
            }
        }
    }
</script>
<script>
    function quitaServicio(idiventa_as_servicio) {
        swalert('Procesando...', 'Espere', 'info');
        $.ajax({
            type: "POST",
            url: "dataConect/pagos.php",
            data: "action=quitaServicio&idiventa_as_servicio=" + idiventa_as_servicio,
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
                    var idialumno = $('#idialumno').val();
                    var idiventa = $('#idiventa').val();
                    getServicios(idialumno);
                    getPartidasPagadas(idiventa);//tabla de partidas pagadas
                    getSubtotalVent(idiventa);//muestra totales a pagar
                    //$('#btnModalServicios').click();
                    invoice();
                } else {
                    swalert('Error!', text, 'error');
                }
            }
        });
    }
</script>
<script>
    $("#Cancel").click(function () {
        var idiventa = $("#idiventa").val();
        var txt;
        var r = confirm("Esta seguro de cancelar el cobro?");
        if (r) {
            $(location).attr('href', 'cobro.php');
        } else {
            txt = "You pressed Cancel!";
        }
    });
</script>
<script>
    function getPartidasPagadas(idiventa) {
        $("#partidasServicios").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: "action=getPartidasPagadas&idiventa=" + idiventa,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<h4>Detalle de cargos</h4>';
                txt += '<table id="report" class="table table-striped">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Código</th><th>Servicio</th><th>Precio</th><th>Descuentos</th><th>Recargos</th><th>Total</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    txt += '<tbody><tr>';
                    txt += '<td>' + (a + 1) + '  <button type="button" class="btn btn-warning btn-sm" title="Eliminar cargo" onclick="quitaServicio(' + date[x].idiventa_as_servicio + ');"><i class="icofont icofont-trash"></i></button></td>';
                    txt += "<td>" + date[x].idiventa_as_servicio + "</td>";
                    txt += "<td>" + date[x].comentario + "</td>";
                    txt += "<td>$" + date[x].precio + "</td>";
                    txt += "<td>- $" + date[x].realdiscount + "</td>";
                    txt += "<td>+ $" + date[x].realsurcharge + "</td>";
                    txt += "<td>$" + date[x].total + "</td>";
                    txt += "</tr></tbody>";
                }
                txt += "</table>"
                document.getElementById("partidasServicios").innerHTML = txt;
                document.getElementById("invoice-detail-table").innerHTML = txt;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("partidasServicios").innerHTML = "Sin cargos seleccionados";
            }
        });
    }
</script>
<script>
    function getSubtotalVent(idiventa) {
        $("#subtotalVent").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: "action=getSubtotalVent&idiventa=" + idiventa,
            success: function (text) {
                var date = text.data[0].total;
                var txt = "";
                $("#control").val(date);
                txt += '<input type="hidden" id="subtotal" name="subtotal" value="' + date + '">';
                txt += '<input type="hidden" id="total " name="total" value="' + date + '">';
                txt += '<div class="card card-border-success">';
                txt += '<div class="card-body">';
                txt += '<div class="row">';
                txt += '<div class="col-sm-6">';
                txt += '<strong class="float-right">Subtotal:</strong>';
                txt += '</div>';
                txt += '<div class="col-sm-6">';
                txt += '$' + date + '.00 MXN';
                txt += '</div>';
                txt += '</div>';
                txt += '<div class="row">';
                txt += '<div class="col-sm-6">';
                txt += '<strong class="float-right">TOTAL A PAGAR:</strong>';
                txt += '</div>';
                txt += ' <div class="col-sm-6">';
                txt += '$' + date + '.00 MXN';
                txt += ' </div>';
                txt += ' </div>';
                txt += ' </div>';
                txt += ' </div>';
                txt += ' </div>';
                document.getElementById("subtotalVent").innerHTML = txt;
                document.getElementById("invoice-total").innerHTML = txt;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("subtotalVent").innerHTML = errorThrown;
            }
        });
    }
</script>
<script src="asset/js/cobro_setPago.js"></script>
<script src="asset/js/cobro_FormSteps.js"></script>
<script>
    $(document).ready(function () {
        $("#iditransaccion").val("N/A");
        $("#digitos").val("N/A");
        $("#titular_tarjeta").val("N/A");
    });
    $("#metodo_pago").click(function () {
        var Mainframe = $("#metodo_pago").val();
        if (Mainframe != "Efectivo") {
            $("#MainFrameOptions").show();
            //alert('show div');
            //console.log('show');
            $("#iditransaccion").val("");
            $("#digitos").val("");
            $("#titular_tarjeta").val("");
        } else {
            $("#MainFrameOptions").hide();
            //console.log('hide');
            $("#iditransaccion").val("N/A");
            $("#digitos").val("N/A");
            $("#titular_tarjeta").val("N/A");

        }
    });
</script>