<?php
$this->breadcrumbs=array(
	'Usu Est Plas'=>array('index'),
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
	$.fn.yiiGridView.update('usu-est-pla-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>
    <?php echo Yii::t('app', 'Usu Est Plas'); ?> <small><?php echo Yii::t('app', 'Manage'); ?></small></h1>

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
                array('label'=>Yii::t('app', 'Relations'), 'icon'=>'icon-search', 'items'=>array(array('label'=>'idEstablecimiento - Establecimiento', 'url' =>array('establecimiento/admin')),array('label'=>'idUsuario - User', 'url' =>array('user/admin')),array('label'=>'idTipoPlanilla - TipoPlanilla', 'url' =>array('tipoPlanilla/admin')),array('label'=>'idLocalizacion - Localizacion', 'url' =>array('localizacion/admin')),
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

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'usu-est-pla-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'type'=>'striped bordered condensed',
    'template'=>'{summary}{pager}{items}{pager}',	
	'columns'=>array(
		'id_usu_est_pla',
		array(
			'name'=>'id_usuario',
			'value'=>'GxHtml::valueEx($data->idUsuario)',
			'filter'=>GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
			),
		array(
			'name'=>'id_establecimiento',
			'value'=>'GxHtml::valueEx($data->idEstablecimiento)',
			'filter'=>GxHtml::listDataEx(Establecimiento::model()->findAllAttributes(null, true)),
			),
		array(
			'name'=>'id_tipo_planilla',
			'value'=>'GxHtml::valueEx($data->idTipoPlanilla)',
			'filter'=>GxHtml::listDataEx(TipoPlanilla::model()->findAllAttributes(null, true)),
			),
		array(
			'name'=>'id_localizacion',
			'value'=>'GxHtml::valueEx($data->idLocalizacion)',
			'filter'=>GxHtml::listDataEx(Localizacion::model()->findAllAttributes(null, true)),
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
	),
)); ?>