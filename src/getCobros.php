<?php include './headers.php'; ?>
<div class="card card-border-success">
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
        <span class="float-right"><a href="cobro.php" class="btn btn-success btn-sm">Nuevo cobro a estudiante <i class="pe-7s-add-user"></i></a></span>
        <br><br>
        <div id="tablePagosLiquidados"></div>
    </div>
</div>


<?php include './footer.php'; ?>
<?php include './modalTimbrado.php'; ?>
<script>
    $(document).ready(function () {
        PagosLiquidados();
    });

    $(document).on("click", ".facturar", function () {
        var ticket = $(this).attr("ticket");
        var venta = $(this).attr("venta");
        var matricula = $(this).attr("matricula");
        var idiventa = $(this).attr("idiventa");
        $("#ticketTitulo").html("Ticket " + ticket);
        $("#ventaTitulo").html("Venta " + venta);
        $("#venta").val(venta);
        $("#idiventas").val(idiventa);
        $("#ticket").val(ticket)
        $("#clientefact").val(matricula);
        getcardAlumnoByMatricula(matricula);
        //$("#matriculah").html("Matricula "+matricula);
        //Obtener datos de venta y alumno y rellenar los campos.
        $("#datosTimbrado").modal("show");
    })

    $(document).on("click", ".docs", function () {
        var folio = $(this).attr("folio"); //leemos la propiedad folio del bootn con la clase .docs
        $(".docs").attr("factura", folio); //seteamos la propiedad folio=folio 
        $(".facturas").attr("factura", folio);
        $(".docs").attr("serie", 'UCP');
        $(".facturas").attr("serie", 'UCP');
        var matricula = $(this).attr("matricula");
        getcardAlumnoByMatricula(matricula);
        $("#factura").val(folio);
        console.log(folio);
    })

    $(document).on("click", ".cancel", function () {
        var folio = $(this).attr("folio"); //leemos la propiedad folio del bootn con la clase .docs
        var idiventa = $(this).attr("idiventa"); //leemos la propiedad folio del bootn con la clase .docs
        console.log(folio);
        console.log(idiventa);
        swal({
            title: '¿Seguro que desea cancelar la factura?',
            text: '',
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#93BE52',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "cancelaFactura.php",
                    data: "serie=UCP&folio=" + folio,
                    success: function (text) {
                        //PagosLiquidados();
                        console.log(text.data[0].cancelaCFDIPropioPruebasResult.listaUuid.EstatusUUID.Estatus);
                        var estatus = text.data[0].cancelaCFDIPropioPruebasResult.listaUuid.EstatusUUID.Estatus;
                        var UUID = text.data[0].cancelaCFDIPropioPruebasResult.listaUuid.EstatusUUID.UUID;
                        var FechaCancelacion = text.data[0].cancelaCFDIPropioPruebasResult.FechaCancelacion;

                        swalert("Estatus de la cancelacion: " + estatus + ", UUID: " + UUID + ", Fecha de cancelación: " + FechaCancelacion);
                        setEstatusFactura(folio, idiventa, estatus);
                    }
                });
            }
        });
    })

    function setEstatusFactura(folio, idiventa, estatus) {
        var facturado = '';
        if (estatus == '201') {
            facturado = 'No';
        } else {
            facturado = '3';
        }
        $.ajax({
            type: "POST",
            url: "dataConect/pagos.php",
            data: "action=setEstatusFactura&facturado=" + facturado + "&folio_facturado=" + folio + "&idiventa=" + idiventa,
            success: function (text) {
                PagosLiquidados();
            }
        });
    }

    function getcardAlumnoByMatricula(matricula) {
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcardAlumnoByMatricula&matricula=" + matricula,
            success: function (text) {
                var date = text.data[0];
                // console.log(date)
                $("#rfcfact").val(date.rfc);
                $("#nombrefact").val(date.nombre + ' ' + date.apellido_paterno + ' ' + date.apellido_materno);
                $("#emailfact").val(date.email);
                $("#to").val(date.email);
            }
        });
    }

    function PagosLiquidados() {
        $("#tablePagosLiquidados").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: "action=getPagosLiquidados",
            success: function (text) {
                //console.log(text);
                //console.log(text.data);
                var date = text.data;
                var txt = "";
                console.log(date);
                txt += '<div class="table-responsive"> <table id="tbxd09" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Ticket</th><th>Factura</th><th>Matrícula</th><th>Estatus</th><th>Subtotal</th><th>Descuento</th><th>Total</th><th>Personal que atendio</th><th>Fecha de cobro</th><th>Método de pago</th><th>Banco</th><th>ID de la transaccion</th><th>Últimos 4 digitos de la tarjeta</th><th>Titular</th><th>Comentarios</th><th>Facturado</th><th>Folio de factura</th>\n\
                </tr> </thead>';
                for (x in date) {
                    txt += '<tr>';
                    txt += "<td>" + date[x].idipago + "</td>";
                    txt += '<td> <a title="Imprimir ticket" class="btn btn-link btn-sm" target="_blank" href="ticket.php?folio=' + date[x].folio + '&matricula=' + date[x].matricula + '&idiventa=' + date[x].idiventa + '">' + date[x].folio + "</a></td>";
                    if (date[x].facturado == 'No') {
                        txt += "<td><button type='button' title='Facturar ticket' class='btn btn-sm btn-success facturar' ticket='" + date[x].folio + "' venta='" + date[x].idiventa + "' idiventa='" + date[x].idiventa + "' matricula='" + date[x].matricula + "' data-toggle='modal' data-target='#datosTimbrado' id='btnModalFactura'><i class='fas fa-bell'></i></button></td>";
                    } else if (date[x].facturado === '3') {
                        txt += "<td>En Proceso de cancelación</td>";
                    } else {
                        txt += "<td><button type='button' title='Descargar Factura' class='btn btn-sm btn-secondary docs' folio='" + date[x].folio_facturado + "' serie='' matricula='" + date[x].matricula + "' data-toggle='modal' data-target='#documento' id='btndownloadDocs'><i class='fas fa-download'></i></button>";
                        txt += "<button type='button' title='Cancelar Factura' class='btn btn-sm btn-danger cancel' folio='" + date[x].folio_facturado + "' serie='' idiventa='" + date[x].idiventa + "' id='cancelaFactura'><i class='fas fa-ban'></i></button></td>";
                    }
                    txt += "<td>" + date[x].matricula + "</td>";
                    txt += "<td>" + date[x].estatus + "</td>";
                    txt += "<td>$" + date[x].subtotal + "</td>";
                    txt += "<td>$" + date[x].descuento + "</td>";
                    txt += "<td>$" + date[x].total + "</td>";
                    txt += "<td>" + date[x].idiusuario + "</td>";
                    txt += "<td>" + date[x].fecha + "</td>";
                    txt += "<td>" + date[x].metodo_pago + "</td>";
                    txt += "<td>" + date[x].banco + "</td>";
                    txt += "<td>" + date[x].iditransaccion + "</td>";
                    txt += "<td>" + date[x].digitos + "</td>";
                    txt += "<td>" + date[x].titular_tarjeta + "</td>";
                    txt += "<td>" + date[x].comentarios + "</td>";
                    txt += "<td>" + date[x].facturado + "</td>";
                    txt += "<td>" + date[x].folio_facturado + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("tablePagosLiquidados").innerHTML = txt;
                var table = $('#tbxd09').DataTable({
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

                $('#tbxd09 tbody').on('click', 'tr', function () {
                    var datos = table.row(this).data();
                });
                //readyFilter();
                // Setup - add a text input to each footer cell
                $('#tbxd09 thead tr').clone(true).appendTo('#tbxd09 thead');
                $('#tbxd09 thead tr:eq(1) th').each(function (i) {
                    var title = $(this).text();
                    $(this).html('<input id="txt-' + title + '" type="text" placeholder="Filtrar por ' + title + '" />');

                    $('input', this).on('keyup change', function () {
                        if (table.column(i).search() !== this.value) {
                            table
                                    .column(i)
                                    .search(this.value)
                                    .draw();
                        }
                    });
                    $('#txt-Cobro').change(function () {
                        if (table.column(i).search() !== this.value) {
                            table
                                    .column(i)
                                    .search(this.value)
                                    .draw();
                        }
                    });
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                //alert("No fue posible conectar con el servidor");
                document.getElementById("tablePagosLiquidados").innerHTML = "No se ha generado ningún cobro";
            }
        });
    }

</script>
