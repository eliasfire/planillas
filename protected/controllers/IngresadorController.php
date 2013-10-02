<?php

class IngresadorController extends GxController {

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
						'actions'=>array('index','view','selectdos','selecttres','selectnivel','calcula','confirmar','selectplanilla','datosest'),
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
		
		$model = $this->loadModel($id, 'Planilla');
		
		if ($model->id_tipo_planilla == 1){$this->redirect(array('inicial/view', 'id'=>$model->id_planilla));}
		if ($model->id_tipo_planilla == 5){$this->redirect(array('egb/view', 'id'=>$model->id_planilla));}
		if ($model->id_tipo_planilla == 6){$this->redirect(array('secundariopolimodal/view', 'id'=>$model->id_planilla));}
		if ($model->id_tipo_planilla == 4){$this->redirect(array('noformal/view', 'id'=>$model->id_planilla));}
		if ($model->id_tipo_planilla == 3){$this->redirect(array('serviciocomplementario/view', 'id'=>$model->id_planilla));}
		if ($model->id_tipo_planilla == 2){$this->redirect(array('adultoprimaria/view', 'id'=>$model->id_planilla));}
		if ($model->id_tipo_planilla == 7){$this->redirect(array('adultosecundario/view', 'id'=>$model->id_planilla));}
		if ($model->id_tipo_planilla == 8){$this->redirect(array('ttp/view', 'id'=>$model->id_planilla));}
		
