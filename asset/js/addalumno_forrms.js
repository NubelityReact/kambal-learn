$("#FormInscrpcion").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Llene los campos obligatorios");
        swalert('Mensaje!', "Llene los campos obligatorios", 'warning')
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});

function submitForm() {
    var dataString = $('#FormInscrpcion').serialize();
    var txt;
    var r = confirm("Está seguro de inscribir a este alumno?");
    if (r) {
        swalert('Espere!', 'Procesando...', 'info');
        var idigenerales = $("#idigenerales").val();
        var idialumno = $("#idialumno").val();
        var GrupoId = $("#GrupoId").val();
        $("#spinner-form").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=addAlumno&" + dataString,
            success: function (text) {
                console.log(text);
                var idialumno = text.data[0].idialumno;
                var matricula = text.data[0].matricula;
                if (isNaN(idialumno)) {
                    formError();
                    submitMSG(false, text);
                } else {
                    restore_password(idigenerales);
                    enrolToMoodle(idialumno, matricula);
                    enrolStudent(idialumno, GrupoId);
                    formSuccess(idialumno, GrupoId);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                $("#spinner-form").html(jqXHR + " " + textStatus + " " + errorThrown);
            }
        });
    } else {
        txt = "You pressed Cancel!";
    }
    //alert(txt);
}

function restore_password(idigenerales) {
    $.ajax({
        type: "POST",
        url: "dataConect/API.php",
        data: "action=restore_password&idigenerales=" + idigenerales+"&new_password=123456789",
        success: function (text) {
            alert('restore_password');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('error');
        }
    });
}


function enrolToMoodle(idialumno, matricula) {
    var moodle = $('#moodle').val();
    if (moodle == 'si') {
        var email = $('#email').val();
        var firstname = $('#nombre').val();
        var lastname = $('#apellido_paterno').val() + ' ' + $('#apellido_materno').val();
        core_user_create_user_moodle(matricula, firstname, lastname, email, idialumno);
    }
}

function formSuccess(idialumno, GrupoId) {
    $("#FormInscrpcion")[0].reset();
    ConsultaSolpesJson();//recargamos la tabla datos generales
    document.getElementById('results').innerHTML = 'La imagen capturada aparecerá aquí ... <br> Recuerde habilitar el permiso para usar la Camara';
    submitMSG(true, "");
    //Redirect profile student
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=redirectToProfile&idialumno=" + idialumno,
        success: function (text) {
            var idigenerales = text.data[0].idigenerales;
            location.href = 'updateAlumno.php?p=' + idigenerales + '&idialumno=' + idialumno;
        },
        error: function (jqXHR, textStatus, errorThrown) {
            location.href = "CxC2.php?idialumno=" + idialumno;
        }
    });
    $("#spinner-form").html('');
}

function formError() {
    $("#FormInscrpcion").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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
