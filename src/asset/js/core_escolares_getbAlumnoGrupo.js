/*
 * Funciones del Tab lista de grupo
 */
function getbAlumnoGrupoByIdGrupo(GrupoId) {
    $("#tableAlumno").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getbAlumnoGrupoByIdGrupo&GrupoId=" + GrupoId,
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<hr><div class="table-responsive"> <table id="tacleClicos" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
            txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>ID</th><th><i class="pe-7s-more"></i></th><th>Matrícula</th><th>Apellidos</th><th>Nombre</th><th>Email</th></tr> </thead>';
            for (x in date) {
                var a = parseInt(x);
                var email = date[x].email;
                txt += '<tr>';
                txt += "<td>" + (a + 1) + '</td>';
                txt += "<td>" + date[x].idialumno + '</td>';
                txt += '<td>';
                txt += '<div class="btn-group"><button type="button" class="btn btn-danger btn-sm" title="Desinscribir Alumno" onclick="unrolStudent(' + date[x].idialumno + ')"><i class="pe-7s-close-circle"></i></button>\n\
                <button type="button" class="btn btn-success btn-sm" title="Desinscribir Alumno" onclick="certificado(' + date[x].idialumno + ')"><i class="pe-7s-study"></i></button>\n\
                <button type="button" class="btn btn-primary btn-sm" title="Desinscribir Alumno" onclick="send_constancy(' + date[x].idialumno + ')"><i class="pe-7s-plane"></i></button></div>';
                txt += '</td>';
                txt += '<td><a href="updateAlumno.php?p=' + date[x].idigenerales + '&idialumno=' + date[x].idialumno + '&idiarchivo=' + date[x].idiarchivo + '" title="ver perfil">' + date[x].Matricula.toLowerCase() + "</a></td>";
                txt += "<td>" + date[x].Apellido_Paterno + ' ' + date[x].Apellido_Materno + "</td>";
                txt += "<td>" + date[x].Nombre + "</td>";
                if (email === null) {
                    txt += "<td>" + date[x].Matricula.toLowerCase() + "@mail.com</td>";
                } else {
                    txt += "<td>" + date[x].email.toLowerCase() + "</td>";
                }
                txt += "</tr>";
            }
            txt += "</table> </div>";
            var txt2 = "";
            txt2 += '<option value="">Seleccione un Alumno</option>';
            for (d in date) {
                txt2 += '<option value="' + date[d].idialumno + '">' + date[d].Matricula + " > " + date[d].Nombre + "  " + date[d].Apellido_Paterno + "  " + date[d].Apellido_Materno + '</option>';
            }
            $("#labelAlumnos").html('');
            $("#SelectAlumno").html('<select class="form-control" placeholder="idialumno" id="idialumno" name="idialumno" required>' + txt2 + '</select>');
            document.getElementById("tableAlumno").innerHTML = txt;
            var table = $('#tacleClicos').DataTable({
                responsive: false,
                dom: 'Bfrtip',
                buttons: ['excel'],
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
            document.getElementById("tableAlumno").innerHTML = '0 Alumnos';
        }
    });
}

function getDetailGroupById(GrupoId) {
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getDetailGroupById&GrupoId=" + GrupoId,
        success: function (text) {
            console.log({ text })
            var NivelId = text.data[0].NivelId;
            var CarreraId = text.data[0].CarreraId;
            var nivel = text.data[0].nivel;
            var carrera = text.data[0].carrera;
            var idicarrera = text.data[0].idicarrera;
            var ciclo = text.data[0].ciclo;
            var idiciclo = text.data[0].idiciclo;
            var grupo = text.data[0].grupo;
            var TurnoId = text.data[0].TurnoId;
            var turno = text.data[0].turno;
            var GradosId = text.data[0].GradosId;
            var grado = text.data[0].grado;
            var descripcion = text.data[0].Descripcion;
            $('#Clave').val(grupo);
            $('#NivelId').val(NivelId);
            $(".GrupoId").val(GrupoId);
            $("#GrupoId").val(GrupoId);
            $("#idicarrera").val(idicarrera);
            $("#CicloId").val(idiciclo);
            $(".CicloId").val(idiciclo);
            $('.subcabecera').append('<span class="text-primary"><strong>GRUPO: </strong>' + descripcion + '</span> <strong>Carrera: </strong> ' + nivel + ' en ' + carrera + '<strong> Ciclo:</strong> ' + ciclo + ' <strong>Turno:</strong> ' + turno + ' <strong>Grupo:</strong> ' + grupo + ' <strong>GDO: </strong>' + grado);
            $('.subcabecera').append('<input type="hidden" id="gru" value="' + GrupoId + '"> <input type="hidden" id="niv" value="' + NivelId + '"> <input type="hidden" id="tur" value="' + TurnoId + '">');
            $('#descripcion-grupo').append('<center title="Descripción del grupo en edición"><label class="label label-primary">' + descripcion + '</label></center>');
            getAlumnosByCarreraId(idicarrera);
            getcHorasByTurnoID(TurnoId, NivelId, CarreraId);
            getMaterias(idicarrera, GradosId);
            getPeriodoByGrupoId();
        },
        error: function (data) {
            console.log({ data })
            data.json().then(console.log)
        }
    });
}
/**
 * Funciones para aregar estudiantes a los grupos 
 */
