<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'search-user-form',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
));  ?>


			
		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>


			
		<?php echo $form->textFieldRow($model,'nombres',array('class'=>'span5','maxlength'=>45)); ?>


			
		<?php echo $form->textFieldRow($model,'apellido_paterno',array('class'=>'span5','maxlength'=>45)); ?>


			
		<?php echo $form->textFieldRow($model,'apellido_materno',array('class'=>'span5','maxlength'=>45)); ?>


			
		<?php echo $form->textFieldRow($model,'run',array('class'=>'span5','maxlength'=>45)); ?>


			
		<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>45)); ?>


			
		<?php echo $form->textFieldRow($model,'activo',array('class'=>'span5','maxlength'=>3)); ?>


			
		<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>45)); ?>


			
		<?php /*echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
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


			
		<?php echo $form->textFieldRow($model,'direccion',array('class'=>'span5','maxlength'=>45)); ?>


			
		<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5')); ?>


			
		<?php echo $form->textFieldRow($model,'salud',array('class'=>'span5','maxlength'=>45)); ?>


			
		<?php echo $form->textFieldRow($model,'prevision',array('class'=>'span5','maxlength'=>45)); ?>


			
		<?php echo $form->textFieldRow($model,'foto_src',array('class'=>'span5','maxlength'=>45)); ?>



<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', 
			array(
			'buttonType'=>'submit', 
			'type'=>'primary', 
			'icon'=>'search white', 
			'label'=>Yii::t('app', 'Search'))); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', 
	        array(
	        'buttonType'=>'button', 
	        'icon'=>'icon-remove-sign white', 
	        'label'=>Yii::t('app', 'Reset'), 
	        'htmlOptions'=>array('class'=>'btnreset btn-small'))); ?>
	</div>
<?php $this->endWidget(); ?>



<?php $cs = Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
$cs->registerCoreScript('jquery.ui');
$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/bootstrap/jquery-ui.css');
?>	
   <script>
	$(".btnreset").click(function(){
		$(":input","#search-user-form").each(function() {
		var type = this.type;
		var tag = this.tagName.toLowerCase(); // normalize case
		if (type == "text" || type == "password" || tag == "textarea") this.value = "";
		else if (type == "checkbox" || type == "radio") this.checked = false;
		else if (tag == "select") this.selectedIndex = "";
	  });
	});
   </script>
