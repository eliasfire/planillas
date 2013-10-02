<?php

class ActividadTallerController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'ActividadTaller'),
		));
	}

	public function actionCreate() {
		$model = new ActividadTaller;


		if (isset($_POST['ActividadTaller'])) {
			$model->setAttributes($_POST['ActividadTaller']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_actividad_taller));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'ActividadTaller');


		if (isset($_POST['ActividadTaller'])) {
			$model->setAttributes($_POST['ActividadTaller']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_actividad_taller));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'ActividadTaller')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('ActividadTaller');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new ActividadTaller('search');
		$model->unsetAttributes();

		if (isset($_GET['ActividadTaller']))
			$model->setAttributes($_GET['ActividadTaller']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}