function getAlumnosByCarreraId(idicarrera) {
    $("#loadTableByCarrera").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getAlumnosByCarreraId&idicarrera=" + idicarrera,
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<div class="table-responsive"> <table id="mytables" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
            txt += '<thead class="table-primary text-light"> <tr><th>Agregar</th><th>#</th> <th>Matrícula</th> <th>Nombre</th> <th>Apellidos</th></tr> </thead>';
            for (x in date) {
                var a = parseInt(x);
                txt += '<tr>';
                txt += '<td><button type="button" class="btn btn-success btn-sm" title="Agregar Alumno" onclick="enrolStudent(' + date[x].idialumno + ')"><i class="pe-7s-add-user"></i></button></td>';
                txt += "<td>" + (a + 1) + "</td>";
                txt += "<td>" + date[x].matricula + "</td>";
                txt += "<td>" + date[x].nombre + "</td>";
                txt += "<td>" + date[x].apellido_paterno + " " + date[x].apellido_materno + "</td>";
                txt += "</tr>";
            }
            txt += "</table> </div>"
            document.getElementById("loadTableByCarrera").innerHTML = txt;
            var table = $('#mytables').DataTable({
                async: true,
                responsive: false,
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
            $('#mytables tbody').on('click', 'tr', function () {
                var datos = table.row(this).data();
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
                //alert(datos[0]);
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            document.getElementById("loadTableByCarrera").innerHTML = '0 Alumnos';
        }
    });
}

function unrolStudent(idialumno) {
    var table = $('#tacleClicos').DataTable();
    $.ajax({
        type: "POST",
        url: "dataConect/API.php",
        data: 'action=unrolStudent&idialumno=' + idialumno,
        success: function (text) {
            if (text == "success") {
                $('#alert').html('<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Mensaje!</strong> Alumno inscrito</div>');
                $('#tacleClicos').on('click', 'tbody tr', function () {
                    table.row(this).delete();
                });
            } else {
                $('#alert').html('<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Mensaje!</strong> ' + text + '</div>');
            }
        }
    });
}

function enrolStudent(idialumno) {
    var table = $('#mytables').DataTable();
    $.ajax({
        type: "POST",
        url: "dataConect/API.php",
        data: 'action=enrolStudent&idialumno=' + idialumno + '&GrupoId=' + GrupoId,
        success: function (text) {
            if (text == "success") {
                $('#alert').html('<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Mensaje!</strong> Alumno inscrito</div>');
                table.row('.selected').remove().draw(false);
                getbAlumnoGrupoByIdGrupo(GrupoId);
            } else {
                $('#alert').html('<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Mensaje!</strong> ' + text + '</div>');
            }
        }
    });
}

function send_constancy(idialumno) {
    swalert('Enviando', 'Espere', 'info');
    $.ajax({
        type: "POST",
        url: "webinar_send_constancy.php",
        data: 'idialumno=' + idialumno,
        success: function (text) {
            if (text == "success") {
                swalert('Certificado Enviado', 'Exito: ' + text, 'success');
            } else {
                swalert('Error Certificado no Enviado', 'Failed: ' + text, 'danger');
            }
        }
    });
}

function certificado(idialumno) {
    window.open('webinar_constancy.php?idialumno=' + idialumno, this.target, width = 500, height = 500);
}


$("#editGroup").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        swalert('Mensaje!', 'Llene los campos requeridos', 'info');
    } else {
        // everything looks good!
        event.preventDefault();
        var dataString = $('#editGroup').serialize();
        swalert('Mensaje!', 'Procesando...', 'info');
        $("#editaGrupo .close").click();
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=updateGrupoEscolar&" + dataString,
            success: function (text) {
                var request = String(text);
                var str = request;
                var n = str.includes("success");
                if (n) {
                    swalert('Mensaje!', 'El horario se guardó correctamente', 'success');
                    //getHorarioEscolarByGrupoId();
                } else {
                    swalert('Mensaje!', str, 'info');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                swalert('Mensaje!', 'Exito', 'success');
                location.reload();
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }
});


