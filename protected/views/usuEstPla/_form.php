<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'usu-est-pla-form',
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
			
<?php echo  $form->dropDownListRow($model, 'id_usuario', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
<?php echo  $form->dropDownListRow($model, 'id_establecimiento', GxHtml::listDataEx(Establecimiento::model()->findAllAttributes(null, true)),array('class'=>'span5')); ?>
<?php echo  $form->dropDownListRow($model, 'id_localizacion', GxHtml::listDataEx(Localizacion::model()->findAllAttributes(null, true)),array('class'=>'span5')); ?>
<?php echo  $form->dropDownListRow($model, 'id_tipo_planilla', GxHtml::listDataEx(TipoPlanilla::model()->findAllAttributes(null, true))); ?>
                       </div>   
  </div>
 
 	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			 'icon'=>'ok white', 
			'label'=>$model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'),
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
		$(":input","usu-est-pla-form").each(function() {
		var type = this.type;
		var tag = this.tagName.toLowerCase(); // normalize case
		if (type == "text" || type == "password" || tag == "textarea") this.value = "";
		else if (type == "checkbox" || type == "radio") this.checked = false;
		else if (tag == "select") this.selectedIndex = "";
	  });
	});
   </script>
