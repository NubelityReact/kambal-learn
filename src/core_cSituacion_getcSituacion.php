<?php include './headers.php'; ?>
<div class="row">
    <div class="col-12">
        <div class="card card-border-info">
            <div class="card-header bg-white cfos"> <h4 class="float-left">Catálogo de Situaciones</h4> <span class="float-right"><a href="core_cSituacion_add.php" class="btn btn-success btn-sm">Agregar Situación <i class="pe-7s-add-user"></i></a></span></div>
            <div class="card-body">
                <div id="loadtablecSituacion"></div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        getcSituacion();
    });
    function getcSituacion() {
        $("#loadtablecSituacion").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcSituacion",
            success: function (text) {
                //console.log(text);
                //console.log(text.data);
                var date = text.data;
                var txt = "";
                //console.log(date);
                txt += '<div class="table-responsive"> <table id="tablecSituacion" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"><tr><th>Acción</th> <th>Descripción</th> <th>Estatus</th> </tr></thead>';
                for (x in date) {
                    txt += '<tr>';
                    txt += "<td>" + date[x].SituacionId + ' <a href="core_cSituacion_updatecSituacion.php?SituacionId=' + date[x].SituacionId + '"><i class="pe-7s-note pe-2x pe-va" title="Editar"></i></a>\n\
                <button class="btn btn-link" onclick="deletecSituacion(' + date[x].SituacionId + ');"><i class="fas fa-trash-alt text-danger pe-1x pe-va" title="borrar"></i></button></td>';
                    txt += "<td>" + date[x].Descripcion + "</td>";
                    if(date[x].Estatus == 0){
                    txt += "<td> Inactivo </td>";    
                    //txt += "<td>" + date[x].Estatus  + "</td>";
                }else{
                    txt += "<td> Activo </td>";
                }
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("loadtablecSituacion").innerHTML = txt;
                var table = $('#tablecSituacion').DataTable({
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

//                $('#tablecSituacion tbody').on('click', 'tr', function () {
//                    var datos = table.row(this).data();
//                    //alert(datos[0]);
//                    $("#idiservicio").val(datos[0]);
//                    $("#descripcion").val(datos[1]);
//                    $("#precio").val(datos[2]);
//                    //$("#infoAlumno").html('<strong>Alumno:</strong> ' + datos[1] + " " + datos[2] + " " + datos[3] + ' <strong>Matrícula: </strong>' + datos[5] + ' <strong>Carrera: </strong>' + datos[4]);
//                    $("#modalMateriales .close").click()
//                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
               // alert("No fue posible conectar con el servidor");
                document.getElementById("loadtablecSituacion").innerHTML = errorThrown;
            }
        });
    }
</script>
<script>

    function deletecSituacion(SituacionId) {
        var txt;
        var r = confirm("Desea eliminar la Situación? " + SituacionId);
        if (r) {
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deletecSituacion&SituacionId=" + SituacionId,
                success: function (text) {
                    if (text == "success") {
                        swalert('Exito!', 'Situacion Eliminado', 'success');
                        getcSituacion();
                    } else {
                        swalert('Error!', text, 'error');
                    }
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    }
</script>