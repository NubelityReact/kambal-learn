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
        <div class="card card-border-warning">
            <div class="card-body">
                <a href="core_carrera_create.php" class="btn btn-success float-right btn-sm"><i class="<?php echo "$breadcrumb_icon"; ?>"></i>  Nuevo registro</a>
                <br><br>
                <div id="tableCarreras"></div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="modalCarreras">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"> <i class="<?php echo "$breadcrumb_icon"; ?>"></i>  <?php echo $breadcrumb_descripcion; ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" id="formCarrera" data-toggle="validator" class="shake" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="categoria" name="categoria" placeholder="Enter categoria" required>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Agregue una nueva Vacante a su organización, llenando los campos que se solcitan</h5><br>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="idicampus">Seleccione una Zona o Sucursal</label>
                                <div class="divCampus"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="NivelId">Perfil</label>
                                <div class="divNivel">
                                    <select class="form-control">
                                        <option value="">Seleccione uno</option>
                                    </select>
                                </div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nombre">Nombre de la Vacante</label>
                                <input type="text" class="form-control" maxlength="150" id="nombre" name="nombre" placeholder="Enter nombre" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="available">Disponibilidad <br>(Numero de vacantes disponibles)</label>
                                <input type="number" class="form-control" id="available" name="available" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="deadline">Fecha limite <br>(Cubrir vacantes)</label>
                                <input type="date" class="form-control" id="deadline" name="deadline" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="rvoe">Imagen <br>opcional</label>
                                <input type="file" class="form-control" id="rvoe" name="rvoe" accept="image/*">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Guardar datos</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>   
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalAupdateCarreras">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"> <i class="<?php echo "$breadcrumb_icon"; ?>"></i>  <?php echo $breadcrumb_descripcion; ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" id="formUpdateCarrera" data-toggle="validator" class="shake" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="categoria" name="categoria" placeholder="Enter categoria" required>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Actualice los datos de la vacante, llenando los campos que se solcitan</h5><br>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="idicampus">Seleccione una Zona o Sucursal</label>
                                <div class="divCampus"></div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="NivelId">Perfil</label>
                                <div class="divNivel">
                                    <select class="form-control">
                                        <option value="">Seleccione uno</option>
                                    </select>
                                </div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nombre">Nombre de la Vacante</label>
                                <input type="text" class="form-control nombre" maxlength="150" id="nombre" name="nombre" placeholder="Enter nombre" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="available">Disponibilidad <br>(Numero de vacantes disponibles)</label>
                                <input type="number" class="form-control available" id="available" name="available" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="deadline">Fecha limite <br>(Cubrir vacantes)</label>
                                <input type="date" class="form-control deadline" id="deadline" name="deadline" required>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="rvoe">Imagen <br>opcional</label>
                                <input type="file" class="form-control" id="rvoe" name="rvoe" accept="image/*">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Guardar datos</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>   
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>

