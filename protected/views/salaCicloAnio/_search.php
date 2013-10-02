<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'search-sala-ciclo-anio-form',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
));  ?>


			
		<?php echo $form->textFieldRow($model,'id_sala_ciclo_anio',array('class'=>'span5')); ?>


			
		<?php echo $form->textAreaRow($model,'descripcion',array('rows'=>3, 'cols'=>50, 'class'=>'span5')); ?>


			
		<?php echo $form->textFieldRow($model,'codigo',array('class'=>'span5','maxlength'=>2)); ?>


			
		<?php echo  $form->dropDownListRow($model, 'id_nivel', GxHtml::listDataEx(NivelServicio::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>



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
		$(":input","#search-sala-ciclo-anio-form").each(function() {
		var type = this.type;
		var tag = this.tagName.toLowerCase(); // normalize case
		if (type == "text" || type == "password" || tag == "textarea") this.value = "";
		else if (type == "checkbox" || type == "radio") this.checked = false;
		else if (tag == "select") this.selectedIndex = "";
	  });
	});
   </script>
