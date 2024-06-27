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
                <form role="form" id="formcGrados" data-toggle="validator" class="shake" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nivel">Seleccione el nivel de estudios</label>
                                <div id="divNivel"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="Descripcion">Grado</label>
                                <input type="hidden" class="form-control" id="query_action" name="query_action" value="insert" required>
                                <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Enter Descripcion" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="Abreviatura">Abreviatura</label>
                                <input type="text" class="form-control" id="Abreviatura" name="Abreviatura" placeholder="Enter Abreviatura" required>
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
        getNivel();
    });
    function getNivel() {
        $("#divNivel").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acciÃ³n puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getNivel",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="NivelId" name="NivelId" required onchange="getcGrados_NivelId()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].NivelId + '">' + date[x].Descripcion + '</option>';
                }
                txt += "</select>";
                $("#divNivel").html(txt);
            }
        });
    }
    function getcGrados_NivelId() {
        var NivelId = $('#NivelId').val();
        $("#Grados_NivelId").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acciÃ³n puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcGrados_NivelIdSuspended&NivelId=" + NivelId,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tableCampus" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"><tr><th>#</th><th>Acción</th> <th>Grado</th> <th>Abreviatura</th> </tr></thead>';
                for (x in date) {
                    var a = parseInt(x);
                    var estatus = date[x].suspended;
                    var GradosId = date[x].GradosId;
                    var suspended = date[x].suspended;
                    var btn_update = '<a href= "core_cGrados_updateGrados.php?GradosId=' + GradosId + '" type="button" class="btn btn-sm">Editar <i class="fa fa-pen-square"></i></a>';
                    var btn_delete = '<button type="button" class="btn btn-danger btn-sm" onclick="delete_(' + GradosId + ')">Eliminar <i class="fa fa-trash"></i></button>';
                    var btn_suspended = '<button type="button" class="btn btn-warning btn-sm" onclick="suspended_(' + GradosId + ',1)">Suspender <i class="fa fa-ban"></i></button>';
                    var btn_actived = '<button type="button" class="btn btn-success btn-sm" onclick="suspended_(' + GradosId + ',0)">Activar <i class="fa fa-check-circle"></i></button>';
                    if (suspended == 0) {
                        var suspended_ = '<td class="table-success">Activo</td>';
                    } else {
                        var suspended_ = '<td class="table-danger">Inactivo</td>';
                    }
                    txt += '<tr>';
                    txt += "<td>" + (a + 1) + "</td>";
                    txt += '<td>';
                    txt += '<div class="btn-group" id="btns_actions">';
                    if (suspended == 0) {
                        txt += btn_update;
                        txt += btn_suspended;
                        txt += btn_delete;
                    } else {
                        txt += btn_actived;
                        txt += btn_delete;
                    }
                    txt += '</div>';
                    txt += '</td>';
                    txt += "<td>" + date[x].Descripcion + "</td>";
                    txt += "<td>" + date[x].Abreviatura + "</td>";
                    txt += estatus;
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                $("#Grados_NivelId").html(txt);
                var table = $('#tableCampus').DataTable();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#Grados_NivelId").html('0 registros');
            }
        });
    }
</script>
<script>
    $("#formcGrados").validator().on("submit", function (event) {
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
        var dataString = $('#formcGrados').serialize();
        //alert('data ' + dataString);
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=addcGrados&" + dataString,
            success: function (text) {
                if (text == "success") {
                    //formSuccess();
                    swalert("Exito!", 'El grado se agrego correctamente', 'success');
                    getcGrados_NivelId();
                } else {
                    formError();
                    swalert("Mensaje!", text, 'info');
                    //submitMSG(false,text);
                }
            }
        });
    }
    function formSuccess() {
        location.href = "core_cGrados_getcGrados.php";
        $("#formcGrados")[0].reset();
        //submitMSG(true, "Servicio Agregado Correctamente!")
    }
    function formError() {
        $("#formcGrados").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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