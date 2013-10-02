<?
$pdf2 = Yii::createComponent('application.extensions.MPDF53.mpdf');
$dataProvider = $_SESSION['datos_filtrados']->getData();
$contador=count($dataProvider);
$html.='
	<table align="center">
		<tr>
			<td align="center"><b>LISTADO DE USUARIOS</b></td>
		</tr>
	</table>
	
	Total Resultados: '.$contador.'

	<table class="detail-view2" repeat_header="1" cellpadding="1" cellspacing="1" width="100%" border="0">
		<tr class="principal">
			<td class="principal" width="7%">&nbsp;Nombres</td>
			<td class="principal" width="7%">&nbsp;Apellido Paterno</td>
			<td class="principal" width="19%">&nbsp;Apellido Materno</td>
			
		</tr>';
$i=0;
$val=count($dataProvider);
while($i<$val){
	$html.='
				<tr class="odd">
					<td class="odd" width="7%">&nbsp;'.$dataProvider[$i] ["nombres"].'</td>
					<td class="odd" width="7%">&nbsp;'.$dataProvider[$i] ["apellido_paterno"].'</td>
					<td class="odd" width="19%">&nbsp;'.$dataProvider[$i]["apellido_materno"].'</td>
';
	$html.='</tr>'; $i++;
}
$html.='</table>';

//$html1 = utf8_encode($html);

$mpdf=new mPDF('utf-8', array(190,236));
$mpdf->SetFooter(' {DATE j/m/Y}|Página {PAGENO}/{nbpg}|Sistema de Usuarios');
$mpdf->WriteHTML($html);
$mpdf->Output('Listado_Usuarios.pdf','D');
exit; ?>