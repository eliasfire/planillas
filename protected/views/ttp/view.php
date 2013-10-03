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
	color: #000;
	text-align: center;
}
.qq {
	color: #000;
}
.tt {
	color: #FFF;
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
	                		"url"=>array("PlanillaIfttp")
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
	text-align: center;
	font-weight: bold;
}
    </style>
</p>
<p>&nbsp; </p>
<table align="center" class="tableizer-table">
	  <tr class="tableizer-firstrow">
			<th width="522" bgcolor="#0066CC" class="tt">ALUMNOS MATRICULADOS</th>
			<th width="48" bgcolor="#0066CC">&nbsp;</th>
			<th colspan="5" bgcolor="#0066CC" class="tt">ALUMNOS POR TURNO (si un alumno
				concurre a más de un turno, contarlo en cada uno de ellos)</th>
		</tr>
		<tr>
			<td bgcolor="#0066CC"><span class="tt"><span class="ee"> Se debe contar a cada alumno
					una sola vez--------&gt;</span></span></td>
			<td bgcolor="#0066CC" class="ww"><span class="tt">TOTAL</span></td>
			<td width="114" bgcolor="#0066CC" class="tt">Mañana</td>
			<td width="124" bgcolor="#0066CC" class="tt">Tarde</td>
			<td width="126" bgcolor="#0066CC" class="tt">Vespertino</td>
			<td width="131" bgcolor="#0066CC" class="tt">Noche</td>
			<td width="99" bgcolor="#0066CC" class="tt">Doble</td>
		</tr>
		<tr>
			<td class="qq">TOTAL de Alumnos matriculados en Itinerarios Formativos
				exclusivamente:</td>
			<td><?php echo $model->tot_alu_iti;?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $model->tot_iti_man;?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $model->tot_iti_tar;?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $model->tot_iti_ves;?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $model->tot_iti_noc;?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $model->tot_iti_dob;?>
			</td>
		</tr>
		<tr>
			<td class="qq">TOTAL de Alumnos matriculados en Trayectos Técnicos Profesionales
				exclusivamente:</td>
			<td><?php echo $model->tot_alu_ttp;?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $model->tot_ttp_man;?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $model->tot_ttp_tar;?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $model->tot_ttp_ves;?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $model->tot_ttp_noc;?>
			</td>
			<td class="qq" bgcolor="#99FFCC"><?php echo $model->tot_ttp_dob;?>
			</td>
		</tr>
		<tr>
			<td class="qq">Total de Alumnos en I.F. Y T.T.P.:</td>
			<td><?php echo $model->tot_iti_ttp;?>
			</td>
			<td><?php echo $model->tot_alu_man;?>
			</td>
			<td><?php echo $model->tot_alu_tar;?>
			</td>
			<td><?php echo $model->tot_alu_ves;?>
			</td>
			<td><?php echo $model->tot_alu_noc;?>
			</td>
			<td><?php echo $model->tot_alu_dob;?>
			</td>
		</tr>
	</table>


	<p>
	  <?php $this->endWidget();?>
	  
  	<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Itinerario Formativo',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>

  <?php 
$this->widget('bootstrap.widgets.TbGroupGridView', array(
    'type'=>'striped bordered condensed',
	'dataProvider' => Itinerario::model()->getGridDataProvider($model->id_planilla),
	'template' => "{items}",
	//'extraRowColumns'=> array('id_localizacion'),
	'columns' => array(
		array(
			'name'=>'nombre_itinerario',
			'header'=>'Descripcion de Itinerario',
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
	),
	'mergeColumns' => array('id_turno')
));?>
  <?php $this->endWidget();?>
  
   
    
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => 'Trayecto Tecnico Profesional',
	'headerIcon' => 'icon-th-list',
	'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
  <?php 
$this->widget('bootstrap.widgets.TbGroupGridView', array(
    'type'=>'striped bordered condensed',
	'dataProvider' => Ttp::model()->getGridDataProvider($model->id_planilla),
	'template' => "{items}",
	//'extraRowColumns'=> array('id_localizacion'),
	'columns' => array(
		array(
			'name'=>'nombre_ttp',
			'header'=>'Descripcion de Ttp',
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
	),
	'mergeColumns' => array('id_turno')
));?>
  <?php $this->endWidget();?>
  
  

    <p>    
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