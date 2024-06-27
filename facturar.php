<?php

ini_set("soap.wsdl_cache_enabled", 1);

date_default_timezone_set('America/Mexico_City');

/**
 * Clase para timbrado de CFDI
 */
class facturacion33 {

    public $opciones = array();
    public $xml;
    public $pdf;
    public $qr;
    public $sello;
    public $nocertificado;
    public $certificado;
    public $fecha_timbrado;
    public $sello_sat;
    public $certificado_sat;
    public $sello_cfd;
    public $rfcprov_certif;
    public $UUID;
    public $cadena_original;
    // Datos del emisor
    public $rfce;
    public $nombree;
    public $regimene;
    // Datos del receptor
    public $rfcr;
    public $nombrer;
    public $usor;
    // Datos del Documento
    public $Serie;
    public $Folio;
    public $Condiciones = "CONTADO";
    public $MetodoPago;
    public $FormaPago;
    public $LugarExpedicion = "54070";
    // Partidas
    public $detalle;
    public $subtotal;
    public $total;
    public $impuesto;
    // Cancelacion
    public $estatusc;
    public $acusexml;
    public $fechacan;
    public $ultimoError;
    public $ultimoCodigoError;
    public $log = 'timbrado-log.txt';
    public $debug;
    public $url;

    function __construct($url, $opciones = array()) {
        $this->url = $url;
        foreach ($opciones as $k => $v) {
            if (isset($v) && in_array($k, array('Agente', 'PasswordEmisor'))) {
                $this->opciones[$k] = $v;
            }
        }
    }

    // Funcion que genera el XML se debe pasar el id del emisor existente en la tabla
    // factura_emisor y el id de la venta
    public function generarXML() {
        $fecha_actual = substr(date('c'), 0, 19);

        $cfdi = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<cfdi:Comprobante xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd" Version="3.3" Serie="$this->Serie" Folio="$this->Folio" Fecha="$fecha_actual" Sello="" FormaPago="$this->FormaPago" NoCertificado="" Certificado="" CondicionesDePago="$this->Condiciones" SubTotal="$this->subtotal" Moneda="MXN" Total="$this->total" TipoDeComprobante="I" MetodoPago="$this->MetodoPago" LugarExpedicion="$this->LugarExpedicion">
  <cfdi:Emisor Rfc="$this->rfce" Nombre="$this->nombree" RegimenFiscal="$this->regimene"/>
  <cfdi:Receptor Rfc="$this->rfcr" Nombre="$this->nombrer" UsoCFDI="$this->usor"/>
  <cfdi:Conceptos>
    $this->detalle
  </cfdi:Conceptos>
  <cfdi:Impuestos TotalImpuestosTrasladados="$this->impuesto">
    <cfdi:Traslados>
      <cfdi:Traslado Impuesto="002" TipoFactor="Tasa" TasaOCuota="0.000000" Importe="$this->impuesto" />
    </cfdi:Traslados>
  </cfdi:Impuestos>
</cfdi:Comprobante>
XML;

        $this->xml = $cfdi;
    }

    public function sellarXML($cfdi, $numero_certificado, $archivo_cer, $archivo_pem) {
        /**
         * Sellar el comprobante
         * @param  string $cfdi               XML a sellar
         * @param  string $numero_certificado Numero del certificado
         * @param  string $archivo_cer        Ruta del archivo .cer
         * @param  string $archivo_pem        Ruta del archivo .pem
         * @return string                     XML sellado
         */
        // numero certificado demo: 30001000000300023708
        $private = openssl_pkey_get_private(file_get_contents($archivo_pem));
        $certificado = str_replace(array('\n', '\r'), '', base64_encode(file_get_contents($archivo_cer)));
        $xdoc = new DomDocument();
        $xdoc->loadXML($cfdi) or die("XML invalido");
        $c = $xdoc->getElementsByTagNameNS('http://www.sat.gob.mx/cfd/3', 'Comprobante')->item(0);
        $c->setAttribute('Certificado', $certificado);
        $c->setAttribute('NoCertificado', $numero_certificado);
        $XSL = new DOMDocument();
        $XSL->load('utilerias/xslt33/cadenaoriginal_3_3.xslt');

        $proc = new XSLTProcessor;
        $proc->importStyleSheet($XSL);
        $cadena_original = $proc->transformToXML($xdoc);
        openssl_sign($cadena_original, $sig, $private, OPENSSL_ALGO_SHA256);
        $sello = base64_encode($sig);
        $c->setAttribute('Sello', $sello);
        $this->sello = $sello;
        $this->certificado = $certificado;
        $this->nocertificado = $numero_certificado;
        $this->cadena_original = $cadena_original;


        return $xdoc->saveXML();
    }

