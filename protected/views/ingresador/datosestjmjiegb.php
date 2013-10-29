<?php echo $this->renderPartial('/ingresador/_datosglobales'); ?>

<div class="btn-toolbar" style="text-align: right;">
	<div class="btn-group">
		<?php  
		$this->widget("bootstrap.widgets.TbButton", array(
      		"label"=>Yii::t('app', 'Exportar a PDF'),'type' => 'danger',
     		'type' => 'danger',
       		"icon"=>"icon-print icon-white",
       		"url"=>array("imprimirEstablecimiento")
        ));
?>

	</div>
</div>

<style type="text/css">
.form .tableizer-table tr td {
	/*font-size: small;*/
}
.tableizer-table tr td {
	font-weight: bold;
}
.segundo {
	font-weight: normal;
}
.form.wide .tableizer-table {
	text-align: right;
}
.form.wide .tableizer-table .tableizer-firstrow th {
	text-align: center;
	color: #FFF;
}
.blanco {
	color: #FFF;
	text-align: center;
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
	
	<?php /*$box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Encabezado de la Planila',
	'headerIcon' => 'icon-home',
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>   
 <div class="control-group">		
	<div class="span11">    
    <?php // echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span10')); ?>
    
    <span class="span5"><?php // echo $form->dropdownlistRow($model,'tot_dic_cla', array("marzo" => "Marzo", "septiembre" => "Septiembre"),array('readonly'=>'readonly'));?></span>
    <span class="span4"><?php //echo $form->dropdownlistRow($model,'tot_dic_cla', array("2013" => "2013"),array('readonly'=>'readonly',"label"=>"Año"));?></span>
    <span class="span5"><?php echo $form->textFieldRow($establecimiento,'nombre',array('class'=>'span4','readonly'=>'readonly'));?></span>
    <span class="span4"><?php echo $form->textFieldRow($establecimiento,'cue',array('class'=>'span1','readonly'=>'readonly'));?></span>
    <span class="span5"><?php echo $form->textFieldRow($localizacion,'nombre',array('class'=>'span4','readonly'=>'readonly'));?></span>
    <span class="span4"><?php echo $form->textFieldRow($localizacion,'anexo',array('class'=>'span1','readonly'=>'readonly'));?></span>
 
    </div>   
 </div>   
 <?php $this->endWidget();*/?>
	
	<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Datos de la Planila',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>

<div id="yw116"><div class="alert in alert-block fade alert-error"><strong>Importante!</strong> Campos con <span class="required">*</span> son requeridos.</div></div>
    <?php echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span10')); ?>

<?php
     $this->widget('bootstrap.widgets.TbAlert'); 
	echo $form->errorSummary(array_merge(array($model)));
?>
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

	<table class="tableizer-table">
		<tr class="tableizer-firstrow">
			<th colspan="11" bgcolor="#0066CC">CANTIDAD DE HORAS CATEDRA DEL
				ESTABLECIMIENTO</th>
		</tr>
		<tr>
			<td bgcolor="#0066CC">&nbsp;</td>
			<td colspan="6" bgcolor="#0066CC"><span class="blanco">PLANTA
					ORGANICA FUNCIONAL (P.O.F.)</span></td>
			<td bgcolor="#0066CC">&nbsp;</td>
			<td bgcolor="#0066CC">&nbsp;</td>
			<td bgcolor="#0066CC">&nbsp;</td>
			<td bgcolor="#0066CC">&nbsp;</td>
		</tr>
		<tr>
			<td bgcolor="#0066CC"><span class="blanco">INICIAL - PRIMARIO</span></td>
			<td bgcolor="#0066CC"><span class="blanco">TOTAL</span></td>
			<td bgcolor="#0066CC"><span class="blanco">Titular</span></td>
			<td bgcolor="#0066CC"><span class="blanco">Interinas</span></td>
			<td bgcolor="#0066CC"><span class="blanco">Transitorias</span></td>
			<td bgcolor="#0066CC"><span class="blanco">Suplentes</span></td>
			<td bgcolor="#0066CC"><span class="blanco">Sin Cubrir</span></td>
			<td bgcolor="#0066CC"><span class="blanco">Tareas Pasivas</span></td>
			<td bgcolor="#0066CC"><span class="blanco">Comisión Adscripción</span>
			</td>
			<td bgcolor="#0066CC"><span class="blanco">Licencia</span></td>
			<td bgcolor="#0066CC"><span class="blanco">Contra- tadas (Fuera de la
					POF)</span></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>1+2+3+4+5</td>
			<td>(1)</td>
			<td>(2)</td>
			<td>(3)</td>
			<td>(4)</td>
			<td>(5)</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><span class="segundo">Horas Destinadas al</span> DICTADO DE
				CLASES:</td>
			<td><?php echo $form->textField($model,'tot_dic_cla',array('class'=>'span1 aka','readonly'=>'readonly','value'=>'0'));?>
			</td>
	<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_dic_tit',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?>
			</td>
	<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_dic_int',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?>
			</td>
	<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_dic_tra',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?>
			</td>
	<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_dic_sup',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?>
			</td>
	<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_dic_sin',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?>
			</td>
	<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_dic_pas',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?>
			</td>
	<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_dic_com',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?>
			</td>
	<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_dic_lic',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?>
			</td>
	<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_dic_con',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?>
			</td>
		</tr>
		<tr>
			<td><span class="segundo">Horas destinadas a</span> JARDIN MATERNAL</td>
			<td><?php echo $form->textField($model,'tot_jar_mat',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?></td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_mat_tit',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_mat_int',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_mat_tra',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_mat_sup',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_mat_sin',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_mat_pas',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_mat_com',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_mat_lic',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_mat_con',array('class'=>'span1','value'=>'0'));?>
			</td>
		</tr>
		<tr>
			<td><span class="segundo">Horas destinadas a</span> JARDIN DE
				INFANTES</td>
			<td><?php echo $form->textField($model,'tot_jar_inf',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?></td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_inf_tit',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_inf_int',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_inf_tra',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_inf_sup',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_inf_sin',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_inf_pas',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_inf_com',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_inf_lic',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_inf_con',array('class'=>'span1','value'=>'0'));?>
			</td>
		</tr>
		<tr>
			<td><span class="segundo">Horas destinadas a</span> PRIMARIO</td>
			<td><?php echo $form->textField($model,'tot_hor_egb',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?></td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_egb_tit',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_egb_int',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_egb_tra',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_egb_sup',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_egb_sin',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_egb_pas',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_egb_com',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_egb_lic',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_egb_con',array('class'=>'span1','value'=>'0'));?>
			</td>
		</tr>
		<tr>
			<td>Horas Cátedra destinadas a otras actividades/funciones:</td>
			<td><?php echo $form->textField($model,'tot_act_fun',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?></td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_fun_tit',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_fun_int',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_fun_tra',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_fun_sup',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_fun_sin',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_fun_tar',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_fun_com',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_fun_lic',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_fun_con',array('class'=>'span1','value'=>'0'));?>
			</td>
		</tr>
		<tr>
			<td>TOTAL de Horas de la Institución:</td>
			<td><?php echo $form->textField($model,'tot_hor_ins',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?></td>
			<td><?php echo $form->textField($model,'tot_ins_tit',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?></td>
			<td><?php echo $form->textField($model,'tot_ins_int',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?></td>
			<td><?php echo $form->textField($model,'tot_ins_tra',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?></td>
			<td><?php echo $form->textField($model,'tot_ins_sup',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?></td>
			<td><?php echo $form->textField($model,'tot_ins_sin',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?></td>
			<td><?php echo $form->textField($model,'tot_ins_tar',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?></td>
			<td><?php echo $form->textField($model,'tot_ins_com',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?></td>
			<td><?php echo $form->textField($model,'tot_ins_lic',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?></td>
			<td><?php echo $form->textField($model,'tot_ins_con',array('class'=>'span1','readonly'=>'readonly','value'=>'0'));?></td>
		</tr>
	</table>

	<?php $this->endWidget(); ?>
 
  
 <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Personal no Docente',
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

	<table align="center" class="tableizer-table">
		<tr>
			<td bgcolor="#0066CC"><span class="blanco">PERSONAL NO</span> <span
				class="blanco">DOCENTE</span></td>
			<td bgcolor="#0066CC" class="blanco">TOTAL</td>
			<td bgcolor="#0066CC" class="blanco">Varones</td>
			<td bgcolor="#0066CC" class="blanco">Mujeres</td>
		</tr>
		<tr>
			<td>Personal Administrativo</td>
			<td><?php echo $form->textField($model,'tot_per_adm',array('class'=>'span1','value'=>'0','readonly'=>'readonly'));?></td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_adm_var',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tor_adm_muj',array('class'=>'span1','value'=>'0'));?>
			</td>
		</tr>
		<tr>
			<td>Personal de Servicios y Maestranza</td>
			<td><?php echo $form->textField($model,'tot_per_ser',array('class'=>'span1','value'=>'0','readonly'=>'readonly'));?></td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_ser_var',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_ser_muj',array('class'=>'span1','value'=>'0'));?>
			</td>
		</tr>
		<tr>
			<td>Planes Laborales de Empleo</td>
			<td><?php echo $form->textField($model,'tot_per_pla',array('class'=>'span1','value'=>'0','readonly'=>'readonly'));?></td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_pla_var',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_pla_muj',array('class'=>'span1','value'=>'0'));?>
			</td>
		</tr>
		<tr>
			<td>Contratados:</td>
			<td><?php echo $form->textField($model,'tot_per_con',array('class'=>'span1','value'=>'0','readonly'=>'readonly'));?></td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_con_var',array('class'=>'span1','value'=>'0'));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_con_muj',array('class'=>'span1','value'=>'0'));?>
			</td>
		</tr>
		<tr>
			<td>Totales</td>
			<td><?php echo $form->textField($model,'tot_per_nod',array('class'=>'span1','value'=>'0','readonly'=>'readonly'));?></td>
			<td><?php echo $form->textField($model,'tot_per_var',array('class'=>'span1','value'=>'0','readonly'=>'readonly'));?></td>
			<td><?php echo $form->textField($model,'tot_per_muj',array('class'=>'span1','value'=>'0','readonly'=>'readonly'));?></td>
		</tr>
	</table>


	<?php $this->endWidget(); ?>
  
  <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Personal con designacion Docente por sexo',
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

	<table align="center" class="tableizer-table">
		<tr class="tableizer-firstrow">
			<th>&nbsp;</th>
			<th bgcolor="#0066CC"><span class="ww">TOTA</span>L</th>
			<th bgcolor="#0066CC" class="ww">Varones</th>
			<th bgcolor="#0066CC">Mujeres</th>
		</tr>
		<tr>
			<td>Total de DOCENTES EN ACTIVIDAD</td>
			<td><?php echo $form->textField($model,'tot_doc_act',array('class'=>'span1','readonly'=>'readonly','value'=>$model->tot_doc_act <> 0 ?  $model->tot_doc_act : 0 ));?></td>
			
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_act_var',array('class'=>'span1','value'=>$model->tot_act_var <> 0 ?  $model->tot_act_var : 0 ));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_act_muj',array('class'=>'span1','value'=>$model->tot_act_muj <> 0 ?  $model->tot_act_muj : 0 ));?>
			</td>
		</tr>
		<tr>
			<td>Tareas Pasivas</td>
			<td><?php echo $form->textField($model,'tot_per_pas',array('class'=>'span1','readonly'=>'readonly','value'=>$model->tot_per_pas <> 0 ?  $model->tot_per_pas : 0 ));?></td>
			
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_pas_var',array('class'=>'span1','value'=>$model->tot_pas_var <> 0 ?  $model->tot_pas_var : 0 ));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_pas_muj',array('class'=>'span1','value'=>$model->tot_pas_muj <> 0 ?  $model->tot_pas_muj : 0 ));?>
			</td>
		</tr>
		<tr>
			<td>Docentes afectados a este Establecimiento que no pertenecen a
				esta planta funcional</td>
			<td><?php echo $form->textField($model,'tot_doc_fun',array('class'=>'span1','readonly'=>'readonly','value'=>$model->tot_doc_fun <> 0 ?  $model->tot_doc_fun : 0 ));?></td>
			
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_doc_var',array('class'=>'span1','value'=>$model->tot_doc_var <> 0 ?  $model->tot_doc_var : 0 ));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_doc_muj',array('class'=>'span1','value'=>$model->tot_doc_muj <> 0 ?  $model->tot_doc_muj : 0 ));?>
			</td>
		</tr>
		<tr>
			<td>Cantidad de docentes pertenecientes a esta planta funcional
				afectados a otro establecimiento</td>
			<td><?php echo $form->textField($model,'tot_doc_otr',array('class'=>'span1','readonly'=>'readonly','value'=>$model->tot_doc_otr <> 0 ?  $model->tot_doc_otr : 0 ));?></td>
			
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_otr_var',array('class'=>'span1','value'=>$model->tot_otr_var <> 0 ?  $model->tot_otr_var : 0 ));?>
			</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_otr_muj',array('class'=>'span1','value'=>$model->tot_otr_muj <> 0 ?  $model->tot_otr_muj : 0 ));?>
			</td>
		</tr>
	</table>


	<?php $this->endWidget(); ?>
<?php 
    $cs = Yii::app()->getClientScript();
	$cs->registerCoreScript('jquery');
	$cs->registerCoreScript('jquery.ui');
	$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/bootstrap/jquery-ui.css');?>	
	

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Datos del Establecimiento',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
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
			<td width="453">Fecha de Aniversario / Cumpleaños:</td>
			<td width="378" bgcolor="#99FFCC"><?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$model,
					'attribute'=>'fec_ani',
					'value'=>$model->fec_ani,
					'language' => 'es',
					'options'=>array(
							'showAnim'=>'slide',
							'changeYear' => true,
							'changeMonth' => true,
 							'yearRange'=>'1970:2013',
					),
					'htmlOptions'=>array(
							'readonly'=>"readonly",
							'style'=>'height:20px;'
					),
			));?></td>
		</tr>
		<tr>
			<td>Fecha de Inicio de Actividades:</td>
			<td bgcolor="#99FFCC"><?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$model,
					'attribute'=>'fec_ini_act',
					'value'=>$model->fec_ini_act,
					'language' => 'es',
					'options'=>array(
							'showAnim'=>'slide',
							'changeYear' => true,
							'changeMonth' => true,
							'yearRange'=>'1970:2013',
					),
					'htmlOptions'=>array(
							'readonly'=>"readonly",
							'style'=>'height:20px;'
					),
			));?></td>
		</tr>
		<tr>
			<td>Fecha de Inauguración:</td>
			<td bgcolor="#99FFCC"><?php 
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$model,
					'attribute'=>'fec_ina',
					'value'=>$model->fec_ina,
					'language' => 'es',
					'options'=>array(
							'showAnim'=>'slide',
							'changeYear' => true,
							'changeMonth' => true,
							'yearRange'=>'1970:2013',
							),
					'htmlOptions'=>array(
							'readonly'=>"readonly",
							'style'=>'height:20px;'
					),
			)); ?></td>
		</tr>
		<tr>
			<td>Mail:</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'email',array('class'=>'span4'));?>
			</td>
		</tr>
		<tr>
			<td>Lugar y fecha:</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'lugar_fecha',array('class'=>'span4'));?></td>
		</tr>
		<tr>
			<td>Apellido y Nombre del SECRETARIO/A:</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'secretario',array('class'=>'span4'));?></td>
		</tr>
		<tr>
			<td>Apellido y Nombre del VICEDIRECTOR/A:</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'vicedirector',array('class'=>'span4'));?></td>
		</tr>
		<tr>
			<td>Apellido y Nombre del DIRECTOR/A - AUTORIDAD RESPONSABLE:</td>
			<td bgcolor="#99FFCC"><?php echo $form->textField($model,'director',array('class'=>'span4'));?></td>
		</tr>
	</table>

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

