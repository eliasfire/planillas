<?php

/*
 * $sTipo
 * II = Inicial Común
 * PP = Primaria Común
 * SS = Secundaria Común
 * AP = ADULTOS Primaria
 * AS = ADULTOS Secundaria
 * 
 * $sFecha = str;
 * $sMes = str;
 * $sAnio = str;
 * 
 * Común a Todas
 * $aEstablecimiento = array(
 *     'nombre' => str,
 *     'localizacion' => str,
 *     'cue' => str,
 *     'anexo' => str,
 *     'ingresador' => str,
 *     'responsable' => str,
 *     'domicilio' => str,
 *     'telefono' => str,
 *     'correoE' => str,
 *     'fInauguracion' => date,
 *     'fInicio' => date,
 *     'fAniversario' => date,
 *     'lugarFecha' => str,
 *     'secretario' => str,
 *     'vicedirector' => str,
 *     'director' => str,
 * );
 * Si es II
 * $aCiclos = array( 
 *       array( // Cada registro es un sub array. El Nº de Orden es el índice+1
 *         'nivel' => str,
 *         'ciclo' => str,
 *         'turno' => str,
 *         'nombreSeccion' => str,
 *         'tipoSeccion' => str,
 *         'matTotal' => int,  
 *         'matVaron' => int,    
 *         'matMujer' => int,   
 *         'especial' => int,  
 *         'asiTotal' => int,   
 *         'asiVaron' => int,   
 *         'asiMujer' => int,  
 *       ),
 *       'total' => array(
 *         'matTotal' => int,  
 *         'matVaron' => int,    
 *         'matMujer' => int,   
 *         'especial' => int,  
 *         'asiTotal' => int,   
 *         'asiVaron' => int,   
 *         'asiMujer' => int,  
 *       ),
 * ); 
 * $aDivision = array(
 *   'independiente' => array(
 *     'maternal' => int,
 *     'jardin' => int,
 *   ),
 *   'multiple' => array(
 *     'maternal' => int,
 *     'jardin' => int,
 *     'ambos' => int,
 *   ),
 *   'total' => int,
 * );
 * //Fin II
 * 
 * Si es PP
 * $aCiclos = array( 
 *       array( // Cada registro es un sub array. El Nº de Orden es el índice+1
 *         'anio' => str,
 *         'turno' => str,
 *         'nombreSeccion' => str,
 *         'tipoSeccion' => str,
 *         'matTotal' => int,  
 *         'matVaron' => int,    
 *         'matMujer' => int,   
 *         'especial' => int,   
 *         'repTotal' => int,  
 *         'repVaron' => int,   
 *         'repMujer' => int,   
 *         'asiTotal' => int,   
 *         'asiVaron' => int,   
 *         'asiMujer' => int,  
 *       ), 
 *       'total' => array(
 *         'matTotal' => int,  
 *         'matVaron' => int,    
 *         'matMujer' => int,   
 *         'especial' => int,   
 *         'repTotal' => int,  
 *         'repVaron' => int,   
 *         'repMujer' => int,   
 *         'asiTotal' => int,   
 *         'asiVaron' => int,   
 *         'asiMujer' => int,  
 *       ),
 * ); 
 * $aDivision = array(
 *   'independiente' => array(
 *     'primaria' => int,
 *   ),
 *   'multiple' => array(
 *     'primaria' => int,
 *   ),
 *   'total' => int,
 * );
 * //Fin PP 
 * 
 * Si es SS
 * $aCiclos = array( 
 *       array( // Cada registro es un sub array. El Nº de Orden es el índice+1
 *         'nivel' => str,
 *         'ciclo' => str,
 *         'turno' => str,
 *         'nombreSeccion' => str,
 *         'tipoSeccion' => str,
 *         'orientacion' => str,
 *         'matTotal' => int,  
 *         'matVaron' => int,  
 *         'matMujer' => int,  
 *         'repTotal' => int,   
 *         'repVaron' => int,   
 *         'repMujer' => int,   
 *       ),
 *       'total' => array(
 *         'matTotal' => int,  
 *         'matVaron' => int,  
 *         'matMujer' => int,  
 *         'repTotal' => int,   
 *         'repVaron' => int,   
 *         'repMujer' => int,   
 *       ), 
 * ); 
 * $aDivision = array(
 *   'independiente' => array(
 *     'secundario' => int,
 *     'polimodal' => int,
 *   ),
 *   'multiple' => array(
 *     'secundario' => int,
 *     'polimodal' => int,
 *   ),
 *   'total' => int,
 * );
 * //Fin SS 
 * 
 * Si es AP
 * $aCiclos = array( 
 *    array( // Cada registro es un sub array. El Nº de Orden es el índice+1
 *       'anio' => str,
 *       'turno' => str,
 *       'nombreSeccion' => str,
 *       'tipoSeccion' => str,
 *       'matTotal' => int.
 *       'matVaron' => int,  
 *       'matMujer' => int,  
 *      ),
 *      'total' => array(
 *       'matTotal' => int.
 *       'matVaron' => int,  
 *       'matMujer' => int,  
 *      ),
 * ); 
 * $aDivision = array(
 *   'independiente' => array(
 *     'total' => int,
 *     'alfabetizacion' => int, 
 *     'primario' => int,
 *   ),
 *   'multiple' => array(
 *     'total' => int,
 *     'alfabetizacion' => int, 
 *     'primario' => int,
 *   ),
 *   'total' => array(
 *     'total' => int,
 *     'alfabetizacion' => int, 
 *     'primario' => int,
 *   ),
 * );
 * //Fin AP
 * 
 * Si es AS
 * $aCiclos = array( 
 *    array( // Cada registro es un sub array. El Nº de Orden es el índice+1
 *       'anio' => str,
 *       'turno' => str,
 *       'nombreSeccion' => str,
 *       'tipoSeccion' => str,
 *       'plan' => str,
 *       'orientacion' => str,
 *       'matTotal' => int,  
 *       'matVaron' => int,  
 *       'matMujer' => int,  
 *      ),
 *      'total' => array(
 *       'matTotal' => int.
 *       'matVaron' => int,  
 *       'matMujer' => int,  
 *      ),
 * ); 
 * $aDivision = array(
 *   'independiente' => array(
 *     'secundario' => int,
 *   ),
 *   'multiple' => array(
 *     'secundario' => int,
 *   ),
 *   'total' => array(
 *     'secundario' => int,
 *   ),
 * );
 * //Fin AS
 * 
 * // Para II, PP, SS
 * $aAlimento = array(
 *     'almuerzo' => int,
 *     'lecheM' => int,
 *     'lecheT' => int,
 *     'refrigerioM' => int,
 *     'refrigerioT' => int,
 *     'otros' => int o array(
 *       array( //repetir por cada item
 *       'concepto' => str,
 *       'cantidad' => int,
 *       ),
 *     ),
 *     'total' => int,
 * 
 * // Para AP, AS
 * $aAlimento = array(
 *     'almuerzo' => int,
 *     'leche' => int,
 *     'refrigerio' => int,
 *     'otros' => int o array(
 *       array( //repetir por cada item
 *       'concepto' => str,
 *       'cantidad' => int,
 *       ),
 *     ),
 *     'total' => int,
 * ); //Fin aAlimento
 * 
 * $aCicloHoras' = array( 
 *       'dictado' => array(
 *         'total' => int,
 *         'titular' => int,
 *         'interina'=> int,
 *         'transitoria' => int,
 *         'suplente' => int,
 *         'sinCubrir' => int,
 *         'pasiva' => int,
 *         'adscripta' => int,
 *         'licencia' => int,
 *         'contrato' => int, 
 *       ),
 *       'maternal' => array(//Idem Anterior),
 *       'infantes' => array(//Idem Anterior),
 *       'egb12' => array(//Idem Anterior),
 *       'egb39' => array(//Idem Anterior),
 *       'secundario' => array(//Idem Anterior),
 *       'polimodal' => array(//Idem Anterior),
 *       'otros' => array(//Idem Anterior),
 *       'total' => array(//Idem Anterior),
 * ); //Fin aCicloHoras
 * 
 * $aSedeSeccion = array(
 *         'independiente' => array(
 *             'total' => int,
 *             'alfabetizacion' => int,
 *             'primario' => int,
 *             'secundario' => int,
 *             'egb' => int,
 *             'polimodal' => int,
 *          ),
 *          'multiples' => array( // Idem Anterior),
 *          'total' => array(array( // Idem Anterior),
 * ); //Fin aSeccion
 * $aSedeHoras' = array( 
 *       'dictado' => array(
 *         'total' => int,
 *         'titular' => int,
 *         'interina'=> int,
 *         'transitoria' => int,
 *         'suplente' => int,
 *         'sinCubrir' => int,
 *         'pasiva' => int,
 *         'adscripta' => int,
 *         'pasiva' => int,
 *         'contrato' => int, 
 *       ),
 *       'primario' => array(//Idem Anterior),
 *       'primarioSemi' => array(//Idem Anterior),
 *       'egb' => array(//Idem Anterior),
 *       'egbSemi' => array(//Idem Anterior),
 *       'secundario' => array(//Idem Anterior),
 *       'secundarioSemi' => array(//Idem Anterior),
 *       'proyecto' => array(//Idem Anterior),
 *       'otros' => array(//Idem Anterior),
 *       'total' => array(//Idem Anterior),
 * ); // Fin aSeccionHoras
 * $aNoDocente = array(
 *     'administrativo' => array(
 *       'total' => int,
 *       'varon' => int,
 *       'mujer' => int,
 *     ),
 *     'servicio' => array(idem anterior),
 *     'planes' => array(idem anterior),
 *     'contrato' => array(idem anterior),
 *     'otros' => array(idem anterior) o array(
 *       array( //repetir por cada item
 *       'concepto' => str,
 *       'total' => int,
 *       'varon' => int,
 *       'mujer' => int,
 *       ),
 *     ), 
 *     'total' => array(idem anterior),
 * ); //Fin aNoDocente
 * $aDocente' = array(
 *     'activo' => array(
 *       'total' => int,
 *       'varon' => int,
 *       'mujer' => int,
 *     ),
 *     'pasivo' => array(idem anterior),
 *     'noPlanta' => array(idem anterior),
 *     'otroEstablecimiento' => array(idem anterior),
 * ); //Fin aDocente
 */

