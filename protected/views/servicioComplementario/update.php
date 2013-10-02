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
    Planilla - Servicio Complementario <small><?php echo Yii::t('app', 'Update'); ?> #<?php echo $model->id_planilla ?></small></h1><hr/>


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
		"#Planilla_tot_act_muj").keyup(function(){
		
		  var total = parseInt($("#Planilla_tot_alu_act").val());
		  var hom = parseInt($("#Planilla_tot_act_var").val());
		  var muj = parseInt($("#Planilla_tot_act_muj").val());
	
		  if (total != hom+muj){
		    $("#Planilla_tot_alu_act").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_tot_alu_act").css("background-color", "#7FFFD4");
		  }
		});');
Yii::app()->getClientScript()->registerScript('myscript2','$(
		"#Planilla_tot_act_var").keyup(function(){
		
		  var total1 = parseInt($("#Planilla_tot_alu_act").val());
		  var alf1 = parseInt($("#Planilla_tot_act_var").val());
		  var pri1 = parseInt($("#Planilla_tot_act_muj").val());
		  
		  if (total1 != alf1+pri1){
		    $("#Planilla_tot_alu_act").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_tot_alu_act").css("background-color", "#7FFFD4");
		  }
		});');
Yii::app()->getClientScript()->registerScript('myscript4','$(
		"#Planilla_tot_alu_act").keyup(function(){

		var total = parseInt($("#Planilla_tot_alu_act").val());
		var hom = parseInt($("#Planilla_tot_act_var").val());
		var muj = parseInt($("#Planilla_tot_act_muj").val());

		if (total != hom+muj){
		$("#Planilla_tot_alu_act").css("background-color", "#E9967A");
}  else {
		$("#Planilla_tot_alu_act").css("background-color", "#7FFFD4");
}
});');
Yii::app()->getClientScript()->registerScript('myscript3','$(
		"#Planilla_alu_obl_muj").keyup(function(){

		var total1 = parseInt($("#Planilla_alu_obl_tot").val());
		var alf1 = parseInt($("#Planilla_alu_obl_var").val());
		var pri1 = parseInt($("#Planilla_alu_obl_muj").val());

		if (total1 != alf1+pri1){
		$("#Planilla_alu_obl_tot").css("background-color", "#E9967A");
}  else {
		$("#Planilla_alu_obl_tot").css("background-color", "#7FFFD4");
}
});
		');

Yii::app()->getClientScript()->registerScript('myscript25','$(
		"#Planilla_alu_obl_var").keyup(function(){
		
		  var total1 = parseInt($("#Planilla_alu_obl_tot").val());
		  var alf1 = parseInt($("#Planilla_alu_obl_var").val());
		  var pri1 = parseInt($("#Planilla_alu_obl_muj").val());
		  
		  if (total1 != alf1+pri1){
		    $("#Planilla_alu_obl_tot").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_obl_tot").css("background-color", "#7FFFD4");
		  }
		});');
Yii::app()->getClientScript()->registerScript('myscript393','$(
		"#Planilla_alu_obl_tot").keyup(function(){
		
		  var total1 = parseInt($("#Planilla_alu_obl_tot").val());
		  var alf1 = parseInt($("#Planilla_alu_obl_var").val());
		  var pri1 = parseInt($("#Planilla_alu_obl_muj").val());
		  
		  if (total1 != alf1+pri1){
		    $("#Planilla_alu_obl_tot").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_obl_tot").css("background-color", "#7FFFD4");
		  }
		});
		');
Yii::app()->getClientScript()->registerScript('myscript39','$(
		"#Planilla_alu_opt_muj").keyup(function(){

		var total1 = parseInt($("#Planilla_alu_opt_tot").val());
		var alf1 = parseInt($("#Planilla_alu_opt_var").val());
		var pri1 = parseInt($("#Planilla_alu_opt_muj").val());

		if (total1 != alf1+pri1){
		$("#Planilla_alu_opt_tot").css("background-color", "#E9967A");
}  else {
		$("#Planilla_alu_opt_tot").css("background-color", "#7FFFD4");
}
});
		');
Yii::app()->getClientScript()->registerScript('myscript28','$(
		"#Planilla_alu_opt_var").keyup(function(){
		
		  var total1 = parseInt($("#Planilla_alu_opt_tot").val());
		  var ind1 = parseInt($("#Planilla_alu_opt_muj").val());
		  var mul1 = parseInt($("#Planilla_alu_opt_var").val());
	  
		  if (total1 != ind1+mul1){
		    $("#Planilla_alu_opt_tot").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_opt_tot").css("background-color", "#7FFFD4");
		  }
		});');
Yii::app()->getClientScript()->registerScript('myscript38','$(
		"#Planilla_alu_opt_tot").keyup(function(){
		
		  var total2 = parseInt($("#Planilla_alu_opt_tot").val());
		  var ind2 = parseInt($("#Planilla_alu_opt_muj").val());
		  var mul2 = parseInt($("#Planilla_alu_opt_var").val());
		  
		  if (total2 != ind2+mul2){
		    $("#Planilla_alu_opt_tot").css("background-color", "#E9967A");
		  }  else {
		    $("#Planilla_alu_opt_tot").css("background-color", "#7FFFD4");
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
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel2',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio2").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel3',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio3").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel4',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio4").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel5',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio5").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel6',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio6").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel7',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio7").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel8',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio8").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel9',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio9").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel10',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio10").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel11',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio11").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel12',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio12").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel13',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio13").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel14',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio14").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel15',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio15").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel16',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio16").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel17',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio17").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel18',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio18").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel19',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio19").html(html)}});
    return false;});
	}); 
   </script>
   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel20',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio20").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel21',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio21").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel22',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio22").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel23',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio23").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel24',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio24").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel25',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio25").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel26',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio26").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel27',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio27").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel28',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio28").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel29',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio29").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel30',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio30").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel31',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio31").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel32',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio32").html(html)}});
    return false;});
	}); 
   </script>   <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel33',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio33").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel34',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio34").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel35',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio35").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel36',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio36").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel37',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio37").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel38',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio38").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel39',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio39").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel40',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio40").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel41',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio41").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel42',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio42").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel43',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio43").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel44',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio44").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel45',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio45").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel46',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio46").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel47',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio47").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel48',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio48").html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel49',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio49.html(html)}});
    return false;});
	}); 
   </script>
      <script 
    type="text/javascript">
	jQuery(function($) {	jQuery('body').on('change','#Adulto_id_nivel50',
	function(){jQuery.ajax({ 'type':'POST', 'url':'/planillas/Planilla/Selectnivel', 'cache':false, 'data': {id: $(this).attr('value')}, 
		'success':function(html){jQuery("#Adulto_id_sala_ciclo_anio50").html(html)}});
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