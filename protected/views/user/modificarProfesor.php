<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Profesores'=>array('listarProfes'),
$profe->idprofesor=>array('verProfesor','id'=>$profe->idprofesor),
	'Modificar',
);

$this->menu=array(
array('label'=>'Listar Profesores', 'url'=>array('listarAdmin')),
array('label'=>'Crear Profesor', 'url'=>array('crearAdministrador')),
array('label'=>'Ver Profesor', 'url'=>array('verProfesor', 'id'=>$profe->idprofesor)),
array('label'=>'Desactivar Profesor '.$model->getNombreCompleto(), 'url'=>'#', 'linkOptions'=>array('submit'=>array('DesactivarCuenta','id'=>$model->id),'confirm'=>'¿esta seguro que desea desactivar este usuario?')),
);
?>

<h1>
	Modificar Usuario
	<?php echo $model->getNombreCompleto(); ?>
</h1>


<?php echo $this->renderPartial('_formProfesor', array('model'=>$model,'profe'=>$profe)); ?>