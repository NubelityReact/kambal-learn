<?php include './headers.php'; ?>
<div class="card">
    <div class="card-body">
        <form role="form" id="formBeca" data-toggle="validator" class="shake" autocomplete="off">
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="apellidos">Nombre</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required maxlength="140" readonly="true">
                                            <input type="hidden" class="form-control" id="idialumno" name="idialumno" placeholder="Enter idialumno" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#alumno" id="abreAspirantes">Buscar <i class="pe-7s-search"></i></button> 
                                            </div>
                                        </div>
                                    </div>                                            
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="apellido_paterno">Apellido paterno</label>
                                            <input type="text" readonly="true" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Ingrese apellido paterno" required maxlength="140">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="apellido_materno">Apellido materno</label>
                                            <input type="text" readonly="true" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Ingrese apellido materno" maxlength="140">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="matricula">Matrícula</label>
                                            <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Enter matricula" readonly="true">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="carrera">Carrera</label>
                                            <input type="text" class="form-control" id="carrera" name="carrera" placeholder="Enter carrera"  readonly="true">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cuatrimestre">Cuatrimestre actual</label>
                                            <input type="text" class="form-control" id="cuatrimestre" name="cuatrimestre" placeholder="Enter cuatrimestre"  readonly="true">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <label>Puede otorgar una beca parcial a la colegiatura del estudiante seleccionado, misma que se verá reflejada en el costo de las parcialidades futuras del estudiante</label>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="descuento">Porcentaje de la Beca</label>
                                        <select class="form-control" id="beca_colegiatura" name="beca_colegiatura" placeholder="Ingrese  descuento" required>
                                            <option value="">Seleccione</option>
                                            <option value="0">%0</option>
                                            <option value="5">%5</option>
                                            <option value="10">%10</option>
                                            <option value="15">%15</option>
                                            <option value="20">%20</option>
                                            <option value="25">%25</option>
                                            <option value="30">%30</option>
                                            <option value="35">%35</option>
                                            <option value="40">%40</option>
                                            <option value="45">%45</option>
                                            <option value="50">%50</option>
                                            <option value="55">%55</option>
                                            <option value="60">%60</option>
                                            <option value="65">%65</option>
                                            <option value="70">%70</option>
                                            <option value="75">%75</option>
                                            <option value="80">%80</option>
                                            <option value="85">%85</option>
                                            <option value="90">%90</option>
                                            <option value="95">%95</option>
                                            <option value="100">%100</option>
                                        </select>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div id="spinner-form"></div>
            <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right "><span class="pe pe-7s-diskette"></span> Guardar datos</button>
            <div id="msgSubmit" class="h3 text-center hidden"></div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
</div>

<!-- The Modal -->
<div class="modal fade" id="alumno">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Seleccione un alumno de la lista</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <!--                <div id="TablaAlumnos"></div>-->
                <div class="table-responsive">
                    <table id="sumab" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">
                        <thead class="table-primary text-light"> <tr><th>#</th><th>Matrícula</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Carrera</th><th>Turno</th><th>Cuatrimestre</th><th>Beca</th><th>Categoría</th> </tr> </thead>
                        <tbody></tbody>
                    </table> 
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>



<?php include './footer.php'; ?>
<!--<script src="asset/js/reinscription_getAlumnos.js"></script>-->

