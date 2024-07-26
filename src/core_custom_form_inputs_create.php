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
                <form role="form" id="form_tbCustomFormInputs" data-toggle="validator" class="shake" autocomplete="off">
                    <input type="hidden" id="query_action" name="query_action" value="insert">
                    <input type="hidden" maxlength="255" class="form-control" id="idicustomform" name="idicustomform" required>
                    <input type="hidden" maxlength="255" class="form-control" id="input_label" name="input_label" required>
                    <input type="hidden" maxlength="255" class="form-control" id="input_id" name="input_id" placeholder="Ingrese input_id">
                    <input type="hidden" maxlength="255" class="form-control" id="input_name" name="input_name" placeholder="Ingrese input_name">

                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="cfos" id="form_title"></h4>
                            <hr>
                        </div>
                        <div class="col-sm-12">
                            <h4 class="cfos">Supported Form Controls</h4>
                            <hr>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="input_label">Input Title</label>
                                <input type="text" maxlength="255" class="form-control" id="input_title" name="input_title" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="input_type">Input Type</label>
                                <select type="text" maxlength="255" class="form-control" id="input_type" name="input_type" required>
                                    <option value="text">Text</option>
                                    <option value="email">email</option>
                                    <option value="number">number</option>
                                    <option value="textarea">Textarea</option>
                                    <option value="password">Password</option>
                                    <option value="date">date</option>
                                    <option value="datetime-local">datetime-local</option>
                                    <option value="color">color</option>
                                    <option value="time">time</option>
                                    <option value="url">url</option>
                                    <option value="week">week</option>
                                </select>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>                       
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="input_col">Input Column</label>
                                <select type="text" maxlength="255" class="form-control" id="input_col" name="input_col" required>
                                    <option value="col-sm-2">col-sm-4</option>
                                    <option value="col-sm-4">col-sm-2</option>
                                    <option value="col-sm-6">col-sm-6</option>
                                    <option value="col-sm-8">col-sm-8</option>
                                    <option value="col-sm-12">col-sm-12</option>
                                    <option value="col-md-2">col-md-2</option>
                                    <option value="col-md-4">col-md-4</option>
                                    <option value="col-md-6">col-md-6</option>
                                    <option value="col-md-8">col-md-8</option>
                                    <option value="col-md-12">col-md-12</option>
                                    <option value="col-lg-2">col-lg-2</option>
                                    <option value="col-lg-4">col-lg-4</option>
                                    <option value="col-lg-6">col-lg-6</option>
                                    <option value="col-lg-8">col-lg-8</option>
                                    <option value="col-lg-12">col-lg-12</option>
                                    <option value="col-xl-2">col-xl-2</option>
                                    <option value="col-xl-4">col-xl-4</option>
                                    <option value="col-xl-6">col-xl-6</option>
                                    <option value="col-xl-8">col-xl-8</option>
                                    <option value="col-xl-12">col-xl-12</option>
                                </select>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="input_maxlength">Input Maxlength</label>
                                <input type="number" min="1" max="255" value="255" class="form-control" id="input_maxlength" name="input_maxlength" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="input_required">Input Required</label>
                                <select type="number"  class="form-control" id="input_required" name="input_required" required>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Guardar</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>
                <hr>
                <h4 class="cfos">Input List</h4>
                <div id="loadTableInputs"></div>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        gettbCustomFormId();
        gettbCustomFormInputsIdicustomform();
    });
    function gettbCustomFormId() {
        var idicustomform = "<?php print_r($_GET['idicustomform']); ?>";
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=gettbCustomFormId&idicustomform=" + idicustomform,
            success: function (text) {
                var date = text.data[0];
                $('#form_title').html('Formulario: ' + date.form_title);
            }
        });
    }

    function gettbCustomFormInputsIdicustomform() {
        var idicustomform = "<?php print_r($_GET['idicustomform']); ?>";
        $("#loadTableInputs").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=gettbCustomFormInputsIdicustomform&idicustomform=" + idicustomform,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tableCampus" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"><tr><th>#</th><th>Acción</th> <th>Titulo</th> <th>Tipo</th> <th>Columnas </th><th>Maxlength </th><th>Required </th> </tr></thead>';
                for (x in date) {

                    var a = parseInt(x);
                    var estatus = date[x].suspended;
                    var id = date[x].idicustomimput;
                    var suspended = date[x].suspended;
                    //var btn_update = '<a href= "core_button_payment_update.php?idibutton=' + id + '" type="button" class="btn btn-sm">Editar <i class="fa fa-pen-square"></i></a>';
                    var btn_update = '';
                    var btn_delete = '<button type="button" class="btn btn-danger btn-sm" onclick="delete_(' + id + ')">Eliminar <i class="fa fa-trash"></i></button>';
                    var btn_suspended = '<button type="button" class="btn btn-warning btn-sm" onclick="suspended_(' + id + ',1)">Suspender <i class="fa fa-ban"></i></button>';
                    var btn_actived = '<button type="button" class="btn btn-success btn-sm" onclick="suspended_(' + id + ',0)">Activar <i class="fa fa-check-circle"></i></button>';
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
                        //txt += btn_update;
                        txt += btn_actived;
                        txt += btn_delete;
                    }
                    txt += '</div>';
                    txt += '</td>';
                    txt += "<td>" + date[x].input_title + "</td>";
                    txt += "<td>" + date[x].input_type + "</td>";
                    txt += "<td>" + date[x].input_col + "</td>";
                    txt += "<td>" + date[x].input_maxlength + "</td>";
                    txt += "<td>" + date[x].input_required + "</td>";
                    txt += estatus;
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("loadTableInputs").innerHTML = txt;
                var table = $('#tableCampus').DataTable();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("loadTableInputs").innerHTML = '0 resultados';
            }
        });
    }
