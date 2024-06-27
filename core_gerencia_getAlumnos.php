<?php include './headers.php'; ?>
<div class="card card-border-primary">
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
        <span class="float-right"><a href="core_gerencia_inscripcion_gerencial.php" class="btn btn-success btn-sm">Nuevo alumno <i class="pe-7s-add-user"></i></a></span>
        <br><br>
        <div class="table-responsive">
            <table id="sumab" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">
                <thead class="table-primary text-light"> <tr><th>#</th><th>Editar</th><th>Print</th><th>Matrícula</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Carrera</th><th>Turno</th><th>Cuatrimestre</th><th>Estatus</th><th>Detalle Estatus</th><th>Vigencia de Credencial</th><th>Foto</th> </tr> </thead>
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
            dom: 'Bfrtip',
            buttons: ['excel'],
            "destroy": true,
            //"responsive": true,
            "deferRender": true,
            //"processing": true,
            //"serverSide": true,
            "ajax": {
                "url": "dataConect/API.php?action=getcardAlumnoAll",
                "type": "GET"
            },
            "columns": [
                {"data": "idialumno"},
                {"data": "btnEditar"},
                {"data": "btnCredencial"},
                {"data": "matricula"},
                {"data": "nombre"},
                {"data": "apellido_paterno"},
                {"data": "apellido_materno"},
                {"data": "carrera"},
                {"data": "turno"},
                {"data": "cuatrimestre"},
                {"data": "estatus"},
                {"data": "bloqueo"},
                {"data": "vigencia"},
                {"data": "contenido"},
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