<?php include './headers.php'; ?>  
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="p-2 mr-auto">
                <div class="page-header-title">
                    <i class="<?php echo "$breadcrumb_icon $breadcrumb_icon_color"; ?>"></i>
                    <div class="d-inline">
                        <h4><?php echo $breadcrumb_descripcion; ?></h4>            
                        <label><?php echo $breadcrumb_resumen; ?></label><br>
                        <span><a href="<?php echo $breadcrumb_btnBack; ?>"><p class="pe-7s-back-2"></p> Regresar</a></span>
                    </div>
                </div>
            </div>
            <div class="page-header-breadcrumb">
                <div class="breadcrumb-title">
                    <span class="breadcrumb-item">
                        <a href="menu.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </span>
                    <span class="breadcrumb-item"><?php echo $breadcrumb_categoria; ?></span>
                    <span class="breadcrumb-item"><?php echo'<a href="' . $breadcrumb_permiso . '">' . $breadcrumb_descripcion . '</a>' ?>
                    </span>
                </div>
            </div> 
        </div>
        <hr>
        <div class="card card-border-primary">
            <div class="card-body">
                <!--form script for table cDocumentos--> 
                <form role="form" id="form_tbButtonPyament" data-toggle="validator" class="shake" autocomplete="off">
                    <input type="hidden" id="query_action" name="query_action" value="update">
                    <input type="hidden" id="idibutton" name="idibutton">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="cfos">Agregue un nuevo Botón de pago, llenando los campos que se solicitan</h4>
                            <hr>
                        </div>
                        <div class="col-sm-2">
                            <label for="idiservicio">Seleccione un servicio</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" id="openModal"class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalServicios">
                                        Servicios
                                    </button>
                                </div>
                                <input type="number" class="form-control" id="idiservicio" name="idiservicio" placeholder="Ingrese idiservicio" required readonly="true">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <input type="text" maxlength="255" class="form-control" id="description" name="description" placeholder="Ingrese description" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="comments">Comentarios</label>
                                <input type="text" maxlength="255" class="form-control" id="comments" name="comments" placeholder="Ingrese comments" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="button">Escriba el código HTML del Botón</label>
                                <input type="text"  class="form-control" id="button" name="button" placeholder="Ingrese button" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="button">Vista Previa del Botón</label>
                                <div id="vista-previa"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>

                    </div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Guardar</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>


            </div>
        </div>
    </div>
</div>

<!-- The Modal Materiales -->
<div class="modal" id="modalServicios">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Seleccione un servicio</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="loadTableServicios"></div>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        gettbButtonPyamentId();
    });
    function gettbButtonPyamentId() {
        var idibutton = "<?php print_r($_GET['idibutton']); ?>";
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=gettbButtonPyamentId&idibutton=" + idibutton,
            success: function (text) {
                var date = text.data[0];
                $('#idibutton').val(date.idibutton);
                $('#idiservicio').val(date.idiservicio);
                $('#button').val(date.button);
                $('#description').val(date.description);
                $('#comments').val(date.comments);
                $('#vista-previa').html(date.button);
            }
        });
    }
</script>

<script>
    $("#form_tbButtonPyament").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Llene los campos requeridos");
        } else {
            // everything looks good!
            event.preventDefault();
            addButtonPyament();
        }
    });

    function addButtonPyament() {
        var dataString = $('#form_tbButtonPyament').serialize();
        $.ajax({
            type: "POST",
            url: 'dataConect/API.php', // point to server-side PHP script 
            data: 'action=add_tbButtonPyament&' + dataString,
            success: function (text) {
                if (text == "success") {
                    location.reload();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }

    function formError() {
        $("#form_tbButtonPyament").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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
<script>
    $(document).ready(function () {
        getServicios();
        //$("#openModal").click();//simulamos clic para abrir modal alumnos
    });
    function getServicios() {
        $("#loadTableServicios").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/pagos.php",
            data: "action=getServiciosEscolares",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tableServicios" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>ID</th><th>Servicio</th><th>Precio</th><th>Vigente</th><th>Estatus</th><th>Fecha</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    txt += '<tr>';
                    txt += "<td>" + (a + 1) + ' <button class="btn btn-sm btn-success"><i class="pe-7s-like2"></i></button></td>';
                    txt += "<td>" + date[x].idiservicio + '</td>';
                    txt += "<td>" + date[x].descripcion + "</td>";
                    txt += "<td>" + date[x].precio + "</td>";
                    txt += "<td>" + date[x].activo + "</td>";
                    txt += "<td>" + date[x].estatus + "</td>";
                    txt += "<td>" + date[x].fecha + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("loadTableServicios").innerHTML = txt;
                var table = $('#tableServicios').DataTable({
                    responsive: true,
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Entradas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });

                $('#tableServicios tbody').on('click', 'tr', function () {
                    var datos = table.row(this).data();
                    $("#idiservicio").val(datos[1]);
                    $("#modalServicios .close").click();
                });
            }
        });
    }
</script>



