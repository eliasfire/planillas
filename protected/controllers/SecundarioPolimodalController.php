<?php

class SecundarioPolimodalController extends GxController {

/* 
 	 public function filters()
	{
		return array(
				'rights', // perform access control for CRUD operations
		);
	}  */
	 
	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array('index','view','selectorientacion','selectplandeestudio','calcula','confirmar','imprimirlocalizacion'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('create','update'),
						'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('admin','delete'),
						'users'=>array('admin'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	} 
	
	public function actionView($id) {
		Yii::app()->getSession()->add('id_planilla',$id);
		
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Planilla'),
		));
	}

	public function actionCreate() {
		Yii::import('ext.multimodelform.MultiModelForm');
		
		$establecimiento = Establecimiento::model()->find('id_establecimiento = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_establecimiento')));
        $responsable = Responsable::model()->find('id_responsable = :id_est', array(':id_est'=>$establecimiento->id_responsable));
		$localizacion = Localizacion::model()->find('id_localizacion = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_localizacion')));
                
        $model = new Planilla('secundaria');
        $model->confirmado = false ;
        
		$detallePlanilla = new SecundarioPolimodal;
		
		$validatedDetalles = array();  
		/*
		echo "<PRE>";
		print_r($_POST);
		echo "</PRE>";*/

		if(isset($_POST['Planilla']))
		{
			$model->setAttributes($_POST['Planilla']);
			
			$model->id_establecimiento=Yii::app()->getSession()->get('id_establecimiento');
			$model->id_localizacion=Yii::app()->getSession()->get('id_localizacion');
			$model->mes= Yii::app()->getSession()->get('mesvigente');
			$model->anio= Yii::app()->getSession()->get('aniovigente');
			$model->id_tipo_planilla=6;
			$model->confirmado = 0 ;
			
			$detailOK = MultiModelForm::validate($detallePlanilla,$validatedDetalles,$deleteItems);

			if ($detailOK && empty($validatedDetalles))
			{
				//Yii::app()->user->setFlash('error','No detail submitted');
				Yii::app()->user->setFlash('info', '<strong>Planilla vacia!</strong> Debe agregar filas.');
				$detailOK = false;
			}

			if(
			    $detailOK &&
				$model->save()
				)
			{
				//the value for the foreign key 'groupid'
				$masterValues = array ('id_planilla'=>$model->id_planilla);

				if (MultiModelForm::save($detallePlanilla,$validatedDetalles,$deleteItems,$masterValues))
					$this->redirect(array('/ingresador/admin'));								
			}
		}
     
		$this->render('create',array(
			'model'=>$model,
			'detallePlanilla'=>$detallePlanilla,
			'validatedDetalles' => $validatedDetalles,
			'establecimiento' => $establecimiento,
			'localizacion'=>$localizacion,
		    'responsable'=>	$responsable
		));
	}

	public function actionUpdate($id)
	{
		 Yii::import('ext.multimodelform.MultiModelForm');
		
		$model=$this->loadModel($id,'Planilla');
		
		$establecimiento = Establecimiento::model()->find('id_establecimiento = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_establecimiento')));
		$responsable = Responsable::model()->find('id_responsable = :id_est', array(':id_est'=>$establecimiento->id_responsable));
		$localizacion = Localizacion::model()->find('id_localizacion = :id_uno',array(':id_uno'=>$model->id_localizacion));
		Yii::app()->getSession()->add('id_localizacion',$localizacion->id_localizacion);
				
		if ($model->confirmado == 1) {
			  Yii::app()->user->setFlash('error', '<strong>Planilla confirmada!</strong> No se puede modificar.');
			  $this->redirect(array('admin', 'id' => $model->id_planilla));
		}
		
		$detallePlanilla = new SecundarioPolimodal;
		$validatedDetalles = array(); //ensure an empty array

		if(isset($_POST['Planilla']))
		{
			$model->setAttributes($_POST['Planilla']);
			
			/* $model->id_establecimiento=Yii::app()->getSession()->get('id_establecimiento');
			$model->id_localizacion=Yii::app()->getSession()->get('id_localizacion');
			$model->ingresador =$_POST['Planilla']['ingresador'] ;
			$model->confirmado = 0 ;
					 */
			if(!isset($_POST['SecundarioPolimodal']))
			{
				if ($model->validate()) {
				if ($model->save()) {
					$this->redirect(array('/ingresador/admin'));								
				}}
			}
		}
		
		if(isset($_POST['SecundarioPolimodal']))
		{
			$masterValues = array ('id_planilla'=>$model->id_planilla);
				
			if( MultiModelForm::save($detallePlanilla,$validatedDetalles,$deletedMembers,$masterValues) &&
			$model->save()
			)
				$this->redirect(array('/ingresador/admin'));
		}
		
		$this->render('update',array(
			'model'=>$model,
			'detallePlanilla'=>$detallePlanilla,
			'validatedDetalles' => $validatedDetalles,
			'establecimiento' => $establecimiento,
			'localizacion'=>$localizacion,
			'responsable'=>	$responsable
		)); 
		
		
	}

	public function actionDelete($id) {
		/* if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Planilla')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.')); */
		$this->redirect(array('/ingresador/admin'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Planilla');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		

		$model = new Planilla('search');
		$model->unsetAttributes();

		if (isset($_GET['Planilla']))
			$model->setAttributes($_GET['Planilla']);

	/* 	$this->render('admin', array(
			'model' => $model,
		)); */
		
		$this->redirect(array('ingresador/admin'));
	}


	public function actionSelectdos()
	{
		$id_uno = $_POST['Planilla']['id_localizacion'];
		$lista = LocalizacionPlanilla::model()->find('id_localizacion = :id_uno',array(':id_uno'=>$id_uno));
	/*
		$lista = LocalizacionPlanilla::model()->findAll(array(
				'select'=>'d.id_tipo_planilla, d.descripcion',
				'condition'=>"id_localizacion = '$id_uno'",
				'join'=>'INNER JOIN tipo_planilla d ON d.id_tipo_planilla = t.id_tipo_planilla'));
	*/
		$lista = TipoPlanilla::model()->findAll(array(
				'select'=>'t.id_tipo_planilla, t.descripcion',
				'condition'=>"l.id_localizacion = '$id_uno'",
				'join'=>'INNER JOIN localizacion_planilla as l on t.id_tipo_planilla=l.id_tipo_planilla'));
		
		$lista = CHtml::listData($lista,'id_tipo_planilla','descripcion');
	
		echo CHtml::tag('option', array('value' => ''), 'Seleccione', true);
	
		foreach ($lista as $valor => $descripcion){
			echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );
	
		}
	}
	
	public function actionTest(){
		$idu=Yii::app()->user->id;
		$model = new Planilla;
		$establecimientousuario = UsuarioEstablecimiento::model()->find('id_usuario = :id_uno',array(':id_uno'=>$idu));
		$establecimiento = Establecimiento::model()->find('id_establecimiento = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_establecimiento')));
		
		$id = $_POST['Planilla']['id_tipo_planilla'];
		if ($id == 2) {	
		
		$sql="select id_nivel, id_sala_ciclo_anio, id_turno, id_seccion, id_orientacion, 
			  alu_mat_tot, alu_mat_var, alu_mat_muj, nec_esp_edu ";
	
		$DetallePlanilla = 	TipoPlanilla::model()->findAll();
	
		$model=new DetallePlanilla();
		
		//create an array with one model Pogo
		$data = array($model);
	
			$this->renderPartial('_secciones', array(
					'model'=>$model,
					'data'=>$data,
					'establecimiento' => $establecimiento
				  
			));
		
		echo "</table>";
	 }	else 
	 {		$model=new DetallePlanilla();
		
		//create an array with one model Pogo
		$data = array($model);
	 	$this->renderPartial('_servcomp',array(
					'data'=>$data,
			));
	 }
	}
	
	public function actionSelectnivel()
	{
		$id_uno = $_POST['id'];

		$lista = SalaCicloAnio::model()->findAll(array(
				'select'=>'t.id_sala_ciclo_anio, t.descripcion',
				'condition'=>"t.id_nivel = '$id_uno'"));

		$lista = CHtml::listData($lista,'id_sala_ciclo_anio','descripcion');

		echo CHtml::tag('option', array('value' => ''), 'Seleccione', true);

		foreach ($lista as $valor => $descripcion){
			echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );

		}
	}
	
	public function actionSelectorientacion()
	{
		/* echo "<PRE>";
		print_r($_POST);
		echo "</PRE>"; */

		$id_uno = $_POST['id'];
		$id_localizacion= Yii::app()->getSession()->get('id_localizacion');

		/* 		$lista = SalaCicloAnio::model()->findAll(array(
		 'select'=>'t.id_sala_ciclo_anio, t.descripcion',
				'condition'=>"t.id_nivel = '$id_uno'"));

		$lista = CHtml::listData($lista,'id_sala_ciclo_anio','descripcion'); */

		$sql = "Select
		orientacion_tipo.c_orientacion,
		orientacion_tipo.descripcion
		From
		oferta_local Inner Join
		oferta_tipo On oferta_local.c_oferta = oferta_tipo.c_oferta Inner Join
		localizacion On oferta_local.id_localizacion = localizacion.id_localizacion
		Inner Join
		establecimiento On localizacion.id_establecimiento =
		establecimiento.id_establecimiento Inner Join
		estado_tipo On oferta_local.c_estado = estado_tipo.c_estado And
		localizacion.c_estado = estado_tipo.c_estado And establecimiento.c_estado =
		estado_tipo.c_estado Inner Join
		titulo_oferta_tipo On titulo_oferta_tipo.c_oferta = oferta_tipo.c_oferta
		Inner Join
		titulo_tipo On titulo_oferta_tipo.c_titulo = titulo_tipo.c_titulo Inner Join
		plan_estudio_local On plan_estudio_local.id_oferta_local =
		oferta_local.id_oferta_local And plan_estudio_local.c_titulo_oferta =
		titulo_oferta_tipo.c_titulo_oferta Inner Join
		plan_estudio_local_secundaria
		On plan_estudio_local_secundaria.id_plan_estudio_local =
		plan_estudio_local.id_plan_estudio_local Inner Join
		orientacion_tipo On plan_estudio_local_secundaria.c_orientacion =
		orientacion_tipo.c_orientacion
		Where
		titulo_tipo.c_titulo= '$id_uno' and
		localizacion.id_localizacion = '$id_localizacion' And
		oferta_local.c_estado = 1 And
		plan_estudio_local.c_requisito <> 2 ";

		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$lista = $command->queryAll();
		$lista = CHtml::listData($lista,'c_orientacion','descripcion');

		echo CHtml::tag('option', array('value' => ''), 'Seleccione', true);

		foreach ($lista as $valor => $descripcion){
			echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );

		}
	}
	
	public function actionSelectplandeestudio()
	{
		/* echo "<PRE>";
		print_r($_POST);
		echo "</PRE>"; */

		$id_uno = $_POST['id'];
		$id_localizacion= Yii::app()->getSession()->get('id_localizacion');



		$sql = "Select
		titulo_tipo.c_titulo,
		titulo_tipo.descripcion
		From
		oferta_local Inner Join
		oferta_tipo On oferta_local.c_oferta = oferta_tipo.c_oferta Inner Join
		localizacion On oferta_local.id_localizacion = localizacion.id_localizacion
		Inner Join
		establecimiento On localizacion.id_establecimiento =
		establecimiento.id_establecimiento Inner Join
		estado_tipo On oferta_local.c_estado = estado_tipo.c_estado And
		localizacion.c_estado = estado_tipo.c_estado And establecimiento.c_estado =
		estado_tipo.c_estado Inner Join
		titulo_oferta_tipo On titulo_oferta_tipo.c_oferta = oferta_tipo.c_oferta
		Inner Join
		titulo_tipo On titulo_oferta_tipo.c_titulo = titulo_tipo.c_titulo Inner Join
		plan_estudio_local On plan_estudio_local.id_oferta_local =
		oferta_local.id_oferta_local And plan_estudio_local.c_titulo_oferta =
		titulo_oferta_tipo.c_titulo_oferta Inner Join
		plan_estudio_local_secundaria
		On plan_estudio_local_secundaria.id_plan_estudio_local =
		plan_estudio_local.id_plan_estudio_local Inner Join
		orientacion_tipo On plan_estudio_local_secundaria.c_orientacion =
		orientacion_tipo.c_orientacion
		Where
		orientacion_tipo.c_orientacion = '$id_uno' And
		localizacion.id_localizacion = '$id_localizacion' And
		oferta_local.c_estado = 1 And
		plan_estudio_local.c_requisito <> 2 ";

		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$lista = $command->queryAll();
		$lista = CHtml::listData($lista,'c_titulo','descripcion');

		echo CHtml::tag('option', array('value' => ''), 'Seleccione', true);

		foreach ($lista as $valor => $descripcion){
			echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );

		}
	}

	public function actionCalcula() {
		/*echo "<PRE>";
		print_r($_POST);
		echo "</PRE>";*/
		
		$total = $_POST['alu_mat_tot'];
		$varones = $_POST['alu_mat_var'];
		
		$mujeres = $total - $varones;
		
		$_POST['alu_mat_muj'] = $mujeres;
		echo $mujeres;
	}
	
	public function actionAjax()
	{
				
		$DetallePlanilla = 	TipoPlanilla::model()->findAll();
		// do what you have to do
		$this->renderPartial('_secciones',
				array(
					'model' => $DetallePlanilla,));
	}
	
	// on your controller
	// example code for action rendering the relational data
	public function actionRelational()
	{
			$id = Yii::app()->getRequest()->getParam('id');
	        $this->renderPartial('_relation', array(
	            'id' => $id,
				'gridDataProvider' => DetallePlanilla::model()->getGridDataProvider($id),
				'gridColumns' => $this->getGridColumns()
		));
	}
	
		
	public function getGridColumns(){
		
		 $gridColumns = array(
		 array(
		 	'header'=>'Localizacion',
		 	'name'=>'id_localizacion',
		    'value'=>'GxHtml::valueEx($data->idLocalizacion)',
		 	'filter'=>GxHtml::listDataEx(Localizacion::model()->findAllAttributes(null, true)),
		      ),
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
			'name'=>'id_seccion',
			'value'=>'GxHtml::valueEx($data->idSeccion)',
			'filter'=>GxHtml::listDataEx(Seccion::model()->findAllAttributes(null, true)),
			),
		array(
			'name'=>'id_orientacion',
			'value'=>'GxHtml::valueEx($data->idOrientacion)',
			'filter'=>GxHtml::listDataEx(Orientacion::model()->findAllAttributes(null, true)),
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
		array(
			'name'=>'alu_rep_tot',
			'header'=>'Total Alumnos',
			'class'=>'bootstrap.widgets.TbTotalSumColumn'
		),
		array(
			'name'=>'alu_rep_var',
			'header'=>'Total Varones',
			'class'=>'bootstrap.widgets.TbTotalSumColumn'
		),
		array(
			'name'=>'alu_rep_muj',
			'header'=>'Total Mujeres',
			'class'=>'bootstrap.widgets.TbTotalSumColumn'
		),
		array(
			'name'=>'nec_esp_edu',
			'header'=>'Nec. Esp.',
			'class'=>'bootstrap.widgets.TbTotalSumColumn'
		),
    	);
		 return $gridColumns;
		 	
	}
	

	public function actionAdulto() {
		
		Yii::import('ext.multimodelform.MultiModelForm');
		
		$id=Yii::app()->user->id;
	
		$establecimientousuario = UsuEstPla::model()->find('id_usuario = :id_uno',array(':id_uno'=>$id));
		$establecimiento = Establecimiento::model()->find('id_establecimiento = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_establecimiento')));
		
		$model = new Planilla;
		
		$detallePlanilla = new DetallePlanilla;
		
		$validatedDetalles = array();  //ensure an empty array
		
	
		//die("detailOK=$detailOK");
		$this->render('adulto',array(
				'model'=>$model,
				//submit the member and validatedItems to the widget in the edit form
				'detallePlanilla'=>$detallePlanilla,
				'validatedDetalles' => $validatedDetalles,
				'establecimiento' => $establecimiento
		));
		
	}
	
	public function actionConfirmar($confirmar,$id) {
		
	if ($confirmar) {
			$model=$this->loadModel($id,'Planilla');
			$model->confirmado=1;
			$model->save();
		}
	}
	
	public function actionDesconfirmar($confirmar,$id) {
		
		if ($confirmar) {
			$model=$this->loadModel($id,'Planilla');
			$model->confirmado=0;
			$model->save();
		}
	}
	
	public function actionPlanillaInicialPdf() {
	
		/*$_SESSION=new CHttpSession;
			$_SESSION->open();*/
		$dataProvider = $_SESSION['planilla_secundaria']->getData();
			
		if($dataProvider!=null){
			$this->render('planillaSecundariaPdf',array(
					'dataProvider'=>$dataProvider,));
		}
		else
			throw new CHttpException(404,'La solicitud no es válida..');
			
	}
	
	public function actionImprimirLocalizacion(){//por ejemplo
	
		Yii::import('ext.multimodelform.MultiModelForm');
	
		$model=$this->loadModel(Yii::app()->getSession()->get('id_planilla'),'Planilla');
		/*
			echo "<PRE>";
		print_r($model);
		echo "</PRE>";
		*/
		$establecimiento=Establecimiento::model()->find(array(
				'select'=>'nombre,cue,id_responsable',
				'condition'=>'id_establecimiento=:id_establecimiento',
				'params'=>array(':id_establecimiento'=>$model['id_establecimiento']),
		));
	
		$localizacion=Localizacion::model()->find(array(
				'select'=>'nombre,anexo',
				'condition'=>'id_localizacion=:id_localizacion',
				'params'=>array(':id_localizacion'=>$model['id_localizacion']),
		));
	
		$responsable=Responsable::model()->find(array(
				'select'=>'apellido,nombre',
				'condition'=>'id_responsable=:id_responsable',
				'params'=>array(':id_responsable'=>$establecimiento['id_responsable']),
		));
	
		
		$nombreSeccion= '"nombreSeccion"';
		$tipoSeccion= '"tipoSeccion"';
		$matTotal='"matTotal"';
		$matVaron='"matVaron"';
		$matMujer='"matMujer"';
		$repTotal='"repTotal"';
		$repVaron='"repVaron"';
		$repMujer='"repMujer"';
		
		
		$id_planilla= Yii::app()->getSession()->get('id_planilla');
	
		$sql = "SELECT
		public.nivel_servicio.descripcion AS nivel,
		sala_ciclo_anio.descripcion AS ciclo,
		turno.descripcion AS turno,
		detalle_planilla.nombre_seccion AS $nombreSeccion,
		seccion.descripcion AS $tipoSeccion,
		public.orientacion_tipo.descripcion AS orientacion,
		detalle_planilla.alu_mat_tot AS $matTotal,
		detalle_planilla.alu_mat_var AS $matVaron,
		detalle_planilla.alu_mat_muj AS $matMujer,
		detalle_planilla.alu_rep_tot as $repTotal,
		detalle_planilla.alu_rep_var AS $repVaron,
		detalle_planilla.alu_rep_muj AS $repMujer
		FROM
		detalle_planilla
		INNER JOIN sala_ciclo_anio ON (detalle_planilla.id_sala_ciclo_anio = sala_ciclo_anio.id_sala_ciclo_anio)
		INNER JOIN turno ON (detalle_planilla.id_turno = turno.id_turno)
		INNER JOIN seccion ON (detalle_planilla.id_seccion = seccion.id_seccion)
		INNER JOIN public.nivel_servicio ON (detalle_planilla.id_nivel = public.nivel_servicio.id_nivel)
		INNER JOIN public.orientacion_tipo ON (detalle_planilla.id_orientacion = public.orientacion_tipo.c_orientacion)
		Where
		detalle_planilla.id_planilla = ' $id_planilla '
		ORDER BY
		detalle_planilla.id_nivel DESC,
		detalle_planilla.id_sala_ciclo_anio,
		detalle_planilla.id_turno,
		detalle_planilla.nombre_seccion ";
	
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$aCiclosSS = $command->queryAll();
	
	/* 	echo "<PRE>";
		print_r($aCiclosSS);
		echo "</PRE>";
			 
		echo "<PRE>";
		print_r($aCiclosSS[0]['nombreSeccion']);
		echo "</PRE>";*/
			
	/*
		 $aCiclosSS =
            array(// Cada registro es un sub array. El Nº de Orden es el índice+1
                'nivel' => '',
                'ciclo' => '',
                'turno' => '',
                'nombreSeccion' => '',
                'tipoSeccion' => '',
                'orientacion' => '',
                'matTotal' => 0,
                'matVaron' => 0,
                'matMujer' => 0,
                'repTotal' => 0,
                'repVaron' => 0,
                'repMujer' => 0,
    );
	
		*/
	
		$sql = "Select
		Sum(detalle_planilla.alu_mat_tot) As $matTotal,
		Sum(detalle_planilla.alu_mat_var) As $matVaron,
		Sum(detalle_planilla.alu_mat_muj) As $matMujer,
		Sum(detalle_planilla.alu_rep_tot) As $repTotal,
		Sum(detalle_planilla.alu_rep_var) As $repVaron,
		Sum(detalle_planilla.alu_rep_muj) As $repMujer
		From
		detalle_planilla
		Where
		detalle_planilla.id_planilla = ' $id_planilla '	 ";
	
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$aTotalSS = $command->queryAll();
	
		/* 		 $aTotalSS =
            array(
                'matTotal' => 0,
                'matVaron' => 0,
                'matMujer' => 0,
                'repTotal' => 0,
                'repVaron' => 0,
                'repMujer' => 0,
    		);
	
		echo "<PRE>";
		print_r($aTotalSS);
		echo "</PRE>";*/
	
		 $aDivisionSS = array(
        'independiente' => array(
        	'secundario' => $model['tot_ind_sec'],
        	'polimodal' => $model['tot_ind_pol'],
        ),
        'multiple' => array(
            'secundario' => $model['tot_mul_sex'],
            'polimodal' => $model['tot_mul_pex'],
        ),
        'total' => $model['tot_alm_ben'],
    );
    //Fin SS 

		// Para  PP
		$aAlimentoSS = array(
				'almuerzo' => $model['tot_alm_ben'],
				'lecheM' => $model['tot_cop_man'],
				'lecheT' => $model['tot_cop_tar'],
				'refrigerioM' => $model['tot_ref_man'],
				'refrigerioT' => $model['tot_ref_tar'],
				'otros' => array(
						array(//repetir por cada item
								'concepto' => $model['ser_ali_esp'],
								'cantidad' => $model['otr_ser_ali'],
						),
				),
		);
		//Fin SS
		  $PDF = new PlanillaPDF();
		$linea = '';
			$sTipo = 'SS';
			$sFecha = date("Y-m-d");
			$sMes = strtoupper($model['mes']);
			$sAnio = $model['anio'];
			$aEstablecimiento = array(
					'nombre' => $establecimiento['nombre'],
					'localizacion' => $localizacion['nombre'],
					'cue' => $establecimiento['cue'],
					'anexo' => $localizacion['anexo'],
					'ingresador' => $model['ingresador'],
					'responsable' => $responsable['apellido'].', '.$responsable['nombre'],
					'domicilio' =>$model['dom_act'],
					'telefono' => $model['telefono'],
			);
			$aCiclosSS['total'] = $aTotalSS[0];
			$sArchivo = strtolower('Secundario-'. date("Y-m-d")) . ".pdf";
			$PDF->ImprimirPlanillaLocalizacion(//
					$sTipo, //
					$sFecha, $sMes, //
					$sAnio, //
					$aEstablecimiento, //
					$aCiclosSS, //
					$aDivisionSS, //
					$aAlimentoSS, //
					$sArchivo);
	}

	public function actionPlanilla() {

		$PDF = new PlanillaPDF();
		$t = array('II', 'PP', 'SS', 'AP', 'AS');
		$linea = '';
		foreach ($t as $v) {
			$sTipo = $v;
			$sFecha = '';
			$sMes = '';
			$sAnio = '';
			$aEstablecimiento = array(
					'nombre' => '',
					'localizacion' => '',
					'cue' => '',
					'anexo' => '',
					'ingresador' => '',
					'responsable' => '',
					'domicilio' =>'',
					'telefono' => '',
			);
			$aCiclo = eval("return \$aCiclos$v;");
			$aCiclos = array_fill(0, 45, $aCiclo);
			$aCiclos['total'] = eval("return \$aTotal$v;");
			$aDivisiones = eval("return \$aDivision$v;");
			$aliCual = in_array($v, array('II', 'PP', 'SS')) ? 'II' : 'AP';
			$aAlimentacion = eval("return \$aAlimento$aliCual;");
			$sArchivo = strtolower($v . '.pdf');
			$PDF->ImprimirPlanillaLocalizacion(//
					$sTipo, //
					$sFecha, $sMes, //
					$sAnio, //
					$aEstablecimiento, //
					$aCiclos, //
					$aDivisiones, //
					$aAlimentacion, //
					$sArchivo);
			$linea .= Yii::app()->basePath . '/../' . 'tmp/'.$sArchivo." ";
		}
		unlink(Yii::app()->basePath . '/../' . 'tmp/'."todos.pdf");
		exec("pdftk $linea output " .Yii::app()->basePath . '/../' . 'tmp/'."todos.pdf");
		$this->redirect(array('/ingresador/admin'));
	}

}
