<div class="form">


<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'administrador-create-form',
	'enableClientValidation'=>true,
    'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">
		Los campos con <span class="required">*</span> son obligatorios.
	</p>
	
	

    <?php echo $form->errorSummary($admin); ?>
	<?php echo $form->errorSummary($model); ?>
	<?php $this->renderPartial('/user/_form',array('model'=>$model,'form'=>$form))?>
    <div class="row">
        <?php echo $form->labelEx($admin,'cargo'); ?>
        <?php echo $form->textField($admin,'cargo'); ?>
        <?php echo $form->error($admin,'cargo'); ?>
    </div>

    <div class="row">
        <?php echo $form->hiddenField($admin,'user_id'); ?>
        <?php echo $form->error($admin,'user_id'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
    </div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->