<!-- COLUMNA TITULAR -->
<script>
function sumar1(e){  
var a =$('#Datosest_tot_mat_tit').val();
var b =$('#Datosest_tot_inf_tit').val();
var c =$('#Datosest_tot_egb_tit').val();

if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}

var total=parseFloat(a) + parseFloat(b) + parseFloat(c);

$('#Datosest_tot_dic_tit').val(total);
}

$('#Datosest_tot_mat_tit').keyup(sumar1);
$('#Datosest_tot_inf_tit').keyup(sumar1);
$('#Datosest_tot_egb_tit').keyup(sumar1);
</script>

<!-- COLUMNA INTERINAS -->
<script>
function sumar1(e){  
var a =$('#Datosest_tot_mat_int').val();
var b =$('#Datosest_tot_inf_int').val();
var c =$('#Datosest_tot_egb_int').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c);
$('#Datosest_tot_dic_int').val(total);
}
$('#Datosest_tot_mat_int').keyup(sumar1);
$('#Datosest_tot_inf_int').keyup(sumar1);
$('#Datosest_tot_egb_int').keyup(sumar1);
</script>

<!-- COLUMNA TRANSITORIAS -->
<script>
function sumar1(e){  
var a =$('#Datosest_tot_mat_tra').val();
var b =$('#Datosest_tot_inf_tra').val();
var c =$('#Datosest_tot_egb_tra').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c);
$('#Datosest_tot_dic_tra').val(total);
}
$('#Datosest_tot_mat_tra').keyup(sumar1);
$('#Datosest_tot_inf_tra').keyup(sumar1);
$('#Datosest_tot_egb_tra').keyup(sumar1);
</script>

