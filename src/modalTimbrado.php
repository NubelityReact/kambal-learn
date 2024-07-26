<div class="modal fade" data-backdrop="static" data-keyboard="false"  id="datosTimbrado" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Información para la factura CFDI</h4><br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="formFactura" data-toggle="validator" class="shake" autocomplete="off">
                    <div class="row">
                        <div class="col">
                            <label id="ticketTitulo"></label>
                        </div>
                        <div class="col">
                            <label id="ventaTitulo"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label>Matricula</label>
                            <input class="form-control form-control-sm" type="text" id="clientefact" name="clientefact" disabled>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>R.F.C.</label>
                            <input class="form-control form-control-sm" type="text" name="rfc" value="" id="rfcfact" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label>Nombre</label>
                            <textarea class="form-control max-textarea" maxlength="80" rows="3" id="nombrefact" name="nombrefact"></textarea>

                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>Email(s)</label>
                            <input class="form-control form-control-sm" type="email" name="emailfact" value="" id="emailfact" required style="margin-bottom:5px">
                            <input class="form-control form-control-sm" type="email" name="email2fact" value="" id="email2fact" placeholder="email alterno">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label>Método de pago:</label>
                            <select name="metodopagofact" id="metodopagofact" class="form-control form-control-sm">
                                <option value="PUE">Pago en una sola exhibición</option>
                                <option value="PPD">Pago en parcialidades o diferido</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>Forma de pago</label>
                            <select name="formaPago" id="formaPago" class="form-control form-control-sm">
                                <option value="01">Efectivo</option>
                                <option value="03">Transferencia electrónica de fondos</option>
                                <option value="04">Tarjeta de Crédito</option>
                                <option value="28">Tarjeta de Débito</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <label>Uso CFDI</label>
                            <select name="usoCfdi" id="usoCfdi" class="form-control form-control-sm">
                                <option value="D10">Pagos por servicios educativos (colegiaturas)</option>
                                <option value="G03">Gastos en General</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>Digitos de cuenta</label>
                            <input type="text" class="form-control form-control-sm" id="cuentafact" placeholder="opcional">
                        </div>
                    </div><hr>
                    <button type="button" class="btn btn-default waves-effect pull-right" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="form-submit" class="btn btn-success pull-right ">Facturar</button>
                    <input type="hidden" name="venta" id="venta" value="" />
                    <input type="hidden" name="idiventas" id="idiventas" value="" />
                    <input type="hidden" name="ticket" id="ticket" value="" />
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>
            </div>

        </div>

    </div>
</div>
<!--</div>-->

<div class="modal fade" data-backdrop="static" data-keyboard="false"  id="documento" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Opciones de la Factura <i id="numberFacto"></i></h4><br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-outline-info facturas btn-sm" id="xml" factura="" serie="">
                            Descargar XML <i class="fas fa-code"></i>
                        </button>
                    </div>
                    <div class="col">
                        <button class="btn btn-outline-info facturas btn-sm" id="pdf" factura="" serie="">
                            Descargar PDF <i class="fas fa-file-pdf"></i>
                        </button>
                    </div>
                    <div class="col">
                        <button class="btn btn-outline-info facturas btn-sm" id="mail" factura="" serie="" href="#demo" data-toggle="collapse">
                            Enviar por Email <i class="pe-7s-mail-open-file"></i>
                        </button>
                    </div>
                </div>        
                <div id="demo" class="collapse" class="row">
                    <hr>
                    <form role="form" id="mailForm" data-toggle="validator" class="shake">
                        <div class="col-sm-12">
                            <label for="to">Para: </label>
                            <div class="form-group input-group">
                                <input type="email" class="form-control" id="to" name="to" placeholder="Correo de destino" required>
                                <input type="hidden" class="form-control" id="factura" name="factura" placeholder="Correo de destino" required>
                                 <button type="submit" id="form-submit" class="btn btn-outline-success pull-right ">Enviar por Email <i class="fas fa-envelope-open-text"></i></button>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div id="msgSubmitMail" class="h3 text-center hidden"></div>
                        <div class="clearfixMail"></div>
                    </form>
                </div>
            </div>                
        </div>
    </div>
</div>
</div>


<script>
    $("#formFactura").validator().on("submit", function (event) {
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

    $(document).on("click", ".facturas", function () {
        var ctipo = $(this).attr("id");
        var serie = $(this).attr("serie");
        var folio = $(this).attr("factura");
        if (ctipo == 'mail')
        {
            //Envio de email
        } else {
            window.open('mostrarFactura.php?serie=' + serie + '&folio=' + folio + '&tipo=' + ctipo);
        }

    });

    function submitForm() {
        //$('#datosTimbrado').hide();
        $("#datosTimbrado .close").click()
        var dataString = $('#formFactura').serialize();
        console.log(dataString);
        var idiventa = $('#idiventas').val();
        console.log(idiventa);
        // Initiate Variables With Form Content
        swal({
            title: '¿Seguro que desea facturar el ticket?',
            text: '',
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Facturar Venta!',
            cancelButtonText: 'Cancelar'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "emiteFactura.php",
                    data: dataString,
                    dataType: "json",
                    success: function (text) {
                        var date = text;
                        console.log(text);
                        if (date.success) {
                            var factura = date.serie + date.folio;
                            $(".facturas").attr("factura", date.folio);
                            $(".facturas").attr("serie", date.serie);
                            $("#documento").modal("show");
                            $(this).attr("disabled", true);
                            //setEstatusFactura(venta);
                            $.ajax({
                                type: "POST",
                                url: "dataConect/pagos.php",
                                data: "action=setEstatusFactura&idiventa=" + idiventa + "&folio_facturado=" + date.folio,
                                success: function (text) {
                                    console.log(text);
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                }
                            });
                            PagosLiquidados();//recarga la tabla
                        } else {
                            var error = date.error;
                            swal({
                                title: 'Mensaje!',
                                text: error,
                                type: 'info'
                            })
                        }
                    }
                });
            } else {
                $("#datosTimbrado").modal("show");
            }
        });
    }

    function formSuccess() {
        $("#formFactura")[0].reset();
        submitMSG(true, "Message Submitted!")
    }

    function formError() {
        $("#formFactura").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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


</script>

<script type="text/javascript" src="asset/js/modalTimbrado.js"></script>