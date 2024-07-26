<!-- Contact Menu Start -->
<div class="col-md-12 col-xl-12">
    <div class="card card-border-warning">
        <div class="card-header bg-white cfos"> <h4 class="float-right">Información Escolar</h4></div>
        <div class="card-block user-detail-card">
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
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-graduate-alt"></i>Carrera :</h6>
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
                            <h6 class="m-b-30" id="escolar_matricula"></h6>
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
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-atom"></i>Cuatrimestre actual :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30" id="escolar_cuatrimestre"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-paper"></i>Cuatrimestres transcurridos :</h6>
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
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-clip-board"></i>Estatus del alumno :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30" id="escolar_estatus"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-lock"></i>Detalle del estatus</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30" id="escolar_detalle"></h6>
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
<script>
    $(document).ready(function () {
        var idialumnos = <?php echo $idialumno; ?>;
        getCardAlumnoByID(idialumnos);
    });
    function getCardAlumnoByID(idialumnos) {
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcardAlumnoById&idialumno=" + idialumnos,
            success: function (text) {
                console.log(text);
                console.log(text.data);
                var date = text.data;
                //alert(datos[0]);
                $("#escolar_carrera").html(date[0].carrera);
                $("#escolar_matricula").html(date[0].matricula);
                $("#escolar_generacion").html(date[0].generacion);
                $("#escolar_cuatrimestre").html(date[0].cuatrimestre);
                $("#escolar_cautrimestres_trans").html(date[0].cuatrimestres_trasncurridos);
                $("#escolar_turno").html(date[0].turno);
                $("#escolar_codigo").html(date[0].codigo_credencial);
                $("#escolar_vigencia").html(date[0].vigencia);
                $("#escolar_estatus").html(date[0].estatus);
                $("#escolar_detalle").html(date[0].bloqueo);
                $("#beca_colegiatura").html('<span class="badge badge-success text-light">' + date[0].beca_colegiatura + ' % de beca</span>');
                $("#subcabecera").html('<span></span> <span class="text-primary"><strong>Campus</strong> ' + date[0].campus + '</span> <strong>Carrera: </strong>' + date[0].carrera + " <strong>Matrícula:</strong> " + date[0].matricula + " <strong>Turno:</strong> " + date[0].turno + " <strong>Estatus:</strong> " + date[0].estatus + ' <strong>GDO: </strong>' + date[0].cuatrimestre + '° <span class="badge badge-success text-light">' + date[0].beca_colegiatura + ' % de beca</span>');

                var url_lms = '<a href="<?php echo "$lms_domainname"; ?>user/profile.php?id=' + date[0].idimoodle + '" target="_blank"><?php echo "$lms_domainname"; ?>user/profile.php?id=' + date[0].idimoodle + '</a>';
                $('#url_lms').html(url_lms);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                //alert("No fue posible conectar con el servidor");
                //document.getElementById("loadTableClient").innerHTML = errorThrown;
            }
        });
    }
</script>
