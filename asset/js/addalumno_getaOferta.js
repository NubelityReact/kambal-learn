$(document).ready(function () {
    //getOferta(); //consulta ofrta academica
    ConsultaSolpesJson(); //consulta pre inscritos
    //consultaAlumnos(); //consulta Alumnos
    $('#abreAspirantes').click();//simular clic para abrir modal aspirantes
    $("search:first").focus();
});
function ConsultaSolpesJson() {
    $("#Solpes").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getDatosGenerales",
        success: function (text) {
            var date = text.data;
            var txt = "";
            txt += '<div class="table-responsive"> <table id="solpx3" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
            txt += '<thead class="table-primary text-light"> <tr><th>Editar</th><th>Código</th><th>Solicitud</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Genero</th><th>Edad</th><th>CURP</th>\n\
                <th>NSS</th><th>RFC</th><th>Email</th><th>Teléfono</th><th>Móvil</th><th>Email 2</th><th>Pais</th><th>Ciudad</th><th>Dirección</th><th>Localidad</th><th>CP</th>\n\
                <th title="Escuela de egreso">Egreso</th><th title="Nivel de egreso">Nivel</th><th>Año de egreso</th><th>Tipo de sangre</th><th>Alergias</th><th>Fecha de nacimiento</th> </tr> </thead>';
            for (x in date) {
                txt += '<tr><td><a btn="btn-success"><i class="pe-7s-note pe-2x pe-va" title="Seleccionar"></i></a></td>';
                txt += "<td>" + date[x].idigenerales + "</td>";
                txt += "<td>" + date[x].estatus + "</td>";
                txt += "<td>" + date[x].nombre + "</td>";
                txt += "<td>" + date[x].apellido_paterno + "</td>";
                txt += "<td>" + date[x].apellido_materno + "</td>";
                txt += "<td>" + date[x].genero + "</td>";
                txt += "<td>" + date[x].edad + "</td>";
                txt += "<td>" + date[x].curp + "</td>";
                txt += "<td>" + date[x].nss + "</td>";
                txt += "<td>" + date[x].rfc + "</td>";
                txt += "<td>" + date[x].email + "</td>";
                txt += "<td>" + date[x].telefono + "</td>";
                txt += "<td>" + date[x].movil + "</td>";
                txt += "<td>" + date[x].email2 + "</td>";
                txt += "<td>" + date[x].pais + "</td>";
                txt += "<td>" + date[x].ciudad + "</td>";
                txt += "<td>" + date[x].direccion + "</td>";
                txt += "<td>" + date[x].municipio + "</td>";
                txt += "<td>" + date[x].cp + "</td>";
                txt += "<td>" + date[x].escegreso + "</td>";
                txt += "<td>" + date[x].nivelegreso + "</td>";
                txt += "<td>" + date[x].fechaegreso + "</td>";
                txt += "<td>" + date[x].tiposangre + "</td>";
                txt += "<td>" + date[x].alergias + "</td>";
                txt += "<td>" + date[x].fecha_nacimiento + "</td></tr>";
            }
            txt += "</table> </div>"
            document.getElementById("Solpes").innerHTML = txt;
            var table = $('#solpx3').DataTable({responsive: true,
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

            $('#solpx3 tbody').on('click', 'tr', function () {
                var datos = table.row(this).data();
                //alert(datos[0]);
                $("#idigenerales").val(datos[1]);
                $("#nombre").val(datos[3]);
                $("#apellido_paterno").val(datos[4]);
                $("#apellido_materno").val(datos[5]);
                $("#curp").val(datos[8]);
                $("#email").val(datos[11]);
                $("#myModal .close").click()
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            //console.log(jqXHR);
            //console.log(textStatus);
            //console.log(errorThrown);
            //alert("No fue posible conectar con el servidor");
            document.getElementById("Solpes").innerHTML = "No hay aspirantes registrados";
        }
    });
}

function consultaAlumnos() {
    $("#TablaAlumnos").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getcardAlumno",
        success: function (text) {
            //console.log(text);
            //console.log(text.data);
            var date = text.data;
            var txt = "";
            //console.log(date);
            txt += '<div class="table-responsive"> <table id="solpx5" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
            txt += '<thead class="table-primary text-light"><tr><th>Código</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Carrera</th><th>Matricula</th><th>Turno</th><th>Cuatrimestre</th></tr> </thead>';
            for (x in date) {
                txt += "<tr><td>" + date[x].idialumno + "</td>";
                txt += "<td>" + date[x].nombre + "</td>";
                txt += "<td>" + date[x].apellido_paterno + "</td>";
                txt += "<td>" + date[x].apellido_materno + "</td>";
                txt += "<td>" + date[x].carrera + "</td>";
                txt += "<td>" + date[x].matricula + "</td>";
                txt += "<td>" + date[x].turno + "</td>";
                txt += "<td>" + date[x].cuatrimestre + "</tr>";
            }
            txt += "</table> </div>"
            document.getElementById("TablaAlumnos").innerHTML = txt;
            var table = $('#solpx5').DataTable({responsive: true});

            $('#solpx5 tbody').on('click', 'tr', function () {
                var datos = table.row(this).data();
                //alert(datos[0]);
                $("#idialumno").val(datos[0]);
                $("#son").val(datos[1] + " " + datos[2] + " " + datos[3]);
                $("#alumno .close").click()
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            //console.log(jqXHR);
            //console.log(textStatus);
            //console.log(errorThrown);
            //alert("No fue posible conectar con el servidor");
            document.getElementById("TablaAlumnos").innerHTML = "0 alumnos inscritos";
        }
    });
}

function getOferta() {
    var idicampus = $('#idicampus').val();
    $("#Oferta-Academica").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getCarreraByIdiCampus&idicampus=" + idicampus,
        success: function (text) {
            var date = text.data;
            var txt = '';
            txt += '<select class="form-control" id="idicarrera" name="idicarrera" required>';
            txt += '<option value="">Seleccione</option>';
            for (x in date) {
                txt += '<option value="' + date[x].idicarrera + '">' + date[x].nombre + '</option>';
            }
            txt += "</select>";
            //document.getElementById("Oferta-Academica").innerHTML = txt;
            $('#Oferta-Academica').html(txt);
//            $('#idicarrera').on('change', function () {
//                var idiCarrera = this.value;
//                $("#idiCarrera").val(idiCarrera);
//                getOfertabyId(idiCarrera);
//            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $('#Oferta-Academica').html('0 resultados');
        }
    });
}

function getOfertabyId(idiCarrera) {
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getOfertabyID&idioferta=" + idiCarrera,
        success: function (text) {
            ////console.log(text);
            ////console.log(text.data);
            var date = text.data;
            var nivel = date[0].nivel;
            //console.log(date);
            $("#nivel").val(nivel);
            $("#categoria").val(date[0].categoria);
            $("#carrera").val(date[0].categoria + " en " + date[0].nombre);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            //console.log(jqXHR);
            //console.log(textStatus);
            //console.log(errorThrown);
            //alert("No fue posible conectar con el servidor");
            document.getElementById("Solpes").innerHTML = errorThrown;
        }
    });
}