$(document).ready(function () {
    nivel();
    getNiveles();
    getCiclo();
    getcAulas();
    seleTurno();
    divTurno();
    cliclo();
});

$(document).on("click", ".fill", function () {
    var clave, descripcion = "";
    var grado = $("#GradosId option:selected").text();
    var carrara = $("#CarreraId option:selected").text();
    var str = $("#CicloId option:selected").text();
    var turno = $("#TurnoId option:selected").text();
    var ciclo = str.substring(2, 6);
    descripcion = grado + '°  ' + carrara + ' ' + turno + ' ' + ciclo;
    $('#Descripcion').val(descripcion);
});

function cliclo() {
    $("#divCiclo").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getCiclo",
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="ciclo" name="ciclo" required>';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].idiciclo + '">' + date[x].ciclo + '</option>';
            }
            txt += "</select>";
            $("#divCiclo").html(txt);
        }
    });
}

function getCiclo() {
    $("#seleCiclo").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getCiclo",
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="CicloId" name="CicloId" required>';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].idiciclo + '">' + date[x].ciclo + '</option>';
            }
            txt += "</select>";
            $("#seleCiclo").html(txt);
        }
    });
}
function getNiveles() {
    $("#seleNivel2").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getNivel",
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="idinivel" name="idinivel" onchange="getcCarrerasbyID()" required>';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].NivelId + '">' + date[x].Descripcion + '</option>';
            }
            txt += "</select>";
            $("#seleNivel2").html(txt);
        }
    });
}

function getcCarrerasbyID() {
    var NivelId = $('#idinivel').val();
    $("#seleCarrera2").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getcCarrerasbyID&NivelId=" + NivelId,
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="CarreraId" name="CarreraId" required onchange="getcGradosById()">';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].idicarrera + '">' + date[x].nombre + '</option>';
            }
            txt += "</select>";
            $("#seleCarrera2").html(txt);
        }
    });
}

function getcGradosById() {
    var idicarrera = $('#CarreraId').val();
    $("#seleGrado2").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getGradosByidicarrera&idicarrera=" + idicarrera,
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="GradosId" name="GradosId" required>';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].GradosId + '" > ' + date[x].Descripcion + '</option>';
            }
            txt += "</select>";
            $("#seleGrado2").html(txt);
        }
    });
}

function getcAulas() {
    $("#seleAulas2").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getcAulas",
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="AulaId" name="AulaId" required>';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].AulaId + '">' + date[x].Descripcion + '</option>';
            }
            txt += "</select>";
            $("#seleAulas2").html(txt);
        }
    });
}

function seleTurno() {
    $("#seleTurno").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getTurno",
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="TurnoId" name="TurnoId">';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].TurnoId + '"><i class="text-info">' + date[x].Descripcion + '</i></option>';
            }
            txt += "</select>";
            $("#seleTurno").html(txt);
        }
    });
}

function divTurno() {
    $("#divTurno").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getTurno",
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="myturno" name="myturno">';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].TurnoId + '">' + date[x].Descripcion + '</option>';
            }
            txt += "</select>";
            $("#divTurno").html(txt);
        }
    });
}

function nivel() {
    $("#divNivel").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getNivel",
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="nivel" name="nivel" onchange="FindCarrerasbyID()" required>';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].NivelId + '">' + date[x].Descripcion + '</option>';
            }
            txt += "</select>";
            $("#divNivel").html(txt);
        }
    });
}
function FindCarrerasbyID() {
    var NivelId = $('#nivel').val();
    $("#divCarrera").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getcCarrerasbyID&NivelId=" + NivelId,
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="carrera" name="carrera" required >';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].CarreraId + '">' + date[x].Descripcion + '</option>';
            }
            txt += "</select>";
            $("#divCarrera").html(txt);
        }
    });
}


