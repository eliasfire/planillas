<?php
$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
array('label'=>'Crear Usuario', 'url'=>array('create')),
array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<h1>Tipo de Usuario Administrador</h1>
<div class="form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'administrador-resultado-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">
		Los campos con <span class="required">*</span> son obligatorios.
	</p>
	
	
	
	
<?php echo $form->errorSummary($model); ?>
<div class="row">
		<?php echo $form->labelEx($model,'cargo'); ?>
		<?php echo $form->textField($model,'cargo'); ?>
		<?php echo $form->error($model,'cargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
<div class="row">
<?php echo Chtml::activeLabelEx($user,'username'); ?>		
<?php echo Chtml::activeTextField($user, 'username',array('disabled'=>'disabled')); ?>
</div>
<div class="row">
<?php echo Chtml::activeLabelEx($user,'nombres'); ?>		
<?php echo Chtml::activeTextField($user, 'nombres',array('disabled'=>'disabled')); ?>
</div>
<div class="row">
<?php echo Chtml::activeLabelEx($user,'apellido_paterno'); ?>		
<?php echo Chtml::activeTextField($user, 'apellido_paterno',array('disabled'=>'disabled')); ?>
</div>
<div class="row">
<?php echo Chtml::activeLabelEx($user,'apellido_materno'); ?>		
<?php echo Chtml::activeTextField($user, 'apellido_materno',array('disabled'=>'disabled')); ?>
</div>
<div class="row">
<?php echo Chtml::activeLabelEx($user,'run'); ?>		
<?php echo Chtml::activeTextField($user, 'run',array('disabled'=>'disabled')); ?>
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->