class PlanillaPDF extends PDF {

  public $paginaOrientacion = 'P';
  public $paginaTamano = 'legal';
  public $paginaUnidad = 'mm';
  public $paginaMargenIzq = 15;
  public $paginaMargenSup = 6;
  public $paginaMargenDer = 15;
  public $paginaMargenInf = 12;
  public $fuente = "Times";
  public $tituloTamano = 12;
  public $textoTamano = 10;
  public $cantidadPaginas = 0;
  public $cabecera = "";
  public $pie = "Hoja {NP}";

  function Header() {
    $this->SetXY($this->paginaMargenIzq, $this->paginaMargenSup);
    $this->SetFont($this->fuente, 'B', 10 / 1.25);
    $this->Cell(30, 6, 'Ministerio de Educación', 0, 0, 'L');
    $this->SetXY($this->paginaMargenIzq, $this->paginaMargenSup + 6);
    $this->Cell(30, 6, 'Dirección de Estadística', 0, 0, 'L');
    $this->SetX(150);
    $this->Cell(50, 6, 'Planilla de Información Estadística', 0, 0, 'R');
  }

  function Footer() {
    $this->SetY(-12);
    $this->SetFont($this->fuente, 'B', 10 / 1.25);
    $this->Cell(0, 12, preg_replace('/{NP}/', $this->PageNo(), $this->pie), 0, 0, 'C');
  }

