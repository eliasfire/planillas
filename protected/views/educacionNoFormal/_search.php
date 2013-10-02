<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

			
		<?php echo $form->textFieldRow($model,'id_educacion_no_formal',array('class'=>'span5')); ?>


			
		<?php echo  $form->dropDownListRow($model, 'id_establecimiento', GxHtml::listDataEx(Establecimiento::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>


			
		<?php echo $form->textFieldRow($model,'tot_alu_act',array('class'=>'span5')); ?>


			
		<?php echo $form->textFieldRow($model,'tot_alu_act_obl',array('class'=>'span5')); ?>


			
		<?php echo $form->textFieldRow($model,'tot_alu_act_opt',array('class'=>'span5')); ?>


			
		<?php echo $form->textFieldRow($model,'nombre_taller_oferta_grupos',array('class'=>'span5')); ?>


			
		<?php echo  $form->dropDownListRow($model, 'id_caracter_actividad', GxHtml::listDataEx(CaracterActividad::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>


			
		<?php echo  $form->dropDownListRow($model, 'id_turno', GxHtml::listDataEx(Turno::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>


			
		<?php echo $form->textFieldRow($model,'tot_alu',array('class'=>'span5')); ?>


			
		<?php echo $form->textFieldRow($model,'tot_var',array('class'=>'span5')); ?>


			
		<?php echo $form->textFieldRow($model,'tot_muj',array('class'=>'span5')); ?>


			
		<?php echo $form->textFieldRow($model,'mes',array('class'=>'span5','maxlength'=>12)); ?>


			
		<?php echo $form->textFieldRow($model,'anio',array('class'=>'span5')); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>Yii::t('app', 'Search'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
