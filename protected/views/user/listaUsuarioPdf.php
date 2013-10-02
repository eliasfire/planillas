<? 	
$pdf = Yii::createComponent('application.extensions.MPDF53.mpdf');
$contador=count($dataProvider);
$html.='
</html>
	<head>
		<link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/pdf.css" />
	</head>

	<body>
		<div class="marco_imgen_esquema">
			
		</div>
		
		<p align="center" class="titulo">Listado Usuarios</p>
		
		<div class="tabla_datos">
			<p class="contador">Total Resultados: '.$contador.'</p>
		
			<table class="tabla" border="1">
		
				<tr class="principal">
					<td class="principal" width="7%">&nbsp;Nombre</td>
					<td class="principal" width="7%">&nbsp;RUN</td>
					<td class="principal" width="7%">&nbsp;Nombre de Usuario</td>
					<td class="principal" width="19%">&nbsp;Email</td>
			
				</tr>';
				foreach ($dataProvider as $persona){
					$html.='
						<tr class="odd">
							<td class="odd" width="7%">&nbsp;'.$persona->getNombreCompleto().'</td>
							<td class="odd" width="7%">&nbsp;'.$persona->run.'</td>
							<td class="odd" width="7%">&nbsp;'.$persona->username.'</td>
							<td class="odd" width="19%">&nbsp;'.$persona->email.'</td>
						</tr>';
				}

			$html.= '</table>
		</div>
	</body>

</html>';

$header=$header.'<img width="110px" height="200px%" src="'.Yii::app()->request->baseUrl.'/images/logo.jpg"/>';
$mpdf=new mPDF('utf-8', array(190,236),0,'',15,15,16,16,9,9,'L');
$mpdf->SetHTMLHeader($header);
$mpdf->SetFooter(' {DATE j/m/Y}|Página {PAGENO}/{nbpg}|Sistema Ciudad Educativa');
$mpdf->WriteHTML($html);
$mpdf->Output('Listado_Usuarios.pdf','I');
exit; ?>