  public function ImprimirPlanillaLocalizacion(
  $sTipo = '', //
          $sFecha = '', //
          $sMes = '', //
          $sAnio = '', //
          $aEstablecimiento = array(), //
          $aCiclo = array(), //
          $aDivision = array(), //
          $aAlimentacion = array(), //
          $sArchivo = ''
  ) {

    $test = empty($aEstablecimiento) &&
            empty($aCiclo) &&
            empty($aSecciones) &&
            empty($aAlimentacion);

    $pdf = $this->AbrirPDF($sArchivo);
    $this->ImprimirEncabezado($sTipo, $sFecha, $sMes, $sAnio, $aEstablecimiento, $pdf);
    $this->ImprimirCiclo($sTipo, $aCiclo, $pdf);
    $pdf->AddPage();
    if ($sTipo === 'AP' || $sTipo === 'AS')
      $this->ImprimirDivisionAdultos($sTipo, $aDivision, $pdf);
    else
      $this->ImprimirDivisionComun($sTipo, $aDivision, $pdf);
    $this->ImprimirAlimento($sTipo, $aAlimentacion, $pdf);
    $this->ImprimirPie($aEstablecimiento, $pdf);
	$pdf->Output($sArchivo, 'D');
    header('Content-type: application/json');
    echo json_encode(array(
        'result' => true,
        'archivo' => $sArchivo,
    ));
    Yii::app()->end();
  }

  public function ImprimirEncabezado(
  $tipo, //
          $fecha, //
          $mes, //
          $anio, //
          $establecimiento, // 
          $pdf              //
  ) {
    $pdf->SetXY($this->paginaMargenIzq, 18);
    $pdf->Cell(15, 6, "FECHA:", 0, 0, 'L');
    $pdf->SetXY(30, 18);
    $pdf->Cell(20, 6, $fecha, 1, 0, 'C');
    $pdf->SetXY(170, 18);
    $pdf->Cell(30, 6, "DATOS AL", 0, 0, 'L');
    $pdf->SetXY(150, 24);
    $pdf->Cell(20, 6, "MES", 0, 0, 'R');
    $pdf->SetXY(150, 30);
    $pdf->Cell(20, 6, "AÑO", 0, 0, 'R');
    $pdf->SetXY(170, 24);
    $pdf->Cell(30, 6, "$mes", 1, 0, 'C');
    $pdf->SetXY(170, 30);
    $pdf->Cell(30, 6, "$anio", 1, 0, 'C');
    switch ($tipo) {
      case 'II':
        $titulo = 'EDUCACIÓN COMÚN NIVEL INICIAL';
        break;

      case 'PP':
        $titulo = 'EDUCACIÓN COMÚN NIVEL PRIMARIO';
        break;

      case 'SS':
        $titulo = 'EDUCACIÓN COMÚN NIVEL SECUNDARIO - POLIMODAL';
        break;

      case 'AP':
        $titulo = 'EDUCACIÓN DE JÓVENES Y ADULTOS NIVEL PRIMARIO';
        break;

      case 'AS':
        $titulo = 'EDUCACIÓN DE JÓVENES Y ADULTOS NIVEL SECUNDARIO - POLIMODAL';
        break;

      default:
        break;
    }

    $pdf->SetXY(10, 24);
    $pdf->Cell(0, 6, $titulo, 0, 0, 'C');
    $pdf->SetXY(20, 36);
    $pdf->Cell(45, 6, "ESTABLECIMIENTO", 0, 0, 'R');
    $pdf->SetXY(20, 42);
    $pdf->Cell(45, 6, "LOCALIZACIÓN", 0, 0, 'R');
    $pdf->SetXY(70, 36);
    $pdf->Cell(70, 6, $establecimiento['nombre'], 1, 0, 'L');
    $pdf->SetXY(70, 42);
    $pdf->Cell(70, 6, $establecimiento['localizacion'], 1, 0, 'L');
    $pdf->SetXY(145, 36);
    $pdf->Cell(20, 6, "CUE", 0, 0, 'R');
    $pdf->SetXY(145, 42);
    $pdf->Cell(20, 6, "ANEXO", 0, 0, 'R');
    $pdf->SetXY(165, 36);
    $pdf->Cell(25, 6, $establecimiento['cue'], 1, 0, 'L');
    $pdf->SetXY(165, 42);
    $pdf->Cell(25, 6, $establecimiento['anexo'], 1, 0, 'L');
    $h = 6;
    $pdf->SetXY(10, -18);
    $pdf->Cell(40, $h, 'INGRESADOR:', 0, 0, 'R');
    $pdf->SetXY(50, -18);
    $pdf->Cell(50, $h, $establecimiento['ingresador'], 1, 0, 'R');
    $pdf->SetXY(110, -18);
    $pdf->Cell(40, $h, 'RESPONSABLE:', 0, 0, 'R');
    $pdf->SetXY(150, -18);
    $pdf->Cell(50, $h, $establecimiento['responsable'], 1, 0, 'R');

    return;
  }

