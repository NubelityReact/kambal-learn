<?php include './headers.php'; ?>
<div class="row">
    <div class="col-12">
        <div class="card card-border-warning">
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
                <span class="float-right"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalCSV">Subir servicios CSV <i class="pe-7s-file"></i></button></span>
                <span class="float-right"><a href="core_gerencia_addServicio.php" class="btn btn-success btn-sm">Nuevo Servicio <i class="pe-7s-add-user"></i></a></span><br><br>
                <div id="loadTableServicios"></div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="modalCSV">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-primary">Subir Servicios CSV <i class="pe-7s-file"></i></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="core_servicios_upload_csv.php" method="post" enctype="multipart/form-data">
                    <h5>Descargue el archivo de muestra y llene las celdas de los campos que se solicitan. </h5>
                    <h5>Despues guardelo en formato CSV delimitado por comas. </h5><br>
                    <label><i class="pe-7s-info pe-2x text-danger"></i> Evite una carga lenta procurando que el archivo no contenga mas de 1000 filas por subida</label>
                    <label><i class="pe-7s-info pe-2x text-warning"></i> Evite agregar filas sin datos. Si los datos del Servicio estan incompletos escriba la palabra <strong>null</strong> o bién dejando la celda en blanco</label>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="d">Archivo CSV de ejemplo: </label>
                            <a href="servicios.csv" class="text-primary">servicios.csv</a>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="aspirantes_csv">Seleccione un Archivo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="servicios_csv" name="servicios_csv" accept=".csv" required>
                                <label class="custom-file-label" for="customFile">Seleccionar archivo</label>
                            </div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Subir archivo <i class="pe-7s-file"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    $(document).ready(function () {
        getServicios();
    });

    function getServicios() {
        $("#loadTableServicios").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: "action=getServiciosEscolares",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tableServicios" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Acciones</th><th>Categoria</th><th>Servicio</th><th>Precio</th><th>Aplica descuento</th><th>Es facturable</th><th>Estatus</th><th>Fecha</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    var estatus = date[x].suspended;
                    var idiservicio = date[x].idiservicio;
                    var suspended = date[x].suspended;
                    var es_facturable = date[x].es_facturable;
                    var apply_discount = date[x].apply_discount;
                    var btn_update = '<a href= "core_gerencia_updateServicio.php?idiservicio=' + idiservicio + '" type="button" class="btn btn-sm">Editar <i class="fa fa-pen-square"></i></a>';
                    var btn_delete = '<button type="button" class="btn btn-danger btn-sm" onclick="delete_(' + idiservicio + ')">Eliminar <i class="fa fa-trash"></i></button>';
                    var btn_suspended = '<button type="button" class="btn btn-warning btn-sm" onclick="suspended_(' + idiservicio + ',1)">Suspender <i class="fa fa-ban"></i></button>';
                    var btn_actived = '<button type="button" class="btn btn-success btn-sm" onclick="suspended_(' + idiservicio + ',0)">Activar <i class="fa fa-check-circle"></i></button>';

                    if (suspended == 0) {
                        var estatus_ = '<td class="table-success">Activo</td>';
                    } else {
                        var estatus_ = '<td class="table-danger">Inactivo</td>';
                    }
                    if (apply_discount == 0) {
                        var apply_discount = 'No';
                    } else {
                        var apply_discount = 'Si';
                    }
                    if (es_facturable == 0) {
                        var es_facturable = 'No';
                    } else {
                        var es_facturable = 'Si';
                    }
                    if (estatus == 0) {
                        estatus = '<td class="table-success">Activo</td>';
                    } else {
                        estatus = '<td class="table-danger">Inactivo</td>';
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
                    txt += "<td>" + date[x].categoria + "</td>";
                    txt += "<td>" + date[x].descripcion + "</td>";
                    txt += "<td>$" + date[x].precio + "</td>";
                    txt += "<td>" + apply_discount + "</td>";
                    txt += "<td>" + es_facturable + "</td>";
                    txt += estatus;
                    txt += "<td>" + date[x].created + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("loadTableServicios").innerHTML = txt;
                var table = $('#tableServicios').DataTable();
                $('#tableServicios tbody').on('click', 'tr', function () {
                    var datos = table.row(this).data();
                    //alert(datos[0]);
                    $("#idiservicio").val(datos[0]);
                    $("#descripcion").val(datos[1]);
                    $("#precio").val(datos[2]);
                    $("#modalMateriales .close").click()
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("loadTableServicios").innerHTML = errorThrown;
            }
        });
    }


    function delete_(idiservicio) {
        var r = confirm("Desea borrar este elemento?");
        if (r) {
            swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/pagos.php",
                data: "action=delete_servicio&idiservicio=" + idiservicio,
                success: function (text) {
                    if (text == "success") {
                        swalert('Mensaje!', 'Elemento borrado correctamente', 'success');
                        getServicios();
                    } else {
                        swalert('Mensaje!', text, 'info');
                    }
                }
            });
        }
    }

    function suspended_(idiservicio, suspended) {
        swalert('Mensaje!', 'Procesando...', 'info');
        $.ajax({
            type: "POST",
            url: "dataConect/pagos.php",
            data: "action=suspended_servicio&idiservicio=" + idiservicio + '&suspended=' + suspended,
            success: function (text) {
                if (text == "success") {
                    getServicios();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }


</script>