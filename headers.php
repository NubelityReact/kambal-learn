<?php
include_once './BackEndSAP/session.php';
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1;mode=block');
date_default_timezone_set($forcetimezone);
?>
<!--<p>
███████╗ ██████╗  ██████╗██╗   ██╗███████╗     ██████╗ ███╗   ██╗    ███████╗███████╗██████╗ ██╗   ██╗██╗ ██████╗███████╗███████╗
██╔════╝██╔═══██╗██╔════╝██║   ██║██╔════╝    ██╔═══██╗████╗  ██║    ██╔════╝██╔════╝██╔══██╗██║   ██║██║██╔════╝██╔════╝██╔════╝
█████╗  ██║   ██║██║     ██║   ██║███████╗    ██║   ██║██╔██╗ ██║    ███████╗█████╗  ██████╔╝██║   ██║██║██║     █████╗  ███████╗
██╔══╝  ██║   ██║██║     ██║   ██║╚════██║    ██║   ██║██║╚██╗██║    ╚════██║██╔══╝  ██╔══██╗╚██╗ ██╔╝██║██║     ██╔══╝  ╚════██║
██║     ╚██████╔╝╚██████╗╚██████╔╝███████║    ╚██████╔╝██║ ╚████║    ███████║███████╗██║  ██║ ╚████╔╝ ██║╚██████╗███████╗███████║
╚═╝      ╚═════╝  ╚═════╝ ╚═════╝ ╚══════╝     ╚═════╝ ╚═╝  ╚═══╝    ╚══════╝╚══════╝╚═╝  ╚═╝  ╚═══╝  ╚═╝ ╚═════╝╚══════╝╚══════╝
</p>-->
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
    <head>
        <title>Kambal | <?php echo $shortname; ?></title>
        <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 10]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Meta -->
        <meta charset="utf-8">
        <meta content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="description" content="La forma más rápida de adoptar la Transformación Digital">
        <meta name="keywords" content="Soporte tecnico,it,ti,soluciones,datacenter,consultoria,centro de datos,empresarial,administracion,proyectos,soporte multimarca, Focus On Services es un proveedor global de servicios con presencia en más de 16 países de Latinoamérica con un amplio portafolio de servicios en Tecnologías de Información y con los mejores tiempos de respuesta de la industria, Software, Desarrollo, app, apps, android, IOS, 
              Transformación digital, Software on demand, Software a la medida, Servicios de desarrollo de software, fabrica de software, Progress, 4GL, ABL, app server, PAS, Servicios Web Síncronos,protocolos REST JSON XML, herramienta web para el control administrativo, alumnos y tutores, Campus Virtual. Plataforma de enseñanza virtual, generación de contenidos digitales ">
        <meta name="author" content="Kambal Learn® | Focus On Services">
        <!-- Favicon icon -->
        <link rel="icon" href="asset/images/favicon.ico" type="image/x-icon">
        <!-- Google font-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
        <!-- Required Fremwork -->
        <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/css/bootstrap.min.css">
        <!-- themify-icons line icon -->
        <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
        <!-- ico font -->
        <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
        <!-- flag icon framework css -->
        <link rel="stylesheet" type="text/css" href="assets/pages/flag-icon/flag-icon.min.css">
        <!-- Menu-Search css -->
        <link rel="stylesheet" type="text/css" href="assets/pages/menu-search/css/component.css">
        <!-- Style.css -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <!-- Style RockJs -->
        <link rel="stylesheet" href="asset/css/rockjs.css">
        <!-- ICON personalite CSS -->
        <link rel="stylesheet" href="asset/css/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
        <link rel="stylesheet" href="asset/css/pe-icon-7-stroke/css/helper.css">
        <!-- JQuery Export datatable csv,excel pdf -->
        <link rel="stylesheet" type="text/css" href="asset/css/datatable/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="asset/css/datatable/buttons.dataTables.min.css"/>

        <!-- Draggable personalite CSS -->
        <script src="asset/js/sweetalert2/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="asset/js/sweetalert2/sweetalert2.min.css">
        <!-- Style RockJs -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    </head>

    <body>
        <!-- Pre-loader start -->
        <div class="theme-loader">
            <div class="ball-scale">
                <div class='contain'>
                    <div class="ring"><div class="frame"></div></div>
                    <div class="ring"><div class="frame"></div></div>
                    <div class="ring"><div class="frame"></div></div>
                    <div class="ring"><div class="frame"></div></div>
                    <div class="ring"><div class="frame"></div></div>
                    <div class="ring"><div class="frame"></div></div>
                    <div class="ring"><div class="frame"></div></div>
                    <div class="ring"><div class="frame"></div></div>
                    <div class="ring"><div class="frame"></div></div>
                    <div class="ring"><div class="frame"></div></div>
                </div>
            </div>
        </div>
        <!-- Pre-loader end -->
        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">

                <nav class="navbar header-navbar pcoded-header">
                    <div class="navbar-wrapper">

                        <div class="navbar-logo">
                            <a class="mobile-menu btn-mymenu" id="mobile-collapse" href="#!">
                                <i class="ti-menu"></i>
                            </a>
                            <a class="mobile-search morphsearch-search btn-mymenu" href="#">
                                <i class="ti-search"></i>
                            </a>
                            <a href="menu.php" id="btnlogo">
                                <img class="img-fluid" src="asset/images/logo/<?php echo $frontpageimage; ?>"  alt="<?php echo $shortname; ?>" width="70%"/>
                            </a>
                            <a class="mobile-options">
                                <i class="ti-more"></i>
                            </a>
                        </div>

                        <div class="navbar-container container-fluid">
                            <ul class="nav-left">
                                <li>
                                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                                </li>

                                <li>
                                    <a href="#!" onclick="javascript:toggleFullScreen()">
                                        <i class="ti-fullscreen"></i>
                                    </a>
                                </li>
                                <li class="mega-menu-top">
                                    <?php echo $fullname; ?>
                                </li>
                            </ul>
                            <ul class="nav-right">

                                <li class="user-profile header-notification">
                                    <a href="#!">
