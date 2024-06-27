function cMedioContacto() {
    $(".cMedioContacto").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/registration.php",
        data: "action=cMedioContacto",
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="idimedio" name="idimedio" required>';
            for (x in date) {
                txt += '<option value="' + date[x].idimedio + '">' + date[x].medio + '</option>';
            }
            txt += "</select>";
            $(".cMedioContacto").html(txt);
        }
    });
}

function getCampusPlantel() {
    $(".divCampus").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/registration.php",
        data: "action=getCampus",
        success: function (text) {
            //console.log(text);
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="idicampus" name="idicampus" required onchange="getOferta()">';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].idicampus + '">' + date[x].campus + '</option>';
            }
            txt += "</select>";
            $(".divCampus").html(txt);
        }
    });
}

function getOferta() {
    var idicampus = $("#idicampus").val();
    //$(".seleOferta").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/registration.php",
        data: "action=getCarrerasbyCampus&idicampus=" + idicampus,
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fill" id="idicarrera" name="idicarrera" required>';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].idicarrera + '">' + date[x].nombre + '</option>';
            }
            txt += "</select>";
            $(".seleOferta").html(txt);
            $('#idicarrera').on('change', function () {

                var interes = $("#idicarrera option:selected").text();

                $('#interes').val(interes);
                var idicarrera = $('#idicarrera').val();
                $("#ofering").hide();
                $.ajax({
                    type: "GET",
                    url: "dataConect/registration.php",
                    data: "action=getCarrerasID&idicarrera=" + idicarrera,
                    success: function (text) {
                        $("#ofering").show();
                        var idicarrera = text.data[0].idicarrera;
                        var imagen_vacante = text.data[0].rvoe;
                        var message = text.data[0].message;
                        var salary = text.data[0].salary;
                        var last_update = text.data[0].last_update;
                        var working_day = text.data[0].working_day;
                        var campus = text.data[0].campus;
                        var nivel = text.data[0].nivel;
                        var files_name = text.data[0].files_name;

                        //$('#files_name').val(files_name);
                        var str = files_name;
                        var n = str.length;
                        if (n > 3) {
                            $('#arc_adjunto').html('<label onclick="showFile(' + idicarrera + ')" class="text-dark"><i class="fa fa-paperclip pe-2x text-success"></i> Ver archivo adjunto: <a href="#">' + files_name + '</a></label>  ');
                        } else {
                            $('#arc_adjunto').html('<br>');
                        }
                        $("#link-oferta").html('<a href="core_postularme.php?org=' + org + '&oferta=' + idicarrera + '" class="btn btn-danger text-light float-right">Registrarse!</a>');
                        $("#nivel").html(nivel);
                        $("#campus").html(campus);
                        $("#working_day").html(working_day);
                        $("#last_update").html('Publicado el ' + last_update);
                        $("#salary").html(salary);
                        $("#message").html(message);
                        $("#imagen_vacante").html('<center> <img src="asset/images/izzi/' + imagen_vacante + '" width="100%"></center>');
                    }
                });
            });
        }
    });
}

function getNivel() {
    var idicampus = $("#idicampus").val();
    $(".divNivel").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getNivelbyCampus&idicampus=" + idicampus,
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<select class="form-control fillNivelId" id="NivelId" name="NivelId" required>';
            if (text == "0 results") {
                txt += '<option value="">0 resultados</option>';
            } else {
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].NivelId + '" rc="' + date[x].Descripcion + '" >' + date[x].Descripcion + '</option>';
                }
            }
            txt += "</select>";
            $(".divNivel").html(txt);
        }
    });
}

