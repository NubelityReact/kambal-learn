function tarar(idialumno) {
    $.ajax({
        type: "POST",
        url: "dataConect/pagos.php",
        data: "action=tarar&idialumno=" + idialumno,
        success: function (text) {
            console.log(text);
        }
    });
}