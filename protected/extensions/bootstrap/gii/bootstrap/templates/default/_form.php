<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<div class="form">
<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>false,
	'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'
		)	
)); ?>\n"; ?>

	<fieldset>
		<legend>
			<p class="note"><?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?></p>
		</legend>

		<?php echo "<?php
    \$this->widget( 'ext.EChosen.EChosen',
        array('target'=>'select')
    );
?>"; ?>
	<?php echo "<?php echo \$form->errorSummary(\$model,'Opps!!!', null,array('class'=>'alert alert-error span10')); ?>\n"; ?>
		
 <div class="control-group">		
			<div class="span4">
			
<?php foreach ($this->tableSchema->columns as $column): 
 if (!$column->autoIncrement): 

		echo "<?php echo " . $this->generateActiveField($this->modelClass, $column) . "; ?>\n"; 
	
 endif; 
 endforeach; ?>
                       </div>   
  </div>
 
 	<div class="form-actions">
		<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			 'icon'=>'ok white', 
			'label'=>\$model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'),
		)); ?>\n"; ?>
		<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset',
             'icon'=>'remove',  
			'label'=> Yii::t('app', 'Reset'),
		)); ?>\n"; ?>
		<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'link',
			'url'=>Yii::app()->controller->createUrl('admin'),
            'icon'=>'remove-sign',  
			'label'=> Yii::t('app', 'Cancel'),
		)); ?>\n"; ?>
	</div>
</fieldset>
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
</div>

<?php echo "<?php "; ?>
$cs = Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
$cs->registerCoreScript('jquery.ui');
$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/bootstrap/jquery-ui.css');
?>	
   <script>
	$(".btnreset").click(function(){
		$(":input","<?php echo $this->class2id($this->modelClass); ?>-form").each(function() {
		var type = this.type;
		var tag = this.tagName.toLowerCase(); // normalize case
		if (type == "text" || type == "password" || tag == "textarea") this.value = "";
		else if (type == "checkbox" || type == "radio") this.checked = false;
		else if (tag == "select") this.selectedIndex = "";
	  });
	});
   </script>

