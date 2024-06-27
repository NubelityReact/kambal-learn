<?php include './headers.php'; ?>
<div class="row">
    <div class="col-12">
        <div class="card card-border-danger">
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
            </div>

            <div class="card card-border-danger">
                <div class="card-body">
                    <h2 class="cfos" id="form_title"></h2>
                    <h4 class="cfos" id="form_description"></h4>
                    <hr>
                    <!--form script for table New Form--> 
                    <form role="form" id="custom_form" data-toggle="validator" class="shake" autocomplete="off">
                        <div id="input_idigenerales"></div>
                        <div id="container"></div>
                        <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Guardar</button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include './footer.php';
$input_idigenerales = '';
if (empty($_GET["p"])) {
    $input_idigenerales .= '';
} else {
    $idigenerales = $_GET["p"];
    $input_idigenerales = '<input type="hidden" id="idigenerales" name="idigenerales" value="' . $idigenerales . '" required>';
}
?>
<script>
    $(document).ready(function () {
        $('#input_idigenerales').html('<?php print_r($input_idigenerales); ?>');
        var idicustomform = "<?php print_r($_GET['idicustomform']); ?>";
        preview(idicustomform);
    });

</script>
<script type="text/javascript" src="asset/js/core_custom_form_inputs_get.js"></script>
<script type="text/javascript" src="asset/js/add_custom_form.js"></script>


