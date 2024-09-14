<?php

student_upload_file();

function student_upload_file() {
    $errorMSG = "";
    // A list of permitted file extensions
    $allowed = array('png', 'jpg', 'gif', 'jpeg', 'svg');
    //idialumno
    // if (empty($_POST["idiconfig"])) {
    //     $errorMSG = "idiconfig is required ";
    // } else {
    //     $idiconfig = $_POST["idiconfig"];
    // }


    if ($errorMSG == "") {
        if (0 < $_FILES['upl']['error']) {
            echo 'Error: ' . $_FILES['upl']['error'];
        } else {
            $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
            $tamanio = $_FILES['upl']['size'];

            if (!in_array(strtolower($extension), $allowed) || $tamanio > 5242880) {// 5 MB (this size is in bytes)
                echo 'Solamente se permiten archivos en formato png, jpg, gif con un tamaño máximo de 1MB';
            } else {
                $nombre = $_FILES['upl']['name'];
                $tipo = $_FILES['upl']['type'];
                $image = $_FILES['upl']['tmp_name'];
                // $archivo = addslashes(file_get_contents($image));
                move_uploaded_file($_FILES['upl']['tmp_name'], 'asset/images/logo/' . $_FILES['upl']['name']);
                include './dataConect/touploadfile.php';
                $sql = "UPDATE tbconfig set  file_name='$nombre', files_size='$tamanio', files_type='$tipo' WHERE idiconfig=1";
                if ($conn->query($sql) === TRUE) {
                    echo "success";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
        }
    } else {
        if ($errorMSG == "") {
            echo "Something went wrong :(";
        } else {
            echo $errorMSG;
        }
    }
}


function getImageOferta() {
        $errorMSG = '';
        if (empty($_GET["idicarrera"])) {
            $errorMSG .= "idicarrera is required ";
        } else {
            $idicarrera = $_GET["idicarrera"];
        }
        if ($errorMSG == '') {
            include './touploadfile.php';
            $sql = "SELECT img_file FROM carrera WHERE idicarrera = '$idicarrera';";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $file = $row["img_file"];
                }
                echo '<img class="img-fluid p-b-10" width="60%" src="data:image/jpeg;base64,' . base64_encode($file) . '"/>';
            } else {
                echo '<img src="asset/images/picture_not_available.jpg" class="img-fluid p-b-10">';
            }
            $conn->close();
        } else {
            echo $errorMSG;
        }
    }