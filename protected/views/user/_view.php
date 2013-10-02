<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />


	<?php echo GxHtml::encode($data->getAttributeLabel('nombres')); ?>:
	<?php echo GxHtml::encode($data->nombres); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('apellido_paterno')); ?>:
	<?php echo GxHtml::encode($data->apellido_paterno); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('apellido_materno')); ?>:
	<?php echo GxHtml::encode($data->apellido_materno); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('run')); ?>:
	<?php echo GxHtml::encode($data->run); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('username')); ?>:
	<?php echo GxHtml::encode($data->username); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('password')); ?>:
	<?php echo GxHtml::encode($data->password); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('activo')); ?>:
	<?php echo GxHtml::encode($data->activo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('creado')); ?>:
	<?php echo GxHtml::encode($data->creado); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('direccion')); ?>:
	<?php echo GxHtml::encode($data->direccion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('telefono')); ?>:
	<?php echo GxHtml::encode($data->telefono); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('salud')); ?>:
	<?php echo GxHtml::encode($data->salud); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('prevision')); ?>:
	<?php echo GxHtml::encode($data->prevision); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('foto_src')); ?>:
	<?php echo GxHtml::encode($data->foto_src); ?>
	<br />
	*/ ?>



</div>