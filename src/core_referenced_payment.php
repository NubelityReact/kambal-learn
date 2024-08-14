<?php include './headers.php'; ?>
<br><br>
<!-- Container-fluid starts -->
<div class="container">
    <!-- Invoice card start -->
    <div class="card">
        <center><strong>Referencia de Pago</strong></center>
        <div class="card-block">
            <div class="row invoive-info">
                <div class="col-sm-2">
                    <h6 id="fullname"></h6>
                    Email: <span id="Email"></span><br>
                    Teléfono: <span id="Telefono"></span>
                </div>
                <div class="col-sm-3">                   
                    <h6>Estudiante</h6>
                    <span id="nombre"></span><br>
                    <span id="campus"></span><br>
                    <span id="matricula"></span>   <br>                
                    <span id="carrera"></span><br>
                    <span id="turno"></span>
                </div>
                <div class="col-sm-4">                      
                    <h6>Estos son los datos que necesitas</h6>
                    <table class="table table-responsive invoice-table invoice-order table-borderless">
                        <tbody>
                            <tr>
                                <th>Número de Cuenta : <span id="NoCuenta"></span></th>                                
                            </tr>
                            <tr>
                                <th>Clabe:  <span id="ClaveInterbancaria"></span></th>                              
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-3">
                    <h6 class="m-b-20">Paga en <span id="banco"></span></h6>
                    <h6 class="text-uppercase text-primary">Total : $
                        <span id="pagar"></span>
                    </h6>
                    <div id="code_bar_matricula"></div>
                    <span>(Para uso interno)</span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table  invoice-detail-table">
                            <thead>
                                <tr class="thead-default">
                                    <th>ID del Servicio</th>
                                    <th>Código del servicio</th>
                                    <th>Servicio</th>
                                    <th>Paga antes del</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="idiventa_as_servicio"></td>
                                    <td><div id="code_vas"></div></td>
                                    <td>
                                        <span id="comentario"></span>

                                    </td>
                                    <td id="fecha_limite"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="float-left"><?php echo $fechaYHoraDeImpresion = "Fecha y Hora de Impresión: " . date("Y/m/d h:i:sa"); ?></div>
            </div>
            <hr>
            <div class="row">
                <div class="d-flex">
                    <div id="PayPalBtn" class="float-right"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Invoice card end -->
    <div class="row text-center">

        <div class="col-sm-12 invoice-btn-group text-center">
            <button type="button" class="btn btn-danger waves-effect m-b-10 btn-sm waves-light" id="close-window">Cancelar</button>
            <button type="button" class="btn btn-primary btn-print-invoice m-b-10 btn-sm waves-effect waves-light m-r-20" id="print-window">Imprimir</button>
        </div>
    </div>
</div>
<!-- Container ends -->
<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        getPayPalButtonServices();
        getReferenced_payment();
        get_config_kambal();
        $("#print-window").click(function () {
            window.print();
        });
        $("#close-window").click(function () {
            window.close();   // Closes the new window
        });
        
    });
    function get_config_kambal() {
        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: "action=get_config_kambal",
            success: function (text) {
                var date = text.data[0];
                $('#fullname').html(date.fullname);
                $('#shortname').html(date.shortname);
                var image = "asset/images/logo/" + date.frontpageimage;
                $("#preview").append('<img src="' + image + '" alt="Smiley face" height="50px">');
                $("#banco").html(date.banco);
                $("#NoCuenta").html(date.NoCuenta);
                $("#ClaveInterbancaria").html(date.ClaveInterbancaria);
                $("#Telefono").html(date.Telefono);
                $("#Email").html(date.Email);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

    function getPayPalButtonServices() {
        var idiventa_as_servicio = "<?php echo $_GET['idiventa_as_servicio']; ?>";
        var idiservicio = "<?php echo $_GET['idiservicio']; ?>";
        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: "action=getPayPalButtonServices&idiservicio=" + idiservicio,
            success: function (text) {
                var paypal = text.data[0];//paypal_button
                $('#PayPalBtn').html('<h4>También puedes pagar con PayPal</h4> <label>Solo escribe tu </label>' + paypal.button);
                $("input:text").attr('readonly', true);
            }
        });
    }

    function getReferenced_payment() {
        var idialumno = "<?php echo $_GET['idialumno']; ?>";
        var idiventa_as_servicio = "<?php echo $_GET['idiventa_as_servicio']; ?>";
        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: "action=getReferenced_payment&idialumno=" + idialumno + "&idiventa_as_servicio=" + idiventa_as_servicio,
            success: function (text) {
                console.log(text);
                var re = 0;
                var pagar = 0;
                var json = text.data[0];
                var fecha_limite = json.fecha_limite;
                var current_day = "<?php echo date("Y-m-d"); ?>";
                if (current_day > fecha_limite) {
                    re = (parseInt(json.total) * parseInt(json.recargo)) / 100;
                    pagar = parseInt(re) + parseInt(json.total);
                } else {
                    pagar = json.total;
                }
                $('#turno').html('Modalidad: ' + json.turno + '<br> Beca: ' + json.beca_colegiatura + '%');
                $('#pagar').html(pagar);
                $('#comentario').html(json.comentario + ' - ' + json.periodo);
                $('#nombre').html('Nombre: ' + json.nombre + ' ' + json.apellido_paterno + ' ' + json.apellido_materno);
                $('#campus').html('CAMPUS: ' + json.campus);
                $('#matricula').html('Matricula: ' + json.matricula);
                $('#carrera').html('Oferta: ' + json.nivel + ' ' + json.carrera);
                $('#idiventa_as_servicio').html(json.idiventa_as_servicio);
                $('#fecha_limite').html(json.fecha_limite);
                $('#code_bar_matricula').html('<img src="codebar/codebar_img_tag.php?text=' + json.matricula + '" alt="Matricula escolar" class="m-b-10"><br>');
                $('#code_vas').html('<img src="codebar/codebar_img_tag.php?text=' + json.idiventa_as_servicio + '" alt="Codigo del servicio" class="m-b-10">');
                $("input:text").val(json.matricula);
                //$("input:text").val("Glenn Quagmire");
            }
        });
    }
</script>