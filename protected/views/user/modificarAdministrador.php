<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Administrador'=>array('listarAdmin'),
$admin->idadministrador=>array('verAdministrador','id'=>$admin->idadministrador),
	'Modificar',
);

$this->menu=array(
array('label'=>'Listar Administradores', 'url'=>array('listarAdmin')),
array('label'=>'Crear Administrador', 'url'=>array('crearAdministrador')),
array('label'=>'Ver Administrador', 'url'=>array('verAdministrador', 'id'=>$admin->idadministrador)),
array('label'=>'Desactivar Administrador '.$model->getNombreCompleto(), 'url'=>'#', 'linkOptions'=>array('submit'=>array('DesactivarCuenta','id'=>$model->id),'confirm'=>'¿esta seguro que desea desactivar este usuario?')),
);
?>

<h1>
	Modificar Usuario
	<?php echo $model->getNombreCompleto(); ?>
</h1>


<?php echo $this->renderPartial('_formAdministrador', array('model'=>$model,'admin'=>$admin)); ?>