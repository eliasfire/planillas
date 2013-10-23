<?php echo $this->renderPartial('/ingresador/_datosglobales'); ?>

<style type="text/css">
.fff {
	color: #FFF;
	font-weight: bold;
}
.printableArea .tableizer-table tr td .qq {
	color: #FFF;
}
.printableArea .tableizer-table tr td {
	font-weight: bold;
}
</style>


<h1>
    Planilla - Educación Común - Nivel Secundario - Polimodal <small><?php echo Yii::t('app', 'View'); ?> #<?php echo $model->id_planilla ?></small></h1>

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
                    					url: "'.$this->createUrl('secundariopolimodal/desconfirmar').'",
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
	                		"icon"=>"icon-edit icon-white",
	                		"url"=>array("imprimirLocalizacion")
	                ));
				?>
    
	</div>
	
</div>
<p>
  <?php if ($model->confirmado == 0) {
	$this->widget(
    'bootstrap.widgets.TbLabel',
    array(
        'type' => 'info',
        'label' => 'Importante! Una vez CONFIRMADA la planilla no se podra ACTUALIZAR.',
    )
);?>
  <?php } else {
	$this->widget(
    'bootstrap.widgets.TbLabel',
    array(
        'type' => 'inverse',
        'label' => 'Planilla confirmada! No se puede realizar modificaciones.',
    )
);?>
  <?php }?>
</p>
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
	'dataProvider' => SecundarioPolimodal::model()->getGridDataProvider($model->id_planilla),
	'template' => "{items}",
	//'extraRowColumns'=> array('id_localizacion'),
	'columns' => array(
		array(
			'header'=>'Nivel',
			'name'=>'id_nivel',
			'value'=>'GxHtml::valueEx($data->idNivel)',
			'filter'=>GxHtml::listDataEx(NivelServicio::model()->findAllAttributes(null, true)),
			),
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
			),
		array(
			'name'=>'id_orientacion',
			'value'=>'GxHtml::valueEx($data->idOrientacionTipo)',
			'filter'=>GxHtml::listDataEx(OrientacionTipo::model()->findAllAttributes(null, true)),
			'footer'=>'Total Alumnos'),

/* 		array(
			'name'=>'id_titulo',
			'value'=>'GxHtml::valueEx($data->idTitulo)',
			'filter'=>GxHtml::listDataEx(TituloTipo::model()->findAllAttributes(null, true)),
			'footer'=>'Total Alumnos'),
 */
		array(
			'name'=>'alu_mat_tot',
	    	'header'=>'Total Matriculados',
			'class'=>'bootstrap.widgets.TbTotalSumColumn'
		),
		array(
			'name'=>'alu_mat_var',
			'header'=>'Total Varones Mat',
			'class'=>'bootstrap.widgets.TbTotalSumColumn'
		),
		array(
			'name'=>'alu_mat_muj',
	    	'header'=>'Total Mujeres Mat',
			'class'=>'bootstrap.widgets.TbTotalSumColumn'
		),	
		/* array(
		'name'=>'nec_esp_edu',
		'header'=>'Nec. Esp.',
		'class'=>'bootstrap.widgets.TbTotalSumColumn'
), */
array(
		'name'=>'alu_rep_tot',
		'header'=>'Total Repitentes',
		'class'=>'bootstrap.widgets.TbTotalSumColumn'
),
array(
		'name'=>'alu_rep_var',
		'header'=>'Total Varones Rep',
		'class'=>'bootstrap.widgets.TbTotalSumColumn'
),
array(
		'name'=>'alu_rep_muj',
		'header'=>'Total Mujeres Rep',
		'class'=>'bootstrap.widgets.TbTotalSumColumn'
),

