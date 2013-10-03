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
    $this->SetXY(150, $this->paginaMargenSup);
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

    $test = empty($sFecha) &&
            empty($sMes) &&
            empty($sAnio);

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
    if (!$test) {
      header('Content-type: application/json');
      echo json_encode(array(
          'result' => true,
          'archivo' => $sArchivo,
      ));
      Yii::app()->end();
    }
  }

  public function ImprimirPlanillaServicioComplementario(
  $sTipo = '', //
          $sFecha = '', //
          $sMes = '', //
          $sAnio = '', //
          $aEstablecimiento = array(), //
          $aAlumnos = array(), //
          $aActividades = array(), //
          $sArchivo = ''
  ) {

    $test = empty($sFecha) &&
            empty($sMes) &&
            empty($sAnio);

    $pdf = $this->AbrirPDF($sArchivo);
    $sTipo = 'SERVICIOS COMPLEMENTARIOS\nPara los Servicios Alternativos/Complementarios';
    $this->ImprimirEncabezado($sTipo, $sFecha, $sMes, $sAnio, $aEstablecimiento, $pdf);
    $this->ImprimirAlumnos($aAlumnos, $pdf);
    $this->ImprimirActividades($aActividades, $pdf);
    $pdf->Output($sArchivo, 'D');
    if (!$test) {
      header('Content-type: application/json');
      echo json_encode(array(
          'result' => true,
          'archivo' => $sArchivo,
      ));
      Yii::app()->end();
    }
  }

  public function ImprimirPlanillaIFTTP(
  $sTipo = '', //
          $sFecha = '', //
          $sMes = '', //
          $sAnio = '', //
          $aEstablecimiento = array(), //
          $aMatricula = array(), //
          $aCursoIF = array(), //
          $aCursoTTP = array(), //
          $sArchivo = ''
  ) {

    $test = empty($sFecha) &&
            empty($sMes) &&
            empty($sAnio);

    $pdf = $this->AbrirPDF($sArchivo);
    $sTipo = 'Itinerario Formativo (I.F.) - Trayecto Técnico Profesional (T.T.P.)';
    $this->ImprimirEncabezado($sTipo, $sFecha, $sMes, $sAnio, $aEstablecimiento, $pdf);
    $this->ImprimirMatricula($aMatricula, $pdf);
    $this->ImprimirGrillaIFTTP('IF', $aCursoIF, $pdf);
    $this->ImprimirGrillaIFTTP('TTP', $aCursoTTP, $pdf);
    $pdf->Output($sArchivo, 'D');
    if (!$test) {
      header('Content-type: application/json');
      echo json_encode(array(
          'result' => true,
          'archivo' => $sArchivo,
      ));
      Yii::app()->end();
    }
  }

  public function ImprimirPlanillaEstablecimiento(
  $sTipo = '', //
          $sFecha = '', //
          $sMes = '', //
          $sAnio = '', //
          $aEstablecimiento = array(), //
          $aHoras = array(), //
          $aNoDocente = array(), //
          $aDocente = array(), //
          $sArchivo = ''
  ) {

    $test = empty($sFecha) &&
            empty($sMes) &&
            empty($sAnio);

    $pdf = $this->AbrirPDF($sArchivo);
    $this->ImprimirEncabezado('', $sFecha, $sMes, $sAnio, $aEstablecimiento, $pdf);
    $this->ImprimirHoras($aHoras, $pdf);
    $this->ImprimirNoDocente($aNoDocente, $pdf);
    $this->ImprimirDocente($aDocente, $pdf);
    $this->ImprimirPie($aEstablecimiento, $pdf);
    $pdf->Output($sArchivo, 'D');
    if (!$test) {
      header('Content-type: application/json');
      echo json_encode(array(
          'result' => true,
          'archivo' => $sArchivo,
      ));
      Yii::app()->end();
    }
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
    $pdf->SetXY(170, 12);
    $pdf->Cell(30, 6, "DATOS AL", 0, 0, 'L');
    $pdf->SetXY(150, 18);
    $pdf->Cell(20, 6, "MES", 0, 0, 'R');
    $pdf->SetXY(150, 24);
    $pdf->Cell(20, 6, "AÑO", 0, 0, 'R');
    $pdf->SetXY(170, 18);
    $pdf->Cell(30, 6, "$mes", 1, 0, 'C');
    $pdf->SetXY(170, 24);
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
        $titulo = $tipo;
        break;
    }

    $pdf->SetXY(10, 24);
    $pdf->Cell(0, 6, $titulo, 0, 0, 'C');
    $pdf->SetXY(20, 36);
    $pdf->Cell(45, 6, "ESTABLECIMIENTO", 0, 0, 'R');
    $pdf->SetXY(70, 36);
    $pdf->Cell(70, 6, $establecimiento['nombre'], 1, 0, 'L');
    if (isset($establecimiento['localizacion'])) {
      $pdf->SetXY(20, 42);
      $pdf->Cell(45, 6, "LOCALIZACIÓN", 0, 0, 'R');
      $pdf->SetXY(70, 42);
      $pdf->Cell(70, 6, $establecimiento['localizacion'], 1, 0, 'L');
    }
    $pdf->SetXY(150, 36);
    $pdf->Cell(20, 6, "CUE", 0, 0, 'R');
    $pdf->SetXY(170, 36);
    $pdf->Cell(30, 6, $establecimiento['cue'], 1, 0, 'L');
    if (isset($establecimiento['anexo'])) {
      $pdf->SetXY(150, 42);
      $pdf->Cell(20, 6, "ANEXO", 0, 0, 'R');
      $pdf->SetXY(170, 42);
      $pdf->Cell(30, 6, $establecimiento['anexo'], 1, 0, 'L');
    }
    $h = 6;
    if (isset($establecimiento['ingresador'])) {
      $pdf->SetXY(10, -18);
      $pdf->Cell(40, $h, 'INGRESADOR:', 0, 0, 'R');
      $pdf->SetXY(50, -18);
      $pdf->Cell(50, $h, $establecimiento['ingresador'], 1, 0, 'R');
    }
    if (isset($establecimiento['responsable'])) {
      $pdf->SetXY(110, -18);
      $pdf->Cell(40, $h, 'RESPONSABLE:', 0, 0, 'R');
      $pdf->SetXY(150, -18);
      $pdf->Cell(50, $h, $establecimiento['responsable'], 1, 0, 'R');
    }
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
    $SS = array(//2013-09-30 Pediste intercambiar orden nivel-ciclo
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

    if (isset($aEstablecimiento['domicilio'])) {
      $w = 140;
      $y = 148;
      $x = $this->paginaMargenIzq - 5;
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
    } else {
      $lbl = array(
          'mail' => 'Mail Institucional',
          'fecInauguracion' => 'Fecha de Inauguración',
          'fecAniversario' => 'Fecha de Aniversario/Cumpleaños',
          'fecInicio' => 'Fecha de Inicio Histórico de Actividades',
          'lugarFecha' => 'Lugar y Fecha',
          'secretaria' => 'Apellido y Nombre del SECRETARIO/A',
          'vice' => 'Apellido y Nombre del VICEDIRECTOR/A',
          'director' => 'Apellido y Nombre del DIRECTOR/A\nAUTORIDAD RESPONSABLE',
      );
      $y = 240;
      $x = $this->paginaMargenIzq;
      $h = 6;

      $x1 = $x;
      $y1 = $y;
      $pdf->SetXY($x1, $y1);
      $pdf->Cell(50, $h, $lbl['mail'], 1, 0, 'C');
      $pdf->SetXY($x1 + 50, $y1);
      $pdf->Cell(140, $h, $aEstablecimiento['mail'], 1, 0, 'C');

      $y1 += 2 * $h;
      $pdf->SetXY($x1, $y1);
      $pdf->Cell(50, $h, $lbl['fecInauguracion'], 1, 0, 'C');
      $pdf->SetXY($x1 + 70, $y1);
      $pdf->Cell(50, $h, $lbl['fecAniversario'], 1, 0, 'C');
      $pdf->SetXY($x1 + 140, $y1);
      $pdf->Cell(50, $h, $lbl['fecInicio'], 1, 0, 'C');
      $y1+=$h;
      $pdf->SetXY($x1, $y1);
      $pdf->Cell(50, $h, $aEstablecimiento['fecInauguracion'], 1, 0, 'C');
      $pdf->SetXY($x1 + 70, $y1);
      $pdf->Cell(50, $h, $aEstablecimiento['fecAniversario'], 1, 0, 'C');
      $pdf->SetXY($x1 + 140, $y1);
      $pdf->Cell(50, $h, $aEstablecimiento['fecInicio'], 1, 0, 'C');

      $y1 += 2 * $h;
      $pdf->SetXY($x1, $y1);
      $pdf->Cell(50, $h, $lbl['lugarFecha'], 1, 0, 'C');
      $pdf->SetXY($x1 + 50, $y1);
      $pdf->Cell(140, $h, $aEstablecimiento['lugarFecha'], 1, 0, 'C');

      $y1 += 2 * $h;
      $pdf->SetXY($x1, $y1);
      $pdf->Cell(50, $h, $lbl['secretaria'], 1, 0, 'C');
      $pdf->SetXY($x1 + 50, $y1);
      $pdf->Cell(140, $h, $aEstablecimiento['secretaria'], 1, 0, 'C');

      $y1 += 2 * $h;
      $pdf->SetXY($x1, $y1);
      $pdf->Cell(50, $h, $lbl['vice'], 1, 0, 'C');
      $pdf->SetXY($x1 + 50, $y1);
      $pdf->Cell(140, $h, $aEstablecimiento['vice'], 1, 0, 'C');

      $y1 += 2 * $h;
      $pdf->SetXY($x1, $y1);
      $pdf->Cell(50, $h * 2, $lbl['director'], 1, 0, 'C');
      $pdf->SetXY($x1 + 50, $y1);
      $pdf->Cell(140, $h * 2, $aEstablecimiento['director'], 1, 0, 'C');
    }
    return;
  }

  public function ImprimirHoras($horas, $pdf) {
    $coord = array(
        'total' => array('T' => 'Total\n1+2+3+4+5'),
        'titular' => array('T' => 'Titular\n(1)'),
        'interina' => array('T' => 'Interina\n(2)'),
        'transitoria' => array('T' => 'Transitoria\n(3)'),
        'suplente' => array('T' => 'Suplente\n(4)'),
        'sinCubrir' => array('T' => 'Sin Cubrir\n(5)'),
        'pasiva' => array('T' => 'Tareas\nPasivas'),
        'adscripta' => array('T' => 'Comisión\nAdscripción'),
        'licencia' => array('T' => 'Licencia'),
        'contrato' => array('T' => 'Contradas'),
    );
    $lbl = array(
        'dictado' => 'Horas Destinas al DICTADO DE CLASES',
        'maternal' => 'Horas Destinadas a JARDÍN MATERNAL',
        'infantes' => 'Horas Destinadas a JARDÍN DE INFANTES',
        'primario' => 'Horas Destinadas a PRIMARIO',
        'primarioSemi' => 'Sistema Semipresencial de Primario\n(incluídas en anterior)',
        'secundario' => 'Horas Destinadas a SECUNDARIO',
        'secundarioSemi' => 'Sistema Semipresencial de Secundario\n(incluídas en anterior)',
        'proyecto' => 'Horas destinadas a proyectos/actividades institucionales',
        'otros' => 'Horas Cátedra destinadas a otras\nactividades/funciones',
        'total' => 'TOTAL de Horas de la Institución',
    );

    $titulo = '';
    if (isset($horas['maternal']))
      $titulo .= 'INICIAL';
    if (isset($horas['primario']))
      $titulo .= (empty($titulo) ? '' : ' - ') . 'PRIMARIO';
    if (isset($horas['secundario']))
      $titulo .= (empty($titulo) ? '' : ' - ') . 'SECUNDARIO';
    if (isset($horas['primarioSemi']) || isset($horas['secundarioSemi']))
      $titulo = 'ADULTOS ' . $titulo;


    $w = 14;
    $y = 72;
    $x = $this->paginaMargenIzq - 5 + 60;
    $h = 6;
    $pc = 55;
    $pdf->SetXY($x - $pc, $y - $h * 3);
    $pdf->Cell($pc, $h, 'HORAS CÁTEDRA DEL ESTABLECIMIENTO', 0, 0, 'C');
    $pdf->SetXY($x, $y - $h * 3);
    $pdf->Cell($w * 6, $h, 'PLANTA ORGANICA FUNCIONAL (P.O.F.)', 1, 0, 'C');
    $pdf->SetXY($x - $pc, $y - $h * 2);
    $pdf->Cell($pc, $h * 2, $titulo, 1, 0, 'C');
    $i = 0;
    foreach ($lbl as $k => $v) {
      if (isset($horas[$k])) {
        $j = 0;
        foreach ($coord as $c => $d) {
          if ($c == 'total') {
            $pdf->SetXY($x - $pc, $y + $h * $i);
            $pdf->Cell($pc, $h, $v, 1, 0, 'R');
          }
          if ($k == 'dictado') {
            $pdf->SetXY($x + $w * $j, $y - $h * 2);
            $pdf->Cell($w, $h * 2, $d['T'], 1, 0, 'C');
          }
          $pdf->SetXY($x + $w * $j, $y + $h * $i);
          $pdf->Cell($w, $h, empty($horas[$k]) ? '' : $horas[$k][$c], 1, 0, 'C');
          $j++;
        }
        $i++;
      }
    }
  }

  public function ImprimirNoDocente($aNoDocente, $pdf) {
    $coord = array(
        'total' => array('T' => 'TOTAL'),
        'varon' => array('T' => 'Varones'),
        'mujer' => array('T' => 'Mujeres'),
    );
    $lbl = array(
        'administrativo' => 'Personal Administrativo',
        'servicio' => 'Personal de Servicio y Maestranza',
        'plan' => 'Planes Laborales de Empleo',
        'contratado' => 'Contratados',
        'otro' => 'Otros: (Especificar)',
        'total' => 'Totales',
    );

    $aOtros = $aNoDocente['otro'];
    $aTotal = $aNoDocente['total'];
    unset($aNoDocente['otro']);
    unset($aNoDocente['total']);

    $w = 15;
    $y = 150;
    $x = $this->paginaMargenIzq - 5 + 40;
    $h = 6;
    $pdf->SetXY($x - 40, $y);
    $pdf->Cell(40, $h, 'PERSONAL NO DOCENTE', 0, 0, 'C');
    $y+=2 * $h;
    $i = 0;
    foreach ($aNoDocente as $k => $v) {
      $j = 0;
      foreach ($coord as $c => $d) {
        if ($c == 'total') {
          $pdf->SetXY($x - 40, $y + $h * $i);
          $pdf->Cell(40, $h, $lbl[$k], 1, 0, 'R');
        }
        if ($k == 'administrativo') {
          $pdf->SetXY($x + $w * $j, $y - $h);
          $pdf->Cell($w, $h, $d['T'], 1, 0, 'C');
        }
        $pdf->SetXY($x + $w * $j, $y + $h * $i);
        $pdf->Cell($w, $h, empty($aNoDocente[$k]) ? '' : $aNoDocente[$k][$c], 1, 0, 'C');
        $j++;
      }
      $i++;
    }
    $y += $h * ($i + 1);
    $pdf->SetXY($x - 40, $y);
    $pdf->Cell(40, $h, $lbl['otro'], 1, 0, 'R');
    $y +=$h;
    $i = 0;
    foreach ($aOtros as $k => $v) {
      $j = 0;
      foreach ($coord as $c => $d) {
        if ($c == 'total') {
          $pdf->SetXY($x - 40, $y + $h * $i);
          $pdf->Cell(40, $h, $k, 1, 0, 'R');
        }
        $pdf->SetXY($x + $w * $j, $y + $h * $i);
        $pdf->Cell($w, $h, empty($aOtros[$k]) ? '' : $aOtros[$k][$c], 1, 0, 'C');
        $j++;
      }
      $i++;
    }
    $y += $h * ($i + 1);
    $j = 0;
    foreach ($aTotal as $c => $d) {
      if ($c == 'total') {
        $pdf->SetXY($x - 40, $y);
        $pdf->Cell(40, $h, $lbl['total'], 1, 0, 'R');
      }
      $pdf->SetXY($x + $w * $j, $y);
      $pdf->Cell($w, $h, $d, 1, 0, 'C');
      $j++;
    }
  }

  public function ImprimirDocente($aDocente, $pdf) {
    $coord = array(
        'total' => array('T' => 'TOTAL'),
        'varon' => array('T' => 'Varones'),
        'mujer' => array('T' => 'Mujeres'),
    );
    $lbl = array(
        'activo' => 'Total de DOCENTES en Actividad',
        'pasivo' => 'Personal Docente en Tareas Pasivas',
        'noPertenece' => 'Docentes afectados a este Establecimiento que\nno pertenecen a esta planta funcional',
        'pertenece' => 'Cantidad de docentes pertenecientes a esta planta \nfuncional afectados a otro establecimiento',
    );

    $w = 15;
    $y = 150;
    $x = 165;
    $h = 6;
    $pdf->SetXY($x - 65, $y);
    $pdf->Cell(95, $h, 'PERSONAL CON DESIGNACION DOCENTE POR SEXO', 0, 0, 'C');
    $y+=$h;
    $pdf->SetXY($x - 65, $y);
    $pdf->Cell(95, $h * 3, 'NOTA:\nSe debe contar a cada personal docente una sola vez,\naunque tenga más de un cargo o tipo de designación.', 0, 0, 'L');

    $y+=4 * $h;
    $i = 0;
    foreach ($aDocente as $k => $v) {
      $j = 0;
      foreach ($coord as $c => $d) {
        if ($c == 'total') {
          $pdf->SetXY($x - 65, $y + $h * $i);
          $pdf->Cell(65, $h, $lbl[$k], 1, 0, 'R');
        }
        if ($k == 'activo') {
          $pdf->SetXY($x + $w * $j, $y - $h);
          $pdf->Cell($w, $h, $d['T'], 1, 0, 'C');
        }
        $pdf->SetXY($x + $w * $j, $y + $h * $i);
        $pdf->Cell($w, $h, empty($aDocente[$k]) ? '' : $aDocente[$k][$c], 1, 0, 'C');
        $j++;
      }
      $i++;
    }
  }

  public function ImprimirAlumnos($aAlumnos, $pdf) {
    $coord = array(
        'total' => array('T' => 'TOTAL'),
        'varon' => array('T' => 'Varones'),
        'mujer' => array('T' => 'Mujeres'),
    );
    $lbl = array(
        'alumnos' => 'TOTAL DE ALUMNOS\n(Se debe contar a cada alumno una sola vez)',
        'obligatoria' => 'Alumnos en ACTIVIDADES OBLIGATORIAS\n(Se debe contar a cada alumno una sola vez)',
        'voluntaria' => 'Alumnos en ACTIVIDADES OPTATIVAS\n(Se debe contar a cada alumno una sola vez)',
    );

    $w = 15;
    $y = 54;
    $x = 115;
    $h = 8;
    $pdf->SetXY($x, $y);
    $pdf->Cell(45, $h, 'ALUMNOS', 1, 0, 'C');
    $y+=$h * 2;
    $i = 0;
    foreach ($aAlumnos as $k => $v) {
      $j = 0;
      foreach ($coord as $c => $d) {
        if ($c == 'total') {
          $pdf->SetXY($x - 65, $y + $h * $i);
          $pdf->Cell(65, $h, $lbl[$k], 1, 0, 'R');
        }
        if ($k == 'alumnos') {
          $pdf->SetXY($x + $w * $j, $y - $h);
          $pdf->Cell($w, $h, $d['T'], 1, 0, 'C');
        }
        $pdf->SetXY($x + $w * $j, $y + $h * $i);
        $pdf->Cell($w, $h, empty($aAlumnos[$k]) ? '' : $aAlumnos[$k][$c], 1, 0, 'C');
        $j++;
      }
      $i++;
    }
  }

  public function ImprimirActividades($aActividades, $pdf) {
    $x = 10;
    $y = 102;
    $h = 6;
    $k = 0;

    $coordenadas = array(
        'ord' => array('w' => 5, 'h' => $h * 4, 'T' => 'Ord'),
        'alumnos' => array('w' => 90, 'h' => $h * 4, 'T' => 'ALUMNOS POR ACTIVIDADES POR TURNO Y SEXO, SEGÚN\n' .
            'OFERTAS, TALLERES, GRUPOS\n\n' .
            'Se debe contar a cada alumno en cada uno de las\n' .
            'Actividades/Ofertas/Talleres/Grupos al que asiste.'),
        'tipo' => array('w' => 25, 'h' => $h * 2, 'T' => '1=Obligatorio\n' .
            '2=Optat./Vol.'),
        'turno' => array('w' => 30, 'h' => $h * 4, 'T' => 'Turno'),
        'total' => array('w' => 15, 'h' => $h * 2, 'T' => 'Total'),
        'varon' => array('w' => 15, 'h' => $h * 2, 'T' => 'Varones'),
        'mujer' => array('w' => 15, 'h' => $h * 2, 'T' => 'Mujeres'),
    );
    $colapsadas = array(
        'tipo' => array('w' => $coordenadas['tipo']['w'], 'h' => $h * 2, 'T' => 'Carácter de\n' .
            'la Actividad',
            'cols' => array('tipo')),
        'total' => array('w' => $coordenadas['total']['w'] * 3, 'h' => $h * 2, 'T' => 'ALUMNOS',
            'cols' => array('total', 'varon', 'mujer')),
    );
    $this->SetFont($this->fuente, 'B', 8 / 1.25);
    $x1 = $x;

    $cols = array();

    foreach ($coordenadas as $k => $v) {
      //Impresión de Celdas Titulo Colapsadas según el caso
      if (isset($colapsadas[$k])) { //tiene título definido
        $y1 = $y;
        $cols = $colapsadas[$k]['cols'];
        $pdf->SetXY($x1, $y1);
        $pdf->Cell($colapsadas[$k]['w'], $colapsadas[$k]['h'], $colapsadas[$k]['T'], 1, 0, 'C');
      }
      if (in_array($k, $cols))
        $y1 = $y + $h * 2;
      else {
        $cols = array();
        $y1 = $y;
      }

      $pdf->SetXY($x1, $y1);
      $pdf->Cell($v['w'], $v['h'], $v['T'], 1, 0, 'C');
      $x1 += $v['w'];
    }

    $x = 10;
    $y = 120;
    $h = 6;
    $k = 0;

    $y+=1; //Corrijo posición, cambio altura grilla

    $h = 5;

    //Impresión Filas
    foreach ($aActividades as $k => $v) {
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

    return;
  }

  public function ImprimirMatricula($aMatricula, $pdf) {
    $coord = array(
        'total' => array('T' => 'TOTAL'),
        'manana' => array('T' => 'Mañana'),
        'tarde' => array('T' => 'Tarde'),
        'vespertino' => array('T' => 'Vespertino'),
        'noche' => array('T' => 'Noche'),
        'doble' => array('T' => 'Doble'),
    );
    $lbl = array(
        'if' => 'TOTAL de Alumnos matriculados en Itinerarios\n' .
        'Formativos exclusivamente:',
        'ttp' => 'TOTAL de Alumnos matriculados en Trayectos Técnicos\n' .
        'Profesionales exclusivamente:',
        'ambos' => 'Total de Alumnos en I.F. Y T.T.P.:',
    );

    $w = 15;
    $y = 48;
    $x = 95;
    $h = 8;
    $pdf->SetXY($x - 80, $y + $h);
    $pdf->Cell(80, $h, 'ALUMNOS MATRICULADOS\n' .
            'Se debe contar a los alumnos UNA SOLA VEZ:', 0, 0, 'C');
    $pdf->SetXY($x + $w + 15, $y);
    $pdf->Cell(75, $h, 'ALUMNOS POR TURNO\n' .
            '(si un alumno concurre a más de un turno, contarlo en cada uno de ellos)', 0, 0, 'C');
    $y+=$h * 2;
    $i = 0;
    foreach ($aMatricula as $k => $v) {
      $j = 0;
      foreach ($coord as $c => $d) {
        if ($c == 'total') {
          $pdf->SetXY($x - 80, $y + $h * $i);
          $pdf->Cell(80, $h, $lbl[$k], 1, 0, 'R');
        }
        if ($k == 'if') {
          $pdf->SetXY($x + $w * $j + ($c !== 'total' ? 15 : 0), $y - $h);
          $pdf->Cell($w, $h, $d['T'], 1, 0, 'C');
        }
        $pdf->SetXY($x + $w * $j + ($c !== 'total' ? 15 : 0), $y + $h * $i);
        $pdf->Cell($w, $h, empty($aMatricula[$k]) ? '' : $aMatricula[$k][$c], 1, 0, 'C');
        $j++;
      }
      $i++;
    }
  }

  public function ImprimirGrillaIFTTP($sTipo, $aGrilla, $pdf) {
    $x = 15;
    $y = $sTipo === 'IF' ? 91 : 180;
    $h = 5;
    $k = 0;

    if ($sTipo === 'IF') {
      $descripcion = 'ITINERARIO FORMATIVO';
      $titulo = 'EXCLUSIVAMENTE DE LOS I.F. POR SEXO, SEGUN ITINERARIO.\n' .
              'Los alumnos que cursen módulos de IF que integran un TTP no deben declararse en este cuadro.';
    } else {
      $descripcion = 'TRAYECTO TÉCNICO PROFESIONAL';
      $titulo = 'ALUMNOS EXCLUSIVAMENTE DE LOS T.T.P. POR SEXO, SEGUN TRAYECTO\n' .
              'En el caso de que los alumnos opten por cursar más de un Trayecto Profesional, regístrelos en cada uno de ellos.\n' .
              'Incluir en este cuadro a los alumnos que cursan módulos de IF que integran un TTP';
    }

    $coordenadas = array(
        'ord' => array('w' => 5, 'h' => $h * 2, 'T' => 'Ord'),
        'descripcion' => array('w' => 100, 'h' => $h * 2, 'T' => $descripcion),
        'turno' => array('w' => 35, 'h' => $h * 2, 'T' => 'Turno'),
        'total' => array('w' => 15, 'h' => $h, 'T' => 'Total'),
        'varon' => array('w' => 15, 'h' => $h, 'T' => 'Varones'),
        'mujer' => array('w' => 15, 'h' => $h, 'T' => 'Mujeres'),
    );
    $colapsadas = array(
        'total' => array('w' => $coordenadas['total']['w'] * 3, 'h' => $h, 'T' => 'ALUMNOS MATRICULADOS',
            'cols' => array('total', 'varon', 'mujer')),
    );
    $this->SetFont($this->fuente, 'B', 8 / 1.25);
    $x1 = $x;

    $pdf->SetXY($x, $y);
    $pdf->Cell(0, $h, $titulo, 0, 0, 'C');
    $y+=$sTipo === 'IF' ? $h : $h + 2;
    $cols = array();

    foreach ($coordenadas as $k => $v) {
      //Impresión de Celdas Titulo Colapsadas según el caso
      if (isset($colapsadas[$k])) { //tiene título definido
        $y1 = $y;
        $cols = $colapsadas[$k]['cols'];
        $pdf->SetXY($x1, $y1);
        $pdf->Cell($colapsadas[$k]['w'], $colapsadas[$k]['h'], $colapsadas[$k]['T'], 1, 0, 'C');
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

    $y1 = $y + $h;
    $k = 0;
    $hg = 4.6;

    //corrijo delta
    $y1+= $h-$hg;

    //Impresión Filas
    foreach ($aGrilla as $k => $v) {
      $y1 += $hg;
      $x1 = $x;
      $pdf->SetXY($x1, $y1);
      $pdf->Cell($coordenadas['ord']['w'], $hg, $k + 1, 1, 0, 'C');
      $x1 += $coordenadas['ord']['w'];
      foreach ($v as $l => $w) {
        if ($l !== 'ord') {
          $pdf->SetXY($x1, $y1);
          $pdf->Cell($coordenadas[$l]['w'], $hg, $v[$l], 1, 0, 'C');
          $x1 += $coordenadas[$l]['w'];
        }
      }
    }

    return;
  }

}

?>
