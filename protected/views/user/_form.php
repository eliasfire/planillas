<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'
		)	
)); ?>

	<fieldset>
		<legend>
			<p class="note">Los campos con <span class="required">*</span> son requeridos</p>
		</legend>

		<?php
    $this->widget( 'ext.EChosen.EChosen',
        array('target'=>'select')
    );
?>	<?php echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span10')); ?>
		
 <div class="control-group">		
			<div class="span4">
			
<?php echo $form->textFieldRow($model,'nombres',array('class'=>'span5','maxlength'=>45)); ?>
<?php echo $form->textFieldRow($model,'apellido_paterno',array('class'=>'span5','maxlength'=>45)); ?>
<?php echo $form->textFieldRow($model,'apellido_materno',array('class'=>'span5','maxlength'=>45)); ?>
<?php echo $form->textFieldRow($model,'run',array('class'=>'span5','maxlength'=>45)); ?>
<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>45)); ?>
<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>45)); ?>
<?php echo $form->textFieldRow($model,'activo',array('class'=>'span5','maxlength'=>3)); ?>
<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>45)); ?>
<?php /* echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'creado',
		'value' => $model->creado,
		'options' => array(
		'showButtonPanel' => true,
		'changeYear' => true,
		'dateFormat' => 'yy-mm-dd',
		),
		));
; */?>

<?php echo $form->datepickerRow($model, 'creado'); ?>
<?php echo $form->textFieldRow($model,'direccion',array('class'=>'span5','maxlength'=>45)); ?>
<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'salud',array('class'=>'span5','maxlength'=>45)); ?>
<?php echo $form->textFieldRow($model,'prevision',array('class'=>'span5','maxlength'=>45)); ?>
<?php echo $form->textFieldRow($model,'foto_src',array('class'=>'span5','maxlength'=>45)); ?>
                       </div>   
  </div>
 
 	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			 'icon'=>'ok white', 
			'label'=>$model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Save'),
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset',
             'icon'=>'remove',  
			'label'=> Yii::t('app', 'Reset'),
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'link',
			'url'=>Yii::app()->controller->createUrl('admin'),
            'icon'=>'remove-sign',  
			'label'=> Yii::t('app', 'Cancel'),
		)); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>
</div>

<?php $cs = Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
$cs->registerCoreScript('jquery.ui');
$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/bootstrap/jquery-ui.css');
?>	
   <script>
	$(".btnreset").click(function(){
		$(":input","user-form").each(function() {
		var type = this.type;
		var tag = this.tagName.toLowerCase(); // normalize case
		if (type == "text" || type == "password" || tag == "textarea") this.value = "";
		else if (type == "checkbox" || type == "radio") this.checked = false;
		else if (tag == "select") this.selectedIndex = "";
	  });
	});
   </script>

