<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usu_est_pla')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_usu_est_pla),array('view','id'=>$data->id_usu_est_pla)); ?>
	<br />


	<?php echo GxHtml::encode($data->getAttributeLabel('id_usuario')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idUsuario)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_establecimiento')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idEstablecimiento)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_tipo_planilla')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idTipoPlanilla)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_localizacion')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idLocalizacion)); ?>
	<br />



</div>