<?php
$this->breadcrumbs=array(
	'Detalle Planillas'=>array('index'),
	$model->id_detalle_planilla,
);
/*
$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id_detalle_planilla)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_detalle_planilla), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);*/
?>

<h1>
    Detalle Planilla <small><?php echo Yii::t('app', 'View'); ?> #<?php echo $model->id_detalle_planilla ?></small></h1>

<hr />
<?php 
/*$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>Yii::t('app', 'Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
        array('label'=>Yii::t('app', 'List'), 'icon'=>'icon-list-alt', 'url'=>Yii::app()->controller->createUrl('admin'), 'linkOptions'=>array()),
        array('label'=>Yii::t('app', 'Update'), 'icon'=>'icon-edit', 'url'=>Yii::app()->controller->createUrl('update',array('id'=>$model->id_detalle_planilla)), 'linkOptions'=>array()),
		//array('label'=>'Search', 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
		array('label'=>Yii::t('app', 'Print'), 'icon'=>'icon-print', 'url'=>'javascript:void(0);return false', 'linkOptions'=>array('onclick'=>'printDiv();return false;')),

)));
$this->endWidget(); */
?>


<div class="btn-toolbar">
    <div class="btn-group">
<?php  
		$this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t('app', 'Manage'),'type'=>'primary',
                        "icon"=>"icon-list-alt icon-white",
                        "url"=>array("admin")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t('app', 'Update'),'type'=>'warning',
                        "icon"=>"icon-edit icon-white",
                        "url"=>array("update","id"=>$model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t('app', 'Create'),
                        "icon"=>"icon-plus",
                        "url"=>array("create")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t('app', 'Delete'),"type"=>"inverse",
                        "type"=>"danger",
                        "icon"=>"icon-remove icon-white",
                        "htmlOptions"=> array(
                            "submit"=>array("delete","id"=>$model->{$model->tableSchema->primaryKey}, "returnUrl"=>Yii::app()->request->getParam("returnUrl")),
                            "confirm"=>"Do you want to delete this item?")
                         )
                    );?>
    
	</div>
	
</div>
<h2>
    Data
</h2>

<div class='printableArea'>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
'id_detalle_planilla',
array(
					'name' => 'idSalaCicloAnio',
					'type' => 'raw',
					'value' => $model->idSalaCicloAnio !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idSalaCicloAnio)), array('salaCicloAnio/view', 'id' => GxActiveRecord::extractPkValue($model->idSalaCicloAnio, true))) : null,
					),
array(
					'name' => 'idNivel',
					'type' => 'raw',
					'value' => $model->idNivel !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idNivel)), array('nivelServicio/view', 'id' => GxActiveRecord::extractPkValue($model->idNivel, true))) : null,
					),
array(
					'name' => 'idSeccion',
					'type' => 'raw',
					'value' => $model->idSeccion !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idSeccion)), array('seccion/view', 'id' => GxActiveRecord::extractPkValue($model->idSeccion, true))) : null,
					),
array(
					'name' => 'idOrientacion',
					'type' => 'raw',
					'value' => $model->idOrientacion !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idOrientacion)), array('orientacion/view', 'id' => GxActiveRecord::extractPkValue($model->idOrientacion, true))) : null,
					),
array(
					'name' => 'idCaracterActividad',
					'type' => 'raw',
					'value' => $model->idCaracterActividad !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idCaracterActividad)), array('caracterActividad/view', 'id' => GxActiveRecord::extractPkValue($model->idCaracterActividad, true))) : null,
					),
'alu_mat_tot',
'alu_mat_var',
'alu_mat_muj',
'alu_rep_tot',
'alu_rep_var',
'alu_rep_muj',
'nec_esp_edu',
'alu_ser_tot',
'alu_ser_var',
'alu_ser_muj',
'alu_obl_tot',
'alu_obl_var',
'alu_obl_muj',
'alu_opt_tot',
'alu_opt_var',
'alu_opt_muj',
array(
					'name' => 'idTurno',
					'type' => 'raw',
					'value' => $model->idTurno !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idTurno)), array('turno/view', 'id' => GxActiveRecord::extractPkValue($model->idTurno, true))) : null,
					),
array(
					'name' => 'idPlanilla',
					'type' => 'raw',
					'value' => $model->idPlanilla !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idPlanilla)), array('planilla/view', 'id' => GxActiveRecord::extractPkValue($model->idPlanilla, true))) : null,
					),
'nombre_taller',
'id_actividad_taller',
'nombre_seccion',
'asistencia_medica',
array(
					'name' => 'idLocalizacion',
					'type' => 'raw',
					'value' => $model->idLocalizacion !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idLocalizacion)), array('localizacion/view', 'id' => GxActiveRecord::extractPkValue($model->idLocalizacion, true))) : null,
					),
	),
)); ?>
</div>
<style type="text/css" media="print">
body {visibility:hidden;}
.printableArea{visibility:visible;} 
</style>
<script type="text/javascript">
function printDiv()
{

window.print();

}
</script>