<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_establecimiento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_establecimiento),array('view','id'=>$data->id_establecimiento)); ?>
	<br />


	<?php echo GxHtml::encode($data->getAttributeLabel('cue')); ?>:
	<?php echo GxHtml::encode($data->cue); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nombre')); ?>:
	<?php echo GxHtml::encode($data->nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('c_sector')); ?>:
	<?php echo GxHtml::encode($data->c_sector); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_responsable')); ?>:
	<?php echo GxHtml::encode($data->id_responsable); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('c_estado')); ?>:
	<?php echo GxHtml::encode($data->c_estado); ?>
	<br />



</div>