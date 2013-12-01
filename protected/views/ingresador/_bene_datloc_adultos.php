 <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Cantidad de Beneficiarios de Servicios de Alimentacion',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
  </p>

  <?php $this->widget(
    'bootstrap.widgets.TbLabel',
    array(
        'type' => 'info',
        // 'success', 'warning', 'important', 'info' or 'inverse'
        'label' => 'Importante! Todos los campos con deben contener un valor. Completar con cero "0" si no hay valor en la planilla.',
    )
);?>
  
  <style type="text/css">
table.tableizer-table {
	border: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
} 
.tableizer-table td {
	padding: 4px;
	margin: 3px;
	border: 1px solid #ccc;
	color: #FFF !important;
	font-weight: bold;
}
.tableizer-table th {
	background-color: #104E8B; 
	color: #FFF ;
	font-weight: bold;
}
  .aa {
	color: #000 ;
	font-weight: bold;
}
  .tableizer-table tr .ee .qq {
	font-weight: bold;
}
  </style>
</p>
<p>&nbsp; </p>
<table align="center" class="tableizer-table">
	  <tr class="tableizer-firstrow">
			<td width="254" bgcolor="#104E8B"><span class="">CANTIDAD DE BENEFICIARIOS DE SERVICIOS DE ALIMENTACION</span></td>
			<td width="48" bgcolor="#104E8B" class="">TOTAL</td>
	  </tr>
		<tr>
			<td bgcolor="#FFFFFF"><span class="aa">ALMUERZO</span></td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_alm_ben',array('class'=>'span1','value'=>$model->tot_alm_ben <> 0 ?  $model->tot_alm_ben : 0 ));?></td>
	  </tr>
		<tr>
			<td bgcolor="#FFFFFF"><span class="aa">COPA</span> <span class="aa">DE</span> <span class="aa">LECHE</span></td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_cop_man',array('class'=>'span1','value'=>$model->tot_cop_man <> 0 ?  $model->tot_cop_man : 0 ));?></td>
	  </tr>
		<tr>
			<td bgcolor="#FFFFFF"><span class="aa">REFRIGERIO</span> <span class="aa">/</span> <span class="aa">MERIENDA</span> REFORZADA: </td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_ref_man',array('class'=>'span1','value'=>$model->tot_ref_man <> 0 ?  $model->tot_ref_man : 0 ));?></td>
	  </tr>
		<tr>
		  <td bgcolor="#FFFFFF"><span class="aa">Otros</span> <span class="aa">Servicios</span> <span class="aa">Alimentarios</span></td>
		  <td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_ref_tar',array('class'=>'span1','value'=>$model->tot_ref_tar <> 0 ?  $model->tot_ref_tar : 0 ));?></td>
	  </tr>
	</table>


	<p>
  <?php $this->endWidget(); ?>	
  
	
	<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Datos de la localizacion',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
 

<style type="text/css">
table.tableizer-table {
	border: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
} 
.tableizer-table td {
	padding: 4px;
	margin: 3px;
	border: 1px solid #ccc;
}
.tableizer-table th {
	background-color: #104E8B; 
	color: #FFF;
	font-weight: bold;
}
</style>

	<p>    
	<table border="0" align="center" class="tableizer-table">
		<tr>
			<td width="167" bgcolor="#0066CC" class="ee"><span class="qq">Domicilio</span> <span class="qq">Actualizado:</span></td>
			<td width="361" bgcolor="#99FFCC"><?php echo $form->textField($model,'dom_act',array('class'=>'span4'));?></td>
	  </tr>
		<tr>
		  <td bgcolor="#0066CC"><span class="ee">Teléfono/s:</span></td>
		  <td bgcolor="#99FFCC"><?php echo $form->textField($model,'telefono',array('class'=>'span2'));?></td>
	  </tr>
		<tr>
			<td bgcolor="#0066CC" class="asd"><span class="asd">Confecciono esta planilla:</span></td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'ingresador',array('class'=>'span2'));?></td>
	  </tr>
	</table>

	<p>
	  <?php $this->endWidget();?>
	  
