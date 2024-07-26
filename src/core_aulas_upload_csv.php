<?php
/**
 * @author Ing. Bernabe Gutierrez Rodriguez
 */
include './headers.php'
?>
<div class="card card-border-success">
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
        <div id="load"></div>
        <?php
        $errorMSG = "";
        $uploadOk = 1;

        if (!isset($_FILES["aulas_csv"]["name"])) {
            $errorMSG .= " Lo sentimos, no ha seleccionado ningun archivo.";
        } else {
            // Check file size
            if ($_FILES["aulas_csv"]["size"] > 500000) {
                $errorMSG .= " Lo sentimos, tu archivo es demasiado grande.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            $allowed = array('csv');
            $filename = $_FILES['aulas_csv']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                $errorMSG .= " Lo sentimos, solo se permiten archivos CSV.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $errorMSG .= " Lo sentimos, su archivo no fue subido.";
                // if everything is ok, try to upload file
            }
        }

        if ($errorMSG == "") {
            $file = $_FILES["aulas_csv"]["tmp_name"];
            $file_aspirantes = $_FILES["aulas_csv"]["name"];
            set_time_limit(10000);
            $fp = fopen($file, "r");
            $txt = "";
            $txt .= '<div id="preload"><h2 class="float-left">Vista Previa de las filas que se han agreagado al sistema</h2>
                    <a href="' . $breadcrumb_btnBack . '" class="btn btn-sm btn-success float-right text-light">Continuar </a>
                    <br><br><br>';
            $txt .= '<br><i class="pe-7s-check pe-2x text-success"></i>' . "<label><strong> Archivo: </strong>$file_aspirantes</label>";
            $txt .= '<div class="table-responsive"> <table id="solpx3" class="table table-striped table-bordered table-hover table-sm nowrap">';
            $txt .= '<thead class="table-primary text-light"> <tr><th>Fila</th><th>Estatus</th><th>ID Campus</th><th>Clave</th><th>Descripción</th><th>Capacidad</th><th>Estatus</th></tr> </thead>';
            $number_row = 0;
            $errorMSG == "";
            while (!feof($fp)) {
                $number_row = $number_row + 1;
                if (!$line = fgetcsv($fp, 100, ',', '"')) {
                    continue;
                }
                //Valid rows data set
                if (isset($line[0])) {//$idicampus
                    $idicampus = $line[0];
                } else {
                    $idicampus = ' ID Campus es requerida';
                }
                if (isset($line[1])) {//Col $clave
                    $clave = $line[1];
                } else {
                    $clave = ' La clave es requerido';
                }
                if (isset($line[2])) {//Col $descripcion
                    $descripcion = $line[2];
                } else {
                    $descripcion = ' La descripción es requerido';
                }
                if (isset($line[3])) {//Col estatus
                    $capacidad = $line[3];
                } else {
                    $capacidad = '1';
                }
                if (isset($line[4])) {//Col estatus
                    $estatus = $line[4];
                } else {
                    $estatus = '1';
                }

                include './dataConect/conexion.php';
                $sql = "INSERT INTO cAulas (idicampus, Clave, Descripcion, Capacidad, Estatus) VALUES "
                        . "('$idicampus', '$clave', '$descripcion', '$capacidad', '$estatus');";

                if ($conn->query($sql) === TRUE) {
                    $txt .= '<tr>';
                    $txt .= '<td>' . $number_row . "</td>";
                    $txt .= '<td class="table-success text-ligth"><i class="pe-7s-check pe-2x text-ligth"></i> Agregado Correctamente</td>';
                    $txt .= "<td>" . $idicampus . "</td>";
                    $txt .= "<td>" . $clave . "</td>";
                    $txt .= "<td>" . $descripcion . "</td>";
                    $txt .= "<td>" . $capacidad . "</td>";
                    $txt .= "<td>" . $estatus . "</td>";
                    $txt .= "</tr>";
                } else {
                    $txt .= '<tr>';
                    $txt .= '<td>' . $number_row . "</td>";
                    $txt .= '<td class="table-danger text-ligth"><i class="pe-7s-close-circle pe-2x text-ligth"></i> ' . $conn->error . '</td>';
                    $txt .= "<td>" . $idicampus . "</td>";
                    $txt .= "<td>" . $clave . "</td>";
                    $txt .= "<td>" . $descripcion . "</td>";
                    $txt .= "<td>" . $capacidad . "</td>";
                    $txt .= "<td>" . $estatus . "</td>";
                    $txt .= "</tr>";
                }
                $conn->close();
            }
            fclose($fp);
            $txt .= "</table> </div></div>";
            echo $txt;
        } else {
            if ($errorMSG == "") {
                $var = false;
                echo "Something went wrong :(";
            } else {
                echo '<br><div class="alert alert-danger">
                        <strong>Error!</strong> ' . $errorMSG . '
                      </div>';
                ?>
                <script>
                    document.getElementById("btn_continue").style.visibility = "hidden";
                </script>
                <?php
                $var = false;
            }
        }
        ?>
    </div></div>
<?php include './footer.php'; ?>

