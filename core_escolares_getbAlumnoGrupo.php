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
        <!-- Nav pills -->
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active text-danger" data-toggle="pill" href="#lista"><i class="icofont icofont-school-bag"></i> Participantes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-warning" data-toggle="pill" href="#horario"><i class="ti-alarm-clock"></i> Horario Escolar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" data-toggle="pill" href="#Calificaciones"><i class="icon fa fa-table " ></i> Calificaciones</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="lista" class="tab-pane active">
                <?php include './core_escolares_tab_participantes.php'; ?>
            </div>
            <div id="horario" class="tab-pane">
                <?php include './core_escolares_tab_horario.php'; ?>
            </div>
            <div id="Periodos" class="tab-pane">
                <?php
                include './core_escolares_tab_periodos.php';
                ?>
            </div>
            <div id="Calificaciones" class="tab-pane">
                <?php
                include './core_escolares_tab_calificaciones.php';
                ?>
            </div>
        </div>
    </div>
</div>
   
<?php include './core_escolares_tab_modales.php'; ?>
<?php include './footer.php'; ?>
<script src="asset/js/core_alumno_revalidacion.js"></script>
<script type="text/javascript" src="asset/js/core_escolares_getbAlumnoGrupo.js"></script>
<script>
    var GrupoId = "<?php echo $_GET['GrupoId']; ?>";
    $(document).ready(function () {
        var GrupoId = "<?php echo $_GET['GrupoId']; ?>";
        getDetailGroupById(GrupoId);
        getbAlumnoGrupoByIdGrupo(GrupoId);
        getHorarioEscolarByGrupoId();
        getcTipoEvaluacionPeriodo();
    });
</script>
<script>

    function getHorarioEscolarByGrupoId() {
        var GrupoId = "<?php echo $_GET['GrupoId']; ?>";
        $("#divTableHorarioEscolar").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getHorarioEscolarByGrupoId&GrupoId=" + GrupoId,
            success: function (text) {
                // console.log(text);
                //console.log(text.data);
                var date = text.data;
                var txt = "";
                // console.log(date);
                txt += '<div class="table-responsive"> <center><table id="tableHorarioEscolar" class=" table-striped table-bordered table-hover table-sm">';
                txt += '<thead class="table-primary text-light"> <tr><th>Horaio</th><th>Lunes</th><th>Martes</th><th>Miercoles</th><th>Jueves</th><th>Viernes</th><th>Sabado</th><th>Domingo</th></tr> </thead>';
                for (x in date) {
                    var HorarioGrupoId = date[x].HorarioGrupoId;
                    var GrupoId = date[x].GrupoId;
                    var HoraHorarioId = date[x].HoraHorarioId;
                    var HoraInicial = date[x].HoraInicial;
                    var HoraFinal = date[x].HoraFinal;

                    var Lun = parseInt(date[x].Lun);
                    var AulaLunId = date[x].AulaLunId;
                    var profLunId = date[x].profLunId;
                    var asgLunId = date[x].asgLunId;

                    var Mar = parseInt(date[x].Mar);
                    var AulaMarId = date[x].AulaMarId;
                    var profMarId = date[x].profMarId;
                    var asgMarId = date[x].asgMarId;

                    var Mie = parseInt(date[x].Mie);
                    var AulaMieId = date[x].AulaMieId;
                    var profMieId = date[x].profMieId;
                    var asgMieId = date[x].asgMieId;

                    var Jue = parseInt(date[x].Jue);
                    var AulaJueId = date[x].AulaJueId;
                    var profJueId = date[x].profJueId;
                    var asgJueId = date[x].asgJueId;

                    var Vie = parseInt(date[x].Vie);
                    var AulaVieId = date[x].AulaVieId;
                    var profVieId = date[x].profVieId;
                    var asgVieId = date[x].asgVieId;

                    var Sab = parseInt(date[x].Sab);
                    var AulaSabId = date[x].AulaSabId;
                    var profSabId = date[x].profSabId;
                    var asgSabId = date[x].asgSabId;

                    var Dom = parseInt(date[x].Dom);
                    var AulaDomId = date[x].AulaDomId;
                    var profDomId = date[x].profDomId;
                    var asgDomId = date[x].asgDomId;

                    txt += '<tr>';
                    txt += "<td><center>" + HoraInicial + " <br> a <br> " + HoraFinal + ' <i class="fas fa-broom text-warning" title="Limpiar Fila" onclick="limpiarFila(' + HorarioGrupoId + ')"></i></center></td>';
                    if (Lun === 0) {
                        txt += "<td>-</td>";
                    } else {
                        var Lunes = "Lun";
                        txt += '<td><i>' + asgLunId + '</i><br>Prof: ' + profLunId + '<br>' + AulaLunId + ' <i class="pe-7s-close-circle pe-2x pe-va text-danger" title="Borrar" onclick="deleteHorarioGrupo(' + HorarioGrupoId + ', ' + "'Lun'" + ')"></i></td>';
                    }
                    if (Mar === 0) {
                        txt += "<td>-</td>";
                    } else {
                        txt += '<td><i>' + asgMarId + '</i><br>Prof: ' + profMarId + '<br>' + AulaMarId + ' <i class="pe-7s-close-circle pe-2x pe-va text-danger" title="Borrar" onclick="deleteHorarioGrupo(' + HorarioGrupoId + ', ' + "'Mar'" + ')"></i></td>';
                    }
                    if (Mie === 0) {
                        txt += "<td>-</td>";
                    } else {
                        txt += '<td><i>' + asgMieId + '</i><br>Prof: ' + profMieId + '<br>' + AulaMieId + ' <i class="pe-7s-close-circle pe-2x pe-va text-danger" title="Borrar" onclick="deleteHorarioGrupo(' + HorarioGrupoId + ', ' + "'Mie'" + ')"></i></td>';
                    }
                    if (Jue === 0) {
                        txt += "<td>-</td>";
                    } else {
                        txt += '<td><i>' + asgJueId + '</i><br>Prof: ' + profJueId + '<br>' + AulaJueId + ' <i class="pe-7s-close-circle pe-2x pe-va text-danger" title="Borrar" onclick="deleteHorarioGrupo(' + HorarioGrupoId + ', ' + "'Jue'" + ')"></i></td>';
                    }
                    if (Vie === 0) {
                        txt += "<td>-</td>";
                    } else {
                        txt += '<td><i>' + asgVieId + '</i><br>Prof: ' + profVieId + '<br>' + AulaVieId + ' <i class="pe-7s-close-circle pe-2x pe-va text-danger" title="Borrar" onclick="deleteHorarioGrupo(' + HorarioGrupoId + ', ' + "'Vie'" + ')"></i></td>';
                    }
                    if (Sab === 0) {
                        txt += "<td>-</td>";
                    } else {
                        txt += '<td><i>' + asgSabId + '</i><br>Prof: ' + profSabId + '<br>' + AulaSabId + ' <i class="pe-7s-close-circle pe-2x pe-va text-danger" title="Borrar" onclick="deleteHorarioGrupo(' + HorarioGrupoId + ', ' + "'Sab'" + ')"></i></td>';
                    }
                    if (Dom === 0) {
                        txt += "<td>-</td>";
                    } else {
                        txt += '<td><i>' + asgDomId + '</i><br>Prof: ' + profDomId + '<br>' + AulaDomId + ' <i class="pe-7s-close-circle pe-2x pe-va text-danger" title="Borrar" onclick="deleteHorarioGrupo(' + HorarioGrupoId + ', ' + "'Dom'" + ')"></i></td>';
                    }
                    txt += "</tr>";
                }
                txt += "</table></center> </div>"
                document.getElementById("divTableHorarioEscolar").innerHTML = txt;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("divTableHorarioEscolar").innerHTML = '0 Registros <br> <button class="btn btn-warning btn-sm" onclick="GrupoEscolarInexist();">Reset</button>';
                GrupoEscolarInexist();
            }
        });
    }