</script>
<script>
    //idicustomform
    $("#idicustomform").val(<?php echo $_GET['idicustomform']; ?>);
    $("#input_title").keypress(function () {
        var input_title = $("#input_title").val();
        $("#input_name").val(input_title.split(" ").join("").toLowerCase());
        $("#input_id").val(input_title.split(" ").join("").toLowerCase());
        $("#input_label").val(input_title.split(" ").join("").toLowerCase());
    });
</script>
<script>
    $("#form_tbCustomFormInputs").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Llene los campos requeridos");
        } else {
            // everything looks good!
            event.preventDefault();
            add_tbCustomFormInputs();
        }
    });

    function add_tbCustomFormInputs() {
        var dataString = $('#form_tbCustomFormInputs').serialize();
        $.ajax({
            type: "POST",
            url: 'dataConect/API.php', // point to server-side PHP script 
            data: 'action=add_tbCustomFormInputs&' + dataString,
            success: function (text) {
                if (text == "success") {
                    swalert("Exito!", 'Se agrego correctamente', 'success');
                    $("#form_tbCustomFormInputs")[0].reset();
                    gettbCustomFormInputsIdicustomform();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }

    function formError() {
        $("#form_tbCustomFormInputs").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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

    function delete_(id) {
        var txt;
        var r = confirm("Desea eliminar este elemento? ");
        if (r) {
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deletedtbCustomFormInputs&idicustomimput=" + id,
                success: function (text) {
                    if (text == "success") {
                        gettbCustomFormInputsIdicustomform();
                    } else {
                        swalert('Error!', text, 'error');
                    }
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }

    function suspended_(id, suspended) {
        //swalert('Mensaje!', 'Procesando...', 'info');
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=suspendedtbCustomFormInputs&idicustomimput=" + id + '&suspended=' + suspended,
            success: function (text) {
                if (text == "success") {
                    gettbCustomFormInputsIdicustomform();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }
</script>


