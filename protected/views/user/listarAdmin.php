<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Administradores'=>array('listarAdmin'),
	'Listar/Buscar',
);

$this->menu=array(
array('label'=>'Listar Administradores', 'url'=>array('listarAdmin')),
array('label'=>'Crear Administrador', 'url'=>array('crearAdministrador')),
	array('label'=>'Exportar a PDF', 'url'=>array('ListaAdminPdf')),
);

Yii::app()->clientScript->registerScript('Buscar', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('administrador-create-form', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Listar Administradores</h1>


<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display: none">


<?php $this->renderPartial('_buscarAdministrador',array(
	'model'=>$admin,
)); ?>
</div>
<!-- search-form -->


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$admin->search(),
	'filter'=>$admin,
	'columns'=>array(
		//'idadministrador',
		
/*array(
			'name'=> 'user_id',
			'value'=> '$data->user_id',
			'type'=> 'text',
//'htmlOptions'=>array('style'=>'text-align:center;'),
),*/
array(
			'name'=> 'user_nombres',
			'value'=> '$data->user->nombres',
			'type'=> 'text',
),
array(
			'name'=> 'user_apellido_paterno',
			'value'=> '$data->user->apellido_paterno',
			'type'=> 'text',
),
array(
			'name'=> 'user_apellido_materno',
			'value'=> '$data->user->apellido_materno',
			'type'=> 'text',
),
array(
			'name'=> 'user_run',
			'value'=> '$data->user->run',
			'type'=> 'text',
),
array(
			'name'=> 'user_username',
			'value'=> '$data->user->username',
			'type'=> 'text',
),
array(
			'name'=> 'user_email',
			'value'=> '$data->user->email',
			'type'=> 'text',
),
'cargo',
array(
			'header'=>'Acciones',
			'class'=>'CButtonColumn',
			'deleteConfirmation'=>"js:'¿Esta seguro que desea desactivar la cuenta de usuario '+$(this).parent().parent().children(':nth-child(6)').text()+'? .'",
			'template'=>'{view}{update}{delete}{pdf}',
			'buttons'=>array(
				'view'=>array(
					'label'=>'Ver detalle',
					'url'=>'Yii::app()->createUrl("user/verAdministrador", array("id"=>$data->idadministrador))',
	
),
				'update'=>array(
					'label'=>'Modificar',
					'url'=>'Yii::app()->createUrl("user/modificarAdministrador", array("id"=>$data->idadministrador))',

),
				'delete'=>array(
					'label'=>'Desactivar',
					'url'=>'Yii::app()->createUrl("user/desactivarCuenta", array("id"=>$data->user_id))',

),
				'pdf' => array(
					'label'=>'Generar PDF',
					'url'=>"CHtml::normalizeUrl(array('pdf', 'id'=>\$data->user_id))",
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/pdf_icon.png',
					'options' => array('class'=>'pdf'),
),
	
),
),
),
)); ?>
