<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Administrativos'=>array('listarAdminis'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Administrativos', 'url'=>array('listarAdminis')),
);
?>

<h1>Crear Usuario Administrativo</h1>


<?php echo $this->renderPartial('_formAdministrativo', array('model'=>$model,'admin'=>$admin)); ?>