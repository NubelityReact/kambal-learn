<?php include './headers.php'; ?>
<link rel="stylesheet" href="asset/css/animate.css">
<div class="card  card-border-success">
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
        <hr>
        <form role="form" id="config_kambal" data-toggle="validator" class="shake" autocomplete="off">
            <div class="card-block user-detail-card">
                <div class="row">
                    <div class="col-4 user-detail">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-image"></i>Logo de la organización :</h6>
                                <label>
                                    El logotipo aparecerá en los documentos que se creen (reportes, facturas, etc.)<br>
                                    Tamaño de imagen preferido: 240px x 240px @ 72 DPI Tamaño máximo de 1MB.
                                </label>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30">
                                    <center> 
                                        <div id="preview" class="bg-light border"></div>
                                        <button class="btn btn-sm btn-outline-primary" type="button" id="changeLogo" data-toggle="modal" data-target="#modalLogo">
                                            Cargue su Logotipo
                                        </button>
                                        <input maxlength="150" type="hidden" class="form-control" id="idiconfig" name="idiconfig" placeholder="Enter file">
                                        <input maxlength="150" type="hidden" class="form-control" id="idifactura" name="idifactura" placeholder="Enter file">
                                        <div class="help-block with-errors text-danger"></div>
                                    </center> 
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 user-detail">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-hospital"></i>Nombre Corto :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="shortname" name="shortname" readonly="true"><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-document-search"></i>Descripción</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="summary" name="summary" required><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-document-search"></i>Clave de la institución</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="50" type="text" class="form-control" id="clave_instituto" name="clave_instituto" required><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-dart"></i>RFC para la emisión de facturas :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="rfc" name="rfc"><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-bank"></i>Banco para depósitos:</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="banco" name="banco"><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-plus"></i>Clave Interbancaria :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="ClaveInterbancaria" name="ClaveInterbancaria"><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>  

                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-home"></i>Calle</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="Calle" name="Calle" required><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-numbered"></i>Número interior :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="number" class="form-control" id="NoInterior" name="NoInterior"><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-home"></i>Localidad :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="Localidad" name="Localidad" required><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-home"></i>Municipio :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="Municipio" name="Municipio" required><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-comment"></i>País :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="country" name="country" required><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-home"></i>Ciudad :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="defaultcity" name="defaultcity" required><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 user-detail">                         
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-hospital"></i>Nombre de la institución</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="fullname" name="fullname" required><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-users-social"></i>Sitio Web :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="url" class="form-control" id="website" name="website" required=""><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-email"></i>Email: Contacto principal</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="Email" name="Email" required><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-users-social"></i>Tipo de persona :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="persona" name="persona" required><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-tasks"></i>Número de Cuenta :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input type="text" class="form-control" id="NoCuenta" name="NoCuenta"><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>                      
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-numbered"></i>Número exterior :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input type="number" class="form-control" id="NoExterior" name="NoExterior" required><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-home"></i>Colonia :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="Colonia" name="Colonia" required><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-attachment"></i>Referencia :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="Referencia" name="Referencia"><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-home"></i>Estado :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="estado" name="estado" required><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-ui-home"></i>Código Postal :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="cp" name="cp" required><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-clip"></i>Teléfono :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30">
                                    <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="Telefono" name="Telefono" required><div class="help-block with-errors"></div></h6>
                                </h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-web"></i>URL LMS :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30">
                                    <h6 class="m-b-30"><input maxlength="150" type="text" class="form-control" id="lms_domainname" name="lms_domainname" placeholder="Example: http://www.domainname.com/"><div class="help-block with-errors"></div></h6>
                                </h6>
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="f-w-400 m-b-30"><i class="icofont icofont-key"></i>Token LMS :</h6>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="m-b-30"><input maxlength="40" type="text" class="form-control" id="lms_token" name="lms_token"><div class="help-block with-errors"></div></h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <button type="submit" id="form-submit" class="btn btn-success pull-right "><i class="pe pe-2x pe-7s-diskette"></i> Guardar Datos</button>
            <div id="msgSubmit" class="h3 text-center hidden"></div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="modalLogo">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Seleccione una imagen</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <link href="asset/css/style.css" rel="stylesheet" />
                <form id="upload" method="post" action="core_config_kambal_uploadimage.php" enctype="multipart/form-data">
                    <div id="drop">
                        Arrastre aquí
                        <a>Buscar en el equipo</a>
                        <input type="file" name="upl"  id="upl"/>
                        <ul>
                            <!-- The file uploads will be shown here -->
                        </ul>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<?php include './footer.php'; ?>

<!-- JavaScript Includes -->
<script src="asset/js/jquery.knob.js"></script>

<!-- jQuery File Upload Dependencies -->
<script src="asset/js/jquery.ui.widget.js"></script>
<script src="asset/js/jquery.iframe-transport.js"></script>
<script src="asset/js/jquery.fileupload.js"></script>
<!-- Our main JS file -->
<script src="asset/js/script.js"></script>
<script src="asset/js/core_config_kambal.js"></script>

