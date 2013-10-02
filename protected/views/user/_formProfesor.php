<div class="form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profesor-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">
		Los campos con <span class="required">*</span> son obligatorios.
	</p>
	
	

	<?php echo $form->errorSummary($model); ?>

	<?php $this->renderPartial('/user/_form',array('model'=>$model,'form'=>$form))?>
	
	<div class="row">
        <?php echo $form->labelEx($profe,'titulo'); ?>
        <?php echo $form->textField($profe,'titulo'); ?>
        <?php echo $form->error($profe,'titulo'); ?>
    </div>
	
	<div class="row">
        <?php echo $form->hiddenField($profe,'user_id'); ?>
        <?php echo $form->error($profe,'user_id'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->
