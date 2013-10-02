<script src="js/libs/jquery-1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/relCopy.jquery.js"></script>
<script>
$(function(){
	var removeLink = ' <a class="remove" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false">remove</a>';
	$('a.copy').relCopy({limit: 3, append: removeLink});	
});
</script>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'educacion-no-formal-form',
	'type'=>'inline',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">
	<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
   </p>
   
   <?php echo $form->errorSummary($model); ?>
   
   <?php echo $form->textFieldRow($model,'mes',array('class'=>'span2','maxlength'=>12)); ?>
   <?php echo $form->textFieldRow($model,'anio',array('class'=>'span2')); ?>
   <?php echo $form->dropDownListRow($model, 'id_establecimiento', GxHtml::listDataEx(Establecimiento::model()->findAllAttributes(null, true))); ?>
   
   <?php $this->widget('ext.jqrelcopy.JQRelcopy',
                 array(
                       'id' => 'copylink',
                       //'removeText' => 'remove' //uncomment to add remove link
                       )); ?>
    <a id="copylink" href="#" rel=".copy">Nuevo fila</a>
 
    <div class="row copy">
        
<?php /*echo $form->textFieldRow($model,'id_educacion_no_formal',array('class'=>'span5')); */?>


<?php echo $form->textFieldRow($model,'tot_alu_act',array('class'=>'span1')); ?>
<?php echo $form->textFieldRow($model,'tot_alu_act_obl',array('class'=>'span1')); ?>
<?php echo $form->textFieldRow($model,'tot_alu_act_opt',array('class'=>'span1')); ?>
<?php echo $form->textFieldRow($model,'nombre_taller_oferta_grupos',array('class'=>'span1')); ?>
<?php echo  $form->dropDownListRow($model,'id_caracter_actividad', GxHtml::listDataEx(CaracterActividad::model()->findAllAttributes(null, true))); ?>
<?php echo  $form->dropDownListRow($model, 'id_turno', GxHtml::listDataEx(Turno::model()->findAllAttributes(null, true))); ?>
<?php echo $form->textFieldRow($model,'tot_alu',array('class'=>'span1')); ?>
<?php echo $form->textFieldRow($model,'tot_var',array('class'=>'span1')); ?>
<?php echo $form->textFieldRow($model,'tot_muj',array('class'=>'span1')); ?>

 </div>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
