<?php
$this->breadcrumbs=array(
	'Detalle Planillas'=>array('index'),
	Yii::t('app', 'Create'),
);
/*
$this->menu = array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('admin')),
);;*/
?>

<h1>
    <?php echo Yii::t('app', 'Detalle Planilla'); ?> <small><?php echo Yii::t('app', 'Create'); ?></small></h1>

<hr/>
<?php 
/*$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>Yii::t('app', 'Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'),'active'=>true, 'linkOptions'=>array()),
        array('label'=>Yii::t('app', 'List'), 'icon'=>'icon-list-alt', 'url'=>Yii::app()->controller->createUrl('admin'), 'linkOptions'=>array()),
		//array('label'=>Yii::t('app', 'Search'), 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
	),
));
$this->endWidget();*/
?>

<div class="btn-toolbar">
    <div class="btn-group">
<?php 
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=> Yii::t('app', 'Create'),
                        "icon"=>"icon-plus",
                        "url"=>array("create")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t('app', 'Manage'),'type'=>'primary',
                        "icon"=>"icon-list-alt icon-white",
                        "url"=>array("admin")
                    ));
        ?>';
        ?>
    </div>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>