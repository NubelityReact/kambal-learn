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
        <!-- Nav pills -->
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active text-warning" data-toggle="pill" href="#vacante"><i class="fas fa-id-card-alt"></i> Datos de la Oferta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" data-toggle="pill" href="#campos"><i class="fas fa-info-circle"></i> Campos Personaizados</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="vacante" class="tab-pane active">
                <div class="card card-border-warning">
                    <div class="card-body">
                        <form role="form" id="formCarrera" data-toggle="validator" class="shake" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="col-sm-12">
                                        <h4>Datos de la Oferta.</h4><br>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="campus">Campus</label>
                                                <input class="form-control" id="campus" readonly="true">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="Perfil">Nivel</label>
                                                <input class="form-control" id="nivel" readonly="true">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="Estatus">Acciones</label>
                                                <div id="btns_actions"></div>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nombre">Nombre de la Oferta</label>
                                                <input type="text" class="form-control" maxlength="150" id="nombre" name="nombre" placeholder="Enter nombre" required>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="working_day">Duración</label>
                                                <input type="text" maxlength="255" class="form-control" id="working_day" name="working_day" value="No especificado" required>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="salary">Costo</label>
                                                <input type="text" maxlength="30" class="form-control" id="salary" name="salary" value="No especificado" required>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="available">Disponibilidad <br>(disponibles)</label>
                                                <input type="number" class="form-control" id="available" name="available" required>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="deadline">Fecha limite <br>(Cubrir Oferta)</label>
                                                <input type="date" class="form-control" id="deadline" name="deadline" required>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="rvoe" data-toggle="collapse" data-target="#colapse_image"><i class="fa fa-file-image pe-2x text-success"></i> Imagen (opcional) <br><i class="text-info">De clic para seleccionar</i></label>
                                                <div id="colapse_image" class="collapse">
                                                    <label><i class="far fa-file-image pe-2x text-danger"></i>  El archivo debe tener un formato JPG, PNG, JPEG, GIF </label><br>
                                                    <label><i class="pe-7s-info pe-2x text-danger"></i> Seleccione únicamente un archivo</label><br>
                                                    <label><i class="pe-7s-info pe-2x text-warning"></i> El archivo deben tener un tamaño máximo de 1Mb</label><br>
                                                    <label><i class="pe-7s-info pe-2x text-info"></i> El archivo deben tener dimenciones de 1080 x 1080</label>
                                                    <input type="file" class="form-control" id="rvoe" name="rvoe" accept="image/*">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div id="arc_adjunto"></div>
                                            <div class="form-group">
                                                <label for="files" data-toggle="collapse" data-target="#colapse_file"><i class="far fa-file-pdf pe-2x text-danger"></i> Archivo adjunto opcional <br><i class="text-info">De clic para seleccionar</i></label>
                                                <div id="colapse_file" class="collapse">
                                                    <label><i class="far fa-file-pdf pe-2x text-success"></i>  El archivo debe tener un formato PDF </label><br>
                                                    <label><i class="pe-7s-info pe-2x text-danger"></i> Seleccione únicamente un archivo</label><br>
                                                    <label><i class="pe-7s-info pe-2x text-warning"></i> El archivo deben tener un tamaño máximo de 1Mb</label>
                                                    <input type="file" class="form-control" id="sortpicture" name="sortpicture" placeholder="Enter file" required accept=".pdf">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="comments">Comentarios</label>
                                                <input type="text" maxlength="255" class="form-control" id="comments" name="comments">
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="perfilamiento" data-toggle="collapse" data-target="#colapse_1">El aspirante hará algún examén de perfilamiento? <i class="text-info">De clic para seleccionar</i></label>
                                                <div id="colapse_1" class="collapse">
                                                    <input type="number" min="1" placeholder="Escriba el id del curso" class="form-control" name="lms_course_id" id="lms_course_id" required>
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="perfilamiento" title="Cuando un aspirante concluya su registro, le llegara un correo electrónico de respuesta automática con el contenido de está plantilla">Seleccione una plantilla de respuesta automática 
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_notification">
                                                        <i class="fa fa-mail-bulk bg-c-blue"></i>
                                                    </button></label>
                                                <div>
                                                    <input type="number" readonly="true" min="1" class="form-control" name="idinotification" id="idinotification" required>
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4>Descripción de la Oferta</h4>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea name="message" id="message" required></textarea>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-4">
                                    <div class="col-sm-12">
                                        <h4>Imagen de la Oferta.</h4><br>
                                    </div>
                                    <center><div class="image_vacancy"></div></center>
                                </div>
                            </div>
                            <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Guardar datos</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </form>                
                    </div>
                </div>
            </div>
            <div id="campos" class="tab-pane">
                <div class="card card-border-primary">
                    <div class="card-body">   
                        <div class="card-header bg-white cfos">
                            <h4 class="float-left name_template"></h4>
                            <h4 class="float-right"><?php echo $breadcrumb_descripcion; ?> > Campos Personalizados</h4>
                        </div>
                        <div class="card-block user-detail-card">
                            <hr>
                            <h4>Seleccione los campos que aparecerían en el formulario de registro <i class="fas fa-link"></i> <a href="core_postularme.php?org=ovmx&oferta=<?php print_r($_GET['idicarrera']); ?>" target="_blank">Vista Previa </a></h4>
                            <div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="ciclo">Seleccione a los campos</label><br>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-person-actions">De clic para seleccionar</button>
                                            <div class="help-block with-errors text-danger"></div>
                                            <i class="person_length"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="ciclo">Agregar</label><br>
                                            <button id="btn_destinatarios" class="btn btn-sm btn-success"><i class="<?php echo "$breadcrumb_icon"; ?> pe-va pe-2x"></i></button>
                                        </div>
                                    </div>
                                </div>                 
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                                <hr>
                                <h5>Estos campos aparecerán en el formulario de registro</h5> <i class="selected_person_length"></i>
                                <div id="div_notifications_targets"></div>
                            </div>                        
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
                <h4 class="modal-title">Seleccione a los campos que pararecerán en e formulario de registro</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="divCandidatosIdiCampus">
                    <label>Seleccione a los campos que pararecerán en e formulario de registro</label>
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

