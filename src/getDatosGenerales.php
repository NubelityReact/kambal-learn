<?php include './headers.php'; ?>
<div class="card card-border-primary">
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
        <span class="float-right">
            <div class="btn-group">
                <a href="addgenerales.php" class="btn btn-primary btn-sm">Nuevo aspirante <i class="pe-7s-add-user"></i></a>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCSV">Subir aspirantes CSV <i class="pe-7s-file"></i></button>
            </div>

        </span>
        <br><br>
        <div id="divTableDatosGral"></div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="modalCSV">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-primary">Subir aspirantes CSV <i class="pe-7s-file"></i></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="core_aspirantes_upload_csv.php" method="post" enctype="multipart/form-data">
                    <h5>Descargue el archivo de muestra y llene las celdas de los campos que se solicitan. </h5>
                    <h5>Despues guardelo en formato CSV delimitado por comas. </h5><br>
                    <label><i class="pe-7s-info pe-2x text-danger"></i> Evite una carga lenta procurando que el archivo no contenga mas de 1000 filas por subida</label>
                    <label><i class="pe-7s-info pe-2x text-warning"></i> Evite agregar filas sin datos, si los datos del aspirante estan incompletos escriba la palabra <strong>null</strong> en su lugar o bién dejando la celda en blanco</label>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="d">Archivo CSV de ejemplo: </label>
                            <a href="aspirantes.csv" class="text-primary">aspirantes.csv</a>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="aspirantes_csv">Seleccione un Archivo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="aspirantes_csv" name="aspirantes_csv" accept=".csv" required>
                                <label class="custom-file-label" for="customFile">Seleccionar archivo</label>
                            </div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Subir aspirantes <i class="pe-7s-file"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        getDatosGenerales();
    });
    function getDatosGenerales() {
        $("#divTableDatosGral").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getDatosGenerales",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tableAlumno" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"><tr><th>#</th> <th>Acción</th><th>Nombre</th><th>Apellido paterno</th> <th>Apellido materno</th><th>Estatus</th><th>Género</th><th>Estado civil</th><th>Edad</th><th>CURP</th><th>RFC</th><th>NSS</th><th>Email</th><th>Teléfono</th><th>Móvil</th><th>Medio de contacto</th></tr></thead>';
                for (x in date) {
                    var a = parseInt(x);
                    var idigenerales = date[x].idigenerales;
                    var suspended = date[x].suspended;
                    var btn_update = '<a href= "putgenerales.php?p=' + idigenerales + '" type="button" class="btn btn-sm">Editar <i class="fa fa-pen-square"></i></a>';
                    var btn_delete = '<button type="button" class="btn btn-danger btn-sm" onclick="delete_(' + idigenerales + ')">Eliminar <i class="fa fa-trash"></i></button>';
                    var btn_suspended = '<button type="button" class="btn btn-warning btn-sm" onclick="suspended_(' + idigenerales + ',1)">Suspender <i class="fa fa-ban"></i></button>';
                    var btn_actived = '<button type="button" class="btn btn-success btn-sm" onclick="suspended_(' + idigenerales + ',0)">Activar <i class="fa fa-check-circle"></i></button>';
                    if (suspended == 0) {
                        var suspended_ = '<td class="table-success">Activo</td>';
                    } else {
                        var suspended_ = '<td class="table-danger">Inactivo</td>';
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
                    txt += "<td>" + date[x].nombre + "</td>";
                    txt += "<td>" + date[x].apellido_paterno + "</td>";
                    txt += "<td>" + date[x].apellido_materno + "</td>";
                    txt += suspended_;
                    txt += "<td>" + date[x].genero + "</td>";
                    txt += "<td>" + date[x].estado_civil + "</td>";
                    txt += "<td>" + date[x].edad + "</td>";
                    txt += "<td>" + date[x].curp + "</td>";
                    txt += "<td>" + date[x].rfc + "</td>";
                    txt += "<td>" + date[x].nss + "</td>";
                    txt += "<td>" + date[x].email + "</td>";
                    txt += "<td>" + date[x].telefono + "</td>";
                    txt += "<td>" + date[x].movil + "</td>";
                    txt += "<td>" + date[x].medio + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                $("#divTableDatosGral").html(txt);
                var table = $('#tableAlumno').DataTable();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#divTableDatosGral").html('0 resultados');
            }
        });
    }
</script>
<script>

    function delete_(idigenerales) {
        var txt;
        var r = confirm("Desea eliminar el Usuario? " + idigenerales);
        if (r) {
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deleteidigenerales&idigenerales=" + idigenerales,
                success: function (text) {
                    if (text == "success") {
                        swalert('Exito!', 'Usuario Eliminado', 'success');
                        getDatosGenerales();
                    } else {
                        swalert('Error!', text, 'error');
                    }
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }

    function suspended_(idigenerales, suspended) {
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=suspended_idigenerales&idigenerales=" + idigenerales + '&suspended=' + suspended,
            success: function (text) {
                if (text == "success") {
                    getDatosGenerales();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }
</script>
