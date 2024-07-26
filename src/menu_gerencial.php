<div class="card card-border-success">
    <div class="card-body">
        <div class="d-flex">
            <div class="p-2 mr-auto">
                <div class="page-header-title">
                    <i class="<?php echo "$breadcrumb_icon $breadcrumb_icon_color"; ?>"></i>
                    <div class="d-inline">
                        <h4><?php echo $breadcrumb_descripcion; ?></h4>            
                        <label><?php echo $breadcrumb_resumen; ?></label><br>
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
        <div class="text-right bg-white cfos"><h4><?php echo $fullname; ?></h4></div>
        <div class="row">
            <div class="col-sm-3">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="icofont icofont-group-students bg-c-blue card1-icon"></i>
                        <span class="text-c-blue f-w-600">Número de aspirantes</span>
                        <h4> <span id="aspirantes" class="aspirantes"><span/><?php echo $globalIdiUsurio; ?></h4>
                        <div>
                            <span class="f-left m-t-10 text-muted">
                                <a href="getDatosGenerales.php"><i class="text-c-blue f-16 icofont icofont-user m-r-10"></i>Ver detalles</a>
                            </span>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-sm-3">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="icofont icofont-school-bag bg-c-orenge card1-icon"></i>
                        <span class="text-c-orange f-w-600">Número de Alumnos</span>
                        <h4><span id="alumnos"><span/></h4>
                        <div>
                            <span class="f-left m-t-10 text-muted">
                                <a href="getAlumnos.php"><i class="text-c-blue f-16 icofont icofont-user m-r-10"></i>Ver detalles</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="icofont icofont-student-alt bg-c-green card1-icon"></i>
                        <span class="text-c-green f-w-600">Hombres</span>
                        <h4><span id="men"><span/></h4>
                        <div>
                            <span class="f-left m-t-10 text-muted">
                                &nbsp;
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="icofont icofont-student bg-c-pink card1-icon"></i>
                        <span class="text-c-pink f-w-600">Mujeres</span>
                        <h4><span id="women"><span/></h4>
                        <div>
                            <span class="f-left m-t-10 text-muted">
                                &nbsp;
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        
        <h5>Ingresos de Hoy</h5><br>
        <div id="cards-cash">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="fas fa-dollar-sign bg-c-blue card1-icon"></i>
                            <span class="text-c-blue f-w-600">Total</span>
                            <h4 id="t1"> </h4>
                        </div>
                    </div> 
                </div>
                <div class="col-sm-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="fas fa-money-bill-alt bg-c-pink card1-icon"></i>
                            <span class="text-c-blue f-w-600">Pago en fectivo</span>
                            <h4 id="t2"> </h4>
                        </div>
                    </div> 
                </div>
                <div class="col-sm-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="fas fa-money-check bg-c-yellow card1-icon"></i>
                            <span class="text-c-blue f-w-600">Pago con tarjeta</span>
                            <h4 id="t3"> </h4>
                        </div>
                    </div> 
                </div>
                <div class="col-sm-3">
                    <div class="card widget-card-1">
                        <div class="card-block-small">
                            <i class="fas fa-money-check-alt bg-c-green card1-icon"></i>
                            <span class="text-c-blue f-w-600">Deposito bancario</span>
                            <h4 id="t4"> </h4>
                        </div>
                    </div> 
                </div>
            </div>

        </div>
<!--        
        <h5>Alumnos por campus</h5>-->
<!--        <div class="row">
            <div class="col-sm-3">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="icofont icofont-numbered bg-c-yellow card1-icon"></i>
                        <span class="text-c-pink f-w-600">Tlanepantla</span>
                        <h4><span id="tl"><span/></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="icofont icofont-numbered bg-c-green card1-icon"></i>
                        <span class="text-c-pink f-w-600">Zumpango</span>
                        <h4><span id="zu"><span/></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="icofont icofont-numbered bg-c-pink card1-icon"></i>
                        <span class="text-c-pink f-w-600">Izcalli</span>
                        <h4><span id="iz"><span/></h4>
                    </div>
                </div>
            </div>
        </div>-->

    </div>
</div>
