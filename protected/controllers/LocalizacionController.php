<?php

class LocalizacionController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Localizacion'),
		));
	}

	public function actionCreate() {
		$model = new Localizacion;


		if (isset($_POST['Localizacion'])) {
			$model->setAttributes($_POST['Localizacion']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_localizacion));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Localizacion');


		if (isset($_POST['Localizacion'])) {
			$model->setAttributes($_POST['Localizacion']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_localizacion));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Localizacion')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Localizacion');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Localizacion('search');
		$model->unsetAttributes();

		if (isset($_GET['Localizacion']))
			$model->setAttributes($_GET['Localizacion']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	

}