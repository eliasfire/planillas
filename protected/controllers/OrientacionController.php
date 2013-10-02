<?php

class OrientacionController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Orientacion'),
		));
	}

	public function actionCreate() {
		$model = new Orientacion;


		if (isset($_POST['Orientacion'])) {
			$model->setAttributes($_POST['Orientacion']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_orientacion));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Orientacion');


		if (isset($_POST['Orientacion'])) {
			$model->setAttributes($_POST['Orientacion']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_orientacion));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Orientacion')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Orientacion');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Orientacion('search');
		$model->unsetAttributes();

		if (isset($_GET['Orientacion']))
			$model->setAttributes($_GET['Orientacion']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}