  public function ImprimirCiclo($tipo, $ciclo, $pdf) {
    $coordenadas = $this->ImprimirCicloCabecera($tipo, $pdf);

    $x = 10;
    $y = 62;
    $h = 6;
    $k = 0;

    $acumuladores = $ciclo['total'];
    unset($ciclo['total']);

    $y+=1; //Corrijo posición, cambio altura grilla

    $h = 5;

    //Impresión Filas
    foreach ($ciclo as $k => $v) {
      $y += $h;
      $x1 = $x;
      $pdf->SetXY($x1, $y);
      $pdf->Cell($coordenadas['ord']['w'], $h, $k + 1, 1, 0, 'C');
      $x1 += $coordenadas['ord']['w'];
      foreach ($v as $l => $w) {
        if ($l !== 'ord') {
          $pdf->SetXY($x1, $y);
          $pdf->Cell($coordenadas[$l]['w'], $h, $v[$l], 1, 0, 'C');
          $x1 += $coordenadas[$l]['w'];
        }
      }
    }

    //Impresión Acumuladores
    //debo restar el array de totales de las coordenadas 
    //para saber cuantos son y calcular la celda inicial
    $anchoTotal = 0;
    foreach ($coordenadas as $k => $v) {
      if ($k === 'matTotal')
        break;
      $anchoTotal += $coordenadas[$k]['w'];
    }

    $y+=$h;

    $pdf->SetXY($x, $y);
    $pdf->Cell($anchoTotal, $h, "TOTAL", 1, 0, 'C');

    $x1 = $x + $anchoTotal;
    foreach ($acumuladores as $k => $v) {
      $pdf->SetXY($x1, $y);
      $pdf->Cell($coordenadas[$k]['w'], $h, $v, 1, 0, 'C');
      $x1 += $coordenadas[$k]['w'];
    }

    return;
  }

  public function ImprimirDivisionAdultos($sTipo = '', $aDivision = array(), $pdf) {
    if ($sTipo === 'AP')
      $coord = array(
          'total' => array('T' => 'Total'),
          'alfabetizacion' => array('T' => 'Alfabetización'),
          'primario' => array('T' => 'Primario'),
      );
    else
      $coord = array(
          'secundario' => array('T' => 'Secundario'),
      );
    $lbl = array('independiente' => 'Independientes',
        'multiple' => 'Múltiples',
        'total' => 'Total');
    $w = 20;
    $y = 30;
    $x = $this->paginaMargenIzq + 70;
    $h = 6;
    $pdf->SetXY($x - 70, $y);
    $pdf->Cell(45, $h * 3, 'CANTIDAD DE\nSECCIONES/DIVISIONES', 1, 0, 'C');
    $i = 0;
    foreach ($lbl as $k => $v) {
      $j = 0;
      foreach ($coord as $c => $d) {
        if ($c == 'total' || $c == 'secundario') {
          $pdf->SetXY($x - 25, $y + $h * $i);
          $pdf->Cell(25, $h, $v, 1, 0, 'R');
        }
        if ($k == 'independiente') {
          $pdf->SetXY($x + $w * $j, $y - $h);
          $pdf->Cell($w, $h, $d['T'], 1, 0, 'C');
        }
        $pdf->SetXY($x + $w * $j, $y + $h * $i);
        $pdf->Cell($w, $h, empty($aDivision[$k]) ? '' : $aDivision[$k][$c], 1, 0, 'C');
        $j++;
      }
      $i++;
    }
    return;
  }

  public function ImprimirDivisionComun($sTipo, $aDivision, $pdf) {
    switch ($sTipo) {
      case 'II':
        $ind = array(
            'maternal' => array('T' => 'de Jardín Maternal'),
            'jardin' => array('T' => 'de Jardín de Infantes'),
        );
        $mul = array(
            'maternal' => array('T' => 'alumnos de Jardín Maternal exclusivamente'),
            'jardin' => array('T' => 'alumnos de Jardín de Infantes exclusivamente'),
            'ambos' => array('T' => 'alumnos de Jardín Maternal y Jardín de Infantes'),
        );
        break;
      case 'PP':
        $ind = array(
            'primaria' => array('T' => 'de Primaria'),
        );
        $mul = array(
            'primaria' => array('T' => 'alumnos de Primaria exclusivamente'),
        );
        break;
      case 'SS':
        $ind = array(
            'secundario' => array('T' => 'de Secundario'),
            'polimodal' => array('T' => 'de Polimodal'),
        );
        $mul = array(
            'secundario' => array('T' => 'alumnos de Secundario exclusivamente'),
            //2013-09-30 Pediste remover esta linea
            // 'egb' => array('T' => 'alumnos de Secundario, E.G.B. 1 y 2/Primario'),
            'polimodal' => array('T' => 'alumnos de polimodal'),
        );
        break;
    }

    $w = 10;
    $y = 30;
    $x = $this->paginaMargenIzq;
    $h = 6;

    $xI = $x;
    $xM = $x + 100;
    $yI = $y;

    $pdf->SetXY($xI, $yI);
    $pdf->Cell(0, $h, 'SECCIONES/DIVISIONES', 0, 0, 'L');
    $yI = $y + $h;
    $yM = $yI;

    $pdf->SetXY($xI, $yI);
    $pdf->Cell(80, $h, 'TOTAL INDEPENDIENTES', 1, 0, 'R');
    $yI += $h;

    $pdf->SetXY($xM, $yM);
    $pdf->Cell(80, $h, 'TOTAL MÚLTIPLES', 1, 0, 'R');
    $yM += $h;

    foreach ($aDivision['independiente'] as $k => $v) {
      $pdf->SetXY($xI, $yI);
      $pdf->Cell(80, $h, $ind[$k]['T'], 1, 0, 'R');
      $pdf->SetXY($xI + 80, $yI);
      $pdf->Cell($w, $h, $v, 1, 0, 'R');
      $yI += $h;
    }

    foreach ($aDivision['multiple'] as $k => $v) {
      $pdf->SetXY($xM, $yM);
      $pdf->Cell(80, $h, $mul[$k]['T'], 1, 0, 'R');
      $pdf->SetXY($xM + 80, $yM);
      $pdf->Cell($w, $h, $v, 1, 0, 'R');
      $yM += $h;
    }

    $y = ($yM > $yI ? $yM : $yI) + $h;
    $pdf->SetXY($xI, $y);
    $pdf->Cell(80, $h, 'TOTAL DE SECCIONES/DIVISIONES', 1, 0, 'R');
    $pdf->SetXY($xI + 80, $y);
    $pdf->Cell($w, $h, $aDivision['total'], 1, 0, 'R');

    return;
  }

