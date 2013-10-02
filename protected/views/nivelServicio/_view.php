<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_nivel')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_nivel),array('view','id'=>$data->id_nivel)); ?>
	<br />


	<?php echo GxHtml::encode($data->getAttributeLabel('descripcion')); ?>:
	<?php echo GxHtml::encode($data->descripcion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('codigo')); ?>:
	<?php echo GxHtml::encode($data->codigo); ?>
	<br />



</div>