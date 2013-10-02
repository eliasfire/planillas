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
<h1>
    Planilla - Educación de Adultos Primaria<small><?php echo Yii::t('app', 'Update'); ?> #<?php echo $model->id_planilla ?></small></h1><hr/>


<div class="btn-toolbar">
    <div class="btn-group">
<?php  
		$this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t('app', 'Manage'),'type'=>'primary',
                        "icon"=>"icon-list-alt icon-white",
                        "url"=>array('/ingresador/admin')
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t('app', 'View'),'type'=>'success',
                        "icon"=>"icon-list icon-white",
                        "url"=>array("view","id"=>$model->{$model->tableSchema->primaryKey})
                    ));/*
                   $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t('app', 'Delete'),"type"=>"inverse",
                        "type"=>"danger",
                        "icon"=>"icon-remove icon-white",
                        "htmlOptions"=> array(
                            "submit"=>array("delete","id"=>$model->{$model->tableSchema->primaryKey}, "returnUrl"=>Yii::app()->request->getParam("returnUrl")),
                            "confirm"=>"¿Esta seguro que quiere eliminar esta planilla?")
                         )
                    );*/?>
	</div>
</div>

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
	
	<?php 		
Yii::app()->getClientScript()->registerScript('myscript','$(
		"#Planilla_tot_ind_alf").keyup(function(){
		
		  var total = parseInt($("#Planilla_alu_tot_ind").val());
		  var alf = parseInt($("#Planilla_tot_ind_alf").val());
		  var pri = parseInt($("#Planilla_tot_ind_pri").val());
		  var sec = parseInt($("#Planilla_tot_ind_sec").val());
		  var pol = parseInt($("#Planilla_tot_ind_pol").val());
		  
		  if (total != alf+pri+sec+pol){
		    $("#Planilla_alu_tot_ind").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_ind").css("background-color", "#7FFFD4");
		  }
		
		  var total1 = parseInt($("#Planilla_alu_tot_alf").val());
		  var alf1 = parseInt($("#Planilla_tot_ind_alf").val());
		  var pri1 = parseInt($("#Planilla_tot_mul_alf").val());
		  
		  if (total1 != alf1+pri1){
		    $("#Planilla_alu_tot_alf").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_alf").css("background-color", "#7FFFD4");
		  }
		});');
Yii::app()->getClientScript()->registerScript('myscript2','$(
		"#Planilla_tot_ind_pri").keyup(function(){
		
		  var total = parseInt($("#Planilla_alu_tot_ind").val());
		  var alf = parseInt($("#Planilla_tot_ind_alf").val());
		  var pri = parseInt($("#Planilla_tot_ind_pri").val());
		  var sec = parseInt($("#Planilla_tot_ind_sec").val());
		  var pol = parseInt($("#Planilla_tot_ind_pol").val());
		  
		  if (total != alf+pri+sec+pol){
		    $("#Planilla_alu_tot_ind").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_ind").css("background-color", "#7FFFD4");
		  }
		
		  var total1 = parseInt($("#Planilla_alu_tot_pri").val());
		  var alf1 = parseInt($("#Planilla_tot_ind_pri").val());
		  var pri1 = parseInt($("#Planilla_tot_mul_pri").val());
		  
		  if (total1 != alf1+pri1){
		    $("#Planilla_alu_tot_pri").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_pri").css("background-color", "#7FFFD4");
		  }
		});');
Yii::app()->getClientScript()->registerScript('myscript3','$(
		"#Planilla_tot_ind_sec").keyup(function(){
		
		  var total = parseInt($("#Planilla_alu_tot_ind").val());
		  var alf = parseInt($("#Planilla_tot_ind_alf").val());
		  var pri = parseInt($("#Planilla_tot_ind_pri").val());
		  var sec = parseInt($("#Planilla_tot_ind_sec").val());
		  var pol = parseInt($("#Planilla_tot_ind_pol").val());
		  
		  if (total != alf+pri+sec+pol){
		    $("#Planilla_alu_tot_ind").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_ind").css("background-color", "#7FFFD4");
		  }
		
		
		  var total1 = parseInt($("#Planilla_alu_tot_sec").val());
		  var alf1 = parseInt($("#Planilla_tot_ind_sec").val());
		  var pri1 = parseInt($("#Planilla_tot_mul_sec").val());
		  
		  if (total1 != alf1+pri1){
		    $("#Planilla_alu_tot_sec").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_sec").css("background-color", "#7FFFD4");
		  }
		});
		
		
		');
