<?php

/**
 * Función para buscar en un array bidimensional de manera recursiva
 * @param string $needle cadena a buscar
 * @param array $haystack array con los valores
 * @param boolean $strict (default false) Determina si se busca de manera estricta (tiene que coincidir el valor y el tipo de campo)
 * @return true|false
 */
$url = $_SERVER["REQUEST_URI"];
$perm = str_replace("/control-escolar/", "", "$url");
$extension = explode("?", $perm);

function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }
    return false;
}

$role_list = getPermisionsHasRole($idirole);
$PermisionsHasRole = $role_list;
$PermisionsHasRoleJson = json_encode($PermisionsHasRole, JSON_PRETTY_PRINT);

if (in_array_r($extension[0], $role_list)) {
    //print_r($PermisionsHasRole);
} else {
    ?> 
    <script>
        alert('No cuenta con los permisos para ingresar a este módulo');
        location.href = "menu.php";
    </script>
    <?php

}

function getPermisionsHasRole($idirole) {
    include './dataConect/conexion.php';
    $sql = "SELECT
            role_as_permiso.idirol_permiso,
            role.role,
            role.idirole,
            permiso.idipermiso,
            permiso.descripcion,
            permiso.permiso,
            permiso.categoria,
            permiso.resumen,
            permiso.btnBack,
            permiso.showInMenu,
            permiso.icon,
            permiso.icon_color
            FROM
            role_as_permiso
            INNER JOIN role ON role_as_permiso.idirole = role.idirole
            INNER JOIN permiso ON role_as_permiso.idipermiso = permiso.idipermiso
            WHERE
            role.idirole = $idirole";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows['data'][] = $row;
        }
        return $rows;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
