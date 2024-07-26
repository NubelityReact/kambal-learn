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

        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active text-success" data-toggle="pill" href="#home"><i class="<?php echo "$breadcrumb_icon"; ?>"></i> Plantilla de notificación</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-warning" data-toggle="pill" href="#Destinatarios"><i class="fas fa-user-circle"></i> Destinatarios</a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane active">
                <div class="card card-border-success">
                    <div class="card-header bg-white cfos">
                        <h4 class="float-left name_template"></h4>
                        <h4 class="float-right"><?php echo $breadcrumb_descripcion; ?></h4>
                    </div>
                    <div class="card-block user-detail-card">
                        <hr>
                        <!--form script for table notifications--> 
                        <form role="form" id="form_notifications" data-toggle="validator" class="shake" autocomplete="off" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" maxlength="100" class="form-control name" id="name" name="name" placeholder="Ingrese el Nombre" required>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="description">Descripción</label>
                                        <input type="text"  class="form-control" id="description" name="description" placeholder="Opcional">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="description">Acciones</label><br>
                                        <div class="btn-group" id="btns_actions"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="comments">Comentarios</label>
                                        <textarea rows="3" class="form-control" id="comments" name="comments"></textarea>                        
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <h4>Cabeceras de notificación</h4>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="subject">Asunto</label>
                                        <input type="text" maxlength="100" class="form-control" id="subject" name="subject" placeholder="Ingrese asunto" required>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="sender_email">Correo del remitente</label>
                                        <input type="email" maxlength="100" class="form-control" id="sender_email" name="sender_email" placeholder="Ingrese correo del remitente" required>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="sender_name">Nombre de remitente</label>
                                        <input type="text" maxlength="100" class="form-control" id="sender_name" name="sender_name" placeholder="Ingrese Nombre de remitente" required>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12" id="arc_adjunto"></div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="files" data-toggle="collapse" data-target="#colapse_file">Actualizar archivo adjunto <i class="text-info">De clic para seleccionar</i></label>
                                        <div id="colapse_file" class="collapse">
                                            <label><i class="far fa-file-pdf pe-2x text-success"></i>  El archivo debe tener un formato PDF </label><br>
                                            <label><i class="pe-7s-info pe-2x text-danger"></i> Seleccione únicamente un archivo</label><br>
                                            <label><i class="pe-7s-info pe-2x text-warning"></i> El archivo deben tener un tamaño máximo de 1Mb</label>
                                            <input type="file" class="form-control" id="sortpicture" name="sortpicture" placeholder="Enter file" required accept=".pdf">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-12">
                                    <h4>Cuerpo del mensaje</h4>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" required></textarea>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Guardar</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="Destinatarios" class="tab-pane">
                <div class="card card-border-warning">
                    <div class="card-header bg-white cfos">
                        <h4 class="float-left name_template"></h4>
                        <h4 class="float-right"><?php echo $breadcrumb_descripcion; ?> > Destinatarios</h4>
                    </div>
                    <div class="card-block user-detail-card">
                        <hr>
                        <div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Seleccione una acción o evento</label>        
                                        <div id="selector_event">
                                        </div>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="ciclo">Seleccione a los destinatarios</label><br>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-person-actions">De clic para seleccionar</button>
                                        <div class="help-block with-errors text-danger"></div>
                                        <i class="person_length"></i>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="ciclo">Agregar destinatarios</label><br>
                                        <button id="btn_destinatarios" class="btn btn-sm btn-success"><i class="<?php echo "$breadcrumb_icon"; ?> pe-va pe-2x"></i></button>
                                    </div>
                                </div>
                            </div>                 
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                            <hr>
                            <h5>Lista de destinatarios</h5> <i class="selected_person_length"></i>
                            <div id="div_notifications_targets"></div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="modal-person-actions">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Seleccione a los destinatarios</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="divCandidatosIdiCampus">
                    <label>Seleccione a los destinatarios</label>
                </div>
            </div>
            <div class="modal-footer">
                <div class="person_length"></div>
                <button type="button" class="btn btn-outline-warning btn_cancel" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Continuar</button>
            </div>
        </div>
    </div>
</div>

<script src="asset/js/ckeditor.js"></script>
<?php include './footer.php'; ?>

<script>
    function get_notifications_events() {
        $("#selector_event").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=get_notifications_events",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control" id="idievent" name="idievent" required onchange="get_notifications_targets()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idievent + '">' + date[x].name + '</option>';
                }
                txt += "</select>";
                $("#selector_event").html(txt);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#selector_event").html('<div class="alert alert-warning"><strong>Sin Resultados</strong> 0 resultados</i></div>');
            }
        });
    }
