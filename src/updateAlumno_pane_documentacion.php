<div class="card card-border-info">
    <div class="card-header bg-white cfos"> <h4 class="float-right">Documentos del Alumno</h4></div>
    <div class="card-body">
        <button class="btn btn-success pull-right btn-sm" data-toggle="modal" data-target="#myModalDocumentos"><i class="far fa-file-word"></i> Agregar nuevo Documento</button><br>
        <div id="getcDocumentosGenerales">
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModalDocumentos">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><i class="far fa-file-word text-primary"></i> Agregar nuevo Documento</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form role="form" id="newDocument" data-toggle="validator" class="shake" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="AlumnoId" name="AlumnoId" >
                    <label><i class="far fa-file-pdf pe-2x text-success"></i>  El archivo debe tener un formato PDF </label><br>
                    <label><i class="pe-7s-info pe-2x text-danger"></i> Seleccione únicamente un archivo</label><br>
                    <label><i class="pe-7s-info pe-2x text-warning"></i> El archivo deben tener un tamaño máximo de 1Mb</label>
                    <hr>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="file">Tipo de archivo</label>
                            <div id="getcDocumentos"></div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="file">Seleccione un archivo</label>
                            <input type="file" class="form-control" id="sortpicture" name="sortpicture" placeholder="Enter file" required accept=".pdf">
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>

                    <div class="help-block with-errors"></div>
                    <button type="submit" id="form-submit" class="btn btn-success btn-sm pull-right ">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        getcDocumentosGenerales();
        getcDocumentos();
    });

    function getcDocumentosGenerales() {
        var idigenerales = <?php print_r($_GET['p']); ?>;
        $("#getcDocumentosGenerales").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcDocumentosGenerales&idigenerales=" + idigenerales,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tbDocumentosAlumnos" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Acciones</th><th>Documento</th><th>Nombre</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    txt += '<tr>';
                    txt += "<td>" + (a + 1) + '</td>';
                    txt += '<td class="table-success">';
                    txt += '<div class="btn-group">';
                    txt += '<button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar archivo" onclick="deleteDocument(' + date[x].ididocgral + ');"><i class="fa fa-trash-alt"></i></button>';
                    txt += '<button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="Ver archivo" onclick="showFile(' + date[x].ididocgral + ');"><i class="fa fa-eye"></i></button>';
                    txt += '</div>';
                    txt += '</td>';
                    txt += "<td>" + date[x].description + "</td>";
                    txt += "<td>" + date[x].files_name + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                $("#getcDocumentosGenerales").html(txt);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#getcDocumentosGenerales").html("No ha agregado ningún documento");
            }
        });
    }

    function getcDocumentos() {
        $("#getcDocumentos").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getcDocumentos",
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<select class="form-control" id="ididocumento" name="ididocumento" required>';
                txt += '<option value="">Seleccione uno</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].ididocumento + '">' + date[x].description + '</option>';
                }
                txt += "</select>";
                document.getElementById("getcDocumentos").innerHTML = txt;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#getcDocumentos").html("No ha agregado ningún documento");
            }
        });
    }

    function showFile(ididocgral) {
        window.open('updateAlumno_pane_showfile.php?file=' + ididocgral, 'popUpWindow', 'height=1000,width=800,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
    }

</script>

<script>
    $("#newDocument").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            swalert('Mensaje!', 'Llene los campos requeridos', 'info');
            $("#myModalDocumentos .close").click();
        } else {
            $("#myModalDocumentos .close").click();
            // everything looks good!
            event.preventDefault();
            newDocument();
        }
    });

    function newDocument() {
        var idigenerales = <?php print_r($_GET['p']); ?>;
        swalert('Espere!', 'El documento se esta subiendo', 'warning');

        var ididocumento = $("#ididocumento").val();
        var file_data = $('#sortpicture').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('action', 'student_upload_file');
        form_data.append('idigenerales', idigenerales);
        form_data.append('ididocumento', ididocumento);

        $.ajax({
            url: 'dataConect/API.php', // point to server-side PHP script 
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (text) {
                if (text == "success") {
                    swalert('Mensaje!', 'El Documento se guardó correctamente', 'success');
                    getcDocumentosGenerales();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }

    function deleteDocument(ididocgral) {
        var r = confirm("Desea Eliminar este documento?");
        if (r) {
            swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deleteDocument&ididocgral=" + ididocgral,
                success: function (text) {
                    if (text == "success") {
                        swalert('Mensaje!', 'El Documento se eliminó correctamente', 'success');
                        getcDocumentosGenerales();
                    } else {
                        swalert('Mensaje!', text, 'info');
                    }
                }
            });
        }

    }
</script>