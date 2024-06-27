<?php include './headers.php'; ?>
<div class="card">
    <div class="card-body">
        <form role="form" id="formcSituacion" data-toggle="validator" class="shake" autocomplete="off">
            <div>
                <div class="d-flex">
                    <div class="p-2 mr-auto">
                        <div class="page-header-title">
                            <i class="fas fa-swatchbook bg-c-yellow"></i>
                            <div class="d-inline">
                                <h4>Editar Situación</h4>
                                <span><a href="core_cSituacion_getcSituacion.php"><p class="pe-7s-back-2"></p> Regresar</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card card-border-success">
                    <div class="card-body">
                        <h5>Datos de la Situación </h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Descripcion">Descripción</label>
                                    <input type="hidden" class="form-control" id="SituacionId" name="SituacionId" placeholder="Enter SituacionId" required>
                                    <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Enter Descripcion" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Estatus">Estatus</label>
                                    <select class="form-control" id="Estatus" name="Estatus" placeholder="" required>
                                        <option value="" id="opt">Seleccione una opción</option>
                                        <option value="true" id="act">Activo</option>
                                        <option value="false" id="ina">Inactivo</option>
                                    </select>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Actualizar datos</button>
            <div id="msgSubmit" class="h3 text-center hidden"></div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
<?php include './footer.php'; ?>
<script>
    var SituacionId = "<?php echo $_GET["SituacionId"] ?>";

    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getSituacionbyId&SituacionId=" + SituacionId,
            success: function (text) {
                //console.log(text);
                var cSituacion = text.data[0];
                $("#SituacionId").val(cSituacion.SituacionId);
                $("#Descripcion").val(cSituacion.Descripcion);
                if (cSituacion.Estatus == 1) {
                    $("#Estatus").val('true').change();
                } else {
                    $("#Estatus").val('false').change();
                }
            }
        });
    });

</script>

<script>
    $("#formcSituacion").validator().on("submit", function (event) {
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
        var txt;
        var r = confirm("Esta seguro de aplicar este cambio?");
        if (r) {
            // Initiate Variables With Form Content
            var dataString = $('#formcSituacion').serialize();
            //alert('data ' + dataString);

            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=updatecSituacion&" + dataString,
                success: function (text) {
                    if (text == "success") {
                        formSuccess();
                        swalert("Exito!", 'Situacion actualizado correctamente', 'success');
                    } else {
                        formError();
                        swalert("Mensaje!", text, 'info');
                        //submitMSG(false,text);
                    }
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }

    function formSuccess() {
        location.href = "core_cSituacion_getcSituacion.php";
        $("#formcSituacion")[0].reset();
        //submitMSG(true, "Servicio Agregado Correctamente!")
    }

    function formError() {
        $("#formcSituacion").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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