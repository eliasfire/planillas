<? 	
$pdf = Yii::createComponent('application.extensions.MPDF53.mpdf');
$contador=count($dataProvider);
$html.='

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/pdf.css" />
	</head>
	<body>
		<img width="60px" height="120px" src="'.Yii::app()->request->baseUrl.'/images/logo.jpg"/>
		<div class="datos">
			<br><br><br>
			<p align="center" class="titulo">LISTADO ADMINISTRADORES</p>
		</div>
			<br><br><br>
			<b>Total Resultados:</b> '.$contador.'

			<table class="tabla">
				<tr class="principal">
					<th width="7%">&nbsp;Nombres</th>
					<th width="7%">&nbsp;Apellido Paterno</th>
					<th width="7%">&nbsp;Apellido Materno</th>
					<th width="7%">&nbsp;RUN</th>
					<th width="7%">&nbsp;Teléfono</th>
					<th width="19%">&nbsp;Cargo</th>
					<th width="19%">&nbsp;Email</th>
			
				</tr>';
	
				foreach ($dataProvider as $administrador){
					$html.='
						<tr class="odd">
							<td width="7%">&nbsp;'.$administrador->user->nombres.'</td>
							<td width="7%">&nbsp;'.$administrador->user->apellido_paterno.'</td>
							<td width="7%">&nbsp;'.$administrador->user->apellido_materno.'</td>
							<td width="7%">&nbsp;'.$administrador->user->run.'</td>
							<td width="7%">&nbsp;'.$administrador->user->telefono.'</td>
							<td width="19%">&nbsp;'.$administrador->cargo.'</td>
							<td width="19%">&nbsp;'.$administrador->user->email.'</td>
					
						</tr>';
				}
			$html.='</table>
	</body>
</html>';

$mpdf=new mPDF('utf-8', array(190,236),0,'',15,15,16,16,9,9,'P');
$mpdf->SetFooter(' {DATE j/m/Y}|Página {PAGENO}/{nbpg}|Sistema Ciudad Educativa');
$mpdf->WriteHTML($html);
$mpdf->Output('Listado_Administradores.pdf','I');
exit; ?>