<script>
    $("#formBeca").validator().on("submit", function (event) {
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
        var r = confirm("Esta seguro de aplicar la beca al estudiante");
        if (r) {
            // Initiate Variables With Form Content
            var dataString = $('#formBeca').serialize();
            //alert('data ' + dataString);
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                //data: "name=" + name + "&email=" + email + "&message=" + message,
                data: "action=beca&" + dataString,
                success: function (text) {
                    if (text == "success") {
                        formSuccess();
                        swalert("Mensaje!", 'Beca aplicada correctamente', 'success');
                    } else {
                        swalert("Mensaje!", text, 'info');
                        formError();
                        submitMSG(false, text);
                    }
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }

    function formSuccess() {
        $("#formBeca")[0].reset();
        //location.href = "getAlumnos.php";
    }

    function formError() {
        $("#formBeca").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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
    $(document).ready(function () {
        //consultaAlumnos(); //consulta Alumnos
        sumarb();
        $('#abreAspirantes').click();//simular clic para abrir modal aspirantes
        $("search:first").focus();
    });

    var sumarb = function () {
        var spin = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';

        var table = $("#sumab").DataTable({
            "destroy": true,
            "responsive": true,
            "deferRender": true,
            //"responsive": true,
            "ajax": {
                "url": "dataConect/API.php?action=getcardAlumno",
                "type": "GET"
            },
            "columns": [
                //{"data": "btnEditar"},
                //{"data": "btnCredencial"},
                {"data": "idialumno"},
                {"data": "matricula"},
                {"data": "nomalu"},
                {"data": "apellido_paterno"},
                {"data": "apellido_materno"},
                {"data": "carrera"},
                {"data": "turno"},
                {"data": "cuatrimestre"},
                {"data": "beca_colegiatura"},
                {"data": "categoria"},
            ],
            //"dom": 't',
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": spin,
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });

        $('#sumab tbody').on('click', 'tr', function () {
            var datos = table.row(this).data();
            var cuatrimestre = parseInt(datos.cuatrimestre);
            var promovido = cuatrimestre + 1;
            //alert(datos.idialumno);
            $("#idialumno").val(datos.idialumno);
            $("#nombre").val(datos.nomalu);
            $("#apellido_paterno").val(datos.apellido_paterno);
            $("#apellido_materno").val(datos.apellido_materno);
            $("#carrera").val(datos.carrera);
            $("#matricula").val(datos.matricula);
            $("#turno").val(datos.turno);
            $("#cuatrimestre").val(cuatrimestre);
            $("#beca_colegiatura").val(datos.beca_colegiatura);
            $("#categoria").val(datos.categoria);
            $("#promovido").val(promovido);
            $("#promovido").attr({
                "max": promovido, // substitute your own
                "min": cuatrimestre          // values (or variables) here
            });
            $("#alumno .close").click();
            validAdeudos();
        });

    }

    function consultaAlumnos2() {
        $("#TablaAlumnos").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcardAlumno",
            success: function (text) {
                console.log(text.data);
                var date = text.data;
                var txt = "";
                console.log(date);
                txt += '<div class="table-responsive"> <table id="solpx5" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"><tr><th>Código</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Carrera</th><th>Matricula</th><th>Turno</th><th>Cuatrimestre</th><th>% Beca</th><th>Categoria</th></tr> </thead>';
                for (x in date) {
                    txt += "<tr><td>" + date[x].idialumno + "</td>";
                    txt += "<td>" + date[x].nombre + "</td>";
                    txt += "<td>" + date[x].apellido_paterno + "</td>";
                    txt += "<td>" + date[x].apellido_materno + "</td>";
                    txt += "<td>" + date[x].carrera + "</td>";
                    txt += "<td>" + date[x].matricula + "</td>";
                    txt += "<td>" + date[x].turno + "</td>";
                    txt += "<td>" + date[x].cuatrimestre + "</td>";
                    txt += "<td>" + date[x].beca_colegiatura + "</td>";
                    txt += "<td>" + date[x].categoria + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("TablaAlumnos").innerHTML = txt;
                var table = $('#solpx5').DataTable({responsive: true});

                $('#solpx5 tbody').on('click', 'tr', function () {
                    var datos = table.row(this).data();
                    var cuatrimestre = parseInt(datos[7]);
                    var promovido = cuatrimestre + 1;
                    //alert(datos[0]);
                    $("#idialumno").val(datos[0]);
                    $("#nombre").val(datos[1]);
                    $("#apellido_paterno").val(datos[2]);
                    $("#apellido_materno").val(datos[3]);
                    $("#carrera").val(datos[4]);
                    $("#matricula").val(datos[5]);
                    $("#turno").val(datos[6]);
                    $("#cuatrimestre").val(cuatrimestre);
                    $("#beca_colegiatura").val(datos[8]);
                    $("#categoria").val(datos[9]);
                    $("#promovido").val(promovido);
                    $("#promovido").attr({
                        "max": promovido, // substitute your own
                        "min": cuatrimestre          // values (or variables) here
                    });
                    $("#alumno .close").click()
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                //alert("No fue posible conectar con el servidor");
                document.getElementById("TablaAlumnos").innerHTML = "0 alumnos inscritos";
            }
        });
    }
</script>
