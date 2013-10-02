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
<style type="text/css">
.printableArea .tableizer-table .tableizer-firstrow td span {
	color: #FFF;
}
.printableArea .tableizer-table .tableizer-firstrow td {
	color: #FFF;
}
.printableArea .tableizer-table tr td {
	font-weight: bold;
}
</style>


<h1>
    Planilla - Educación de Jovenes y Adultos - Nivel Primario<small><?php echo Yii::t('app', 'View'); ?> #<?php echo $model->id_planilla?></small></h1>

<hr />

<div class="btn-toolbar">
    <div class="btn-group">
<?php  
		$this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t('app', 'Manage'),'type'=>'primary',
                        "icon"=>"icon-list-alt icon-white",
                        "url"=>array('/ingresador/admin')
                    ));
		if ($model->confirmado == 0) {
		            $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t('app', 'Update'),'type'=>'warning',
                        "icon"=>"icon-edit icon-white",
                        "url"=>array("update","id"=>$model->{$model->tableSchema->primaryKey})
                    )); }
                   /* $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t('app', 'Create'),
                        "icon"=>"icon-plus",
                        "url"=>array("create")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                    		"label"=>Yii::t('app', 'Print'),
                    		"icon"=>"icon-print",
                    		"url"=>array("javascript:void(0);return false"),
                    		"htmlOptions"=>array('onclick'=>'printDiv();return false;'),
                    		
                    ));*/
                    
                    if (Yii::app()->user->checkAccess('Administrador'))
                    {
                    	if ($model->confirmado == 1) {
                    	$this->widget('bootstrap.widgets.TbButton', array(
                    			'label'=>'Desconfirmar Planilla',
                    			'type'=>'warning',
                    			'htmlOptions'=>array(
                    					'onclick'=>'js:bootbox.confirm("¿Esta seguro que desea desconfirmar la planilla?",
                    					function(confirmed){
                    					if(confirmed === true)
                    					{
                    					$.ajax({
                    					url: "'.$this->createUrl('adulto/desconfirmar').'",
                    					dataType: "json",
                    					data: {
                    					confirmar: confirmed,
                    					id: "'.$model->id_planilla.'",
                    	},
                    					success:  function(data) { window.location="'.Yii::app()->getRequest()->getUrl().'"; }
                    	})}})'
                    			),
                    	));
                    	}
                    	
                    	$this->widget("bootstrap.widgets.TbButton", array(
	                        "label"=>Yii::t('app', 'Delete'),"type"=>"inverse",
	                        "type"=>"danger",
	                        "icon"=>"icon-remove icon-white",
	                        "htmlOptions"=> array(
	                            "submit"=>array("delete","id"=>$model->{$model->tableSchema->primaryKey}, "returnUrl"=>Yii::app()->request->getParam("returnUrl")),
	                            "confirm"=>"¿Desea borrar esta planilla?")
	                         )
	                    );
	                }
	                
	                        $this->widget("bootstrap.widgets.TbButton", array(
	                 		"label"=>Yii::t('app', 'Exportar a PDF'),'type' => 'danger',
							'type' => 'danger',
	                		"icon"=>"icon-print icon-white",
	                		"url"=>array("imprimirLocalizacion")
	                )); 
?>
    
	</div>
	
</div>
<?php if ($model->confirmado == 0) {?>
<div id="yw116"><div class="alert in alert-block fade alert-error"><strong>Importante!</strong> Una vez CONFIRMADA la planilla no se podra ACTUALIZAR.</div></div>
<?php } else {?>
<div id="yw118"><div class="alert in alert-block fade alert-error"><strong>Planilla confirmada!</strong> No se puede realizar modificaciones.</div></div>
<?php }?>

