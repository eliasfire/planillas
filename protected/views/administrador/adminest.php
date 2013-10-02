<?php
$this->breadcrumbs=array(
	'Planillas'=>array('index'),
	 Yii::t('app', 'Manage'),
);

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

<h1> <?php echo Yii::t('app', 'Planillas'); ?> por Establecimiento <small><?php echo Yii::t('app', 'Manage'); ?></small></h1>

<p> Si lo desea, puede introducir un operador de comparacion (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) al comienzo de cada uno de los valores de su busqueda para especificar como la comparacion se debe hacer.</p>

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
	'dataProvider'=>$model->getGridDataProviderEst(),
	'filter'=>$model,
    'type'=>'striped bordered condensed',
    'template'=>'{summary}{pager}{items}{pager}',	
	'columns'=> array_merge(array(
        /*array(
            'class'=>'bootstrap.widgets.TbRelationalColumn',
            'name' => 'detalle',
			'url' => $this->createUrl('planilla/relational'),
            'value'=> '"Detalle"',
            
		)*/),
		array(
		'mes',
		'anio',
		array(
			'name'=>'id_establecimiento',
			'value'=>'GxHtml::valueEx($data->idEstablecimiento)',
			'filter'=>GxHtml::listDataEx(Establecimiento::model()->findAllAttributes(null, true)),
			),
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view}', /*{update} {delete} */
			'buttons' => array(
			    'view' => array(
					'label'=> 'Ver detalle',
			    	'url'=>'Yii::app()->createUrl("administrador/viewest", array("id"=>$data->id_establecimiento))',
					'options'=>array(
					'class'=>'btn btn-small view'
					)
				),	
                /*'update' => array(
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
				),*/
				'email' => array
					(
					'label'=>'e-mail',
					'icon'=>'btn btn-small envelope',
					'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id_planilla))',
							
				),
				'down' => array
					(
					'label'=>'[-]',
					'url'=>'"#"',
					'visible'=>'$data->confirmado > 0',
					'click'=>'function(){alert("Going down!");}',
				),
			),
            'htmlOptions'=>array('style'=>'width: 115px'),
           )
	)),
)); ?>
