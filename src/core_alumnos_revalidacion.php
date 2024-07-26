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
        <div class="card card-border-danger">
            <div class="card-body">
                <div class="row">
                    <form role="form" id="formRevalida" data-toggle="validator" class="shake" autocomplete="off">
                        <div class="col-sm-12">
                            <h4>Datos del Alumno</h4>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="apellidos">Nombre</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required maxlength="140" readonly="true">
                                        <input type="hidden" class="form-control" id="idialumno" name="idialumno" placeholder="Enter idialumno" required>
                                        <input type="hidden" class="form-control" id="idicarrera" name="idicarrera" placeholder="Enter idialumno" required>
                                        <input type="hidden" class="form-control" id="NivelId" name="NivelId" placeholder="Enter idialumno" required>
                                        <input type="hidden" class="form-control" id="idiarchivo" name="idiarchivo" placeholder="Enter idiarchivo" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#alumno" id="abreAspirantes">Buscar <i class="pe-7s-search"></i></button> 
                                        </div>
                                    </div>
                                </div>                                            
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="apellido_paterno">Apellido paterno</label>
                                        <input type="text" readonly="true" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Ingrese apellido paterno" required maxlength="140">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="apellido_materno">Apellido materno</label>
                                        <input type="text" readonly="true" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Ingrese apellido materno" maxlength="140">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="matricula">Matrícula</label>
                                        <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Enter matricula" readonly="true">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="categoria">Categoría</label>
                                        <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Enter categoria" required readonly="true">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="carrera">Carrera</label>
                                        <input type="text" class="form-control" id="carrera" name="carrera" placeholder="Enter carrera"  readonly="true">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="cuatrimestre">Cuatrimestre actual</label>
                                        <input type="text" class="form-control" id="cuatrimestre" name="cuatrimestre" placeholder="Enter cuatrimestre"  readonly="true">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4>Datos de las materias a revalidar</h4>
                            <div class="row">    
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="nivelegreso">Ciclo escolar</label>
                                        <div id="divCiclo"></div>
                                        <input type="hidden" class="form-control" id="periodo" name="periodo">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>  
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="Grado">Grado</label>
                                        <div id="seleGrado">
                                            <select class="form-control" required>
                                                <option value="">Seleccione uno</option>
                                            </select>
                                        </div>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="Materia">Materia</label>
                                        <div id="seleMateria">
                                            <select class="form-control" required>
                                                <option value="">Seleccione uno</option>
                                            </select>
                                        </div>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>              
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="Promedio">Promedio</label>
                                        <input type="number" class="form-control" id="Promedio" name="Promedio" required min="0" max="10">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>              
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="Promedio">Acción</label><br>
                                        <button type="submit" id="form-submit" class="btn btn-success btn-sm "><span class="pe pe-7s-diskette"></span> Guardar nota</button>

                                    </div>
                                </div>              
                            </div>
                        </div>
                        <div id="spinner-form"></div>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <hr>
                <div id="loadTableCalificaciones"></div>
            </div>
        </div>
    </div>
</div>



<!-- The Modal -->
<div class="modal fade" id="alumno">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Escriba la matrícula del estudiante</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">

                <div class="float-right">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inpmatricula" name="inpmatricula" placeholder="Ingrese matricula" required maxlength="30">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="button"  id="buscaAlumno">Buscar <i class="pe-7s-search"></i></button> 
                        </div>
                    </div>
                </div>
                <div id="TablaAlumnos"></div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="modalUpdateNota">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modificar la Nota</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" id="formUpdateNota" data-toggle="validator" class="shake">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nota">Nueva Nota</label>
                                <input type="text" class="form-control" id="Promedio" name="Promedio" required maxlength="3">
                                <input type="hidden" class="form-control" id="CalificacionId" name="CalificacionId" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for=""></label><br>
                                <button type="submit" id="form-submit" class="btn btn-success btn-sm pull-right ">Cambiar Nota</button>
                            </div>
                        </div>
                    </div>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>
            </div>

        </div>
    </div>
</div>



<?php include './footer.php'; ?>
<script src="asset/js/core_alumno_revalidacion.js"></script>


