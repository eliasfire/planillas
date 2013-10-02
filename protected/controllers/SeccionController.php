<?php

class SeccionController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Seccion'),
		));
	}

	public function actionCreate() {
		$model = new Seccion;


		if (isset($_POST['Seccion'])) {
			$model->setAttributes($_POST['Seccion']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_seccion));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Seccion');


		if (isset($_POST['Seccion'])) {
			$model->setAttributes($_POST['Seccion']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_seccion));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Seccion')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Seccion');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Seccion('search');
		$model->unsetAttributes();

		if (isset($_GET['Seccion']))
			$model->setAttributes($_GET['Seccion']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}