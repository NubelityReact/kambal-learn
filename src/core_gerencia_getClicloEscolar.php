<?php include './headers.php'; ?>
<div class="row">
    <div class="col-12">
        <div class="card card-border-warning">
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
                <span class="float-right"><a href="core_gerencia_addCicloEscolar.php" class="btn btn-success btn-sm">Nuevo Ciclo Escolar <i class="pe-7s-add-user"></i></a></span><br><br>
                <div id="loadTableCliclo"></div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        getCiclo();
    });
    function getCiclo() {
        $("#loadTableCliclo").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCiclo",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tacleClicos" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>Código</th><th>Abreviatura</th><th>Ciclo</th><th>Estatus</th><th>Inicio</th><th>Término</th><th>Fecha límite de inscripción</th></tr> </thead>';
                for (x in date) {
                    var estatus = date[x].estatus;
                    txt += '<tr>';
                    txt += "<td>" + date[x].idiciclo + ' <a href="core_gerencia_updateCicloEscolar.php?idiciclo=' + date[x].idiciclo + '"><i class="pe-7s-note pe-2x pe-va" title="Editar"></i></a></td>';
                    txt += "<td>" + date[x].ciclo + "</td>";
                    txt += "<td>" + date[x].abrev + "</td>";
                    if (estatus == 'Activo') {
                        txt += '<td class="bg-success">' + date[x].estatus + "</td>";
                    } else {
                        txt += '<td class="bg-danger">' + date[x].estatus + "</td>";
                    }
                    txt += "<td>" + date[x].inicio + "</td>";
                    txt += "<td>" + date[x].termino + "</td>";
                    txt += "<td>" + date[x].limite_inscipcion + "</td>";

                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("loadTableCliclo").innerHTML = txt;
                var table = $('#tacleClicos').DataTable({
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

                $('#tacleClicos tbody').on('click', 'tr', function () {
                    var datos = table.row(this).data();
                    //alert(datos[0]);
                    $("#idiservicio").val(datos[0]);
                    $("#descripcion").val(datos[1]);
                    $("#precio").val(datos[2]);
                    //$("#infoAlumno").html('<strong>Alumno:</strong> ' + datos[1] + " " + datos[2] + " " + datos[3] + ' <strong>Matrícula: </strong>' + datos[5] + ' <strong>Carrera: </strong>' + datos[4]);
                    $("#modalMateriales .close").click()
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("loadTableCliclo").innerHTML = '0 Cliclos';
            }
        });
    }
</script>