</script>
<script>
    $(document).ready(function () {
        get_notifications_id();
        get_notifications_events();
    });
    
    let appEditor;
    ClassicEditor
            .create(document.querySelector('#message'), {
                //toolbar: ['heading', '|', 'bold', 'italic', 'link']
            })
            .then(editor => {
                appEditor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });
    
    function get_notifications_id() {
        $('#btns_actions').html('');
        var idinotification = "<?php print_r($_GET["idinotification"]) ?>";
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=get_notifications_id&idinotification=" + idinotification,
            success: function (text) {
                var date = text.data[0];
                var suspended = date.suspended;
                var deleted = date.deleted;
                $('#name').val(date.name);
                $('.name_template').html(date.name);
                $('#description').val(date.description);
                $('#comments').val(date.comments);
                $('#subject').val(date.subject);
                $('#message').val(date.message);
                $('#sender_email').val(date.sender_email);
                $('#sender_name').val(date.sender_name);
                $('#files_name').val(date.files_name);
                appEditor.setData(date.message);
                var btn_delete = '<button type="button" class="btn btn-danger btn-sm" onclick="delete_notification(' + idinotification + ')">Eliminar <i class="fa fa-trash"></i></button>';
                var btn_suspended = '<button type="button" class="btn btn-warning btn-sm" onclick="suspended_notification(' + idinotification + ',1)">Suspender <i class="fa fa-ban"></i></button>';
                var btn_actived = '<button type="button" class="btn btn-success btn-sm" onclick="suspended_notification(' + idinotification + ',0)">Activar <i class="fa fa-check-circle"></i></button>';
                var btn_send_notification = '<button type="button" class="btn btn-primary btn-sm" onclick="send_notification(' + idinotification + ')">Envíarme una prueba <i class="fa fa-mail-bulk"></i></button>';
                
                if (suspended == 0) {
                    $('#btns_actions').append(btn_send_notification);
                    $('#btns_actions').append(btn_suspended);
                    $('#btns_actions').append(btn_delete);
                } else {
                    $('#btns_actions').append(btn_actived);
                    $('#btns_actions').append(btn_delete);
                }
                var str = date.files_name;
                var n = str.length;
                if (n <= 0) {
                    $('#arc_adjunto').html('<br>');
                } else {
                    $('#arc_adjunto').html('<label onclick="showFile(' + idinotification + ')"><i class="fa fa-paperclip pe-2x text-success"></i> Ver archivo adjunto actual: <a href="#">' + date.files_name + '</a></label>  <button type="button" class="btn btn-danger btn-sm" onclick="notification_file_remove(' + idinotification + ')"> Remover <i class="fa fa-trash"></i></button><br>');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                swalert('Error', "No ha agregado ninguna plantilla", 'danger');
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
                        location.href = "<?php echo $breadcrumb_btnBack; ?>";
                    } else {
                        swalert('Mensaje!', text, 'info');
                    }
                }
            });
        }
    }
    
    function notification_file_remove(idinotification) {
        var r = confirm("Desea remover el documento adjunto?");
        if (r) {
            swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=notification_file_remove&idinotification=" + idinotification,
                success: function (text) {
                    if (text == "success") {
                        swalert('Mensaje!', 'El docummento se removió correctamente', 'success');
                        location.reload();
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
                    location.reload();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }
    
    $("#form_notifications").validator().on("submit", function (event) {
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
        swalert('Espere!', 'Guardando...', 'info');
        var idinotification = "<?php print_r($_GET["idinotification"]) ?>";
        var name = $("#name").val();
        var description = $("#description").val();
        var comments = $("#comments").val();
        var subject = $("#subject").val();
        var message = $("#message").val();
        var sender_email = $("#sender_email").val();
        var sender_name = $("#sender_name").val();
        var file_data = $('#sortpicture').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('action', 'add_notifications');
        form_data.append('name', name);
        form_data.append('description', description);
        form_data.append('comments', comments);
        form_data.append('subject', subject);
        form_data.append('message', appEditor.getData());
        form_data.append('sender_email', sender_email);
        form_data.append('sender_name', sender_name);
        form_data.append('query_action', 'update');
        form_data.append('idinotification', idinotification);
        $.ajax({
            url: 'dataConect/API.php', // point to server-side PHP script 
            //dataType: 'text', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (text) {
                if (text == "success") {
                    swalert('Mensaje!', 'La plantilla se guardó correctamente', 'success');
                    location.reload();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }
    
    function formSuccess() {
        $("#form_notifications")[0].reset();
        //location.reload();
    }
    
    function formError() {
        $("#form_notifications").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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
    function showFile(DocumentoAlumnoId) {
        window.open('core_notification_show_file.php?file=' + DocumentoAlumnoId, 'popUpWindow', 'height=1000,width=800,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
    }
</script>
<script>
    $(document).ready(function () {
        getUserSAEM();
        get_notifications_targets();
    });
    function getUserSAEM() {
        $("#divCandidatosIdiCampus").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getUserSAEM",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="table-person" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap display compact">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Nombre</th><th>Apellidos</th><th>Entidad</th><th>Perfil</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    txt += '<tr>';
                    txt += '<td>' + (a + 1) + '</td>';
                    txt += '<td><input type="checkbox" class="persons" id="persons" name="persons" value="' + date[x].idigenerales + '"> ' + capitalize(date[x].nombre) + "</td>";
                    txt += "<td>" + capitalize(date[x].apellido_paterno) + ' ' + capitalize(date[x].apellido_materno) + "</td>";
                    txt += "<td>" + date[x].campus + "</td>";
                    txt += "<td>" + date[x].role + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                $("#divCandidatosIdiCampus").html(txt);
                //var table = $('#table-person').DataTable();
                var persons_array = [];
                $(".persons").click(function () {
                    $('.person_length').html('');
                    if ($(this).is(':checked')) {
                        var checked = ($(this).val());
                        persons_array.push(checked);
                        $('.person_length').html(persons_array.length + ' Seleccionados');
                    } else {
                        persons_array.splice($.inArray(checked, persons_array), 1);
                        $('.person_length').html(persons_array.length + ' Seleccionados');
                    }
                });
                
                $("#btn_destinatarios").click(function () {
                    if (persons_array.length > 0) {
                        var txt;
                        var r = confirm('Desea agregar ' + persons_array.length + ' a la lista de destinatarios? ');
                        if (r) {
                            asign_persons(persons_array);
                            persons_array = [];
                            $('.person_length').html('');
                        } else {
                            persons_array = [];
                            $('.person_length').html('');
                            txt = "You pressed Cancel!";
                        }
                    } else {
                        swalert('Mensaje', "Todos los campos son requeridos", 'warning');
                    }
                });
                
                $(".btn_cancel").click(function () {
                    persons_array = [];
                    $('.person_length').html('');
                    getUserSAEM();
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#divCandidatosIdiCampus").html('<div class="alert alert-warning"><strong>Sin Resultados</strong> 0 resultados</i></div>');
            }
        });
    }
    
    function asign_persons(persons_array) {
        persons_array.forEach(function (entry) {
            add_notifications_targets(entry, 'insert');
        });
    }
    
    function unassign(persons_array) {
        persons_array.forEach(function (entry) {
            add_notifications_targets(entry, 'delete');
        });
    }
    
    function add_notifications_targets(idigenerales, query_event) {
        var idinotification = "<?php print_r($_GET["idinotification"]) ?>";
        var idievent = $('#idievent').val();
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=add_notifications_targets&idigenerales=" + idigenerales + "&idievent=" + idievent + '&idinotification=' + idinotification + '&query_event=' + query_event,
            success: function (text) {
                if (text == "success") {
                    //swalert('Exito!', 'Lista de destinatarios actualizada!', 'success');
                    get_notifications_targets();
                } else {
                    swalert('Error!', text, 'error');
                }
            }
        });
    }
    
    function get_notifications_targets() {
        var idinotification = "<?php print_r($_GET["idinotification"]) ?>";
        var idievent = $('#idievent').val();
        $("#div_notifications_targets").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=get_notifications_targets&idinotification=" + idinotification + '&idievent=' + idievent,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="targets" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap display compact">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Nombre</th><th>Apellidos</th><th>Email</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    txt += '<tr>';
                    txt += '<td>' + (a + 1) + '</td>';
                    txt += '<td><input type="checkbox" class="remove_target" id="remove_target" name="remove_target" value="' + date[x].idigenerales + '"> ' + capitalize(date[x].nombre) + "</td>";
                    txt += "<td>" + capitalize(date[x].apellido_paterno) + ' ' + capitalize(date[x].apellido_materno) + "</td>";
                    txt += "<td>" + date[x].email + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                $("#div_notifications_targets").html(txt);
                var table = $('#targets').DataTable({
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: ['excel']
                });
                var persons_array = [];
                $(".remove_target").click(function () {
                    $('.selected_person_length').html('');
                    if ($(this).is(':checked')) {
                        var checked = ($(this).val());
                        persons_array.push(checked);
                        $('.selected_person_length').html(persons_array.length + ' Seleccionados');
                    } else {
                        persons_array.splice($.inArray(checked, persons_array), 1);
                        $('.selected_person_length').html(persons_array.length + ' Seleccionados');
                    }
                });
                
                table.button().add(1, {
                    action: function (e, dt, button, config) {
                        if (persons_array.length > 0) {
                            var txt;
                            var r = confirm('Desea remover de la lista a ' + persons_array.length + ' usuario(s)? ');
                            if (r) {
                                unassign(persons_array);
                                persons_array = [];
                                $('.selected_person_length').html('');
                                get_notifications_targets();
                            } else {
                                persons_array = [];
                                get_notifications_targets();
                                $('.selected_person_length').html('');
                                txt = "You pressed Cancel!";
                            }
                        } else {
                            swalert('Mensaje', "0 elementos seleccionados", 'warning');
                        }
                    },
                    text: 'Remover de la lista'
                });
                
                table.button().add(2, {
                    action: function (e, dt, button, config) {
                        $('.selected_person_length').html('');
                        persons_array = [];
                        get_notifications_targets();
                    },
                    text: 'Cancelar'
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#div_notifications_targets").html('<div class="alert alert-warning"><strong>Sin Resultados</strong> 0 resultados</i></div>');
            }
        });
    }
    
    
</script>