<!-- COLUMNA SUPLENTES -->
<script>
function sumar1(e){  
var a =$('#Datosest_tot_mat_sup').val();
var b =$('#Datosest_tot_inf_sup').val();
var c =$('#Datosest_tot_egb_sup').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c);
$('#Datosest_tot_dic_sup').val(total);
}
$('#Datosest_tot_mat_sup').keyup(sumar1);
$('#Datosest_tot_inf_sup').keyup(sumar1);
$('#Datosest_tot_egb_sup').keyup(sumar1);
</script>

<!-- COLUMNA SIN CUBRIR -->
<script>
function sumar1(e){  
var a =$('#Datosest_tot_mat_sin').val();
var b =$('#Datosest_tot_inf_sin').val();
var c =$('#Datosest_tot_egb_sin').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c);
$('#Datosest_tot_dic_sin').val(total);
}
$('#Datosest_tot_mat_sin').keyup(sumar1);
$('#Datosest_tot_inf_sin').keyup(sumar1);
$('#Datosest_tot_egb_sin').keyup(sumar1);
</script>

<!-- COLUMNA TAREAS PASIVAS -->
<script>
function sumar1(e){  
var a =$('#Datosest_tot_mat_pas').val();
var b =$('#Datosest_tot_inf_pas').val();
var c =$('#Datosest_tot_egb_pas').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c);
$('#Datosest_tot_dic_pas').val(total);
}
$('#Datosest_tot_mat_pas').keyup(sumar1);
$('#Datosest_tot_inf_pas').keyup(sumar1);
$('#Datosest_tot_egb_pas').keyup(sumar1);
</script>

