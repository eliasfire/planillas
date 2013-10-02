<?php
$this->breadcrumbs=array(
	'Educacion No Formals'=>array('index'),
	$model->id_educacion_no_formal,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id_educacion_no_formal)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_educacion_no_formal), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
'id_educacion_no_formal',
array(
					'name' => 'idEstablecimiento',
					'type' => 'raw',
					'value' => $model->idEstablecimiento !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idEstablecimiento)), array('establecimiento/view', 'id' => GxActiveRecord::extractPkValue($model->idEstablecimiento, true))) : null,
					),
'tot_alu_act',
'tot_alu_act_obl',
'tot_alu_act_opt',
'nombre_taller_oferta_grupos',
array(
					'name' => 'idCaracterActividad',
					'type' => 'raw',
					'value' => $model->idCaracterActividad !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idCaracterActividad)), array('caracterActividad/view', 'id' => GxActiveRecord::extractPkValue($model->idCaracterActividad, true))) : null,
					),
array(
					'name' => 'idTurno',
					'type' => 'raw',
					'value' => $model->idTurno !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idTurno)), array('turno/view', 'id' => GxActiveRecord::extractPkValue($model->idTurno, true))) : null,
					),
'tot_alu',
'tot_var',
'tot_muj',
'mes',
'anio',
	),
)); ?>
