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
        <hr>
        <div>
            <div class="float-left" id="filtros"> </div>
            <div class="float-right" id="subida">
                <label for="name" class="h4">Crear plantilla de notificación </label>
                <div class="input-group mb-3">
                    <a href="core_notification_template.php" class="btn btn-success text-light">Crear <i class="fa fa-mail-bulk pe-2x pe-va"></i></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">       
        <div id="table_notifications"></div>
    </div>
</div>
<?php include './footer.php'; ?>

<script>
    $(document).ready(function () {
        get_notifications();
    });
    function get_notifications() {
        $("#table_notifications").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=get_notifications",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="solpx3" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>Fila</th><th>Plantilla</th><th>Descripción</th><th>Archivo adjunto</th><th>Acciones</th><th>Creación</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    var idinotification = date[x].idinotification;
                    var suspended = date[x].suspended;
                    var deleted = date[x].deleted;
                    var btn_update = '<a href= "core_notification_template_update.php?idinotification=' + idinotification + '" type="button" class="btn btn-sm">Editar <i class="fa fa-pen-square"></i></a>';
                    var btn_delete = '<button type="button" class="btn btn-danger btn-sm" onclick="delete_notification(' + idinotification + ')">Eliminar <i class="fa fa-trash"></i></button>';
                    var btn_suspended = '<button type="button" class="btn btn-warning btn-sm" onclick="suspended_notification(' + idinotification + ',1)">Suspender <i class="fa fa-ban"></i></button>';
                    var btn_actived = '<button type="button" class="btn btn-success btn-sm" onclick="suspended_notification(' + idinotification + ',0)">Activar <i class="fa fa-check-circle"></i></button>';
                    var btn_send_notification = '<button type="button" class="btn btn-primary btn-sm" onclick="send_notification(' + idinotification + ')">Envíarme una prueba <i class="fa fa-mail-bulk"></i></button>';

                    txt += '<tr>';
                    txt += "<td>" + (a + 1) + "</td>";
                    txt += "<td>" + date[x].name + "</td>";
                    txt += "<td>" + date[x].description + "</td>";
                    txt += "<td>" + date[x].files_name + "</td>";
                    txt += '<td>';
                    txt += '<div class="btn-group" id="btns_actions">';
                    if (suspended == 0) {
                        txt += btn_update;
                        txt += btn_send_notification;
                        txt += btn_suspended;
                        txt += btn_delete;
                    } else {
                        txt += btn_update;
                        txt += btn_actived;
                        txt += btn_delete;
                    }
                    txt += '</div>';
                    txt += '</td>';
                    txt += "<td>" + date[x].created + "</td>";
                    txt += '</tr>';
                }
                txt += "</table> </div>"
                $("#table_notifications").html(txt);
                var table = $('#solpx3').DataTable();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#table_notifications").html('<div class="alert alert-warning"><strong>Sin Resultados</strong> 0 resultados</i></div>');
            }
        });
    }

    function send_notification(idinotification) {
        var r = confirm("Se enviará esta plantilla de notificación al correo electrónico configurado en su cuenta");
        if (r) {
            swalert('Mensaje!', 'Procesando...', 'info');
            var notifications_to = "<?php echo "$globaEmail"; ?>";
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=send_notification&idinotification=" + idinotification + '&notifications_to=' + notifications_to,
                success: function (text) {
                    if (text == "success") {
                        swalert('Mensaje!', 'La plantilla se envió correctamente al correo: ' + notifications_to + ', revise su bandeja de entrada', 'success');
                        get_notifications();
                    } else {
                        swalert('Mensaje!', text, 'info');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swalert('Mensaje!', jqXHR + ' ' + textStatus + ' ' + errorThrown, 'danger');
                }
            });
        }
    }

    function delete_notification(idinotification) {
        var r = confirm("Desea Eliminar esta plantilla?");
        if (r) {
            swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=delete_notification&idinotification=" + idinotification,
                success: function (text) {
                    if (text == "success") {
                        swalert('Mensaje!', 'La plantilla se eliminó correctamente', 'success');
                        get_notifications();
                    } else {
                        swalert('Mensaje!', text, 'info');
                    }
                }
            });
        }
    }

    function suspended_notification(idinotification, suspended) {
        swalert('Mensaje!', 'Procesando...', 'info');
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=suspended_notification&idinotification=" + idinotification + '&suspended=' + suspended,
            success: function (text) {
                if (text == "success") {
                    swalert('Mensaje!', 'actualización exitosa', 'success');
                    get_notifications();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }
</script>