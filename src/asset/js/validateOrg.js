$("#validateOrg").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        swalert('Mensaje!', 'Llene los campos requeridos', 'warning');
        formError();
        smg(false, 'Llene los campos requeridos');
    } else {
        // everything looks good!
        event.preventDefault();
        validateIn();
    }
});
function validateIn() {
    var dataString = $('#validateOrg').serialize();
    swalert('Mensaje!', 'Procesando...', 'info');
    $.ajax({
        type: "POST",
        url: "dataConect/registration.php",
        data: "action=forgotPassword&" + dataString,
        success: function (text) {
            if (text == "success") {
                $("#validateOrg")[0].reset();
                swalert('Exito!', 'Si proporcionó una dirección de correo electrónico correctos, entonces se le debería haber enviado un correo electrónico. Contiene instrucciones sencillas para confirmar y completar este cambio de contraseña. Si continúa teniendo dificultades, comuníquese con el administrador del sitio.', 'success');
            } else {
                swalert('Mensaje!', text, 'info');
            }
        }
    });
}
function formError() {
    $("#validateOrg").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass();
    });
}
function smg(valid, msg) {
    if (valid) {
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msg").removeClass().addClass(msgClasses).text(msg);
}