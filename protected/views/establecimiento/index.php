<?php

$this->breadcrumbs = array(
	Establecimiento::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . Establecimiento::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . Establecimiento::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(Establecimiento::label(2)); ?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
