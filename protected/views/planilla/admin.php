<?php
$this->breadcrumbs=array(
	'Planillas'=>array('index'),
	 Yii::t('app', 'Manage'),
);
/*
$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('planilla-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>
    <?php echo Yii::t('app', 'Planillas'); ?> <small><?php echo Yii::t('app', 'Manage'); ?></small></h1>

<p>
Si lo desea, puede introducir un operador de comparacion (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) al comienzo de cada uno de los valores de su busqueda para especificar como la comparacion se debe hacer.
</p>

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
        array('label'=>Yii::t('app', 'Manage'), 'icon'=>'icon-list-alt', 'url'=>Yii::app()->controller->createUrl('admin'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>Yii::t('app', 'Search'), 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
		array('label'=>Yii::t('app', 'Export to PDF'), 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GeneratePdf'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
		//array('label'=>Yii::t('app', 'Export to Excel'), 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
	),
));
$this->endWidget();*/
?>

<div class="btn-toolbar">
    <div class="btn-group">
<?php  
		$this->widget("bootstrap.widgets.TbButton", array(
				"label"=>Yii::t('app', 'Create'),
				"icon"=>"icon-plus",
				"url"=>array("create")
		));?> </div>
		<div class="btn-group">
     <?php 
        $this->widget("bootstrap.widgets.TbButton", array(
                 "label"=>Yii::t('app', 'Search'),
                 "icon"=>"icon-search",
                 "htmlOptions"=>array("class"=>"search-button")
           ));?>    </div>

                    <div class="btn-group">
            <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'buttons'=>array(
                array('label'=>Yii::t('app', 'Relations'), 'icon'=>'icon-search', 'items'=>array(array('label'=>'detallePlanillas - DetallePlanilla', 'url' =>array('detallePlanilla/admin')),array('label'=>'idLocalizacion - Localizacion', 'url' =>array('localizacion/admin')),array('label'=>'idTipoPlanilla - TipoPlanilla', 'url' =>array('tipoPlanilla/admin')),
            )
          ),
        ),
    ));
?>        </div>
				 	
</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
	'id'=>'planilla-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'type'=>'striped bordered condensed',
    'template'=>'{summary}{pager}{items}{pager}',	
	'columns'=> array_merge(array(
        array(
            'class'=>'bootstrap.widgets.TbRelationalColumn',
            'name' => 'detalle',
			'url' => $this->createUrl('planilla/relational'),
            'value'=> '"Detalle"',
            'afterAjaxUpdate' => 'js:function(tr,rowid,data){
                bootbox.alert("I have afterAjax events too! This will only happen once for row with id: "+rowid);
            }'
		)),
		array(
		/*'id_planilla',*/
		'mes',
		'anio',
		array(
			'name'=>'id_localizacion',
			'value'=>'GxHtml::valueEx($data->idLocalizacion)',
			'filter'=>GxHtml::listDataEx(Localizacion::model()->findAllAttributes(null, true)),
			),
		array(
			'name'=>'id_tipo_planilla',
			'value'=>'GxHtml::valueEx($data->idTipoPlanilla)',
			'filter'=>GxHtml::listDataEx(TipoPlanilla::model()->findAllAttributes(null, true)),
			),
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view} {update} {delete}',
			'buttons' => array(
			      'view' => array(
					'label'=> 'View',
					'options'=>array(
						'class'=>'btn btn-small view'
					)
				),	
                              'update' => array(
					'label'=> 'Update',
					'options'=>array(
						'class'=>'btn btn-small update'
					)
				),
				'delete' => array(
					'label'=> 'Delete',
					'options'=>array(
						'class'=>'btn btn-small delete'
					)
				)
			),
            'htmlOptions'=>array('style'=>'width: 115px'),
           )
	)),
)); ?>
