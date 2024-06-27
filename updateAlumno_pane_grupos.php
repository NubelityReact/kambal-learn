
<div class="row">
    <div class="col-12">
        <div class="card card-border-success">
            <div class="card-body">
                <div class="d-flex mb-3">
                    <div class="col-3">
                        <div class="page-header-title">
                            <i class="icofont icofont-school-bag bg-c-orenge"></i>
                            <div class="d-inline">
                                <h4>Grupos cursados</h4>
                                <span class="subcabecera"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-10 container" id="getGruposCoursedByIdiAlumno"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        getGruposCoursedByIdiAlumno();
    });

    function getGruposCoursedByIdiAlumno() {
        var idialumno = <?php echo $idi = $_GET['idialumno'] ?>;
        $("#getGruposCoursedByIdiAlumno").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getGruposCoursedByIdiAlumno&idialumno=" + idialumno,
            success: function (text) {
                //console.log(text);
                //console.log(text.data);
                var date = text.data;
                var txt = "";
                //console.log(date);
                txt += '<div class="table-responsive"> <table id="tbrCourded" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Ver</th><th>Grado</th><th>Ciclo</th><th>Clave</th><th>Grupo</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    txt += '<tr>';
                    txt += "<td>" + (a + 1) + '</td>';
                    txt += '<td><a href="core_escolares_getbAlumnoGrupo.php?GrupoId='+date[x].GrupoId+'" data-toggle="tooltip" title="Ver Grupo"><i class="pe-7s-notebook pe-2x pe-va text-primary"></i></a></td>';
                    txt += "<td>" + date[x].grado + "</td>";
                    txt += "<td>" + date[x].ciclo + "</td>";
                    txt += "<td>" + date[x].Clave + "</td>";
                    txt += "<td>" + date[x].Descripcion + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("getGruposCoursedByIdiAlumno").innerHTML = txt;
                var table = $('#tbrCourded').DataTable({
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
                //alert("No fue posible conectar con el servidor");
                document.getElementById("getGruposCoursedByIdiAlumno").innerHTML = 'No ha agregado ningún grupo <a href="core_escolares_grupo.php" data-toggle="tooltip" title="Asignar Grupo"><i class="pe-7s-notebook pe-2x pe-va text-success"></i></a>';
            }
        });
    }
</script>