  public function AbrirPDF($sArchivo = '') {
    if (empty($sArchivo))
      $archivo = date("Ymd-His") . ".pdf";

    $pdf = new PlanillaPDF(
            $this->paginaOrientacion, $this->paginaUnidad, $this->paginaTamano);
    $pdf->SetAutoPageBreak(false);
    $pdf->SetMargins($this->paginaMargenIzq, $this->paginaMargenSup, $this->paginaMargenDer);
    $pdf->AliasNbPages();
    $pdf->SetFillColor(0);
    $pdf->AddPage();
    return $pdf;
  }

  public function ImprimirCicloCabecera($tipo, $pdf) {
    $x = 10;
    $y = 56;
    $h = 6;
    $k = 0;

    $colapsadas = array();
    $II = array(
        'ord' => array('w' => 5, 'h' => $h * 2, 'T' => 'Ord'),
        'nivel' => array('w' => 10, 'h' => $h * 2, 'T' => 'Nivel'),
        'ciclo' => array('w' => 15, 'h' => $h * 2, 'T' => 'Ciclo/Sala'),
        'turno' => array('w' => 10, 'h' => $h * 2, 'T' => 'Turno'),
        'nombreSeccion' => array('w' => 30, 'h' => $h * 2, 'T' => 'Nombre de la\nSección/División'),
        'tipoSeccion' => array('w' => 45, 'h' => $h * 2, 'T' => 'Tipo de\nSecc./Div.'),
        'matTotal' => array('w' => 11, 'h' => $h, 'T' => 'Total'),
        'matVaron' => array('w' => 11, 'h' => $h, 'T' => 'Varones'),
        'matMujer' => array('w' => 11, 'h' => $h, 'T' => 'Mujeres'),
        'especial' => array('w' => 15, 'h' => $h * 2, 'T' => 'Con\nNecesidades\nEducativas\nEspeciales'),
        'asiTotal' => array('w' => 11, 'h' => $h, 'T' => 'Total'),
        'asiVaron' => array('w' => 11, 'h' => $h, 'T' => 'Varones'),
        'asiMujer' => array('w' => 11, 'h' => $h, 'T' => 'Mujeres'),
    );
    $colapsadas['II'] = array(
        'matTotal' => array('w' => $II['matTotal']['w'] * 3, 'h' => $h, 'T' => 'MATRÍCULA TOTAL',
            'cols' => array('matTotal', 'matVaron', 'matMujer')),
        'asiTotal' => array('w' => $II['asiTotal']['w'] * 3, 'h' => $h, 'T' => 'ASISTENCIA MEDIA',
            'cols' => array('asiTotal', 'asiVaron', 'asiMujer')),
    );
    $PP = array(
        'ord' => array('w' => 5, 'h' => $h * 2, 'T' => 'Ord'),
        'anio' => array('w' => 20, 'h' => $h * 2, 'T' => 'Año de\nEstudio'),
        'turno' => array('w' => 10, 'h' => $h * 2, 'T' => 'Turno'),
        'nombreSeccion' => array('w' => 25, 'h' => $h * 2, 'T' => 'Nombre de la\nSecc./Div.'),
        'tipoSeccion' => array('w' => 15, 'h' => $h * 2, 'T' => 'Tipo de\nSecc./Div.'),
        'matTotal' => array('w' => 12, 'h' => $h, 'T' => 'Total'),
        'matVaron' => array('w' => 12, 'h' => $h, 'T' => 'Varones'),
        'matMujer' => array('w' => 12, 'h' => $h, 'T' => 'Mujeres'),
        'especial' => array('w' => 15, 'h' => $h * 2, 'T' => 'Con\nNecesidades\nEducativas\nEspeciales'),
        'repTotal' => array('w' => 12, 'h' => $h, 'T' => 'Total'),
        'repVaron' => array('w' => 12, 'h' => $h, 'T' => 'Varones'),
        'repMujer' => array('w' => 12, 'h' => $h, 'T' => 'Mujeres'),
        'asiTotal' => array('w' => 12, 'h' => $h, 'T' => 'Total'),
        'asiVaron' => array('w' => 12, 'h' => $h, 'T' => 'Varones'),
        'asiMujer' => array('w' => 12, 'h' => $h, 'T' => 'Mujeres'),
    );
    $colapsadas['PP'] = array(
        'matTotal' => array('w' => $PP['matTotal']['w'] * 3, 'h' => $h, 'T' => 'MATRÍCULA TOTAL',
            'cols' => array('matTotal', 'matVaron', 'matMujer')),
        'repTotal' => array('w' => $PP['repTotal']['w'] * 3, 'h' => $h, 'T' => 'REPITENTES',
            'cols' => array('repTotal', 'repVaron', 'repMujer')),
        'asiTotal' => array('w' => $PP['asiTotal']['w'] * 3, 'h' => $h, 'T' => 'ASISTENCIA MEDIA',
            'cols' => array('asiTotal', 'asiVaron', 'asiMujer')),
    );
    $SS = array( //2013-09-30 Pediste intercambiar orden nivel-ciclo
        'ord' => array('w' => 5, 'h' => $h * 2, 'T' => 'Ord'),
        'nivel' => array('w' => 20, 'h' => $h * 2, 'T' => 'Nivel\nServicio'),
        'ciclo' => array('w' => 15, 'h' => $h * 2, 'T' => 'Ciclo/Sala\nAño de\nEstudio'),
        'turno' => array('w' => 10, 'h' => $h * 2, 'T' => 'Turno'),
        'nombreSeccion' => array('w' => 25, 'h' => $h * 2, 'T' => 'Nombre de la\nSecc./Div.'),
        'tipoSeccion' => array('w' => 25, 'h' => $h * 2, 'T' => 'Tipo de\nSecc./Div.'),
        'orientacion' => array('w' => 30, 'h' => $h * 2, 'T' => 'Orientación\nde Nivel\nSecundario\nPolimodal'),
        'matTotal' => array('w' => 11, 'h' => $h, 'T' => 'Total'),
        'matVaron' => array('w' => 11, 'h' => $h, 'T' => 'Varones'),
        'matMujer' => array('w' => 11, 'h' => $h, 'T' => 'Mujeres'),
        'repTotal' => array('w' => 11, 'h' => $h, 'T' => 'Total'),
        'repVaron' => array('w' => 11, 'h' => $h, 'T' => 'Varones'),
        'repMujer' => array('w' => 11, 'h' => $h, 'T' => 'Mujeres'),
    );
    $colapsadas['SS'] = array(
        'matTotal' => array('w' => $SS['matTotal']['w'] * 3, 'h' => $h, 'T' => 'MATRÍCULA TOTAL',
            'cols' => array('matTotal', 'matVaron', 'matMujer')),
        'repTotal' => array('w' => $SS['repTotal']['w'] * 3, 'h' => $h, 'T' => 'REPITENTES',
            'cols' => array('repTotal', 'repVaron', 'repMujer')),
    );
    $AP = array(
        'ord' => array('w' => 5, 'h' => $h * 2, 'T' => 'Ord'),
        'anio' => array('w' => 25, 'h' => $h * 2, 'T' => 'Año de Estudio'),
        'turno' => array('w' => 10, 'h' => $h * 2, 'T' => 'Turno'),
        'nombreSeccion' => array('w' => 45, 'h' => $h * 2, 'T' => 'Nombre de la\nSecc./Div.'),
        'tipoSeccion' => array('w' => 75, 'h' => $h * 2, 'T' => 'Tipo de\nSecc./Div.'),
        'matTotal' => array('w' => 12, 'h' => $h, 'T' => 'Total'),
        'matVaron' => array('w' => 12, 'h' => $h, 'T' => 'Varones'),
        'matMujer' => array('w' => 12, 'h' => $h, 'T' => 'Mujeres'),
    );
    $colapsadas['AP'] = array(
        'matTotal' => array('w' => $AP['matTotal']['w'] * 3, 'h' => $h, 'T' => 'MATRÍCULA TOTAL',
            'cols' => array('matTotal', 'matVaron', 'matMujer')),
    );
    $AS = array(
        'ord' => array('w' => 5, 'h' => $h * 2, 'T' => 'Ord'),
        'anio' => array('w' => 25, 'h' => $h * 2, 'T' => 'Año de Estudio'),
        //2013-09-30 Pediste remover esta línea
        //'nivel' => array('w' => 10, 'h' => $h * 2, 'T' => 'Nivel'),
        'turno' => array('w' => 10, 'h' => $h * 2, 'T' => 'Turno'),
        'nombreSeccion' => array('w' => 20, 'h' => $h * 2, 'T' => 'Nombre de la\nSecc./Div.'),
        'tipoSeccion' => array('w' => 15, 'h' => $h * 2, 'T' => 'Tipo de\nSecc./Div.'),
        'plan' => array('w' => 50, 'h' => $h, 'T' => 'Plan de Estudios'),
        'orientacion' => array('w' => 25, 'h' => $h, 'T' => 'Orientación'),
        'matTotal' => array('w' => 15, 'h' => $h, 'T' => 'Total'),
        'matVaron' => array('w' => 15, 'h' => $h, 'T' => 'Varones'),
        'matMujer' => array('w' => 15, 'h' => $h, 'T' => 'Mujeres'),
    );
    $colapsadas['AS'] = array(
        'plan' => array('w' => $AS['plan']['w'] + $AS['orientacion']['w'], 'h' => $h, 'T' => 'SECUNDARIO / POLIMODAL',
            'cols' => array('plan', 'orientacion')),
        'matTotal' => array('w' => $AS['matTotal']['w'] * 3, 'h' => $h, 'T' => 'MATRÍCULA TOTAL',
            'cols' => array('matTotal', 'matVaron', 'matMujer')),
    );

    $this->SetFont($this->fuente, 'B', 8 / 1.25);
    $x1 = $x;

    $coor = $$tipo; //Uso la vble Tipo como nombre de datos de coordenadas
    $colap = $colapsadas[$tipo];
    $cols = array();

    foreach ($coor as $k => $v) {
      //Impresión de Celdas Titulo Colapsadas según el caso
      if (isset($colap[$k])) { //tiene título definido
        $y1 = $y;
        $cols = $colap[$k]['cols'];
        $pdf->SetXY($x1, $y1);
        $pdf->Cell($colap[$k]['w'], $colap[$k]['h'], $colap[$k]['T'], 1, 0, 'C');
      }
      if (in_array($k, $cols))
        $y1 = $y + $h;
      else {
        $cols = array();
        $y1 = $y;
      }

      $pdf->SetXY($x1, $y1);
      $pdf->Cell($v['w'], $v['h'], $v['T'], 1, 0, 'C');
      $x1 += $v['w'];
    }

    return $coor;
  }

