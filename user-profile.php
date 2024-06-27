<script src="asset/js/angular.min.js"></script>
<?php include './headers.php'; ?>
<!-- Page-body start -->
<div class="page-body">
    <!--profile cover end-->
    <div class="row">
        <div class="col-lg-12">
            <!-- tab header start -->
            <div class="tab-header card">
                <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Información personal</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#familiar" role="tab">Tutores</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#binfo" role="tab">Escolares</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">Documentación</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#review" role="tab">Escolares</a>
                        <div class="slide"></div>
                    </li>
                </ul>
            </div>
            <!-- tab header end -->
            <!-- tab content start -->
            <div class="tab-content">
                <!-- tab panel personal start -->
                <div class="tab-pane active" id="personal" role="tabpanel">
                    <!-- personal card start -->
                    <?php include './user-profile-general.php'; ?>
                </div>
                <!-- tab pane personal end -->
                <!-- tab pane info start -->
                <div class="tab-pane" id="familiar" role="tabpanel">
                    <!-- info card start -->
                    <div class="card">
                        <?php include './user-profile-tutores.php'; ?>
                    </div>
                </div>
                <!-- tab pane info end -->
                <!-- tab pane info start -->
                <div class="tab-pane" id="binfo" role="tabpanel">
                    <!-- info card start -->
                    <div class="card">
                        info
                    </div>
                </div>
                <!-- tab pane info end -->
                <!-- tab pane contact start -->
                <div class="tab-pane" id="contacts" role="tabpanel">
                    <div class="card">
                        contacto
                    </div>
                </div>
                <!-- tab pane contact end -->
                <div class="tab-pane" id="review" role="tabpanel">
                    <div class="card">
                        review
                    </div>
                </div>
            </div>
            <!-- tab content end -->
        </div>
    </div>
</div>
<!-- Page-body end -->
<?php include './footer.php'; ?>

