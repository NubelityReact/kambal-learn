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

        if (!isset($_FILES["aspirantes_csv"]["name"])) {
            $errorMSG .= " Lo sentimos, no ha seleccionado ningun archivo.";
        } else {
            // Check file size
            if ($_FILES["aspirantes_csv"]["size"] > 500000) {
                $errorMSG .= " Lo sentimos, tu archivo es demasiado grande.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            $allowed = array('csv');
            $filename = $_FILES['aspirantes_csv']['name'];
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
            $file = $_FILES["aspirantes_csv"]["tmp_name"];
            $file_aspirantes = $_FILES["aspirantes_csv"]["name"];
            set_time_limit(10000);
            $fp = fopen($file, "r");
            $txt = "";
            $txt .= '<div id="preload"><h2 class="float-left">Vista Previa de las filas que se han agreagado al sistema</h2>
                    <a href="' . $breadcrumb_btnBack . '" class="btn btn-sm btn-success float-right text-light">Continuar </a>
                    <br><br><br>';
            $txt .= '<br><i class="pe-7s-check pe-2x text-success"></i>' . "<label><strong> Archivo: </strong>$file_aspirantes</label>";
            $txt .= '<div class="table-responsive"> <table id="solpx3" class="table table-striped table-bordered table-hover table-sm nowrap">';
            $txt .= '<thead class="table-primary text-light"> <tr><th>Fila</th><th>Estatus</th><th>Nombre</th><th>Apellidos</th><th>Genero</th><th>Edad</th>
            <th>CURP</th><th>RFC</th><th>NSS</th><th>Email</th><th>Teléfono</th><th>Móvil</th><th>Email 2</th><th>Pais</th><th>Ciudad</th><th>Dirección</th><th>Localidad</th><th>CP</th>
            <th title="Escuela de egreso">Egreso</th><th title="Nivel de egreso">Nivel</th><th>Entidad Federativa</th><th>Año de inicio</th><th>Año de egreso</th><th>Cedula</th><th>Informacion adicional</th><th>Tipo de sangre</th><th>Alergias</th><th>Fecha de nacimiento</th></tr> </thead>';

            $number_row = 0;
            while (!feof($fp)) {
                $number_row = $number_row + 1;
                if (!$line = fgetcsv($fp, 1000, ',', '"')) {
                     continue;
                }
                //Valid rows data set
                if (isset($line[0])) {//Col Nombre
                    $nombre = $line[0];
                } else {
                    $nombre = '';
                }
                if (isset($line[1])) {//Col apellido paterno
                    $apellido_paterno = $line[1];
                } else {
                    $apellido_paterno = '';
                }
                if (isset($line[2])) {//Col apellido materno
                    $apellido_materno = $line[2];
                } else {
                    $apellido_materno = '';
                }
                if (isset($line[3])) {//Col genero
                    $genero = $line[3];
                } else {
                    $genero = '';
                }
                if (isset($line[4])) {//Col edad
                    $edad = $line[4];
                } else {
                    $edad = '';
                }
                if (isset($line[5])) {//Col curp
                    $curp = $line[5];
                } else {
                    $curp = '';
                }
                if (isset($line[6])) {//Col curp
                    $rfc = $line[6];
                } else {
                    $rfc = '';
                }
                if (isset($line[7])) {//Col nss
                    $nss = $line[7];
                } else {
                    $nss = '';
                }
                if (isset($line[8])) {//Col email
                    $email = $line[8];
                } else {
                    $email = '';
                }
                if (isset($line[9])) {//Col telefono
                    $telefono = $line[9];
                } else {
                    $telefono = '';
                }
                if (isset($line[10])) {//Col movil
                    $movil = $line[10];
                } else {
                    $movil = '';
                }
                if (isset($line[11])) {//Col email2
                    $email2 = $line[11];
                } else {
                    $email2 = '';
                }
                if (isset($line[12])) {//Col pais
                    $pais = $line[12];
                } else {
                    $pais = '';
                }
                if (isset($line[13])) {//Col ciudad
                    $ciudad = $line[13];
                } else {
                    $ciudad = '';
                }
                if (isset($line[14])) {//Col direccion
                    $direccion = $line[14];
                } else {
                    $direccion = '';
                }
                if (isset($line[15])) {//Col municipio
                    $municipio = $line[15];
                } else {
                    $municipio = '';
                }
                if (isset($line[16])) {//Col municipio
                    $cp = $line[16];
                } else {
                    $cp = '';
                }
                if (isset($line[17])) {//Col Escuela de egreso
                    $escegreso = $line[17];
                } else {
                    $escegreso = '';
                }
                if (isset($line[18])) {//Col nivel egreso
                    $nivelegreso = $line[18];
                } else {
                    $nivelegreso = '';
                }
                if (isset($line[19])) {//Col entidad federativa
                    $entidad_fed = $line[19];
                } else {
                    $entidad_fed = '';
                }
                if (isset($line[20])) {//Col fecha_inicio
                    $fecha_inicio = $line[20];
                } else {
                    $fecha_inicio = '';
                }
                if (isset($line[21])) {//Col fecha egreso
                    $fechaegreso = $line[21];
                } else {
                    $fechaegreso = '';
                }
                if (isset($line[22])) {//Col cedula
                    $cedula = $line[22];
                } else {
                    $cedula = '';
                }
                if (isset($line[23])) {//Col infoadicional
                    $infoadicional = $line[23];
                } else {
                    $infoadicional = '';
                }
                if (isset($line[24])) {//Col tiposanbre
                    $tiposangre = $line[24];
                } else {
                    $tiposangre = '';
                }
                if (isset($line[25])) {//Col alergias
                    $alergias = $line[25];
                } else {
                    $alergias = '';
                }
                if (isset($line[26])) {//Col fecha de nacimoento
                    $fecha_nacimiento = $line[26];
                } else {
                    $fecha_nacimiento = '';
                }

                include './dataConect/conexion.php';

                // Turn autocommit off
                // $conn->autocommit(FALSE);

                $sql = "INSERT INTO datos_generales (estatus, nombre, apellido_paterno, apellido_materno, genero, edad, curp, rfc, nss, email, telefono, movil, email2, pais, ciudad, direccion, municipio, cp, escegreso, nivelegreso, fechaegreso, infoadicional, tiposangre, alergias, fecha_nacimiento) VALUES "
                        . "('pre-inscrito', '$nombre', '$apellido_paterno', '$apellido_materno', '$genero', '$edad', '$curp', '$rfc', '$nss', '$email', '$telefono', '$movil', '$email2', '$pais', '$ciudad', '$direccion', '$municipio', '$cp', '$escegreso', '$nivelegreso', '$fechaegreso', '$infoadicional', '$tiposangre', '$alergias', '$fecha_nacimiento');";

                if ($conn->query($sql) === TRUE) {
                    $txt .= '<tr><td>' . $number_row . "</td>";
                    $txt .= '<td class="table-success text-ligth"><i class="pe-7s-check pe-2x text-ligth"></i> Agregado Correctamente</td>';
                    $txt .= "<td>" . $nombre . "</td>";
                    $txt .= "<td>" . $apellido_paterno . ' ' . $apellido_materno . "</td>";
                    $txt .= "<td>" . $genero . "</td>";
                    $txt .= "<td>" . $edad . "</td>";
                    $txt .= "<td>" . $curp . "</td>";
                    $txt .= "<td>" . $rfc . "</td>";
                    $txt .= "<td>" . $nss . "</td>";
                    $txt .= "<td>" . $email . "</td>";
                    $txt .= "<td>" . $telefono . "</td>";
                    $txt .= "<td>" . $movil . "</td>";
                    $txt .= "<td>" . $email2 . "</td>";
                    $txt .= "<td>" . $pais . "</td>";
                    $txt .= "<td>" . $ciudad . "</td>";
                    $txt .= "<td>" . $direccion . "</td>";
                    $txt .= "<td>" . $municipio . "</td>";
                    $txt .= "<td>" . $cp . "</td>";
                    $txt .= "<td>" . $escegreso . "</td>";
                    $txt .= "<td>" . $nivelegreso . "</td>";
                    $txt .= "<td>" . $entidad_fed . "</td>";
                    $txt .= "<td>" . $fecha_inicio . "</td>";
                    $txt .= "<td>" . $fechaegreso . "</td>";
                    $txt .= "<td>" . $cedula . "</td>";
                    $txt .= "<td>" . $infoadicional . "</td>";
                    $txt .= "<td>" . $tiposangre . "</td>";
                    $txt .= "<td>" . $alergias . "</td>";
                    $txt .= "<td>" . $fecha_nacimiento . "</td></tr>";
                } else {
                    $txt .= '<tr><td>' . $number_row . "</td>";
                    $txt .= '<td class="table-danger text-ligth"><i class="pe-7s-close-circle pe-2x text-ligth"></i> '. $conn->error.'</td>';
                    $txt .= "<td>" . $nombre . "</td>";
                    $txt .= "<td>" . $apellido_paterno . ' ' . $apellido_materno . "</td>";
                    $txt .= "<td>" . $genero . "</td>";
                    $txt .= "<td>" . $edad . "</td>";
                    $txt .= "<td>" . $curp . "</td>";
                    $txt .= "<td>" . $rfc . "</td>";
                    $txt .= "<td>" . $nss . "</td>";
                    $txt .= "<td>" . $email . "</td>";
                    $txt .= "<td>" . $telefono . "</td>";
                    $txt .= "<td>" . $movil . "</td>";
                    $txt .= "<td>" . $email2 . "</td>";
                    $txt .= "<td>" . $pais . "</td>";
                    $txt .= "<td>" . $ciudad . "</td>";
                    $txt .= "<td>" . $direccion . "</td>";
                    $txt .= "<td>" . $municipio . "</td>";
                    $txt .= "<td>" . $cp . "</td>";
                    $txt .= "<td>" . $escegreso . "</td>";
                    $txt .= "<td>" . $nivelegreso . "</td>";
                    $txt .= "<td>" . $entidad_fed . "</td>";
                    $txt .= "<td>" . $fecha_inicio . "</td>";
                    $txt .= "<td>" . $fechaegreso . "</td>";
                    $txt .= "<td>" . $cedula . "</td>";
                    $txt .= "<td>" . $infoadicional . "</td>";
                    $txt .= "<td>" . $tiposangre . "</td>";
                    $txt .= "<td>" . $alergias . "</td>";
                    $txt .= "<td>" . $fecha_nacimiento . "</td></tr>";
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
<script>
    var table = $('#solpx3').DataTable();
    //$('#preload').hide();
    $("#btn_continue").click(function () {
        var txt;
        var r = confirm("Esta seguro de subir los datos? ");
        if (r) {
            $('#preload').hide();
            $("#load").html('<div class="alert alert-info"><strong>Espere</strong> Cargando Contenido ... Esta acción puede tardar unos momentos <i class="pe-7s-config pe-spin pe-2x pe-va"></i></div>');

            var files = "<?php echo $_POST["aspirantes_csv"]; ?>";
            $.ajax({
                type: "POST",
                url: "newEmptyPHP.php",
                data: "action=upload_aspirantes_csv&tmp_file=" + files.3,
                success: function (text) {
                    $("#load").html(text);
                }
            });
        } else {
            txt = "You pressed Cancel!";
        }
    });

</script>
