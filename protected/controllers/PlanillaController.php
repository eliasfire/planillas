<?php

class PlanillaController extends GxController {

	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array('index','view','selectdos','selecttres','selectnivel,calcula'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('create','update'),
						'users'=>array('*'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('admin','delete'),
						'users'=>array('*'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}
	
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Planilla'),
		));
	}

	public function actionCreate() {
		$id=Yii::app()->user->id;
	    $model = new Planilla;
	    $establecimientousuario = UsuEstPla::model()->find('id_usuario = :id_uno',array(':id_uno'=>$id));
	    $establecimiento = Establecimiento::model()->find('id_establecimiento = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_establecimiento'))); 
        /*
        echo "<PRE>";
        print_r($post['niveles']);
        echo "</PRE>";*/
		 if (isset($_POST['Planilla'])) {
			$model->setAttributes($_POST['Planilla']);
			$model->mes= Yii::app()->getSession()->get('mesvigente');
			$model->anio= Yii::app()->getSession()->get('aniovigente');
			//echo 'niveles : '.$_POST['niveles'].'<br>';
			
			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else {/*la primera fila*/
					$modela=new DetallePlanilla();
					$modela->id_nivel=$_POST['niveles'] ;
					$modela->id_sala_ciclo_anio=$_POST['anios_estudio'] ;
					$modela->id_turno=$_POST['turno'] ;
					$modela->id_seccion=$_POST['seccion'] ;
					$modela->id_orientacion=$_POST['orientacion'] ;
					$modela->alu_mat_tot=$_POST['alu_mat_tot'] ;
					$modela->alu_mat_var=$_POST['alu_mat_var'] ;
					$modela->alu_mat_muj=$_POST['alu_mat_muj'] ;
					$modela->id_planilla=$model->id_planilla;
					$modela->save();
					
					for ( $i = 1 ; $i <= 19 ; $i ++) {
						if(!empty($_POST['niveles'.$i])) {
							//echo 'niveles : '. $_POST['niveles'.$i] .'<br>';
					
							$modelb=new DetallePlanilla();
							$modelb->id_nivel=$_POST['niveles'.$i] ;
							$modelb->id_sala_ciclo_anio=$_POST['anios_estudio'.$i] ;
							$modelb->id_turno=$_POST['turno'.$i] ;
							$modelb->id_seccion=$_POST['seccion'.$i] ;
							$modelb->id_orientacion=$_POST['orientacion'.$i] ;
							$modelb->alu_mat_tot=$_POST['alu_mat_tot'.$i] ;
							$modelb->alu_mat_var=$_POST['alu_mat_var'.$i] ;
							$modelb->alu_mat_muj=$_POST['alu_mat_muj'.$i] ;
							$modelb->id_planilla=$model->id_planilla;
							$modelb->save();
						}
					}
					$this->redirect(array('view', 'id' => $model->id_planilla));
			    	}

		}}
		$this->render('create', array( 'model' => $model,
									   'establecimiento' => $establecimiento));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Planilla');


		if (isset($_POST['Planilla'])) {
			$model->setAttributes($_POST['Planilla']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_planilla));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Planilla')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
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

		$this->render('admin', array(
			'model' => $model,
		));
	}
	/*
	public function actionSelectdos()
	{
		$id_uno = $_POST['Planilla']['id_localizacion'];
		$lista = LocalizacionPlanilla::model()->findAll('id_localizacion = :id_uno',array(':id_uno'=>$id_uno));
	

		$listados= TipoPlanilla::model()->findAll('id_tipo_planilla = :id_dos',array(':id_dos'=>$lista));
	
		$lista = CHtml::listData($lista,'id_tipo_planilla','descripcion');
	
		echo CHtml::tag('option', array('value' => ''), 'Seleccione', true);
	
		foreach ($lista as $valor => $descripcion){
			echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );
	
		}
	}*/

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
	{/*
		echo "<PRE>";
		print_r($_POST);
		echo "</PRE>";	$id_uno = $id;*/
		$id_uno = $_POST['id'];
	
		//$lista = SalaCicloAnio::model()->find('id_nivel = :id_uno',array(':id_uno'=>$id_uno));
		
		$lista = SalaCicloAnio::model()->findAll(array(
				'select'=>'t.id_sala_ciclo_anio, t.descripcion',
				'condition'=>"t.id_nivel = '$id_uno'"));
		
		$lista = CHtml::listData($lista,'id_sala_ciclo_anio','descripcion');
	
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
		),
		array(
			'name'=>'alu_mat_muj',
	    	'header'=>'Total Mujeres',
		),
		/*
		'alu_mat_tot',
		'alu_mat_var',
		'alu_mat_muj',
		'alu_rep_tot',
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
		'alu_opt_muj',
		array(
			'name'=>'id_turno',
			'value'=>'GxHtml::valueEx($data->idTurno)',
			'filter'=>GxHtml::listDataEx(Turno::model()->findAllAttributes(null, true)),
			),*/
	
		 		);
		 return $gridColumns;
		 	
	}
	

	public function actionAdulto() {
		$id=Yii::app()->user->id;
		$model = new Planilla;
		$establecimientousuario = UsuEstPla::model()->find('id_usuario = :id_uno',array(':id_uno'=>$id));
		$establecimiento = Establecimiento::model()->find('id_establecimiento = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_establecimiento')));
		/*
		 echo "<PRE>";
		print_r($post['niveles']);
		echo "</PRE>";*/
		if (isset($_POST['Planilla'])) {
			$model->setAttributes($_POST['Planilla']);
			$model->mes= Yii::app()->getSession()->get('mesvigente');
			$model->anio= Yii::app()->getSession()->get('aniovigente');
			//echo 'niveles : '.$_POST['niveles'].'<br>';
				
			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else {/*la primera fila*/
					$modela=new DetallePlanilla();
					$modela->id_nivel=$_POST['niveles'] ;
					$modela->id_sala_ciclo_anio=$_POST['anios_estudio'] ;
					$modela->id_turno=$_POST['turno'] ;
					$modela->id_seccion=$_POST['seccion'] ;
					$modela->id_orientacion=$_POST['orientacion'] ;
					$modela->alu_mat_tot=$_POST['alu_mat_tot'] ;
					$modela->alu_mat_var=$_POST['alu_mat_var'] ;
					$modela->alu_mat_muj=$_POST['alu_mat_muj'] ;
					$modela->id_planilla=$model->id_planilla;
					$modela->save();
						
					for ( $i = 1 ; $i <= 19 ; $i ++) {
						if(!empty($_POST['niveles'.$i])) {
							//echo 'niveles : '. $_POST['niveles'.$i] .'<br>';
								
							$modelb=new DetallePlanilla();
							$modelb->id_nivel=$_POST['niveles'.$i] ;
							$modelb->id_sala_ciclo_anio=$_POST['anios_estudio'.$i] ;
							$modelb->id_turno=$_POST['turno'.$i] ;
							$modelb->id_seccion=$_POST['seccion'.$i] ;
							$modelb->id_orientacion=$_POST['orientacion'.$i] ;
							$modelb->alu_mat_tot=$_POST['alu_mat_tot'.$i] ;
							$modelb->alu_mat_var=$_POST['alu_mat_var'.$i] ;
							$modelb->alu_mat_muj=$_POST['alu_mat_muj'.$i] ;
							$modelb->id_planilla=$model->id_planilla;
							$modelb->save();
						}
					}
					$this->redirect(array('view', 'id' => $model->id_planilla));
				}
	
			}
		}
		$this->render('adulto', array( 'model' => $model,
				'establecimiento' => $establecimiento));
	}
	
	public function actionAdulto2() {
		$id=Yii::app()->user->id;
		$model = new Planilla;
		$establecimientousuario = UsuEstPla::model()->find('id_usuario = :id_uno',array(':id_uno'=>$id));
		$establecimiento = Establecimiento::model()->find('id_establecimiento = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_establecimiento')));
		/*
		 echo "<PRE>";
		print_r($post['niveles']);
		echo "</PRE>";*/
		if (isset($_POST['Planilla'])) {
			$model->setAttributes($_POST['Planilla']);
			$model->mes= Yii::app()->getSession()->get('mesvigente');
			$model->anio= Yii::app()->getSession()->get('aniovigente');
			//echo 'niveles : '.$_POST['niveles'].'<br>';
	
			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else {/*la primera fila*/
					$modela=new DetallePlanilla();
					$modela->id_nivel=$_POST['niveles'] ;
					$modela->id_sala_ciclo_anio=$_POST['anios_estudio'] ;
					$modela->id_turno=$_POST['turno'] ;
					$modela->id_seccion=$_POST['seccion'] ;
					$modela->id_orientacion=$_POST['orientacion'] ;
					$modela->alu_mat_tot=$_POST['alu_mat_tot'] ;
					$modela->alu_mat_var=$_POST['alu_mat_var'] ;
					$modela->alu_mat_muj=$_POST['alu_mat_muj'] ;
					$modela->id_planilla=$model->id_planilla;
					$modela->save();
	
					for ( $i = 1 ; $i <= 19 ; $i ++) {
						if(!empty($_POST['niveles'.$i])) {
							//echo 'niveles : '. $_POST['niveles'.$i] .'<br>';
	
							$modelb=new DetallePlanilla();
							$modelb->id_nivel=$_POST['niveles'.$i] ;
							$modelb->id_sala_ciclo_anio=$_POST['anios_estudio'.$i] ;
							$modelb->id_turno=$_POST['turno'.$i] ;
							$modelb->id_seccion=$_POST['seccion'.$i] ;
							$modelb->id_orientacion=$_POST['orientacion'.$i] ;
							$modelb->alu_mat_tot=$_POST['alu_mat_tot'.$i] ;
							$modelb->alu_mat_var=$_POST['alu_mat_var'.$i] ;
							$modelb->alu_mat_muj=$_POST['alu_mat_muj'.$i] ;
							$modelb->id_planilla=$model->id_planilla;
							$modelb->save();
						}
					}
					$this->redirect(array('view', 'id' => $model->id_planilla));
				}
	
			}
		}
		$this->render('adulto', array( 'model' => $model,
				'establecimiento' => $establecimiento));
	}
	
	public function actionSelectorientacion()
	{
		/* echo "<PRE>";
			print_r($_POST);
		echo "</PRE>"; */
	
		$id_uno = $_POST['id'];
		$id_localizacion= Yii::app()->getSession()->get('id_localizacion');
	
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
		
		public function actionImprimirLocalizacion(){//por ejemplo
			/*
			 Creas los arrays con los datos de los diferentes modelos y los datos a usar
			*/
			$PDF = new PlanillaPDF();
			$PDF->ImprimirPlanillaLocalizacion(//
					$sTipo, //
					$sFecha, $sMes, //
					$sAnio, //
					$aEstablecimiento, //
					$aCiclos, //
					$aDivisiones, //
					$aAlimentacion, //
					$sArchivo);
		}
}