		/*
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Planilla'),
		));*/
	}

	public function actionCreate() {
		Yii::import('ext.multimodelform.MultiModelForm');
		
		$id=Yii::app()->user->id;
		
		$establecimientousuario = UsuEstPla::model()->find('id_usuario = :id_uno',array(':id_uno'=>$id));
				
		$establecimiento = Establecimiento::model()->find('id_establecimiento = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_establecimiento')));
        $responsable = Responsable::model()->find('id_responsable = :id_est', array(':id_est'=>$establecimiento->id_responsable));
		
        $model = new Planilla('adulto');
        $model->confirmado = false ;
        
		$detallePlanilla = new Adulto;
		
		$validatedDetalles = array();  
		/*
		echo "<PRE>";
		print_r($_POST);
		echo "</PRE>";*/

		if(isset($_POST['Planilla']))
		{
			$model->id_establecimiento=Yii::app()->getSession()->get('id_establecimiento');
			$model->mes= Yii::app()->getSession()->get('mesvigente');
			$model->anio= Yii::app()->getSession()->get('aniovigente');
			$model->id_tipo_planilla=2;
			$model->alu_tot_ind = $_POST['Planilla']['alu_tot_ind'];
			$model->tot_ind_alf = $_POST['Planilla']['tot_ind_alf'] ;
			$model->tot_ind_pri =$_POST['Planilla']['tot_ind_pri'] ;
			$model->tot_ind_sec =$_POST['Planilla']['tot_ind_sec'];
			$model->alu_tot_mul =$_POST['Planilla']['alu_tot_mul'] ;
			$model->tot_mul_alf =$_POST['Planilla']['tot_mul_alf'] ;
			$model->tot_mul_pri =$_POST['Planilla']['tot_mul_pri'] ;
			$model->tot_mul_sec =$_POST['Planilla']['tot_mul_sec'] ;
			$model->alu_mul_ind =$_POST['Planilla']['alu_mul_ind'] ;
			$model->alu_tot_alf =$_POST['Planilla']['alu_tot_alf'] ;
			$model->alu_tot_pri =$_POST['Planilla']['alu_tot_pri'] ;
			$model->alu_tot_sec =$_POST['Planilla']['alu_tot_sec'] ;
			$model->tot_ind_pol =$_POST['Planilla']['tot_ind_pol'] ;
			$model->tot_mul_pol =$_POST['Planilla']['tot_mul_pol'] ;
			$model->alu_tot_pol =$_POST['Planilla']['alu_tot_pol'] ;
			$model->ingresador =$_POST['Planilla']['ingresador'] ;
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
					$this->redirect(array('admin','id'=>$model->id_planilla));
			}
		}
     
		$this->render('create',array(
			'model'=>$model,
			'detallePlanilla'=>$detallePlanilla,
			'validatedDetalles' => $validatedDetalles,
			'establecimiento' => $establecimiento,
		    'responsable'=>	$responsable
		));
	}

	public function actionUpdate($id)
	{
	
		$model=$this->loadModel($id,'Planilla'); 

		if ($model->id_tipo_planilla == 1){	$this->redirect(array('inicial/update', 'id'=>$model->id_planilla));}
		if ($model->id_tipo_planilla == 5){	$this->redirect(array('egb/update', 'id'=>$model->id_planilla));}
		if ($model->id_tipo_planilla == 6){	$this->redirect(array('secundariopolimodal/update', 'id'=>$model->id_planilla));}
		if ($model->id_tipo_planilla == 4){ $this->redirect(array('noformal/update', 'id'=>$model->id_planilla));}
		if ($model->id_tipo_planilla == 3){	$this->redirect(array('serviciocomplementario/update', 'id'=>$model->id_planilla));}
		if ($model->id_tipo_planilla == 2){	$this->redirect(array('adultoprimaria/update', 'id'=>$model->id_planilla));}
		if ($model->id_tipo_planilla == 7){	$this->redirect(array('adultosecundario/update', 'id'=>$model->id_planilla));}
		
		
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
		
		$establecimiento = UsuEstPla::model()->find('id_usuario = :id_uno',array(':id_uno'=>$id));
		Yii::app()->getSession()->add('id_establecimiento',Yii::app()->getSession()->get('id_establecimiento'));
		
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
			$this->redirect(array('admin', 'id' => $model->id_planilla));
				
		}
	}
	
	public function actionSelectplanilla()
	{
	
		$model = new SelectPlanilla;
		
		$establecimiento = UsuEstPla::model()->find(array('condition'=>'id_usuario=:x', 'params'=>array(':x'=>Yii::app()->user->id)));
		$planilla_list = LocalizacionPlanilla::model()->findAll(array('condition'=>'id_establecimiento=:x and id_localizacion=:y', 
				'params'=>array(':x'=>Yii::app()->getSession()->get('id_establecimiento'),
							    ':y'=>Yii::app()->getSession()->get('id_localizacion'),
								)));
	
		foreach($planilla_list as $list1)
		{
			$company[] = TipoPlanilla::model()->findByPk($list1->id_tipo_planilla);
//			echo $list1->id_tipo_planilla;
//  			echo ' '.Yii::app()->getSession()->get('id_localizacion');
// 			echo ' '. Yii::app()->getSession()->get('id_establecimiento');
				
		}
		
		if(!isset($company))
		{
			Yii::app()->user->setFlash('error', '<strong>Error!</strong> No tiene planillas para cargar');
			$this->redirect(array('/'));
		}

		if(isset($_POST['SelectPlanilla']))
		{
			$model->attributes=$_POST['SelectPlanilla'];
			$planilla = UsuEstPla::model()->find(array('condition'=>'id_usuario=:x', 'params'=>array(':x'=>Yii::app()->user->id)));
				
			if($model->descripcion != null)
			{
				$existe=Planilla::model()->find(array(
						'condition'=>'id_establecimiento=:x and id_localizacion=:y and id_tipo_planilla=:z',
						'params'=>array(':x'=>$planilla->id_establecimiento,
										':y'=>Yii::app()->getSession()->get('id_localizacion'),
										':z'=>$model->descripcion
								)));
				 
				if(isset($existe))
				{
					Yii::app()->user->setFlash('error', '<strong>Planilla existente!</strong> Ya existe una planilla cargada para ese tipo.');
					$this->redirect(array('selectplanilla'));
				}
				else 
				{
					Yii::app()->user->setState('id_tipo_planilla',$model->descripcion);

					if ($model->descripcion == 1){$this->redirect(array('inicial/create'));}
					if ($model->descripcion == 2){$this->redirect(array('adultoprimaria/create'));}
					if ($model->descripcion == 3){$this->redirect(array('serviciocomplementario/create'));}
					if ($model->descripcion == 4){$this->redirect(array('noformal/create'));}
					if ($model->descripcion == 5){$this->redirect(array('egb/create'));}
					if ($model->descripcion == 6){$this->redirect(array('secundariopolimodal/create'));}
					if ($model->descripcion == 7){$this->redirect(array('adultosecundario/create'));}
					if ($model->descripcion == 8)
					{
						$localizacion = Localizacion::model()->find('id_localizacion = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_localizacion')));
						
						if (!($localizacion->anexo == '00'))
						{
							Yii::app()->user->setFlash('error', '<strong>Error!</strong> Esta planilla solo puede ser llenada por la localizacion SEDE (Anexo 00)');
							$this->redirect(array('/'));
						}
						$this->redirect(array('ttp/create'));
					}

				}
			}
			else
			{
				Yii::app()->user->setFlash('error', '<strong>Por favor!</strong> Seleccione un tipo de planilla para cargar.');
				$this->redirect(array('selectplanilla'));
			}
		}
		else
		{
			$this->render('select_planilla',array('model'=>$model,'company'=>$company,
			));
		}
	}
	
	public function actionSelectlocalizacion()
	{
		$model = new SelectLocalizacion;
		$establecimiento = UsuEstPla::model()->find(array('condition'=>'id_usuario=:x', 'params'=>array(':x'=>Yii::app()->user->id)));
		$localizacion_list = LocalizacionPlanilla::model()->findAll(array('condition'=>'id_establecimiento=:x','order' => 'id_localizacion ASC', 'params'=>array(':x'=>Yii::app()->getSession()->get('id_establecimiento'))));
		
		foreach($localizacion_list as $list1)
		{
			$company[] = Localizacion::model()->findByPk($list1->id_localizacion);
		}
	
		if(!isset($company))
		{
			Yii::app()->user->setFlash('error', '<strong>Error!</strong> El establecimiento no tiene localizaciones asociadas');
			$this->redirect(array('/'));
		}
	
		if(isset($_POST['SelectLocalizacion']))
		{
			$model->attributes=$_POST['SelectLocalizacion'];
			$planilla = UsuEstPla::model()->find(array('condition'=>'id_usuario=:x', 'params'=>array(':x'=>Yii::app()->user->id)));
	
			if($model->id_localizacion != null)
			{
				Yii::app()->getSession()->add('id_localizacion',$model->id_localizacion);
				$this->redirect(array('selectplanilla'));
				
					/* echo "<PRE>";
					print_r($_POST['SelectLocalizacion']);
					echo "</PRE>"; 
					echo $model->id_localizacion; */
			}
			else
			{
				Yii::app()->user->setFlash('error', '<strong>Por favor!</strong> Seleccione un tipo de planilla para cargar.');
				$this->redirect(array('select_localizacion'));
			}
		}
		else
		{
			$this->render('select_localizacion',array('model'=>$model,'company'=>$company,
			));
		}
	}
	
	public function actionDatosest() {
	
		$id=Yii::app()->user->id;
		$tipo= '';
		
		$establecimientousuario = UsuEstPla::model()->find('id_usuario = :id_uno',array(':id_uno'=>$id));
		$establecimiento = Establecimiento::model()->find('id_establecimiento = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_establecimiento')));
		$localizacion = Localizacion::model()->find('id_localizacion = :id_uno',array(':id_uno'=>Yii::app()->getSession()->get('id_localizacion')));
		
		$responsable = Responsable::model()->find('id_responsable = :id_est', array(':id_est'=>$establecimiento->id_responsable));

		$planilla_list = LocalizacionPlanilla::model()->findAllBySql('Select distinct
				localizacion_planilla.id_tipo_planilla
				From
				localizacion_planilla
				Where
				localizacion_planilla.id_establecimiento = :idEstablecimiento', array(':idEstablecimiento' => Yii::app()->getSession()->get('id_establecimiento')) );
		
		$model1= new Datosest;

		 $sql = "select id_datos_est from datosest
		where id_establecimiento= '$establecimiento->id_establecimiento' and
		mes ='$model1->mesactivostring' and anio ='$model1->anioactivointeger'";
		
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$id = $command->queryRow();
		Yii::app()->getSession()->add('id_datos_est',$id['id_datos_est']);
		/* 
	    echo "<PRE>";
		 print_r($id);
		echo "</PRE>";
 		echo $id['id_datos_est'];
		//$command->execute();  */
		
		foreach($planilla_list as $list1)
		{
			$tipo = $tipo . $list1->id_tipo_planilla;
		}

		if ($tipo == '1'){
			if (isset($id['id_datos_est']))
				$model=$this->loadModel($id['id_datos_est'],'Datosest');
			else
				$model= new Datosest('jmji');
		}
		
		if ($tipo == '2'){
			if (isset($id['id_datos_est']))
				$model=$this->loadModel($id['id_datos_est'],'Datosest');
			else
				$model= new Datosest('adultoprimaria');
		}
		
		if ($tipo == '5'){
			if (isset($id['id_datos_est']))
				$model=$this->loadModel($id['id_datos_est'],'Datosest');
			else
				$model= new Datosest('egb');
		}
		
		if ($tipo == '6'){
			if (isset($id['id_datos_est']))
				$model=$this->loadModel($id['id_datos_est'],'Datosest');
			else
				$model= new Datosest('sepo');
		}
		
		if ($tipo == '7'){
			if (isset($id['id_datos_est']))
				$model=$this->loadModel($id['id_datos_est'],'Datosest');
			else
				$model= new Datosest('adultosecundaria');
		}
		
		if ($tipo == '51' or $tipo == '15'){
			if (isset($id['id_datos_est']))
				$model=$this->loadModel($id['id_datos_est'],'Datosest');
			else
				$model= new Datosest('jmjiegb');
		}
		
		if ($tipo == '56' or $tipo == '65'){
			if (isset($id['id_datos_est']))
				$model=$this->loadModel($id['id_datos_est'],'Datosest');
			else
				$model= new Datosest('egbsepo');
		}
		
		if ($tipo == '61' or $tipo == '16'){
			if (isset($id['id_datos_est']))
				$model=$this->loadModel($id['id_datos_est'],'Datosest');
			else
				$model= new Datosest('jmjisepo');
		}
		
		
	    if ($tipo == '156' or $tipo == '165' or $tipo == '615' or $tipo == '516' or $tipo == '651' or $tipo == '561'){
			if (isset($id['id_datos_est']))
				$model=$this->loadModel($id['id_datos_est'],'Datosest');
			else
				$model= new Datosest('allcomun');
		}
		
		 if (empty($localizacion))
		{
			Yii::app()->user->setFlash('error', '<strong>Error!</strong> Seleccione la Localizacion SEDE (Anexo 00) en el menu Ingresador->Cargar Planilla he intentelo nuevamente');
			$this->redirect(array('/'));
		} 
		
		 if (!($localizacion->anexo == '00'))
		{
			Yii::app()->user->setFlash('error', '<strong>Error!</strong> Los datos del establecimiento solo pueden ser llenados por la localizacion SEDE (Anexo 00)');
			$this->redirect(array('/'));
		} 
		
	    if (isset($_POST['Datosest'])) {
	    	$model->setAttributes($_POST['Datosest']);
	    	$model->id_establecimiento= Yii::app()->getSession()->get('id_establecimiento');
	    	$model->mes= $model->mesactivostring;
	    	$model->anio= $model->anioactivointeger;
	    	
	     	/* echo "<PRE>";
	    	print_r($_POST['Datosest']);
	    	echo "</PRE>";  */
	    	
	    	 if ($model->save()) {
	    		if (Yii::app()->getRequest()->getIsAjaxRequest())
	    			Yii::app()->end();
	    		else
	    			$this->redirect(array('admin', 'id' => $model->id_datos_est));
	    	}  
	    }
	    
	    
	   //echo $tipo;
	   // echo Yii::app()->getSession()->get('id_establecimiento');
	    Yii::app()->getSession()->add('tipo',$tipo);
	    
	    if ($tipo == '1'){
	    	$this->render('datosestjmji',
	    			array('model'=>$model,
	    					'establecimiento' => $establecimiento,
	    					'localizacion'=>$localizacion,
	    					'responsable'=>	$responsable));
	    }
	    if ($tipo == '2'){
	    	$this->render('datosestadupri',
	    			array('model'=>$model,
	    					'establecimiento' => $establecimiento,
	    					'localizacion'=>$localizacion,
	    					'responsable'=>	$responsable));
	    }
	    if ($tipo == '5'){
	    	$this->render('datosestegb',
	    			array('model'=>$model,
	    					'establecimiento' => $establecimiento,
	    					'localizacion'=>$localizacion,
	    					'responsable'=>	$responsable));
	    }
	    if ($tipo == '6'){
	    	$this->render('datosestsepo',
	    			array('model'=>$model,
	    					'establecimiento' => $establecimiento,
	    					'localizacion'=>$localizacion,
	    					'responsable'=>	$responsable));
	    }
	    
	    if ($tipo == '7'){
	    	$this->render('datosestadusecu',
	    			array('model'=>$model,
	    					'establecimiento' => $establecimiento,
	    					'localizacion'=>$localizacion,
	    					'responsable'=>	$responsable));
	    }

	    if ($tipo == '51' or $tipo == '15'){
	    	$this->render('datosestjmjiegb',
	    			array('model'=>$model,
	    					'establecimiento' => $establecimiento,
	    					'localizacion'=>$localizacion,
	    					'responsable'=>	$responsable));
	    }
	    	 
	    if ($tipo == '61' or $tipo == '16'){
	    		$this->render('datosestjmjisepo',
	    				array('model'=>$model,
	    						'establecimiento' => $establecimiento,
	    						'localizacion'=>$localizacion,
	    						'responsable'=>	$responsable));
	    		}
	    if ($tipo == '56' or $tipo == '65'){
	    		$this->render('datosestegbsepo',
	    				array('model'=>$model,
	    						'establecimiento' => $establecimiento,
	    						'localizacion'=>$localizacion,
	    						'responsable'=>	$responsable));
	    		}
	     
	    if ($tipo == '156' or $tipo == '165' or $tipo == '615' or $tipo == '516' or $tipo == '651' or $tipo == '561'){
	    		$this->render('datosest',
	    				array('model'=>$model,
	    						'establecimiento' => $establecimiento,
	    						'localizacion'=>$localizacion,
	    						'responsable'=>	$responsable));
	    }
	}
	
	public function actionImprimirEstablecimiento(){//por ejemplo
	
		$model=$this->loadModel(Yii::app()->getSession()->get('id_datos_est'),'Datosest');
		
		echo "<PRE>";
		print_r($model);
		echo "</PRE>"; 
		
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
		
		if (Yii::app()->getSession()->get('tipo') == '1')
				{
					$aEstructuraDeCadaLineaGrilla = array(
							'total' => $model['tot_dic_cla'],
							'titular' => $model['tot_dic_tit'],
							'interina' => $model['tot_dic_int'],
							'transitoria' => $model['tot_dic_tra'],
							'suplente' => $model['tot_dic_sup'],
							'sinCubrir' => $model['tot_dic_sin'],
							'pasiva' => $model['tot_dic_pas'],
							'adscripta' => $model['tot_dic_lic'],
							'contrato' => $model['tot_dic_con'],
					);
					$aEstructuraDeCadaLineaGrilla1 = array(
							'total' => $model['tot_jar_mat'],
							'titular' => $model['tot_mat_tit'],
							'interina' => $model['tot_mat_int'],
							'transitoria' => $model['tot_mat_tra'],
							'suplente' => $model['tot_mat_sup'],
							'sinCubrir' => $model['tot_mat_sin'],
							'pasiva' => $model['tot_mat_pas'],
							'adscripta' => $model['tot_mat_lic'],
							'contrato' => $model['tot_mat_con'],
					);
					$aEstructuraDeCadaLineaGrilla2 = array(
							'total' => $model['tot_jar_inf'],
							'titular' => $model['tot_inf_tit'],
							'interina' => $model['tot_inf_int'],
							'transitoria' => $model['tot_inf_tra'],
							'suplente' => $model['tot_inf_sup'],
							'sinCubrir' => $model['tot_inf_sin'],
							'pasiva' => $model['tot_inf_pas'],
							'adscripta' => $model['tot_inf_lic'],
							'contrato' => $model['tot_inf_con'],
					);
					$aEstructuraDeCadaLineaGrilla3 = array(
							'total' => $model['tot_act_fun'],
							'titular' => $model['tot_fun_tit'],
							'interina' => $model['tot_fun_int'],
							'transitoria' => $model['tot_fun_tra'],
							'suplente' => $model['tot_fun_sup'],
							'sinCubrir' => $model['tot_fun_sin'],
							'pasiva' => $model['tot_fun_pas'],
							'adscripta' => $model['tot_fun_lic'],
							'contrato' => $model['tot_fun_con'],
					);
				}

	
		$nombreSeccion= '"nombreSeccion"';
		$tipoSeccion= '"tipoSeccion"';
		$matTotal='"matTotal"';
		$matVaron='"matVaron"';
		$matMujer='"matMujer"';
	
	$PDF = new PlanillaPDF();
		$linea = '';
		$sFecha = '';
		$sMes = '';
		$sAnio = '';
		$aEstablecimiento = array(
				'nombre' => $establecimiento['nombre'],
				'localizacion' => '',
				'cue' => $establecimiento['cue'],
				'anexo' => '',
				'mail' => $model['email'],
				'fecInauguracion' => $model['fec_ina'],
				'fecAniversario' => $model['fec_ani'],
				'fecInicio' => $model['fec_ini_act'],
				'lugarFecha' => $model['lugar_fecha'],
				'secretaria' => $model['secretario'],
				'vice' => $model['vicedirector'],
				'director' => $model['director'],
		);
/* 
		$aCiclosAP['total'] = $aTotalAP[0];
		$sArchivo = strtolower('AdultoPrimaria-'. date("Y-m-d")) . ".pdf";
		$PDF->ImprimirPlanillaLocalizacion(//
				$sTipo, //
				$sFecha, $sMes, //
				$sAnio, //
				$aEstablecimiento, //
				$aCiclosAP, //
				$aDivisionAP, //
				$aAlimentoAP, //
				$sArchivo); */
	}

}
