
<div class="card card-border-danger">
    <div class="card-header bg-white cfos">
        <div class="float-left"><h4>Plan de Pago</h4><br>En este módulo, usted podrá consultar el estatus de sus colegiaturas e imprimir la ficha de deposito bancario</div>
        <h4 id="subtotal" class="float-right"></h4>
    </div>
    <div class="card-body">
        <div id="tableAdeudosByAlumno"></div>
    </div>    
</div>

<script src="asset/js/tararMontos.js"></script>
<script>
    var idiRoleGerencia = "<?php echo $edit; ?>";
    $(document).ready(function () {
        var idialumno = '<?php echo $idialumno; ?>';
        getPartidasPendientesByIdiAlumno(idialumno);
    });
    function getPartidasPendientesByIdiAlumno(idialumno) {
        tarar(idialumno);
        //swalert('Precesando', 'Espere', 'info');
        $("#subtotal").html('');
        $("#tableAdeudosByAlumno").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: "action=getHistorialPagosByIdiAlumno&idialumno=" + idialumno,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tbPag0q" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>Código</th><th>Estatus</th><th>Descripción del servicio</th><th>Fecha limite para el pago</th><th>Costo del servicio</th><th>Recargos</th><th>Total a pagar</th><th>Periodo</th>\n\
                <th>Fecha cobro</th></tr> </thead>';
                for (x in date) {
                    var payment = '<a href="core_referenced_payment.php?idiservicio=' + date[x].idiservicio + '&idialumno=' + idialumno + '&idiventa_as_servicio=' + date[x].idiventa_as_servicio + '" target="_blank"><button type="button" id="payment" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Imprimir Ficha de deposito"><i class="pe-7s-piggy pe-va"></i></button></a>';
                    txt += '<tr>';
                    txt += "<td>" + date[x].idiventa_as_servicio + "</td>";
                    if (date[x].estatus == "Pendiente") {
                        txt += '<td class="table-danger">' + payment + ' ' + date[x].estatus + " de pago</td>";
                    } else if (date[x].estatus == "Cancelado") {
                        txt += '<td class="table-secondary">' + date[x].estatus + "</td>";
                    } else {
                        if (idiRoleGerencia == 1) {
                            txt += '<td class="table-success">' + date[x].estatus + "</td>";
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
                    txt += "<td>" + date[x].comentario + "</td>";
                    txt += "<td>" + date[x].fecha_limite + "</td>";
                    txt += "<td>$ " + date[x].precio + "</td>";
                    txt += "<td>%" + date[x].recargo + "</td>";
                    txt += "<td>" + parseInt(pagar) + "</td>";
                    txt += "<td>" + date[x].periodo + "</td>";
                    txt += "<td>" + date[x].fecha_mod + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div></div>"
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
                //swalert(sumas);
                $("#subtotal").html('Total a Pagar: $ ' + sumas);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("tableAdeudosByAlumno").innerHTML = "Sin historial disponible";
            }
        });
    }
</script>
<script src="asset/js/dataTableSumColumn.js"></script>


