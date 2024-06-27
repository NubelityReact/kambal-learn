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
        <div class="card card-border-warning">
            <div class="card-body">
                <!--form script for table tbMaterias--> 
                <form role="form" id="form_tbMaterias" data-toggle="validator" class="shake" autocomplete="off">
                    <input type="hidden" id="query_action" name="query_action" value="update" required>
                    <input type="hidden" maxlength="100" class="form-control" id="MateriaId" name="MateriaId" >
                    <input type="hidden" maxlength="100" class="form-control" id="idicarrera" name="idicarrera" >
                    <input type="hidden" maxlength="100" class="form-control" id="GradosId" name="GradosId" >
                    <div class="row">                 
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="Clave">Campus</label>
                                <input readonly="true" type="text" maxlength="100" class="form-control" id="campus" name="campus" placeholder="Ingrese Clave" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="Clave">Nivel</label>
                                <input readonly="true" type="text" maxlength="100" class="form-control" id="nivel" name="nivel" placeholder="Ingrese Clave" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="Clave">Oferta</label>
                                <input readonly="true" type="text" maxlength="100" class="form-control" id="carrera" name="carrera" placeholder="Ingrese Clave" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="Clave">Clave</label>
                                <input type="text" maxlength="100" class="form-control" id="Clave" name="Clave" placeholder="Ingrese Clave" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="Nombre">Asignatura</label>
                                <input type="text" maxlength="100" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese Nombre" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="Creditos">Creditos</label>
                                <input type="number" min="0" class="form-control" id="Creditos" name="Creditos" placeholder="Ingrese Creditos" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="Unidades">Unidades</label>
                                <input type="number" min="0" class="form-control" id="Unidades" name="Unidades" placeholder="Ingrese Unidades" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="HorasSemana">Horas por semana</label>
                                <input type="number" min="0" class="form-control" id="HorasSemana" name="HorasSemana" placeholder="Ingrese HorasSemana" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>                       
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Guardar datos</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>
                <hr>
                <div id="Grados_NivelId"></div>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>
<script type="text/javascript" src="asset/js/validator.min.js"></script>
<script>
    $(document).ready(function () {
        gettbMaterias_MateriaId();
    });

    function gettbMaterias_MateriaId() {
        var MateriaId = "<?php print_r($_GET['MateriaId']); ?>";
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=gettbMaterias_MateriaId&MateriaId=" + MateriaId,
            success: function (text) {
                var date = text.data[0];
                $('#MateriaId').val(date.MateriaId);
                $('#idicarrera').val(date.idicarrera);
                $('#GradosId').val(date.GradosId);
                $('#Clave').val(date.Clave);
                $('#Nombre').val(date.Nombre);
                $('#Creditos').val(date.Creditos);
                $('#Unidades').val(date.Unidades);
                $('#HorasSemana').val(date.HorasSemana);
                $('#nivel').val(date.nivel);
                $('#campus').val(date.campus);
                $('#carrera').val(date.carrera);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                swalert('Alerta', '0 resultados', 'danger')
            }
        });
    }
</script>
<script>
    $("#form_tbMaterias").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Llene los campos requeridos");
        } else {
            // everything looks good!
            event.preventDefault();
            submitForm();
        }
    });
    function submitForm() {
        // Initiate Variables With Form Content
        var dataString = $('#form_tbMaterias').serialize();
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=add_tbMaterias&" + dataString,
            success: function (text) {
                if (text == "success") {
                    //formSuccess();
                    swalert("Exito!", 'Datos almacenados correctamente', 'success');
                    getMaterias();
                } else {
                    formError();
                    swalert("Mensaje!", text, 'info');
                }
            }
        });
    }
    function formSuccess() {
        location.href = "core_cGrados_getcGrados.php";
        $("#form_tbMaterias")[0].reset();
        //submitMSG(true, "Servicio Agregado Correctamente!")
    }
    function formError() {
        $("#form_tbMaterias").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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
    function delete_(GradosId) {
        var r = confirm("Desea Eliminar esta registro?");
        if (r) {
            swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deletecGrados&GradosId=" + GradosId,
                success: function (text) {
                    if (text == "success") {
                        swalert('Mensaje!', 'El registro se eliminó correctamente', 'success');
                        getcGrados_NivelId();
                    } else {
                        swalert('Mensaje!', text, 'info');
                    }
                }
            });
        }
    }

    function suspended_(GradosId, suspended) {
        swalert('Mensaje!', 'Procesando...', 'info');
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=suspendedcGrados&GradosId=" + GradosId + '&suspended=' + suspended,
            success: function (text) {
                if (text == "success") {
                    getcGrados_NivelId();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }

</script>