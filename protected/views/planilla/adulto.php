<?php
$this->breadcrumbs=array(
	'Planillas'=>array('index'),
	Yii::t('app', 'Create'),
);?>

<?php
$this->widget('ext.jqrelcopy.JQRelcopy', array(
    //the id of the 'Copy' link in the view, see below.
    'id' => 'copylink',
    //add a icon image tag instead of the text
    //leave empty to disable removing
    'removeText' => '<img src="' . Yii::app()->request->baseUrl . '/images/minusButton.png"><a>Borrar</a>',
    //htmlOptions of the remove link
    'removeHtmlOptions' => array('style' => 'color:red;'),
    //options of the plugin, see http://www.andresvidal.com/labs/relcopy.html
    'options' => array(
        //A class to attach to each copy
        'copyClass' => 'newcopy',
        'slideUp' => true,
        // The number of allowed copies. Default: 0 is unlimited
        'clearInputs' => true,
        //A jQuery selector used to exclude an element and its children
        'excludeSelector' => '.skipcopy',
    //Additional HTML to attach at the end of each copy.
    //'append'=>CHtml::tag('span',array('class'=>'hint'),'You can remove this line'),
    )
));
?>


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
		/*
		echo $form->dropDownListRow($model, 'id_localizacion', 
				GxHtml::listDataEx(Localizacion::model()->findAll(array(
						'select'=>'t.id_localizacion, t.nombre',
						'condition'=>"t.id_establecimiento = 'Yii::app()->getSession()->get('id_establecimiento')'")),'id_localizacion','nombre'),
				array(
						'ajax'=>array(
								'type'=>'POST',
								'url'=>CController::createUrl('Planilla/Selectdos'),
								'update'=>'#'.CHtml::activeId($model,'id_tipo_planilla'),
								'beforeSend' => 'function(){
								$("#Planilla_id_tipo_planilla").find("option").remove();
								
				}', ),
						'prompt'=>'Seleccione',
					    'class'=>'span5'
					
				)); ?>
				
		<?php echo  $form->dropDownListRow($model, 'id_tipo_planilla', 
				GxHtml::listDataEx(TipoPlanilla::model()->findAll(),'id_tipo_planilla','descripcion'),
				array(
						'ajax'=>array(
								'type'=>'POST',
								'url'=>CController::createUrl('Planilla/Test'),
								'replace'=>'#Secciones',
								'update'=>'#Secciones'),
						'prompt'=>'Seleccione',
						'class'=>'span5'		
						)); */?>
	
            </div>   
  </div>
   <table   border="1" id="head">
	<thead>
		<tr>
			<!--<th>#</th>-->
			<th>Localizacion</th>
			<th>Nivel     </th>
			<th>     Año estudio</th>
			<th>Turno</th>
			<th>Nombre Sección</th>
			<th>Sección/División</th>
			<th>Orientación</th>
			<th>Total</th>
			<th>Varones</th>
			<th>Asistencia Medica</th>
			<!-- <th>Mujeres</th>-->
		</tr>
	</thead>
	</table>
	
 <div class="row copy">
 <table   border="1" id="example" class="tablita">	
	 	<tr>
		 	<!--<td><?php echo '1' ?></td>-->
			<td> <?php echo CHtml::dropDownList('localizacion',$model, 
			GxHtml::listDataEx(Localizacion::model()->findAll(array('select'=>'t.id_localizacion, t.nombre','condition'=>"t.id_establecimiento = 'Yii::app()->getSession()->get('id_establecimiento')' and t.c_estado = 1")),'id_localizacion','nombre'),
			array('prompt'=>'Seleccione','class' => 'miselect'	)); ?></td>
			<td><?php echo CHtml::dropDownList('niveles', $model, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione','class' => 'miselect')); ?></td>
			<td><?php echo CHtml::dropDownList('anios_estudio', $model, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione','class' => 'miselect'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno', $model, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione','class' => 'miselect')); ?></td>
		    <td><?php echo CHtml::textField('nombre_seccion',$model,array('class' => 'miinput2'	)); ?></td>			
			<td><?php echo CHtml::dropDownList('seccion', $model, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione','class' => 'miselect')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion', $model, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione','class' => 'miselect')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot',$model, array('class' => 'miinput')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var',$model, array('class' => 'miinput')); ?></td>
			<td><?php echo CHtml::textField('asistencia_medica',$model, array('class' => 'miinput')); ?></td>
		<!-- 	<td><?php echo CHtml::textField('alu_mat_muj',$model); ?></td> -->
		</tr>
		
	 </tbody>
 
</table>
</div>	
 <a id="copylink" href="#" rel=".copy" ><img style="vertical-align:-10px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/addButton.png">Añadir</a>



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
		)); ?>
	</div>
<?php $this->endWidget(); ?>
</div>

<?php //echo $this->renderPartial('_adulto', array('model'=>$model,'establecimiento' => $establecimiento)); ?>