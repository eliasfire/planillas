<style type="text/css">
.form .tableizer-table tr td {
	/*font-size: small;*/
}
.tableizer-table tr td {
	font-weight: bold;
}
.aa {
	color: #FFF;
}
.aa {
	color: #FFF;
}
</style>

<div class="form wide">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'planilla-form',
	'enableAjaxValidation'=>false,
	'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'
		)	
	)); ?>
<?php	
	$this->widget('bootstrap.widgets.TbAlert', array(
    'block'=>true, // display a larger alert block?
    'fade'=>true, // use transitions?
    'closeText'=>'×', // close link text - if set to false, no close link is displayed
    'alerts'=>array( // configurations per alert type
	    'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
    	'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'),
    ),
));?>


	
	<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Datos de la Planila',
	'headerIcon' => 'icon-th-list',
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>

<div id="yw116"><div class="alert in alert-block fade alert-error"><strong>Importante!</strong> Campos con <span class="required">*</span> son requeridos.</div></div>
<?php
     $this->widget('bootstrap.widgets.TbAlert'); 
	echo $form->errorSummary(array_merge(array($model),$validatedDetalles));
?>

<?php 
    $cs = Yii::app()->getClientScript();
	$cs->registerCoreScript('jquery');
	$cs->registerCoreScript('jquery.ui');
	$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/bootstrap/jquery-ui.css');?>	
	
	
