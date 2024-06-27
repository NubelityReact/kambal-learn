
<div id="tablePagos"></div>

<script>
    $(document).ready(function () {
        getTutores();
    });
    function getTutores() {
        $("#tablePagos").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: "action=getTutores",
            success: function (text) {
                console.log(text);
                console.log(text.data);
                var date = text.data;
                var txt = "";
                console.log(date);
                txt += '<div class="table-responsive"> <table id="tbPag0" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>Detalles</th><th>Folio</th><th>Estatus</th><th>Subtotal</th><th>Descuento</th><th>Total</th><th>Método de pago</th><th>Comentarios</th>\n\
                <th>Fecha de la transacción</th><th>Personal quien atendio</th></tr> </thead>';
                for (x in date) {
                    txt += '<tr>';
                    txt += "<td>" + date[x].idipago + "</td>";
                    txt += "<td>" + date[x].folio + "</td>";
                    txt += "<td>" + date[x].estatus + "</td>";
                    txt += "<td>" + date[x].subtotal + "</td>";
                    txt += "<td>" + date[x].descuento + "</td>";
                    txt += "<td>" + date[x].total + "</td>";
                    txt += "<td>" + date[x].metodo_pago + "</td>";
                    txt += "<td>" + date[x].comentarios + "</td>";
                    txt += "<td>" + date[x].fecha + "</td>";
                    txt += "<td>" + date[x].idiusuario + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("tablePagos").innerHTML = txt;
                var table = $('#tbPag0').DataTable({
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

                $('#tbPag0 tbody').on('click', 'tr', function () {
                    var datos = table.row(this).data();
                    //alert(datos[0]);
//                $("#Material").val(datos[0]);
//                $("#Cantidad").val("1");
//                $("#Fabrica").val(datos[1]);
//                $("#Almacen").val(datos[2]);
//                $("#modalMateriales .close").click()
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                document.getElementById("tablePagos").innerHTML = "No ha agregado a ningun tutor";
            }
        });
    }

</script>
