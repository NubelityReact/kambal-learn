<?php include './headers.php'; ?>
<div class="row">

    <div class="col-12">
        <div class="card card-border-success">
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
                <span class="float-right"><a href="core_materia_addMateria.php" class="btn btn-success btn-sm">Agregar nueva Materia <i class="pe-7s-plus"></i></a></span>
                <br><br>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="nivel">Seleccione el Nivel</label>
                            <div id="divNivel"></div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-2">
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
                </div>
                <div id="loadTabletablaMaterias"></div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
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
        var NivelId = $('#NivelId').val();
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
                txt += '<select class="form-control fill" id="GradosId" name="GradosId" required onchange="getMaterias()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].GradosId + '">' + date[x].Descripcion + '</option>';
                }
                txt += "</select>";
                $("#divGrado").html(txt);
            }
        });
    }

    function getMaterias() {
        var NivelId = $("#NivelId").val();
        var CarreraId = $("#CarreraId").val();
        var GradoId = $("#GradosId").val();
        $("#loadTabletablaMaterias").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getMateriasByNivelIDAndCarreraIdAndGradoId&NivelId=" + NivelId + "&CarreraId=" + CarreraId + "&GradosId=" + GradoId,
            success: function (text) {
                console.log(text);
                console.log(text.data);
                var date = text.data;
                var txt = "";
                console.log(date);
                txt += '<div class="table-responsive"> <table id="tableAulas" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Clave</th><th>Descripcion</th><th>Nombre</th><th>Creditos</th><th>Horas/Semana</th></tr> </thead>';
                for (x in date) {
                    txt += '<tr>';
                    txt += "<td>" + date[x].MateriaId + ' <a href="core_materias_updateMaterias.php?MateriaId=' + date[x].MateriaId + '"><i class="pe-7s-note pe-2x pe-va" title="Editar"></i></a>\n\
                <button class="btn btn-link" onclick="deleteTablaMateria(' + date[x].MateriaId + ');"><i class="fas fa-trash-alt text-danger pe-1x pe-va" title="borrar"></i></button></td>';
                    txt += "<td>" + date[x].Clave + "</td>";
                    txt += "<td>" + date[x].DescripcionPlan + "</td>";
                    txt += "<td>" + date[x].Nombre + "</td>";
                    txt += "<td>" + date[x].Creditos + "</td>";
                    txt += "<td>" + date[x].HorasSemana + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("loadTabletablaMaterias").innerHTML = txt;
                var table = $('#tableAulas').DataTable({
                    responsive: true,
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
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                //alert("No fue posible conectar con el servidor");
                document.getElementById("loadTabletablaMaterias").innerHTML = errorThrown;
            }
        });
    }
</script>
<script>

    function deleteTablaMateria(MateriaId) {
        var txt;
        var r = confirm("Desea eliminar la Materia? " + MateriaId);
        if (r) {
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deleteTablaMateria&MateriaId=" + MateriaId,
                success: function (text) {
                    if (text == "success") {
                        swalert('Exito!', 'Materia Eliminado', 'success');
                        getNivel();
                    } else {
                        swalert('Error!', text, 'error');
                    }
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }
</script>
