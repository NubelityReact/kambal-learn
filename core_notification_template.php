<?php include './headers.php'; ?>
<div class="card card-border-danger">   
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

        <!--form script for table notifications--> 
        <form role="form" id="form_notifications" data-toggle="validator" class="shake" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-12">
                    <h4>Plantilla de notificación</h4>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" maxlength="100" class="form-control" id="name" name="name" placeholder="Ingrese el Nombre" required>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <input type="text"  class="form-control" id="description" name="description" placeholder="Opcional">
                        <div class="help-block with-errors text-danger"></div>
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
                        <input type="email" maxlength="100" class="form-control" id="sender_email" name="sender_email" value="<?php echo "$globaEmail"; ?>" placeholder="Ingrese correo del remitente" required>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="sender_name">Nombre de remitente</label>
                        <input type="text" maxlength="100" class="form-control" id="sender_name" name="sender_name" value="<?php echo "$fullname"; ?>" placeholder="Ingrese Nombre de remitente" required>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="files" data-toggle="collapse" data-target="#colapse_file">Archivo adjunto opcional <i class="text-info">De clic para seleccionar</i></label>
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
<?php include './footer.php'; ?>
<script src="asset/js/ckeditor.js"></script>
<script>
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
        form_data.append('message', message);
        form_data.append('sender_email', sender_email);
        form_data.append('sender_name', sender_name);
        form_data.append('query_action', 'insert');

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
                    formSuccess();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }

    function formSuccess() {
        $("#form_notifications")[0].reset();
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

</script>
