<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_caracter_actividad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_caracter_actividad),array('view','id'=>$data->id_caracter_actividad)); ?>
	<br />


	<?php echo GxHtml::encode($data->getAttributeLabel('descripcion')); ?>:
	<?php echo GxHtml::encode($data->descripcion); ?>
	<br />



</div>