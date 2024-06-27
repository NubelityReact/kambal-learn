<?php include './headers.php'; ?>
<script>
    var idiuser = "<?php echo $_GET['idiuser']; ?>";
</script>
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
                        <h5>Datos del usuario</h5>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="Nombre">Nombre</label>
                                    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Enter Nombre" required>
                                    <input type="hidden" class="form-control" id="idiuser" name="idiuser" required>
                                    <input type="hidden" class="form-control" id="idigenerales" name="idigenerales"required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="apellido_paterno">Apellido paterno</label>
                                    <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Enter apellido_paterno" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="apellido_materno">Apellido materno</label>
                                    <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Enter apellido_materno" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="Rol">Estatus</label>
                                    <select class="form-control" id="estatus" name="estatus" placeholder="Ingrese  descuento" required>
                                        <option value="">Seleccione</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Suspendido">Suspendido</option>
                                    </select>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="Rol">Rol</label>
                                    <div id="seleRol"></div>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="user">Asignar Plantel</label>
                                    <select  class="form-control"> 
                                        <option>Plantel 1</option>
                                        <option>Todos los planteles</option>
                                    </select>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="user">Nombre de usuario</label>
                                    <input type="text" class="form-control" id="user" name="user" placeholder="Enter user" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" id="psd" name="psd" placeholder="Enter password" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
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
<script>
    $(document).ready(function () {
        getRole();
    });


    function getRole() {
        $("#seleRol").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getRole",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control" id="idirole" name="idirole" required>';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idirole + '">' + date[x].role + '</option>';
                }
                txt += "</select>";
                $("#seleRol").html(txt);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#seleRol").html('0 resultados ');
            }
        });
    }
</script>
<script>
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getUserSAEMByID&idiuser=" + idiuser,
            success: function (text) {
                //console.log(text);
                var servicio = text.data[0];
                $("#Nombre").val(servicio.nombre);
                $("#apellido_paterno").val(servicio.apellido_paterno);
                $("#apellido_materno").val(servicio.apellido_materno);
                $("#email").val(servicio.email);
                $("#user").val(servicio.user);
                $("#psd").val(servicio.password);
                $("#idiuser").val(servicio.idiuser);
                $("#idigenerales").val(servicio.idigenerales);
                $("#estatus").val(servicio.estatus);
                $("#idirole").val(servicio.idirole);

            }
        });
    });

</script>

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
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=updateUSerSAEM&" + dataString,
            success: function (text) {
                if (text == "success") {
                    formSuccess();
                    swalert("Exito!", 'Usuario actualizado correctamente', 'success');
                } else {
                    formError();
                    swalert("Mensaje!", text, 'info');
                    //submitMSG(false,text);
                }
            }
        });
    }

    function formSuccess() {
        location.href = "core_gerencia_user_get.php";
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
