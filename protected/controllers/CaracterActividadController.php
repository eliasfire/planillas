<?php

class CaracterActividadController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'CaracterActividad'),
		));
	}

	public function actionCreate() {
		$model = new CaracterActividad;


		if (isset($_POST['CaracterActividad'])) {
			$model->setAttributes($_POST['CaracterActividad']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_caracter_actividad));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'CaracterActividad');


		if (isset($_POST['CaracterActividad'])) {
			$model->setAttributes($_POST['CaracterActividad']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_caracter_actividad));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'CaracterActividad')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('CaracterActividad');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new CaracterActividad('search');
		$model->unsetAttributes();

		if (isset($_GET['CaracterActividad']))
			$model->setAttributes($_GET['CaracterActividad']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}