Yii::app()->getClientScript()->registerScript('myscript3','$(
		"#Planilla_tot_ind_pol").keyup(function(){

		var total = parseInt($("#Planilla_alu_tot_ind").val());
		var alf = parseInt($("#Planilla_tot_ind_alf").val());
		var pri = parseInt($("#Planilla_tot_ind_pri").val());
		var sec = parseInt($("#Planilla_tot_ind_sec").val());
		var pol = parseInt($("#Planilla_tot_ind_pol").val());

		if (total != alf+pri+sec+pol){
		$("#Planilla_alu_tot_ind").css("background-color", "#E9967A");
}  else {
		$("#Planilla_alu_tot_ind").css("background-color", "#7FFFD4");
}


		var total1 = parseInt($("#Planilla_alu_tot_pol").val());
		var alf1 = parseInt($("#Planilla_tot_ind_pol").val());
		var pri1 = parseInt($("#Planilla_tot_mul_pol").val());

		if (total1 != alf1+pri1){
		$("#Planilla_alu_tot_pol").css("background-color", "#E9967A");
}  else {
		$("#Planilla_alu_tot_pol").css("background-color", "#7FFFD4");
}
});


		');

Yii::app()->getClientScript()->registerScript('myscript4','$(
		"#Planilla_tot_mul_alf").keyup(function(){
		
		  var total = parseInt($("#Planilla_alu_tot_mul").val());
		  var alf = parseInt($("#Planilla_tot_mul_alf").val());
		  var pri = parseInt($("#Planilla_tot_mul_pri").val());
		  var sec = parseInt($("#Planilla_tot_mul_sec").val());
		  var pol = parseInt($("#Planilla_tot_mul_pol").val());
				  
		  if (total != alf+pri+sec+pol){
		    $("#Planilla_alu_tot_mul").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_mul").css("background-color", "#7FFFD4");
		  }
		});');
Yii::app()->getClientScript()->registerScript('myscript25','$(
		"#Planilla_tot_mul_pri").keyup(function(){
		
		  var total = parseInt($("#Planilla_alu_tot_mul").val());
		  var alf = parseInt($("#Planilla_tot_mul_alf").val());
		  var pri = parseInt($("#Planilla_tot_mul_pri").val());
		  var sec = parseInt($("#Planilla_tot_mul_sec").val());
		  var pol = parseInt($("#Planilla_tot_mul_pol").val());
				  
		  if (total != alf+pri+sec+pol){
		    $("#Planilla_alu_tot_mul").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_mul").css("background-color", "#7FFFD4");
		  }
		
		  var total1 = parseInt($("#Planilla_alu_tot_pri").val());
		  var alf1 = parseInt($("#Planilla_tot_ind_pri").val());
		  var pri1 = parseInt($("#Planilla_tot_mul_pri").val());
		  
		  if (total1 != alf1+pri1){
		    $("#Planilla_alu_tot_pri").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_pri").css("background-color", "#7FFFD4");
		  }
		});');
Yii::app()->getClientScript()->registerScript('myscript393','$(
		"#Planilla_tot_mul_sec").keyup(function(){
		
		  var total = parseInt($("#Planilla_alu_tot_mul").val());
		  var alf = parseInt($("#Planilla_tot_mul_alf").val());
		  var pri = parseInt($("#Planilla_tot_mul_pri").val());
		  var sec = parseInt($("#Planilla_tot_mul_sec").val());
		  var pol = parseInt($("#Planilla_tot_mul_pol").val());
				  
		  if (total != alf+pri+sec+pol){
		    $("#Planilla_alu_tot_mul").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_mul").css("background-color", "#7FFFD4");
		  }
		
		  var total1 = parseInt($("#Planilla_alu_tot_sec").val());
		  var alf1 = parseInt($("#Planilla_tot_ind_sec").val());
		  var pri1 = parseInt($("#Planilla_tot_mul_sec").val());
		  
		  if (total1 != alf1+pri1){
		    $("#Planilla_alu_tot_sec").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_sec").css("background-color", "#7FFFD4");
		  }
		});
		');
Yii::app()->getClientScript()->registerScript('myscript39','$(
		"#Planilla_tot_mul_pol").keyup(function(){

		var total = parseInt($("#Planilla_alu_tot_mul").val());
		var alf = parseInt($("#Planilla_tot_mul_alf").val());
		var pri = parseInt($("#Planilla_tot_mul_pri").val());
		var sec = parseInt($("#Planilla_tot_mul_sec").val());
		var pol = parseInt($("#Planilla_tot_mul_pol").val());

		if (total != alf+pri+sec+pol){
		$("#Planilla_alu_tot_mul").css("background-color", "#E9967A");
}  else {
		$("#Planilla_alu_tot_mul").css("background-color", "#7FFFD4");
}

		var total1 = parseInt($("#Planilla_alu_tot_pol").val());
		var alf1 = parseInt($("#Planilla_tot_ind_pol").val());
		var pri1 = parseInt($("#Planilla_tot_mul_pol").val());

		if (total1 != alf1+pri1){
		$("#Planilla_alu_tot_pol").css("background-color", "#E9967A");
}  else {
		$("#Planilla_alu_tot_pol").css("background-color", "#7FFFD4");
}
});
		');
