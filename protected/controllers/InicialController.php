<?php

class InicialController extends GxController {


	public function filters()
	{
		return array(
				'rights', // perform access control for CRUD operations
		);
	}
	
	 public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array('index','view','calcula','confirmar','desconfirmar','planillainicialpdf'),
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
		$localizacion = Localizacion::model()->find('id_localizacion = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_localizacion')));
		
		$responsable = Responsable::model()->find('id_responsable = :id_est', array(':id_est'=>$establecimiento->id_responsable));
		
        $model = new Planilla('inicial');
        $model->confirmado = false ;
        
		$detallePlanilla = new Inicial;
		
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
			$model->id_tipo_planilla=1;
			$model->confirmado = 0 ;
			
			$detailOK = MultiModelForm::validate($detallePlanilla,$validatedDetalles,$deleteItems);

			if ($detailOK && empty($validatedDetalles))
			{
				//Yii::app()->user->setFlash('error','No detail submitted');
				Yii::app()->user->setFlash('error', '<strong>Planilla vacia!</strong> Debe agregar filas.');
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
		
		$establecimientousuario = UsuEstPla::model()->find('id_usuario = :id_uno',array(':id_uno'=>Yii::app()->user->id));
		$establecimiento = Establecimiento::model()->find('id_establecimiento = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_establecimiento')));
		$responsable = Responsable::model()->find('id_responsable = :id_est', array(':id_est'=>$establecimiento->id_responsable));
		$localizacion = Localizacion::model()->find('id_localizacion = :id_uno',array(':id_uno'=>$model->id_localizacion));
		Yii::app()->getSession()->add('id_localizacion',$localizacion->id_localizacion);
						
		if ($model->confirmado == 1) {
			  Yii::app()->user->setFlash('error', '<strong>Planilla ya confirmada!</strong> No se puede modificar.');
			  $this->redirect(array('/ingresador/admin'));
		}
		
		$detallePlanilla = new Inicial;
		$validatedDetalles = array(); //ensure an empty array

		if(isset($_POST['Planilla']))
		{
			$model->setAttributes($_POST['Planilla']);
/* 				
			$model->ingresador =$_POST['Planilla']['ingresador'] ;
			$model->confirmado = 0 ; */
					
			if(!isset($_POST['Inicial']))
			{
				if ($model->validate()) {
				if ($model->save()) {
					$this->redirect(array('/ingresador/admin'));
					}}
			}
		}
		
		if(isset($_POST['Inicial']))
		{
			//the value for the foreign key 'groupid'
			$masterValues = array ('id_planilla'=>$model->id_planilla);
					
			if( //Save the master model after saving valid members
				MultiModelForm::save($detallePlanilla,$validatedDetalles,$deletedMembers,$masterValues) &&
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
		
		$establecimientousuario = UsuEstPla::model()->find('id_usuario = :id_uno',array(':id_uno'=>$id));
		
		/* if ($establecimientousuario->id_tipo_planilla == 2){$this->redirect(array('adulto/admin'));}
		if ($establecimientousuario->id_tipo_planilla == 3){$this->redirect(array('serviciocomplementario/admin'));}
		if ($establecimientousuario->id_tipo_planilla == 4){$this->redirect(array('noformal/admin'));	} */
		
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
		$dataProvider = $_SESSION['planilla_iniciales']->getData();
			
		if($dataProvider!=null){
			$this->render('planillaInicialPdf',array(
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
		$asiTotal='"asiTotal"';
		$asiVaron='"asiVaron"';
		$asiMujer='"asiMujer"';
	
		$id_planilla= Yii::app()->getSession()->get('id_planilla');
	
		$sql = "SELECT
		public.nivel_servicio.descripcion AS nivel,
		sala_ciclo_anio.descripcion AS ciclo,
		turno.descripcion AS turno,
		detalle_planilla.nombre_seccion AS $nombreSeccion,
		seccion.descripcion AS $tipoSeccion,
		detalle_planilla.alu_mat_tot AS $matTotal,
		detalle_planilla.alu_mat_var AS $matVaron,
		detalle_planilla.alu_mat_muj AS $matMujer,
		detalle_planilla.nec_esp_edu AS especial,
		detalle_planilla.alu_med_tot AS $asiTotal,
		detalle_planilla.alu_med_var AS $asiVaron,
		detalle_planilla.alu_med_muj AS $asiMujer
		FROM
		detalle_planilla
		INNER JOIN sala_ciclo_anio ON (detalle_planilla.id_sala_ciclo_anio = sala_ciclo_anio.id_sala_ciclo_anio)
		INNER JOIN turno ON (detalle_planilla.id_turno = turno.id_turno)
		INNER JOIN seccion ON (detalle_planilla.id_seccion = seccion.id_seccion)
		INNER JOIN public.nivel_servicio ON (detalle_planilla.id_nivel = public.nivel_servicio.id_nivel)
		Where
		detalle_planilla.id_planilla = ' $id_planilla '
		Order By
		detalle_planilla.id_nivel,
		detalle_planilla.id_sala_ciclo_anio,
		detalle_planilla.id_turno ";
	
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$aCiclosII = $command->queryAll();
	
		/*echo "<PRE>";
		print_r($aCiclosPP);
			echo "</PRE>";
	
		//Si es II
	    $aCiclosII = array(// Cada registro es un sub array. El Nº de Orden es el índice+1
	        'nivel' => '',
	        'ciclo' => '',
	        'turno' => '',
	        'nombreSeccion' => '',
	        'tipoSeccion' => '',
	        'matTotal' => 0,
	        'matVaron' => 0,
	        'matMujer' => 0,
	        'especial' => 0,
	        'asiTotal' => 0,
	        'asiVaron' => 0,
	        'asiMujer' => 0,
	    );
	
		*/
	
		$sql = "Select
		Sum(detalle_planilla.alu_mat_tot) As $matTotal,
		Sum(detalle_planilla.alu_mat_var) As $matVaron,
		Sum(detalle_planilla.alu_mat_muj) As $matMujer,
		Sum(detalle_planilla.nec_esp_edu) As especial,
		Sum(detalle_planilla.alu_med_tot) As $asiTotal,
		Sum(detalle_planilla.alu_med_var) As $asiVaron,
		Sum(detalle_planilla.alu_med_muj) As $asiMujer
		From
		detalle_planilla
		Where
		detalle_planilla.id_planilla = ' $id_planilla '	 ";
	
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$aTotalII = $command->queryAll();
	
		/* 		$aTotalII = array(
        'matTotal' => 0,
        'matVaron' => 0,
        'matMujer' => 0,
        'especial' => 0,
        'asiTotal' => 0,
        'asiVaron' => 0,
        'asiMujer' => 0,
    );
	
		echo "<PRE>";
		print_r($aTotalPP);
		echo "</PRE>";*/
	
		$aDivisionII = array(
				'independiente' => array(
						'maternal' => $model['tot_ind_jam'],
						'jardin' => $model['tot_ind_jif'],
				),
				'multiple' => array(
						'maternal' => $model['tot_mul_jmx'],
						'jardin' => $model['tot_mul_jix'],
						'ambos' => $model['tot_mul_imx'],
				),
				'total' => $model['tot_sec_div'],
		);
		//Fin II
		// Para  
		
		$aAlimentoII = array(
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
				//Fin PP
		$PDF = new PlanillaPDF();
		$linea = '';
			$sTipo = 'II';
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
			$aCiclosII['total'] = $aTotalII[0];
			$sArchivo = strtolower('NivelInicial-'. date("Y-m-d")) . ".pdf";
			$PDF->ImprimirPlanillaLocalizacion(//
					$sTipo, //
					$sFecha, $sMes, //
					$sAnio, //
					$aEstablecimiento, //
					$aCiclosII, //
					$aDivisionII, //
					$aAlimentoII, //
					$sArchivo);
	}

}