<table class="linear" cellspacing="0" >
<?php
	
	$detalleFormConfig = array(
		  'elements'=>array(
		  	'nombre_taller'=>array(
		  		'type'=>'text',
		  	),
		  	'id_caracter_actividad'=>array(
		  		'type'=>'dropdownlist',
		  		'items'=>GxHtml::listDataEx(CaracterActividad::model()->findAll(),'id_caracter_actividad', 'descripcion'),
		  		'label'=>'Caracter de la Actividad',
		  		'prompt'=>'Seleccione',
		  		'class' => 'salaanio'
		  	),
		  	'id_turno'=>array(
		  		'type'=>'dropdownlist',
		  		'items'=>GxHtml::listDataEx(Turno::model()->findAll(),'id_turno', 'descripcion'),
		  		'prompt'=>'Seleccione',
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
		));

	$this->widget('ext.multimodelform.MultiModelForm',array(
			'id' => 'id_detalle', //the unique widget id
			'formConfig' => $detalleFormConfig, //the form configuration array
			'model' => $detallePlanilla, //instance of the form model
			'tableView' => true,
			'validatedItems' => $validatedDetalles,
			'bootstrapLayout' => true,
			'data' => empty($validatedItems) ? $detallePlanilla->findAll(
                                             array('condition'=>'id_planilla=:IdPlanilla',
                                                   'params'=>array(':IdPlanilla'=>$model->id_planilla),
                                                   )) : null,
            'showAddItemOnError' => true, //not allow add items when in validation error mode (default = true)
            'fieldsetWrapper' => array('tag' => 'div',
                'htmlOptions' => array('class' => 'view','style'=>'position:relative;background:#EFEFEF;')
            ),
            'removeLinkWrapper' => array('tag' => 'div',
                'htmlOptions' => array('style'=>'position:absolute; top:1em; right:1em;')
            ),

		));
?>
 
</table>

<?php $this->endWidget();?>

<style type="text/css">
table.tableizer-table {
	border: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;

} 
.tableizer-table td {
	padding: 4px;
	margin: 3px;
	border: 1px solid #ccc;
}
.tableizer-table th {
	/* background-color: #c3d9ff; 
	color: rgb(2, 2, 2);*/
	font-weight: bold;
}
</style>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Actividades Obligatorias / Optativas',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
	<div id="yw116">
	<div class="alert in alert-block fade alert-error">
	 <strong>Importante!</strong> 
	 Todos los campos con deben contener un valor. Completar con cero '0' si no hay valor en la planilla.
  	 </div>
	</div>
  <p>&nbsp;</p>
  <table align="center" class="tableizer-table">
    <tr class="tableizer-firstrow">
    <th>&nbsp;</th>
    <th bgcolor="#0066CC" class="aa">TOTAL</th>
    <th bgcolor="#0066CC" class="aa">Varones</th>
    <th bgcolor="#0066CC" class="aa">Mujeres</th>
  </tr>
  <tr>
    <td>TOTAL ALUMNOS(debe contar a cada alumna una sola vez)</td>
    <td><?php echo $form->textField($model,'tot_alu_act',array('class'=>'span1','readonly'=>'readonly','value'=>$model->tot_alu_act <> 0 ?  $model->tot_alu_act : 0 ));?></td>
    <td><?php echo $form->textField($model,'tot_act_var',array('class'=>'span1','readonly'=>'readonly','value'=>$model->tot_act_var <> 0 ?  $model->tot_act_var : 0 ));?></td>
    <td><?php echo $form->textField($model,'tot_act_muj',array('class'=>'span1','readonly'=>'readonly','value'=>$model->tot_act_muj <> 0 ?  $model->tot_act_muj : 0 ));?></td>
  </tr>
  <tr>
    <td>Alumnos con actividades obligatorias </td>
    <td><?php echo $form->textField($model,'alu_obl_tot',array('class'=>'span1','readonly'=>'readonly','value'=>$model->alu_obl_tot <> 0 ?  $model->alu_obl_tot : 0 ));?></td>
    <td bgcolor="#99FFCC"><?php echo $form->textField($model,'alu_obl_var',array('class'=>'span1','value'=>$model->alu_obl_var <> 0 ?  $model->alu_obl_var : 0 ));?></td>
    <td bgcolor="#99FFCC"><?php echo $form->textField($model,'alu_obl_muj',array('class'=>'span1','value'=>$model->alu_obl_muj <> 0 ?  $model->alu_obl_muj : 0 ));?></td>
  </tr>
  <tr>
    <td>Alumnos en actividades optativas/voluntarias</td>
    <td><?php echo $form->textField($model,'alu_opt_tot',array('class'=>'span1','readonly'=>'readonly','value'=>$model->alu_opt_tot <> 0 ?  $model->alu_opt_tot : 0 ));?></td>
    <td bgcolor="#99FFCC"><?php echo $form->textField($model,'alu_opt_var',array('class'=>'span1','value'=>$model->alu_opt_var <> 0 ?  $model->alu_opt_var : 0 ));?></td>
    <td bgcolor="#99FFCC"><?php echo $form->textField($model,'alu_opt_muj',array('class'=>'span1','value'=>$model->alu_opt_muj <> 0 ?  $model->alu_opt_muj : 0 ));?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>
  <?php $this->endWidget();?>
  
  <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Datos de ingreso',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
</p>
<div class="control-group">		
	<div class="span11">    
    <span class="span5"><?php echo $form->textFieldRow($model,'ingresador');?></span>
    <span class="span5"><?php /*echo $form->textFieldRow($responsable,'apellido',array("disabled"=>"disabled"));*/?></span>
   
    </div>   
</div>   
<?php $this->endWidget();?>

<div class="form-actions" style="text-align: center;">
 	
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

<script type="text/javascript">
$(document).on('ready',function(){
	$('#id_detalle').trigger("click");
	});
</script>

<script type="text/javascript">
$('input').keydown( function(e) {
    var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
    if(key == 13) {
        e.preventDefault();
        var inputs = $(this).closest('form').find(':input:visible');
        inputs.eq( inputs.index(this)+ 1 ).focus();
    }
});
</script>

<script>
function SumarGenero2(){
var a=$('#Planilla_alu_obl_var').val();
var b=$('#Planilla_alu_opt_var').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Planilla_tot_act_var').val(total);
}
$('#Planilla_alu_obl_var').keyup(SumarGenero2);
$('#Planilla_alu_opt_var').keyup(SumarGenero2);
</script>

<script>
function SumarGenero2(){
var a=$('#Planilla_alu_obl_muj').val();
var b=$('#Planilla_alu_opt_muj').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Planilla_tot_act_muj').val(total);
}
$('#Planilla_alu_obl_muj').keyup(SumarGenero2);
$('#Planilla_alu_opt_muj').keyup(SumarGenero2);
</script>

<script>
function SumarGenero2(){
var a=$('#Planilla_alu_obl_var').val();
var b=$('#Planilla_alu_obl_muj').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Planilla_alu_obl_tot').val(total);
}
$('#Planilla_alu_obl_var').keyup(SumarGenero2);
$('#Planilla_alu_obl_muj').keyup(SumarGenero2);
</script>

<script>
function SumarGenero2(){
var a=$('#Planilla_alu_opt_var').val();
var b=$('#Planilla_alu_opt_muj').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Planilla_alu_opt_tot').val(total);
}
$('#Planilla_alu_opt_var').keyup(SumarGenero2);
$('#Planilla_alu_opt_muj').keyup(SumarGenero2);
</script>

<script>
function SumarGenero2(){
var a=$('#Planilla_alu_obl_var').val();
var b=$('#Planilla_alu_obl_muj').val();
var c=$('#Planilla_alu_opt_var').val();
var d=$('#Planilla_alu_opt_muj').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
if(d==''){d=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c) + parseFloat(d);
$('#Planilla_tot_alu_act').val(total);
}
$('#Planilla_alu_obl_var').keyup(SumarGenero2);
$('#Planilla_alu_obl_muj').keyup(SumarGenero2);
$('#Planilla_alu_opt_var').keyup(SumarGenero2);
$('#Planilla_alu_opt_muj').keyup(SumarGenero2);
</script>