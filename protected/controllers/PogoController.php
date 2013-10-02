<?php

class PogoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{

		
		if(isset($_POST['Pogo']))
		{
			if($this->savePogo($_POST['Pogo']))
				$this->redirect(array('admin','model'=>$_POST['Pogo']['id'][0]));
		}
		 
		$model=new Pogo;

		//create an array with one model Pogo
		$data = array($model);
		 
		$this->render('create',array(
				'data'=>$data, //array of 'Pogo'
		));
	}

	protected function savePogo($formData)
	{
		if (empty($formData))
			return;
	
		$result = array();
		$idx=0;
	
		//You will get 3 arrays in $formData: id, firstname, lastname
	
		foreach($formData['name'] as $name)
		{
			$model = new Pogo;
			$model->name = $name;
	
			//The other attributes can be found at the same postion in the formData
			$model->value = $formData['value'][$idx];
			$model->comment = $formData['comment'][$idx];
	
			//no id is submitted for new items
			if(!empty($formData['id'][$idx]))
				$model->id = $formData['id'][$idx];
	
	
			if(!$model->save())
				return false;
	
			$idx++;
		}
		return true;
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		//this only would load a single model, don't use it
		//$model=$this->loadModel($id);

		if(isset($_POST['Pogo']))
		{
			if($this->savePogo($_POST['Pogo'])) //save all records
				$this->redirect(array('view','id'=>$data->id));
		}

		$model = new Pogo();

		//$data is an array of the model 'Pogo', not a single 'Pogo'
		$data = $model->findAll();

		$this->render('update',array(
				'data'=>$data, //array of 'Pogo'
		));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Pogo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pogo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pogo']))
			$model->attributes=$_GET['Pogo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pogo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pogo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pogo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pogo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
