<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_planilla')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_planilla),array('view','id'=>$data->id_planilla)); ?>
	<br />


	<?php echo GxHtml::encode($data->getAttributeLabel('mes')); ?>:
	<?php echo GxHtml::encode($data->mes); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('anio')); ?>:
	<?php echo GxHtml::encode($data->anio); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_localizacion')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idLocalizacion)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_tipo_planilla')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idTipoPlanilla)); ?>
	<br />



</div>