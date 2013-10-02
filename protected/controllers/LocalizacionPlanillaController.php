<?php

class LocalizacionPlanillaController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'LocalizacionPlanilla'),
		));
	}

	public function actionCreate() {
		$model = new LocalizacionPlanilla;


		if (isset($_POST['LocalizacionPlanilla'])) {
			$model->setAttributes($_POST['LocalizacionPlanilla']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_localizacion_planilla));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'LocalizacionPlanilla');


		if (isset($_POST['LocalizacionPlanilla'])) {
			$model->setAttributes($_POST['LocalizacionPlanilla']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_localizacion_planilla));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'LocalizacionPlanilla')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('LocalizacionPlanilla');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new LocalizacionPlanilla('search');
		$model->unsetAttributes();

		if (isset($_GET['LocalizacionPlanilla']))
			$model->setAttributes($_GET['LocalizacionPlanilla']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}