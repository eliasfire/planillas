<?php
$this->breadcrumbs=array(
	'Educacion No Formals'=>array('index'),
	 Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('educacion-no-formal-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<p>
Si lo desea, puede introducir un operador de comparacion (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) al comienzo de cada uno de los valores de su busqueda para especificar como la comparacion se debe hacer.
</p>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'educacion-no-formal-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_educacion_no_formal',
		array(
			'name'=>'id_establecimiento',
			'value'=>'GxHtml::valueEx($data->idEstablecimiento)',
			'filter'=>GxHtml::listDataEx(Establecimiento::model()->findAllAttributes(null, true)),
			),
		'tot_alu_act',
		'tot_alu_act_obl',
		'tot_alu_act_opt',
		'nombre_taller_oferta_grupos',
		/*
		array(
			'name'=>'id_caracter_actividad',
			'value'=>'GxHtml::valueEx($data->idCaracterActividad)',
			'filter'=>GxHtml::listDataEx(CaracterActividad::model()->findAllAttributes(null, true)),
			),
		array(
			'name'=>'id_turno',
			'value'=>'GxHtml::valueEx($data->idTurno)',
			'filter'=>GxHtml::listDataEx(Turno::model()->findAllAttributes(null, true)),
			),
		'tot_alu',
		'tot_var',
		'tot_muj',
		'mes',
		'anio',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