<!-- COLUMNA comision -->
<script>
function sumar1(e){  
var a =$('#Datosest_tot_mat_com').val();
var b =$('#Datosest_tot_inf_com').val();
var c =$('#Datosest_tot_egb_com').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c);
$('#Datosest_tot_dic_com').val(total);
}
$('#Datosest_tot_mat_com').keyup(sumar1);
$('#Datosest_tot_inf_com').keyup(sumar1);
$('#Datosest_tot_egb_com').keyup(sumar1);
</script>

<!-- COLUMNA LICENCIA -->
<script>
function sumar1(e){  
var a =$('#Datosest_tot_mat_lic').val();
var b =$('#Datosest_tot_inf_lic').val();
var c =$('#Datosest_tot_egb_lic').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c);
$('#Datosest_tot_dic_lic').val(total);
}
$('#Datosest_tot_mat_lic').keyup(sumar1);
$('#Datosest_tot_inf_lic').keyup(sumar1);
$('#Datosest_tot_egb_lic').keyup(sumar1);
</script>

<!-- COLUMNA CONTRATADAS -->
<script>
function sumar1(e){  
var a =$('#Datosest_tot_mat_con').val();
var b =$('#Datosest_tot_inf_con').val();
var c =$('#Datosest_tot_egb_con').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c);
$('#Datosest_tot_dic_con').val(total);
}
$('#Datosest_tot_mat_con').keyup(sumar1);
$('#Datosest_tot_inf_con').keyup(sumar1);
$('#Datosest_tot_egb_con').keyup(sumar1);
</script>