<script>
    function getCalificacionesyAlumnoId() {
        var idiRoleGerencia = "<?php echo $globalIdirole; ?>";
        var idiciclo = $('#CicloId').val();
        var idialumno = $('#idialumno').val();
        $("#loadTableCalificaciones").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCalificacionesyAlumnoId&idialumno=" + idialumno + "&idiciclo=" + idiciclo,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tableCalificaciones" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Cliclo</th><th>Grado</th><th>Materia</th><th>Calificacion</th><th>Tipo</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    var cMin = date[x].Promedio;
                    var CalificacionId = date[x].CalificacionId;
                    txt += '<tr>';
                    if (idiRoleGerencia == 2) {
                        txt += "<td>" + (a + 1) + ' <a href="#" onclick="$(' + "'#Promedio'" + ').val(' + cMin + '), $(' + "'#CalificacionId'" + ').val(' + CalificacionId + ')"><i class="pe-7s-note pe-2x pe-va" title="Editar" data-toggle="modal" data-target="#modalUpdateNota"></i></a> \n\
                                                    <a href="#" onclick="deleteNota(' + CalificacionId + ')"><i class="pe-7s-close-circle pe-va text-danger pe-2x " title="Eliminar"></i></a></td>';
                    } else {
                        txt += "<td>" + (a + 1) + ' <a href="#" onclick="$(' + "'#Promedio'" + ').val(' + cMin + '), $(' + "'#CalificacionId'" + ').val(' + CalificacionId + ')"><i class="pe-7s-note pe-2x pe-va" title="Editar" data-toggle="modal" data-target="#modalUpdateNota"></i></a> \n\
                                                    <a href="#" onclick="deleteNota(' + CalificacionId + ')"><i class="pe-7s-close-circle pe-va text-danger pe-2x " title="Eliminar"></i></a></td>';
                    }
                    txt += "<td>" + date[x].ciclo + "</td>";
                    txt += "<td>" + date[x].grado + "</td>";
                    0
                    txt += "<td>" + date[x].materia + "</td>";
                    //txt += "<td>" + date[x].Promedio + "</td>";
                    if (cMin <= 5) {
                        txt += '<td  class="table-danger">' + cMin + "</td>";
                    } else {
                        txt += '<td class="table-success">' + cMin + "</td>";
                    }
                    txt += "<td>" + date[x].tipo_evaluacion + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                $("#loadTableCalificaciones").html(txt);
                var table = $('#tableCalificaciones').DataTable({
                    responsive: true,
                    // dom: 'Bfrtip',
                    //buttons: ['excel', 'pdf'],
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Entradas",
                        "loadingRecords": "Cargando...",
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
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //console.log(jqXHR);
                //console.log(textStatus);
                //console.log(errorThrown);
                // alert("No fue posible conectar con el servidor");
                document.getElementById("loadTableCalificaciones").innerHTML = errorThrown;
            }
        });
    }
</script>

<script>
    $("#formUpdateNota").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            swalert('Mensaje!', 'Llene los campos requeridos', 'info');
            $("#modalUpdateNota .close").click();
        } else {
            $("#modalUpdateNota .close").click();
            // everything looks good!
            event.preventDefault();
            var txt;
            var r = confirm("Desea cambiar la nota? Esta acción es irreversible.");
            if (r) {
                UpdateNotaAlumno();
            }
        }
    });

    function UpdateNotaAlumno() {
        var dataString = $('#formUpdateNota').serialize();
        swalert('Mensaje!', 'Procesando...', 'info');
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=UpdateNotaAlumno&" + dataString,
            success: function (text) {
                if (text == "success") {
                    swalert('Mensaje!', 'La nota se guardó correctamente', 'success');
                    getCalificacionesyAlumnoId()
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }

    function deleteNota(nota) {
        //deltbCalificacionesById
        //alert(nota);
        swalert('Mensaje!', 'Procesando...', 'info');
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=deltbCalificacionesById&CalificacionId=" + nota,
            success: function (text) {
                if (text == "success") {
                    swalert('Mensaje!', 'La nota se eliminó correctamente', 'success');
                    getCalificacionesyAlumnoId()
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }



</script>