<div class='printableArea'>
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Datos de la Planilla',
	'headerIcon' => 'icon-th-list',
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
	'id_planilla',
	'mes',
	'anio',
	array(
		'name' => 'idEstablecimiento',
		'type' => 'raw',
		'value' => $model->idEstablecimiento !== null ? (GxHtml::valueEx($model->idEstablecimiento)) : null,
		),
	array(
		'name' => 'idLocalizacion',
		'type' => 'raw',
		'value' => $model->idLocalizacion !== null ? (GxHtml::valueEx($model->idLocalizacion)) : null,
		),
	array(
		'name' => 'idTipoPlanilla',
		'type' => 'raw',
		'value' => $model->idTipoPlanilla !== null ? (GxHtml::valueEx($model->idTipoPlanilla)) : null,
		),
	'ingresador',
	'dom_act',
	'telefono',
	/*array(
		'name'=>'create_at',
		'label'=>'Fecha de Creacion',
	),
	array(
		'name' => 'responsable',
		'type' => 'raw',
	    'value' => $model->idEstablecimiento->idResponsable !== null ? (GxHtml::valueEx($model->idEstablecimiento->idResponsable->apellido)) : null,
	),*/
	array(
		'name' => 'confirmado',
		'type' => 'raw',
		'value' => $model->confirmado == 1 ? 'Si' : 'No',
	),
	),
	
		
)); ?>
<?php $this->endWidget();?>


<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Detalle de la Planilla',
	'headerIcon' => 'icon-th-list',
	// when displaying a table, if we include bootstra-widget-table class
	// the table will be 0-padding to the box
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<?php 
$this->widget('bootstrap.widgets.TbGroupGridView', array(
    'type'=>'striped bordered condensed',
	'dataProvider' => AdultoPrimaria::model()->getGridDataProvider($model->id_planilla),
	'template' => "{items}",
	//'extraRowColumns'=> array('id_localizacion'),
	'columns' => array(
	/* 	array(
			'header'=>'Nivel',
			'name'=>'id_nivel',
			'value'=>'GxHtml::valueEx($data->idNivel)',
			'filter'=>GxHtml::listDataEx(NivelServicio::model()->findAllAttributes(null, true)),
			), */
		array(
			'header'=>'Sala/Ciclo/Año',
			'name'=>'id_sala_ciclo_anio',
			'value'=>'GxHtml::valueEx($data->idSalaCicloAnio)',
			'filter'=>GxHtml::listDataEx(SalaCicloAnio::model()->findAllAttributes(null, true)),
			),
        array(
			'name'=>'id_turno',
			'value'=>'GxHtml::valueEx($data->idTurno)',
			'filter'=>GxHtml::listDataEx(Turno::model()->findAllAttributes(null, true)),
			),
		array(
			'name'=>'nombre_seccion',
			'header'=>'Nombre Seccion',
		),
		array(
			'name'=>'id_seccion',
			'value'=>'GxHtml::valueEx($data->idSeccion)',
			'filter'=>GxHtml::listDataEx(Seccion::model()->findAllAttributes(null, true)),
			'footer'=>'Total Alumnos'),
		/* array(
			'name'=>'id_orientacion',
			'value'=>'GxHtml::valueEx($data->idOrientacion)',
			'filter'=>GxHtml::listDataEx(Orientacion::model()->findAllAttributes(null, true)),
		
		 */
		array(
			'name'=>'alu_mat_tot',
	    	'header'=>'Total Alumnos',
			'class'=>'bootstrap.widgets.TbTotalSumColumn'
		),
		array(
			'name'=>'alu_mat_var',
			'header'=>'Total Varones',
			'class'=>'bootstrap.widgets.TbTotalSumColumn'
		),
		array(
			'name'=>'alu_mat_muj',
	    	'header'=>'Total Mujeres',
			'class'=>'bootstrap.widgets.TbTotalSumColumn'
		),			
		/* array(
			'name'=>'asistencia_medica',
			'header'=>'Asis. Med.',
			'class'=>'bootstrap.widgets.TbTotalSumColumn'
		), */

		
			
	),
	'mergeColumns' => array('id_sala_ciclo_anio','id_turno','id_seccion')
));?>
<?php $this->endWidget();?>

<style type="text/css">
table.tableizer-table {
	border: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;

} 
.tableizer-table td {
	padding: 15px 15px 8px 10px;
	margin: 3px;
	border: 1px solid #ccc;
}
.tableizer-table th {
	background-color: #c3d9ff; 
	color: rgb(2, 2, 2);
	font-weight: bold;
}
</style>

