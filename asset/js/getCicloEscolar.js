$(document).ready(function () {
    getCicloEscolar();
    $("#seleGrupo").html('0 grupos <a href="core_escolares_grupo.php" class="btn btn-sm btn-info">agregar grupo</a>');
});
function getCicloEscolar() {
    $("#divCiclo").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getCicloByEstatus",
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control" id="idiciclo" name="idiciclo" required>';
            txt += '<option value="">Seleccione una opción</option>';
            for (x in date) {
                txt += '<option  class="' + date[x].idiciclo + '" value="' + date[x].idiciclo + '">' + date[x].ciclo + '</option>';
            }
            txt += "</select>";
            document.getElementById("divCiclo").innerHTML = txt;
            $('#idiciclo').on('change', function () {
                //var CicloId = $('select[name="generacion"] :selected').attr('class');
                //$('#CicloId').val(CicloId);
                //getFechaLimiteInscripcionByAbrebv(this.value);
                getGrupos();
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            document.getElementById("divCiclo").innerHTML = '0 ciclos <a href="core_gerencia_getClicloEscolar.php" class="btn btn-sm btn-info">agregar ciclo</a>';
        }
    });
}

function getFechaLimiteInscripcionByAbrebv(abrev) {
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getCicloByAbrev&abrev=" + abrev,
        success: function (text) {
            var limite_inscipcion = text.data[0].limite_inscipcion;
            var termino = text.data[0].termino;
            $('#vigencia').val(termino);
            $('#termino').val(limite_inscipcion);
            $('#periodo').val(text.data[0].ciclo);
            $('#idiciclo').val(text.data[0].idiciclo);
        }
    });
}

$(document).ready(function () {
    seleTurno();
});
function seleTurno() {
    $("#seleTurno").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getTurno",
        success: function (text) {
            console.log(text);
            var date = text.data;
            var txt = "";
            txt += ' <select class="form-control" id="turno" name="turno" required>';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option class="' + date[x].TurnoId + '" value="' + date[x].Descripcion + '">' + date[x].Descripcion + '</option>';
            }
            txt += "</select>";
            document.getElementById("seleTurno").innerHTML = txt;
            $('#turno').on('change', function () {
                var TurnoId = $('select[name="turno"] :selected').attr('class');
                $('#TurnoId').val(TurnoId);
                getGrupos();
            });
        }
    });
}

function getGrupos() {
    var idicarrera = $("#idicarrera").val();
    var idiciclo = $("#idiciclo").val();
    var TurnoId = $("#TurnoId").val();
    $("#seleGrupo").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=gettbGrupos_idicarrera&idicarrera=" + idicarrera + "&idiciclo=" + idiciclo + "&TurnoId=" + TurnoId,
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control" id="GrupoId" name="GrupoId">';
            txt += '<option value="">Seleccione una opción</option>';
            for (x in date) {
                txt += '<option value="' + date[x].GrupoId + '">' + date[x].Descripcion + '</option>';
            }
            txt += "</select>";
            $("#seleGrupo").html(txt);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#seleGrupo").html('0 grupos <a href="core_escolares_grupo.php" class="btn btn-sm btn-info">agregar grupo</a>');
        }
    });
}

function enrolStudent(idialumno, GrupoId) {
    $.ajax({
        type: "POST",
        url: "dataConect/API.php",
        data: 'action=enrolStudent&idialumno=' + idialumno + '&GrupoId=' + GrupoId,
        success: function (text) {
            if (text == "success") {
                swalert('Mensaje!', 'enrolStudent', 'success');
            } else {
                swalert('Mensaje!', text, 'info');
            }
        }
    });
}

$(document).ready(function () {
    getPlanPago();
});

function getPlanPago() {
    $("#selePlan").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getPlanPago",
        success: function (text) {
            console.log(text);
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control" id="idiplan" name="idiplan"" required>';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].idiplan + '">' + date[x].clave + ' > ' + date[x].descripcion + '</option>';
            }
            txt += "</select>";
            document.getElementById("selePlan").innerHTML = txt;
        }
    });
}
