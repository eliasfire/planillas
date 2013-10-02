<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'search-usu-est-pla-form',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
));  ?>


			
		<?php echo $form->textFieldRow($model,'id_usu_est_pla',array('class'=>'span5')); ?>


			
		<?php echo  $form->dropDownListRow($model, 'id_usuario', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>


			
		<?php echo  $form->dropDownListRow($model, 'id_establecimiento', GxHtml::listDataEx(Establecimiento::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>


			
		<?php echo  $form->dropDownListRow($model, 'id_tipo_planilla', GxHtml::listDataEx(TipoPlanilla::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>


			
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
		$(":input","#search-usu-est-pla-form").each(function() {
		var type = this.type;
		var tag = this.tagName.toLowerCase(); // normalize case
		if (type == "text" || type == "password" || tag == "textarea") this.value = "";
		else if (type == "checkbox" || type == "radio") this.checked = false;
		else if (tag == "select") this.selectedIndex = "";
	  });
	});
   </script>
