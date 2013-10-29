<?php
$this->breadcrumbs=array(
	'Planillas'=>array('index'),
	Yii::t('app', 'Create'),
);?>


<h1>
    <?php echo Yii::t('app', 'Planilla'); ?> <small><?php echo Yii::t('app', 'Create'); ?></small></h1>
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
        ?>
<hr/>
<?php 

?>
<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'planilla-form',
	'enableAjaxValidation'=>false,
	'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'
		)	
	)); ?>

	<?php $cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$cs->registerCoreScript('jquery.ui');
		$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/bootstrap/jquery-ui.css');?>	
		

   <script> 
	$(".btnreset").click(function(){
		$(":input","planilla-form").each(function() {
		var type = this.type;
		var tag = this.tagName.toLowerCase(); // normalize case
		if (type == "text" || type == "password" || tag == "textarea") this.value = "";
		else if (type == "checkbox" || type == "radio") this.checked = false;
		else if (tag == "select") this.selectedIndex = "";
	  });
	}); 
   </script>
   
   <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio").html(html)}});
    return false;});
	}); 
   </script>
	    
    <?php echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span10')); ?>.
    <span class="span4"><?php echo $form->dropdownlistRow($model,'mes', array("marzo" => "Marzo", "septiembre" => "Septiembre"),array("disabled"=>"disabled"));?></span>
    <span class="span4"><?php echo $form->dropdownlistRow($model,'anio', array("2013" => "2013"),array("disabled"=>"disabled"));?></span>
 
 <div class="control-group">		
	<div class="span4">

		<?php 
		echo $form->textFieldRow($establecimiento,'nombre',array('class'=>'span5',"disabled"=>"disabled"));
		echo $form->textFieldRow($establecimiento,'cue',array('class'=>'span5',"disabled"=>"disabled"));
		?>
          </div>   
         </div>   
 

<table class="linear" cellspacing="0" >
<?php /*
	// see http://www.yiiframework.com/doc/guide/1.1/en/form.table
	// Note: Can be a route to a config file too,
	//       or create a method 'getMultiModelForm()' in the member model

	$memberFormConfig = array(
		  'elements'=>array(
		  		
			'id_localizacion'=>array(
				'type'=>'dropdownlist',
				'items'=>GxHtml::listDataEx(Localizacion::model()->findAll(array('select'=>'t.id_localizacion, t.nombre','condition'=>"t.id_establecimiento = 'Yii::app()->getSession()->get('id_establecimiento')' and t.c_estado = 1")),'id_localizacion','nombre'),
				'prompt'=>'--seleccione--',
				'class' => 'miselect'
			),
		  	'id_nivel'=>array(
		  		'type'=>'dropdownlist',
		  		'items'=>GxHtml::listDataEx(NivelServicio::model()->findAll(array('condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
		  		'prompt'=>'--seleccione--',
		  		'class' => 'miselect'
		  	),
		  	'id_sala_ciclo_anio'=>array(
		  		'type'=>'dropdownlist',
		  		'items'=>GxHtml::listDataEx(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
		  		'label'=>'Año',
		  		'prompt'=>'--seleccione--',
		  		'class' => 'miselect'
		  	),
		  	'id_nivel'=>array(
		  		'type'=>'dropdownlist',
		  		'items'=>GxHtml::listDataEx(NivelServicio::model()->findAll(array('condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
		  		'prompt'=>'--seleccione--',
		  		'class' => 'miselect'
		  	),
		  	'id_turno'=>array(
		  		'type'=>'dropdownlist',
		  		'items'=>GxHtml::listDataEx(Turno::model()->findAll(),'id_turno', 'descripcion'),
		  		'prompt'=>'--seleccione--',
		  		'class' => 'miselect'
		  	),
		  	'nombre_seccion'=>array(
		  		'type'=>'text',
		  		'maxlength'=>15,
		  		'class' => 'miinput2'
		  	),
		  	'id_seccion'=>array(
		  		'type'=>'dropdownlist',
		  		'items'=>GxHtml::listDataEx(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
		  		'prompt'=>'--seleccione--',
		  		'class' => 'miselect'
		  	),
		  	'id_orientacion'=>array(
		  		'type'=>'dropdownlist',
		  		'items'=>GxHtml::listDataEx(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
		  		'prompt'=>'--seleccione--',
		  		'class' => 'miselect'
		  	),
            'alu_mat_tot'=>array(
				'type'=>'text',
				'label'=>'Total',
            	'class' => 'miinput'
			),

		  	'alu_mat_var'=>array(
		  		'type'=>'text',
		  		'label'=>'Varones',
		  		'class' => 'miinput'
		  	),
		  	'asistencia_medica'=>array(
		  		'type'=>'text',
		  		'label'=>'Asis. Med.',
		  		'class' => 'miinput'
		  	),
			
		));

	$this->widget('ext.multimodelform.MultiModelForm',array(
			'id' => 'id_member', //the unique widget id
			'formConfig' => $memberFormConfig, //the form configuration array
			'model' => $detallePlanilla, //instance of the form model
			'tableView' => true,
			//if submitted (not empty) from the controller,
			//the form will be rendered with validation errors
			'validatedItems' => $validatedDetalles,

	        //array of member instances loaded from db
            //only needed if validatedItems are empty (not in displaying validation errors mode)
			'data' => empty($validatedItems) ? $detallePlanilla->findAll(
                                             array('condition'=>'id_planilla=:IdPlanilla',
                                                   'params'=>array(':IdPlanilla'=>$model->id_planilla),
                                                   )) : null,

            'showAddItemOnError' => false, //not allow add items when in validation error mode (default = true)

            //------------ output style ----------------------
           //'tableView' => true, //sortable will not work

            //add position:relative because of embedded removeLinkWrapper with style position:absolute
            'fieldsetWrapper' => array('tag' => 'div',
                'htmlOptions' => array('class' => 'view','style'=>'position:relative;background:#EFEFEF;')
            ),

            'removeLinkWrapper' => array('tag' => 'div',
                'htmlOptions' => array('style'=>'position:absolute; top:1em; right:1em;')
            ),

		));
?>
</table>
<div class="form-actions">
 	
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			 'icon'=>'ok white', 
			'label'=>$model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Save'),
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset',
             'icon'=>'remove',  
			'label'=> Yii::t('app', 'Reset'),
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'link',
			'url'=>Yii::app()->controller->createUrl('admin'),
            'icon'=>'remove-sign',  
			'label'=> Yii::t('app', 'Cancel'),
		)); */?>
	</div>
<?php $this->endWidget(); ?>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model,
			//submit the member and validatedItems to the widget in the edit form
			'detallePlanilla'=>$detallePlanilla,
			'validatedDetalles' => $validatedDetalles,
			'establecimiento' => $establecimiento)); ?>