</script>
<script>
    function getCalificacionesyAlumnoId() {
        var idiRoleGerencia = "<?php echo $edit; ?>";
        var GrupoId = $('#GrupoId').val();
        var PeriodoId = $('#PeriodoId').val();
        var MateriaId = $('.MateriaId').val();
        $("#loadTableCalificaciones").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCalificacionesByGrupoIdANDPeriodoID&GrupoId=" + GrupoId + "&PeriodoId=" + PeriodoId + "&MateriaId=" + MateriaId,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tableCalificaciones" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Matricula</th><th>Nombre</th><th>Apellidos</th><th>Calificacion</th><th>Periodo</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    var cMin = date[x].Promedio;
                    var CalificacionId = date[x].CalificacionId;
                    txt += '<tr>';
                    if (edit) {
                        txt += "<td>" + (a + 1) + ' <a href="#" onclick="$(' + "'#Promedio'" + ').val(' + cMin + '), $(' + "'#CalificacionId'" + ').val(' + CalificacionId + ')"><i class="pe-7s-note pe-2x pe-va" title="Editar" data-toggle="modal" data-target="#modalUpdateNota"></i></a> \n\
                                                    <a href="#" onclick="deleteNota(' + CalificacionId + ')"><i class="pe-7s-close-circle pe-va text-danger pe-2x " title="Eliminar"></i></a></td>';
                    } else {
                        txt += "<td>" + (a + 1) + '</td>';
                    }
                    txt += "<td>" + date[x].matricula + "</td>";
                    txt += "<td>" + date[x].nombre + "</td>";
                    0
                    txt += "<td>" + date[x].apellido_paterno + ' ' + date[x].apellido_materno + "</td>";
                    if (cMin <= 5) {
                        txt += '<td  class="table-danger">' + cMin + "</td>";
                    } else {
                        txt += '<td class="table-success">' + cMin + "</td>";
                    }
                    txt += "<td>" + date[x].periodo + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                $("#loadTableCalificaciones").html(txt);
                var table = $('#tableCalificaciones').DataTable({
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
                document.getElementById("loadTableCalificaciones").innerHTML = errorThrown;
            }
        });
    }

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

    $("#core_reporte_boleta").click(function () {
        var GrupoId = "<?php echo $_GET['GrupoId']; ?>";
        var error = "";
        var MateriaId = $('.idiMateria').val();
        var PeriodoId = $('#PeriodoId').val();
        if (MateriaId.length <= 0) {
            error += "Seleccione una Materia. ";
        }
        if (PeriodoId.length <= 0) {
            error += "Seleccione un Periodo";
        }
        if (error == "") {
            window.open('core_reporte_boleta.php?GrupoId=' + GrupoId + '&MateriaId=' + MateriaId + '&PeriodoId=' + PeriodoId, this.target, width = 500, height = 500);
            return false;
        } else {
            swalert('Mensaje!', error, 'info');
        }

    });
</script>
