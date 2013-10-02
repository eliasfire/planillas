<?php
Yii::app()->clientScript
->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js')
->registerScriptFile(Yii::app()->baseUrl . '/path/to/datatables/script/datatables.js');

class SalaController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Sala'),
		));
	}

	public function actionCreate() {
		$model = new Sala;


		if (isset($_POST['Sala'])) {
			$model->setAttributes($_POST['Sala']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_sala));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Sala');


		if (isset($_POST['Sala'])) {
			$model->setAttributes($_POST['Sala']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_sala));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Sala')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Sala');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Sala('search');
		$model->unsetAttributes();

		if (isset($_GET['Sala']))
			$model->setAttributes($_GET['Sala']);

		$widget=$this->createWidget('ext.EDataTables.EDataTables', array(
				'id'            => 'salas',
				'dataProvider'  => $model->search(),
				'ajaxUrl'       => Yii::app()->getBaseUrl().'/sala/admin',
				'columns'=>array(
		'id_sala',
		'descripcion',
		'codigo',
	
		)));
		if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
			$this->render('admin', array('widget' => $widget,'model' => $model,));
			return;
		} else {
			json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
			Yii::app()->end();
		}
		/*
		$this->render('admin', array(
			'model' => $model,
		));*/
	}

	
}