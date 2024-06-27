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
        <span class="float-right"><a href="cobro.php" class="btn btn-success btn-sm">Nuevo cobro a estudiante <i class="pe-7s-add-user"></i></a></span><br><br>
        <div id="tablePagos"></div>
    </div>
</div>
<script>
    $(document).ready(function () {
        getCobrosbyID();
    });
    function getCobrosbyID() {
        $("#tablePagos").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: "action=getCobrosbyID",
            success: function (text) {
                console.log(text);
                console.log(text.data);
                var date = text.data;
                var txt = "";
                console.log(date);
                txt += '<div class="table-responsive"> <table id="tbPag0" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>Código</th><th>Folio</th><th>Matrícula</th><th>Estatus</th><th>Subtotal</th><th>Descuento</th><th>Total</th><th>Método de pago</th><th>Comentarios</th>\n\
                <th>Fecha de la transacción</th><th>Personal quien atendio</th></tr> </thead>';
                for (x in date) {
                    txt += '<tr>';
                    txt += "<td>" + date[x].idipago + "</td>";
                    txt += "<td>" + date[x].folio + "</td>";
                    txt += "<td>" + date[x].matricula + "</td>";
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
                //alert("No fue posible conectar con el servidor");
                document.getElementById("tablePagos").innerHTML = "No se ha generado ningún cobro";
            }
        });
    }

</script>
