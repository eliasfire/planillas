<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_actividad_taller')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_actividad_taller),array('view','id'=>$data->id_actividad_taller)); ?>
	<br />


	<?php echo GxHtml::encode($data->getAttributeLabel('descripcion')); ?>:
	<?php echo GxHtml::encode($data->descripcion); ?>
	<br />



</div>