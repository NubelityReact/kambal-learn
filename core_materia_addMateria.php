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
                <form role="form" id="formTablaMaterias" data-toggle="validator" class="shake" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="nivel">Seleccione el Nivel</label>
                                <div id="divNivel"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="nivel">Seleccione la Carrera</label>
                                <div id="divCarrera"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="nivel">Seleccione el Grado</label>
                                <div id="divGrado"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="Clave">Clave</label>
                                <input type="text" class="form-control" id="Clave" name="Clave" placeholder="Enter Clave" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="DescripcionPlan">Descripcion</label>
                                <input type="text" class="form-control" id="DescripcionPlan" name="DescripcionPlan" placeholder="Enter DescripcionPlan" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>        
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="Nombre">Nombre</label>
                                <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Enter Nombre" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>        
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="Creditos">Creditos</label>
                                <input type="number" min="1" max="100" class="form-control" id="Creditos" name="Creditos" placeholder="Enter Creditos" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>        
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="HorasSemana">Horas/semanas</label>
                                <input type="text" class="form-control" id="HorasSemana" name="HorasSemana" placeholder="Enter HorasSemana" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>        
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Guardar datos</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>
<script type="text/javascript" src="asset/js/validator.min.js"></script>
<script>
    $(document).ready(function () {
        getNivel();
    });

    function getNivel() {
        $("#divNivel").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acciÃ³n puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getNivel",
            success: function (text) {
                //console.log(text);
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="NivelId" name="NivelId" required onchange="getcCarrerasbyID2()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].NivelId + '">' + date[x].Descripcion + '</option>';
                }
                txt += "</select>";
                $("#divNivel").html(txt);
            }
        });
    }
    function getcCarrerasbyID2() {
        var NivelId = $("#NivelId").val();
        var CarreraId = $("#CarreraId").val();
        var GradoId = $("#GradosId").val();
        $("#divCarrera").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acciÃ³n puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcCarrerasbyID2&NivelId=" + NivelId,
            success: function (text) {
                //console.log(text);
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="CarreraId" name="CarreraId" required onchange="getcGradobyIDcarreraID()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idicarrera + '">' + date[x].nombre + '</option>';
                }
                txt += "</select>";
                $("#divCarrera").html(txt);
            }
        });
    }
    function getcGradobyIDcarreraID() {
        var idicarrera = $('#CarreraId').val();
        $("#divGrado").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acciÃ³n puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcGradobyIDcarreraID&idicarrera=" + idicarrera,
            success: function (text) {
                //console.log(text);
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="GradosId" name="GradosId" required >';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].GradosId + '">' + date[x].Descripcion + '</option>';
                }
                txt += "</select>";
                $("#divGrado").html(txt);
            }
        });
    }



</script>
<script>
    $("#formTablaMaterias").validator().on("submit", function (event) {
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
        var dataString = $('#formTablaMaterias').serialize();
        //alert('data ' + dataString);

        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=addTablaMateria&" + dataString,
            success: function (text) {
                if (text == "success") {
                    formSuccess();
                    swalert("Exito!", 'La materia se agrego correctamente', 'success');

                } else {
                    formError();
                    swalert("Mensaje!", text, 'info');
                    //submitMSG(false,text);
                }
            }
        });
    }

    function formSuccess() {
        //location.href = "core_materia_getMaterias.php";
        $('#Clave').val('');
        $('#DescripcionPlan').val('');
        $('#Nombre').val('');
        $('#Creditos').val('');
        $('#HorasSemana').val('');
        //$("#formTablaMaterias")[0].reset();
        //submitMSG(true, "Servicio Agregado Correctamente!")
    }

    function formError() {
        $("#formTablaMaterias").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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