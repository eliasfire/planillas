<?php

class TurnoController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Turno'),
		));
	}

	public function actionCreate() {
		$model = new Turno;


		if (isset($_POST['Turno'])) {
			$model->setAttributes($_POST['Turno']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_turno));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Turno');


		if (isset($_POST['Turno'])) {
			$model->setAttributes($_POST['Turno']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_turno));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Turno')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Turno');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Turno('search');
		$model->unsetAttributes();

		if (isset($_GET['Turno']))
			$model->setAttributes($_GET['Turno']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}