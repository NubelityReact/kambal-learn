
<!-- Contact Menu Start -->
<div class="col-md-12 col-xl-12">
    <div class="card card-border-warning">
        <div class="card-header bg-white cfos"> <h4 class="float-right">Información Escolar</h4></div>
        <div class="card-block user-detail-card">
            <input type="hidden" id="myMatricula">
            <input type="hidden" id="myidmoodle">
            <div class="row">
                <div class="col-sm-12 user-detail">
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-school-bag"></i>Acceso al Campus virtural :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30" id="url_lms"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-graduate-alt"></i>Campus :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30" id="campus"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-graduate-alt"></i>Oferta :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30" id="escolar_carrera"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-id"></i>Matrícula</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30" id="escolar_matricula"> </h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-calendar"></i>Generación</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30" id="escolar_generacion"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-atom"></i>Grado actual :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30" id="escolar_cuatrimestre"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-paper"></i>Grados transcurridos :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30" id="escolar_cautrimestres_trans">{{data.edad}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-school-bag"></i>Turno :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30" id="escolar_turno"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-bar-code"></i>Código de la credencial :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30" id="escolar_codigo"></h6>
                            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#Editar_escolar_codigo"><i class="pe-7s-note pe-2x pe-va"></i> Editar Número de la credencial</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-clip-board"></i>Vigencia de la credencial :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30" id="escolar_vigencia"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-electron"></i></i>Estatus del Campus Virtual:</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30" id="idimoodle"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-clip-board"></i>Estatus del alumno :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30" id="escolar_estatus"></h6>
                            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalEditEstatus"><i class="pe-7s-note pe-2x pe-va"></i> Editar estatus</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-lock"></i>Cambiar Contraseña</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal_newPassword">
                                    Abrir
                                </button>
                            </h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-businessman"></i>Beca en colegiatura</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30" id="beca_colegiatura"></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="modalEditEstatus">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar Estatus</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="estatus">Situación</label>
                    <select class="form-control" class="form-control" id="estatus" name="estatus">
                        <option value="Activo">Seleccione uno</option>
                        <option value="Activo">Activo</option>
                        <option value="Egresado">Egresado</option>
                        <option value="Baja Definitiva">Baja Definitiva</option>
                        <option value="Baja Temporal">Baja Temporal</option>
                        <option value="Bloqueado">Bloqueado</option>
                        <option value="No Reinscrito">No Inscrito</option>
                    </select>
                    <div class="help-block with-errors text-danger"></div>
                </div>
                <button type="button" id="guardarEstatus" class="btn btn-success pull-right ">Guardar estatus</button>
            </div>
        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="Editar_escolar_codigo">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar Código de la credencial</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="estatus"># Credencial</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="iSiteCode" name="iSiteCode" title="Ingrese iSiteCode" placeholder="Ingrese el iSiteCode">
                        <input type="text" class="form-control" id="scodigo_credencial" name="scodigo_credencial" title="Ingrese el número de la credencia" placeholder="Ingrese el número de la credencia">
                    </div>
                    <div class="help-block with-errors text-danger"></div>
                </div>
                <button type="button" id="guardarCodigo" class="btn btn-success pull-right ">Guardar código</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_newPassword">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cambio de Contraseña</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="Nueva contraseña">La contraseña debería tener al menos 4 caracter(es)</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="new_password" name="new_password" title="Ingrese Nueva contraseña" placeholder="Ingrese Nueva contraseña">
                    </div>
                    <div class="help-block with-errors text-danger"></div>
                </div>
                <button type="button" id="btn_new_password" class="btn btn-success pull-right ">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var idialumnos = <?php echo $_GET['idialumno']; ?>;
        getCardAlumnoByID();
    });
    function getCardAlumnoByID() {
        var idialumnos = <?php echo $_GET['idialumno']; ?>;
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcardAlumnoById&idialumno=" + idialumnos,
            success: function (text) {
                var date = text.data;
                $("#campus").html(date[0].campus);
                $("#escolar_carrera").html(date[0].carrera);
                $("#escolar_matricula").html(date[0].matricula);
                $("#myMatricula").val(date[0].matricula);
                $("#escolar_generacion").html(date[0].generacion);
                $("#escolar_cuatrimestre").html(date[0].cuatrimestre);
                $("#escolar_cautrimestres_trans").html(date[0].cuatrimestres_trasncurridos);
                $("#escolar_turno").html(date[0].turno);
                $("#escolar_codigo").html(date[0].codigo_credencial);
                $("#escolar_vigencia").html(date[0].vigencia);
                $("#escolar_estatus").html(date[0].estatus);
                $("#escolar_detalle").html(date[0].bloqueo);
                if (date[0].idimoodle == null) {
                    $("#idimoodle").html('Este alumno no se encuentra inscrito en el  campus virtual ' + '<i class="icofont icofont-warning"></i>');
                    $("#idimoodle").append('<br><button type="button" class="btn btn-outline-success btn-sm" onclick="crear_user_moodle()"><i class="icofont icofont-verification-check"></i></i>Desea inscribirlo en el Campus Virtual?</button>');
                } else {
                    $("#idimoodle").html('ID LMS ' + date[0].idimoodle);
                    $("#idimoodle").append('<br><label>Este alumno ya esta registrado en el LMS</label>' + ' <i class="pe-x2 icofont icofont-tick-boxed"></i>');
                    $('#myidmoodle').val(date[0].idimoodle);
                    var url_lms = '<a href="<?php echo "$lms_domainname"; ?>user/profile.php?id=' + date[0].idimoodle + '" target="_blank"><?php echo "$lms_domainname"; ?>user/profile.php?id=' + date[0].idimoodle + '</a>';
                    $('#url_lms').html(url_lms);
                }


                // 
                $("#beca_colegiatura").html('<span class="badge badge-success text-light">' + date[0].beca_colegiatura + ' % de beca</span>');
                $("#subcabecera").html('<span class="text-primary"><strong>Campus</strong> ' + date[0].campus + '</span> <strong>Carrera: </strong>' + date[0].carrera + " <strong>Matrícula:</strong> " + date[0].matricula + " <strong>Turno:</strong> " + date[0].turno + " <strong>Estatus:</strong> " + date[0].estatus + ' <strong>GDO: </strong>' + date[0].cuatrimestre + '° <span class="badge badge-success text-light">' + date[0].beca_colegiatura + ' % de beca</span>');

                //swalert(date[0].doc_nacimiento_copia);
                if (date[0].doc_nacimiento == 'Si') {
                    $("#doc_nacimiento").prop('checked', true);
                }
                if (date[0].doc_nacimiento_copia == 'Si') {
                    $("#doc_nacimiento_copia").prop('checked', true);
                }
                if (date[0].doc_certificado == 'Si') {
                    $("#doc_certificado").prop('checked', true);
                }
                if (date[0].doc_certificado_copia == 'Si') {
                    $("#doc_certificado_copia").prop('checked', true);
                }
                if (date[0].doc_curp == 'Si') {
                    $("#doc_curp").prop('checked', true);
                }
                if (date[0].doc_curp_copia == 'Si') {
                    $("#doc_curp_copia").prop('checked', true);
                }
                if (date[0].doc_ine == 'Si') {
                    $("#doc_ine").prop('checked', true);
                }
                if (date[0].doc_ine_copia == 'Si') {
                    $("#doc_ine_copia").prop('checked', true);
                }
                if (date[0].doc_fotos == 'Si') {
                    $("#doc_fotos").prop('checked', true);
                }
                if (date[0].doc_comprobante == 'Si') {
                    $("#doc_comprobante").prop('checked', true);
                }
                if (date[0].doc_comprobante_copia == 'Si') {
                    $("#doc_comprobante_copia").prop('checked', true);
                }
                //$("#poo").prop('checked', true);

                //$("#infoAlumno").html('<strong>Alumno:</strong> ' + datos[1] + " " + datos[2] + " " + datos[3] + ' <strong>Matrícula: </strong>' + datos[5] + ' <strong>Carrera: </strong>' + datos[4] + ' <strong>Folio: ' + folio + '</strong>');

            },
            error: function (jqXHR, textStatus, errorThrown) {
                //console.log(jqXHR);
                //console.log(textStatus);
                //console.log(errorThrown);
                //alert("No fue posible conectar con el servidor");
                //document.getElementById("loadTableClient").innerHTML = errorThrown;
            }
        });
    }
