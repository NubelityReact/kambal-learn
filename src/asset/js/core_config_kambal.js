$("#config_kambal").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        swalert('Mensaje!', 'Llene los campos requeridos', 'info');
        formError();
        submitMSG(false, 'Llene los campos requeridos');
    } else {
        // everything looks good!
        event.preventDefault();
        config_kambal();
    }
});
function config_kambal() {
    var dataString = $('#config_kambal').serialize();
    swalert('Mensaje!', 'Procesando...', 'info');
    $.ajax({
        type: "POST",
        url: "dataConect/pagos.php",
        data: "action=config_kambal&" + dataString,
        success: function (text) {
            if (text == "success") {
                swalert('Exito!', 'Los datos fueron actualizados correctamente', 'success');
            } else {
                swalert('Mensaje!', text, 'info');
            }
        }
    });
}
function formError() {
    $("#config_kambal").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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

$(document).ready(function () {
    //$("#changeLogo").attr("disabled", true);
    get_config_kambal();
    getLogo();
});

//$('#file').on("change", function () {
//    $("#changeLogo").removeAttr("disabled");
//});

//$("#changeLogo").click(function () {
//    var extension = $('#file').val().split('.').pop().toLowerCase();
//    var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
//    if ($.inArray(extension, ['gif', 'png', 'jpg', 'jpeg', 'bmp']) == -1) {
//        swalert('Mensaje!', "Solo se permiten formatos : " + fileExtension.join(', '), 'warning');
//        return false;
//    } else {
//        swalert('Espere!', 'La imagen se esta actualizando', 'info');
//        var idiconfig = $('#idiconfig').val();
//        $.ajax({
//            type: "POST",
//            url: "dataConect/pagos.php",
//            data: "action=config_kambal_updatelogo&" + "frontpageimage=" +  +"&idiconfig=" + idiconfig,
//            success: function (text) {
//                if (text == "success") {
//                    swalert('Exito!', 'Los datos fueron actualizados correctamente', 'success');
//                } else {
//                    swalert('Mensaje!', text, 'info');
//                }
//            }
//        });
//    }
//
//});

function get_config_kambal() {
    $.ajax({
        type: "GET",
        url: "dataConect/pagos.php",
        data: "action=get_config_kambal",
        success: function (text) {
            var date = text.data[0];
            console.log({ text })
            //console.log(date);
            $("#idiconfig").val(date.idiconfig);
            $("#idifactura").val(date.idifactura);
            $("#fullname").val(date.fullname);
            $("#shortname").val(date.shortname);
            $("#summary").val(date.summary);
            //var image = "asset/images/logo/" + date.frontpageimage;
            //$("#preview").append('<img src="' + image + '" alt="Smiley face" height="50px">');
            $("#country").val(date.country);
            $("#defaultcity").val(date.defaultcity);
            $("#rfc").val(date.rfc);
            $("#persona").val(date.persona);
            $("#banco").val(date.banco);
            $("#NoCuenta").val(date.NoCuenta);
            $("#ClaveInterbancaria").val(date.ClaveInterbancaria);
            $("#Telefono").val(date.Telefono);
            $("#Calle").val(date.Calle);
            $("#NoExterior").val(date.NoExterior);
            $("#NoInterior").val(date.NoInterior);
            $("#Colonia").val(date.Colonia);
            $("#Localidad").val(date.Localidad);
            $("#Referencia").val(date.Referencia);
            $("#Municipio").val(date.Municipio);
            $("#estado").val(date.estado);
            $("#cp").val(date.cp);
            $("#Email").val(date.Email);
            $("#website").val(date.website);
            $("#lms_token").val(date.lms_token);
            $("#lms_domainname").val(date.lms_domainname);
            $("#clave_instituto").val(date.clave_instituto);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}

function getLogo() {
    $("#imageUser").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/registration.php",
        data: "action=getlogokambal",
        success: function (text) {
            console.log({ img: text })
            $("#preview").html(text);
        },
        error: function (err) {
            console.log({ err })
        }
    });
}

document.getElementById("upl").onchange = function (e) {
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();
    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);
    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function () {
        let preview = document.getElementById('preview'),
            image = document.createElement('img');
        console.log({ preview, image })
        image.src = reader.result;
        preview.innerHTML = '';
        preview.append(image);
    };
}