    public function timbrarXML($str, $opciones = array("VersionDLL" => "EasyOne", "SoftwareID" => "QV1TAXSH")) {

        try {
            //Si $str es la ruta a un archivo leerlo.
            if (file_exists($str)) {
                $str = file_get_contents($str);
            }
            $opciones['Xml'] = $str;
            $opciones = array_merge($opciones, $this->opciones);


            $cliente = new SoapClient($this->url, array('trace' => 1));

            if ($this->opciones["Agente"] == "QV1TAXSH") {
                $respuesta = $cliente->ValidaTimbraPrueba((object) $opciones);
                $metodo = "ValidaTimbraPrueba";
            } else {
                $respuesta = $cliente->ValidaTimbra((object) $opciones);
                $metodo = "ValidaTimbra";
            }

            //Establecer las propiedades con el objeto de respuesta SOAP.
            // foreach(array('xml', 'pdf', 'png', 'txt') as $propiedad){
            //   if(isset($respuesta->$propiedad)){
            //     $this->$propiedad = base64_decode($respuesta->$propiedad);
            //   }
            // }
            $d = json_decode(json_encode($respuesta), true);
            // echo '<pre>';
            // var_dump($d[$metodo."Result"]["Estatus"]);
            // echo '</pre>';

            if ($d[$metodo . "Result"]["Estatus"] == 'OK') {
                $this->xml = $d[$metodo . "Result"]["Xml"];
                $xml_cfdi = simplexml_load_string($this->xml);
                $xml_cfdi->registerXPathNamespace("tfd", "http://www.sat.gob.mx/TimbreFiscalDigital");
                $tfd = $xml_cfdi->xpath('//tfd:TimbreFiscalDigital');
                $this->fecha_timbrado = (string) $tfd[0]['FechaTimbrado'];
                $this->sello_sat = (string) $tfd[0]['SelloSAT'];
                $this->certificado_sat = (string) $tfd[0]['NoCertificadoSAT'];
                $this->sello_cfd = (string) $tfd[0]['SelloCFD'];
                $this->rfcprov_certif = (string) $tfd[0]['RfcProvCertif'];
                $this->UUID = (string) $tfd[0]['UUID'];
                return true;
            } else {
                $this->ultimoError = $d[$metodo . "Result"]["MensajeError"];
                $this->ultimoCodigoError = $d[$metodo . "Result"]["CodigoError"];
                return false;
            }

            // if($this->debug == 1){
            //   $this->log("SOAP request:\t".$cliente->__getLastRequest());
            //   $this->log("SOAP response:\t".$cliente->__getLastResponse());
            // }

            return true;
        } catch (SoapFault $e) {
            // if($this->debug == 1){
            //   $this->log("SOAP request:\t".$cliente->__getLastRequest());
            //   $this->log("SOAP response:\t".$cliente->__getLastResponse());
            // }
            $this->ultimoError = $e->faultstring;
            $this->ultimoCodigoError = $e->faultcode;
        } catch (Exception $e) {
            $this->ultimoError = $e->getMessage();
            $this->ultimoCodigoError = "Unknown";
        }
        return false;
    }