<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Cantidad de secciones / divisiones',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
	
<table align="center" class="tableizer-table">
<tr class="tableizer-firstrow">
	<th>&nbsp;</th>
	<th>Totales</th>
	<th>Alfabetización</th>
	<th>Primario</th>
	</tr>
 <tr>
 <td>Independientes   </td>
   <td>&nbsp;<?php echo $model->alu_tot_ind;?></td>
   <td bgcolor="#CCFFFF">&nbsp;<?php echo $model->tot_ind_alf ;?></td>
   <td bgcolor="#CCFFFF">&nbsp;<?php echo $model->tot_ind_pri ;?></td>
   </tr>
 <tr>
   <td>Múltiples   </td>
   <td>&nbsp;<?php echo $model->alu_tot_mul ;?></td>
   <td bgcolor="#CCFFFF">&nbsp;<?php echo $model->tot_mul_alf ;?></td>
   <td bgcolor="#CCFFFF">&nbsp;<?php echo $model->tot_mul_pri ;?></td>
   </tr>
 <tr>
	 <td>Total</td>
	 <td>&nbsp;<?php echo $model->alu_mul_ind ;?></td>
	 <td>&nbsp;<?php echo $model->alu_tot_alf ;?></td>
	 <td>&nbsp;<?php echo $model->alu_tot_pri ;?></td>
    </tr>
 </table>
<?php $this->endWidget();?>
 
 	  
	  <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Cantidad de Beneficiarios de Servicios de Alimentacion',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
  </p>
  
	
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
			<td width="254" bgcolor="#104E8B"><span class="">CANTIDAD DE BENEFICIARIOS DE SERVICIOS DE ALIMENTACION</span></td>
			<td width="48" bgcolor="#104E8B" class="">TOTAL</td>
	  </tr>
		<tr>
			<td bgcolor="#FFFFFF">ALMUERZO</td>
			<td bgcolor="#99FFCC"><?php echo $model->tot_alm_ben;?></td>
	  </tr>
		<tr>
			<td bgcolor="#FFFFFF">COPA DE LECHE</td>
			<td bgcolor="#99FFCC"><?php echo $model->tot_cop_man;?></td>
	  </tr>
		<tr>
			<td bgcolor="#FFFFFF">REFRIGERIO / MERIENDA REFORZADA: </td>
			<td bgcolor="#99FFCC"><?php echo $model->tot_ref_man;?></td>
	  </tr>
		<tr>
		  <td bgcolor="#FFFFFF">Otros Servicios Alimentarios</td>
		  <td bgcolor="#99FFCC"><?php echo $model->tot_ref_tar;?></td>
	  </tr>
	</table>


	<p>
  <?php $this->endWidget(); ?>	

<div class="form-actions" style="text-align: center;">
 	
	<?php if ($model->confirmado == 0) {
			$this->widget('bootstrap.widgets.TbButton', array(
				'label'=>'Confirmar Planilla',
				'type'=>'danger',
				'htmlOptions'=>array(
					'onclick'=>'js:bootbox.confirm("¿Esta seguro que desea confirma la planilla?",
					function(confirmed){
						if(confirmed === true)
						{
						$.ajax({
						url: "'.$this->createUrl('adulto/confirmar').'",
						dataType: "json",
						data: {
								confirmar: confirmed,
								id: "'.$model->id_planilla.'",
	                          },
						success:  function(data) { window.location="'.Yii::app()->getRequest()->getUrl().'"; }
                 })}})'
				),
			));}?>
			
			
			
	<?php /*echo CHtml::Button('Accept', array('submit' =>Yii::app()->createUrl("/adsBanner/accept", array("id" => $model->id_planilla)),'onClick'=>'confirm("Are you sure?")','name'=>'accept'));
	*/?>
  </div>
</div>
<style type="text/css" media="print">
body {visibility:hidden;}
.printableArea{visibility:visible;} 
</style>
<script type="text/javascript">
function printDiv()
{

window.print();

}
</script>