<!-- The Modal -->
<div class="modal fade" id="modal_notification">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Seleccione una plantilla de respuesta automática </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <label>
                    Cuando un aspirante concluya su registro, le llegara un correo electrónico de respuesta automática con el contenido de está plantilla
                </label>
                <br>
                <div id="table_notifications"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<?php include './footer.php'; ?>
<script src="asset/js/ckeditor.js"></script>

<script>
    $(document).ready(function () {
        getCarreras();
        get_oferta_form();
        get_oferta_form_fields();
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
    
    function getCarreras() {
        var idicarrera = "<?php print_r($_GET['idicarrera']); ?>";
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcarrerabyId&idicarrera=" + idicarrera,
            success: function (text) {
                var date = text.data[0];
                var suspended = date.suspended;
                $('#idicampus').val(date.idicampus);
                $('#nombre').val(date.nombre);
                $('#available').val(date.available);
                $('#deadline').val(date.deadline);
                $('#NivelId').val(date.NivelId);
                $('#campus').val(date.campus);
                $('#nivel').val(date.nivel);
                $('#suspended').val(date.suspended);
                $('#working_day').val(date.working_day);
                $('#salary').val(date.salary);
                $('#lms_course_id').val(date.lms_course_id);
                $('#idinotification').val(date.idinotification);
                
                $('.name_template').html(date.nombre);
                $('#description').val(date.description);
                $('#comments').val(date.comments);
                $('#message').val(date.message);
                $('#files_name').val(date.files_name);
                appEditor.setData(date.message);
                var btn_delete = '<button type="button" class="btn btn-danger btn-sm" onclick="delete_carrera(' + idicarrera + ')">Eliminar <i class="fa fa-trash"></i></button>';
                var btn_suspended = '<button type="button" class="btn btn-warning btn-sm" onclick="suspended_carrera(' + idicarrera + ',1)">Suspender <i class="fa fa-ban"></i></button>';
                var btn_actived = '<button type="button" class="btn btn-success btn-sm" onclick="suspended_carrera(' + idicarrera + ',0)">Activar <i class="fa fa-check-circle"></i></button>';
                var btn_send_notification = '<button type="button" class="btn btn-primary btn-sm" onclick="send_notification(' + idicarrera + ')">Envíarme una prueba <i class="fa fa-mail-bulk"></i></button>';
                
                if (suspended == 0) {
                    //$('#btns_actions').append(btn_send_notification);
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
                    $('#arc_adjunto').html('<label onclick="showFile(' + idicarrera + ')"><i class="fa fa-paperclip pe-2x text-success"></i> Ver archivo adjunto actual: <a href="#">' + date.files_name + '</a></label>  <button type="button" class="btn btn-danger btn-sm" onclick="carrera_file_remove(' + idicarrera + ')" title="Remover"> <i class="fa fa-trash"></i></button><br>');
                }
                $('.image_vacancy').html('<img src="asset/images/izzi/' + date.rvoe + '" class="rounded" alt="Cinque Terre" width="60%">');
            },
            error: function (jqXHR, textStatus, errorThrown) {
            }
        });
    }
    
    function delete_carrera(idicarrera) {
        var r = confirm("Desea Eliminar esta Oferta?");
        if (r) {
            swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=delete_carrera&idicarrera=" + idicarrera,
                success: function (text) {
                    if (text == "success") {
                        swalert('Mensaje!', 'La Oferta se eliminó correctamente', 'success');
                        location.href = "<?php echo $breadcrumb_btnBack; ?>";
                    } else {
                        swalert('Mensaje!', text, 'info');
                    }
                }
            });
        }
    }
    
    function carrera_file_remove(idicarrera) {
        var r = confirm("Desea remover el documento adjunto?");
        if (r) {
            swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=carrera_file_remove&idicarrera=" + idicarrera,
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
    
    function suspended_carrera(idicarrera, suspended) {
        swalert('Mensaje!', 'Procesando...', 'info');
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=suspended_carrera&idicarrera=" + idicarrera + '&suspended=' + suspended,
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
    
    function showFile(idicarrera) {
        window.open('core_carrera_show_file.php?file=' + idicarrera, 'popUpWindow', 'height=1000,width=800,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
    }
</script>
<script>
    $("#formCarrera").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Llene los campos requeridos");
        } else {
            // everything looks good!
            event.preventDefault();
            newDocument();
        }
    });
    
    function newDocument() {
        swalert('Mensaje', "Procesando...", 'info');
        var idicarrera = "<?php print_r($_GET['idicarrera']); ?>";
        swalert('Mensaje', "Procesando...", 'info');
        var idicampus = $("#idicampus").val();
        var NivelId = $("#NivelId").val();
        var nombre = $("#nombre").val();
        var available = $("#available").val();
        var deadline = $("#deadline").val();
        var rvoe = $('#rvoe').prop('files')[0];
        var working_day = $("#working_day").val();
        var lms_course_id = $("#lms_course_id").val();
        var idinotification = $("#idinotification").val();
        var salary = $("#salary").val();
        var description = $("#description").val();
        var comments = $("#comments").val();
        var file_data = $('#sortpicture').prop('files')[0];
        var form_data = new FormData();
        form_data.append('idinotification', idinotification);
        form_data.append('idicarrera', idicarrera);
        form_data.append('working_day', working_day);
        form_data.append('salary', salary);
        form_data.append('rvoe', rvoe);
        form_data.append('lms_course_id', lms_course_id);
        form_data.append('action', 'addCarrera');
        form_data.append('idicampus', idicampus);
        form_data.append('NivelId', NivelId);
        form_data.append('nombre', nombre);
        form_data.append('available', available);
        form_data.append('deadline', deadline);
        form_data.append('file', file_data);
        form_data.append('description', description);
        form_data.append('comments', comments);
        form_data.append('message', appEditor.getData());
        form_data.append('query_action', 'update');
        $.ajax({
            url: 'dataConect/API.php', // point to server-side PHP script 
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (text) {
                if (text == "success") {
                    swalert('Mensaje!', 'La Oferta se guardó correctamente', 'success');
                    location.reload();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }
    
    function formError() {
        $("#formCarrera").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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
</script>
<script>
    function get_oferta_form() {
        $("#divCandidatosIdiCampus").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=get_oferta_form",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="table-person" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap display compact">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Campo</th><th>Categoría</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    txt += '<tr>';
                    txt += '<td>' + (a + 1) + '</td>';
                    txt += '<td><input type="checkbox" class="persons" id="persons" name="persons" value="' + date[x].idiform + '"> ' + date[x].name + "</td>";
                    txt += "<td>" + date[x].category + "</td>";
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
                        var r = confirm('Desea agregar ' + persons_array.length + ' elemento(s)? ');
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
            add_oferta_form(entry, 'insert');
        });
    }
    
    function unassign(persons_array) {
        persons_array.forEach(function (entry) {
            add_oferta_form(entry, 'delete');
        });
    }
    
    function add_oferta_form(idiform, query_event) {
        var idicarrera = "<?php print_r($_GET['idicarrera']); ?>";
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=add_oferta_form&idicarrera=" + idicarrera + "&idiform=" + idiform + '&query_event=' + query_event,
            success: function (text) {
                if (text == "success") {
                    //swalert('Exito!', 'Lista de destinatarios actualizada!', 'success');
                    get_oferta_form_fields();
                } else {
                    swalert('Error!', text, 'error');
                }
            }
        });
    }
    
    function get_oferta_form_fields() {
        var idicarrera = "<?php print_r($_GET['idicarrera']); ?>";
        $("#div_notifications_targets").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div><div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" style="width:70%"></div></div>  ');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=get_oferta_form_fields&idicarrera=" + idicarrera,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="targets" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap display compact">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Campo</th><th>Categoría</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    txt += '<tr>';
                    txt += '<td>' + (a + 1) + '</td>';
                    txt += '<td><input type="checkbox" class="remove_target" id="remove_target" name="remove_target" value="' + date[x].idiform + '"> ' + date[x].name + "</td>";
                    txt += "<td>" + date[x].category + "</td>";
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
                            var r = confirm('Desea remover ' + persons_array.length + ' Elemento(s)? ');
                            if (r) {
                                unassign(persons_array);
                                persons_array = [];
                                $('.selected_person_length').html('');
                                get_oferta_form_fields();
                            } else {
                                persons_array = [];
                                get_oferta_form_fields();
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
                        get_oferta_form_fields();
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
                txt += '<div class="table-responsive"> <table id="notifications_" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>Id</th><th>Plantilla</th><th>Descripción</th><th>Archivo adjunto</th><th>Creación</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    txt += '<tr>';
                    txt += "<td>" + date[x].idinotification + "</td>";
                    txt += '<td><button class="btn btn-sm btn-outline-success">Seleccionar</button> ' + date[x].name + "</td>";
                    txt += "<td>" + date[x].description + "</td>";
                    txt += "<td>" + date[x].files_name + "</td>";
                    txt += "<td>" + date[x].created + "</td>";
                    txt += '</tr>';
                }
                txt += "</table> </div>"
                $("#table_notifications").html(txt);
                var table = $('#notifications_').DataTable();
                
                $('#notifications_ tbody').on('click', 'tr', function () {
                    var datos = table.row(this).data();
                    //alert(datos[0]);
                    $("#idinotification").val(datos[0]);
                    $("#modal_notification .close").click()
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#table_notifications").html('<div class="alert alert-warning"><strong>Sin Resultados</strong> 0 resultados</i></div>');
            }
        });
    }
</script>

