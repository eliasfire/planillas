<?php	 
$pdf = Yii::createComponent('application.extensions.MPDF53.mpdf');
//$pdf = Yii::app()->ePdf->mpdf();
//$dataProvider = $_SESSION['usuarios_filtrados']->getData();
$contador=count($dataProvider);
$impar=true;
$html.='

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="'.Yii::app()->theme->baseUrl.'/css/pdf.css" />
	</head>
	<body>
		<img width="130px" height="50px" src="'.Yii::app()->theme->baseUrl.'/images/logo.jpg"/>
			<div class="datos">
			<br><br><br>
			<p align="center" class="titulo">LISTADO </p>
		</div>
			<br><br><br>
			<b>Total Resultados:</b> '.$contador.'

			<table class="tabla" repeat_header="1">
				<tr class="principal">
					<th width="7%">&nbsp;Nivel</th>
					<th width="7%">&nbsp;Año</th>
					<th width="7%">&nbsp;Turno</th>
					<th width="7%">&nbsp;Nombre Seccion</th>
				    <th width="7%">&nbsp;Seccion</th>
					<th width="7%">&nbsp;Total Matriculados</th>
			
				</tr>';
	
 				foreach ($dataProvider as $inicial){
 					if ($impar) {
 					 $html.='
						<tr class="odd">
							<td width="7%">&nbsp;'.$inicial->idNivel->descripcion.'</td>
							<td width="7%">&nbsp;'.$inicial->idSalaCicloAnio->descripcion.'</td>
							<td width="7%">&nbsp;'.$inicial->idTurno->descripcion.'</td>
							<td width="7%">&nbsp;'.$inicial->nombre_seccion.'</td>
						    <td width="7%">&nbsp;'.$inicial->idSeccion->descripcion.'</td>
							<td width="7%">&nbsp;'.$inicial->alu_mat_tot.'</td>
											
						</tr>';
 					 $impar=false;}
 					else {
 					 $html.='
 						<tr class="even">
 							<td width="7%">&nbsp;'.$inicial->idNivel->descripcion.'</td>
							<td width="7%">&nbsp;'.$inicial->idSalaCicloAnio->descripcion.'</td>
							<td width="7%">&nbsp;'.$inicial->idTurno->descripcion.'</td>
							<td width="7%">&nbsp;'.$inicial->nombre_seccion.'</td>
						    <td width="7%">&nbsp;'.$inicial->idSeccion->descripcion.'</td>
							<td width="7%">&nbsp;'.$inicial->alu_mat_tot.'</td>
 							
 						</tr>';
 					 $impar=true;
 					}
				}
			$html.='</table>
	</body>
</html>';

$mpdf=new mPDF('win-1252','LEGAL',0,'',15,15,16,16,9,9,'P');
$mpdf->ignore_invalid_utf8 = true;
$mpdf->SetFooter(' {DATE j/m/Y}|Página {PAGENO}/{nbpg}|Direccion Estadistica - Min. Educacion');
$mpdf->WriteHTML($html);
$mpdf->Output('Listado_Usuarios.pdf','I');
exit; ?>

	