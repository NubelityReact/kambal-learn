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
        <div class="card card-border-primary">
            <div class="card-body">
                <!--form script for table tbGrupos--> 
                <form role="form" id="form_tbGrupos" data-toggle="validator" class="shake" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="idicarrera">Seleccione una oferta</label>
                                <input type="hidden"  class="form-control" id="NivelId" name="NivelId" required>
                                <input type="hidden"  class="form-control" id="query_action" name="query_action" value="insert" required>
                                <div id="divOferta">
                                    <select class="form-control fill" id="idicarrera" name="idicarrera" required>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="GradoId">Seleccione un grado</label>
                                <div id="divGrados">
                                    <select class="form-control fill" id="GradosId" name="GradosId" required>
                                        <option value="">Seleccione una oferta</option>
                                    </select>
                                </div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="idiciclo">Seleccione el ciclo</label>
                                <div id="divCiclo">
                                    <select class="form-control fill" id="idiciclo" name="idiciclo" required>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="TurnoId">Seleccione el turno</label>
                                <div id="divTurno">
                                    <select class="form-control fill" id="TurnoId" name="TurnoId" required></select>
                                    <option value="">Seleccione</option>
                                </div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>       
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="Clave">Clave</label>
                                <input type="text" maxlength="100" class="form-control" id="Clave" name="Clave" placeholder="Ingrese Clave" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="Descripcion">Descripcion</label>
                                <input type="text" maxlength="250" class="form-control" id="Descripcion" name="Descripcion" placeholder="Ingrese Descripcion" required>
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
        getOferta();
        getTurnoActive();
        getCicloActive();
    });
    function getOferta() {
        $("#divOferta").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getOferta",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="idicarrera" name="idicarrera" required>';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option class="' + date[x].NivelId + '" value="' + date[x].idicarrera + '">' + date[x].nivel + ' ' + date[x].nombre + '</option>';
                }
                txt += "</select>";
                $("#divOferta").html(txt);
                $('#idicarrera').on('change', function () {
                    var NivelId = $('select[name="idicarrera"] :selected').attr('class');
                    $('#NivelId').val(NivelId);
                    getcGrados_NivelId();
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#divOferta").html(" 0 results");
            }
        });
    }

    function getcGrados_NivelId() {
        var NivelId = $('#NivelId').val();
        $("#divGrados").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcGrados_NivelId&NivelId=" + NivelId,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="GradosId" name="GradosId" required>';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].GradosId + '">' + date[x].Descripcion + ' </option>';
                }
                txt += "</select>";
                $("#divGrados").html(txt);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#divGrados").html(" 0 results");
            }
        });
    }

    function getTurnoActive() {
        $("#divTurno").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getTurnoActive",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="TurnoId" name="TurnoId" required>';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].TurnoId + '">' + date[x].Descripcion + ' </option>';
                }
                txt += "</select>";
                $("#divTurno").html(txt);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#divTurno").html(" 0 results");
            }
        });
    }

    function getCicloActive() {
        $("#divCiclo").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCicloActive",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="idiciclo" name="idiciclo" required>';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idiciclo + '">' + date[x].ciclo + ' </option>';
                }
                txt += "</select>";
                $("#divCiclo").html(txt);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#divCiclo").html(" 0 results");
            }
        });
    }
</script>
<script>
    $("#form_tbGrupos").validator().on("submit", function (event) {
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
        swalert("Mensaje!", 'Procesando...', 'info');
        // Initiate Variables With Form Content
        var dataString = $('#form_tbGrupos').serialize();
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=addGrupoEscolar&" + dataString,
            success: function (text) {
                var success = text.data[0].success;
                var GrupoId = text.data[0].GrupoId;
                if (success == 1) {
                    swalert("Exito!", 'El grupo se guardó correctamente', 'success');
                    $("#form_tbGrupos")[0].reset();
                } else {
                    formError();
                    submitMSG(false, text);
                    swalert("Mensaje!", text, 'info');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                swalert("Mensaje!", 'Error', 'danger');
            }
        });
    }

    function formError() {
        $("#form_tbGrupos").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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
