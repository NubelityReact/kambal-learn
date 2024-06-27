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
        <div class="card card-border-primary">
            <div class="card-body">
                <!--form script for table carrera--> 
                <form role="form" id="form_carrera" data-toggle="validator" class="shake" autocomplete="off">
                    <div class="row">   
                        <div class="col-sm-12">
                            <h4 class="cfos">Agregue una nueva Vacante a su organización, llenando los campos que se solicitan</h4>
                            <hr>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="idicampus">Seleccione una Zona o Sucursal</label>
                                <div class="divCampus"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="NivelId">Perfil</label>
                                <div class="divNivel">
                                    <select class="form-control">
                                        <option value="">Seleccione uno</option>
                                    </select>
                                </div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="nombre">Nombre de la Vacante</label>
                                <input type="text" maxlength="140" class="form-control" id="nombre" name="nombre" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="working_day">Jornada Laboral</label>
                                <input type="text" maxlength="255" class="form-control" id="working_day" name="working_day" value="No especificado" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="salary">Sueldo</label>
                                <input type="text" maxlength="30" class="form-control" id="salary" name="salary" value="No especificado" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="available">Disponibilidad (vacantes disponibles)</label>
                                <input type="number"  class="form-control" id="available" name="available" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="deadline">Fecha limite <br>(Cubrir vacantes)</label>
                                <input type="date" class="form-control" id="deadline" name="deadline" placeholder="Ingrese deadline" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="perfilamiento" data-toggle="collapse" data-target="#colapse_1">El candidato hará algún <br>examén de perfilamiento? <i class="text-info">De clic para seleccionar</i></label>
                                <div id="colapse_1" class="collapse">
                                    <input type="number" min="1" placeholder="Escriba el id del curso" class="form-control" name="lms_course_id" id="lms_course_id" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
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
                        <div class="col-sm-12">
                            <h4>Descripción de la Vacante</h4>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea name="message" id="message" required></textarea>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="rvoe" data-toggle="collapse" data-target="#colapse_image"><i class="fa fa-file-image pe-2x text-success"></i> Imagen (opcional) <i class="text-info">De clic para seleccionar</i></label>
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
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="files" data-toggle="collapse" data-target="#colapse_file"><i class="far fa-file-pdf pe-2x text-danger"></i> Archivo adjunto opcional <i class="text-info">De clic para seleccionar</i></label>
                                <div id="colapse_file" class="collapse">
                                    <label><i class="far fa-file-pdf pe-2x text-success"></i>  El archivo debe tener un formato PDF </label><br>
                                    <label><i class="pe-7s-info pe-2x text-danger"></i> Seleccione únicamente un archivo</label><br>
                                    <label><i class="pe-7s-info pe-2x text-warning"></i> El archivo deben tener un tamaño máximo de 1Mb</label>
                                    <input type="file" class="form-control" id="sortpicture" name="sortpicture" placeholder="Enter file" required accept=".pdf">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="comments">Comentarios intenos</label>
                                <input type="text" maxlength="255" class="form-control" id="comments" name="comments">
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
        getCampus();
    });

    ClassicEditor
            .create(document.querySelector('#message'), {
                //toolbar: ['heading', '|', 'bold', 'italic', 'link']
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });

    function get_perfil() {
        var examen = ('#perfilamiento').val();
        if (examen == 'Si') {

        }
    }
    function getCampus() {
        $(".divCampus").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCampus",
            success: function (text) {
                //console.log(text);
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill idicampus" id="idicampus" name="idicampus" required onchange="getNivel()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idicampus + '">' + date[x].campus + '</option>';
                }
                txt += "</select>";
                $(".divCampus").html(txt);
            }
        });
    }

    function getNivel() {
        var idicampus = $("#idicampus").val();
        $(".divNivel").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getNivelbyCampus&idicampus=" + idicampus,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fillNivelId NivelId" id="NivelId" name="NivelId" required>';
                if (text == "0 results") {
                    txt += '<option value="">0 resultados</option>';
                } else {
                    txt += '<option value="">Seleccione</option>';
                    for (x in date) {
                        txt += '<option value="' + date[x].NivelId + '" rc="' + date[x].Descripcion + '" >' + date[x].Descripcion + '</option>';
                    }
                }
                txt += "</select>";
                $(".divNivel").html(txt);
            }
        });
    }
</script>
<script>
    $("#form_carrera").validator().on("submit", function (event) {
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
        var idicampus = $("#idicampus").val();
        var NivelId = $("#NivelId").val();
        var nombre = $("#nombre").val();
        var available = $("#available").val();
        var deadline = $("#deadline").val();
        var rvoe = $('#rvoe').prop('files')[0];
        var working_day = $("#working_day").val();
        var salary = $("#salary").val();
        var description = $("#description").val();
        var comments = $("#comments").val();
        var message = $("#message").val();
        var lms_course_id = $("#lms_course_id").val();
        var idinotification = $("#idinotification").val();
        var file_data = $('#sortpicture').prop('files')[0];
        var form_data = new FormData();
        form_data.append('idinotification', idinotification);
        form_data.append('lms_course_id', lms_course_id);
        form_data.append('working_day', working_day);
        form_data.append('salary', salary);
        form_data.append('rvoe', rvoe);
        form_data.append('action', 'addCarrera');
        form_data.append('idicampus', idicampus);
        form_data.append('NivelId', NivelId);
        form_data.append('nombre', nombre);
        form_data.append('available', available);
        form_data.append('deadline', deadline);
        form_data.append('file', file_data);
        form_data.append('description', description);
        form_data.append('comments', comments);
        form_data.append('message', message);
        form_data.append('query_action', 'insert');

        $.ajax({
            url: 'dataConect/API.php', // point to server-side PHP script 
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (text) {
                if (text == "success") {
                    swalert("Exito!", 'La vacante se agrego correctamente', 'success');
                    $("#form_carrera")[0].reset();
                    location.href = "<?php echo $breadcrumb_btnBack; ?>";
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }

    function formError() {
        $("#form_carrera").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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



