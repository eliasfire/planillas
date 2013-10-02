<?php
$this->breadcrumbs=array(
	'Localizacion Planillas'=>array('index'),
	$model->id_localizacion_planilla,
);
/*
$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id_localizacion_planilla)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_localizacion_planilla), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);*/
?>

<h1>
    Localizacion Planilla <small><?php echo Yii::t('app', 'View'); ?> #<?php echo $model->id_localizacion_planilla ?></small></h1>

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
        array('label'=>Yii::t('app', 'Update'), 'icon'=>'icon-edit', 'url'=>Yii::app()->controller->createUrl('update',array('id'=>$model->id_localizacion_planilla)), 'linkOptions'=>array()),
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
'id_localizacion_planilla',
'id_localizacion',
array(
					'name' => 'idTipoPlanilla',
					'type' => 'raw',
					'value' => $model->idTipoPlanilla !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idTipoPlanilla)), array('tipoPlanilla/view', 'id' => GxActiveRecord::extractPkValue($model->idTipoPlanilla, true))) : null,
					),
'id_establecimiento',
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