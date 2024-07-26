<?php

$idiuser = $globalIdiUsurio;
$idirole = $globalIdirole;
getPermisosFromGerencia($idiuser);
getPermisosAlumnos($idiuser);
getPermisosAdmision($idiuser);
getPermisosServicios($idiuser);
getReportes($idiuser, $idirole);
getPermisosControlEscolar($idiuser);
getPermisosProfesores($idiuser);
getPlanes($idiuser, $idirole);
getCatalogos($idiuser, $idirole);
getConfiguracion($idiuser, $idirole);

function getPermisosFromGerencia($idiuser) {
    include './dataConect/conexion.php';
    //Gerencia
    $sql = "SELECT role_as_permiso.idirol_permiso, role_as_permiso.idirole, role_as_permiso.idipermiso, role_as_permiso.fecha, role.role, role.estatus, role.edit, role.fecha, permiso.showInMenu, permiso.descripcion, permiso.permiso, permiso.categoria, permiso.fecha, tbuser.idigenerales, tbuser.idiconfig, tbuser.idirole, tbuser.`user`, tbuser.`password`, tbuser.fecha, tbuser.estatus, tbuser.categoria FROM role_as_permiso INNER JOIN role ON role_as_permiso.idirole = role.idirole INNER JOIN tbuser ON tbuser.idirole = role.idirole INNER JOIN permiso ON role_as_permiso.idipermiso = permiso.idipermiso WHERE tbuser.idiuser = $idiuser AND permiso.categoria = 'Gerencia' AND permiso.showInMenu = 'Si' AND tbuser.estatus = 'Activo'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-medall"></i><b>G</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Gerencia</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function getPermisosControlEscolar($idiuser) {
    include './dataConect/conexion.php';
    $sql = "SELECT role_as_permiso.idirol_permiso, role_as_permiso.idirole, role_as_permiso.idipermiso, role_as_permiso.fecha, role.role, role.estatus, role.edit, role.fecha, permiso.showInMenu, permiso.descripcion, permiso.permiso, permiso.categoria, permiso.fecha, tbuser.idigenerales, tbuser.idiconfig, tbuser.idirole, tbuser.`user`, tbuser.`password`, tbuser.fecha, tbuser.estatus, tbuser.categoria FROM role_as_permiso INNER JOIN role ON role_as_permiso.idirole = role.idirole INNER JOIN tbuser ON tbuser.idirole = role.idirole INNER JOIN permiso ON role_as_permiso.idipermiso = permiso.idipermiso WHERE tbuser.idiuser = $idiuser AND permiso.categoria = 'Control escolar' AND permiso.showInMenu = 'Si' AND tbuser.estatus = 'Activo'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="icofont icofont-school-bag"></i><b>CE</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Control Escolar</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function getPermisosAdmision($idiuser) {
    include './dataConect/conexion.php';
    $sql = "SELECT role_as_permiso.idirol_permiso, role_as_permiso.idirole, role_as_permiso.idipermiso, role_as_permiso.fecha, role.role, role.estatus, role.edit, role.fecha, permiso.showInMenu, permiso.descripcion, permiso.permiso, permiso.categoria, permiso.fecha, tbuser.idigenerales, tbuser.idiconfig, tbuser.idirole, tbuser.`user`, tbuser.`password`, tbuser.fecha, tbuser.estatus, tbuser.categoria FROM role_as_permiso INNER JOIN role ON role_as_permiso.idirole = role.idirole INNER JOIN tbuser ON tbuser.idirole = role.idirole INNER JOIN permiso ON role_as_permiso.idipermiso = permiso.idipermiso WHERE tbuser.idiuser = $idiuser AND permiso.categoria = 'Admisión' AND permiso.showInMenu = 'Si' AND tbuser.estatus = 'Activo'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="icofont icofont-group-students card1-icon"></i><b>A</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Aspirantes</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function getPermisosAlumnos($idiuser) {
    include './dataConect/conexion.php';
    $sql = "SELECT role_as_permiso.idirol_permiso, role_as_permiso.idirole, role_as_permiso.idipermiso, role_as_permiso.fecha, role.role, role.estatus, role.edit, role.fecha, permiso.showInMenu, permiso.descripcion, permiso.permiso, permiso.categoria, permiso.fecha, tbuser.idigenerales, tbuser.idiconfig, tbuser.idirole, tbuser.`user`, tbuser.`password`, tbuser.fecha, tbuser.estatus, tbuser.categoria FROM role_as_permiso INNER JOIN role ON role_as_permiso.idirole = role.idirole INNER JOIN tbuser ON tbuser.idirole = role.idirole INNER JOIN permiso ON role_as_permiso.idipermiso = permiso.idipermiso WHERE tbuser.idiuser = $idiuser AND permiso.categoria = 'Alumnos' AND permiso.showInMenu = 'Si' AND tbuser.estatus = 'Activo'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="icofont icofont-school-bag card1-icon"></i><b>Al</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Alumnos</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function getPermisosServicios($idiuser) {
    include './dataConect/conexion.php';
    $sql = "SELECT role_as_permiso.idirol_permiso, role_as_permiso.idirole, role_as_permiso.idipermiso, role_as_permiso.fecha, role.role, role.estatus, role.edit, role.fecha, permiso.showInMenu, permiso.descripcion, permiso.permiso, permiso.categoria, permiso.fecha, tbuser.idigenerales, tbuser.idiconfig, tbuser.idirole, tbuser.`user`, tbuser.`password`, tbuser.fecha, tbuser.estatus, tbuser.categoria FROM role_as_permiso INNER JOIN role ON role_as_permiso.idirole = role.idirole INNER JOIN tbuser ON tbuser.idirole = role.idirole INNER JOIN permiso ON role_as_permiso.idipermiso = permiso.idipermiso WHERE tbuser.idiuser = $idiuser AND permiso.categoria = 'Servicios' AND permiso.showInMenu = 'Si' AND tbuser.estatus = 'Activo'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-money"></i><b>S</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Servicios</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function getCatalogosServiciosEscolares($idiuser) {
    include './dataConect/conexion.php';
    $sql = "SELECT role_as_permiso.idirol_permiso, role_as_permiso.idirole, role_as_permiso.idipermiso, role_as_permiso.fecha, role.role, role.estatus, role.edit, role.fecha, permiso.showInMenu, permiso.descripcion, permiso.permiso, permiso.categoria, permiso.fecha, tbuser.idigenerales, tbuser.idiconfig, tbuser.idirole, tbuser.`user`, tbuser.`password`, tbuser.fecha, tbuser.estatus, tbuser.categoria FROM role_as_permiso INNER JOIN role ON role_as_permiso.idirole = role.idirole INNER JOIN tbuser ON tbuser.idirole = role.idirole INNER JOIN permiso ON role_as_permiso.idipermiso = permiso.idipermiso WHERE tbuser.idiuser = $idiuser AND permiso.categoria = 'Catálogos' AND permiso.showInMenu = 'Si' AND tbuser.estatus = 'Activo'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-money"></i><b>S</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Servicios Escolares</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function getCatalogosControlEscolar($idiuser) {
    include './dataConect/conexion.php';
    $sql = "SELECT role_as_permiso.idirol_permiso, role_as_permiso.idirole, role_as_permiso.idipermiso, role_as_permiso.fecha, role.role, role.estatus, role.edit, role.fecha, permiso.showInMenu, permiso.descripcion, permiso.permiso, permiso.categoria, permiso.fecha, tbuser.idigenerales, tbuser.idiconfig, tbuser.idirole, tbuser.`user`, tbuser.`password`, tbuser.fecha, tbuser.estatus, tbuser.categoria FROM role_as_permiso INNER JOIN role ON role_as_permiso.idirole = role.idirole INNER JOIN tbuser ON tbuser.idirole = role.idirole INNER JOIN permiso ON role_as_permiso.idipermiso = permiso.idipermiso WHERE tbuser.idiuser = $idiuser AND permiso.categoria = 'Catálogo_Escolares' AND permiso.showInMenu = 'Si' AND tbuser.estatus = 'Activo'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-money"></i><b>CE</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Control Escolar</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function getPermisosProfesores($idiuser) {
    include './dataConect/conexion.php';
    $sql = "SELECT role_as_permiso.idirol_permiso, role_as_permiso.idirole, role_as_permiso.idipermiso, role_as_permiso.fecha, role.role, role.estatus, role.edit, role.fecha, permiso.showInMenu, permiso.descripcion, permiso.permiso, permiso.categoria, permiso.fecha, tbuser.idigenerales, tbuser.idiconfig, tbuser.idirole, tbuser.`user`, tbuser.`password`, tbuser.fecha, tbuser.estatus, tbuser.categoria FROM role_as_permiso INNER JOIN role ON role_as_permiso.idirole = role.idirole INNER JOIN tbuser ON tbuser.idirole = role.idirole INNER JOIN permiso ON role_as_permiso.idipermiso = permiso.idipermiso WHERE tbuser.idiuser = $idiuser AND permiso.categoria = 'Profesores' AND permiso.showInMenu = 'Si' AND tbuser.estatus = 'Activo'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-ruler-pencil"></i><b>P</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Profesores</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function getReportes($idiuser, $idirole) {
    if ($idirole == 1) {
        include './dataConect/conexion.php';
        $sql = "SELECT role_as_permiso.idirol_permiso, role_as_permiso.idirole, role_as_permiso.idipermiso, role_as_permiso.fecha, role.role, role.estatus, role.edit, role.fecha, permiso.showInMenu, permiso.descripcion, permiso.permiso, permiso.categoria, permiso.fecha, tbuser.idigenerales, tbuser.idiconfig, tbuser.idirole, tbuser.`user`, tbuser.`password`, tbuser.fecha, tbuser.estatus, tbuser.categoria FROM role_as_permiso INNER JOIN role ON role_as_permiso.idirole = role.idirole INNER JOIN tbuser ON tbuser.idirole = role.idirole INNER JOIN permiso ON role_as_permiso.idipermiso = permiso.idipermiso WHERE tbuser.idiuser = $idiuser AND permiso.categoria = 'Reportes' AND permiso.showInMenu = 'Si' AND tbuser.estatus = 'Activo'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-stats-up"></i><b>R</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Reportes</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
            while ($row = $result->fetch_assoc()) {
                // echo $row["permiso"];
                echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
            }
            echo '    </ul>
</li>';
        } else {
            // echo "0 results";
        }
        $conn->close();
    }
}

function getPlanes($idiuser, $idirole) {
    // if ($idirole == 2) {
    include './dataConect/conexion.php';
    $sql = "SELECT role_as_permiso.idirol_permiso, role_as_permiso.idirole, role_as_permiso.idipermiso, role_as_permiso.fecha, role.role, role.estatus, role.edit, role.fecha, permiso.showInMenu, permiso.descripcion, permiso.permiso, permiso.categoria, permiso.fecha, tbuser.idigenerales, tbuser.idiconfig, tbuser.idirole, tbuser.`user`, tbuser.`password`, tbuser.fecha, tbuser.estatus, tbuser.categoria FROM role_as_permiso INNER JOIN role ON role_as_permiso.idirole = role.idirole INNER JOIN tbuser ON tbuser.idirole = role.idirole INNER JOIN permiso ON role_as_permiso.idipermiso = permiso.idipermiso WHERE tbuser.idiuser = $idiuser AND permiso.categoria = 'Planes de estudio' AND permiso.showInMenu = 'Si' AND tbuser.estatus = 'Activo'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-bookmark-alt"></i><b>Pl</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Planes de estudio</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-ruler-pencil"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
    // }
}

function getCatalogos($idiuser, $idirole) {
    if ($idirole == "1") {
        echo '<li class="pcoded-hasmenu">
            <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="ti-layout"></i><b>C</b></span>
            <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Catálogos</span>
            <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">';
        getCatalogosServiciosEscolares($idiuser);
        getCatalogosControlEscolar($idiuser);
        echo '</ul></li>';
    }
}

function getConfiguracion($idiuser, $idirole) {
    if ($idirole == 1) {
        include './dataConect/conexion.php';
        $sql = "SELECT role_as_permiso.idirol_permiso, role_as_permiso.idirole, role_as_permiso.idipermiso, role_as_permiso.fecha, role.role, role.estatus, role.edit, role.fecha, permiso.showInMenu, permiso.descripcion, permiso.permiso, permiso.categoria, permiso.fecha, tbuser.idigenerales, tbuser.idiconfig, tbuser.idirole, tbuser.`user`, tbuser.`password`, tbuser.fecha, tbuser.estatus, tbuser.categoria FROM role_as_permiso INNER JOIN role ON role_as_permiso.idirole = role.idirole INNER JOIN tbuser ON tbuser.idirole = role.idirole INNER JOIN permiso ON role_as_permiso.idipermiso = permiso.idipermiso WHERE tbuser.idiuser = $idiuser AND permiso.categoria = 'Configuración' AND permiso.showInMenu = 'Si' AND tbuser.estatus = 'Activo'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-wand"></i><b>Conf</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Configuraciones</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
            while ($row = $result->fetch_assoc()) {
                // echo $row["permiso"];
                echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
            }
            echo '    </ul>
</li>';
        } else {
            // echo "0 results";
        }
        $conn->close();
    }
}
?>



