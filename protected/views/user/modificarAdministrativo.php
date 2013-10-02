<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Administrativo'=>array('listarAdminis'),
$admin->idadministrativo=>array('verAdministrativo','id'=>$admin->idadministrativo),
	'Modificar',
);

$this->menu=array(
array('label'=>'Listar Administrativos', 'url'=>array('listarAdminis')),
array('label'=>'Crear Administrativo', 'url'=>array('crearAdministrativo')),
array('label'=>'Ver Administrativo', 'url'=>array('verAdministrativo', 'id'=>$admin->idadministrativo)),
array('label'=>'Adminisitrar Usuarios', 'url'=>array('admin')),
array('label'=>'Desactivar Administrativo '.$model->getNombreCompleto(), 'url'=>'#', 'linkOptions'=>array('submit'=>array('DesactivarAdministrador','id'=>$model->id),'confirm'=>'¿esta seguro que desea desactivar este usuario?')),
);
?>

<h1>
	Modificar Usuario
	<?php echo $model->getNombreCompleto(); ?>
</h1>


<?php echo $this->renderPartial('_formAdministrador', array('model'=>$model,'admin'=>$admin)); ?>