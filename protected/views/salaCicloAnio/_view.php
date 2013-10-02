<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sala_ciclo_anio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_sala_ciclo_anio),array('view','id'=>$data->id_sala_ciclo_anio)); ?>
	<br />


	<?php echo GxHtml::encode($data->getAttributeLabel('descripcion')); ?>:
	<?php echo GxHtml::encode($data->descripcion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('codigo')); ?>:
	<?php echo GxHtml::encode($data->codigo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_nivel')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idNivel)); ?>
	<br />



</div>