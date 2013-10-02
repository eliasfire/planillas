<?php
$this->breadcrumbs=array(
	'Datosests'=>array('index'),
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
	$.fn.yiiGridView.update('datosest-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>
    <?php echo Yii::t('app', 'Datosests'); ?> <small><?php echo Yii::t('app', 'Manage'); ?></small></h1>

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

            	
</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'datosest-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'type'=>'striped bordered condensed',
    'template'=>'{summary}{pager}{items}{pager}',	
	'columns'=>array(
		'id_datos_est',
		'id_planilla',
		'tot_dic_cla',
		'tot_dic_tit',
		'tot_dic_int',
		'tot_dic_tra',
		/*
		'tot_dic_sup',
		'tot_dic_sin',
		'tot_dic_pas',
		'tot_dic_com',
		'tot_dic_lic',
		'tot_dic_con',
		'tot_jar_mat',
		'tot_mat_tit',
		'tot_mat_int',
		'tot_mat_tra',
		'tot_mat_sup',
		'tot_mat_sin',
		'tot_mat_pas',
		'tot_mat_com',
		'tot_mat_lic',
		'tot_mat_con',
		'tot_jar_inf',
		'tot_inf_tit',
		'tot_inf_int',
		'tot_inf_tra',
		'tot_inf_sup',
		'tot_inf_sin',
		'tot_inf_pas',
		'tot_inf_com',
		'tot_inf_lic',
		'tot_inf_con',
		'tot_hor_egb',
		'tot_egb_tit',
		'tot_egb_int',
		'tot_egb_tra',
		'tot_egb_sup',
		'tot_egb_sin',
		'tot_egb_pas',
		'tot_egb_com',
		'tot_egb_lic',
		'tot_egb_con',
		'tot_hor_sec',
		'tot_sec_tit',
		'tot_sec_int',
		'tot_sec_tra',
		'tot_sec_sup',
		'tot_sec_sin',
		'tot_sec_pas',
		'tot_sec_com',
		'tot_sec_lic',
		'tot_sec_con',
		'tot_hor_pol',
		'tot_pol_tit',
		'tot_pol_int',
		'tot_pol_tra',
		'tot_pol_sup',
		'tot_pol_sin',
		'tot_pol_pas',
		'tot_pol_com',
		'tot_pol_lic',
		'tot_pol_con',
		'tot_act_fun',
		'tot_fun_tit',
		'tot_fun_int',
		'tot_fun_tra',
		'tot_fun_sup',
		'tot_fun_sin',
		'tot_fun_pas',
		'tot_fun_com',
		'tot_fun_lic',
		'tot_fun_con',
		'tot_hor_ins',
		'tot_ins_tit',
		'tot_ins_int',
		'tot_ins_tra',
		'tot_ins_sup',
		'tot_ins_sin',
		'tot_ins_pas',
		'tot_ins_com',
		'tot_ins_lic',
		'tot_ins_con',
		'tot_per_adm',
		'tot_adm_var',
		'tor_adm_muj',
		'tot_per_ser',
		'tot_ser_var',
		'tot_ser_muj',
		'tot_per_pla',
		'tot_pla_var',
		'tot_pla_muj',
		'tot_per_con',
		'tot_con_var',
		'tot_con_muj',
		'tot_per_nod',
		'tot_per_var',
		'tot_per_muj',
		'tot_doc_act',
		'tot_act_var',
		'tot_act_muj',
		'tot_per_pas',
		'tot_pas_var',
		'tot_pas_muj',
		'tot_doc_fun',
		'tot_doc_var',
		'tot_doc_muj',
		'tot_doc_otr',
		'tot_otr_var',
		'tot_otr_muj',
		'dom_act',
		'telefono',
		'email',
		'lugar_fecha',
		'secretario',
		'vicedirector',
		'director',
		'fec_ini_act',
		'fec_ina',
		'fec_ani',
		'tot_pol_tar',
		'tot_fun_tar',
		'tot_ins_tar',
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
