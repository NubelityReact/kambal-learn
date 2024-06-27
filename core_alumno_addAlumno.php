<?php include 'headers.php'; ?>

<style type="text/css">
    #signArea{
        width:304px;
        margin: 50px auto;
    }
    .sign-container {
        width: 60%;
        margin: auto;
    }
    .sign-preview {
        width: 150px;
        height: 50px;
        border: solid 1px #CFCFCF;
        margin: 10px 5px;
    }
    .tag-ingo {
        font-family: cursive;
        font-size: 12px;
        text-align: left;
        font-style: oblique;
    }
</style>
<div class="card">
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
        <div class="card card-border-success">
            <form role="form" id="FormInscrpcion" data-toggle="validator" class="shake" autocomplete="off">
                <div class="card-body">
                    <h4>Datos del Alumno</h4> 
                    <input type="hidden" value="<?php echo date('Y') ?>"class="form-control" id="periodo" name="periodo">
                    <input type="hidden" class="form-control" id="cuatrimestre" name="cuatrimestre" value="1" placeholder="Ingrese cuatrimestre" required readonly="true">
                    <input type="hidden" class="form-control" id="idigenerales" name="idigenerales">
                    <input type="hidden" class="form-control" id="TurnoId" name="TurnoId">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="apellidos">Nombre</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required maxlength="140" readonly="true">
                                        <div class="input-group-append">
                                            <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#myModal" id="abreAspirantes">Ver Lista de aspirantes <i class="pe-7s-search"></i></button> 
                                        </div>
                                    </div>
                                </div>                                            
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="apellido_paterno">Apellido paterno</label>
                                        <input type="text" readonly="true" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Ingrese apellido paterno" required maxlength="140">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="apellido_materno">Apellido materno</label>
                                        <input type="text" readonly="true" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Ingrese apellido materno" maxlength="140">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="email">Correo electrónico</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email" required maxlength="140" readonly="true">
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>    
                                <div class="row">     
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="certificado">Desea dar acceso al alumno a la Plataforma Educativa? No / Sí</label>
                                            <select  class="form-control" name="moodle" id="moodle">
                                                <option value="no">no</option>
                                                <option value="si">si</option>
                                            </select> 
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <?php
                                    $beca = '
                                        <div class="col-sm-3">
                                            <div class="form-group" data-toggle="tooltip" data-placement="top" title="Puede asignar un porcentaje de descuento a las colegiaturas del estudiante">
                                                <label for="beca_colegiatura">% Beca en colegiatura</label>
                                                  <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">%</span>
                                                    </div>
                                                        <input type="number" value="0" min="0" max="100" class="form-control" id="beca_colegiatura" name="beca_colegiatura" placeholder="Enter beca_colegiatura" required>
                                                    </div>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>
                                        ';
                                    if ($edit) {
                                        echo $beca;
                                    }
                                    ?>                                    
                                </div>
                            </div>
                            <h4>Datos Escolares</h4>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="idicampus">Seleccione un campus</label>
                                        <div id="selectPlantel"></div>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="nivelegreso">Seleccione una oferta</label>
                                        <div id="Oferta-Academica">
                                            <select class="form-control" required>
                                                <option value="">Seleccione un campus</option>
                                            </select>
                                        </div>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="nivelegreso">Seleccione un ciclo escolar</label>
                                            <div id="divCiclo"></div>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="turno">Seleccione un Turno</label>
                                            <div id="seleTurno"></div>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="grupos">Seleccione un Grupo</label>
                                            <div id="seleGrupo"></div>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">                                            
                                        <label for="codigo_credencial">Número de la credencial</label>
                                        <div class="input-group">
                                            <input autofocus type="text" class="form-control" id="iSiteCode" name="iSiteCode" placeholder="opcional" maxlength="10" onchange="validAdeudos()">
                                            <input autofocus type="text" class="form-control" id="codigo_credencial" name="codigo_credencial" placeholder="opcional" maxlength="20" onchange="validAdeudos()">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Plan de Pago</h4>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="vigencia">Seleccione un plan de Pago</label>
                                        <div id="selePlan"></div>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">                      
                            <div class="card">
                                <div class="card-body"> 
                                    <label for="email">Fotografía</label>                                
                                    <div class="bg-light border">
                                        <input type="hidden" name="image" class="image-tag">
                                        <input type="hidden" name="titulo" value="imagen_perfil">
                                        <input type="hidden" name="signaturePicture" id="signaturePicture">
                                        <div id="results" class="text-success text-center">La imagen capturada aparecerá aquí ... <br> Recuerde habilitar el permiso para usar la Camara</div><br>
                                        <br>
                                        <center>
                                            <div class="btn-group pull-right">
                                                <button type="button" class="btn btn-outline-primary btn-sm pull-right" data-toggle="modal" data-target="#photo"><i class="fa fa-camera-retro"></i> Tomar Foto</button>   
                                                <button type="button" class="btn btn-outline-primary btn-sm pull-right" data-toggle="modal" data-target="#signature"><i class="pe pe-7s-pen"></i> Tomar Firma</button>  
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div id="spinner-form"></div>
                    <button type="submit" id="form-submit" class="btn btn-success pull-right ">Inscribir Alumno <i class="far fa-thumbs-up"></i></button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </div>
            </form>

        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="photo">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Capturar foto</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <center>
                        <div id="my_camera"></div>
                        <div id="results" class="text-success text-center"></div>
                        <input class="btn btn-primary" type=button value="Tomar foto" onClick="take_snapshot()">
                    </center>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Seleccione un aspirante de la lista</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div id="Solpes"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="alumno">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Seleccione Un alumno de la lista</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div id="TablaAlumnos"></div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    <label>Escriba su firma en el recuadro de abajo</label>
                    <center class="sigPad">
                        <div id="signArea">
                            <div class="sig sigWrapper" style="height:auto;">
                                <div class="typed"></div>
                                <canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
                            </div>
                        </div>
                        <div class="btn btn-group">
                            <button class="btn btn-success btn-sm" id="btnSaveSign"><span class="pe pe-7s-pen"></span> Tomar firma</button>
                            <button class="btn btn-warning btn-sm clearButton"><a href="#clear"><span class="fa fa-eraser"></span> Limpiar</a></button>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <?php include './footer.php'; ?>
    <script src="asset/js/moodle.js"></script>
    <script src="asset/js/getCicloEscolar.js"></script>
    <script src="asset/js/addalumno_getaOferta.js"></script>
    <script src="asset/js/addalumno_setNivel.js"></script>
    <script src="asset/js/validaCURP.js"></script>
    <script src="asset/js/webcam.min.js"></script>
    <script src="asset/js/addalumno_webcam.js"></script>
    <script src="asset/js/addalumno_forrms.js"></script>

    <link href="sign/css/jquery.signaturepad.css" rel="stylesheet">
    <script src="sign/js/numeric-1.2.6.min.js"></script> 
    <script src="sign/js/bezier.js"></script>
    <script src="sign/js/jquery.signaturepad.js"></script> 

    <script src="asset/js/html2canvas.js"></script>
    <script src="sign/js/json2.min.js"></script>
    <script src="asset/js/sign-area.js"></script>
    <script>function validAdeudos() {}</script>

