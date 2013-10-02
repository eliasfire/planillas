<?php
$this->breadcrumbs=array(
	'Establecimientos'=>array('index'),
	$model->id_establecimiento,
);
?>

<h1>
    Establecimiento <small><?php echo Yii::t('app', 'View'); ?> #<?php echo $model->id_establecimiento ?></small></h1>
<hr />


<div class="btn-toolbar">
    <div class="btn-group">
<?php  
		$this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t('app', 'Manage'),'type'=>'primary',
                        "icon"=>"icon-list-alt icon-white",
                        "url"=>array("admin")
                    ));/*
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t('app', 'Update'),'type'=>'warning',
                        "icon"=>"icon-edit icon-white",
                        "url"=>array("update","id"=>$model->{$model->tableSchema->primaryKey})
                    ));/*
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t('app', 'Create'),
                        "icon"=>"icon-plus",
                        "url"=>array("create")
                    ));*/
                    $this->widget("bootstrap.widgets.TbButton", array(
                    		"label"=>Yii::t('app', 'Print'),
                    		"icon"=>"icon-print",
                    		"url"=>array("javascript:void(0);return false"),
                    		"htmlOptions"=>array('onclick'=>'printDiv();return false;'),
                    		
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t('app', 'Delete'),"type"=>"inverse",
                        "type"=>"danger",
                        "icon"=>"icon-remove icon-white",
                        "htmlOptions"=> array(
                            "submit"=>array("delete","id"=>$model->{$model->tableSchema->primaryKey}, "returnUrl"=>Yii::app()->request->getParam("returnUrl")),
                            "confirm"=>"Do you want to delete this itemm?")
                         )
                    );?>
                  
	</div>
	
</div>
<h2>
    Data
</h2>

<div class='printableArea'>
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Datos de la Planilla',
	'headerIcon' => 'icon-th-list',
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
'id_establecimiento',
'cue',
'nombre',
'c_sector',
'id_responsable',
'c_estado',
	),
)); ?>
<?php $this->endWidget();?>


<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Detalle de la Planilla',
	'headerIcon' => 'icon-th-list',
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<?php 
$this->widget('bootstrap.widgets.TbGroupGridView', array(
    'type'=>'striped bordered condensed',
	'dataProvider' => Planilla::model()->getGridDataProviderLoc($model->id_establecimiento),
	'template' => "{items}",
	//'extraRowColumns'=> array('id_localizacion'),
	'columns' => array(
		array(
			'header'=>'Localizacion',
			'name'=>'id_localizacion',
			'value'=>'GxHtml::valueEx($data->idLocalizacion)',
			'filter'=>GxHtml::listDataEx(Localizacion::model()->findAllAttributes(null, true)),
		),
		/*array(
			'header'=>'Anexo',
			'value'=>'GxHtml::valueEx($data->idLocalizacion->id_establecimiento)',
		),*/
		array(
			'header'=>'Tipo de Planilla',
			'name'=>'id_tipo_planilla',
			'value'=>'GxHtml::valueEx($data->idTipoPlanilla)',
			'filter'=>GxHtml::listDataEx(TipoPlanilla::model()->findAllAttributes(null, true)),
		),
		array(
			'name'=>'confirmado',
			'value'=>'Planilla::getOnoff($data->confirmado)',
			'filter'=>CHtml::listData(Planilla::getOnoffs(), 'id', 'title'),
		),
        
		/*'alu_rep_tot',
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
		'alu_opt_muj',*/
		
		/*array(
			'name'=>'id_planilla',
			'value'=>'GxHtml::valueEx($data->idPlanilla)',
			'filter'=>GxHtml::listDataEx(Planilla::model()->findAllAttributes(null, true)),
			),
		'nombre_taller',
		'id_actividad_taller',
		*/
			
	),
	'mergeColumns' => array('id_localizacion')
));?>
<?php $this->endWidget();?>



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