/**
 * tbperiodo
 */

function getcTipoEvaluacionPeriodo() {
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getcTipoEvaluacionPeriodo",
        success: function (text) {
            var date = text.data;
            var txt = "";
            //txt += '<select class="form-control fill" id="AulaId" name="AulaId" required>';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].TipoEvaluacionPeriodoId + '">' + date[x].Descripcion + '</option>';
            }
            $("#labelTipoEvaluacionPeriodoId").after('<select class="form-control" id="TipoEvaluacionId" name="TipoEvaluacionId" title="Enter TipoEvaluacionId" required>' + txt + '</select>');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#labelTipoEvaluacionPeriodoId").html(errorThrown)
        }
    });
}

$("#FormPeriodo").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        swalert('Mensaje!', 'Llene los campos requeridos', 'info');
        // $("#modalUpdateNota .close").click();
    } else {
        //$("#modalUpdateNota .close").click();
        // everything looks good!
        event.preventDefault();
        var txt;
        var r = confirm("Desea agregar la nota? Esta acción es irreversible.");
        if (r) {
            addPerdiodo();
        }
    }
});

function addPerdiodo() {
    var dataString = $('#FormPeriodo').serialize();
    swalert('Mensaje!', 'Procesando...', 'info');
    $.ajax({
        type: "POST",
        url: "dataConect/API.php",
        data: "action=addPeriodo&" + dataString,
        success: function (text) {
            if (text == "success") {
                swalert('Mensaje!', 'El Periodo se guardó correctamente', 'success');
                getPeriodoByGrupoId();
            } else {
                swalert('Mensaje!', text, 'info');
            }
        }
    });
}

function getPeriodoByGrupoId() {
    var CicloId = $("#CicloId").val();
    $("#loadPeriodoByGrupoId").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getPeriodoByGrupoId&CicloId=" + CicloId,
        success: function (text) {
            var date = text.data;
            setOptionPeriodos(date);
            var txt = "";
            txt += '<div class="table-responsive"> <table id="PeriodoByGrupoId" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
            txt += '<thead class="table-primary text-light"> <tr><th>Eliminar</th><th>#</th> <th>Decripcion</th> <th>Abreviatura</th> <th>Inicio</th><th>Fin</th></tr> </thead>';
            for (x in date) {
                var a = parseInt(x);
                txt += '<tr>';
                txt += '<td><button type="button" class="btn btn-danger btn-sm" title="Eliminar Periodo" onclick="deletePeriodo(' + date[x].PeriodoId + ')"><i class="pe-7s-close-circle"></i></button></td>';
                txt += "<td>" + (a + 1) + "</td>";
                txt += "<td>" + date[x].Descripcion + "</td>";
                txt += "<td>" + date[x].Abreviatura + "</td>";
                txt += "<td>" + date[x].FechaInicio + "</td>";
                txt += "<td>" + date[x].FechaFin + "</td>";
                txt += "</tr>";
            }
            txt += "</table> </div>"
            document.getElementById("loadPeriodoByGrupoId").innerHTML = txt;
            var table = $('#PeriodoByGrupoId').DataTable({
                async: true,
                responsive: false,
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
            document.getElementById("loadTableByCarrera").innerHTML = '0 Alumnos';
        }
    });
}

function deletePeriodo(PeriodoId) {
    var txt;
    var r = confirm("Desea eliminar este Periodo? ");
    if (r) {
        var CicloId = $('#CicloId').val();
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: 'action=deletePeriodo&PeriodoId=' + PeriodoId,
            success: function (text) {
                if (text == "success") {
                    swalert('Mensaje', 'Periodo eliminado', 'info');
                    getPeriodoByGrupoId();
                } else {
                    swalert('Mensaje', text, 'info');
                }
            }
        });
    } else {
        txt = "You pressed Cancel!";
    }
}


/**
 * Tab pane Calificaciones
 */