Yii::app()->getClientScript()->registerScript('myscript28','$(
		"#Planilla_alu_tot_ind").keyup(function(){
		
		  var total = parseInt($("#Planilla_alu_tot_ind").val());
		  var alf = parseInt($("#Planilla_tot_ind_sec").val());
		  var pri = parseInt($("#Planilla_tot_ind_pri").val());
		  var sec = parseInt($("#Planilla_tot_ind_alf").val());
		  var pol = parseInt($("#Planilla_tot_ind_pol").val());
		  
		  if (total != alf+pri+sec+pol){
		    $("#Planilla_alu_tot_ind").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_ind").css("background-color", "#7FFFD4");
		  }
		
		  var total1 = parseInt($("#Planilla_alu_mul_ind").val());
		  var ind1 = parseInt($("#Planilla_alu_tot_ind").val());
		  var mul1 = parseInt($("#Planilla_alu_tot_mul").val());
	  
		  if (total1 != ind1+mul1){
		    $("#Planilla_alu_mul_ind").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_mul_ind").css("background-color", "#7FFFD4");
		  }
		});');
Yii::app()->getClientScript()->registerScript('myscript38','$(
		"#Planilla_alu_tot_mul").keyup(function(){
		
	      var total = parseInt($("#Planilla_alu_tot_mul").val());
		  var alf = parseInt($("#Planilla_tot_mul_sec").val());
		  var pri = parseInt($("#Planilla_tot_mul_pri").val());
		  var sec = parseInt($("#Planilla_tot_mul_alf").val());
		  var pol = parseInt($("#Planilla_tot_mul_pol").val());
		  
		  if (total != alf+pri+sec+pol){
		    $("#Planilla_alu_tot_mul").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_mul").css("background-color", "#7FFFD4");
		  }
		
		  var total2 = parseInt($("#Planilla_alu_mul_ind").val());
		  var ind2 = parseInt($("#Planilla_alu_tot_ind").val());
		  var mul2 = parseInt($("#Planilla_alu_tot_mul").val());
		  
		  if (total2 != ind2+mul2){
		    $("#Planilla_alu_mul_ind").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_mul_ind").css("background-color", "#7FFFD4");
		  }
		});');
Yii::app()->getClientScript()->registerScript('myscript37','$(
		"#Planilla_alu_mul_ind").keyup(function(){
		
		  var total = parseInt($("#Planilla_alu_mul_ind").val());
		  var ind = parseInt($("#Planilla_alu_tot_ind").val());
		  var mul = parseInt($("#Planilla_alu_tot_mul").val());
		  
		  if (total != ind+mul){
		    $("#Planilla_alu_mul_ind").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_mul_ind").css("background-color", "#7FFFD4");
		  }
		});');
Yii::app()->getClientScript()->registerScript('myscript21','$(
		"#Planilla_tot_ind_alf").keyup(function(){
		
		  var total = parseInt($("#Planilla_alu_tot_alf").val());
		  var ind = parseInt($("#Planilla_tot_ind_alf").val());
		  var mul = parseInt($("#Planilla_tot_mul_alf").val());
	  
		  if (total != ind+mul){
		    $("#Planilla_alu_tot_alf").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_alf").css("background-color", "#7FFFD4");
		  }
		});');
Yii::app()->getClientScript()->registerScript('myscript32','$(
		"#Planilla_tot_mul_alf").keyup(function(){
		
		  var total = parseInt($("#Planilla_alu_tot_alf").val());
		  var ind = parseInt($("#Planilla_tot_ind_alf").val());
		  var mul = parseInt($("#Planilla_tot_mul_alf").val());
		  
		  if (total != ind+mul){
		    $("#Planilla_alu_tot_alf").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_alf").css("background-color", "#7FFFD4");
		  }
		});');