  public function ImprimirAlimento($sTipo, $aAlimentacion, $pdf) {
    switch ($sTipo) {
      case 'II':
      case 'PP':
      case 'SS':
        $tit = array(
            'almuerzo' => 'ALMUERZO',
            'lecheM' => 'COPA DE LECHE - Turno Mañana',
            'lecheT' => 'COPA DE LECHE - Turno Tarde',
            'refrigerioM' => 'REFRIGERIO / MERIENDA - Turno Mañana',
            'refrigerioT' => 'REFRIGERIO / MERIENDA - Turno Tarde',
            'otros' => 'Otros Servicios Alimentarios: (especificar)',
        );
        break;
      case 'AP':
      case 'AS':
        $tit = array(
            'almuerzo' => 'ALMUERZO',
            'leche' => 'COPA DE LECHE',
            'refrigerio' => 'REFRIGERIO / MERIENDA',
            'otros' => 'Otros Servicios Alimentarios: (especificar)',
        );
        break;
    }

    $w = 10;
    $y = 82;
    $x = $this->paginaMargenIzq;
    $h = 6;

    $x1 = $x;
    $y1 = $y;

    $pdf->SetXY($x1, $y1);
    $pdf->Cell(100, $h * 2, 'CANTIDAD BENEFICIARIOS\nDEL SERVICIO DE ALIMENTACIÓN ', 0, 0, 'L');
    $y1 = $y + $h * 2;

    $aOtros = $aAlimentacion['otros'];
    unset($aAlimentacion['otros']);

    foreach ($aAlimentacion as $k => $v) {
      $pdf->SetXY($x1, $y1);
      $pdf->Cell(100, $h, $tit[$k], 1, 0, 'R');
      $pdf->SetXY($x1 + 100, $y1);
      $pdf->Cell($w, $h, $v, 1, 0, 'R');
      $y1 += $h;
    }

    $pdf->SetXY($x1, $y1);
    $pdf->Cell(100, $h, $tit['otros'], 1, 0, 'R');
    $y1 += $h;
    foreach ($aOtros as $k => $v) {
      $pdf->SetXY($x1, $y1);
      $pdf->Cell(100, $h, $v['concepto'], 1, 0, 'R');
      $pdf->SetXY($x1 + 100, $y1);
      $pdf->Cell($w, $h, $v['cantidad'], 1, 0, 'R');
      $y1 += $h;
    }

    return;
  }