/* array(
		'name'=>'alu_med_tot',
		'header'=>'Tot Alu Asis Med',
		'class'=>'bootstrap.widgets.TbTotalSumColumn'
),
array(
		'name'=>'alu_med_var',
		'header'=>'Tot Var Asis Med',
		'class'=>'bootstrap.widgets.TbTotalSumColumn'
),
array(
		'name'=>'alu_med_muj',
		'header'=>'Tot Muj Asis Med',
		'class'=>'bootstrap.widgets.TbTotalSumColumn'
), */

			
	),
	'mergeColumns' => array('id_nivel','id_sala_ciclo_anio','id_turno','id_seccion','id_orientacion')
));?>
  <?php $this->endWidget();?>
  
  
  <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Cantidad de Secciones/Divisiones',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
  
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
</p>
<div class='printableArea'>
  <table align="left" class="tableizer-table">
	  <tr>
			<td bgcolor="#0066CC"><span class="fff"><span class="blanco">TOTAL INDEPENDIENTES</span></span></td>
			<td bgcolor="#0066CC" class="blanco"><span class="fff">TOTAL</span></td>
		</tr>
		<tr>
		  <td>de Secundario C.B. (1, 2 y 3)</td>
		  <td bgcolor="#99FFCC"><?php echo $model->tot_ind_sec;?></td>
	  </tr>
		<tr>
		  <td>Polimodal</td>
		  <td bgcolor="#99FFCC"><?php echo $model->tot_ind_pol;?></td>
	  </tr>
	</table>
  <table align="center" class="tableizer-table">
	  <tr>
	    <td bgcolor="#0066CC"><span class="fff"><span class="blanco">TOTAL MULTIPLES</span></span></td>
	    <td bgcolor="#0066CC" class="blanco"><span class="fff">TOTAL</span></td>
      </tr>
	  <tr>
	    <td>alumnos de Secundario exclusivamente</td>
	    <td bgcolor="#99FFCC"><?php echo $model->tot_mul_sex;?></td>
    </tr>
	  <tr>
	    <td>alumnos de Polimodal exclusivamente</td>
	    <td bgcolor="#99FFCC"><?php echo $model->tot_mul_pex;?></td>
    </tr>
  </table>
	<p>&nbsp;</p>
	<table align="left" class="tableizer-table">
	  <tr>
	    <td width="255" bgcolor="#0066CC"><span class="fff">TOTAL DE SECCIONES/DIVISIONES</span></td>
	    <td width="50" bgcolor="#FFFFFF" class="blanco"><?php echo $model->tot_sec_div;?></td>
      </tr>
  </table>
	<p>&nbsp;</p>
	<p>
	  <?php $this->endWidget(); ?>
  </p>
	<p>

	 	  
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
		<tr>
			<td width="322" bgcolor="#0066CC"><span class="qq"><span class="blanco">CANTIDAD DE BENEFICIARIOS DE SERVICIOS DE ALIMENTACION</span></span></td>
			<td width="49" bgcolor="#0066CC" class="blanco"><span class="qq">TOTAL</span></td>
		</tr>
		<tr>
			<td class="ww">ALMUERZO</td>
			<td bgcolor="#99FFCC"><?php echo $model->tot_alm_ben;?></td>
		</tr>
		<tr>
			<td class="ww">COPA DE LECHE: Turno Mañana</td>
			<td bgcolor="#99FFCC"><?php echo $model->tot_cop_man;?></td>
		</tr>
		<tr>
			<td class="ww">COPA DE LECHE: Turno Tarde</td>
			<td bgcolor="#99FFCC"><?php echo $model->tot_cop_tar;?></td>
		</tr>
		<tr>
			<td class="ww">Refrigerio / Merienda Reforzada - Turno Mañana</td>
			<td bgcolor="#99FFCC"><?php echo $model->tot_ref_man;?></td>
		</tr>
		<tr>
		  <td class="ww">Refrigerio / Merienda Reforzada - Turno Tarde</td>
		  <td bgcolor="#99FFCC"><?php echo $model->tot_ref_tar;?></td>
	  </tr>
		<tr>
		  <td class="ww">Otros Servicios Alimentarios: <?php echo $model->ser_ali_esp;?></td>
		  <td bgcolor="#99FFCC"><?php echo $model->otr_ser_ali;?></td>
	  </tr>
	</table>
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
						url: "'.$this->createUrl('secundariopolimodal/confirmar').'",
						dataType: "json",
						data: {
								confirmar: confirmed,
								id: "'.$model->id_planilla.'",
	                          },
						success:  function(data) { window.location="'.Yii::app()->getRequest()->getUrl().'"; }
                 })}})'
				),
			));} 
	?>
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