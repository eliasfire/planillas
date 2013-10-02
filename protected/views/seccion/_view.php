<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_seccion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_seccion),array('view','id'=>$data->id_seccion)); ?>
	<br />


	<?php echo GxHtml::encode($data->getAttributeLabel('descripcion')); ?>:
	<?php echo GxHtml::encode($data->descripcion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('codigo')); ?>:
	<?php echo GxHtml::encode($data->codigo); ?>
	<br />



</div>