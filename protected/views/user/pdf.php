<?php
$pdf = Yii::createComponent('application.extensions.MPDF53.mpdf');
$activo=($model->activo==1)?'Si':'No';
$html='

</html>
	<head>
		<link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/pdf.css" />
	</head>

	<body>
		<div class="datos">
			<br><br>
			<p align="center" class="titulo">DATOS PERSONALES</p>
		</div>
		<br><br><br><br><br><br><br><br>
			<table align="center" class="tabla" >
			
				<tr class="even">
					<td> <b>Nombres</b> </td>
					<td> '.$model->nombres.'</td>
				</tr>
	
				<tr class="odd">
					<td> <b>Apellido Paterno</b> </td>
					<td> '.$model->apellido_paterno.'</td>
				</tr>
	
				<tr class="even">
					<td> <b>Apellido Materno</b> </td>
					<td> '.$model->apellido_materno.'</td>
				</tr>
	
				<tr class="odd">
					<td> <b>RUN</b> </td>
					<td> '.$model->run.'</td>
				</tr>
		
				<tr class="even">
					<td> <b>Estado</b> </td>
					<td> '.$activo.'</td>
				</tr>
				
				<tr class="odd">
					<td> <b>Dirección</b> </td>
					<td> '.$model->direccion.'</td>
				</tr>
	
				<tr class="even">
					<td> <b>Teléfono</b> </td>
					<td> '.$model->telefono.'</td> 
				</tr>

				<tr class="odd">
					<td> <b>Email</b> </td>
					<td> '.$model->email.'</td>
				</tr>
				
				<tr class="even">
					<td> <b>Salud</b> </td>
					<td> '.$model->salud.'</td> 
				</tr>

				<tr class="odd">
					<td> <b>Previsión</b> </td>
					<td> '.$model->prevision.'</td>
				</tr>
				
				
			</table>

	</body>
</html>';

$header=$header.'<img width="60px" height="120px" src="'.Yii::app()->request->baseUrl.'/images/logo.jpg"/>';
$mpdf=new mPDF('utf-8', array(190,236));
$mpdf->SetHTMLHeader($header);
$mpdf->SetFooter(' {DATE j/m/Y}|Página {PAGENO}/{nbpg}|Colegio Ciudad Educativa');
$mpdf->WriteHTML($html);
$mpdf->Output(''.$model->getNombreCompleto().'.pdf','I');
exit;
?>
