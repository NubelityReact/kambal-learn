<div class="card card-border-info">
    <div class="card-body">
        <button class="btn btn-success pull-right btn-sm" data-toggle="modal" data-target="#myModalDocumentos"><i class="far fa-file-word"></i> Agregar nuevo Documento</button><br>
        <div id="getDocumentosProfe">
        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal" id="myModalDocumentos">
    <div class="modal-dialog modal-sm">
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
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="file">Seleccione un tipo de archivo</label>
                            <div id="getcDocumentos"></div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="file">Seleccione un archivo</label>
                            <input type="file" class="form-control" id="sortpicture" name="sortpicture" placeholder="Enter file" required multiple>
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
        getDocumentosProfe();
        getcDocumentos();
    });

    function getDocumentosProfe() {
        var idiprofesor = <?php echo $idi = $_GET['idiprofesor'] ?>;
        $("#getDocumentosProfe").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getDocumentosProfe&idiprofesor=" + idiprofesor,
            success: function (text) {
                var date = text.data;
                var txt = "";
                txt += '<div class="table-responsive"> <table id="tbDocumentosAlumnos" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Entregado</th><th>Documento</th></tr> </thead>';
                for (x in date) {
                    var a = parseInt(x);
                    txt += '<tr>';
                    txt += "<td>" + (a + 1) + '</td>';
                    if (date[x].Entregado == 1) {
                        txt += '<td class="table-success">';
                        txt += '<div class="btn-group">';
                        txt += '<button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar archivo" onclick="deleteDocument(' + date[x].DocumentoProfeId + ');"><i class="fa fa-trash-alt"></i></button>';
                        txt += '<button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="Ver archivo" onclick="showFile(' + date[x].DocumentoProfeId + ');"><i class="fa fa-eye"></i></button>';
                        txt += '</div> Si';
                        txt += '</td>';
                    } else {
                        txt += '<td class="table-danger">No <button type="button" class="btn btn-danger btn-sm" onclick="editaDocumento(' + date[x].DocumentoProfeId + ');"><i class="pe-7s-note pe-va"></i></button></td>';
                    }
                    txt += "<td>" + date[x].Descripcion + "</td>";
                    txt += "</tr>";
                }
                txt += "</table> </div>"
                document.getElementById("getDocumentosProfe").innerHTML = txt;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                document.getElementById("getDocumentosProfe").innerHTML = "No ha agregado ningún documento";
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
                txt += '<select class="form-control" id="DocumentoId" name="DocumentoId" required>';
                txt += '<option value="">Seleccione uno</option>';
                for (x in date) {
                    txt += '<option value="' + date[x].ididocumento + '">' + date[x].description + '</option>';
                }
                txt += "</select>";
                document.getElementById("getcDocumentos").innerHTML = txt;
            }
        });
    }

    function showFile(DocumentoProfeId) {
        window.open('core_profesor_show_file.php?file=' + DocumentoProfeId, 'popUpWindow', 'height=1000,width=800,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
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
        swalert('Espere!', 'El documento se esta subiendo', 'warning');

        var idiprofesor = <?php echo $idi = $_GET['idiprofesor'] ?>;
        var DocumentoId = $("#DocumentoId").val();
        var file_data = $('#sortpicture').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('action', 'teacher_upload_file');
        form_data.append('idiprofesor', idiprofesor);
        form_data.append('DocumentoId', DocumentoId);

        $.ajax({
            url: 'dataConect/API.php', // point to server-side PHP script 
            //dataType: 'text', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (text) {
                if (text == "success") {
                    swalert('Mensaje!', 'El Documento se guardó correctamente', 'success');
                    getDocumentosProfe();
                } else {
                    swalert('Mensaje!', text, 'info');
                }
            }
        });
    }

    function deleteDocument(DocumentoProfeId) {
        var r = confirm("Desea Eliminar este documento?");
        if (r) {
            swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=deleteDocumentProfe&DocumentoProfeId=" + DocumentoProfeId,
                success: function (text) {
                    if (text == "success") {
                        swalert('Mensaje!', 'El Documento se eliminó correctamente', 'success');
                        getDocumentosProfe();
                    } else {
                        swalert('Mensaje!', text, 'info');
                    }
                }
            });
        }

    }
</script>