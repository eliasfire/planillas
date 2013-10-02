<style type="text/css">
#contenedor {
	overflow: hidden;
}

#izquierda {
	float: left;
	color: #fff;
}

#derecha {
	float: right;
	color: #fff;
}
</style>

<div id="contenedor">
	<div id="izquierda">
		<?php if (!Yii::app()->user->isGuest) {

			$this->widget(
				'bootstrap.widgets.TbLabel',
				array(
						'type' => 'success',
						'label' => 'Establecimiento: '. Yii::app()->getSession()->get('nombre_establecimiento'),
				)
		);
	}?>

	</div>
	<div id="derecha">
		<?php 		
		if(!Yii::app()->user->isGuest and isset(Yii::app()->user->last_login)){
			$this->widget(
				'bootstrap.widgets.TbLabel',
				array(
						'type' => 'important',
						'label' => 'Mes vigente: ' . Yii::app()->getSession()->get('mesvigente') . '  ',
				)
		);
		}
		if(!Yii::app()->user->isGuest and isset(Yii::app()->user->last_login)){
		$this->widget(
				'bootstrap.widgets.TbLabel',
				array(
						'type' => 'inverse',
						'label' => 'Año vigente: ' . Yii::app()->getSession()->get('aniovigente'),
				)
		);
		}?>

	</div>
</div>
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

<h1> <?php echo Yii::t('app', 'Planillas'); ?> Ingresadas <small><?php echo Yii::t('app', 'Manage'); ?></small></h1>

<p> Si lo desea, puede introducir un operador de comparacion (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) al comienzo de cada uno de los valores de su busqueda para especificar como la comparacion se debe hacer.</p>

<!-- <div class="btn-toolbar"> -->
<!--     <div class="btn-group"> -->
 <?php  /*
// 		$this->widget("bootstrap.widgets.TbButton", array(
// 				"label"=>Yii::t('app', 'Create'),
// 				"icon"=>"icon-plus",
// 				"url"=>array("create")
// 		));?> </div>
// 		<div class="btn-group">
//      <?php 
//         $this->widget("bootstrap.widgets.TbButton", array(
//                  "label"=>Yii::t('app', 'Search'),
//                  "icon"=>"icon-search",
//                  "htmlOptions"=>array("class"=>"search-button")
           ));*/?>    </div>

<!-- </div> -->
<?php	
	$this->widget('bootstrap.widgets.TbAlert', array(
    'block'=>true, // display a larger alert block?
    'fade'=>true, // use transitions?
    'closeText'=>'×', // close link text - if set to false, no close link is displayed
    'alerts'=>array( // configurations per alert type
	    'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
    	'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'),
    ),
));

?>


<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
	'id'=>'planilla-grid',
	'dataProvider'=>$model->getGridDataProvider(),
	'filter'=>$model,
    'type'=>'striped bordered condensed',
    'template'=>'{summary}{pager}{items}{pager}',	
	'columns'=> array_merge(array(
        /*array(
            'class'=>'bootstrap.widgets.TbRelationalColumn',
            'name' => 'detalle',
			'url' => $this->createUrl('planilla/relational'),
            'value'=> '"Detalle"',
            
		)),/*
		array(
		/*'id_planilla',*/
		'mes',
		'anio',
		array(
			'header'=>'Id Establecimiento',
			'name'=>'id_establecimiento',
		),
		array(
			'name'=>'id_establecimiento',
			'value'=>'GxHtml::valueEx($data->idEstablecimiento)',
			//'filter'=>GxHtml::listDataEx(Establecimiento::model()->findAllAttributes(null, true)),
			),
		array(
			'header'=>'Localizacion',
			'name'=>'id_localizacion',
			'value'=>'GxHtml::valueEx($data->idLocalizacion)',
			//'filter'=>GxHtml::listDataEx(Localizacion::model()->findAllAttributes(null, true)),
			),	
/* 		array(
			'header'=>'Anexo',
			'name'=>'id_localizacion',
			'value'=>'GxHtml::valueEx($data->idLocalizacion->anexo)',
		),	 */		
		array(
			'name'=>'id_tipo_planilla',
			'value'=>'GxHtml::valueEx($data->idTipoPlanilla)',
			'filter'=>GxHtml::listDataEx(TipoPlanilla::model()->findAllAttributes(null, true)),
			),
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view} {update}',
			'buttons' => array(
			      'view' => array(
					'label'=> 'Ver detalle',
					'options'=>array(
						'class'=>'btn btn-small view'
					)
				),	
                   'update' => array(
					'label'=> 'Actualizar',
					'options'=>array(
						'class'=>'btn btn-small update'
					)
				),
					'delete' => array(
						'label'=> 'Borrar',
						'options'=>array(
							'class'=>'btn btn-small delete'
						)
				)
			),
            'htmlOptions'=>array('style'=>'width: 115px'),
           )
	)),
)); 
?>
