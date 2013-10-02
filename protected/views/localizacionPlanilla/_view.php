<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_localizacion_planilla')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_localizacion_planilla),array('view','id'=>$data->id_localizacion_planilla)); ?>
	<br />


	<?php echo GxHtml::encode($data->getAttributeLabel('id_localizacion')); ?>:
	<?php echo GxHtml::encode($data->id_localizacion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_tipo_planilla')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idTipoPlanilla)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_establecimiento')); ?>:
	<?php echo GxHtml::encode($data->id_establecimiento); ?>
	<br />



</div>