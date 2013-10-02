<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_orientacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_orientacion),array('view','id'=>$data->id_tipo_orientacion)); ?>
	<br />


	<?php echo GxHtml::encode($data->getAttributeLabel('descripcion')); ?>:
	<?php echo GxHtml::encode($data->descripcion); ?>
	<br />



</div>