    public function getQr() {
        // Ver como adaptarla a mi codigo
        // $total = $mixml->getAttribute('Total');
        // $re    = $mixml->getChildren('cfdi:Emisor')->getAttribute('Rfc');
        // $rr    = $mixml->getChildren('cfdi:Receptor')->getAttribute('Rfc');
        // $id    = $mixml->getChildren('cfdi:Complemento')->getChildren('tfd:TimbreFiscalDigital')->
        $total = $this->total;
        $re = $this->rfce;
        $rr = $this->rfcr;
        $id = $this->UUID;
        $fe = substr($this->certificado, -8);
        $total = str_pad(sprintf("%.6f", (double) $total), 17, '0', STR_PAD_LEFT);
        $url = 'https://verificacfdi.facturaelectronica.sat.gob.mx/default.aspx';
        return $url . '?re=' . $re . '&rr=' . $rr . '&tt=' . $total . '&id=' . $id . '&fe=' . $fe;
    }

    public function generaQr($value, $file) {
        include 'qrcode/qrlib.php';
        QRcode::png($value, $file, 'L', 4, 2);
        $this->qr = file_get_contents($file);
    }

    public function agregaEmisor($rfcemisor, $nombreemisor, $regimenemisor) {

        $this->rfce = $rfcemisor;
        $this->nombree = $nombreemisor;
        $this->regimene = $regimenemisor;
    }

    public function agregaReceptor($rfcr, $nombrer, $usocfdi) {
        $this->rfcr = $rfcr;
        $this->nombrer = $nombrer;
        $this->usor = $usocfdi;
    }

    public function agregaPartidas($partidas = array(), $impuestos = array()) {
    // Partida:
    // ClaveProdServ = Clave Sat para el producto
    // NoIdentificacion = Clave interna del producto   Opcional
    // Cantidad = Cantidad de la partida
    // ClaveUnidad = Clave Unidad SAT
    // Unidad = Unidad Interna   Opcional
    // Descripcion = Descripcion del producto
    // ValorUnitario = Precio Unitario
    // Importe = Cantidad * Precio Unitario
    // Descuento = Descuento   Opcional
    // Impuestos:
    // Base = Monto sobre el que se va calcular el impuesto (Importe de partida)
    // Impuesto = Clave Sat del impuesto
    // TipoFactor = Factor que se ocupa para calcular el iva (Tasa o Cuota)
    // TasaOCuota = porcentaje de iva a cobrar ya expresado en decimales (Ejemplo 0.16)
    // Importe = Monto del impuesto
        $partida = array();
        // Generación de array de partida
        foreach ($partidas as $k => $v) {
            // && in_array($k, array("emisorRFC", 'UserID', 'UserPass'))
            if (isset($v)) {
                $partida[$k] = $v;
            }
        }
        $impuesto = array();
        // Generación de array de Impuestos
        foreach ($impuestos as $k => $v) {
            // && in_array($k, array("emisorRFC", 'UserID', 'UserPass'))
            if (isset($v)) {
                $impuesto[$k] = $v;
            }
        }

        // Generación del texto para la partida
        $partidax = '<cfdi:Concepto ClaveProdServ="' . $partida['ClaveProdServ'] . '" Cantidad="' . $partida['Cantidad'] . '" ClaveUnidad="' . $partida['ClaveUnidad'] . '" Descripcion="' . $partida['Descripcion'] . '" ValorUnitario="' . $partida['ValorUnitario'] . '" Importe="' . $partida['Importe'] . '">';


        $this->detalle .= $partidax;
        $this->subtotal += $partida["Importe"];

        //Generación del texto para el impuesto
        $impuestox = '
      <cfdi:Impuestos>
        <cfdi:Traslados>
          <cfdi:Traslado Base="' . $impuesto['Base'] . '" Impuesto="' . $impuesto['Impuesto'] . '" TipoFactor="' . $impuesto['TipoFactor'] . '" TasaOCuota="' . number_format($impuesto['TasaOCuota'], 6) . '" Importe="' . $impuesto['Importe'] . '" />
        </cfdi:Traslados>
      </cfdi:Impuestos>
    ';

        $this->detalle .= $impuestox . '</cfdi:Concepto>';
        $this->impuesto .= $impuesto['Importe'];
        $this->total = $this->subtotal + $this->impuesto;
    }

