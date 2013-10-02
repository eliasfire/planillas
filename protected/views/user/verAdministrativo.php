<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Administrativos'=>array('listarAdminis'),
	'ID '.$admin->idadministrativo,
);

$this->menu=array(
array('label'=>'Listar Administrativos', 'url'=>array('listarAdminis')),
array('label'=>'Crear Administrativo', 'url'=>array('crearAdministrativo')),
array('label'=>'Modificar Administrativo', 'url'=>array('modificarAdministrativo', 'id'=>$admin->idadministrativo)),
array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
array('label'=>'Desactivar Administrativo '.$model->getNombreCompleto(), 'url'=>'#', 'linkOptions'=>array('submit'=>array('DesactivarCuenta','id'=>$model->id),'confirm'=>'¿esta seguro que desea desactivar este usuario?')),
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