  public function ImprimirPie($aEstablecimiento, $pdf) {

    $w = 140;
    $y = 148;
    $x = $this->paginaMargenIzq;
    $h = 6;

    $x1 = $x;
    $y1 = $y;

    $pdf->SetXY($x1, $y1);
    $pdf->Cell(50, $h, 'Domicilio Actualizado', 1, 0, 'C');
    $pdf->SetXY($x1 + 50, $y1);
    $pdf->Cell($w, $h, $aEstablecimiento['domicilio'], 1, 0, 'C');

    $y1 += $h;
    $pdf->SetXY($x1, $y1);
    $pdf->Cell(50, $h, 'Teléfono/s', 1, 0, 'C');
    $pdf->SetXY($x1 + 50, $y1);
    $pdf->Cell($w, $h, $aEstablecimiento['telefono'], 1, 0, 'C');
    return;
  }

  /*
   * Obsoleto
   */

  public function ImprimirPlanillaSA(
  $sFecha = '', //
          $sMes = '', //
          $sAnio = '', //
          $aEstablecimiento = array(), //
          $aCicloLista = array(), //
          $aCicloHoras = array(), //
          $aSedeLista = array(), // 
          $aSedeSeccion = array(), //
          $aSedeHoras = array(), //
          $aAlimento = array(), //
          $aNoDocente = array(), //
          $aDocente = array(), //
          $archivo = ""                //
  ) {

    $adultos = null;

    if (!empty($aCicloLista) && !empty($aCicloHoras)) {
      $adultos = false;
      $alumnado = $aCicloLista;
      $horas = $aCicloHoras;
    } else if (!empty($aSedeLista) && !empty($aSedeSeccion) && !empty($aSedeHoras)) {
      $adultos = true;
      $alumnado = $aSedeLista;
      $seccion = $aSedeSeccion;
      $horas = $aCicloHoras;
    }

    $this->ImprimirEncabezado($sFecha, $sMes, $sAnio, $aEstablecimiento, $adultos, $pdf);
    $this->ImprimirAlumnado($alumnado, $adultos, $establecimiento['tipo'] == 'Secundario' ||
            $establecimiento['tipo'] == 'Polimodal', $pdf);
    if ($adultos)
      $this->ImprimirSeccion($seccion, $pdf);
    $pdf->AddPage();
    $this->ImprimirHoras($horas, $adultos, $pdf);
    $this->ImprimirAlimentos($alimento, $pdf);
    $this->ImprimirNoDocente($noDocente, $pdf);
    $this->ImprimirDocente($docente, $pdf);
    $this->ImprimirCierre($establecimiento, $pdf);

    $pdf->Output(Yii::app()->basePath . '/../' . 'tmp/' . $archivo, 'F');
    header('Content-type: application/json');
    echo json_encode(array(
        'result' => true,
        'archivo' => 'tmp/' . $archivo,
    ));
    Yii::app()->end();
  }

  /*
   * Esta función se usa para generar el formulario vacío de datos para su carga manual
   */

