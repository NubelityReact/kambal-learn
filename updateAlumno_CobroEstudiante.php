<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #f1f1f1;
    }


    h1 {
        text-align: center;  
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }


    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;  
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #4CAF50;
    }
</style>

<div class="card card-border-success">
    <!--    <div class="card-header bg-fos text-light">Agregar cobro a estudiante</div>-->
    <div class="card-body">
        <form role="form" id="regForm" data-toggle="validator" class="shake" autocomplete="off">       
            <div class="tab">
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
                <div class="card">
                    <div class="card-body">
                        <div class="row form-group mb-1">
                            <div class="col-sm-3">
                                <label class="col-form-label">Seleccione un estudiante</label>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group" style="margin-bottom: 0px;">
<!--                                    <input name="nombre" title="Nombre del estudiante" id="nombre" class="form-control" placeholder="Nombre del alumno" type="text" required>-->
                                    <input name="idialumno" id="idialumno" value="<?php echo $_GET['idialumno']; ?>"  placeholder="Nombre del idialumno" class="form-control" type="text" required>
                                    <input name="idiventa"  id="idiventa" placeholder="Nombre del idiventa" class="form-control" type="text" required>
<!--                                    <input name="idiventa_as_servicio " id="idiventa" class="form-control" type="hidden" required>-->
                                    <input name="folio" title="Nombre del estudiante" id="folio" class="form-control" type="hidden" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--                            <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="carrera">Carrera</label>
                                                                <input type="text" class="form-control" id="carrera" name="carrera" required>
                                                                <div class="help-block with-errors text-danger"></div>
                                                            </div>
                                                        </div>-->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="matricula">Mátricula</label>
                                    <input type="text" class="form-control" id="matricula" name="matricula" required value="Poner aqui matricula">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <!--                        <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="turno">Turno</label>
                                                            <input type="text" class="form-control" id="turno" name="turno" required>
                                                            <div class="help-block with-errors text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="cuatrimestre">Cuatrimestre</label>
                                                            <input type="text" class="form-control" id="cuatrimestre" name="cuatrimestre" required>
                                                            <div class="help-block with-errors text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="estatus">Estatus del estudiante</label>
                                                            <input type="text" class="form-control" id="estatus" name="estatus" required>
                                                            <div class="help-block with-errors text-danger"></div>
                                                        </div>
                                                    </div>
                                                </div>-->
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="d-flex">
                    <div class="p-2 mr-auto">
                        <div class="page-header-title">
                            <i class="pe-7s-cart bg-c-pink"></i>
                            <div class="d-inline">
                                <h4>Detalle del cargo</h4>
                                <span id="infoAlumno"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <div class="row form-group mb-1">
                            <div class="col-sm-12">
                                <label class="col-form-label">Seleccione un servicio</label>
                                <div class="input-group" style="margin-bottom: 0px;">
                                    <input type="text"  class="form-control" id="descripcion" name="descripcion" required readonly="true">
                                    <input name="idiservicio" title="idiservicio" id="idiservicio" class="form-control" placeholder="Nombre del idiservicio" type="hidden" required>
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-sm btn-primary" id="search-client" data-toggle="modal" data-target="#modalMateriales">Seleccione un servicio <i class="pe-7s-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="text" class="form-control" id="precio" name="precio" placeholder="Ingrese precio" required readonly="true">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="unidad">Cantidad</label>
                                    <input type="number" min="1" value="1" class="form-control" id="unidad" name="unidad" placeholder="Ingrese unidad" required>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <!--div class="col-sm-4">
                                <div class="form-group">
                                    <label for="descuento">Descuento</label>
                                    <input type="text" class="form-control" id="descuento" name="descuento" placeholder="Ingrese descuento" readonly="true">
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div-->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="metodo_pago">Método pago</label>
                                    <select class="form-control" class="form-control" id="metodo_pago" name="metodo_pago" placeholder="Ingrese metodo_pago" required>
                                        <option value="EFECTIVO">EFECTIVO</option>
                                        <option value="TARJETA DE CRÉDITO">TARJETA DE CRÉDITO</option>
                                        <option value="TARJETA DE DÉBITO">TARJETA DE DÉBITO</option>
                                        <option value="TRANSFERENCIA BANCARIA">TRANSFERENCIA BANCARIA</option>
                                    </select>
                                    <div class="help-block with-errors text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <button type="button" id="add-partida" class="btn btn-success" style="margin-top: 1.5em;" onclick="setPartida()"> <i class="pe-7s-cart"></i> Agregar Servicio</button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-9"><div id="partidasServicios"></div></div>
                            <div class="col-sm-3"><div id="subtotalVent"></div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <!-- Invoice card start -->
                <div class="card">
                    <center><h2>Resumén</h2></center>
                    <div class="card-block">
                        <div class="row invoive-info">
                            <div class="col-md-4 col-xs-12 invoice-client-info">
                                <h6>Información del alumno :</h6>
                                <h6 class="m-0" id="invoice-alumno"></h6>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <h6>Información del cobro :</h6>
                                <table class="table table-responsive invoice-table invoice-order table-borderless">
                                    <tbody>
                                        <tr>
                                            <th>Fecha :</th>
                                            <td id="invoice-fecha"></td>
                                        </tr>
                                        <tr>
                                            <th>Método de pago :</th>
                                            <td>
                                                <span class="label label-warning" id="invoice-mp"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>folio :</th>
                                            <td id="invloice-folio">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <h6 class="text-uppercase text-primary">Atendido por: <?php echo $globalNombre ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <div id="invoice-detail-table"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="sel1">Estatus del Pago</label>
                                            <select class="form-control" id="estatus" name="estatus">
                                                <option value="Pagado">Pagado</option>
                                                <option value="Pendiente">Pendiente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="comentarios">Comentarios</label>
                                            <input type="text" class="form-control" id="comentarios" name="comentarios">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div id="invoice-total"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Invoice card end -->
            </div>
            <div id="partida"></div>

            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" class="btn btn-info" id="prevBtn" onclick="nextPrev(-1)">Regresar</button>
                    <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Siguente</button>
                    <button type="submit" id="form-submit-cobro" class="btn btn-primary" style="display: none;">Guardar Cargos</button>
                </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
            <div id="msgSubmit" class="h3 text-center hidden"></div>
            <div class="clearfix"></div>
        </form>

    </div>
</div>

<!-- The Modal Materiales -->
<div class="modal" id="modalMateriales">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Seleccione un servicio</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="loadTableServicios"></div>
            </div>
        </div>
    </div>
</div>

<!--
<script src="asset/js/cobro_getAlumno.js"></script>-->
<script>
    var idialumno = <?php echo $_GET['idialumno']; ?>;
</script>
<script src="asset/js/updateAlumno_getServiciosByIdAlumno.js"></script>
<script src="asset/js/cobro_invoice.js"></script>
<script src="asset/js/updateAlumno_getFolioVenta.js"></script>
<script src="asset/js/cobro_setPago.js"></script>
<script src="asset/js/updateAlumno_FormSteps.js"></script>


