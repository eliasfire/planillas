<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Inciar Sesión',
);
?>



<div id="carbonForm">
<h1>Iniciar Sesión</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
),
)); ?>

<div class="fieldContainer">

        <div class="formRow">
            <div class="label">
                <?php echo $form->labelEx($model,'Usuario'); ?>
            </div>
            
            <div class="field">
                <?php echo $form->textField($model,'username'); ?>
            </div>
			<?php echo $form->error($model,'username'); ?>
        </div>
        
        <div class="formRow">
            <div class="label">
                <?php echo $form->labelEx($model,'Contrase&ntilde;a'); ?>
            </div>
            
            <div class="field">
                <?php echo $form->passwordField($model,'password'); ?>
            </div>
			<?php echo $form->error($model,'password'); ?>
        </div>
        
        <div class="formRow">
            <div class="label">
                <?php echo $form->checkBox($model,'rememberMe'); ?>
            </div>
            
            <div class="field">
                <?php echo $form->label($model,'rememberMe'); ?>
            </div>
			<?php echo $form->error($model,'rememberMe'); ?>
        </div>
                
    </div> <!-- Closing fieldContainer -->
    
    <div class="signupButton">
    
   		 <?php //echo CHtml::submitButton('Iniciar Sesión');
    
   			 $this->widget('zii.widgets.jui.CJuiButton', array(
       				'buttonType'=>'submit',
        			'name'=>'btnSubmit',
        			'value'=>'1',
       				 'caption'=>'Iniciar Sesión',
   		 	));
   		 ?>
    </div>
    
    <?php $this->endWidget(); ?>
</div>
<!-- form -->

