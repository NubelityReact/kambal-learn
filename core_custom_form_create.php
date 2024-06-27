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
                <!--form script for table cDocumentos--> 
                <form role="form" id="form_tbCustomForm" data-toggle="validator" class="shake" autocomplete="off">
                    <input type="hidden" id="query_action" name="query_action" value="insert">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form_title">Titulo del Formulario</label>
                                <input type="text" maxlength="255" class="form-control" id="form_title" name="form_title" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form_description">Instrucciones</label>
                                <input type="text" maxlength="255" class="form-control" id="form_description" name="form_description" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Guardar</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>
                <!--form script for table tbCustomForm--> 
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>
<script>
    $("#form_tbCustomForm").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Llene los campos requeridos");
        } else {
            // everything looks good!
            event.preventDefault();
            add_tbCustomForm();
        }
    });

    function add_tbCustomForm() {
        var dataString = $('#form_tbCustomForm').serialize();
        $.ajax({
            type: "POST",
            url: 'dataConect/API.php', // point to server-side PHP script 
            data: 'action=add_tbCustomForm&' + dataString,
            success: function (text) {
                if (isNaN(text)) {
                    swalert('Mensaje!', text, 'info');
                } else {
                    location.href = "core_custom_form_inputs_create.php?idicustomform=" + text;
                    swalert("Exito!", 'Se agrego correctamente', 'success');
                    $("#form_tbCustomFormInputs")[0].reset();
                }
            }
        });
    }

    function formError() {
        $("#form_tbCustomForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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



