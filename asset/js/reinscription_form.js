$("#FormReInscripcion").validator().on("submit", function (event) {
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
    swalert('Mensaje!', 'Procesando...', 'info');
    $("#spinner-form").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    // Initiate Variables With Form Content
    var dataString = $('#FormReInscripcion').serialize();
    var r = confirm("Está seguro de reinscribir a este alumno?");
    if (r) {
        var idialumno = $("#idialumno").val();
        var GrupoId = $("#GrupoId").val();
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: 'action=reinscription&' + dataString,
            success: function (text) {
                console.log(text);
                swalert('Mensaje!', text, 'info');
//                //Alumno reinscrito
                var n = text.includes("Alumno reinscrito");
                if (n) {
                    swalert('Mensaje!', 'Reinscripción exitosa!', 'success');
                    enrolToMoodle();
                    enrolStudent(idialumno, GrupoId);
                    formSuccess(idialumno, GrupoId);
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }
}

function enrolToMoodle() {
    var moodle = $('#moodle').val();
    var matricula = $('#matricula').val();
    var idialumno = $('#idialumno').val();
    var email = $('#email').val();
    var firstname = $('#nombre').val();
    var lastname = $('#apellido_paterno').val() + ' ' + $('#apellido_materno').val();
    if (moodle == 'si') {
        core_user_create_user_moodle(matricula, firstname, lastname, email, idialumno);
    }
}

function formSuccess(idialumno, GrupoId) {
    //var myWindow = window.open("credencialEstudiante.php?idialumno=" + idialumno, "", "width=600,height=600");
    //var myWindow2 = window.open("core_reporte_horario_escolar.php?GrupoId=" + GrupoId, "", "width=600,height=600");
    //window.open("credencialEstudiante.php?idialumno=" + idialumno, '_blank');
    //window.open("core_reporte_horario_escolar.php?GrupoId=" + GrupoId, '_blank');
    $("#FormReInscripcion")[0].reset();
    submitMSG(true, "Reinscripción exitosa!");
    //Redirect profile student
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=redirectToProfile&idialumno=" + idialumno,
        success: function (text) {
            console.log(text);
            var idigenerales = text.data[0].idigenerales;
            var idiarchivo = text.data[0].idiarchivo;
            location.href = 'updateAlumno.php?p=' + idigenerales + '&idialumno=' + idialumno + '&idiarchivo=' + idiarchivo;
        },
        error: function (jqXHR, textStatus, errorThrown) {
            location.href = "CxC2.php?idialumno=" + idialumno;
        }
    });

}

function formError() {
    $("#FormReInscripcion").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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