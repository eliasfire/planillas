<div class="wide form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">

	<?php echo $form->label($model,'idprofesor'); ?>

	<?php echo $form->textField($model,'idprofesor'); ?>
	</div>

	<div class="row">

	<?php echo $form->label($model,'titulo'); ?>

	<?php echo $form->textField($model,'titulo'); ?>
	</div>

	<div class="row">

	<?php echo $form->label($model,'user_id'); ?>

	<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">

	<?php echo $form->label($model,'user_nombres'); ?>

	<?php echo $form->textField($model,'user_nombres',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">

	<?php echo $form->label($model,'user_apellido_paterno'); ?>

	<?php echo $form->textField($model,'user_apellido_paterno',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">

	<?php echo $form->label($model,'user_apellido_materno'); ?>

	<?php echo $form->textField($model,'user_apellido_materno',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">

	<?php echo $form->label($model,'user_run'); ?>

	<?php echo $form->textField($model,'user_run',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">

	<?php echo $form->label($model,'user_username'); ?>

	<?php echo $form->textField($model,'user_username',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">

	<?php echo $form->label($model,'user_email'); ?>

	<?php echo $form->textField($model,'user_email',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">

	<?php echo CHtml::submitButton('Buscar'); ?>
	</div>
	
	

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->
