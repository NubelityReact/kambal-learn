
$(document).ready(function () {
    //getNivel();
    getPlantel();
});
function getPlantel() {
    $("#divPlantel").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getPlantel",
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="idicampus" name="idicampus" required onchange="getcarrera_idicampus()">';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].idicampus + '">' + date[x].campus + '</option>';
            }
            txt += "</select>";
            $("#divPlantel").html(txt);
        }
    });
}

function getNivel() {
    $("#divNivel").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getNivel",
        success: function (text) {
            //console.log(text);
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="NivelId" name="NivelId" required onchange="getcarrera_idicampus()">';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].NivelId + '">' + date[x].Descripcion + '</option>';
            }
            txt += "</select>";
            $("#divNivel").html(txt);
        }
    });
}

function getcarrera_idicampus() {
    var idicampus = $('#idicampus').val();
    $("#divCarrera").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getcarrera_idicampus&idicampus=" + idicampus,
        success: function (text) {
            //console.log(text);
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="idicarrera" name="idicarrera" required >';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].idicarrera + '">' + date[x].nombre + '</option>';
            }
            txt += "</select>";
            $("#divCarrera").html(txt);
        }
    });
}


function getGradosByID() {

    var CarreraId = $('#CarreraId').val();
    $("#divGrado").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getGradosByID&idiCarrera=" + CarreraId,
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="GradosId" name="GradosId" required">';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].GradosId + '">' + date[x].Descripcion + '</option>';
            }
            txt += "</select>";
            $("#divGrado").html(txt);
        }
    });
}



