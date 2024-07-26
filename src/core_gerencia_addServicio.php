<?php include './headers.php'; ?>

<div class="card">
    <div class="card-body">
        <form role="form" id="formServicio" data-toggle="validator" class="shake" autocomplete="off">
            <div>
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
                <div class="card card-border-success">
                    <div class="card-body">
                        <h5>Datos del servicio</h5>
                        <!--form script for table servicios--> 
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="query_action" name="query_action" value="insert" placeholder="Ingrese descripcion" required>
                                    <label for="categoria">Categoria</label>
                                    <select class="form-control" id="categoria" name="categoria" placeholder="Ingrese categoria" required>
                                        <option value="ninguno">ninguno</option>
                                        <option value="colegiatura">colegiatura</option>
                                        <option value="miselaneo">miselaneo</option>
                                    </select>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" maxlength="128" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese descripcion" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="number"  class="form-control" id="precio" name="precio" placeholder="Ingrese precio" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="apply_discount">Aplica descuento</label>
                                    <select  class="form-control" id="apply_discount" name="apply_discount" placeholder="Ingrese apply_discount" required>
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="es_facturable">Es Facturable</label>
                                    <select type="select"  class="form-control" id="es_facturable" name="es_facturable" placeholder="Ingrese es_facturable" required>
                                        <option value="0">No</option>
                                        <option value="1">Si</option>     
                                    </select>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Guardar datos</button>
                <div id="msgSubmit" class="h3 text-center hidden"></div>
                <div class="clearfix"></div>
        </form>
    </div>
</div>
<?php include './footer.php'; ?>
<script type="text/javascript" src="asset/js/validator.min.js"></script>
<script>
    $("#formServicio").validator().on("submit", function (event) {
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
        // Initiate Variables With Form Content
        var dataString = $('#formServicio').serialize();
        //alert('data ' + dataString);

        $.ajax({
            type: "POST",
            url: "dataConect/pagos.php",
            data: "action=addServicio&" + dataString,
            success: function (text) {
                if (text == "success") {
                    formSuccess();
                    swalert("Exito!", 'Servicio Agregado correctamente', 'success');
                } else {
                    formError();
                    swalert("Mensaje!", text, 'info');
                    //submitMSG(false,text);
                }
            }
        });
    }

    function formSuccess() {
        location.href = "core_gerencia_getServicios.php";
        $("#formServicio")[0].reset();
        //submitMSG(true, "Servicio Agregado Correctamente!")
    }

    function formError() {
        $("#formServicio").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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
