<style type="text/css">
.form .tableizer-table tr td {
	text-align: center;	/*font-size: small;*/
}
.tableizer-table tr td {
	font-weight: bold;
}
.form.wide .tableizer-table .tableizer-firstrow th {
	color: #FFF;
	text-align: center;
}
.ww {
	color: #FFF;
}
.form.wide .tableizer-table tr .ww {
	text-align: center;
}
.qq {
	color: #99FFCC;
}
.form.wide .tableizer-table tr td {
	text-align: right;
}
.ee {
	text-align: center;
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
	'title' => 'Cantidad Total de Alumnos Matriculados',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
  <style type="text/css">
table.tableizer-table {
	border: 1px solid #CCC;
	font-family: Arial, Helvetica, sans-serif font-size :   12px;
}

.tableizer-table td {
	padding: 4px;
	margin: 3px;
	border: 1px solid #ccc;
}

.tableizer-table th {
	background-color: #104E8B;
	/* color: #FFF; */
	font-weight: bold;
}
    </style>
</p>
<p>&nbsp; </p>
<table align="center" class="tableizer-table">
	  <tr class="tableizer-firstrow">
			<th bgcolor="#0066CC">ALUMNOS MATRICULADOS.</th>
			<th bgcolor="#0066CC">&nbsp;</th>
			<th colspan="5" bgcolor="#0066CC">ALUMNOS POR TURNO (si un alumno
				concurre a más de un turno, contarlo en cada uno de ellos)</th>
		</tr>
		<tr>
			<td bgcolor="#0066CC"><span class="ee"> Se debe contar a cada alumno
					una sola vez--------&gt;</span></td>
			<td bgcolor="#0066CC" class="ww">TOTAL</td>
			<td bgcolor="#0066CC" class="ww">Mañana</td>
			<td bgcolor="#0066CC" class="ww">Tarde</td>
			<td bgcolor="#0066CC" class="ww">Vespertino</td>
			<td bgcolor="#0066CC" class="ww">Noche</td>
			<td bgcolor="#0066CC" class="ww">Doble</td>
		</tr>
		<tr>
			<td>TOTAL de Alumnos matriculados en Itinerarios Formativos
				exclusivamente:</td>
			<td><?php echo $form->textField($model,'tot_alu_iti',array('class'=>'span1','readonly'=>'readonly','value'=>$model->tot_alu_iti <> 0 ?  $model->tot_alu_iti : 0 ));?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_iti_man',array('class'=>'span1','value'=>$model->tot_iti_man <> 0 ?  $model->tot_iti_man : 0 ));?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_iti_tar',array('class'=>'span1','value'=>$model->tot_iti_tar <> 0 ?  $model->tot_iti_tar : 0 ));?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_iti_ves',array('class'=>'span1','value'=>$model->tot_iti_ves <> 0 ?  $model->tot_iti_ves : 0 ));?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_iti_noc',array('class'=>'span1','value'=>$model->tot_iti_noc <> 0 ?  $model->tot_iti_noc : 0 ));?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_iti_dob',array('class'=>'span1','value'=>$model->tot_iti_dob <> 0 ?  $model->tot_iti_dob : 0 ));?>
			</td>
		</tr>
		<tr>
			<td>TOTAL de Alumnos matriculados en Trayectos Técnicos Profesionales
				exclusivamente:</td>
			<td><?php echo $form->textField($model,'tot_alu_ttp',array('class'=>'span1','readonly'=>'readonly','value'=>$model->tot_alu_ttp <> 0 ?  $model->tot_alu_ttp : 0 ));?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_ttp_man',array('class'=>'span1','value'=>$model->tot_ttp_man <> 0 ?  $model->tot_ttp_man : 0 ));?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_ttp_tar',array('class'=>'span1','value'=>$model->tot_ttp_tar <> 0 ?  $model->tot_ttp_tar : 0 ));?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_ttp_ves',array('class'=>'span1','value'=>$model->tot_ttp_ves <> 0 ?  $model->tot_ttp_ves : 0 ));?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_ttp_noc',array('class'=>'span1','value'=>$model->tot_ttp_noc <> 0 ?  $model->tot_ttp_noc : 0 ));?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $form->textField($model,'tot_ttp_dob',array('class'=>'span1','value'=>$model->tot_ttp_dob <> 0 ?  $model->tot_ttp_dob : 0 ));?>
			</td>
		</tr>
		<tr>
			<td>Total de Alumnos en I.F. Y T.T.P.:</td>
			<td><?php echo $form->textField($model,'tot_iti_ttp',array('class'=>'span1','readonly'=>'readonly','value'=>$model->tot_iti_ttp <> 0 ?  $model->tot_iti_ttp : 0 ));?>
			</td>
			<td><?php echo $form->textField($model,'tot_alu_man',array('class'=>'span1','readonly'=>'readonly','value'=>$model->tot_alu_man <> 0 ?  $model->tot_alu_man : 0 ));?>
			</td>
			<td><?php echo $form->textField($model,'tot_alu_tar',array('class'=>'span1','readonly'=>'readonly','value'=>$model->tot_alu_tar <> 0 ?  $model->tot_alu_tar : 0 ));?>
			</td>
			<td><?php echo $form->textField($model,'tot_alu_ves',array('class'=>'span1','readonly'=>'readonly','value'=>$model->tot_alu_ves <> 0 ?  $model->tot_alu_ves : 0 ));?>
			</td>
			<td><?php echo $form->textField($model,'tot_alu_noc',array('class'=>'span1','readonly'=>'readonly','value'=>$model->tot_alu_noc <> 0 ?  $model->tot_alu_noc : 0 ));?>
			</td>
			<td><?php echo $form->textField($model,'tot_alu_dob',array('class'=>'span1','readonly'=>'readonly','value'=>$model->tot_alu_dob <> 0 ?  $model->tot_alu_dob : 0 ));?>
			</td>
		</tr>
	</table>


	<p>
	  <?php $this->endWidget();?>
  
  <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Itinerario Formativo',
	'headerIcon' => 'icon-th-list',
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
 <p> 
  <?php $this->widget(
    'bootstrap.widgets.TbLabel',
    array(
        'type' => 'info',
        // 'success', 'warning', 'important', 'info' or 'inverse'
        'label' => 'Importante! ALUMNOS  EXCLUSIVAMENTE DE LOS   I.F.   POR SEXO,  SEGUN  ITINERARIO.',
    )
);?>
  <?php $this->widget(
    'bootstrap.widgets.TbLabel',
    array(
        'type' => 'info',
        // 'success', 'warning', 'important', 'info' or 'inverse'
        'label' => 'Los alumnos que cursen módulos de  IF que integran un  TTP  no deben declararse en este cuadro.',
    )
);?>
</p>
<p>
  <?php
     $this->widget('bootstrap.widgets.TbAlert'); 
	echo $form->errorSummary(array_merge(array($model),$validatedDetalles));
