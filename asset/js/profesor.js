$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Llene los campos requeridos");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm() {
    // Initiate Variables With Form Content
    var dataString = $('#contactForm').serialize();
    //alert('data '+dataString);
    $.ajax({
        type: "POST",
        url: "dataConect/API.php",
        data: "action=profesor&" + dataString,
        //data: dataString,
        success: function (text) {
            var date = text.data[0];
            if (date.estatus == "success") {
                formSuccess(date.idiprofesor);
                swalert('Exito!', "Profesor Agregado", 'success');
            } else {
                formError();
                submitMSG(false, text);
                swalert('Exito!', text, 'success');
            }
        }
    });
}

function formSuccess(idiprofesor) {
    $("#contactForm")[0].reset();
    location.href = "core_profesor_updateProfesor.php?idiprofesor=" + idiprofesor;
    submitMSG(true, "Registro almacenado!")
}

function formError() {
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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