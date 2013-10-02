<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'search-detalle-planilla-form',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
));  ?>


			
		<?php echo $form->textFieldRow($model,'id_detalle_planilla',array('class'=>'span5')); ?>


			
		<?php echo  $form->dropDownListRow($model, 'id_sala_ciclo_anio', GxHtml::listDataEx(SalaCicloAnio::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>


			
		<?php echo  $form->dropDownListRow($model, 'id_nivel', GxHtml::listDataEx(NivelServicio::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>


			
		<?php echo  $form->dropDownListRow($model, 'id_seccion', GxHtml::listDataEx(Seccion::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>


			
		<?php echo  $form->dropDownListRow($model, 'id_orientacion', GxHtml::listDataEx(Orientacion::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>


			
		<?php echo  $form->dropDownListRow($model, 'id_caracter_actividad', GxHtml::listDataEx(CaracterActividad::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>


			
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


			
		<?php echo  $form->dropDownListRow($model, 'id_turno', GxHtml::listDataEx(Turno::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>


			
		<?php echo  $form->dropDownListRow($model, 'id_planilla', GxHtml::listDataEx(Planilla::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>


			
		<?php echo $form->textFieldRow($model,'nombre_taller',array('class'=>'span5','maxlength'=>50)); ?>


			
		<?php echo $form->textFieldRow($model,'id_actividad_taller',array('class'=>'span5')); ?>


			
		<?php echo $form->textFieldRow($model,'nombre_seccion',array('class'=>'span5','maxlength'=>30)); ?>


			
		<?php echo $form->textFieldRow($model,'asistencia_medica',array('class'=>'span5')); ?>


			
		<?php echo  $form->dropDownListRow($model, 'id_localizacion', GxHtml::listDataEx(Localizacion::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>



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
		$(":input","#search-detalle-planilla-form").each(function() {
		var type = this.type;
		var tag = this.tagName.toLowerCase(); // normalize case
		if (type == "text" || type == "password" || tag == "textarea") this.value = "";
		else if (type == "checkbox" || type == "radio") this.checked = false;
		else if (tag == "select") this.selectedIndex = "";
	  });
	});
   </script>
