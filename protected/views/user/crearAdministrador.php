<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Administrador'=>array('listarAdmin'),
	'Crear ',
);

$this->menu=array(
array('label'=>'Listar Administradores', 'url'=>array('listarAdmin')),
);
?>

<h1>Crear Usuario Administrador</h1>


<?php echo $this->renderPartial('_formAdministrador', array('model'=>$model,'admin'=>$admin)); ?>