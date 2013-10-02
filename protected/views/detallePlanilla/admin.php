<?php
$this->breadcrumbs=array(
	'Detalle Planillas'=>array('index'),
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
	$.fn.yiiGridView.update('detalle-planilla-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>
    <?php echo Yii::t('app', 'Detalle Planillas'); ?> <small><?php echo Yii::t('app', 'Manage'); ?></small></h1>

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
                array('label'=>Yii::t('app', 'Relations'), 'icon'=>'icon-search', 'items'=>array(array('label'=>'idSeccion - Seccion', 'url' =>array('seccion/admin')),array('label'=>'idPlanilla - Planilla', 'url' =>array('planilla/admin')),array('label'=>'idLocalizacion - Localizacion', 'url' =>array('localizacion/admin')),array('label'=>'idSalaCicloAnio - SalaCicloAnio', 'url' =>array('salaCicloAnio/admin')),array('label'=>'idNivel - NivelServicio', 'url' =>array('nivelServicio/admin')),array('label'=>'idOrientacion - Orientacion', 'url' =>array('orientacion/admin')),array('label'=>'idTurno - Turno', 'url' =>array('turno/admin')),array('label'=>'idCaracterActividad - CaracterActividad', 'url' =>array('caracterActividad/admin')),
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
	'id'=>'detalle-planilla-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'type'=>'striped bordered condensed',
    'template'=>'{summary}{pager}{items}{pager}',	
	'columns'=>array(
		'id_detalle_planilla',
		array(
			'name'=>'id_sala_ciclo_anio',
			'value'=>'GxHtml::valueEx($data->idSalaCicloAnio)',
			'filter'=>GxHtml::listDataEx(SalaCicloAnio::model()->findAllAttributes(null, true)),
			),
		array(
			'name'=>'id_nivel',
			'value'=>'GxHtml::valueEx($data->idNivel)',
			'filter'=>GxHtml::listDataEx(NivelServicio::model()->findAllAttributes(null, true)),
			),
		array(
			'name'=>'id_seccion',
			'value'=>'GxHtml::valueEx($data->idSeccion)',
			'filter'=>GxHtml::listDataEx(Seccion::model()->findAllAttributes(null, true)),
			),
		array(
			'name'=>'id_orientacion',
			'value'=>'GxHtml::valueEx($data->idOrientacion)',
			'filter'=>GxHtml::listDataEx(Orientacion::model()->findAllAttributes(null, true)),
			),
		array(
			'name'=>'id_caracter_actividad',
			'value'=>'GxHtml::valueEx($data->idCaracterActividad)',
			'filter'=>GxHtml::listDataEx(CaracterActividad::model()->findAllAttributes(null, true)),
			),
		/*
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
			'name'=>'id_turno',
			'value'=>'GxHtml::valueEx($data->idTurno)',
			'filter'=>GxHtml::listDataEx(Turno::model()->findAllAttributes(null, true)),
			),
		array(
			'name'=>'id_planilla',
			'value'=>'GxHtml::valueEx($data->idPlanilla)',
			'filter'=>GxHtml::listDataEx(Planilla::model()->findAllAttributes(null, true)),
			),
		'nombre_taller',
		'id_actividad_taller',
		'nombre_seccion',
		'asistencia_medica',
		array(
			'name'=>'id_localizacion',
			'value'=>'GxHtml::valueEx($data->idLocalizacion)',
			'filter'=>GxHtml::listDataEx(Localizacion::model()->findAllAttributes(null, true)),
			),
		*/
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