<!-- FILA JARDIN MATERNAL-->
<script>
function sumar2(e){  
var a =$('#Datosest_tot_mat_sin').val();
var b =$('#Datosest_tot_mat_sup').val();
var c =$('#Datosest_tot_mat_tra').val();
var d =$('#Datosest_tot_mat_int').val();
var f =$('#Datosest_tot_mat_tit').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
if(d==''){d=0;}
if(f==''){f=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c)+ parseFloat(d)+ parseFloat(f);
$('#Datosest_tot_jar_mat').val(total);
}
$('#Datosest_tot_mat_sin').keyup(sumar2);
$('#Datosest_tot_mat_sup').keyup(sumar2);
$('#Datosest_tot_mat_tra').keyup(sumar2);
$('#Datosest_tot_mat_int').keyup(sumar2);
$('#Datosest_tot_mat_tit').keyup(sumar2);
</script>

<!-- FILA JARDIN INFANTES-->
<script>
function sumar2(e){  
var a =$('#Datosest_tot_inf_sin').val();
var b =$('#Datosest_tot_inf_sup').val();
var c =$('#Datosest_tot_inf_tra').val();
var d =$('#Datosest_tot_inf_int').val();
var f =$('#Datosest_tot_inf_tit').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
if(d==''){d=0;}
if(f==''){f=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c)+ parseFloat(d)+ parseFloat(f);
$('#Datosest_tot_jar_inf').val(total);
}
$('#Datosest_tot_inf_sin').keyup(sumar2);
$('#Datosest_tot_inf_sup').keyup(sumar2);
$('#Datosest_tot_inf_tra').keyup(sumar2);
$('#Datosest_tot_inf_int').keyup(sumar2);
$('#Datosest_tot_inf_tit').keyup(sumar2);

</script>

<!-- FILA JARDIN E.G.B-->
<script>
function sumar2(e){  
var a =$('#Datosest_tot_egb_sin').val();
var b =$('#Datosest_tot_egb_sup').val();
var c =$('#Datosest_tot_egb_tra').val();
var d =$('#Datosest_tot_egb_int').val();
var f =$('#Datosest_tot_egb_tit').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
if(d==''){d=0;}
if(f==''){f=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c)+ parseFloat(d)+ parseFloat(f);
$('#Datosest_tot_hor_egb').val(total);
}
$('#Datosest_tot_egb_sin').keyup(sumar2);
$('#Datosest_tot_egb_sup').keyup(sumar2);
$('#Datosest_tot_egb_tra').keyup(sumar2);
$('#Datosest_tot_egb_int').keyup(sumar2);
$('#Datosest_tot_egb_tit').keyup(sumar2);
</script>


<!-- FILA HOras Catredra-->
<script>
function sumar2(e){  
var a =$('#Datosest_tot_fun_sin').val();
var b =$('#Datosest_tot_fun_sup').val();
var c =$('#Datosest_tot_fun_tra').val();
var d =$('#Datosest_tot_fun_int').val();
var f =$('#Datosest_tot_fun_tit').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
if(d==''){d=0;}
if(f==''){f=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c)+ parseFloat(d)+ parseFloat(f);
$('#Datosest_tot_act_fun').val(total);
}
$('#Datosest_tot_fun_sin').keyup(sumar2);
$('#Datosest_tot_fun_sup').keyup(sumar2);
$('#Datosest_tot_fun_tra').keyup(sumar2);
$('#Datosest_tot_fun_int').keyup(sumar2);
$('#Datosest_tot_fun_tit').keyup(sumar2);
</script>

<!-- SUMA DICTADO CLASES VS TOTAL HORAS INSTITUCION titular-->
<script>
function sumar3(e){
var a=$('#Datosest_tot_dic_tit').val();
var b=$('#Datosest_tot_fun_tit').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_ins_tit').val(total);
}
$('#Datosest_tot_mat_tit').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_inf_tit').keyup(sumar3);//borrar si solo es el de abajo 
$('#Datosest_tot_egb_tit').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_dic_tit').keyup(sumar3);
$('#Datosest_tot_fun_tit').keyup(sumar3);
</script>

