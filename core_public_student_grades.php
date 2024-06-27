<div class="row">
    <div class="col-12">
        <div class="card card-border-success">
            <div class="card-body">
                <div class="d-flex mb-3">
                    <div class="col-3">
                        <div class="page-header-title">
                            <i class="icofont icofont-graduate-alt bg-c-yellow"></i>
                            <div class="d-inline">
                                <h4>Historial Académico</h4>
<!--                                <a href="#"><span><p class="pe-7s-back-2"></p> Regresar</span></a>-->
                                <span class="subcabecera"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="Grado">Ciclos Cursados</label>
                            <div id="divCiclo"></div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="nivelegreso"></label><br>
                            <div class="btn-group">
                                <button id="btnBuscar" class="btn btn-sm btn-success">Buscar</button>
<!--                                <a href="core_reporte_acta.php?idialumno=' + idialumno + '&idiciclo=' + idiciclo + '" target="_blank" onclick="window.open('core_reporte_acta.php?idialumno=' + $('#idialumno').val() + '&idiciclo=' + $('#idiciclo').val(), this.target, width = 500, height = 500); return false;" class="btn btn-primary btn-sm" title="Imprimir Boleta"><i class="pe-7s-print"></i> Boleta</a>-->
                            </div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
<!--                    <div class="col-sm-3">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="fas fa-chart-line bg-c-green card1-icon"></i>
                                <span class="text-c-blue f-w-600">Promedio: </span>
                                <h4 id="t1"> </h4>
                            </div>
                        </div> 
                    </div>-->
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-11">
                        <h5>Tabla de calificaciones</h5>
                    </div>
                    <div class="col-sm-1" id="divReporte"></div>
                </div><br>
                <div class="row">
                    <div class="col-sm-12" id="loadTableCalificaciones"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /**
     * Scripsts para history academico
     */
    var idialumno = "<?php echo $idialumno; ?>";
    $(document).ready(function () {
        $('#Promedio').mask("#,##0.00", {reverse: true});
        getCilosCoursedByIdiAlumno(idialumno);
        var idiciclo = $('#idiciclo').val();
        //$("#divReporte").before('<a href="core_reporte_acta.php?idialumno=' + idialumno + '&idiciclo=' + idiciclo + '" target="_blank" onclick="window.open(this.href, this.target, ' + "'width = 1000, height = 500'" + '); return false;" class="btn btn-primary btn-sm" title="Imprimir Boleta"><i class="pe-7s-print"></i> Boleta</a>');
    });
    $('#btnBuscar').click(function () {
        getCalificacionesyAlumnoId(idialumno);
    });
    function getCalificacionesyAlumnoId(idialumno) {
        var idiRoleGerencia = "<?php echo $edit; ?>";
        var idiciclo = $('#idiciclo').val();
        getPromedioAlumnoId(idialumno);
        $("#loadTableCalificaciones").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCalificacionesyAlumnoId&idialumno=" + idialumno + "&idiciclo=" + idiciclo,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tableServicios" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Cliclo</th><th>Grado</th><th>Materia</th><th>Calificacion</th><th>Tipo de calificación</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    var cMin = date[x].Promedio;
                    var CalificacionId = date[x].CalificacionId;
                    txt += '<tr>';
                    if (idiRoleGerencia == 1) {
                        txt += "<td>" + (a + 1) + '</td>';
                    } else {
                        txt += "<td>" + (a + 1) + '</td>';
                    }
                    txt += "<td>" + date[x].ciclo + "</td>";
                    txt += "<td>" + date[x].grado + "</td>";
                    txt += "<td>" + date[x].materia + "</td>";
                    //txt += "<td>" + date[x].Promedio + "</td>";
                    if (cMin <= 5) {
                        txt += '<td  class="table-danger">' + cMin + "</td>";
                    } else {
                        txt += '<td class="table-success">' + cMin + "</td>";
                    }
                    txt += "<td>" + date[x].tipo_evaluacion + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("loadTableCalificaciones").innerHTML = txt;
                var table = $('#tableServicios').DataTable({
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: ['excel'],
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
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //console.log(jqXHR);
                //console.log(textStatus);
                //console.log(errorThrown);
                // alert("No fue posible conectar con el servidor");
                document.getElementById("loadTableCalificaciones").innerHTML = errorThrown;
            }
        });
    }

    function getCilosCoursedByIdiAlumno(idialumno) {
        $("#divCiclo").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCilosCoursedByIdiAlumno&idialumno=" + idialumno,
            success: function (text) {
                //console.log(text);
                //console.log(text.data);
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control" id="idiciclo" name="idiciclo" required>';
                txt += '<option value="">Todos *</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idiciclo + '">' + date[x].ciclo + '</option>';
                }
                txt += "</select>";
                document.getElementById("divCiclo").innerHTML = txt;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //console.log(jqXHR);
                //console.log(textStatus);
                //console.log(errorThrown);
                //alert("No fue posible conectar con el servidor");
                //document.getElementById("Solpes").innerHTML = errorThrown;
            }
        });
    }

    function getPromedioAlumnoId(idialumno) {
        var idiciclo = $('#idiciclo').val();
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getPromedioAlumnoId&idialumno=" + idialumno + "&idiciclo=" + idiciclo,
            success: function (text) {
                var num = 5.56789;
                var n = num.toFixed(2);
                //var d = parseInt(text.data[0].promedioGral);
                var d = parseFloat(text.data[0].promedioGral);
                $('#t1').html(d.toFixed(1));
                //$('#t1').html(d);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //console.log(jqXHR);
                //console.log(textStatus);
                //console.log(errorThrown);
                //alert("No fue posible conectar con el servidor");
                //document.getElementById("Solpes").innerHTML = errorThrown;
            }
        });
    }
</script>