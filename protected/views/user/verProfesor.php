<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Profesores'=>array('listarProfes'),
	'ID '.$profe->idprofesor,
);

$this->menu=array(
array('label'=>'Listar Profesores', 'url'=>array('listarProfes')),
array('label'=>'Crear Profesor', 'url'=>array('crearProfesor')),
array('label'=>'Modificar Profesor', 'url'=>array('modificarProfesor', 'id'=>$profe->idprofesor)),
array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
array('label'=>'Desactivar Profesor '.$model->getNombreCompleto(), 'url'=>'#', 'linkOptions'=>array('submit'=>array('DesactivarCuenta','id'=>$model->id),'confirm'=>'¿esta seguro que desea desactivar este usuario?')),
);
?>

<h1>
	Detalle Usuario:
	<?php echo $model->getNombreCompleto(); ?>
</h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$profe,
	'attributes'=>array(
		'titulo',
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


