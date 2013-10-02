<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Administradores'=>array('listarAdmin'),
	'ID '.$admin->idadministrador,
);

$this->menu=array(
array('label'=>'Listar Administradores', 'url'=>array('listarAdmin')),
array('label'=>'Crear Administrador', 'url'=>array('crearAdminisrador')),
array('label'=>'Modificar Administrador', 'url'=>array('modificarAdministrador', 'id'=>$admin->idadministrador)),
array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
array('label'=>'Desactivar Administrador '.$model->getNombreCompleto(), 'url'=>'#', 'linkOptions'=>array('submit'=>array('DesactivarCuenta','id'=>$model->id),'confirm'=>'¿esta seguro que desea desactivar este usuario?')),
);
?>

<h1>
	Detalle Usuario:
	<?php echo $model->getNombreCompleto(); ?>
</h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$admin,
	'attributes'=>array(
		'cargo',
),
)); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombres',
		'apellido_paterno',
		'apellido_materno',
		'run',
		'username',
		'password',
		'direccion',
		'telefono',
		'salud',
		'prevision',
		'creado',
array(
			'name'=>'activo',
			'type'=>'text',
			'value'=>Chtml::encode(($model->activo==1)?"Si":"No"),
),

		'email',
),
)); ?>


