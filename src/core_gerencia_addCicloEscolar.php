<?php include './headers.php'; ?>
<div class="card">
    <div class="card-body">
        <form role="form" id="formCiclo" data-toggle="validator" class="shake" autocomplete="off">
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
                        <h5>Datos del Ciclo</h5>
                        <div class="row">
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label for="fecha">Año</label>
                                    <input type="text" class="form-control" value="<?php echo date('Y') ?>" id="year" onchange="setAbrev()">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="Periodo">Periodo</label>
                                    <select type="text" class="form-control" id="Periodo" name="Periodo" placeholder="Enter Periodo"  onchange="setAbrev()">
                                        <option value="">Seleccione</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="nivel">Turno</label>
                                    <div id="divturno" onchange="setAbrev()"></div>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <!--                            <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label for="numero">Grupo</label>
                                                                <input type="number" class="form-control" id="numero" value="1" min="1" onchange="setAbrev()">
                                                                <div class="help-block with-errors text-danger"></div>
                                                            </div>
                                                        </div>-->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="abrev"> Ciclo </label>
                                    <input type="text" class="form-control" id="ciclo" name="ciclo" placeholder="Enter  ciclo" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="abrev"> Abreviatura</label>
                                    <input type="text" class="form-control" id="abrev" name="abrev" placeholder="Enter abrev" required readonly="true">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="inicio">Inicio del ciclo escolar</label>
                                    <input type="date" class="form-control" id="inicio" name="inicio" placeholder="Enter inicio" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="inicio">Término del ciclo escolar</label>
                                    <input type="date" class="form-control" id="termino" name="termino" placeholder="Enter termino" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group" data-toggle="tooltip" data-placement="top" title="Descpues de esta fecha se cobrarán recargos al estudiante por inscripcion extemporánea!">
                                    <label for="termino" title="Descpues de esta fecha se cobrarán recargos al estudiante por inscripcion extemporánea">Fecha límite para inscripciones</label>
                                    <input type="date" class="form-control" id="limite_inscipcion" name="limite_inscipcion" placeholder="Enter limite_inscipcion" required>
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
<script type="text/javascript" src="asset/js/validator.min.js"></script>
<script>
                                        var ano = (new Date).getFullYear();
                                        $(document).ready(function () {
                                            var year = $("#year").val();
                                        });
</script>
<script>
    $(document).ready(function () {
        getturno();
    });

    function getturno() {
        $("#divturno").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acciÃ³n puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getTurno",
            success: function (text) {
                //console.log(text);
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="turnoId" name="turnoId">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].Descripcion + '">' + date[x].Descripcion + '</option>';
                }
                txt += "</select>";
                $("#divturno").html(txt);
            }
        });
    }
</script>
<script>
    function setAbrev() {
        //2019-2
        var numero = $("#numero").val();
        var Periodo = $("#Periodo").val();
        var turnoId = $("#turnoId").val();
        var year = $("#year").val();
        var str1 = turnoId.substr(0, 1);
        var abrev1 = str1.replace("-", "");
        $('#abrev').val(year + '-' + Periodo);
        $('#ciclo').val(year + '-' + Periodo + '' + turnoId.substr(0, 1));
    }
</script>
<script>
    $("#formCiclo").validator().on("submit", function (event) {
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
        var dataString = $('#formCiclo').serialize();
        //alert('data ' + dataString);
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=addCiclo&" + dataString,
            success: function (text) {
                if (text == "success") {
                    formSuccess();
                    swalert("Exito!", 'Ciclo Escolar Agregado correctamente', 'success');
                } else {
                    formError();
                    swalert("Mensaje!", text, 'info');
                    //submitMSG(false,text);
                }
            }
        });
    }

    function formSuccess() {
        location.href = "core_gerencia_getClicloEscolar.php";
        $("#formCiclo")[0].reset();
        //submitMSG(true, "Servicio Agregado Correctamente!")
    }

    function formError() {
        $("#formCiclo").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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