<!-- SUMA DICTADO CLASES VS TOTAL HORAS INSTITUCION interinas -->
<script>
function sumar3(e){
var a=$('#Datosest_tot_dic_int').val();
var b=$('#Datosest_tot_fun_int').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_ins_int').val(total);
}
$('#Datosest_tot_mat_int').keyup(sumar3);//borrar si solo es el de abajo 
$('#Datosest_tot_inf_int').keyup(sumar3);//borrar si solo es el de abajo 
$('#Datosest_tot_egb_int').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_dic_int').keyup(sumar3);
$('#Datosest_tot_fun_int').keyup(sumar3);
</script>

<!-- SUMA DICTADO CLASES VS TOTAL HORAS INSTITUCION transitorias-->
<script>
function sumar3(e){
var a=$('#Datosest_tot_dic_tra').val();
var b=$('#Datosest_tot_fun_tra').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_ins_tra').val(total);
}
$('#Datosest_tot_mat_tra').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_inf_tra').keyup(sumar3);//borrar si solo es el de abajo 
$('#Datosest_tot_egb_tra').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_dic_tra').keyup(sumar3);
$('#Datosest_tot_fun_tra').keyup(sumar3);
</script>

<!-- SUMA DICTADO CLASES VS TOTAL HORAS INSTITUCION suplentes-->
<script>
function sumar3(e){
var a=$('#Datosest_tot_dic_sup').val();
var b=$('#Datosest_tot_fun_sup').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_ins_sup').val(total);
}
$('#Datosest_tot_mat_sup').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_inf_sup').keyup(sumar3);//borrar si solo es el de abajo 
$('#Datosest_tot_egb_sup').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_dic_sup').keyup(sumar3);
$('#Datosest_tot_fun_sup').keyup(sumar3);
</script>

<!-- SUMA DICTADO CLASES VS TOTAL HORAS INSTITUCION suplentes-->
<script>
function sumar3(e){
var a=$('#Datosest_tot_dic_sup').val();
var b=$('#Datosest_tot_fun_sup').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_ins_sup').val(total);
}
$('#Datosest_tot_mat_sup').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_inf_sup').keyup(sumar3);//borrar si solo es el de abajo 
$('#Datosest_tot_egb_sup').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_dic_sup').keyup(sumar3);
$('#Datosest_tot_fun_sup').keyup(sumar3);
</script>

<!-- SUMA DICTADO CLASES VS TOTAL HORAS INSTITUCION sin cubrir-->
<script>
function sumar3(e){
var a=$('#Datosest_tot_dic_sin').val();
var b=$('#Datosest_tot_fun_sin').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_ins_sin').val(total);
}
$('#Datosest_tot_mat_sin').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_inf_sin').keyup(sumar3);//borrar si solo es el de abajo 
$('#Datosest_tot_egb_sin').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_dic_sin').keyup(sumar3);
$('#Datosest_tot_fun_sin').keyup(sumar3);
</script>


<!-- SUMA DICTADO CLASES VS pas-->
<script>
function sumar3(e){
var a=$('#Datosest_tot_dic_pas').val();
var b=$('#Datosest_tot_fun_tar').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_ins_tar').val(total);
}
$('#Datosest_tot_mat_pas').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_inf_pas').keyup(sumar3);//borrar si solo es el de abajo 
$('#Datosest_tot_egb_pas').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_dic_pas').keyup(sumar3);
$('#Datosest_tot_fun_tar').keyup(sumar3);
</script>

<!-- SUMA DICTADO CLASES VS TOTAL HORAS INSTITUCION comision-->
<script>
function sumar3(e){
var a=$('#Datosest_tot_dic_com').val();
var b=$('#Datosest_tot_fun_com').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_ins_com').val(total);
}
$('#Datosest_tot_mat_com').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_inf_com').keyup(sumar3);//borrar si solo es el de abajo 
$('#Datosest_tot_egb_com').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_dic_com').keyup(sumar3);
$('#Datosest_tot_fun_com').keyup(sumar3);
</script>

<!-- SUMA DICTADO CLASES VS TOTAL HORAS INSTITUCION licencia-->
<script>
function sumar3(e){
var a=$('#Datosest_tot_dic_lic').val();
var b=$('#Datosest_tot_fun_lic').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_ins_lic').val(total);
}
$('#Datosest_tot_mat_lic').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_inf_lic').keyup(sumar3);//borrar si solo es el de abajo 
$('#Datosest_tot_egb_lic').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_dic_lic').keyup(sumar3);
$('#Datosest_tot_fun_lic').keyup(sumar3);
</script>

<!-- SUMA DICTADO CLASES VS TOTAL HORAS INSTITUCION contra-->
<script>
function sumar3(e){
var a=$('#Datosest_tot_dic_con').val();
var b=$('#Datosest_tot_fun_con').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_ins_con').val(total);
}
$('#Datosest_tot_mat_con').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_inf_con').keyup(sumar3);//borrar si solo es el de abajo 
$('#Datosest_tot_egb_con').keyup(sumar3);//borrar si solo es el de abajo
$('#Datosest_tot_dic_con').keyup(sumar3);
$('#Datosest_tot_fun_con').keyup(sumar3);
</script>

<!-- SUMA DICTADO CLASES VS TOTAL HORAS INSTITUCION tareas-->