<!--                                        <img src="asset/images/img_avatar3.png" class="img-radius" alt="User-Profile-Image">-->
                                        <span><?php echo $globalNombre; ?></span>
                                        <?php echo $role; ?>
                                        <i class="ti-angle-down"></i>
                                    </a>
                                    <ul class="show-notification profile-notification">
                                        <li>
                                            <a href="#" onclick="louout()">
                                                <i class="ti-layout-sidebar-left"></i> Salir
                                            </a>
                                        </li>
                                        <li class="btn-myhelp">
                                            <a href="video_manuales.php">
                                                <i class="ti-help-alt"></i> Ayuda
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            </nav>

                            <!-- Sidebar inner chat end-->
                            <div class="pcoded-main-container">
                                <div class="pcoded-wrapper">
                                    <nav class="pcoded-navbar" id="myNavar">
                                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                                        <div class="pcoded-inner-navbar main-menu">

                                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation"><img class="img-fluid" src="asset/images/compact.png"  alt="Kambal Learn" width="10%"/> Navegación</div>
                                            <ul class="pcoded-item pcoded-left-item">
                                                <?php include './BackEndSAP/options_menu.php'; ?>
                                                
                                            </ul>
                                        </div>
                                    </nav>
                                    <div class="pcoded-content">
                                        <div class="pcoded-inner-content">
                                            <div class="main-body">
                                                <div class="page-wrapper">
                                                    <div class="page-body">
                                                        <?php
                                                        include './check_role_permision.php';
                                                        $arr = json_decode($PermisionsHasRoleJson, true);
                                                        $results = array_filter($arr['data'], function($people) {
                                                            $url = $_SERVER["REQUEST_URI"];
                                                             $perm = str_replace("/ovmx_qa/", "", "$url");
                                                            $extension = explode("?", $perm);
                                                            $permission = strval($extension[0]);
                                                            return $people['permiso'] == $permission;
                                                        });

                                                        foreach ($results as $value) {
                                                            $breadcrumb_categoria = $value['categoria'];
                                                            $breadcrumb_permiso = $value['permiso'];
                                                            $breadcrumb_descripcion = $value['descripcion'];
                                                            $breadcrumb_resumen = $value['resumen'];
                                                            $breadcrumb_btnBack = $value['btnBack'];
                                                            $breadcrumb_icon = $value['icon'];
                                                            $breadcrumb_icon_color = $value['icon_color'];
                                                        }
                                                        ?>     
