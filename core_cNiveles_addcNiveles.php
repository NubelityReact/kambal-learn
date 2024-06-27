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
            <form role="form" id="formcNiveles" data-toggle="validator" class="shake" autocomplete="off">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Descripcion">Descripcion</label>
                                <input type="hidden"  id="query_action" name="query_action" value="insert" required>
                                <input type="text" maxlength="50" class="form-control" id="Descripcion" name="Descripcion" placeholder="Ingrese Descripcion" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Abreviatura">Abreviatura</label>
                                <input type="text" maxlength="2" class="form-control" id="Abreviatura" name="Abreviatura" placeholder="Ingrese Abreviatura" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Guardar datos</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>

                </div>
            </form>

        </div>
    </div>
    <?php include './footer.php'; ?>
    <script type="text/javascript" src="asset/js/validator.min.js"></script>
    <script>
        $("#formcNiveles").validator().on("submit", function (event) {
            if (event.isDefaultPrevented()) {
                // handle the invalid form...
                formError();
                submitMSG(false, "Los campos son requeridos");
            } else {
                // everything looks good!
                event.preventDefault();
                submitForm();
            }
        });


        function submitForm() {
            // Initiate Variables With Form Content
            var dataString = $('#formcNiveles').serialize();
            //alert('data ' + dataString);

            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=addcNiveles&" + dataString,
                success: function (text) {
                    if (text == "success") {
                        formSuccess();
                        swalert("Exito!", 'Nivel se agrego correctamente', 'success');

                    } else {
                        formError();
                        swalert("Mensaje!", text, 'info');
                        //submitMSG(false,text);
                    }
                }
            });
        }

        function formSuccess() {
            location.href = "core_cNiveles_getNiveles.php";
            $("#formcNiveles")[0].reset();
            //submitMSG(true, "Servicio Agregado Correctamente!")
        }

        function formError() {
            $("#formcNiveles").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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