    public function cancelaCFDI($uuid, $rfcemisor, $rfcreceptor, $total, $archivocer, $archivokey, $passwordkey, $opciones = array("VersionDLL" => "EasyOne", "SoftwareID" => "QV1TAXSH")) {
    // public function cancelaCFDI($uuid,$rfcemisor,$archivocer,$archivokey,$passwordkey,$opciones = array("VersionDLL" => "EasyOne", "SoftwareID" => "4U6LWO58"))

        try {

            //$opciones['Xml'] = $str;
            $opciones["UUID"] = $uuid;
            $opciones["RFCEmisor"] = $rfcemisor;
            $opciones["RFCReceptor"] = $rfcreceptor;
            $opciones["total"] = $total;
            $opciones["cerBase64"] = $archivocer;
            $opciones["keyBase64"] = $archivokey;
            $opciones["passwordBase64"] = $passwordkey;
            $opciones["modoProduccion"] = false;
            $opciones = array_merge($opciones, $this->opciones);
            // echo '<pre>';
            // var_dump($opciones);
            // echo '</pre>';

            $cliente = new SoapClient($this->url, array('trace' => 1));

            if ($this->opciones["Agente"] == "QV1TAXSH") {
                $respuesta = $cliente->cancelaCFDIPropioPruebas((object) $opciones);
                $metodo = "cancelaCFDIPropioPruebas";
            } else {
                $respuesta = $cliente->cancelaCFDIPropio((object) $opciones);
                $metodo = "cancelaCFDIPropio";
            }

            //Establecer las propiedades con el objeto de respuesta SOAP.
            // foreach(array('xml', 'pdf', 'png', 'txt') as $propiedad){
            //   if(isset($respuesta->$propiedad)){
            //     $this->$propiedad = base64_decode($respuesta->$propiedad);
            //   }
            // }
            $d = json_decode(json_encode($respuesta), true);
            header('Content-Type: application/json');
            $rows['data'][] = $respuesta;
            print json_encode($rows, JSON_PRETTY_PRINT);

            // echo '<pre>';
            // var_dump($d);
            // echo '</pre>';

            if ($d[$metodo . "Result"]["Estatus"] == 'OK') {
                $this->acusexml = $d[$metodo . "Result"]["AcuseXml"];
                $xml_cfdi = simplexml_load_string($this->acusexml);
                return true;
            } else {
                $this->ultimoError = $d[$metodo . "Result"]["MensajeError"];
                $this->ultimoCodigoError = $d[$metodo . "Result"]["CodigoError"];
                return false;
            }
        } catch (Exception $e) {
            $this->ultimoError = $e->getMessage();
            $this->ultimoCodigoError = "Unknown";
        }
        return false;
    }

