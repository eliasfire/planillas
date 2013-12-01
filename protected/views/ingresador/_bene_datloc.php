<style type="text/css">
.tableizer-table tr td .qq {
	color: #FFF;
}
.tableizer-table tr td .ee {
	color: #FFF;
}
.tableizer-table tr .asd .asd {
	color: #FFF;
}
</style>
<p>
    <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Cantidad de Beneficiarios de Servicios de Alimentacion',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
    </p>
    <!--  <div id="yw116">
	<div class="alert in alert-block fade alert-error">
	 <strong>Importante!</strong> 
	 Todos los campos con deben contener un valor. Completar con cero '0' si no hay valor en la planilla.
  	 </div>
	</div> -->
    <?php $this->widget(
    'bootstrap.widgets.TbLabel',
    array(
        'type' => 'info',
        // 'success', 'warning', 'important', 'info' or 'inverse'
        'label' => 'Importante! Todos los campos con deben contener un valor. Completar con cero "0" si no hay valor en la planilla.',
    )
);?>
      
  </p>
  <p>
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
    
  </p>
    <table align="center" class="tableizer-table">
		<tr>
			<td width="254" bgcolor="#0066CC"><span class="qq">CANTIDAD DE BENEFICIARIOS DE SERVICIOS DE ALIMENTACION</span></td>
			<td width="48" bgcolor="#0066CC" class="blanco"><span class="qq">TOTAL</span></td>
		</tr>
		<tr>
			<td>ALMUERZO</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_alm_ben',array('class'=>'span1','value'=>$model->tot_alm_ben <> 0 ?  $model->tot_alm_ben : 0 ));?></td>
		</tr>
		<tr>
			<td>COPA DE LECHE: Turno Mañana</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_cop_man',array('class'=>'span1','value'=>$model->tot_cop_man <> 0 ?  $model->tot_cop_man : 0 ));?></td>
		</tr>
		<tr>
			<td>COPA DE LECHE: Turno Tarde</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_cop_tar',array('class'=>'span1','value'=>$model->tot_cop_tar <> 0 ?  $model->tot_cop_tar : 0 ));?></td>
		</tr>
		<tr>
			<td>Refrigerio / Merienda Reforzada - Turno Mañana</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_ref_man',array('class'=>'span1','value'=>$model->tot_ref_man <> 0 ?  $model->tot_ref_man : 0 ));?></td>
		</tr>
		<tr>
		  <td>Refrigerio / Merienda Reforzada - Turno Tarde</td>
		  <td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_ref_tar',array('class'=>'span1','value'=>$model->tot_ref_tar <> 0 ?  $model->tot_ref_tar : 0 ));?></td>
	  </tr>
		<tr>
		  <td>Otros Servicios Alimentario (especificar)</td>
		  <td bgcolor="#99FFCC"><?php echo $form->textField($model,'otr_ser_ali',array('class'=>'span1','value'=>$model->otr_ser_ali <> 0 ?  $model->otr_ser_ali : 0 ));?></td>
	  </tr>
		<tr>
		  <td bgcolor="#99FFCC"><?php echo $form->textField($model,'ser_ali_esp',array('class'=>'span4','value'=>$model->ser_ali_esp <> "" ?  $model->ser_ali_esp : ""));?></td>
		  <td bgcolor="#99FFCC">&nbsp;</td>
	  </tr>
	</table>


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
	  