</script>
<script>
    $("#guardarEstatus").click(function () {
        var idialumnos = <?php echo $_GET['idialumno']; ?>;
        var estatus = $("#estatus").val();
        var errorMSG = "";
        if (typeof estatus === "undefined" || estatus == "") {
            errorMSG += "estatus es required ";
        }
        if (errorMSG == "") {
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=updateEstatusByIdiAlumno&idialumno=" + idialumnos + "&estatus=" + estatus,
                success: function (text) {
                    swalert('Mensaje!', text, 'info');
                    getCardAlumnoByID(idialumnos);
                }
            });
        } else {
            if (errorMSG == "") {
                //echo "Something went wrong :(";
                swalert('Mensaje!', 'Something went wrong :(', 'warning');
            } else {
                //echo $errorMSG;
                swalert('Error!', errorMSG, 'error');
            }
        }
    });
</script>

<script>
    $("#guardarCodigo").click(function () {
        var idialumnos = <?php echo $_GET['idialumno']; ?>;
        var codigo = $("#scodigo_credencial").val();
        var iSiteCode = $("#iSiteCode").val();
        var errorMSG = "";
        if (typeof codigo === "undefined" || codigo == "") {
            errorMSG += "estatus es required ";
        }
        if (errorMSG == "") {
            //alert(codigo);
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=updateCodigoCredencialByIdiAlumno&idialumno=" + idialumnos + "&codigo_credencial=" + codigo + "&iSiteCode=" + iSiteCode,
                success: function (text) {
                    swalert('Mensaje!', text, 'info');
                    getCardAlumnoByID(idialumnos);
                }
            });
        } else {
            if (errorMSG == "") {
                //echo "Something went wrong :(";
                swalert('Mensaje!', 'Something went wrong :(', 'warning');
            } else {
                //echo $errorMSG;
                swalert('Error!', errorMSG, 'error');
            }
        }
    });
</script>

