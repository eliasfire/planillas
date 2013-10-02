<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Profesores'=>array('listarProfes'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Profesores', 'url'=>array('listarProfes')),
);
?>

<h1>Crear Usuario Profesor</h1>


<?php echo $this->renderPartial('_formProfesor', array('model'=>$model,'profe'=>$profe)); ?>