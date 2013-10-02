<style type="text/css">
.form .tableizer-table tr td {
	/*font-size: small;*/
}
.tableizer-table tr td {
	font-weight: bold;
}
.form.wide .tableizer-table tr td {
	color: #000;
}
.form.wide .tableizer-table tr {
	color: #000;
}
.ww {
	color: #000;
}
.form.wide .tableizer-table tr .ww {
	color: #000;
}
.ee {
	color: #FFF;
}
.qq {
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
		  	'id_nivel'=>array(
		  		'type'=>'dropdownlist',
		  		'items'=>GxHtml::listDataEx(NivelServicio::model()->findAll(array('condition'=>"t.id_nivel = 1 or t.id_nivel = 2")),'id_nivel','descripcion'),
		  		'prompt'=>'Seleccione',
		  		'class' => 'miselect2'
		  	),
		  	'id_sala_ciclo_anio'=>array(
		  		'type'=>'dropdownlist',
		  		'items'=>GxHtml::listDataEx(SalaCicloAnio::model()->findAll(array('order'=>'id_sala_ciclo_anio','condition'=>"t.id_sala_ciclo_anio = 1 or t.id_sala_ciclo_anio = 2 or t.id_sala_ciclo_anio = 3 or t.id_sala_ciclo_anio = 4 or t.id_sala_ciclo_anio = 5 or t.id_sala_ciclo_anio = 6")),'id_sala_ciclo_anio', 'descripcion'),
		  		'label'=>'Año',
		  		'prompt'=>'Seleccione',
		  		'class' => 'miselect2'
		  	),
		  	'id_turno'=>array(
		  		'type'=>'dropdownlist',
		  		'items'=>GxHtml::listDataEx(Turno::model()->findAll(),'id_turno', 'descripcion'),
		  		'prompt'=>'Seleccione',
		  		'class' => 'miselect2'
		  	),
		  	'nombre_seccion'=>array(
		  		'type'=>'text',
		  		'class' => 'miinput2'
		  	),
		  	'id_seccion'=>array(
		  		'type'=>'dropdownlist',
		  		'label'=>'Tipo Seccion',
		  		'items'=>GxHtml::listDataEx(Seccion::model()->findAll(array('order'=>'id_seccion','condition'=>"t.id_seccion = 1 or t.id_seccion = 2 or t.id_seccion = 3 or t.id_seccion = 4 or t.id_seccion = 5")),'id_seccion', 'descripcion'),
		  		'prompt'=>'Seleccione',
		  		'class' => 'miselect2'
		  	),
            'alu_mat_tot'=>array(
				'type'=>'text',
				'label'=>'Total Mat',
            	'class' => 'miinput'
			),
		  	'alu_mat_var'=>array(
		  		'type'=>'text',
		  		'label'=>'Var Mat',
		  		'class' => 'miinput'
		  	),
		  	'nec_esp_edu'=>array(
		  		'type'=>'text',
		  		'label'=>'Nec. Esp.',
		  		'class' => 'miinput'
		  	),
		  	'alu_med_tot'=>array(
		  		'type'=>'text',
		  		'label'=>'Total Asis Media',
		  		'class' => 'miinput'
		  	),
		  	'alu_med_var'=>array(
		  		'type'=>'text',
		  		'label'=>'Var Asis Media',
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
												   'order'=>'id_nivel,id_sala_ciclo_anio,id_turno asc',
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

 <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Cantidad de Secciones/Divisiones',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
 
 <div id="yw116">
	<div class="alert in alert-block fade alert-error">
	 <strong>Importante!</strong> 
	 Todos los campos con deben contener un valor. Completar con cero '0' si no hay valor en la planilla.
    </div>
  </div>
	
 <style type="text/css">
table.tableizer-table {
	border: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
} 
.tableizer-table td {
	padding: 4px;
	margin: 3px;
	border: 1px solid #ccc;
}
.tableizer-table th {
	background-color: #104E8B; 
	color: #FFF;
	font-weight: bold;
}
</style>

	<table align="left" class="tableizer-table">
		<tr>
			<td bgcolor="#0066CC"><span class="qq"><span class="blanco">TOTAL INDEPENDIENTES</span></span></td>
			<td bgcolor="#0066CC" class="blanco"><span class="qq">TOTAL</span></td>
		</tr>
		<tr>
		  <td class="ww">de Jardin Maternal</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_ind_jam',array('class'=>'span1','value'=>$model->tot_ind_jam <> 0 ?  $model->tot_ind_jam : 0));?></td>
		</tr>
		<tr>
		  <td class="ww">de Jardin de Infantes</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_ind_jif',array('class'=>'span1','value'=>$model->tot_ind_jif <> 0 ?  $model->tot_ind_jif : 0));?></td>
		</tr>
	</table>
  <table align="center" class="tableizer-table">
	  <tr>
	    <td bgcolor="#0066CC"><span class="qq"><span class="blanco">TOTAL MULTIPLES</span></span></td>
	    <td bgcolor="#0066CC" class="blanco"><span class="qq">TOTAL</span></td>
      </tr>
	  <tr>
	    <td class="ww"> alumnos de de Jardin Maternal exclusivamente</td>
	    <td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_mul_jmx',array('class'=>'span1','value'=>$model->tot_mul_jmx <> 0 ?  $model->tot_mul_jmx : 0));?></td>
      </tr>
	  <tr>
	    <td class="ww"> alumnos de Jardin de Infantes exclusivamente</td>
	    <td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_mul_jix',array('class'=>'span1','value'=>$model->tot_alm_ben <> 0 ?  $model->tot_mul_jix : 0));?></td>
      </tr>
	  <tr>
	    <td class="ww">alumnos de Jardin de Infantes y Jardin Maternal</td>
	    <td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_mul_imx',array('class'=>'span1','value'=>$model->tot_mul_imx <> 0 ?  $model->tot_mul_imx : 0));?></td>
      </tr>
  </table>
	<p>&nbsp;</p>
	<table align="left" class="tableizer-table">
	  <tr>
	    <td width="255" bgcolor="#0066CC"><span class="qq"><span class="blanco">TOTAL DE SECCIONES/DIVISIONES</span></span></td>
	    <td width="50" bgcolor="#FFFFFF" class="blanco"><?php echo $form->textField($model,'tot_sec_div',array('class'=>'span1','readonly'=>'readonly','value'=>$model->tot_alm_ben <> 0 ?  $model->tot_alm_ben : 0));?></td>
      </tr>
  </table>
	<p>&nbsp;</p>
	<p>
	  <?php $this->endWidget(); ?>
  </p>
  
		
  <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Cantidad de Beneficiarios de Servicios de Alimentacion',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
  </p>
  <div id="yw116">
	<div class="alert in alert-block fade alert-error">
	 <strong>Importante!</strong> 
	 Todos los campos con deben contener un valor. Completar con cero '0' si no hay valor en la planilla.
    </div>
  </div>
	
 <style type="text/css">
table.tableizer-table {
	border: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
} 
.tableizer-table td {
	padding: 4px;
	margin: 3px;
	border: 1px solid #ccc;
}
.tableizer-table th {
	background-color: #104E8B; 
	color: #FFF;
	font-weight: bold;
}
</style>

	<table align="center" class="tableizer-table">
		<tr>
			<td width="254" bgcolor="#0066CC"><span class="qq">CANTIDAD DE BENEFICIARIOS DE SERVICIOS DE ALIMENTACION</span></td>
			<td width="48" bgcolor="#0066CC" class="blanco"><span class="qq">TOTAL</span></td>
		</tr>
		<tr>
			<td>ALMUERZO</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_alm_ben',array('class'=>'span1','value'=>$model->tot_alm_ben <> 0 ?  $model->tot_alm_ben : 0 ));?></td>
		</tr>
		<tr>
			<td>COPA DE LECHE: Turno Mañana</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_cop_man',array('class'=>'span1','value'=>$model->tot_cop_man <> 0 ?  $model->tot_cop_man : 0 ));?></td>
		</tr>
		<tr>
			<td>COPA DE LECHE: Turno Tarde</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_cop_tar',array('class'=>'span1','value'=>$model->tot_cop_tar <> 0 ?  $model->tot_cop_tar : 0 ));?></td>
		</tr>
		<tr>
			<td>Refrigerio / Merienda Reforzada - Turno Mañana</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_ref_man',array('class'=>'span1','value'=>$model->tot_ref_man <> 0 ?  $model->tot_ref_man : 0 ));?></td>
		</tr>
		<tr>
		  <td>Refrigerio / Merienda Reforzada - Turno Tarde</td>
		  <td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_ref_tar',array('class'=>'span1','value'=>$model->tot_ref_tar <> 0 ?  $model->tot_ref_tar : 0 ));?></td>
	  </tr>
		<tr>
		  <td>Otros Servicios Alimentario (especificar)</td>
		  <td bgcolor="#99FFCC"><?php echo $form->textField($model,'otr_ser_ali',array('class'=>'span1','value'=>$model->otr_ser_ali <> 0 ?  $model->otr_ser_ali : 0 ));?></td>
	  </tr>
		<tr>
		  <td bgcolor="#99FFCC"><?php echo $form->textField($model,'ser_ali_esp',array('class'=>'span4','value'=>$model->ser_ali_esp <> "" ?  $model->ser_ali_esp : ""));?></td>
		  <td bgcolor="#99FFCC">&nbsp;</td>
	  </tr>
	</table>


	<?php $this->endWidget(); ?>	
  
	
	<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Datos de la localizacion',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
  </p>
  <div class="control-group">		
	<div class="span11">    
    <span class="span5"><?php /*echo $form->textFieldRow($model,'dom_act');?></span>
    <span class="span5"><?php echo $form->textFieldRow($responsable,'telefono',array("disabled"=>"disabled"));*/?></span>
   
    </div>   
</div>   

<style type="text/css">
table.tableizer-table {
	border: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
} 
.tableizer-table td {
	padding: 4px;
	margin: 3px;
	border: 1px solid #ccc;
}
.tableizer-table th {
	background-color: #104E8B; 
	color: #FFF;
	font-weight: bold;
}
</style>

	<table border="0" align="center" class="tableizer-table">
		<tr>
			<td width="145" bgcolor="#0066CC" class="ee"><span class="qq">Domicilio</span> <span class="qq">Actualizado:</span></td>
			<td width="375" bgcolor="#99FFCC"><?php echo $form->textField($model,'dom_act',array('class'=>'span4'));?></td>
	  </tr>
		<tr>
			<td bgcolor="#0066CC"><span class="ee">Teléfono/s:</span></td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'telefono',array('class'=>'span2'));?>
			</td>
	  </tr>
	</table>

	<p>
	  <?php $this->endWidget();?>
	  
	
	
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Datos de ingreso',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
 <div class="control-group">		
	<div class="span11">    
    <span class="span5"><?php echo $form->textFieldRow($model,'ingresador');?></span>
    <span class="span5"><?php echo $form->textFieldRow($responsable,'apellido',array("disabled"=>"disabled"));?></span>
   
    </div>   
</div>   
<?php $this->endWidget();?>

<div class="form-actions" style="text-align: center;">
 	
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			 'icon'=>'ok white', 
			'label'=>$model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'),
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset',
             'icon'=>'remove',  
			'label'=> Yii::t('app', 'Reset'),
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'link',
            'url'=>array('/ingresador/admin'),
            'icon'=>'remove-sign',  
			'label'=> Yii::t('app', 'Cancel'),
		)); ?>
  </div>
<?php $this->endWidget(); ?>
</div>

<script>
function sumar2(e){  
var a =$('#Planilla_tot_ind_jam').val();
var b =$('#Planilla_tot_ind_jif').val();
var c =$('#Planilla_tot_mul_jmx').val();
var d =$('#Planilla_tot_mul_jix').val();
var f =$('#Planilla_tot_mul_imx').val();


if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
if(d==''){d=0;}
if(f==''){f=0;}


var total=parseFloat(a) + parseFloat(b) + parseFloat(c)+ parseFloat(d)+ parseFloat(f);
$('#Planilla_tot_sec_div').val(total);
}
$('#Planilla_tot_ind_jam').keyup(sumar2);
$('#Planilla_tot_ind_jif').keyup(sumar2);
$('#Planilla_tot_mul_jmx').keyup(sumar2);
$('#Planilla_tot_mul_jix').keyup(sumar2);
$('#Planilla_tot_mul_imx').keyup(sumar2);
</script>