$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        swalert('Mensaje!', 'Llene los campos requeridos', 'info');
    } else {
        // everything looks good!
        event.preventDefault();
        AgregaAspirante();
    }
});
function AgregaAspirante() {
    var dataString = $('#contactForm').serialize();
    var username, firstname, lastname, email;
    email = $("#email").val();
    username = $("#email").val();
    firstname = $("#nombre").val();
    lastname = $("#apellido_paterno").val() + ' ' + $("#apellido_materno").val();
    var interes = $("#interes").val();
    var idinotification = $("#idinotification").val();
    var lms_course_id = $("#lms_course_id").val();
    var org = $("#org").val();
    //lms_course_id = parseInt(lms_course_id);
    idinotification = parseInt(idinotification);

    swalert('Mensaje!', 'Procesando...', 'info');
    $.ajax({
        type: "POST",
        url: "dataConect/registration.php",
        data: "action=addDatosGenerales&" + dataString,
        success: function (text) {
            if (text.valid == "success") {
                var idigenerales = text.idigenerales;
                if (lms_course_id > 0) {
                    core_user_create_user_moodle(username, firstname, lastname, email, idigenerales, interes, lms_course_id, org, idinotification);
                }
                //location.href = "./core_postularme_success.php?org=" + org + "&idinotification=" + idinotification;
                //location.href = "./core_postularme_success.php?org=" + org + "&idinotification=" + idinotification;
                $("#contactForm")[0].reset();
            } else {
                swalert('Mensaje!', text, 'info');
            }
        }
    });
}

function refreshPage() {
    location.reload();
}

function swalert(title, texto, type) {
    Swal({
        title: title,
        text: texto,
        type: type,
        confirmButtonText: 'Cerrar'
    })
}

function core_user_create_user_moodle(username, firstname, lastname, email, idigenerales, interes, lms_course_id, org, idinotification) {
    $.ajax({
        type: "POST",
        url: "dataConect/moodle.php",
        data: 'action=core_user_create_user_moodle&username=' + username + '&firstname=' + firstname + '&lastname=' + lastname + '&email=' + email,
        success: function (text) {
            var myJSON = JSON.stringify(text);
            var valid = myJSON.includes("username");
            if (valid) {
                enrol_manual_enrol_users(text[0].id, lms_course_id, idigenerales);
                core_user_update_institut(text[0].id, interes);
            }
            location.href = "./core_postularme_success.php?org=" + org + "&idinotification=" + idinotification + "&valid=" + valid;
        },
        error: function (jqXHR, textStatus, errorThrown) {
            swalert('Mensaje!', jqXHR + " " + textStatus + " " + errorThrown, 'warning');
        }
    });
}

function core_user_update_institut(idimoodle, institution) {
    //swalert('Mensaje!', 'Procesando...', 'info');
    $.ajax({
        type: "POST",
        url: "dataConect/moodle.php",
        data: 'action=core_user_update_institut&idimoodle=' + idimoodle + '&institution=' + institution,
        success: function (text) {
            //      swalert('Mensaje!', text, 'info');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            //    swalert('Mensaje!', jqXHR + " " + textStatus + " " + errorThrown, 'warning');
        }
    });
}

/**
 * Actualiza el campus de cedula almacenando el id de moodel del usuario almacenado
 * @returns {undefined}
 */
function updateidmoodle(id, idigenerales) {
    $.ajax({
        type: "POST",
        url: "dataConect/registration.php",
        data: "action=updateidmoodle&id=" + id + "&idigenerales=" + idigenerales,
        success: function (text) {
            console.log('updateidmoodle ' + text);
        }
    });
}

function enrol_manual_enrol_users(userid, courseid, idigenerales) {
    //swalert('Mensaje!', 'Procesando...', 'info');
    $.ajax({
        type: "POST",
        url: "dataConect/moodle.php",
        data: 'action=enrol_manual_enrol_users&userid=' + userid + '&courseid=' + courseid,
        success: function (text) {
            console.log('enrol_manual_enrol_users ' + text);
            updateidmoodle(userid, idigenerales);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            swalert('Mensaje!', jqXHR + " " + textStatus + " " + errorThrown, 'warning');
        }
    });
}

function showFile(idicarrera) {
    window.open('core_carrera_show_file.php?file=' + idicarrera, 'popUpWindow', 'height=1000,width=800,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
}