Yii::app()->getClientScript()->registerScript('myscript33','$(
		"#Planilla_alu_tot_alf").keyup(function(){
		
		  var total = parseInt($("#Planilla_alu_tot_alf").val());
		  var ind = parseInt($("#Planilla_tot_ind_alf").val());
		  var mul = parseInt($("#Planilla_tot_mul_alf").val());
		  
		  if (total != ind+mul){
		    $("#Planilla_alu_tot_alf").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_alf").css("background-color", "#7FFFD4");
		  }
		});');
Yii::app()->getClientScript()->registerScript('myscript40','$(
		"#Planilla_alu_tot_pri").keyup(function(){
		
		  var total = parseInt($("#Planilla_alu_tot_pri").val());
		  var ind = parseInt($("#Planilla_tot_ind_pri").val());
		  var mul = parseInt($("#Planilla_tot_mul_pri").val());
		  
		  if (total != ind+mul){
		    $("#Planilla_alu_tot_pri").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_pri").css("background-color", "#7FFFD4");
		  }
		});');
Yii::app()->getClientScript()->registerScript('myscript412','$(
		"#Planilla_alu_tot_sec").keyup(function(){
		
		  var total = parseInt($("#Planilla_alu_tot_sec").val());
		  var ind = parseInt($("#Planilla_tot_ind_sec").val());
		  var mul = parseInt($("#Planilla_tot_mul_sec").val());
		  
		  if (total != ind+mul){
		    $("#Planilla_alu_tot_sec").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_sec").css("background-color", "#7FFFD4");
		  }
		});');
Yii::app()->getClientScript()->registerScript('myscript41','$(
		"#Planilla_alu_tot_pol").keyup(function(){
		
		  var total = parseInt($("#Planilla_alu_tot_pol").val());
		  var ind = parseInt($("#Planilla_tot_ind_pol").val());
		  var mul = parseInt($("#Planilla_tot_mul_pol").val());
		  
		  if (total != ind+mul){
		    $("#Planilla_alu_tot_pol").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_tot_pol").css("background-color", "#7FFFD4");
		  }
		});');?>	
		
		
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
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel2',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion2").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel3',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion3").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel4',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion4").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel5',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion5").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel6',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion6").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel7',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion7").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel8',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion8").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel9',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion9").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel10',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion10").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel11',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion11").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel12',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion12").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel13',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion13").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel14',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion14").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel15',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion15").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel16',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion16").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel17',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion17").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel18',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion18").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel19',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion19").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel20',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion20").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel21',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion21").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel22',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion22").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel23',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion23").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel24',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion24").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel25',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion25").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel26',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion26").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel27',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion27").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel28',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion28").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel29',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion29").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel30',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion30").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel31',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion31").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel32',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion32").html(html)}});
    return false;});
	}); 
   </script>   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel33',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion33").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel34',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion34").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel35',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion35").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel36',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion36").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel37',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion37").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel38',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion38").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel39',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion39").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel40',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion40").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel41',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion41").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel42',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion42").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel43',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion43").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel44',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion44").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel45',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion45").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel46',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion46").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel47',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion47").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel48',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion48").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel49',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion49.html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel50',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectorientacion', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_orientacion50").html(html)}});
    return false;});
	}); 
   </script>
	    
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Encabezado de la Planila',
	'headerIcon' => 'icon-home',
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>   
 <div class="control-group">		
	<div class="span11">    
    <?php // echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span10')); ?>
    
    <span class="span5"><?php echo $form->textFieldRow($model,'mes',array("disabled"=>"disabled"));?></span>
    <span class="span4"><?php echo $form->textFieldRow($model,'anio',array("disabled"=>"disabled","label"=>"Año"));?></span>
    <span class="span5"><?php echo $form->textFieldRow($establecimiento,'nombre',array('class'=>'span4',"disabled"=>"disabled"));?></span>
    <span class="span4"><?php echo $form->textFieldRow($establecimiento,'cue',array('class'=>'span1',"disabled"=>"disabled"));?></span>
    <span class="span5"><?php echo $form->textFieldRow($localizacion,'nombre',array('class'=>'span4',"disabled"=>"disabled"));?></span>
    <span class="span4"><?php echo $form->textFieldRow($localizacion,'anexo',array('class'=>'span1',"disabled"=>"disabled"));?></span>
 
     </div>   
 </div>   
 <?php $this->endWidget();?>  
  <?php $this->endWidget(); ?>
</div>
       
<?php echo $this->renderPartial('_form', array(
		    'model'=>$model,
			'detallePlanilla'=>$detallePlanilla,
			'validatedDetalles' => $validatedDetalles,
			'establecimiento' => $establecimiento,
		    'responsable'=>	$responsable)); ?>