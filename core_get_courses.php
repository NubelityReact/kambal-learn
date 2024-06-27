<?php include './headers.php'; ?>
<div class="card card-border-primary">
    <div class="card-header bg-white cfos"> <h4 class="float-left">Alumnos Activos</h4> <span class="float-right"><a href="addalumno.php" class="btn btn-success btn-sm">Nuevo alumno <i class="pe-7s-add-user"></i></a></span></div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="sumab" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">
                <thead class="table-primary text-light"> 
                    <tr>
                        <th>#</th>
                        <th>shortname</th>
                        <th>categoryid</th>
                        <th>fullname</th>
                        <th>displayname</th> 
                    </tr> 
                </thead>
            </table> 
        </div>
    </div>
</div>
<?php include './footer.php'; ?>

<script>
    $(document).ready(function () {
        sumarb();

    });
    var sumarb = function () {
        var spin = '<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>';

        tablec = $("#sumab").DataTable({
            responsive: true,
//            dom: 'Bfrtip',
//            buttons: ['excel'],
            "destroy": true,
            //"responsive": true,
            "deferRender": true,
            //"processing": true,
            //"serverSide": true,
            "ajax": {
                "url": "msw/core_get_courses.php",
                "type": "GET"
            },
            "columns": [
                {"data": "id"},
                {"data": "shortname"},
                {"data": "categoryid"},
                {"data": "fullname"},
                {"data": "displayname"},
            ],
            //"dom": 't',
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": spin,
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

    }

</script>