?>
  
  <?php 
    $cs = Yii::app()->getClientScript();
	$cs->registerCoreScript('jquery');
	$cs->registerCoreScript('jquery.ui');
	$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/bootstrap/jquery-ui.css');?>	
  
  
</p>
<table class="linear" cellspacing="0" >
  <?php
	
	$detalleFormConfig = array(
		  'elements'=>array(
		  	'nombre_itinerario'=>array(
		  		'type'=>'text',
		  		'class' => 'miinput3',
		  		'label'=>'Nombre Itinerario Formativo'
		  	),
		  	'id_turno'=>array(
		  		'type'=>'dropdownlist',
		  		'items'=>GxHtml::listDataEx(Turno::model()->findAll(),'id_turno', 'descripcion'),
		  		'prompt'=>'Seleccione',
		  		'class' => 'miselect'
		  	),
            'alu_mat_tot'=>array(
				'type'=>'text',
				'label'=>'Total Alumnos Matriculados',
            	'class' => 'miinput'
			),

		  	'alu_mat_var'=>array(
		  		'type'=>'text',
		  		'label'=>'Total Varones Matriculados',
		  		'class' => 'miinput'
		  	),
		));

	$this->widget('ext.multimodelform.MultiModelForm',array(
			'id' => 'id_itinerario', //the unique widget id
			'formConfig' => $detalleFormConfig, //the form configuration array
			'model' => $detallePlanilla, //instance of the form model
			'tableView' => true,
			'validatedItems' => $validatedDetalles,
			'bootstrapLayout' => true,
			'data' => empty($validatedItems) ? $detallePlanilla->findAll(
                                             array('condition'=>'id_planilla=:IdPlanilla and nombre_ttp is null',
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
	'title' => 'Trayecto Tecnico Profesional',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>

<!-- <div id="yw116"><div class="alert in alert-block fade alert-error"><strong>Importante!</strong> ALUMNOS  EXCLUSIVAMENTE DE LOS   T.T.P.   POR SEXO,  SEGUN  TRAYECTO.
<p>&nbsp; </p> En el caso de que los alumnos opten por cursar más de un Trayecto Profesional, regístrelos en cada uno de ellos.
<p>&nbsp; </p> Incluir en este cuadro a los alumnos que cursan módulos de  IF  que integran un  TTP.</div></div> -->
 <p> 
  <?php $this->widget(
    'bootstrap.widgets.TbLabel',
    array(
        'type' => 'info',
        // 'success', 'warning', 'important', 'info' or 'inverse'
        'label' => 'Importante! ALUMNOS  EXCLUSIVAMENTE DE LOS   T.T.P.   POR SEXO,  SEGUN  TRAYECTO.',
    )
);?>
  <?php $this->widget(
    'bootstrap.widgets.TbLabel',
    array(
        'type' => 'info',
        // 'success', 'warning', 'important', 'info' or 'inverse'
        'label' => 'En el caso de que los alumnos opten por cursar más de un Trayecto Profesional, regístrelos en cada uno de ellos.',
    )
);?>
  <?php $this->widget(
    'bootstrap.widgets.TbLabel',
    array(
        'type' => 'info',
        // 'success', 'warning', 'important', 'info' or 'inverse'
        'label' => 'Incluir en este cuadro a los alumnos que cursan módulos de  IF  que integran un  TTP.',
    )
);?>
</p>

<?php
     $this->widget('bootstrap.widgets.TbAlert'); 
	echo $form->errorSummary(array_merge(array($model),$validatedDetalles2));
?>

<?php 
    $cs = Yii::app()->getClientScript();
	$cs->registerCoreScript('jquery');
	$cs->registerCoreScript('jquery.ui');
	$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/bootstrap/jquery-ui.css');?>	
	
	
<table class="linear" cellspacing="0" >
<?php
	
	$detalleFormConfig2 = array(
		  'elements'=>array(
		  	'nombre_ttp'=>array(
		  		'type'=>'text',
		  		'class' => 'miinput3',
				'label'=>'Nombre Trayecto Tecnico Profesional'
		  	),
		  	'id_turno'=>array(
		  		'type'=>'dropdownlist',
		  		'items'=>GxHtml::listDataEx(Turno::model()->findAll(),'id_turno', 'descripcion'),
		  		'prompt'=>'Seleccione',
		  		'class' => 'miselect'
		  	),
            'alu_mat_tot'=>array(
				'type'=>'text',
				'label'=>'Total Alumnos Matriculados',
            	'class' => 'miinput'
			),

		  	'alu_mat_var'=>array(
		  		'type'=>'text',
		  		'label'=>'Total Varones Matriculados',
		  		'class' => 'miinput'
		  	),
		));

	$this->widget('ext.multimodelform.MultiModelForm',array(
			'id' => 'id_ttp', //the unique widget id
			'formConfig' => $detalleFormConfig2, //the form configuration array
			'model' => $detallePlanilla2, //instance of the form model
			'tableView' => true,
			'validatedItems' => $validatedDetalles2,
			'bootstrapLayout' => true,
			'data' => empty($validatedItems2) ? $detallePlanilla2->findAll(
                                             array('condition'=>'id_planilla=:IdPlanilla and nombre_itinerario is null',
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
/* 	background-color: #c3d9ff; */	
    color: rgb(2, 2, 2);
	font-weight: bold;
}
</style>

  
	  <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Datos de ingreso',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
  </p>
	<p>&nbsp; </p>
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
			'url'=>Yii::app()->controller->createUrl('admin'),
            'icon'=>'remove-sign',  
			'label'=> Yii::t('app', 'Cancel'),
		)); ?>
  </div>
<?php $this->endWidget(); ?>
</div>

<script>
function sumar2(e){  
var a =$('#Planilla_tot_iti_man').val();
var b =$('#Planilla_tot_iti_tar').val();
var c =$('#Planilla_tot_iti_ves').val();
var d =$('#Planilla_tot_iti_noc').val();
var f =$('#Planilla_tot_iti_dob').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
if(d==''){d=0;}
if(f==''){f=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c)+ parseFloat(d)+ parseFloat(f);
$('#Planilla_tot_alu_iti').val(total);
}
$('#Planilla_tot_iti_man').keyup(sumar2);
$('#Planilla_tot_iti_tar').keyup(sumar2);
$('#Planilla_tot_iti_ves').keyup(sumar2);
$('#Planilla_tot_iti_noc').keyup(sumar2);
$('#Planilla_tot_iti_dob').keyup(sumar2);
</script>

<script>
function sumar2(e){  
var a =$('#Planilla_tot_ttp_man').val();
var b =$('#Planilla_tot_ttp_tar').val();
var c =$('#Planilla_tot_ttp_ves').val();
var d =$('#Planilla_tot_ttp_noc').val();
var f =$('#Planilla_tot_ttp_dob').val();
if(a==''){a=0;}
if(b==''){b=0;}
if(c==''){c=0;}
if(d==''){d=0;}
if(f==''){f=0;}
var total=parseFloat(a) + parseFloat(b) + parseFloat(c)+ parseFloat(d)+ parseFloat(f);
$('#Planilla_tot_alu_ttp').val(total);
}
$('#Planilla_tot_ttp_man').keyup(sumar2);
$('#Planilla_tot_ttp_tar').keyup(sumar2);
$('#Planilla_tot_ttp_ves').keyup(sumar2);
$('#Planilla_tot_ttp_noc').keyup(sumar2);
$('#Planilla_tot_ttp_dob').keyup(sumar2);
</script>


<script>
function sumar1(){  
var b =$('#Planilla_tot_iti_tar').val();
var c =$('#Planilla_tot_ttp_tar').val();
if(b==''){b=0;}
if(c==''){c=0;}
var total= parseFloat(b) + parseFloat(c);
$('#Planilla_tot_alu_tar').val(total);
}
$('#Planilla_tot_iti_tar').keyup(sumar1);
$('#Planilla_tot_ttp_tar').keyup(sumar1);
</script>

<script>
function sumar1(){  
var b =$('#Planilla_tot_iti_ves').val();
var c =$('#Planilla_tot_ttp_ves').val();
if(b==''){b=0;}
if(c==''){c=0;}
var total= parseFloat(b) + parseFloat(c);
$('#Planilla_tot_alu_ves').val(total);
}
$('#Planilla_tot_iti_ves').keyup(sumar1);
$('#Planilla_tot_ttp_ves').keyup(sumar1);
</script>

<script>
function sumar1(){  
var b =$('#Planilla_tot_iti_noc').val();
var c =$('#Planilla_tot_ttp_noc').val();
if(b==''){b=0;}
if(c==''){c=0;}
var total= parseFloat(b) + parseFloat(c);
$('#Planilla_tot_alu_noc').val(total);
}
$('#Planilla_tot_iti_noc').keyup(sumar1);
$('#Planilla_tot_ttp_noc').keyup(sumar1);
</script>

<script>
function sumar1(){  
var b =$('#Planilla_tot_iti_dob').val();
var c =$('#Planilla_tot_ttp_dob').val();
if(b==''){b=0;}
if(c==''){c=0;}
var total= parseFloat(b) + parseFloat(c);
$('#Planilla_tot_alu_dob').val(total);
}
$('#Planilla_tot_iti_dob').keyup(sumar1);
$('#Planilla_tot_ttp_dob').keyup(sumar1);
</script>

<script>
function sumar1(){  
var b =$('#Planilla_tot_iti_man').val();
var c =$('#Planilla_tot_ttp_man').val();
if(b==''){b=0;}
if(c==''){c=0;}
var total= parseFloat(b) + parseFloat(c);
$('#Planilla_tot_alu_man').val(total);
}
$('#Planilla_tot_iti_man').keyup(sumar1);
$('#Planilla_tot_ttp_man').keyup(sumar1);
</script>

<script>
function sumar2(e){  
var b =$('#Planilla_tot_alu_iti').val();
var c =$('#Planilla_tot_alu_ttp').val();

if(b==''){b=0;}
if(c==''){c=0;}

var total= parseFloat(b) + parseFloat(c);

$('#Planilla_tot_iti_ttp').val(total);
}
$('#Planilla_tot_iti_man').keyup(sumar2);
$('#Planilla_tot_iti_tar').keyup(sumar2);
$('#Planilla_tot_iti_ves').keyup(sumar2);
$('#Planilla_tot_iti_noc').keyup(sumar2);
$('#Planilla_tot_iti_dob').keyup(sumar2);

$('#Planilla_tot_ttp_man').keyup(sumar2);
$('#Planilla_tot_ttp_tar').keyup(sumar2);
$('#Planilla_tot_ttp_ves').keyup(sumar2);
$('#Planilla_tot_ttp_noc').keyup(sumar2);
$('#Planilla_tot_ttp_dob').keyup(sumar2);
</script>

<script type="text/javascript">
$(document).on('ready',function(){
	$('#id_detalle').trigger("click");
	});
</script>