<?php

/**
 * Description of pagos
 *
 * @author Ing. Bernabe Gutierrez Rodriguez
 */
class pagos {

    public $idiControlEscolar; //usuario de control escolar logueado
    public $NombreControlEscolar; //Nombre de control escolar logueado

    public function __construct() {
        include '../BackEndSAP/session.php';
        date_default_timezone_set($forcetimezone);
        $this->idiControlEscolar = $globalIdiUsurio;
        $this->NombreControlEscolar = $globalNombre;
        //error_reporting(0);
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET'://consulta             
                $action = $_GET['action'];
                if ($action == 'getReferenced_payment') {
                    $this->getReferenced_payment();
                }
                if ($action == 'getPayPalButtonServices') {
                    $this->getPayPalButtonServices();
                }
                if ($action == 'userconected') {
                    $this->getUserConected();
                }
                if ($action == 'getServiciosEscolares') {
                    $this->getServiciosEscolares();
                }
                if ($action == 'getServiciosEscolaresMiselaneos') {
                    $this->getServiciosEscolaresMiselaneos();
                }
                if ($action == 'getServiciosEscolares2') {
                    $this->getServiciosEscolares2();
                }
                if ($action == 'getCxC') {
                    $this->getCxC();
                }
                if ($action == 'getpartidasServicios') {
                    $this->getpartidasServicios();
                }
                if ($action == 'getSubtotalVentaASservicio') {
                    $this->getSubtotalVentaASservicio();
                }
                if ($action == 'getPago') {
                    $this->getPago();
                }
                if ($action == 'getCobrosPendientesToAlumnoById') {
                    $this->getCobrosPendientesToAlumnoById();
                }
                if ($action == 'getSubTotalOfServiciosByAlumno') {
                    $this->getSubTotalOfServiciosByAlumno();
                }
                if ($action == 'getServiciosEscolaresbyIdAlumno') {
                    $this->getServiciosEscolaresbyIdAlumno();
                }
                if ($action == 'getCuentasPorCobrar') {
                    $this->getCuentasPorCobrar();
                }
                if ($action == 'getPartidasPagadas') {
                    $this->getPartidasPagadas();
                }
                if ($action == 'getTotalAbonoByIdFolio') {
                    $this->getTotalAbonoByIdFolio();
                }
                if ($action == 'getTotalAbonoByIdVenta') {
                    $this->getTotalAbonoByIdVenta();
                }
                if ($action == 'getTotalPagosByIdIdVenta') {
                    $this->getTotalPagosByIdIdVenta();
                }
                if ($action == 'getSubTotalPagosByIdIdVenta') {
                    $this->getSubTotalPagosByIdIdVenta();
                }
                if ($action == 'getServiciosEscolaresByID') {
                    $this->getServiciosEscolaresByID();
                }
                if ($action == 'getPagosLiquidados') {
                    $this->getPagosLiquidados();
                }
                if ($action == 'validAdeudos') {
                    $this->validAdeudos();
                }
                if ($action == 'getPartidasPendientesByIdiAlumno') {
                    $this->getPartidasPendientesByIdiAlumno();
                }
                if ($action == 'checkApplyDiscountServices') {
                    $this->checkApplyDiscountServices();
                }
                if ($action == 'getPartidasPendientesByMatricula') {
                    $this->getPartidasPendientesByMatricula();
                }
                /*                 * ******cxc***** */
                if ($action == 'getSubtotalVent') {
                    $this->getSubtotalVent();
                }
                if ($action == 'getHistorialPagosByIdiAlumno') {
                    $this->getHistorialPagosByIdiAlumno();
                }
                if ($action == 'getVASByIDI') {
                    $this->getVASByIDI();
                }
                if ($action == 'cashReport') {
                    $this->cashReport();
                }
                if ($action == 'income_report') {
                    $this->income_report();
                }
                if ($action == 'get_config_kambal') {
                    $this->get_config_kambal();
                }
                break;
            case 'POST'://inserta
                $action = $_POST['action'];
                if ($action == 'generarFolioPago') {
                    $this->generarFolioPago();
                }
                if ($action == 'tarar') {
                    $this->tarar();
                }
                if ($action == 'setVentaAsServicio') {
                    $this->setVentaAsServicio();
                }
                if ($action == 'eliminarPartida') {
                    $this->eliminarPartida();
                }
                if ($action == 'setPago') {
                    $this->setPago();
                }
                if ($action == 'cobraServicio') {
                    $this->cobraServicio();
                }
                if ($action == 'cancelaCobroServicio') {
                    $this->cancelaCobroServicio();
                }
                if ($action == 'addServicio') {
                    $this->addServicio();
                }
                if ($action == 'updateServicio') {
                    $this->updateServicio();
                }
                //****************cxc
                if ($action == 'agregaServicio') {
                    $this->agregaServicio();
                }
                if ($action == 'quitaServicio') {
                    $this->quitaServicio();
                }
                if ($action == 'quitaRecargoPartida') {
                    $this->quitaRecargoPartida();
                }
                if ($action == 'agregaRecargoPartida') {
                    $this->agregaRecargoPartida();
                }
                if ($action == 'deleteVASByID') {
                    $this->deleteVASByID();
                }
                if ($action == 'anularPago') {
                    $this->anularPago();
                }
                if ($action == 'uptadePriceRecargoVAS') {
                    $this->uptadePriceRecargoVAS();
                }
                if ($action == 'setEstatusFactura') {
                    $this->setEstatusFactura();
                }
                if ($action == 'uploadFileStudent') {
                    $this->uploadFileStudent();
                }
                if ($action == 'addNewPlanPago') {
                    $this->addNewPlanPago();
                }
                if ($action == 'setDescuentoBeca') {
                    $this->setDescuentoBeca();
                }
                if ($action == 'config_kambal') {
                    $this->config_kambal();
                }
                if ($action == 'config_kambal_updatelogo') {
                    $this->config_kambal_updatelogo();
                }
                if ($action == 'delete_servicio') {
                    $this->delete_servicio();
                }
                if ($action == 'suspended_servicio') {
                    $this->suspended_servicio();
                }
                break;
            case 'PUT':
                break;
            case 'DELETE'://elimina
                echo 'DELETE';
                break;
            default://metodo NO soportado
                echo 'METODO NO SOPORTADO';
                break;
        }
    }

    function config_kambal_updatelogo() {
        $errorMSG = "";
        //idiconfig
        if (empty($_POST["idiconfig"])) {
            $errorMSG = "idiconfig is required ";
        } else {
            $idiconfig = $_POST["idiconfig"];
        }
        //frontpageimage
        if (empty($_POST["frontpageimage"])) {
            $frontpageimage = "kambal.png";
        } else {
            $frontpageimage = $_POST["frontpageimage"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            //UPDATE TABLE tbconfig
            $sql = "UPDATE tbconfig SET frontpageimage = '$frontpageimage', fecha = NOW() WHERE idiconfig = '$idiconfig';";
            if ($conn->multi_query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Set configuracion inical de Kambal
     */
    function config_kambal() {
        $errorMSG = "";
        //idiconfig
        if (empty($_POST["idiconfig"])) {
            $errorMSG = "idiconfig is required ";
        } else {
            $idiconfig = $_POST["idiconfig"];
        }
        //idifactura
        // if (empty($_POST["idifactura"])) {
        //     $errorMSG .= "idifactura is required ";
        // } else {
        //     $idifactura = $_POST["idifactura"];
        // }
        //fullname
        //if (empty($_POST["fullname"])) {
        //    $errorMSG .= "fullname is required ";
        //} else {
            $fullname = $_POST["fullname"];
            $Nombre = $fullname;
        //}
        //shortname
        //if (empty($_POST["shortname"])) {
        //    $errorMSG .= "shortname is required ";
        //} else {
            $shortname = $_POST["shortname"];
        //}
        //summary
        //if (empty($_POST["summary"])) {
        //    $errorMSG .= "summary is required ";
        //} else {
            $summary = $_POST["summary"];
        //}
        //frontpageimage
        if (empty($_POST["frontpageimage"])) {
            $frontpageimage = "";
        } else {
            $frontpageimage = $_POST["frontpageimage"];
        }
        //country
        //if (empty($_POST["country"])) {
        //    $errorMSG .= "country is required ";
        //} else {
            $country = $_POST["country"];
        //}
        //defaultcity
        //if (empty($_POST["defaultcity"])) {
        //    $errorMSG .= "defaultcity is required ";
        //} else {
            $defaultcity = $_POST["defaultcity"];
        //}
        //rfc

        
        //if (empty($_POST["rfc"])) {
        //    $errorMSG .= "rfc is required ";
        //} else {
            $rfc = $_POST["rfc"];
        //}
        
        //persona
        //if (empty($_POST["persona"])) {
        //    $errorMSG .= "persona is required ";
        //} else {
            $persona = $_POST["persona"];
        //}
        //Calle
        //if (empty($_POST["Calle"])) {
        //    $errorMSG .= "Calle is required ";
        //} else {
            $Calle = $_POST["Calle"];
        //}
        //NoExterior
        //if (empty($_POST["NoExterior"])) {
        //    $errorMSG .= "NoExterior is required ";
        //} else {
            $NoExterior = $_POST["NoExterior"];
        //}
        //NoInterior
        //if (empty($_POST["NoInterior"])) {
        //    $NoInterior = "";
        //} else {
            $NoInterior = $_POST["NoInterior"];
        //}
        //Colonia
        //if (empty($_POST["Colonia"])) {
        //    $errorMSG .= "Colonia is required ";
        //} else {
            $Colonia = $_POST["Colonia"];
        //}
        //Localidad
        //if (empty($_POST["Localidad"])) {
        //    $errorMSG .= "Localidad is required ";
        //} else {
            $Localidad = $_POST["Localidad"];
        //}
        //Referencia
        //if (empty($_POST["Referencia"])) {
        //    $errorMSG .= "Referencia is required ";
        //} else {
            $Referencia = $_POST["Referencia"];
        //}
        //Municipio
        //if (empty($_POST["Municipio"])) {
        //    $errorMSG .= "Municipio is required ";
        //} else {
            $Municipio = $_POST["Municipio"];
        //}
        //estado
        //if (empty($_POST["estado"])) {
        //    $errorMSG .= "estado is required ";
        //} else {
            $estado = $_POST["estado"];
        //}
        //cp
        //if (empty($_POST["cp"])) {
        //    $errorMSG .= "cp is required ";
        //} else {
            $cp = $_POST["cp"];
        //}
        //banco
        //if (empty($_POST["banco"])) {
        //    $errorMSG .= "banco is required ";
        //} else {
            $banco = $_POST["banco"];
        //}
        //NoCuenta
        //if (empty($_POST["NoCuenta"])) {
        //    $errorMSG .= "NoCuenta is required ";
        //} else {
            $NoCuenta = $_POST["NoCuenta"];
        //}
        //ClaveInterbancaria
        //if (empty($_POST["ClaveInterbancaria"])) {
        //    $errorMSG .= "ClaveInterbancaria is required ";
        //} else {
            $ClaveInterbancaria = $_POST["ClaveInterbancaria"];
        //}
        //Telefono
        //if (empty($_POST["Telefono"])) {
        //    $errorMSG .= "Telefono is required ";
        //} else {
            $Telefono = $_POST["Telefono"];
        //}
        //website
        //if (empty($_POST["website"])) {
        //    $errorMSG .= "website is required ";
        //} else {
            $website = $_POST["website"];
        //}
        //Email
        //if (empty($_POST["Email"])) {
        //    $errorMSG .= "Email is required ";
        //} else {
            $Email = $_POST["Email"];
        //}
        //lms_token
        if (empty($_POST["lms_token"])) {
            $lms_token = '';
        } else {
            $lms_token = $_POST["lms_token"];
        }
        //clave_instituto
        if (empty($_POST["clave_instituto"])) {
            $errorMSG .= ' la clave_instituto es requerida';
        } else {
            $clave_instituto = $_POST["clave_instituto"];
        }
        //lms_domainname
        if (empty($_POST["lms_domainname"])) {
            $lms_domainname = '';
        } else {
            $lms_domainname = $_POST["lms_domainname"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            //UPDATE TABLE tbconfig
            $sql = "UPDATE tbconfig SET clave_instituto = '$clave_instituto', lms_domainname = '$lms_domainname', lms_token = '$lms_token', fullname = '$fullname', shortname = '$shortname', website = '$website',summary = '$summary', country = '$country', defaultcity = '$defaultcity', fecha = NOW() WHERE idiconfig = '$idiconfig';";
            //UPDATE table factura_emisor
            $sql .= "UPDATE factura_emisor SET rfc = '$rfc', Nombre = '$Nombre', persona = '$persona', Calle = '$Calle', NoExterior = '$NoExterior', NoInterior = '$NoInterior', Colonia = '$Colonia', Localidad = '$Localidad', Referencia = '$Referencia', Municipio = '$Municipio', estado = '$estado', pais = '$country', cp = '$cp', banco = '$banco', NoCuenta = '$NoCuenta', ClaveInterbancaria = '$ClaveInterbancaria', Telefono = '$Telefono', Email = '$Email' WHERE id = $idifactura;";
            if ($conn->multi_query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Get configuracion Kambal
     */
    function get_config_kambal() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                tbconfig.idiconfig,
                tbconfig.idifactura,
                tbconfig.fullname,
                tbconfig.shortname,
                tbconfig.summary,
                tbconfig.clave_instituto,
                tbconfig.website,
                tbconfig.lms_token,
                tbconfig.lms_domainname,
                tbconfig.frontpageimage,
                tbconfig.frontpagecolor,
                tbconfig.theme,
                tbconfig.sessiontimeout,
                tbconfig.forcetimezone,
                tbconfig.country,
                tbconfig.defaultcity,
                tbconfig.lang,
                tbconfig.fecha
                FROM
                tbconfig";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    /**
     * idialumno=8679&idiventa_as_servicio=196640
     */
    function getReferenced_payment() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        //idiventa_as_servicio
        if (empty($_GET["idiventa_as_servicio"])) {
            $errorMSG = "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_GET["idiventa_as_servicio"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    venta_as_servicio.idiventa_as_servicio,
                    venta_as_servicio.precio,
                    venta_as_servicio.descuento,
                    venta_as_servicio.total,
                    venta_as_servicio.periodo,
                    venta_as_servicio.comentario,
                    venta_as_servicio.recargo,
                    venta_as_servicio.fecha_limite,
                    alumno.matricula,
                    carrera.nombre AS carrera,
                    cTurno.Descripcion AS turno,
                    venta_as_servicio.idiservicio,
                    alumno.idialumno,
                    datos_generales.idigenerales,
                    datos_generales.nombre,
                    datos_generales.apellido_paterno,
                    datos_generales.apellido_materno,
                    campus.campus,
                    cNiveles.Descripcion AS nivel,
                    alumno.beca_colegiatura
                    FROM
                    venta_as_servicio
                    INNER JOIN alumno ON venta_as_servicio.idialumno = alumno.idialumno
                    INNER JOIN carrera ON alumno.idicarrera = carrera.idicarrera
                    INNER JOIN cTurno ON alumno.TurnoId = cTurno.TurnoId
                    INNER JOIN datos_generales ON alumno.idigenerales = datos_generales.idigenerales
                    INNER JOIN campus ON carrera.idicampus = campus.idicampus
                    INNER JOIN cNiveles ON carrera.NivelId = cNiveles.NivelId
                    WHERE
                    venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio AND
                    alumno.idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getPayPalButtonServices() {
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_GET["idiventa_as_servicio"])) {
            $errorMSG = "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_GET["idiventa_as_servicio"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    venta_as_servicio.idiventa_as_servicio,
                    servicios.idiservicio,
                    tbservicios_paypal.idservicios_paypal,
                    tb_paypal_buttons.idipaypal,
                    tb_paypal_buttons.descripcion,
                    tb_paypal_buttons.paypal_button
                    FROM
                    venta_as_servicio
                    INNER JOIN servicios ON venta_as_servicio.idiservicio = servicios.idiservicio
                    INNER JOIN tbservicios_paypal ON tbservicios_paypal.idiservicio = servicios.idiservicio
                    INNER JOIN tb_paypal_buttons ON tbservicios_paypal.idipaypal = tb_paypal_buttons.idipaypal
                    WHERE venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * esta funcion cambia los montos de recargo a 0 cuando es invocada
     */
    function tarar() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE venta_as_servicio set total = precio where idialumno = $idialumno AND estatus = 'Pendiente'";
            if ($conn->query($sql) === TRUE) {
                echo "Montos Actualizados";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * cambiar estatus de la partida a pagado
     * sumar el total al abono
     * restar el abono al total
     */
    function cobraServicio() {
        $errorMSG = "";
        //total
        if (empty($_POST["total"])) {
            $errorMSG = "total is required ";
        } else {
            $total = $_POST["total"];
        }
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        //folio
        if (empty($_POST["folio"])) {
            $errorMSG .= "folio is required ";
        } else {
            $folio = $_POST["folio"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            //echo "success";
            //cambiar estatus de la partida a pagado
            $estatus = $this->cambiaStatusPArtida($idiventa_as_servicio, "Pagado");
            //sumar el total al abono
            $abono = $this->SumaAbono($total, $folio);
            if ($estatus && $abono) {
                echo 'success';
            } else {
                echo ":(";
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * cambiar estatus de la partida a pagado
     * restar el total al abono
     * sumar el abono al total
     */
    function cancelaCobroServicio() {
        $errorMSG = "";
        //total
        if (empty($_POST["total"])) {
            $errorMSG = "total is required ";
        } else {
            $total = $_POST["total"];
        }
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        //folio
        if (empty($_POST["folio"])) {
            $errorMSG .= "folio is required ";
        } else {
            $folio = $_POST["folio"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            //echo "success";
            //cambiar estatus de la partida a pagado
            $estatus = $this->cambiaStatusPArtida($idiventa_as_servicio, "Pendiente");
            $abono = $this->RestaAbono($total, $folio);
            if ($estatus && $abono) {
                echo 'success';
            } else {
                echo ":(";
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function cambiaStatusPArtida($idiventa_as_servicio, $estatus) {
        include './conexion.php';
        $sql = "UPDATE venta_as_servicio SET estatus = '" . $estatus . "', fecha_mod = NOW() WHERE venta_as_servicio.idiventa_as_servicio = '" . $idiventa_as_servicio . "'";
        if ($conn->query($sql) === TRUE) {
            return true;
            echo "Record updated successfully";
        } else {
            return false;
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }

    function getPartidasPagadas() {
        $errorMSG = "";
        //idiventa
        if (empty($_GET["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_GET["idiventa"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            //$sql = "SELECT venta_as_servicio.idiventa_as_servicio, venta_as_servicio.idialumno, venta_as_servicio.idiventa_as_servicio, servicios.descripcion, venta_as_servicio.estatus, venta_as_servicio.periodo, venta_as_servicio.comentario, venta_as_servicio.idiventa, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.total, venta_as_servicio.fecha FROM venta_as_servicio, servicios WHERE venta_as_servicio.idiservicio = servicios.idiservicio and venta_as_servicio.estatus = 'Pagado' and fecha_mod = NULL and idiventa = $idiventa";
            $sql = "SELECT
                    venta_as_servicio.idiventa_as_servicio,
                    venta_as_servicio.idialumno,
                    servicios.descripcion,
                    servicios.apply_discount,
                    venta_as_servicio.estatus,
                    venta_as_servicio.periodo,
                    venta_as_servicio.comentario,
                    venta_as_servicio.idiventa,
                    venta_as_servicio.precio,
                    venta_as_servicio.realsurcharge,
                    venta_as_servicio.realdiscount,
                    venta_as_servicio.unidad,
                    venta_as_servicio.recargo,
                    venta_as_servicio.total,
                    venta_as_servicio.fecha_mod,
                    venta_as_servicio.fecha_limite 
                    FROM
                    venta_as_servicio,
                    servicios 
                    WHERE
                    venta_as_servicio.idiservicio = servicios.idiservicio 
                    AND venta_as_servicio.estatus = 'Pendiente' 
                    AND venta_as_servicio.fecha_mod <=> NULL 
                    AND idiventa = $idiventa";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getTotalAbonoByIdFolio() {
        $errorMSG = "";
        //folio
        if (empty($_POST["folio"])) {
            $errorMSG = "folio is required ";
        } else {
            $folio = $_POST["folio"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "select abono from pagos WHERE folio = '" . $folio . "'";
            $result = $conn->query($sql);
            $abono = "";
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $abono = $row["abono"];
                }
                return $abono;
            } else {
                return "0 results";
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getTotalPagosByIdFolio() {
        $errorMSG = "";
        //folio
        if (empty($_POST["folio"])) {
            $errorMSG = "folio is required ";
        } else {
            $folio = $_POST["folio"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "select subtotal as total  from pagos WHERE folio = '" . $folio . "'";
            $result = $conn->query($sql);
            $abono = "";
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $abono = $row["total"];
                }
                return $abono;
            } else {
                return "0 results";
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function SumaAbono($total, $folio) {
        //$this->comparaSiTotal_Abono_son_Iguales($folio);
        $abono = $this->getTotalAbonoByIdFolio();
        $deuda = $this->getTotalPagosByIdFolio();
        //sumamos catidad + totalAbono
        $suma = $abono + $total;
        //restamos cantidad al total
        $resta = $deuda - $total;

        //trigger exception in a "try" block
        try {
            include './conexion.php';
            $sql = "UPDATE pagos SET abono = '" . $suma . "' WHERE pagos.folio = '" . $folio . "';";
            //$sql .= "UPDATE pagos SET subtotal = '" . $resta . "', total = '" . $resta . "' WHERE pagos.folio = '" . $folio . "';";
            $sql .= "UPDATE pagos SET subtotal = '" . $resta . "' WHERE pagos.folio = '" . $folio . "';";
            if ($conn->multi_query($sql) === TRUE) {
                return true;
//                echo " New records created successfully ";
//                echo " mis abonos son de $abono";
//                echo " pero pago la cantidad de: $total";
//                echo " mi deuda total era de $deuda";
//                echo " pero ahora solo debo $resta";
            } else {
                return false;
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }

    function RestaAbono($total, $folio) {
        $abono = $this->getTotalAbonoByIdFolio();
        $deuda = $this->getTotalPagosByIdFolio();
        //Restamos catidad + totalAbono
        $suma = $abono - $total;
        //sumamos cantidad al total
        $resta = $deuda + $total;

        //trigger exception in a "try" block
        try {
            include './conexion.php';
            $sql = "UPDATE pagos SET abono = '" . $suma . "' WHERE pagos.folio = '" . $folio . "';";
            //$sql .= "UPDATE pagos SET subtotal = '" . $resta . "', total = '" . $resta . "' WHERE pagos.folio = '" . $folio . "';";
            $sql .= "UPDATE pagos SET subtotal = '" . $resta . "' WHERE pagos.folio = '" . $folio . "';";
            if ($conn->multi_query($sql) === TRUE) {
                return true;
                echo " New records created successfully ";
                echo " mis abonos son de $abono";
                echo " pero pago la cantidad de: $total";
                echo " mi deuda total era de $deuda";
                echo " pero ahora solo debo $resta";
            } else {
                return false;
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }

    function getTotalAbonoByIdVenta() {
        $errorMSG = "";
        //folio
        if (empty($_GET["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_GET["idiventa"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "select abono from pagos WHERE idiventa = '" . $idiventa . "'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getTotalPagosByIdIdVenta() {
        $errorMSG = "";
        if (empty($_GET["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_GET["idiventa"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "select total from pagos WHERE idiventa = '" . $idiventa . "'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getSubTotalPagosByIdIdVenta() {
        $errorMSG = "";
        if (empty($_GET["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_GET["idiventa"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "select subtotal from pagos WHERE idiventa = '" . $idiventa . "'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * inserta una partida a la tabla de venta_as_servicio
     * $_POST["idialumno"]
     * $_POST["idiservicio"];
     * $_POST["idiventa"];
     * $_POST["unidad"];
     * $_POST["precio"];
     * $total = $unidad * $precio;
     */
    function setVentaAsServicio() {
        $errorMSG = "";
//idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
//idiservicio
        if (empty($_POST["idiservicio"])) {
            $errorMSG .= "idiservicio is required ";
        } else {
            $idiservicio = $_POST["idiservicio"];
        }
//idiventa
        if (empty($_POST["idiventa"])) {
            $errorMSG .= "idiventa is required ";
        } else {
            $idiventa = $_POST["idiventa"];
        }
//unidad
        if (empty($_POST["unidad"])) {
            $errorMSG .= "unidad is required ";
        } else {
            $unidad = $_POST["unidad"];
        }
//precio
        if (empty($_POST["precio"])) {
            $errorMSG .= "precio is required ";
        } else {
            $precio = $_POST["precio"];
        }
        $total = $unidad * $precio;
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO venta_as_servicio (idialumno, idiservicio, idiventa, precio, unidad, descuento, total, idiuser, estatus, comentario) VALUES ('" . $idialumno . "', '" . $idiservicio . "', '" . $idiventa . "', '" . $precio . "', '" . $unidad . "', '0', '" . $total . "', '" . $this->idiControlEscolar . "', 'Pagado', '')";
            if ($conn->query($sql) === TRUE) {
                echo "success";
                $var = true;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $var = false;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Genera folio de pago
     * al momento de cargar la pagina de pago.php
     */
    function generarFolioPago() {
        header('Content-Type: application/json');
        include './conexion.php';
        $cons = $this->lastIdVenta();
        $key = $this->generarCodigo(6);
        $folio = $key . '-' . $cons;
        $sql = "INSERT INTO venta (folio) VALUES ('" . strtoupper($folio) . "')";
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id; // devuelve el id de registro
            $folio = $this->getFolioPago($last_id);
            print_r($folio);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    /**
     * Consulta y retorna el utimo folio ingresado
     * a la base de datos
     * @param type $last_id
     * @return string
     */
    function getFolioPago($last_id) {
        //SELECT MAX(idiventa) FROM venta
        include './conexion.php';
        $sql = "SELECT * FROM venta WHERE idiventa = $last_id";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            return json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            return "0 results";
        }
        $conn->close();
    }

    /**
     * retorna el ultimo id para generar consecutivo
     * @return int
     */
    function lastIdVenta() {
        //SELECT MAX(idiventa) FROM venta
        include './conexion.php';
        $sql = "SELECT MAX(idiventa) FROM venta";
        $result = $conn->query($sql);
        $rows = null;
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows = $row["MAX(idiventa)"];
            }
            return $rows;
        } else {
            return $row + 1;
        }
        $conn->close();
    }

    /**
     * Genera una cadena unica de 6 digitos
     * para armar el numero de folio
     * @param type $longitud
     * @return string
     */
    function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $longitud; $i++)
            $key .= $pattern{mt_rand(0, $max)};
        return $key;
    }

    /**
     * Devuelve el catalogo de servicios escolares
     */
    function getServiciosEscolares() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                servicios.idiservicio,
                servicios.deleted,
                servicios.suspended,
                servicios.descripcion,
                servicios.precio,
                servicios.apply_discount,
                servicios.es_facturable,
                servicios.descuento,
                servicios.activo,
                servicios.estatus,
                servicios.codigo_sat,
                servicios.unidad_sat,
                servicios.categoria,
                servicios.created
                FROM
                servicios
                WHERE servicios.deleted = 0";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getServiciosEscolaresMiselaneos() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                servicios.idiservicio,
                servicios.deleted,
                servicios.suspended,
                servicios.descripcion,
                servicios.precio,
                servicios.apply_discount,
                servicios.es_facturable,
                servicios.descuento,
                servicios.activo,
                servicios.estatus,
                servicios.codigo_sat,
                servicios.unidad_sat,
                servicios.categoria,
                servicios.created 
                FROM
                servicios 
                WHERE
                servicios.deleted = 0 
                AND servicios.suspended =0";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getServiciosEscolares2() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM servicios where categoria = 'colegiatura'";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getServiciosEscolaresByID() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idiservicio"])) {
            $errorMSG = "idiservicio is required ";
        } else {
            $idiservicio = $_GET["idiservicio"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM servicios where idiservicio=$idiservicio";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getServiciosEscolaresbyIdAlumno() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT venta_as_servicio.idiventa_as_servicio, venta_as_servicio.idialumno, venta_as_servicio.idiservicio, servicios.descripcion, venta_as_servicio.idiventa, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.descuento, venta_as_servicio.total, venta_as_servicio.fecha, venta_as_servicio.idiuser, venta_as_servicio.periodo, venta_as_servicio.comentario, venta_as_servicio.estatus from venta_as_servicio,servicios where venta_as_servicio.idiservicio = servicios.idiservicio and venta_as_servicio.estatus = 'Pendiente' and venta_as_servicio.idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Devuelve las partidas por usuario por venta
     * $_GET["idiventa"]
     * $_GET["idialumno"]
     */
    function getpartidasServicios() {
        header('Content-Type: application/json');
        include './conexion.php';
        $errorMSG = "";
        //idiventa
        if (empty($_GET["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_GET["idiventa"];
        }
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG .= "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            $sql = "SELECT venta_as_servicio.idiventa_as_servicio, venta_as_servicio.idialumno, venta_as_servicio.idiventa_as_servicio, servicios.descripcion, venta_as_servicio.idiventa, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.total, venta_as_servicio.fecha FROM venta_as_servicio, servicios WHERE venta_as_servicio.idiservicio = servicios.idiservicio and idiventa = " . $idiventa . " and idialumno = " . $idialumno;
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * devuelve el sub total de la venta
     * $_GET["idiventa"]
     * $_GET["idialumno"]
     */
    function getSubtotalVentaASservicio() {
        header('Content-Type: application/json');
        include './conexion.php';
        $errorMSG = "";
        //idiventa
        if (empty($_GET["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_GET["idiventa"];
        }
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG .= "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }

        if ($errorMSG == "") {
            $sql = "SELECT SUM(venta_as_servicio.total) as subtotal FROM venta_as_servicio WHERE idiventa = $idiventa and idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Elimina una partida 
     */
    function eliminarPartida() {
        include './conexion.php';
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG = "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            // sql to delete a record
            $sql = "DELETE FROM venta_as_servicio WHERE venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio";
            if ($conn->query($sql) === TRUE) {
                echo "success";
                //$this->updateEstatusToPagadoOfPartida($idiventa_as_servicio);
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Esta funcion cambia el estatus de Pagado a Pendiente, de la partida eliminada 
     */
    function updateEstatusToPagadoOfPartida($idiventa_as_servicio) {
        include './conexion.php';
        $sql = "UPDATE venta_as_servicio SET estatus = 'Pendiente' WHERE venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio";
        if ($conn->query($sql) === TRUE) {
            echo "UPDATE venta_as_servicio success";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }

    /**
     * Esta funcion guarda el kardex de de cuentas pendientes de pago  
     * que se le HAYAN asignado a algun alumno
     * En formato JSON
     */
    function setPago() {
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_POST["idiventa"];
        }
        //matricula
        if (empty($_POST["matricula"])) {
            $errorMSG .= "matricula is required ";
        } else {
            $matricula = $_POST["matricula"];
        }
        //folio
        if (empty($_POST["folio"])) {
            $errorMSG .= "folio is required ";
        } else {
            $folio = $_POST["folio"];
        }//estatus
        if (empty($_POST["estatus"])) {
            $estatus = "Pagado";
        } else {
            $estatus = $_POST["estatus"];
        }//descuento
        if (empty($_POST["descuento"])) {
            $descuento = "0";
        } else {
            $descuento = $_POST["descuento"];
        }//total
        if (empty($_POST["total"])) {
            $errorMSG .= "total is required ";
        } else {
            $total = $_POST["total"];
        }//subtotal
        if (empty($_POST["subtotal"])) {
            $subtotal = $total;
        } else {
            $subtotal = $total;
        }//metodo_pago
        if (empty($_POST["metodo_pago"])) {
            $errorMSG .= "metodo_pago is required ";
        } else {
            $metodo_pago = $_POST["metodo_pago"];
        }
        //comentarios
        if (empty($_POST["comentarios"])) {
            $comentarios = "";
        } else {
            $comentarios = $_POST["comentarios"];
        }
        //iditransaccion
        if (empty($_POST["iditransaccion"])) {
            $iditransaccion = "";
        } else {
            $iditransaccion = strtoupper($_POST["iditransaccion"]);
        }
        //digitos
        if (empty($_POST["digitos"])) {
            $digitos = "";
        } else {
            $digitos = strtoupper($_POST["digitos"]);
        }
        //titular_tarjeta
        if (empty($_POST["titular_tarjeta"])) {
            $titular_tarjeta = "";
        } else {
            $titular_tarjeta = strtoupper($_POST["titular_tarjeta"]);
        }
        //banco
        if (empty($_POST["banco"])) {
            $banco = "N/A";
        } else {
            $banco = $_POST["banco"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO pagos (idiventa, matricula, folio, estatus, subtotal, descuento, total, metodo_pago, comentarios, idiusuario, iditransaccion, digitos, titular_tarjeta, banco) VALUES ('" . $idiventa . "', '" . $matricula . "','" . $folio . "', '" . $estatus . "', '" . $subtotal . "', '" . $descuento . "', '" . $total . "', '" . $metodo_pago . "', '" . $comentarios . "', '" . $this->NombreControlEscolar . "', '$iditransaccion', '$digitos', '$titular_tarjeta', '$banco')";
            if ($conn->query($sql) === TRUE) {
                echo "Cobro agregado correctamente";
                //updateFechaPagoVAS($idiventa);
                $this->updateFechaPagoVAS($idiventa);
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updateFechaPagoVAS($idiventa) {
        include './conexion.php';
        $sql = "UPDATE venta_as_servicio SET fecha_mod = NOW(), estatus = 'Pagado' WHERE idiventa = '$idiventa'";
        if ($conn->query($sql) === TRUE) {
            echo "Cobro agregado correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    /**
     * Esta funcion muestra los folios de cuentas pendientes de pago en General 
     * que se le han asignado a todos los alumno
     * En formato JSON
     */
    function getPago() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT idipago, idiventa, matricula, folio, estatus, subtotal, descuento, total, metodo_pago, comentarios, fecha, idiusuario FROM pagos where estatus = 'Pendiente'";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getPagosLiquidados() {
        header('Content-Type: application/json');
        include './conexion.php';
        //$sql = "SELECT idipago, idiventa, matricula, folio, estatus, subtotal, descuento, total, metodo_pago, comentarios, fecha, idiusuario, banco, iditransaccion, titular_tarjeta, digitos FROM pagos where estatus = 'Pagado' ORDER BY idipago ASC";
        $sql = "SELECT * FROM pagos where estatus = 'Pagado' ORDER BY idipago ASC";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getUserConected() {
        print_r($this->idiControlEscolar);
    }

    /**
     * Esta funcion muestra el detalle los servicios pendientes de pago 
     * que se le han asignado al alumno
     * en formato JSON
     */
    function getCobrosPendientesToAlumnoById() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT venta_as_servicio.idiventa, alumno.idialumno, alumno.nombre, alumno.apellido_paterno, alumno.apellido_materno, alumno.matricula, servicios.idiservicio, servicios.descripcion, venta_as_servicio.idiventa_as_servicio,venta_as_servicio.comentario, venta_as_servicio.periodo, venta_as_servicio.estatus, servicios.precio, venta_as_servicio.unidad, venta_as_servicio.descuento, venta_as_servicio.total, venta_as_servicio.fecha, user.Nombre as nom, user.apellido_paterno as app , user.apellido_materno as apm FROM venta_as_servicio, alumno, servicios, user WHERE venta_as_servicio.idiuser = user.idiuser AND servicios.idiservicio = venta_as_servicio.idiservicio and alumno.idialumno = venta_as_servicio.idialumno and alumno.idialumno = $idialumno ORDER BY idiventa_as_servicio ASC";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Esta funcion muestra las cuentas por cobrar de los servicios pendientes de pago 
     * que se le han asignado al alumno
     * en formato JSON
     */
    function getCuentasPorCobrar() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["matricula"])) {
            $errorMSG = "matricula is required ";
        } else {
            $matricula = $_GET["matricula"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT * FROM pagos WHERE matricula = '" . $matricula . "'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Esta funcion suma total los servicios pendientes de pago 
     * que se le han asignado al alumno
     * En formato JSON
     */
    function getSubTotalOfServiciosByAlumno() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT SUM(venta_as_servicio.total) as subtotal FROM venta_as_servicio WHERE estatus='Pendiente'and idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Consulta el detalle de partida de la cuenta por cobrar
     * de los cargos asignados al alumno
     */
    function getCxC() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_GET["idiventa"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT venta_as_servicio.idiventa_as_servicio, venta_as_servicio.idialumno, venta_as_servicio.idiventa_as_servicio, servicios.descripcion, venta_as_servicio.estatus, venta_as_servicio.periodo, venta_as_servicio.comentario, venta_as_servicio.idiventa, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.total, venta_as_servicio.fecha FROM venta_as_servicio, servicios WHERE venta_as_servicio.idiservicio = servicios.idiservicio and venta_as_servicio.estatus='Pendiente' and idiventa = $idiventa";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addServicio() {
        $errorMSG = "";
        //query_action
        if (empty($_POST["query_action"])) {
            $errorMSG = "query_action is required ";
        } else {
            $query_action = $_POST["query_action"];
        }
        //descripcion
        if (empty($_POST["descripcion"])) {
            $errorMSG = "descripcion is required ";
        } else {
            $descripcion = strtoupper($_POST["descripcion"]);
        }
        //precio
        if (empty($_POST["precio"])) {
            $errorMSG .= "precio is required ";
        } else {
            $precio = $_POST["precio"];
        }
        //descuento
        if (empty($_POST["es_facturable"])) {
            $es_facturable = "0";
        } else {
            $es_facturable = $_POST["es_facturable"];
        }
        //descuento
        if (empty($_POST["apply_discount"])) {
            $apply_discount = "0";
        } else {
            $apply_discount = "1";
        }
        //descuento
        if (empty($_POST["descuento"])) {
            $descuento = "0";
        } else {
            $descuento = strtoupper($_POST["descuento"]);
        }
        //categoria
        if (empty($_POST["categoria"])) {
            $categoria = "ninguno";
        } else {
            $categoria = $_POST["categoria"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            if ($query_action == 'insert') {
                include './conexion.php';
                $sql = "INSERT INTO servicios (categoria, descripcion, precio, descuento, es_facturable, apply_discount) VALUES ('$categoria', '$descripcion', '$precio', '$descuento', '$es_facturable', '$apply_discount')";
                if ($conn->query($sql) === TRUE) {
                    echo "success";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
            if ($query_action == 'update') {
                //categoria
                if (empty($_POST["categoria"])) {
                    $errorMSG = "idiservicio is required";
                } else {
                    $idiservicio = $_POST["idiservicio"];
                }
                if ($errorMSG == "") {
                    include './conexion.php';
                    $sql = "UPDATE servicios SET categoria = '$categoria', descripcion = '$descripcion', precio = '$precio', descuento = '$descuento', es_facturable = '$es_facturable', apply_discount = '$apply_discount' WHERE idiservicio = $idiservicio";
                    if ($conn->query($sql) === TRUE) {
                        echo "success";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $conn->close();
                } else {
                    echo $errorMSG;
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

    function updateServicio() {
        $errorMSG = "";
        //descripcion
        if (empty($_POST["idiservicio"])) {
            $errorMSG = "idiservicio is required ";
        } else {
            $idiservicio = $_POST["idiservicio"];
        }
        if (empty($_POST["descripcion"])) {
            $errorMSG .= "descripcion is required ";
        } else {
            $descripcion = $_POST["descripcion"];
        }
        //precio
        if (empty($_POST["precio"])) {
            $errorMSG .= "precio is required ";
        } else {
            $precio = $_POST["precio"];
        }
        //descuento
        if (empty($_POST["descuento"])) {
            $descuento = "0";
        } else {
            $descuento = $_POST["descuento"];
        }
        //estatus
        if (empty($_POST["estatus"])) {
            $errorMSG .= "estatus is required ";
        } else {
            $estatus = $_POST["estatus"];
        }
        //descuento
        if (empty($_POST["es_facturable"])) {
            $es_facturable = "No";
        } else {
            $es_facturable = $_POST["es_facturable"];
        }
        //apply_discount
        if (empty($_POST["apply_discount"])) {
            $apply_discount = 'false';
        } else {
            $apply_discount = 'true';
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE servicios SET apply_discount = $apply_discount, es_facturable='$es_facturable', descripcion = '" . $descripcion . "', precio = '" . $precio . "', descuento = '" . $descuento . "', estatus = '" . $estatus . "' WHERE servicios.idiservicio = $idiservicio";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * esta funcion se usa cuando se desea reinscribir a un alumno
     * verifica si tiene adeudos pendientes
     * retouna booleano
     * true: tiene adeudos
     * false: no tiene adeudos
     */
    function validAdeudos() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT SUM(venta_as_servicio.total) as total from venta_as_servicio where estatus= 'Pendiente' and idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*     * ****************************************************** */

    function getTotalFromPagosByIdVenta($idiventa) {
        $numero = "";
        include './conexion.php';
        $sql = "SELECT total FROM pagos where folio = '$idiventa'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $numero = $row["total"];
            }
            return $numero;
        } else {
            return "";
        }
        $conn->close();
    }

    function getAbonoFromPagosByIdVenta($idiventa) {
        $numero = "";
        include './conexion.php';
        $sql = "SELECT abono FROM pagos where folio = '$idiventa'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $numero = $row["abono"];
            }
            return $numero;
        } else {
            return "";
        }
        $conn->close();
    }

//echo $abono = getAbonoFromPagosByIdVenta(20);

    function comparaSiTotal_Abono_son_Iguales($idiventa) {
        echo $abono = $this->getAbonoFromPagosByIdVenta($idiventa);
        echo $total = $this->getTotalFromPagosByIdVenta($idiventa);

        if ($total === $abono) {
            $accion = $this->CambiaEstatusPago($idiventa, "Pagado");
            if ($accion) {
                echo 'Pagado';
            }
        } else {
            $accion = $this->CambiaEstatusPago($idiventa, "Pendiente");
            if ($accion) {
                echo 'Pendiente';
            }
        }
    }

    function CambiaEstatusPago($idiventa, $estatus) {
        include './conexion.php';
        $sql = "UPDATE pagos SET estatus = '$estatus' WHERE pagos.idiventa = $idiventa";
        if ($conn->query($sql) === TRUE) {
            return true;
            echo "Record updated successfully";
        } else {
            return false;
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }

    function getPartidasPendientesByIdiAlumno() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT
                    servicios.idiservicio,
                    venta_as_servicio.idiventa_as_servicio,
                    venta_as_servicio.estatus,
                    servicios.descripcion,
                    venta_as_servicio.comentario,
                    venta_as_servicio.periodo,
                    venta_as_servicio.precio,
                    venta_as_servicio.unidad,
                    venta_as_servicio.fecha_limite,
                    venta_as_servicio.recargo,
                    venta_as_servicio.total,
                    servicios.es_facturable,
                    venta_as_servicio.fecha_mod 
                    FROM
                    servicios,
                    venta_as_servicio 
                    WHERE
                    venta_as_servicio.estatus = 'Pendiente' 
                    AND servicios.idiservicio = venta_as_servicio.idiservicio 
                    AND venta_as_servicio.idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function checkApplyDiscountServices() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idiventa_as_servicio"])) {
            $errorMSG = "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_GET["idiventa_as_servicio"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT
                    venta_as_servicio.idiventa_as_servicio,
                    servicios.apply_discount,
                    servicios.idiservicio
                    FROM
                    venta_as_servicio
                    INNER JOIN servicios ON venta_as_servicio.idiservicio = servicios.idiservicio
                    WHERE venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getHistorialPagosByIdiAlumno() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT
                    venta_as_servicio.idiventa_as_servicio,
                    venta_as_servicio.idialumno,
                    venta_as_servicio.idiservicio,
                    venta_as_servicio.idiventa,
                    venta_as_servicio.precio,
                    venta_as_servicio.realdiscount,
                    venta_as_servicio.realsurcharge,
                    venta_as_servicio.unidad,
                    venta_as_servicio.total,
                    venta_as_servicio.fecha,
                    venta_as_servicio.idiuser,
                    venta_as_servicio.periodo,
                    venta_as_servicio.comentario,
                    venta_as_servicio.estatus,
                    venta_as_servicio.fecha_mod,
                    venta_as_servicio.migrado,
                    venta_as_servicio.descuento,
                    venta_as_servicio.recargo,
                    venta_as_servicio.fecha_limite,
                    servicios.descripcion,
                    servicios.apply_discount,
                    servicios.es_facturable,
                    servicios.categoria 
                    FROM
                    venta_as_servicio
                    INNER JOIN servicios ON venta_as_servicio.idiservicio = servicios.idiservicio 
                    WHERE
                    venta_as_servicio.idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getPartidasPendientesByMatricula() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["matricula"])) {
            $errorMSG = "matricula is required ";
        } else {
            $matricula = $_GET["matricula"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT servicios.idiservicio, venta_as_servicio.idiventa_as_servicio, venta_as_servicio.estatus, servicios.descripcion, venta_as_servicio.comentario, venta_as_servicio.periodo, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.total, servicios.es_facturable, servicios.fecha, venta_as_servicio.fecha_mod FROM servicios, venta_as_servicio WHERE venta_as_servicio.estatus ='Pendiente' and servicios.idiservicio = venta_as_servicio.idiservicio and venta_as_servicio.matricula = '$matricula'";
            // $sql = "SELECT servicios.idiservicio, venta_as_servicio.idiventa_as_servicio, venta_as_servicio.estatus, servicios.descripcion, venta_as_servicio.comentario, venta_as_servicio.periodo, venta_as_servicio.precio, venta_as_servicio.unidad, venta_as_servicio.total, servicios.es_facturable, servicios.fecha, venta_as_servicio.fecha_mod FROM servicios, venta_as_servicio WHERE  servicios.idiservicio = venta_as_servicio.idiservicio and venta_as_servicio.idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getVASByIDI() {
        header('Content-Type: application/json');
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idiventa_as_servicio"])) {
            $errorMSG = "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_GET["idiventa_as_servicio"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT * FROM venta_as_servicio where idiventa_as_servicio = '$idiventa_as_servicio'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['data'][] = "0 results";
                print json_encode($rows, JSON_PRETTY_PRINT);
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*     * **************************CxC******************************** */

    function agregaServicio() {
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }

        if (empty($_POST["idiventa"])) {
            $errorMSG .= "idiventa is required ";
        } else {
            $idiventa = $_POST["idiventa"];
        }

        if (empty($_POST["metodo_pago"])) {
            $errorMSG .= "metodo_pago is required ";
        } else {
            $metodo_pago = $_POST["metodo_pago"];
        }

        if (empty($_POST["fecha_deposito"])) {
            $errorMSG .= "fecha_deposito is required ";
        } else {
            $fecha_deposito = $_POST["fecha_deposito"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            //echo "success";
            //cambiar estatus de la partida a pagado
            $estatus = $this->agrupaPartida($idiventa_as_servicio, $idiventa, "Pendiente", $metodo_pago, $fecha_deposito);
            if ($estatus) {
                echo 'success';
            } else {
                echo ":(";
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Cuando el pago es por transferencia bancaria 
     * y se hizo en tiempo 
     * quita el recargo a la partida 
     */
    function quitaRecargoPartida() {
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            //$sql = "UPDATE venta_as_servicio SET recargo = 0  WHERE venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio;";
            $sql = "UPDATE venta_as_servicio SET total = precio   WHERE venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio;";
            //$sql .= "UPDATE venta_as_servicio SET total = precio - ((precio * recargo)/100);";
            if ($conn->multi_query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function agregaRecargoPartida() {
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
//        if (empty($_POST["precio"])) {
//            $errorMSG .= "precio is required ";
//        } else {
//            $precio = $_POST["precio"];
//        }
        if ($errorMSG == "") {
            include './conexion.php';
            // $sql = "UPDATE venta_as_servicio SET recargo = (precio * recargo)  WHERE venta_as_servicio.idiventa_as_servicio =  $idiventa_as_servicio;";
            $sql = "UPDATE venta_as_servicio SET total = (precio + ((precio * recargo)/100) - descuento)   WHERE venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio;";
            if ($conn->multi_query($sql) === TRUE) {
                sleep(0.2);
                echo "success";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function quitaServicio() {
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            //$sql = "UPDATE venta_as_servicio SET estatus = 'Pendiente', fecha_mod = NOW(), idiventa = NULL WHERE venta_as_servicio.idiventa_as_servicio = '" . $idiventa_as_servicio . "'";
            $sql = "UPDATE venta_as_servicio SET estatus = 'Pendiente', fecha_mod = NULL, idiventa = NULL WHERE venta_as_servicio.idiventa_as_servicio = '" . $idiventa_as_servicio . "'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deleteVASByID() {
        $userd = "CANCELADO POR " . $this->NombreControlEscolar . " " . date("Y-m-d h:i:sa");
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        if (empty($_POST["comentario"])) {
            $comentario = strtoupper($userd);
        } else {
            $comentario = strtoupper($_POST["comentario"] . " " . $userd);
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE venta_as_servicio SET estatus = 'Cancelado', comentario = '$comentario'  WHERE venta_as_servicio.idiventa_as_servicio = '$idiventa_as_servicio'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Cambia es estado de una partida PAGADA a PENDIENTE
     * Se usa en caso de que el Cagero haya cometido el Error de cobrar un servicio
     * que no correspondia 
     */
    function anularPago() {
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE venta_as_servicio SET estatus = 'Pendiente',  fecha_mod = NULL   WHERE venta_as_servicio.idiventa_as_servicio = '$idiventa_as_servicio'";
            if ($conn->query($sql) === TRUE) {
                echo "El Pago se cambió a Pendiente";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function uptadePriceRecargoVAS() {
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG .= "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        if (empty($_POST["recargo"])) {
            $recargo = '0';
        } else {
            $recargo = $_POST["recargo"];
        }
        if (empty($_POST["total"])) {
            $total = "0";
        } else {
            $total = $_POST["total"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            //$sql = "UPDATE venta_as_servicio SET recargo = '$recargo', total = '$total' WHERE venta_as_servicio.idiventa_as_servicio = '$idiventa_as_servicio'";
            $sql = "UPDATE venta_as_servicio SET recargo = '$recargo' WHERE venta_as_servicio.idiventa_as_servicio = '$idiventa_as_servicio'";
            if ($conn->query($sql) === TRUE) {
                echo "Precio actualizado";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function services_apply_surcharge($fecha_limite) {
        $surcharge = false;
        $today = date('Y-m-d');
        if ($today > $fecha_limite) {
            $surcharge = true;
        } else {
            $surcharge = false;
        }
        return $surcharge;
    }

    function services_apply_discount($apply_discount) {
        $discount = false;
        if (boolval($apply_discount)) {
            $discount = true;
        } else {
            $discount = false;
        }
        return $discount;
    }

    function service_cost($idiventa_as_servicio) {
        $cost = 0;
        include './conexion.php';
        $sql = "SELECT
                venta_as_servicio.precio
                FROM
                venta_as_servicio
                WHERE
                venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $cost = $row["precio"];
            }
        }
        return $cost;
        $conn->close();
    }

    function user_discount_rate($idiventa_as_servicio) {
        $discount_rate = 0;
        include './conexion.php';
        $sql = "SELECT
                alumno.beca_colegiatura
                FROM
                alumno
                INNER JOIN venta_as_servicio ON venta_as_servicio.idialumno = alumno.idialumno
                WHERE
                venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $discount_rate = $row["beca_colegiatura"];
            }
        }
        return $discount_rate;
        $conn->close();
    }

    function service_surcharge_percentage($idiventa_as_servicio) {
        $surcharge_percentage = 0;
        include './conexion.php';
        $sql = "SELECT
                venta_as_servicio.recargo
                FROM
                venta_as_servicio
                WHERE
                venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $surcharge_percentage = $row["recargo"];
            }
        }
        return $surcharge_percentage;
        $conn->close();
    }

    function agrupaPartida($idiventa_as_servicio, $idiventa, $estatus, $metodo_pago, $fecha_deposito) {
        include './conexion.php';
        $sql = "SELECT
                venta_as_servicio.precio,
                servicios.apply_discount,
                alumno.beca_colegiatura,
                venta_as_servicio.recargo,
                venta_as_servicio.fecha_limite
                FROM
                alumno
                INNER JOIN venta_as_servicio ON venta_as_servicio.idialumno = alumno.idialumno
                INNER JOIN servicios ON venta_as_servicio.idiservicio = servicios.idiservicio
                WHERE venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $precio = $row["precio"];
                $apply_discount = $row["apply_discount"];
                $beca_colegiatura = $row["beca_colegiatura"];
                $recargo = $row["recargo"];
                $fecha_limite = $row["fecha_limite"];
            }
        }

        $services_apply_discount = $this->services_apply_discount($apply_discount);
        $services_apply_surcharge = $this->services_apply_surcharge($fecha_limite);
        $service_cost = $precio;
        $user_discount_rate = $beca_colegiatura;
        $service_surcharge_percentage = $recargo;
        $subtotal = 0;
        $discount = 0;
        $surcharge = 0;
        $user_apply_discount = false;
        $realdiscount = 0;
        $realsurcharge = 0;
        $today = date('Y-m-d');

        //verificar si el usuario tiene beca
        if ($user_discount_rate > 0) {
            $user_apply_discount = true;
        }

        //cacula el descuento
        if ($services_apply_discount && $user_apply_discount) {
            $discount = ($service_cost * $user_discount_rate) / 100;
            $realdiscount = $discount;
        }
        //calcula el recargo
        if ($services_apply_surcharge) {
            $surcharge = ($service_cost * $service_surcharge_percentage) / 100;
            $realsurcharge = $surcharge;
        }

        $subtotal = ($service_cost - $discount) + $surcharge;

        if ($metodo_pago == 'deposito' && $fecha_deposito < $today) {
            $subtotal = $subtotal - $surcharge;

            $realsurcharge = $surcharge - $surcharge;
        }

        $sql = "UPDATE venta_as_servicio SET estatus = '" . $estatus . "',  idiventa = '$idiventa' WHERE venta_as_servicio.idiventa_as_servicio = '$idiventa_as_servicio';";
        $sql .= "UPDATE venta_as_servicio SET total = '$subtotal' WHERE venta_as_servicio.idiventa_as_servicio = '$idiventa_as_servicio';";
        $sql .= "UPDATE venta_as_servicio SET realdiscount = '$realdiscount', realsurcharge = '$realsurcharge' WHERE venta_as_servicio.idiventa_as_servicio = '$idiventa_as_servicio';";

        if ($conn->multi_query($sql) === TRUE) {
            return true;
            echo "Record updated successfully";
        } else {
            return false;
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }

    function setDescuentoBeca() {
        $errorMSG = "";
        //idiventa
        if (empty($_POST["idiventa_as_servicio"])) {
            $errorMSG = "idiventa_as_servicio is required ";
        } else {
            $idiventa_as_servicio = $_POST["idiventa_as_servicio"];
        }
        if (empty($_POST["descuento"])) {
            $descuento = 0;
        } else {
            $descuento = $_POST["descuento"];
        }
        if (empty($_POST["leyenda"])) {
            $errorMSG .= "leyenda is required ";
        } else {
            $leyenda = $_POST["leyenda"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE venta_as_servicio SET  descuento = '$descuento'  WHERE venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio;";
            $sql .= "UPDATE venta_as_servicio SET total = (precio - descuento)   WHERE venta_as_servicio.idiventa_as_servicio = $idiventa_as_servicio;";
            if ($conn->multi_query($sql) === TRUE) {
                sleep(0.2);
                echo "descuento aplicado";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getSubtotalVent() {
        header('Content-Type: application/json');
        include './conexion.php';
        $errorMSG = "";
        //idiventa
        if (empty($_GET["idiventa"])) {
            $errorMSG = "idiventa is required ";
        } else {
            $idiventa = $_GET["idiventa"];
        }
        if ($errorMSG == "") {
            $sql = "SELECT SUM(venta_as_servicio.total) as total FROM venta_as_servicio WHERE idiventa = $idiventa";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function setEstatusFactura() {
        $errorMSG = "";
        //idiventa_as_servicio
        if (empty($_POST["idiventa"])) {
            $errorMSG .= "idiventa is required ";
        } else {
            $idiventa = $_POST["idiventa"];
        }
        if (empty($_POST["folio_facturado"])) {
            $errorMSG .= "folio_facturado is required ";
        } else {
            $folio_facturado = $_POST["folio_facturado"];
        }
        if (empty($_POST["facturado"])) {
            $facturado = 'Si';
        } else {
            $facturado = $_POST["facturado"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE pagos SET facturado = '$facturado', folio_facturado='$folio_facturado' WHERE pagos.idiventa = $idiventa";
            if ($conn->query($sql) === TRUE) {
                echo "facturado actualizado";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function uploadFileStudent() {

        $var = null;
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG .= "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //archivo
        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0) {
            $errorMSG .= "ddd is required ";
        } else {
            $archivo = $_FILES["archivo"]["tmp_name"];
        }
        //titulo
        if (empty($_POST["titulo"])) {
            $errorMSG .= "titulo is required ";
        } else {
            $titulo = $_POST["titulo"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $fileName = uniqid() . '.pdf';
            $archivo = $_FILES["archivo"]["tmp_name"];
            $size = $_FILES["archivo"]["size"];
            $tipo = $_FILES["archivo"]["type"];

            $fp = fopen($archivo, "rb");
            $contenido = fread($fp, $size);
            $contenido = addslashes($contenido);
            fclose($fp);

            $sql = "INSERT INTO archivo (idialumno, nombre, contenido, titulo, tipo) VALUES ('" . $idialumno . "','$fileName','$contenido','$titulo','PDF')";
            //$sql = "INSERT INTO archivo (idialumno, nombre, titulo, tipo) VALUES ('" . $last_id . "','$fileName','perfil','$image_type')";
            if ($conn->query($sql) === TRUE) {
                echo "success";
                $var = true;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $var = false;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
                $var = false;
            } else {
                echo $errorMSG;
                $var = false;
            }
        }
        return $var;
    }

    function addNewPlanPago() {
        $errorMSG = "";
        //descripcion
        if (empty($_POST["clave"])) {
            $errorMSG = "clave is required ";
        } else {
            $clave = strtoupper($_POST["clave"]);
        }
        //descripcion
        if (empty($_POST["descripcion"])) {
            $errorMSG = "descripcion is required ";
        } else {
            $descripcion = strtoupper($_POST["descripcion"]);
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO plan_pago (clave, descripcion) VALUES ('$clave','$descripcion')";
            if ($conn->query($sql) === TRUE) {
                echo "Plan de pago agregado";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function cashReport() {
        $errorMSG = "";
        //cajero
        if (empty($_GET["cajero"])) {
            $cajero = "";
            $param = "";
        } else {
            $idicajero = $_GET["cajero"];
            $cajero = " AND idiusuario =  '$idicajero'";
            $param = " WHERE idiusuario =  '$idicajero'";
        }
        //inicio
        if (empty($_GET["inicio"])) {
            $errorMSG .= "inicio is required ";
        } else {
            $inicio = $_GET["inicio"];
        }
        //fin
        if (empty($_GET["fin"])) {
            $errorMSG .= "fin is required ";
        } else {
            $fin = $_GET["fin"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            //$sql = "SELECT * FROM pagos WHERE fecha BETWEEN '$inicio 00:00:00' AND '$fin 23:59:59' $cajero";
            $sql = "SELECT
                    p.idipago,
                    p.idiventa,
                    p.matricula,
                    p.folio,
                    p.estatus,
                    p.total,
                    p.metodo_pago,
                    p.fecha,
                    p.idiusuario,
                    ( SELECT SUM( total ) FROM pagos WHERE fecha BETWEEN '$inicio 00:00:00' AND '$fin 23:59:59' $cajero ) AS tot,
                    ( SELECT SUM( total ) FROM pagos WHERE fecha BETWEEN '$inicio 00:00:00' AND '$fin 23:59:59' AND metodo_pago = 'Efectivo' $cajero ) AS efectivo,
                    ( SELECT SUM( total ) FROM pagos WHERE fecha BETWEEN '$inicio 00:00:00' AND '$fin 23:59:59' AND metodo_pago = 'Tarjeta de Débito' $cajero ) AS tarjeta,
                    ( SELECT SUM( total ) FROM pagos WHERE fecha BETWEEN '$inicio 00:00:00' AND '$fin 23:59:59' AND metodo_pago = 'Depósito Bancario' $cajero ) AS deposito 
                    FROM
                    pagos AS p 
                    WHERE p.fecha BETWEEN '$inicio 00:00:00' AND '$fin 23:59:59' $cajero";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function income_report() {
        $errorMSG = "";
        //cajero
        if (empty($_GET["cajero"])) {
            $cajero = "";
            $param = "";
        } else {
            $idicajero = $_GET["cajero"];
            $cajero = " AND idiusuario =  '$idicajero'";
            $param = " WHERE idiusuario =  '$idicajero'";
        }
        //inicio
        if (empty($_GET["inicio"])) {
            $inicio = date('Y-m-d');
        } else {
            $inicio = $_GET["inicio"];
        }
        //fin
        if (empty($_GET["fin"])) {
            $fin = date('Y-m-d');
        } else {
            $fin = $_GET["fin"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            //$sql = "SELECT * FROM pagos WHERE fecha BETWEEN '$inicio 00:00:00' AND '$fin 23:59:59' $cajero";
            $sql = "SELECT
                    p.idipago,
                    p.idiventa,
                    p.matricula,
                    p.folio,
                    p.estatus,
                    p.total,
                    p.metodo_pago,
                    p.fecha,
                    p.idiusuario,
                    ( SELECT SUM( total ) FROM pagos WHERE fecha BETWEEN '$inicio 00:00:00' AND '$fin 23:59:59' $cajero ) AS tot,
                    ( SELECT SUM( total ) FROM pagos WHERE fecha BETWEEN '$inicio 00:00:00' AND '$fin 23:59:59' AND metodo_pago = 'Efectivo' $cajero ) AS efectivo,
                    ( SELECT SUM( total ) FROM pagos WHERE fecha BETWEEN '$inicio 00:00:00' AND '$fin 23:59:59' AND metodo_pago = 'Tarjeta de Débito' $cajero ) AS tarjeta,
                    ( SELECT SUM( total ) FROM pagos WHERE fecha BETWEEN '$inicio 00:00:00' AND '$fin 23:59:59' AND metodo_pago = 'Depósito Bancario' $cajero ) AS deposito 
                    FROM
                    pagos AS p 
                    WHERE p.fecha BETWEEN '$inicio 00:00:00' AND '$fin 23:59:59' $cajero";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function delete_servicio() {
        $errorMSG = "";
        //post input string idicarrera
        if (empty($_POST["idiservicio"])) {
            $errorMSG .= "idiservicio is required ";
        } else {
            $idiservicio = $_POST["idiservicio"];
        }

        // run query
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE servicios SET deleted = '1' WHERE idiservicio = '$idiservicio'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function suspended_servicio() {
        $errorMSG = "";
        if (empty($_POST["idiservicio"])) {
            $errorMSG = "idiservicio is required ";
        } else {
            $idiservicio = $_POST["idiservicio"];
        }
        if (empty($_POST["suspended"])) {
            $suspended = '0';
        } else {
            $suspended = $_POST["suspended"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE servicios SET suspended = '$suspended' WHERE idiservicio = '$idiservicio'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error : " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

}

$pagos = new pagos();
