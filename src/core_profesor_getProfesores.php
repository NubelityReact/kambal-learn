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
        <span class="float-right"><a href="core_profesor_addprofesor.php" class="btn btn-success btn-sm">Nuevo profesor <i class="pe-7s-add-user"></i></a></span>
        <br><br>
        <div id="divTableProfesores"></div>
    </div>
</div>
<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        getProfesores();
    });
    function getProfesores() {
        $("#divTableProfesores").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');
        $.ajax({
            type: "GET",
            url: "dataConect/API.php",
            data: "action=getProfesores",
            success: function (text) {
                console.log(text);
                console.log(text.data);
                var date = text.data;
                var txt = "";
                console.log(date);
                txt += '<div class="table-responsive"> <table id="tableProfx01" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
                txt += '<thead class="table-primary text-light"> <tr><th>#</th><th>Acción</th><th>Credencial</th><th>Nombre</th><th>Apellidos</th><th>Estatus</th><th>Plantel</th><th>Género</th><th>Edad</th>\n\
                <th>Email</th><th>Teléfono</th><th>Móvil</th><th>Email 2</th><th>País</th><th>Ciudad</th><th>Dirección</th><th>Localidad</th><th>CP</th>\n\
                <th title="Cedula">Cedula</th><th title="grado">grado</th><th>perfil</th><th>Tipo de sangre</th><th>Alergias</th><th>Fecha de nacimiento</th> <th>Foto</th> </tr> </thead>';
                for (x in date) {
                    txt += '<tr>';
                    txt += "<td>" + date[x].idiprofesor + "</td>";
                    txt += '<td><a href="core_profesor_updateProfesor.php?idiprofesor=' + date[x].idiprofesor + '"><i class="pe-7s-note pe-2x pe-va" title="Editar"></i></a> \n\
                    <button class="btn btn-link" onclick="borrarProf(' + date[x].idiprofesor + ');"><i class="pe-7s-delete-user pe-2x pe-va text-danger" title="Eliminar"></i></button></td>';
                    txt += '<td><a href="credencialProfesor.php?idiprofesor=' + date[x].idiprofesor + '" target="_blank"><i class="pe-7s-id pe-2x pe-va" title="Imprimir Credencial"></i></a></td>';
                    txt += "<td>" + date[x].nombre + "</td>";
                    txt += "<td>" + date[x].apellido_paterno + " " + date[x].apellido_materno + "</td>";
                    txt += "<td>" + date[x].estatus + "</td>";
                    txt += "<td>" + date[x].plantel + "</td>";
                    txt += "<td>" + date[x].genero + "</td>";
                    txt += "<td>" + date[x].edad + "</td>";
                    txt += "<td>" + date[x].email + "</td>";
                    txt += "<td>" + date[x].telefono + "</td>";
                    txt += "<td>" + date[x].movil + "</td>";
                    txt += "<td>" + date[x].email2 + "</td>";
                    txt += "<td>" + date[x].pais + "</td>";
                    txt += "<td>" + date[x].ciudad + "</td>";
                    txt += "<td>" + date[x].direccion + "</td>";
                    txt += "<td>" + date[x].municipio + "</td>";
                    txt += "<td>" + date[x].cp + "</td>";
                    txt += "<td>" + date[x].cedula + "</td>";
                    txt += "<td>" + date[x].grado + "</td>";
                    txt += "<td>" + date[x].perfil + "</td>";
                    txt += "<td>" + date[x].tiposangre + "</td>";
                    txt += "<td>" + date[x].alergias + "</td>";
                    txt += "<td>" + date[x].fecha_nacimiento + "</td>";
                    txt += "<td> <img src='dataConect/upload/" + date[x].imagen_perfil + "' width='20%'></td></tr>";
                }
                txt += "</table> </div>"
                document.getElementById("divTableProfesores").innerHTML = txt;
                var table = $('#tableProfx01').DataTable({
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

                $('#tableProfx01 tbody').on('click', 'tr', function () {
                    var datos = table.row(this).data();
                    //alert(datos[0]);
//                $("#Material").val(datos[0]);
//                $("#Cantidad").val("1");
//                $("#Fabrica").val(datos[1]);
//                $("#Almacen").val(datos[2]);
//                $("#modalMateriales .close").click()
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                //alert("No fue posible conectar con el servidor");
                document.getElementById("divTableProfesores").innerHTML = "0 Registros";
            }
        });
    }

    function borrarProf(idiprofesor) {
        var txt;
        var r = confirm("Desea eliminar el profesor?" + idiprofesor);
        if (r) {
            $.ajax({
                type: "POST",
                url: "dataConect/API.php",
                data: "action=borrarProf&idiprofesor=" + idiprofesor,
                success: function (text) {
                    if (text == "success") {
                        swalert('Exito!', 'Profesor Eliminado', 'success');
                        getProfesores();
                    } else {
                        swalert('Error!', text, 'error');
                    }

                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
        //alert(txt);
    }
</script>