function listaAlumnosTabCalificaciones(date) {
    $("#listaAlumnosTabCalificaciones").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    var txt = "";
    txt += '<div class="table-responsive"> <table id="ded" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
    txt += '<thead class="table-primary text-light"> <tr><th>#</th><th><i class="pe-7s-more"></i></th><th>Matrícula</th><th>Nombre</th><th>Primer Parcial</th><th>Segundo Parcial</th><th>Final</th></tr> </thead>';
    for (x in date) {
        var a = parseInt(x);
        txt += '<tr>';
        txt += "<td>" + (a + 1) + '</td>';
        txt += '<td>';
        txt += '<div class="btn-group">';
        txt += '<button type="button" class="btn btn-success btn-sm" title="Asignar Calificaciones" data-toggle="modal" data-target="#modalCalificaciones" onclick="getAlumnoById(' + date[x].idialumno + ')"><i class="fas fa-pencil-alt"></i></button> \n\
                    </div>';
        txt += '</td>';
        txt += "<td>" + date[x].Matricula + "</td>";
        txt += "<td>" + date[x].Apellido_Paterno + " " + date[x].Apellido_Materno + " " + date[x].Nombre + "</td>";
        txt += "<td>a</td>";
        txt += "<td>b</td>";
        txt += "<td>b</td>";
        txt += "</tr>";
    }
    txt += "</table> </div>"
    $("#listaAlumnosTabCalificaciones").html(txt);
    var table = $('#ded').DataTable({
        responsive: false,
        //dom: 'Bfrtip',
        //buttons: ['excel'],
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
}

function getAlumnoById(idialumno) {
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getAlumnoById&idialumno=" + idialumno,
        success: function (text) {
            var idialumno = text.data[0].idialumno;
            var matricula = text.data[0].matricula;
            var nombre = text.data[0].nombre;
            var apellido_paterno = text.data[0].apellido_paterno;
            var apellido_materno = text.data[0].apellido_materno;

            $('#idialumno').val(idialumno);
            $('#matricula').val(matricula);
            $('#nombre').val(nombre + " " + apellido_paterno + " " + apellido_materno);
        }
    });
}

/*
 * Funciones del Tab Horario
 */
$(document).ready(function () {
    comboAluas();
});
function comboAluas() {
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getcAulas",
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<option value="">Seleccione un Aula</option>';
            for (x in date) {
                txt += '<option value="' + date[x].Descripcion + '">' + date[x].Descripcion + '</option>';
            }
            $("#labelAula").after('<select class="form-control" placeholder="Aula" id="Aula" name="Aula" required>' + txt + '</select>');

        }
    });
}

/*
 * Funcion que muestra el cataogo de horas dependiendo del turno (Matutino, sab, dominical etc)
 */
function getcHorasByTurnoID(TurnoId, NivelId, CarreraId) {
    //$("#labelHorario").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getcHorasByTurnoID&NivelId=" + NivelId + "&CarreraId=" + CarreraId + "&TurnoId=" + TurnoId,
        success: function (text) {
            var date = text.data;
            var txt = "";
            //txt += '<select class="form-control fill" id="AulaId" name="AulaId" required>';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].HoraHorarioId + '">De ' + date[x].HoraInicial + ' a ' + date[x].HoraFinal + '</option>';
            }
            //<input type="text" class="form-control" id="HorarioId" name="HorarioId" placeholder="Enter HorarioId" required>
            $("#labelHorario").after('<select class="form-control" id="HorarioId" name="HorarioId" title="Enter HorarioId" required>' + txt + '</select>');
        }
    });
}

/*
 * funcion que muestra la lista de materias dependiendo la carrera y el grado
 */
function getMaterias(idiCarrera, idigrado) {
    //$("#labelMateria").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getMateriasByCarreraAndGradoID&idicarrera=" + idiCarrera + "&GradosId=" + idigrado,
        success: function (text) {
            var date = text.data;
            var txt = "";
            //txt += '<select class="form-control fill" id="AulaId" name="AulaId" required>';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].Nombre + '">' + date[x].Nombre + '  (' + date[x].Clave + ')</option>';
            }
            $("#labelMateria").after('<select class="form-control" id="MateriaId" name="MateriaId" title="Enter MateriaId" required>' + txt + '</select>');

            var txt2 = "";
            //txt += '<select class="form-control fill" id="AulaId" name="AulaId" required>';
            txt2 += '<option value="">Seleccione</option>';
            for (d in date) {
                txt2 += '<option value="' + date[d].MateriaId + '">' + date[d].Nombre + '  (' + date[d].Clave + ')</option>';
            }
            $("#labelMateriaC").after('<select class="form-control MateriaId idiMateria" id="MateriaId" name="MateriaId" title="Enter MateriaId" required>' + txt2 + '</select>');
            $('.MateriaId').on('change', function () {
                getCalificacionesyAlumnoId();
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#labelMateria").html('Sin materias registradas');
        }
    });
}

