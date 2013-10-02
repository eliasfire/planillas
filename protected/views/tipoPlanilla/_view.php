<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_planilla')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_planilla),array('view','id'=>$data->id_tipo_planilla)); ?>
	<br />


	<?php echo GxHtml::encode($data->getAttributeLabel('descripcion')); ?>:
	<?php echo GxHtml::encode($data->descripcion); ?>
	<br />



</div>