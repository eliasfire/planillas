<?php

class DatosestController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Datosest'),
		));
	}

	public function actionCreate() {
		$model = new Datosest;


		if (isset($_POST['Datosest'])) {
			$model->setAttributes($_POST['Datosest']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_datos_est));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Datosest');


		if (isset($_POST['Datosest'])) {
			$model->setAttributes($_POST['Datosest']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_datos_est));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Datosest')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Datosest');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Datosest('search');
		$model->unsetAttributes();

		if (isset($_GET['Datosest']))
			$model->setAttributes($_GET['Datosest']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}