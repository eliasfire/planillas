<?php echo $this->renderPartial('/ingresador/_datosglobales'); ?>

	<div class="block-error">
		<?php	
		$this->widget('bootstrap.widgets.TbAlert', array(
		    'block'=>true, // display a larger alert block?
		    'fade'=>true, // use transitions?
		    'closeText'=>'×', // close link text - if set to false, no close link is displayed
		    'alerts'=>array( // configurations per alert type
			    'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
		    	'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'),
		    ),
));?>
	</div>
	
<div class="form">
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
			'id'=>'select_company_form',
			'enableAjaxValidation'=>false,
			'method'=>'post',
			'type'=>'horizontal',
			'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'
		)
	)); ?>


	<?php echo $form->errorSummary($model); ?>

	<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
			'title' => 'Localizaciones para cargar',
			'headerIcon' => 'icon-th-list',
			// when displaying a table, if we include bootstra-widget-table class
			// the table will be 0-padding to the box
			'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
	<div class="row">
		<?php

		$listcompany = CHtml::listData($company,'id_localizacion', 'localizacionanexo');

		/* echo "<PRE>";
		 print_r($listcompany);
		echo "</PRE>"; */
		?>

		<div class="control-group">
			<div class="span11">
				<span class="span10"><?php echo $form->radioButtonList($model,'id_localizacion',$listcompany);?>
				</span>
			</div>
		</div>

	</div>
	<?php $this->endWidget();?>
	<div class="row buttons"></div>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', 
				array(  'buttonType'=>'submit',
        				'type'=>'primary',
        				'label'=>'Selecionar'))
        				 ?>
	</div>
	<?php $this->endWidget(); ?>
</div>