$(document).ready(function () {
    getProfesores();
});
/**
 * funcion que muestra el catalogo de profesores
 
 * @returns {undefined}     */
function getProfesores() {
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getProfesores",
        success: function (text) {
            var date = text.data;
            var txt = "";
            //txt += '<select class="form-control fill" id="AulaId" name="AulaId" required>';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].apellido_paterno + " " + date[x].apellido_materno + " " + date[x].nombre + '">' + date[x].apellido_paterno + " " + date[x].apellido_materno + " " + date[x].nombre + '</option>';
            }
            //<input type="text" class="form-control" id="MaestroId" name="MaestroId" placeholder="Enter MaestroId" required>
            $("#labelMaestros").after('<select class="form-control" id="MaestroId" name="MaestroId" title="Enter MaestroId" >' + txt + '</select>');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#labelMaestros").html('Sin profesores registrados');
        }
    });
}

$("#FormHorarioGrupo").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        swalert('Mensaje!', 'Llene los campos requeridos', 'info');
    } else {
        // everything looks good!
        event.preventDefault();
        var dataString = $('#FormHorarioGrupo').serialize();
        swalert('Mensaje!', 'Procesando...', 'info');
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=addtbHorarioGrupo&" + dataString,
            success: function (text) {
                if (text == "success") {
                    swalert('Mensaje!', 'El horario se guardó correctamente', 'success');
                    getHorarioEscolarByGrupoId();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }
});

function deleteHorarioGrupo(HorarioGrupoId, dia) {
    //        var txt;
    //        var r = confirm("Desea borrar este horario? ");
    //        if (r) {
    $.ajax({
        type: "POST",
        url: "dataConect/API.php",
        data: 'action=deleteHorarioGrupo&HorarioGrupoId=' + HorarioGrupoId + '&dia=' + dia,
        success: function (text) {
            if (text == "success") {
                getHorarioEscolarByGrupoId();
            } else {
                swalert('Mensaje', text, 'info');
            }
        }
    });
    //        } else {
    //            txt = "You pressed Cancel!";
    //        }
}

function limpiarFila(HorarioGrupoId) {
    var txt;
    var r = confirm("Desea borrar esta fila? ");
    if (r) {
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: 'action=limpiarFilaHorarioGrupo&HorarioGrupoId=' + HorarioGrupoId,
            success: function (text) {
                if (text == "success") {
                    getHorarioEscolarByGrupoId();
                } else {
                    swalert('Mensaje', text, 'info');
                }
            }
        });
    } else {
        txt = "You pressed Cancel!";
    }
}

function GrupoEscolarInexist() {
    //$this->creaMatrizHorario($GrupoId, $idinivel, $TurnoId);
    var GrupoId = $('#gru').val();
    var idinivel = $('#niv').val();
    var TurnoId = $('#tur').val();
    var txt;
    // var r =  ("Desea resetear horario? ");
    $.ajax({
        type: "POST",
        url: "dataConect/API.php",
        data: 'action=GrupoEscolarInexist&GrupoId=' + GrupoId + '&idinivel=' + idinivel + '&TurnoId=' + TurnoId,
        success: function (text) {
            if (text == "success") {
                getHorarioEscolarByGrupoId();
            } else {
                // swalert('Mensaje', text, 'info');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            getHorarioEscolarByGrupoId();
        }
    });
}

function setOptionPeriodos(date) {
    var txt = "";
    txt += '<option value="">Seleccione</option>';
    for (x in date) {
        txt += '<option value="' + date[x].PeriodoId + '">' + date[x].Descripcion + '</option>';
    }
    $("#SelectPeriodo").html('');
    $("#SelectPeriodo").html('<select class="form-control" id="PeriodoId" name="PeriodoId" title="Enter PeriodoId" required>' + txt + '</select>');
    $('#PeriodoId').on('change', function () {
        getCalificacionesyAlumnoId();
    });
}