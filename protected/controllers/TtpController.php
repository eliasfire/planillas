<?php

class TtpController extends GxController {

	/*
	 public function filters()
	 {
	return array(
			'rights', // perform access control for CRUD operations
	);
	}*/

	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array('index','view','selectdos','selecttres','selectnivel','calcula','confirmar'),
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

		$id=Yii::app()->user->id;

		$establecimientousuario = UsuEstPla::model()->find('id_usuario = :id_uno',array(':id_uno'=>$id));

		$establecimiento = Establecimiento::model()->find('id_establecimiento = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_establecimiento')));
		$responsable = Responsable::model()->find('id_responsable = :id_est', array(':id_est'=>$establecimiento->id_responsable));
		$localizacion = Localizacion::model()->find('id_localizacion = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_localizacion')));

		$model = new Planilla('ttp');

		$detallePlanilla = new Itinerario;
		$detallePlanilla2 = new Ttp;

		$validatedDetalles = array();
		$validatedDetalles2 = array();
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
			$model->id_tipo_planilla=8;
			$model->confirmado = 0 ;
				
			$detailOK = MultiModelForm::validate($detallePlanilla,$validatedDetalles,$deleteItems);
				
			if ($detailOK && empty($validatedDetalles))
			{
				Yii::app()->user->setFlash('error', '<strong>Planillas vacias!</strong> Debe agregar filas.');
				$detailOK = false;
			}
				
			$detailOK2 = MultiModelForm::validate($detallePlanilla2,$validatedDetalles2,$deleteItems2);

			if ($detailOK2 && empty($validatedDetalles2))
			{
				Yii::app()->user->setFlash('error', '<strong>Planilla vacia!</strong> Debe agregar filas.');
				$detailOK2 = false;
			}

				
			if($detailOK && $detailOK2 && $model->save())
			{
				$masterValues = array ('id_planilla'=>$model->id_planilla);
				$masterValues2 = array ('id_planilla'=>$model->id_planilla);

				if ((MultiModelForm::save($detallePlanilla,$validatedDetalles,$deleteItems,$masterValues)) &&
				(MultiModelForm::save($detallePlanilla2,$validatedDetalles2,$deleteItems2,$masterValues2)))
					$this->redirect(array('/ingresador/admin'));
			}
		}
		 
		$this->render('create',array(
				'model'=>$model,
				'detallePlanilla'=>$detallePlanilla,
				'validatedDetalles' => $validatedDetalles,
				'detallePlanilla2'=>$detallePlanilla2,
				'validatedDetalles2' => $validatedDetalles2,
				'establecimiento' => $establecimiento,
				'localizacion'=>$localizacion,
				'responsable'=>	$responsable
		));
	}

	public function actionUpdate($id)
	{
		Yii::import('ext.multimodelform.MultiModelForm');

		$model=$this->loadModel($id,'Planilla');

		Yii::app()->user->id=Yii::app()->user->id;
		$establecimientousuario = UsuEstPla::model()->find('id_usuario = :id_uno',array(':id_uno'=>Yii::app()->user->id));
		$establecimiento = Establecimiento::model()->find('id_establecimiento = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_establecimiento')));
		$responsable = Responsable::model()->find('id_responsable = :id_est', array(':id_est'=>$establecimiento->id_responsable));
		$localizacion = Localizacion::model()->find('id_localizacion = :id_uno',array(':id_uno'=>$model->id_localizacion));
		Yii::app()->getSession()->add('id_localizacion',$localizacion->id_localizacion);

		if ($model->confirmado == 1) {
			Yii::app()->user->setFlash('error', '<strong>Planilla ya confirmada!</strong> No se puede modificar.');
			$this->redirect(array('/ingresador/admin'));
		}

		$detallePlanilla = new Itinerario;
		$detallePlanilla2 = new Ttp;

		$validatedDetalles = array();
		$validatedDetalles2 = array();

		if(isset($_POST['Planilla']))
		{
			$model->setAttributes($_POST['Planilla']);
				
			if(!isset($_POST['Ttp']))
			{
				if ($model->validate()) {
					if ($model->save()) {
						$this->redirect(array('/ingresador/admin'));
					}
				}
			}
		}

		if(isset($_POST['Ttp']))
		{
			//the value for the foreign key 'groupid'
			$masterValues = array ('id_planilla'=>$model->id_planilla);
			$masterValues2 = array ('id_planilla'=>$model->id_planilla);

			if( //Save the master model after saving valid members
			MultiModelForm::save($detallePlanilla,$validatedDetalles,$deletedMembers,$masterValues) &&
			MultiModelForm::save($detallePlanilla2,$validatedDetalles2,$deletedMembers2,$masterValues2) &&
			$model->save()
			)
				$this->redirect(array('/ingresador/admin'));
		}

		$this->render('update',array(
				'model'=>$model,
				'detallePlanilla'=>$detallePlanilla,
				'validatedDetalles' => $validatedDetalles,
				'detallePlanilla2'=>$detallePlanilla2,
				'validatedDetalles2' => $validatedDetalles2,
				'establecimiento' => $establecimiento,
				'localizacion'=>$localizacion,
				'responsable'=>	$responsable
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

		$id=Yii::app()->user->id;

		/* $establecimientousuario = UsuEstPla::model()->find('id_usuario = :id_uno',array(':id_uno'=>$id));

		if ($establecimientousuario->id_tipo_planilla == 1){$this->redirect(array('inicial/admin'));}
		if ($establecimientousuario->id_tipo_planilla == 2){$this->redirect(array('adulto/admin'));	}
		if ($establecimientousuario->id_tipo_planilla == 4){$this->redirect(array('noformal/admin'));}	 */

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

	public function actionPlanillaIfttp() {

		$model=$this->loadModel(Yii::app()->getSession()->get('id_planilla'),'Planilla');

		/* echo "<PRE>";
		print_r($model);
		echo "</PRE>";
 */
		$id_planilla= Yii::app()->getSession()->get('id_planilla');
		
		$establecimiento=Establecimiento::model()->find(array(
				'select'=>'nombre,cue,id_responsable',
				'condition'=>'id_establecimiento=:id_establecimiento',
				'params'=>array(':id_establecimiento'=>$model['id_establecimiento']),
		));

		$responsable=Responsable::model()->find(array(
				'select'=>'apellido,nombre',
				'condition'=>'id_responsable=:id_responsable',
				'params'=>array(':id_responsable'=>$establecimiento['id_responsable']),
		));

		$aEstablecimiento = array(
				'nombre' => $establecimiento['nombre'],
				'cue' => $establecimiento['cue'],
				'ingresador' => $model['ingresador'],
				'responsable' => $responsable['apellido'].', '.$responsable['nombre'],
		);

		$aEstructuraGrillaMatriculaIF = array(
				'total' => $model['tot_alu_iti'],
				'manana' => $model['tot_iti_man'],
				'tarde' => $model['tot_iti_tar'],
				'vespertino' => $model['tot_iti_ves'],
				'noche' => $model['tot_iti_noc'],
				'doble' => $model['tot_iti_dob'],
		);
		$aEstructuraGrillaMatriculaTTP = array(
				'total' => $model['tot_alu_ttp'],
				'manana' => $model['tot_ttp_man'],
				'tarde' => $model['tot_ttp_tar'],
				'vespertino' => $model['tot_ttp_ves'],
				'noche' => $model['tot_ttp_noc'],
				'doble' => $model['tot_ttp_dob'],
		);
		$aEstructuraGrillaMatriculaAmbos = array(
				'total' => $model['tot_iti_ttp'],
				'manana' => $model['tot_alu_man'],
				'tarde' => $model['tot_alu_tar'],
				'vespertino' => $model['tot_alu_ves'],
				'noche' => $model['tot_alu_noc'],
				'doble' => $model['tot_alu_dob'],
		);

		$aMatricula = array(
				'if' => $aEstructuraGrillaMatriculaIF,
				'ttp' => $aEstructuraGrillaMatriculaTTP,
				'ambos' => $aEstructuraGrillaMatriculaAmbos,
		);
		
		$aEstructuraGrillaCurso = array(
				//la uso para ambos IF y TTP
				'descripcion' => '',
				'turno' => '',
				'total' => 0,
				'varon' => 0,
				'mujer' => 0,
		);
		
		$sql = "SELECT
		public.detalle_planilla.nombre_itinerario AS descripcion,
		public.turno.descripcion AS turno,
		public.detalle_planilla.alu_mat_tot AS total,
		public.detalle_planilla.alu_mat_var AS varon,
		public.detalle_planilla.alu_mat_muj AS mujer
		FROM
		public.detalle_planilla
		INNER JOIN public.turno ON (public.detalle_planilla.id_turno = public.turno.id_turno)
		Where
		detalle_planilla.id_planilla = ' $id_planilla ' and 
		public.detalle_planilla.nombre_ttp IS NULL
		ORDER BY
		public.detalle_planilla.id_detalle_planilla ";
		
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$aCursoIF = $command->queryAll();
		
		$sql = "SELECT
		public.detalle_planilla.nombre_ttp AS descripcion,
		public.turno.descripcion AS turno,
		public.detalle_planilla.alu_mat_tot AS total,
		public.detalle_planilla.alu_mat_var AS varon,
		public.detalle_planilla.alu_mat_muj AS mujer
		FROM
		public.detalle_planilla
		INNER JOIN public.turno ON (public.detalle_planilla.id_turno = public.turno.id_turno)
		Where
		detalle_planilla.id_planilla = ' $id_planilla ' and
		public.detalle_planilla.nombre_itinerario IS NULL
		ORDER BY
		public.detalle_planilla.id_detalle_planilla ";
		
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$aCursoTTP = $command->queryAll();
		
		$sArchivo = strtolower('Planilla-Ttp'. date("Y-m-d")) . ".pdf";		 
		$sFecha = date("Y-m-d");
		$sMes = strtoupper($model['mes']);
		$sAnio = $model['anio'];
		$PDF = new PlanillaPDF();
		$PDF->ImprimirPlanillaIFTTP(//
				'', // SIEMPRE VACIO lo dejo por compatiblidad
				$sFecha, //
				$sMes, //
				$sAnio, //
				$aEstablecimiento, //
				$aMatricula, //
				$aCursoIF, //
				$aCursoTTP, //
				$sArchivo); 
	}
}
