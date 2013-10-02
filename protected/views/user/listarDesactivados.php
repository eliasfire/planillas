<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	'Listar Desactivados',
);

$this->menu=array(
array('label'=>'Listar Usuarios', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Cuentas de usuario desactivadas.</h1>



<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display: none">


<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
<!-- search-form -->


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->buscarDesactivados(),
	'filter'=>$model,
	'columns'=>array(
		'nombres',
		'apellido_paterno',
		'apellido_materno',
		'run',
		'username',
/*
 'password',*/
		'email',
		array(
			'header'=>'Acciones',
			'class'=>'CButtonColumn',
			'deleteConfirmation'=>"js:'¿Esta seguro que desea desactivar la cuenta de usuario '+$(this).parent().parent().children(':nth-child(4)').text()+'? .'",
			'template'=>'{view}{reactivar}',
			'buttons'=>array(
				'view'=>array(
					'label'=>'Ver detalle',
					'url'=>'Yii::app()->createUrl("user/view", array("id"=>$data->id))',
	
				),
				'reactivar'=>array(
					'label'=>'Reactivar',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/tick.png',
					'url'=>'Yii::app()->createUrl("user/Reactivar", array("id"=>$data->id))',

				),
			),
		),
	),
)); ?>
