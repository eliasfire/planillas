<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_orientacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_orientacion),array('view','id'=>$data->id_orientacion)); ?>
	<br />


	<?php echo GxHtml::encode($data->getAttributeLabel('descripcion')); ?>:
	<?php echo GxHtml::encode($data->descripcion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('codigo')); ?>:
	<?php echo GxHtml::encode($data->codigo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_tipo_orientacion')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idTipoOrientacion)); ?>
	<br />



</div>