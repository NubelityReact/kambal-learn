$("#forgot-password").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        swalert('Mensaje!', 'Llene los campos requeridos', 'warning');
        formError();
        smg(false, 'Llene los campos requeridos');
    } else {
        // everything looks good!
        event.preventDefault();
        forgot_password();
    }
});
function forgot_password() {
    var clave = $("#clave").val();
    var repeat = $("#repeat").val();
    var org = $("#org").val();
    if (clave === repeat) {
        var dataString = $('#forgot-password').serialize();
        swalert('Mensaje!', 'Procesando...', 'info');
        $.ajax({
            type: "POST",
            url: "dataConect/registration.php",
            data: "action=valid_token&" + dataString,
            success: function (text) {
                if (text == "success") {
                    $("#forgot-password")[0].reset();
                    swalert('Exito!', 'Su contraseña ha sido reestablecida correctamente', 'success');
                    location.href = "login.php?org=" + org;
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    } else {
        swalert('Mensaje!', 'Las Contraseñas deben coincidir', 'info');
    }

}
function formError() {
    $("#forgot-password").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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
