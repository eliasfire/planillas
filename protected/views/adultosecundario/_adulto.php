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
		
	<script 
	    type="text/javascript"> /*
		jQuery(function($) {
		jQuery('body').on('change','#alu_mat_var',
		function(){jQuery.ajax({
		        'type':'POST',
		        'url':'/planillas/Planilla/Calcula', //Actioncontroller
		        'cache':false,
		        'data':jQuery(this).parents("form").serialize(),
		        'success':function(html){jQuery("#alu_mat_muj").html(html)}});
	    return false;});
		}); */
   </script>
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
  <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles1',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio1").html(html)}});
    return false;});
	}); 
   </script>
     <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles2',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio2").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles3',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio3").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles4',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio4").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles5',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio5").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles6',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio6").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles7',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio7").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles8',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio8").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles9',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio9").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles10',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio10").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles11',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio11").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles12',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio12").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles13',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio13").html(html)}});
    return false;});
	}); 
   </script>
     <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles14',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio14").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles15',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio15").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles16',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio16").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles17',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio17").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles18',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio18").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {
	jQuery('body').on('change','#niveles19',
	function(){jQuery.ajax({
	        'type':'POST',
	        'url':'/planillas/Planilla/Selectnivel', //Actioncontroller
	        'cache':false,
	        'data': {id: $(this).attr('value')},
	        'success':function(html){jQuery("#anios_estudio19").html(html)}});
    return false;});
	}); 
   </script>
	<fieldset>
	    
    <?php echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span10')); ?>.
    <span class="span4"><?php echo $form->dropdownlistRow($model,'mes', array("marzo" => "Marzo", "septiembre" => "Septiembre"),array("disabled"=>"disabled"));?></span>
    <span class="span4"><?php echo $form->dropdownlistRow($model,'anio', array("2013" => "2013"),array("disabled"=>"disabled"));?></span>
 <div class="control-group">		
			<div class="span4">
			

<?php 
echo $form->textFieldRow($establecimiento,'nombre',array('class'=>'span5',"disabled"=>"disabled"));
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

  <div id="Secciones">
   <?php  echo $model->id_tipo_planilla; ?>
   
  </div>
 
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
</fieldset>
<?php $this->endWidget(); ?>
</div>



