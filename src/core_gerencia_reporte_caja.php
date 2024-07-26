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
        <div class="card card-border-info">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="Cajero">Cajero</label>
                            <div id="divCajero"></div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>                      
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="Desde">Desde</label>
                            <input type="date" name="inicio" id="inicio" class="form-control" required>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>                      
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="Hasta">Hasta</label>
                            <input type="date" name="fin" id="fin" class="form-control" required>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>                      
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="">Reporte</label><br>
                            <button class="btn btn-info btn-sm" id="report"><i class="pe-7s-search"></i> Buscar</button>
                        </div>
                    </div>                      
                </div>
                <hr>
                <h5>Desglose de cobros</h5><br>
                <div id="cards-cash" style="display: none">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="fas fa-dollar-sign bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Total</span>
                                    <h4 id="t1"> </h4>
                                </div>
                            </div> 
                        </div>
                        <div class="col-sm-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="fas fa-money-bill-alt bg-c-pink card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Pago en efectivo</span>
                                    <h4 id="t2"> </h4>
                                </div>
                            </div> 
                        </div>
                        <div class="col-sm-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="fas fa-money-check bg-c-yellow card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Pago con tarjeta</span>
                                    <h4 id="t3"> </h4>
                                </div>
                            </div> 
                        </div>
                        <div class="col-sm-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="fas fa-money-check-alt bg-c-green card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Deposito bancario</span>
                                    <h4 id="t4"> </h4>
                                </div>
                            </div> 
                        </div>
                    </div>

                    <div class="clearfix">
                        <span class="float-left">
                            <button onclick="report($('#cajero').val(), $('#inicio').val(), $('#fin').val());" class="btn btn-success btn-sm" title="Imprimir reporte"><i class="pe-7s-print"></i> Imprimir reporte</button><br>
                        </span>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12" id="tableEntradas"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>

<script>
    function report(cajero, inicio, fin) {
        var link = 'core_reportes_caja.php?cajero=' + cajero + '&inicio=' + inicio + '&fin=' + fin;
        window.open(link, this.target, 'width=1000,height=500');
        return false;
    }
    $(document).ready(function () {
        getCajero();
    });
    function getCajero() {
        $("#divCajero").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getUserSAEM",
            success: function (text) {
                console.log(text);
                if (text == '0 results') {
                    $("#divCajero").html('<select class="form-control" id="cajero" name="cajero" required><option value="">Seleccione</option></select>');
                }
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control" id="cajero" name="cajero" required>';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].nombre + ' ' + date[x].apellido_paterno + ' ' + date[x].apellido_materno + '">' + date[x].nombre + ' ' + date[x].apellido_paterno + ' ' + date[x].apellido_materno + '</option>';
                }
                txt += "</select>";
                $("#divCajero").html(txt);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#divCajero").html('<select class="form-control" id="cajero" name="cajero" required><option value="">Seleccione</option></select>');
            }
        });
    }

    $("#report").click(function () {
        $("#tableEntradas").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $('#cards-cash').hide();
        var cajero = $('#cajero').val();
        var inicio = $("#inicio").val();
        var fin = $("#fin").val();

        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: 'action=cashReport&cajero=' + cajero + '&inicio=' + inicio + '&fin=' + fin,
            success: function (text) {
                var date = text.data;
                var total = text.data[0].tot;
                var pago_efectivo = text.data[0].efectivo;
                var pago_tarjeta = text.data[0].tarjeta;
                var pago_deposito = text.data[0].deposito;
                //console.log(date)
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tbpagos" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th> <th>Folio</th> <th>Total</th> <th>Metodo de Pago</th><th>Fecha de cobro</th><th>Cajero</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    txt += '<tr>';
                    txt += "<td>" + (a + 1) + "</td>";
                    txt += "<td>" + date[x].folio + "</td>";
                    txt += "<td>$" + formatMoney(date[x].total) + "</td>";
                    txt += "<td>" + date[x].metodo_pago + "</td>";
                    txt += "<td>" + date[x].fecha + "</td>";
                    txt += "<td>" + date[x].idiusuario + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("tableEntradas").innerHTML = txt;
                var table = $('#tbpagos').DataTable({
                    async: true,
                    //responsive: false,
                    //dom: 'Bfrtip',
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
                if (total === null) {
                    total = 0;
                }
                if (pago_efectivo === null) {
                    pago_efectivo = 0;
                }
                if (pago_tarjeta === null) {
                    pago_tarjeta = 0;
                }
                if (pago_deposito === null) {
                    pago_deposito = 0;
                }

                // $('#t1').html('$' + $.number(total, 2, '.'));
                $('#t1').html('$' + formatMoney(total));
                $('#t2').html('$' + formatMoney(pago_efectivo));
                $('#t3').html('$' + formatMoney(pago_tarjeta));
                $('#t4').html('$' + formatMoney(pago_deposito));
                $('#cards-cash').show();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("tableEntradas").innerHTML = '<br><br><div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Mensaje!</strong> Sin resultados para los parámetros solicitados</div>';
            }
        });
    });

    function formatMoney(number, decPlaces, decSep, thouSep) {
        decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
                decSep = typeof decSep === "undefined" ? "." : decSep;
        thouSep = typeof thouSep === "undefined" ? "," : thouSep;
        var sign = number < 0 ? "-" : "";
        var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
        var j = (j = i.length) > 3 ? j % 3 : 0;

        return sign +
                (j ? i.substr(0, j) + thouSep : "") +
                i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) +
                (decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
    }
</script>

<script src="asset/js/jquery.number.min.js"></script>