<script>
    $(document).ready(function () {
        getCarreras();
        getCampus();
    });
    function getCarreras() {
        $("#tableCarreras").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getAllCarreras",
            success: function (text) {
                var date = text.data;
                var txt = "";
                var estatus;
                txt += '<div class="table-responsive"> <table id="Carreras" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Acciones</th><th>Campus</th><th>Nivel</th><th>Oferta</th><th>Duración</th><th>Costo</th><th>Estatus</th><th>disponibilidad</th><th>Fecha Limite</th><th>Última actualización</th><th>Imagen</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    estatus = date[x].suspended;
                    var idicarrera = date[x].idicarrera;
                    var suspended = date[x].suspended;
                    var deleted = date[x].deleted;
                    var btn_update = '<a href= "core_carrera_update.php?idicarrera=' + idicarrera + '" type="button" class="btn btn-sm">Editar <i class="fa fa-pen-square"></i></a>';
                    var btn_delete = '<button type="button" class="btn btn-danger btn-sm" onclick="delete_carrera(' + idicarrera + ')">Eliminar <i class="fa fa-trash"></i></button>';
                    var btn_suspended = '<button type="button" class="btn btn-warning btn-sm" onclick="suspended_carrera(' + idicarrera + ',1)">Suspender <i class="fa fa-ban"></i></button>';
                    var btn_actived = '<button type="button" class="btn btn-success btn-sm" onclick="suspended_carrera(' + idicarrera + ',0)">Activar <i class="fa fa-check-circle"></i></button>';
                    if (estatus == 0) {
                        estatus = '<td class="table-success">Activo</td>';
                    } else {
                        estatus = '<td class="table-danger">Inactivo</td>';
                    }
                    txt += '<tr>';
                    txt += "<td>" + (a + 1) + "</td>";
                    txt += '<td>';
                    txt += '<div class="btn-group" id="btns_actions">';
                    if (suspended == 0) {
                        txt += btn_update;
                        txt += btn_suspended;
                        txt += btn_delete;
                    } else {
                        //txt += btn_update;
                        txt += btn_actived;
                        txt += btn_delete;
                    }
                    txt += '</div>';
                    txt += '</td>';
                    txt += "<td>" + date[x].campus + "</td>";
                    txt += "<td>" + date[x].perfil + "</td>";
                    txt += "<td>" + date[x].nombre + "</td>";
                    txt += "<td>" + date[x].working_day + "</td>";
                    txt += "<td>" + date[x].salary + "</td>";
                    txt += estatus;
                    txt += "<td>" + date[x].available + "</td>";
                    txt += "<td>" + date[x].deadline + "</td>";
                    txt += "<td>" + date[x].last_update + "</td>";
                    txt += '<td><center><img src="asset/images/izzi/' + date[x].rvoe + '" class="rounded" alt="Cinque Terre" width="10%"></center></td>';
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("tableCarreras").innerHTML = txt;
                var table = $('#Carreras').DataTable({
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

                $('#Carreras tbody').on('click', 'tr', function () {
                    var datos = table.row(this).data();
                    $(".categoria").val(datos[2]);
                    $(".nombre").val(datos[3]);
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("tableCarreras").innerHTML = '0 results';
            }
        });
    }

    function delete_carrera(idicarrera) {
        var r = confirm("Desea Eliminar esta Vacante?");
        if (r) {
            swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=delete_carrera&idicarrera=" + idicarrera,
                success: function (text) {
                    if (text == "success") {
                        swalert('Mensaje!', 'La Vacante se eliminó correctamente', 'success');
                        getCarreras();
                    } else {
                        swalert('Mensaje!', text, 'info');
                    }
                }
            });
        }
    }

    function suspended_carrera(idicarrera, suspended) {
        swalert('Mensaje!', 'Procesando...', 'info');
        $.ajax({
            type: "POST",
            url: "dataConect/API.php",
            data: "action=suspended_carrera&idicarrera=" + idicarrera + '&suspended=' + suspended,
            success: function (text) {
                if (text == "success") {
                    getCarreras();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }

</script>

<script>
    $(document).on("click", ".fillNivelId", function () {
        var categoria = $(this).attr("rc"); //leemos la propiedad folio del bootn con la clase .docs
        $('#categoria').val(categoria);
    })

    function getCampus() {
        $(".divCampus").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCampus",
            success: function (text) {
                //console.log(text);
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill idicampus" id="idicampus" name="idicampus" required onchange="getNivel()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idicampus + '">' + date[x].campus + '</option>';
                }
                txt += "</select>";
                $(".divCampus").html(txt);
            }
        });
    }

    function getNivel() {
        var idicampus = $("#idicampus").val();
        $(".divNivel").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getNivelbyCampus&idicampus=" + idicampus,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fillNivelId NivelId" id="NivelId" name="NivelId" onchange="fillNivelId()" required>';
                if (text == "0 results") {
                    txt += '<option value="">0 resultados</option>';
                } else {
                    txt += '<option value="">Seleccione</option>';
                    for (x in date) {
                        txt += '<option value="' + date[x].NivelId + '" rc="' + date[x].Descripcion + '" >' + date[x].Descripcion + '</option>';
                    }
                }
                txt += "</select>";
                $(".divNivel").html(txt);
            }
        });
    }

    function fillNivelId() {
        var NivelId = $('#NivelId').val();
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getNivelbyId&NivelId=" + NivelId,
            success: function (text) {
                //console.log(text);
                var date = text.data[0];
                console.log(text.data[0].Descripcion);
                $("#categoria").val(text.data[0].Descripcion);
            }
        });
    }


</script>
<script>
    $("#formCarrera").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Llene los campos requeridos");
        } else {
            // everything looks good!
            event.preventDefault();
            newDocument();
        }
    });

    function newDocument() {
        swalert('Mensaje', "Procesando...", 'info');
        var idicampus = $("#idicampus").val();
        var NivelId = $("#NivelId").val();
        var nombre = $("#nombre").val();
        var available = $("#available").val();
        var deadline = $("#deadline").val();
        var categoria = $("#categoria").val();
        var rvoe = $('#rvoe').prop('files')[0];
        var form_data = new FormData();
        form_data.append('rvoe', rvoe);
        form_data.append('action', 'addCarrera');
        form_data.append('idicampus', idicampus);
        form_data.append('NivelId', NivelId);
        form_data.append('nombre', nombre);
        form_data.append('available', available);
        form_data.append('deadline', deadline);
        form_data.append('categoria', categoria);

        $.ajax({
            url: 'dataConect/API.php', // point to server-side PHP script 
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (text) {
                if (text == "success") {
                    swalert("Exito!", 'La vacante se agrego correctamente', 'success');
                    getCarreras();
                    $("#formCarrera")[0].reset();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }

    function formError() {
        $("#formCarrera").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
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

