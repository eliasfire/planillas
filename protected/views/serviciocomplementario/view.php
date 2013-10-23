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
.qq {
	color: #FFF;
}
.printableArea .tableizer-table {
	font-weight: bold;
}
</style>
  

<h1>
    Planilla - Servicios Complementarios <small><?php echo Yii::t('app', 'View'); ?> #<?php echo $model->id_planilla ?></small></h1>

<hr />

<div class="btn-toolbar">
    <div class="btn-group">
<?php  
		if (Yii::app()->user->checkAccess('Administrador'))
		{
			$this->widget("bootstrap.widgets.TbButton", array(
					"label"=>Yii::t('app', 'Manage'),'type'=>'primary',
					"icon"=>"icon-list-alt icon-white",
					"url"=>array('/administrador/admin')
			));
		}
		else {
			$this->widget("bootstrap.widgets.TbButton", array(
					"label"=>Yii::t('app', 'Manage'),'type'=>'primary',
					"icon"=>"icon-list-alt icon-white",
					"url"=>array('/ingresador/admin')
			));
		}
		if ($model->confirmado == 0) {
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t('app', 'Update'),'type'=>'warning',
                        "icon"=>"icon-edit icon-white",
                        "url"=>array("update","id"=>$model->{$model->tableSchema->primaryKey})
                    )); }
                    /*
                    $this->widget("bootstrap.widgets.TbButton", array(
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
                    					url: "'.$this->createUrl('serviciocomplementario/desconfirmar').'",
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
	                        "type"=>"inverse",
	                        "icon"=>"icon-remove icon-white",
	                        "htmlOptions"=> array(
	                            "submit"=>array("delete","id"=>$model->{$model->tableSchema->primaryKey}, "returnUrl"=>Yii::app()->request->getParam("returnUrl")),
	                            "confirm"=>"¿Desea borrar esta planilla?")
	                         )
	                    );
	                }
	                
	                $this->widget("bootstrap.widgets.TbButton", array(
	                		"label"=>Yii::t('app', 'Exportar a PDF'),'type' => 'danger',
	                		"icon"=>"icon-edit icon-white",
	                		"url"=>array("imprimirLocalizacion")
	                ));
				?>

    
	</div>
	
</div>

<?php if ($model->confirmado == 0) {

	$this->widget(
    'bootstrap.widgets.TbLabel',
    array(
        'type' => 'info',
        'label' => 'Importante! Una vez CONFIRMADA la planilla no se podra ACTUALIZAR.',
    )
);?>
<!-- <div id="yw116"><div class="alert in alert-block fade alert-error"><strong>Importante!</strong> Una vez CONFIRMADA la planilla no se podra ACTUALIZAR.</div></div>
 -->
<?php } else {

	$this->widget(
    'bootstrap.widgets.TbLabel',
    array(
        'type' => 'inverse',
        'label' => 'Planilla confirmada! No se puede realizar modificaciones.',
    )
);?>
<!-- <div id="yw118"><div class="alert in alert-block fade alert-error"><strong>Planilla confirmada!</strong> No se puede realizar modificaciones.</div></div>
 -->
<?php }?>


<div class='printableArea'>
<p>
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
	'dataProvider' => ServicioComplementario::model()->getGridDataProvider($model->id_planilla),
	'template' => "{items}",
	//'extraRowColumns'=> array('id_localizacion'),
	'columns' => array(
		array(
			'name'=>'nombre_taller',
			'header'=>'Descripcion de taller',
		),
		array(
			'name'=>'id_caracter_actividad',
			'value'=>'GxHtml::valueEx($data->idCaracterActividad)',
			'filter'=>GxHtml::listDataEx(CaracterActividad::model()->findAllAttributes(null, true)),
		),
        array(
			'name'=>'id_turno',
			'value'=>'GxHtml::valueEx($data->idTurno)',
			'filter'=>GxHtml::listDataEx(Turno::model()->findAllAttributes(null, true)),
			'footer'=>'Total Alumnos'),
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
	
		/*'alu_rep_tot',
		'alu_rep_var',
		'alu_rep_muj',
		'nec_esp_edu',
		'alu_ser_tot',
		'alu_ser_var',
		'alu_ser_muj',
		'alu_obl_tot',
		'alu_obl_var',
		'alu_obl_muj',
		'alu_opt_tot',
		'alu_opt_var',
		'alu_opt_muj',*/
		
		/*array(
			'name'=>'id_planilla',
			'value'=>'GxHtml::valueEx($data->idPlanilla)',
			'filter'=>GxHtml::listDataEx(Planilla::model()->findAllAttributes(null, true)),
			),
		'nombre_taller',
		'id_actividad_taller',
		*/
			
	),
	'mergeColumns' => array('id_localizacion','id_nivel')
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
	/* background-color: #c3d9ff; 
	color: rgb(2, 2, 2); */
	font-weight: bold;
}
</style>
  
  <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Cantidad de secciones / divisiones',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
</p>
<p>&nbsp; </p>
<table align="center" class="tableizer-table">
  <tr class="qq">
	<th bgcolor="#104E8B">&nbsp;</th>
	<th bgcolor="#104E8B">Totales</th>
	<th bgcolor="#104E8B">Varones</th>
	<th bgcolor="#104E8B">Mujeres</th>
	</tr>
 <tr>
 <td><strong>Total Alumnos (debe contar a cada alumna una sola vez) </strong></td>
   <td>&nbsp;<?php echo $model->tot_alu_act;?></td>
   <td bgcolor="#99FFCC">&nbsp;<?php echo $model->tot_act_var ;?></td>
   <td bgcolor="#99FFCC">&nbsp;<?php echo $model->tot_act_muj ;?></td>
   </tr>
 <tr>
   <td><strong>Alumnos con actividades obligatorias </strong></td>
   <td>&nbsp;<?php echo $model->alu_obl_tot ;?></td>
   <td bgcolor="#99FFCC">&nbsp;<?php echo $model->alu_obl_var ;?></td>
   <td bgcolor="#99FFCC">&nbsp;<?php echo $model->alu_obl_muj ;?></td>
   </tr>
 <tr>
	 <td><strong>Alumnos en actividades optativas/voluntarias</strong></td>
	 <td>&nbsp;<?php echo $model->alu_opt_tot ;?></td>
	 <td>&nbsp;<?php echo $model->alu_opt_var ;?></td>
	 <td>&nbsp;<?php echo $model->alu_opt_muj ;?></td>
    </tr>
 </table>
<?php $this->endWidget();?>
 

<div class="form-actions" style="text-align: center;">
 	
	<?php if ($model->confirmado == 0) {
			$this->widget('bootstrap.widgets.TbButton', array(
				'label'=>'Confirmar Planilla',
				'type'=>'warning',
				'htmlOptions'=>array(
					'onclick'=>'js:bootbox.confirm("¿Esta seguro que desea confirma la planilla?",
					function(confirmed){
						if(confirmed === true)
						{
						$.ajax({
						url: "'.$this->createUrl('serviciocomplementario/confirmar').'",
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