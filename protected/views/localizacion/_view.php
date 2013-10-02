<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_localizacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_localizacion),array('view','id'=>$data->id_localizacion)); ?>
	<br />


	<?php echo GxHtml::encode($data->getAttributeLabel('id_establecimiento')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idEstablecimiento)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('anexo')); ?>:
	<?php echo GxHtml::encode($data->anexo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nombre')); ?>:
	<?php echo GxHtml::encode($data->nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('c_estado')); ?>:
	<?php echo GxHtml::encode($data->c_estado); ?>
	<br />



</div>