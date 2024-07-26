<?php include './headers.php'; ?>
<div class="row">

    <div class="col-12">
        <div class="card card-border-success">
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
                <span class="float-right">
                    <div class="btn-group">
                        <a href="core_Aulas_addAulas.php" class="btn btn-success btn-sm">
                            Agregar nuava aula <i class="pe-7s-plus"></i>
                        </a>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCSV">Subir Aulas CSV <i class="pe-7s-file"></i></button>
                    </div>
                </span>
                <br><br>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="nivel">Seleccione el Campus</label>
                            <div id="divNivel"></div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
                <div id="loadTableAulas"></div>
            </div>
        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal" id="modalCSV">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-primary">Subir Aulas CSV <i class="pe-7s-file"></i></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="core_aulas_upload_csv.php" method="post" enctype="multipart/form-data">
                    <h5>Descargue el archivo de muestra y llene las celdas de los campos que se solicitan. </h5>
                    <h5>Despues guardelo en formato CSV delimitado por comas. </h5><br>
                    <label><i class="pe-7s-info pe-2x text-danger"></i> Evite una carga lenta procurando que el archivo no contenga mas de 1000 filas por subida</label>
                    <label><i class="pe-7s-info pe-2x text-warning"></i> Evite agregar filas sin datos, si los datos del aula estan incompletos escriba la palabra <strong>null</strong> en su lugar o bién dejando la celda en blanco</label>
                    <label><i class="pe-7s-info pe-2x text-info"></i> En la primera columna deberá escribir Número del  <strong>ID del Campus</strong> que está visible en el panel principal, en la lista desplegable de la Izquierda "Seleccione el Campus"</label>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="d">Archivo CSV de ejemplo: </label>
                            <a href="aulas.csv" class="text-primary">aulas.csv</a>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="aulas_csv">Seleccione un Archivo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="aulas_csv" name="aulas_csv" accept=".csv" required>
                                <label class="custom-file-label" for="customFile">Seleccionar archivo</label>
                            </div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Subir Archivo <i class="pe-7s-file"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    $(document).ready(function () {
        getDatosGenerales();
    });
    
    $(document).ready(function () {
        getAulas();
        getNivel();
    });
    function getAulas() {
        var idicampus = $("#idicampus").val();
        //alert (idicampus);
        $("#loadTableAulas").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcAulasbyidicampus&idicampus=" + idicampus,
            success: function (text) {
                console.log(text);
                console.log(text.data);
                var date = text.data;
                var txt = "";
                console.log(date);
                txt += '<div class="table-responsive"> <table id="tableAulas" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Clave</th><th>Aula</th><th>Capacidad</th><th>Estatus</th></tr> </thead>';
                for (x in date) {
                    txt += '<tr>';
                    txt += "<td>" + date[x].AulaId + ' <a href="core_Aulas_updateAulas.php?AulaId=' + date[x].AulaId + '"><i class="pe-7s-note pe-2x pe-va" title="Editar"></i></a>\n\
                <button class="btn btn-link" onclick="deleteAula(' + date[x].AulaId + ');"><i class="fas fa-trash-alt text-danger pe-1x pe-va" title="borrar"></i></button></td>';
                    txt += "<td>" + date[x].Clave + "</td>";
                    txt += "<td>" + date[x].Descripcion + "</td>";
                    txt += "<td>" + date[x].Capacidad + "</td>";
                    if (date[x].Estatus == 0) {
                        txt += "<td> Inactivo </td>";
                        //txt += "<td>" + date[x].Estatus  + "</td>";
                    } else {
                        txt += "<td> Activo </td>";
                    }
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("loadTableAulas").innerHTML = txt;
                var table = $('#tableAulas').DataTable({
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

                $('#tableAulas tbody').on('click', 'tr', function () {
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
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                //alert("No fue posible conectar con el servidor");
                document.getElementById("loadTableAulas").innerHTML = '0 aulas';
            }
        });
    }


    function getNivel() {
        $("#divNivel").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getCampus",
            success: function (text) {
                //console.log(text);
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control fill" id="idicampus" name="idicampus" required onchange="getAulas()">';
                txt += '<option value="">Seleccione</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].idicampus + '">Número ID: ' + date[x].idicampus + ', ' + date[x].campus + '</option>';
                }
                txt += "</select>";
                $("#divNivel").html(txt);
            }
        });
    }
</script>
<script>

    function deleteAula(AulaId) {
        var txt;
        var r = confirm("Desea eliminar el Aula? " + AulaId);
        if (r) {
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deleteAula&AulaId=" + AulaId,
                success: function (text) {
                    if (text == "success") {
                        swalert('Exito!', 'Aula Eliminada', 'success');
                        getAulas();
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