<script>
function sumarTotal(){
var a=$('#Datosest_tot_dic_tit').val();
var b=$('#Datosest_tot_dic_int').val();
var c=$('#Datosest_tot_dic_tra').val();
var d=$('#Datosest_tot_dic_sup').val();
var f=$('#Datosest_tot_dic_sin').val();

var total=parseFloat(a) + parseFloat(b) + parseFloat(c)+ parseFloat(d)+ parseFloat(f);
$('.aka').val(total);
}
$('#Datosest_tot_mat_tit').keyup(sumarTotal);
$('#Datosest_tot_inf_tit').keyup(sumarTotal);
$('#Datosest_tot_egb_tit').keyup(sumarTotal);
$('#Datosest_tot_mat_int').keyup(sumarTotal);
$('#Datosest_tot_inf_int').keyup(sumarTotal);
$('#Datosest_tot_egb_int').keyup(sumarTotal);
$('#Datosest_tot_mat_tra').keyup(sumarTotal);
$('#Datosest_tot_inf_tra').keyup(sumarTotal);
$('#Datosest_tot_egb_tra').keyup(sumarTotal);
$('#Datosest_tot_mat_sup').keyup(sumarTotal);
$('#Datosest_tot_inf_sup').keyup(sumarTotal);
$('#Datosest_tot_egb_sup').keyup(sumarTotal);
$('#Datosest_tot_mat_sin').keyup(sumarTotal);
$('#Datosest_tot_inf_sin').keyup(sumarTotal);
$('#Datosest_tot_egb_sin').keyup(sumarTotal);
</script>

<script>
function sumarGenero(){
var a=$('#Datosest_tot_adm_var').val();
var b=$('#Datosest_tot_ser_var').val();
var c=$('#Datosest_tot_pla_var').val();
var d=$('#Datosest_tot_con_var').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
if(d==''){d=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c)+ parseFloat(d);
$('#Datosest_tot_per_var').val(total);
}
$('#Datosest_tot_adm_var').keyup(sumarGenero);
$('#Datosest_tot_ser_var').keyup(sumarGenero);
$('#Datosest_tot_pla_var').keyup(sumarGenero);
$('#Datosest_tot_con_var').keyup(sumarGenero);

</script>

<script>
function sumarGenero(){
var a=$('#Datosest_tor_adm_muj').val();
var b=$('#Datosest_tot_ser_muj').val();
var c=$('#Datosest_tot_pla_muj').val();
var d=$('#Datosest_tot_con_muj').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
if(d==''){d=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c)+ parseFloat(d);
$('#Datosest_tot_per_muj').val(total);
}
$('#Datosest_tor_adm_muj').keyup(sumarGenero);
$('#Datosest_tot_ser_muj').keyup(sumarGenero);
$('#Datosest_tot_pla_muj').keyup(sumarGenero);
$('#Datosest_tot_con_muj').keyup(sumarGenero);
</script>

<script>
function SumarGenero2(){
var a=$('#Datosest_tot_act_var').val();
var b=$('#Datosest_tot_act_muj').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_doc_act').val(total);
}
$('#Datosest_tot_act_var').keyup(SumarGenero2);
$('#Datosest_tot_act_muj').keyup(SumarGenero2);
</script>

<script>
function SumarGenero2(){
var a=$('#Datosest_tot_pas_var').val();
var b=$('#Datosest_tot_pas_muj').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_per_pas').val(total);
}
$('#Datosest_tot_pas_var').keyup(SumarGenero2);
$('#Datosest_tot_pas_muj').keyup(SumarGenero2);
</script>

<script>
function SumarGenero2(){
var a=$('#Datosest_tot_doc_var').val();
var b=$('#Datosest_tot_doc_muj').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_doc_fun').val(total);
}
$('#Datosest_tot_doc_var').keyup(SumarGenero2);
$('#Datosest_tot_doc_muj').keyup(SumarGenero2);
</script>

<script>
function SumarGenero2(){
var a=$('#Datosest_tot_otr_var').val();
var b=$('#Datosest_tot_otr_muj').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_doc_otr').val(total);
}
$('#Datosest_tot_otr_var').keyup(SumarGenero2);
$('#Datosest_tot_otr_muj').keyup(SumarGenero2);
</script>

<!-- PRIMERA-->
<script>
function SumarGenero(){
var a=$('#Datosest_tot_adm_var').val();
var b=$('#Datosest_tor_adm_muj').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_per_adm').val(total);
}
$('#Datosest_tot_adm_var').keyup(SumarGenero);
$('#Datosest_tor_adm_muj').keyup(SumarGenero);
</script>

<script>
function SumarGenero(){
var a=$('#Datosest_tot_ser_var').val();
var b=$('#Datosest_tot_ser_muj').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_per_ser').val(total);
}
$('#Datosest_tot_ser_var').keyup(SumarGenero);
$('#Datosest_tot_ser_muj').keyup(SumarGenero);
</script>

<script>
function SumarGenero(){
var a=$('#Datosest_tot_pla_var').val();
var b=$('#Datosest_tot_pla_muj').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_per_pla').val(total);
}
$('#Datosest_tot_pla_var').keyup(SumarGenero);
$('#Datosest_tot_pla_muj').keyup(SumarGenero);
</script>