  public function ImprimirFormulario($adulto = false, $secundario = false, $archivo = "") {
    $sFecha = '';
    $sMes = '';
    $sAnio = '';
    $aEstablecimiento = array(
        'tipo' => '',
        'nombre' => '',
        'localizacion' => '',
        'cue' => '',
        'anexo' => '',
        'ingresador' => '',
        'responsable' => '',
        'domicilio' => '',
        'telefono' => '',
        'correoE' => '',
        'fInauguracion' => '',
        'fInicio' => '',
        'fAniversario' => '',
        'lugarFecha' => '',
        'secretario' => '',
        'vicedirector' => '',
        'director' => '',
    );
    $alumnado = array();
    if (!$adulto) {
      $archivo = "inicial.pdf";
      $aEstablecimiento['tipo'] = 'INICIAL - E.G.B. 1 y 2 - PRIMARIO - SECUNDARIO - POLIMODAL';
    } else if (!$secundario) {
      $archivo = "alfabetizacion.pdf";
      $aEstablecimiento['tipo'] = 'ALFABETIZACIÓN - E.G.B. 1 y 2 - PRIMARIO';
    } else {
      $archivo = "secundario.pdf";
      $aEstablecimiento['tipo'] = 'SECUNDARIO - POLIMODAL';
    }

    $pdf = new PlanillaPDF(
            $this->paginaOrientacion, $this->paginaUnidad, $this->paginaTamano);
    $pdf->SetAutoPageBreak(false);
    $pdf->SetMargins($this->paginaMargenIzq, $this->paginaMargenSup, $this->paginaMargenDer);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $this->ImprimirEncabezado($sFecha, $sMes, $sAnio, $aEstablecimiento, $adulto, $secundario, $pdf);
    $this->ImprimirAlumnado($alumnado, $adulto, $secundario, $pdf);
    if ($adulto) {
      $seccion = array(
          'independiente' => array(),
          'multiples' => array(),
          'total' => array(),
      );
      $horas = array(
          'dictado' => array(),
          'primario' => array(),
          'primarioSemi' => array(),
          'egb' => array(),
          'egbSemi' => array(),
          'secundario' => array(),
          'secundarioSemi' => array(),
          'proyecto' => array(),
          'otros' => array(),
          'total' => array(),
      );
      $this->ImprimirSeccion($seccion, $pdf);
    } else {
      $horas = array(
          'dictado' => array(),
          'maternal' => array(),
          'infantes' => array(),
          'egb12' => array(),
          //'egb39' => array(),
          'secundario' => array(),
          'polimodal' => array(),
          'otros' => array(),
          'total' => array(),
      );
    }
    $pdf->AddPage();
    $this->ImprimirHoras($horas, $adulto, $pdf);
    // $this->ImprimirAlimentos($alimento, $pdf);
    // $this->ImprimirNoDocente($noDocente, $pdf);
    // $this->ImprimirDocente($docente, $pdf);
    // $this->ImprimirCierre($establecimiento, $pdf);

    $pdf->Output(Yii::app()->basePath . '/../' . 'tmp/' . $archivo, 'F');
    /* header('Content-type: application/json');
      echo json_encode(array(
      'result' => true,
      'archivo' => 'tmp/' . $archivo,
      )); */
    //Yii::app()->end();
  }

  public function ImprimirHoras($horas, $adultos, $pdf) {
    $coord = array(
        'total' => array('T' => 'Total\n1+2+3+4+5'),
        'titular' => array('T' => 'Titular\n(1)'),
        'interina' => array('T' => 'Interina\n(2)'),
        'transitoria' => array('T' => 'Transitoria\n(3)'),
        'suplente' => array('T' => 'Suplente\n(4)'),
        'sinCubrir' => array('T' => 'Sin Cubrir\n(5)'),
        'pasiva' => array('T' => 'Tareas\nPasivas'),
        'adscripta' => array('T' => 'Comisión\nAdscripción'),
        'contrato' => array('T' => 'Contradas'),
    );
    $titEGB = 'INICIAL - E.G.B. 1 y 2 - PRIMARIO -\nSECUNDARIO - POLIMODAL';
    $lblEGB = array(
        'dictado' => 'Horas Destinas al DICTADO DE CLASES',
        'maternal' => 'Horas Destinadas a JARDÍN MATERNAL',
        'infantes' => 'Horas Destinadas a JARDÍN DE INFANTES',
        'egb12' => 'Horas Destinadas a E.G.B. 1 y 2',
        //'egb39' => 'Horas Destinadas a E.G.B. 3 a 9',
        'secundario' => 'Horas Destinadas a SECUNDARIO C.B. (1º, 2º y 3º)',
        'polimodal' => 'Horas Destinadas a POLIMODAL',
        'otros' => 'Horas Cátedra destinadas a otras\nactividades/funciones',
        'total' => 'TOTAL de Horas de la Institución',
    );
    $titAdu = 'ALFABETIZACIÓN - PRIMARIO -\nSECUNDARIO - E.G.B. - POLIMODAL';
    $lblAdu = array(
        'dictado' => 'Horas Destinas al DICTADO DE CLASES',
        'primario' => 'Total de Horas Destinadas a PRIMARIO',
        'primarioSemi' => 'Sistema Semipresencial de Primario (incluídas en anterior)',
        'egb' => 'Total de Horas Destinadas a E.G.B.',
        'egbSemi' => 'Sistema Semipresencial de E.G.B. (incluídas en anterior)',
        'secundario' => 'Total de Horas Destinadas a SECUNDARIO',
        'secundarioSemi' => 'Sistema Semipresencial de Secundario (incluídas en anterior)',
        'proyecto' => 'Horas destinadas a proyectos/actividades institucionales',
        'otros' => 'Horas destinadas a otras actividades/funciones',
        'total' => 'TOTAL de Horas de la Institución',
    );
    if (!$adultos) {
      $titulo = $titEGB;
      $lbl = $lblEGB;
    } else {
      $titulo = $titAdu;
      $lbl = $lblAdu;
    }
    $w = 15;
    $y = 42;
    $x = $this->paginaMargenIzq + 60;
    $h = 6;
    $pdf->SetXY($x - 60, $y - $h * 3);
    $pdf->Cell(60, $h, 'HORAS CÁTEDRA DEL ESTABLECIMIENTO', 0, 0, 'C');
    $pdf->SetXY($x - 60, $y - $h * 2);
    $pdf->Cell(60, $h * 2, $titulo, 1, 0, 'C');
    $i = 0;
    foreach ($lbl as $k => $v) {
      $j = 0;
      foreach ($coord as $c => $d) {
        if ($c == 'total') {
          $pdf->SetXY($x - 60, $y + $h * $i);
          $pdf->Cell(60, $h, $v, 1, 0, 'R');
        }
        if ($k == 'dictado') {
          $pdf->SetXY($x + $w * $j, $y - $h * 2);
          $pdf->Cell($w, $h * 2, $d['T'], 1, 0, 'C');
        }
        $pdf->SetXY($x + $w * $j, $y + $h * $i);
        $pdf->Cell($w, $h, empty($horas[$k]) ? '' : $seccion[$k][$c], 1, 0, 'C');
        $j++;
      }
      $i++;
    }
  }

}

?>