    public function generaPDF($serie, $folio, $mostrar) {
        include './dataConect/conexion.php';
        include './NumerosALetras.php';
        require_once('tcpdf/tcpdf.php');
        $cSql = "select * from vw_factura_impresion where folio=" . $folio;
        $result = $conn->query($cSql);
        $result2 = $conn->query($cSql);
        $rowh = $result->fetch_assoc();
        $rfce = $rowh["rfc_emisor"];
        $nombree = $rowh["nombre_emisor"];
        $regimene = $rowh["regimen"];
        $direccione = trim($rowh["Calle"]) . ', ' . trim($rowh["NoExterior"]) . ', ' . trim($rowh["Colonia"]) . ', México, C.P. ' . trim($rowh["cp"]);
        $cpe = trim($rowh["cp"]);
        $fechae = $rowh["fecha_emision"];
        $formap = $rowh["forma_pagonombre"];
        $metodop = $rowh["metodo_pago"];
        $usocfdi = $rowh["usocfdi"];
        $usocfdin = $rowh["usocfdi_nombre"];
        $uuid = $rowh["uuid"];
        $tipoc = $rowh["tipo_comprobante"];
        $fechatim = $rowh["fecha_timbrado"];
        $noserie = $rowh["nocertificado"];
        $certsat = $rowh["certificado_sat"];
        $total = 0;

        $rfcr = $rowh["rfc"];
        $nombrer = $rowh["razon_social"];
        $usocfdi = $rowh["usocfdi"] . ' - ' . $rowh["usocfdi_nombre"];

        $bloquep = '';
        $productos = "";
        while ($row = $result2->fetch_assoc()) {
            $cveprod = $row["claveprodserv"];
            $descripcion = strtoupper($row["descripcion"] . ' ' . $row["observaciones"]);
            $cantidad = number_format($row["cantidad"], 0);
            $unidad = $row["claveunidad"];
            $precio = number_format($row["precio"], 2);
            $importe = number_format($row["importe"], 2);
            $total += $row["importe"];

            $bloquec = <<<EOF
  <tr>
    <td style="font-size: 8.5px;">$cveprod</td>
    <td style="font-size: 8.5px;">$descripcion</td>
    <td style="font-size: 8.5px; text-align: center;">$cantidad</td>
    <td style="font-size: 8.5px; text-align: center;">$unidad</td>
    <td style="font-size: 8.5px; text-align: right;">$precio</td>
    <td style="font-size: 8.5px; text-align: right;">$importe</td>
  </tr>

EOF;
            $bloquep .= $bloquec;
        }

        $total = number_format($total, 2);
        $letras = NumeroALetras::convertir($total, 'Pesos Pesos 00/100 M.N', 'Pesos 00/100 M.N');
        $alumnon = trim($rowh["apellido_paterno"]) . ' ' . trim($rowh["apellido_materno"]) . ' ' . trim($rowh["nombre"]);
        $alumnog = $rowh["cuatrimestre"];
        $alumnoni = $rowh["nivel"];
        $alumnogr = $rowh["cuatrimestre"] . '° ' . $rowh["carrera"];
        $alumnoc = $rowh["curp"];

        $sello = $rowh["sello"];
        $sellosat = trim($rowh["sellosat"]);
        $cadena = $rowh["cadena_original"];
        $rfcprov = $rowh["rfcprov_certificacion"];
        $observaciones = $rowh["observaciones"];



        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->startPageGroup();
        $pdf->AddPage();

        $bloque1 = <<<EOF
  <table style="width: 540px;" cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td style="background-color: white; width: 200px;">
          <img src="asset/images/ucp.png" style="width: 170px; height: 90px;"><br>
        </td>
        <td style="text-align:center; width: 240px; vertical-align: top;">
          <h4><b>$nombree</b></h4><h5><b>$rfce</b></h5><h6>$direccione</h6>
        </td>
      </tr>
    </tbody>
  <table>

EOF;

        $pdf->writeHTML($bloque1, false, false, false, false, '');

        $bloque2 = <<<EOF
<table style="width: 540px; border-color: #227ac7; border-collapse: collapse" cellspacing="0" cellpadding="0" border="1">
    <tbody>
      <tr bgcolor="#227ac7">
        <td style="color: #ffffff; font-family: helvetica; text-align: center; height: 20px;"><b>DATOS FISCALES</b></td>
        <td style="color: #ffffff; font-family: helvetica; text-align: center; height: 20px;"><b>DATOS TIMBRADO</b></td>
      </tr>
      <tr>
        <td style="width: 270px;">
          <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
              <tr><td colspan="2" style="font-size: 8px;"></td></tr>
              <tr>
                <td width="70%" style="font-size: 8px;"><b>Folio: </b>$folio</td>
                <td width="30%" style="font-size: 8px;"><b>Serie: </b>$serie</td>
              </tr>
              <tr>
                <td width="70%" style="font-size: 8px;"><b>Fecha Emisión: </b>$fechae</td>
                <td width="30%" style="font-size: 8px;"><b>Moneda: </b>MXN</td>
              </tr>
              <tr>
                <td width="70%" style="font-size: 8px;"><b>T. de Comprobante: </b>$tipoc</td>
                <td width="30%" style="font-size: 8px;"><b>T. de Cambio: </b>0</td>
              </tr>
              <tr>
                <td width="70%" style="font-size: 8px;"><b>No. de Serie del CSD: </b>$noserie</td>
                <td width="30%" style="font-size: 8px;"><b>Método Pago: </b>$metodop</td>
              </tr>
              <tr>
                <td width="70%" style="font-size: 8px;"><b>Forma de Pago: </b>$formap</td>
                <td width="30%" style="font-size: 8px;"></td>
              </tr>
              <tr><td colspan="2" style="font-size: 8px;"></td></tr>
            </tbody>
          </table>
        </td>
        <td style="width: 270px;">
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
              <tr><td style="font-size: 8px;"></td></tr>
              <tr>
                <td style="font-size: 8px;"><b>Folio Fiscal: </b>$uuid</td>
              </tr>
              <tr>
                <td style="font-size: 8px;"><b>Cer. SAT: </b>$certsat</td>
              </tr>
              <tr>
                <td style="font-size: 8px;"><b>Fecha Certificación: </b>$fechatim</td>
              </tr>
              <tr>
                <td style="font-size: 8px;"><b>CFDI Relacionado(s): </b></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr bgcolor="#227ac7">
        <td style="color: #ffffff; font-family: helvetica; text-align: center; height: 20px;"><b>DATOS EMISOR</b></td>
        <td style="color: #ffffff; font-family: helvetica; text-align: center; height: 20px;"><b>DATOS RECEPTOR</b></td>
      </tr>
      <tr>
        <td style="width: 270px;">
          <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
              <tr><td style="font-size: 8px;"></td></tr>
              <tr>
                <td style="font-size: 8px;"><b>RFC: </b>$rfce</td>
              </tr>
              <tr>
                <td style="font-size: 8px;"><b>Nombre: </b>$nombree</td>
              </tr>
              <tr>
                <td style="font-size: 8px;"><b>Régimen Fiscal: </b>$regimene</td>
              </tr>
              <tr>
                <td style="font-size: 8px;"><b>Expedido en: </b>$cpe</td>
              </tr>
              <tr><td style="font-size: 8px;"></td></tr>
            </tbody>
          </table>
        </td>
        <td style="width: 270px;">
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
              <tr><td style="font-size: 8px;"></td></tr>
              <tr>
                <td style="font-size: 8px;"><b>RFC: </b>$rfcr</td>
              </tr>
              <tr>
                <td style="font-size: 8px;"><b>Nombre: </b>$nombrer</td>
              </tr>
              <tr>
                <td style="font-size: 8px;"><b>Uso del CFDI: </b>$usocfdi</td>
              </tr>
              <tr><td style="font-size: 8px;"></td></tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr bgcolor="#227ac7">
        <td colspan="2" style="color: #ffffff; font-family: helvetica; text-align: center; height: 20px;"><b>CONCEPTOS</b>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="font-size: 1px">
          <table style="border-color: #227ac7; border-collapse: collapse" cellspacing="0" cellpadding="0" border="1">
            <tbody>
              <tr>
                <td style="font-size: 8px; text-align: center; width:70px"><b>Cve. Prod/Serv</b></td>
                <td style="font-size: 8px; text-align: center; width:280px"><b>Descripción</b></td>
                <td style="font-size: 8px; text-align: center; width:40px"><b>Cantidad</b></td>
                <td style="font-size: 8px; text-align: center; width:50px"><b>Cve. Unidad</b></td>
                <td style="font-size: 8px; text-align: center; width:50px"><b>Valor Unit.</b></td>
                <td style="font-size: 8px; text-align: center; width:50px"><b>Importe</b></td>
              </tr>
              $bloquep
            <tbody>
          </table>
        </td>
      </tr>


    </tbody>
  </table>


EOF;


        $pdf->writeHTML($bloque2, false, false, false, false, '');

        $bloque3 = <<<EOF
  <table style="width: 540px; border-color: #227ac7; border-collapse: collapse" cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td width="70%">
          <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
              <tr>
                <td style="font-size: 8px;"><b>Total con letra: </b>$letras</td>
              </tr>
              <tr>
                <td style="font-size: 8px;"><b>Observaciones: </b></td>
              </tr>
              <tr>
                <td style="font-size: 8px;" height="15">$observaciones</td>
              </tr>
              <tr>
                <td style="font-size: 8px;">Nombre del Alumno: $alumnon</td>
              </tr>
              <tr>
                <td style="font-size: 8px;">Grado del Alumno: $alumnog</td>
              </tr>
              <tr>
                <td style="font-size: 8px;">Nivel del Alumno: $alumnoni</td>
              </tr>
              <tr>
                <td style="font-size: 8px;">Grupo del Alumno: $alumnogr</td>
              </tr>
              <tr>
                <td style="font-size: 8px;">CURP del Alumno: $alumnoc</td>
              </tr>
            </tbody>
          </table>
        </td>
        <td width="30%">
          <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
              <tr>
                <td style="font-size: 8px;" width="60%"><b>Subtotal:</b></td>
                <td style="font-size: 8px;" width="10%">$</td>
                <td style="font-size: 8px;" width="30%" align="right">$total</td>
              </tr>
              <tr>
                <td style="font-size: 8px;" width="60%"><b>Traslados:</b></td>
                <td style="font-size: 8px;" width="10%">$</td>
                <td style="font-size: 8px;" width="30%" align="right">0.00</td>
              </tr>
              <tr>
                <td style="font-size: 8px;" width="60%"><b>Descuento:</b></td>
                <td style="font-size: 8px;" width="10%">$</td>
                <td style="font-size: 8px;" width="30%" align="right">0</td>
              </tr>
              <tr>
                <td style="font-size: 8px;" width="60%"><b>Total:</b></td>
                <td style="font-size: 8px;" width="10%">$</td>
                <td style="font-size: 8px;" width="30%" align="right">$total</td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td style="font-size: 8px;" colspan="2"></td>
      </tr>
      <tr>
        <td style="font-size: 8px;" colspan="2">
          <b>Sello digital del CFDI</b><br>
          $sello
        </td>
      </tr>
      <tr>
        <td style="font-size: 8px;" colspan="2"></td>
      </tr>
      <tr>
        <td style="font-size: 8px;" colspan="2">
          <b>Sello digital del SAT</b><br>
          $sellosat
        </td>
      </tr>
      <tr>
        <td style="font-size: 8px;" colspan="2"></td>
      </tr>
      <tr>
        <td style="font-size: 8px;" colspan="2">
          <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
              <tr>
                <td rowspan="5" width="120"><img src="cfdi/$serie$folio.png"></td>
                <td style="font-size: 8px;"><b>Cadena original del complemento de certificación digital del SAT</b><br>
                  $cadena
                </td>
              </tr>
              <tr>
                <td style="font-size: 8px;"><b>Folio Fiscal: </b><br>$uuid</td>
              </tr>
              <tr>
                <td style="font-size: 8px;"><b>No. de serie del certificado SAT</b><br>$certsat</td>
              </tr>
              <tr>
                <td style="font-size: 8px;"><b>Fecha y hora de certificación</b><br>$fechatim</td>
              </tr>
              <tr>
                <td style="font-size: 8px;"><b>RFC del proveedor de certificación:</b><br>$rfcprov</td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="2" style="font-size: 10px; text-align: center"><b>Este documento es una representación impresa de un CFDI</b></td>
      </tr>
    </tbody>
  </table>

EOF;

        $pdf->writeHTML($bloque3, false, false, false, false, '');

        $nombre_archivo = "factura.html";
        if ($archivo = fopen($nombre_archivo, "w")) {
            fwrite($archivo, $bloque1 . $bloque2 . $bloque3);
            fclose($archivo);
        }

        $pdf->Output('/home/universidaducp/public_html/saem/cfdi/' . $serie . $folio . '.pdf', 'F');
        // $pdf->Output('D:/xampp/htdocs/saem_desa/cfdi/'.$serie.$folio.'.pdf', 'F');
        $this->pdf = file_get_contents('cfdi/' . $serie . $folio . '.pdf');
        if ($mostrar) {
            $pdf->Output($serie . $folio . '.pdf', 'I');
        }
    }

}

?>
