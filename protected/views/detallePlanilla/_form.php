<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'detalle-planilla-form',
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
			
<?php echo  $form->dropDownListRow($model, 'id_sala_ciclo_anio', GxHtml::listDataEx(SalaCicloAnio::model()->findAllAttributes(null, true))); ?>
<?php echo  $form->dropDownListRow($model, 'id_nivel', GxHtml::listDataEx(NivelServicio::model()->findAllAttributes(null, true))); ?>
<?php echo  $form->dropDownListRow($model, 'id_seccion', GxHtml::listDataEx(Seccion::model()->findAllAttributes(null, true))); ?>
<?php echo  $form->dropDownListRow($model, 'id_orientacion', GxHtml::listDataEx(Orientacion::model()->findAllAttributes(null, true))); ?>
<?php echo  $form->dropDownListRow($model, 'id_caracter_actividad', GxHtml::listDataEx(CaracterActividad::model()->findAllAttributes(null, true))); ?>
<?php echo $form->textFieldRow($model,'alu_mat_tot',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'alu_mat_var',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'alu_mat_muj',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'alu_rep_tot',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'alu_rep_var',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'alu_rep_muj',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'nec_esp_edu',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'alu_ser_tot',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'alu_ser_var',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'alu_ser_muj',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'alu_obl_tot',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'alu_obl_var',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'alu_obl_muj',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'alu_opt_tot',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'alu_opt_var',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'alu_opt_muj',array('class'=>'span5')); ?>
<?php echo  $form->dropDownListRow($model, 'id_turno', GxHtml::listDataEx(Turno::model()->findAllAttributes(null, true))); ?>
<?php echo  $form->dropDownListRow($model, 'id_planilla', GxHtml::listDataEx(Planilla::model()->findAllAttributes(null, true))); ?>
<?php echo $form->textFieldRow($model,'nombre_taller',array('class'=>'span5','maxlength'=>50)); ?>
<?php echo $form->textFieldRow($model,'id_actividad_taller',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'nombre_seccion',array('class'=>'span5','maxlength'=>30)); ?>
<?php echo $form->textFieldRow($model,'asistencia_medica',array('class'=>'span5')); ?>
<?php echo  $form->dropDownListRow($model, 'id_localizacion', GxHtml::listDataEx(Localizacion::model()->findAllAttributes(null, true))); ?>
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
		$(":input","detalle-planilla-form").each(function() {
		var type = this.type;
		var tag = this.tagName.toLowerCase(); // normalize case
		if (type == "text" || type == "password" || tag == "textarea") this.value = "";
		else if (type == "checkbox" || type == "radio") this.checked = false;
		else if (tag == "select") this.selectedIndex = "";
	  });
	});
   </script>

