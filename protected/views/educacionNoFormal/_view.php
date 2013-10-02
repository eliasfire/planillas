<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_educacion_no_formal')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_educacion_no_formal),array('view','id'=>$data->id_educacion_no_formal)); ?>
	<br />


	<?php echo GxHtml::encode($data->getAttributeLabel('id_establecimiento')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idEstablecimiento)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_alu_act')); ?>:
	<?php echo GxHtml::encode($data->tot_alu_act); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_alu_act_obl')); ?>:
	<?php echo GxHtml::encode($data->tot_alu_act_obl); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_alu_act_opt')); ?>:
	<?php echo GxHtml::encode($data->tot_alu_act_opt); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nombre_taller_oferta_grupos')); ?>:
	<?php echo GxHtml::encode($data->nombre_taller_oferta_grupos); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_caracter_actividad')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idCaracterActividad)); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('id_turno')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idTurno)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_alu')); ?>:
	<?php echo GxHtml::encode($data->tot_alu); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_var')); ?>:
	<?php echo GxHtml::encode($data->tot_var); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_muj')); ?>:
	<?php echo GxHtml::encode($data->tot_muj); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('mes')); ?>:
	<?php echo GxHtml::encode($data->mes); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('anio')); ?>:
	<?php echo GxHtml::encode($data->anio); ?>
	<br />
	*/ ?>



</div>