
<!-- Contact Menu Start -->
<div class="col-md-12 col-xl-12" ng-app="MyFirstApp">
    <div class="card card-border-primary" ng-controller="FirstController" >
        <div class="card-header bg-white cfos"> <h4 class="float-right">Información General</h4></div>
        <div class="card-block user-detail-card">
            <div class="row" ng-repeat="data in posts">
                <div class="col-sm-4">
                    <center> 
                        <div id="imageUser"></div><br>
                        <div id="imageSign"></div>
                        <div class="contact-icon">
                            <button class="btn btn-default" data-placement="bottom" title="Cambiar foto de perfil" data-toggle="modal" data-target="#modalCamera"><i class="pe-7s-camera m-0"></i></button>
                            <button class="btn btn-default" data-placement="bottom" title="Cambiar firma" data-toggle="modal" data-target="#signature"><i class="pe-7s-pen m-0"></i></button>
<!--                            <a href="credencialEstudiante.php?idialumno=<?php echo $idialumno ?>" target="_blank"><button class="btn btn-default" data-placement="bottom" title="Imprimir Credencial" id="printTar"><i class="pe-7s-print m-0"></i></button></a>-->
                        </div>
                    </center>
                </div>
                <div class="col-sm-8 user-detail">
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-user"></i>Nombre :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.nombre}} {{data.apellido_paterno}} {{data.apellido_materno}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-calendar"></i>Fecha de nacimiento</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.fecha_nacimiento}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-surgeon"></i>Género</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.genero}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-surgeon"></i>Estado Civil</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.estado_civil}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-email"></i>Correo electrónico</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.email}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-touch-phone"></i>Teléfono :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.telefono}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-birthday-cake"></i>Edad :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.edad}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-bar-code"></i>CURP :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.curp}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="pe-7s-angle-right"></i>RFC :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.rfc}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-hospital"></i>Número de seguridad social :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.nss}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-phone"></i>Teléfono Móvil :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.movil}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-home"></i>Dirección</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.direccion}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-home"></i>Ciudad :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.ciudad}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-home"></i>Estado :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.municipio}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-home"></i>Código Postal :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.cp}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-home"></i>País :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.pais}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-blood-drop"></i>Tipo de Sangre :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.tiposangre}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-surgeon"></i>Alergias :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.alergias}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-clip"></i>Información adicional :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.infoadicional}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-school-bag"></i>Escuela de egreso :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.escegreso}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-touch"></i>Nivel de egreso :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.nivelegreso}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-star"></i>Entidad federativa :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.entidad_fed}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-atom"></i>Inicio :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.fecha_inicio}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-atom"></i>Fin :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.fechaegreso}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-calendar"></i>Fecha de registro :</h6>
                        </div>
                        <div class="col-sm-7">
                            <h6 class="m-b-30">{{data.created}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="modalCamera">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Capturar foto</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <center>
                    <form role="form" id="setImageUser" data-toggle="validator" class="shake">
                        <div class="row">                        
                            <div class="col-12">
                                <input class="btn btn-primary" type=button value="Tomar foto" onClick="take_snapshot()" id="take">
                                <div id="my_camera"></div>
                                <div id="results" class="text-success text-center"></div>
                            </div>
                        </div>
                        <div class="row">       
                            <div class="col-12 bg-light border">
                                <button type="submit" id="saveImege" class="btn btn-success" style="display: none;">Guardar imagen</button>
                                <input type="hidden" name="idiarchivo"  id="idiarchivo">
                                <input type="hidden" name="image" class="image-tag" id="image">
                                <input type="hidden" name="idialumno" id="idialumno" value="<?php echo $idialumno ?>">
                                <div id="results" class="text-success text-center">La imagen capturada aparecerá aquí ... <br> Recuerde habilitar el permiso para usar la Camara</div>
                            </div>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="signature">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tomar Firma</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <center class="sigPad">
                    <div id="signArea">
                        <div class="sig sigWrapper" style="height:auto;">
                            <div class="typed"></div>
                            <canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
                        </div>
                    </div>
                    <div class="btn btn-group">
                        <button class="btn btn-primary btn-sm" id="btnSaveSign">Tomar firma</button>
                        <button class="btn btn-warning btn-sm clearButton"><a href="#clear">Limpiar</a></button>
                    </div>
                </center>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript" src="bower_components/jquery/js/jquery.min.js"></script>
<script src="asset/js/webcam.min.js"></script>
<script src="asset/js/addalumno_webcam.js"></script>
<script src="asset/js/validator.min.js"></script>
<script>
                                    $("#take").click(function () {
                                        // var idiarchivo = <?php //echo $_GET['idiarchivo'];     ?>;
                                        // $("#idiarchivo").val(idiarchivo);
                                        var image = $("#image").val();
                                        if (image != "") {
                                            $("#saveImege").show();
                                        }
                                    });
//                                    $("#saveImege").click(function () {
//                                        var idiarchivo = $("#idiarchivo").val();
//                                        var image = $("#image").val();
//                                        $.ajax({
//                                            type: "POST",
//                                            url: "dataConect/API.php",
//                                            data: "action=updateImageAlumnoByIDArchivo&idiarchivo=" + idiarchivo + "&image=" + image,
//                                            success: function (text) {
//                                                swalert("Respuesta", text, "info");
//                                            }
//                                        });
//                                    });

                                    $("#setImageUser").validator().on("submit", function (event) {
                                        if (event.isDefaultPrevented()) {
                                            // handle the invalid form...
                                            submitMSG(false, "Todos los campos son requeridos");
                                        } else {
                                            // everything looks good!
                                            event.preventDefault();
                                            submitFormImage();
                                        }
                                    });


                                    function submitFormImage() {
                                        $("#modalCamera .close").click()
                                        // Initiate Variables With Form Content
                                        var dataString = $('#setImageUser').serialize();
                                        //alert('data ' + dataString);
                                        swalert("Mensaje!", 'Procesando...', "info");
                                        $.ajax({
                                            type: "POST",
                                            url: "dataConect/API.php",
                                            //data: "name=" + name + "&email=" + email + "&message=" + message,
                                            data: "action=updateImageAlumnoByIDArchivo&" + dataString,
                                            success: function (text) {
                                                swalert("Mensaje!", text, "success");
                                                getImageUserByID();
                                            }
                                        });
                                    }
</script>
<script src="asset/js/angular.min.js"></script>
<script>
                                    //<html ng-app="app">
                                    angular.module('MyFirstApp', [])
                                            .controller("FirstController", function ($scope, $http)
                                            {
                                                $scope.posts = [];
                                                $scope.newPost = {};
                                                var idigenerales = <?php echo $idigenerales; ?>;
                                                $http.get("dataConect/API.php?action=getGeneralesbyID&idigenerales=" + idigenerales)
                                                        .success(function (data)
                                                        {
                                                            //console.log(data.data);
                                                            var persona = data.data;
                                                            $scope.posts = data.data;
                                                        })
                                                        .error(function (err)
                                                        {
                                                            //console.log(err);
                                                        });

                                            });
</script>