<script>
function SumarGenero(){
var a=$('#Datosest_tot_con_var').val();
var b=$('#Datosest_tot_con_muj').val();
if(a==''){a=0;}
if(b==''){b=0;}
var total=parseFloat(a) + parseFloat(b);
$('#Datosest_tot_per_con').val(total);
}
$('#Datosest_tot_con_var').keyup(SumarGenero);
$('#Datosest_tot_con_muj').keyup(SumarGenero);
</script>


<script>
function SumarGeneroTotal(e){


var f =$('#Datosest_tot_per_var').val();
var g =$('#Datosest_tot_per_muj').val();


if(f==''){f=0;}
if(g==''){g=0;}


var total=parseFloat(f)+ parseFloat(g);
$('#Datosest_tot_per_nod').val(total);
}

$('#Datosest_tot_con_var').keyup(SumarGeneroTotal);
$('#Datosest_tot_con_muj').keyup(SumarGeneroTotal);
$('#Datosest_tot_pla_var').keyup(SumarGeneroTotal);
$('#Datosest_tot_pla_muj').keyup(SumarGeneroTotal);
$('#Datosest_tot_ser_var').keyup(SumarGeneroTotal);
$('#Datosest_tot_ser_muj').keyup(SumarGeneroTotal);
$('#Datosest_tot_adm_var').keyup(SumarGeneroTotal);
$('#Datosest_tor_adm_muj').keyup(SumarGeneroTotal);

</script>



<script>
function sumar2(e){  
var a =$('#Datosest_tot_ind_jam').val();
var b =$('#Datosest_tot_ind_jif').val();
var c =$('#Datosest_tot_ind_egb').val();
var d =$('#Datosest_tot_mul_jmx').val();
var f =$('#Datosest_tot_mul_jix').val();
var g =$('#Datosest_tot_mul_imx').val();
var h =$('#Datosest_tot_mul_eex').val();
var i =$('#Datosest_tot_mul_ejx').val();

if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
if(d==''){d=0;}
if(f==''){f=0;}
if(g==''){g=0;}
if(h==''){h=0;}
if(i==''){i=0;}

var total=parseFloat(a) + parseFloat(b) + parseFloat(c)+ parseFloat(d)+ parseFloat(f) + parseFloat(g) + parseFloat(h) + parseFloat(i);
$('#Datosest_tot_sec_div').val(total);
}
$('#Datosest_tot_ind_jam').keyup(sumar2);
$('#Datosest_tot_ind_jif').keyup(sumar2);
$('#Datosest_tot_ind_egb').keyup(sumar2);
$('#Datosest_tot_mul_jmx').keyup(sumar2);
$('#Datosest_tot_mul_jix').keyup(sumar2);
$('#Datosest_tot_mul_imx').keyup(sumar2);
$('#Datosest_tot_mul_eex').keyup(sumar2);
$('#Datosest_tot_mul_ejx').keyup(sumar2);
</script>


<script>
function sumar2(e){  


var g =$('#Datosest_tot_ins_tit').val();
var h =$('#Datosest_tot_ins_int').val();
var i =$('#Datosest_tot_ins_tra').val();
var j =$('#Datosest_tot_ins_sup').val();
var k =$('#Datosest_tot_ins_sin').val();


if(g==''){g=0;}
if(h==''){h=0;}
if(i==''){i=0;}
if(j==''){j=0;}
if(k==''){k=0;}

//alert(g+h+i+j+k);

var total = parseFloat(g) + parseFloat(h) + parseFloat(i)
+ parseFloat(j) + parseFloat(k);

$('#Datosest_tot_hor_ins').val(total);

}

$('#Datosest_tot_mat_tit').keyup(sumar2);
$('#Datosest_tot_inf_tit').keyup(sumar2);
$('#Datosest_tot_egb_tit').keyup(sumar2);
$('#Datosest_tot_fun_tit').keyup(sumar2);

$('#Datosest_tot_mat_int').keyup(sumar2);
$('#Datosest_tot_inf_int').keyup(sumar2);
$('#Datosest_tot_egb_int').keyup(sumar2);
$('#Datosest_tot_fun_int').keyup(sumar2);

$('#Datosest_tot_mat_tra').keyup(sumar2);
$('#Datosest_tot_inf_tra').keyup(sumar2);
$('#Datosest_tot_egb_tra').keyup(sumar2);
$('#Datosest_tot_fun_tra').keyup(sumar2);

$('#Datosest_tot_mat_sup').keyup(sumar2);
$('#Datosest_tot_inf_sup').keyup(sumar2);
$('#Datosest_tot_egb_sup').keyup(sumar2);
$('#Datosest_tot_fun_sup').keyup(sumar2);

$('#Datosest_tot_mat_sin').keyup(sumar2);
$('#Datosest_tot_inf_sin').keyup(sumar2);
$('#Datosest_tot_egb_sin').keyup(sumar2);
$('#Datosest_tot_fun_sin').keyup(sumar2);
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





