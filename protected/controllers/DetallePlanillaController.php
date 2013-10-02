<?php

class DetallePlanillaController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'DetallePlanilla'),
		));
	}

	public function actionCreate() {
		$model = new DetallePlanilla;


		if (isset($_POST['DetallePlanilla'])) {
			$model->setAttributes($_POST['DetallePlanilla']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_detalle_planilla));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'DetallePlanilla');


		if (isset($_POST['DetallePlanilla'])) {
			$model->setAttributes($_POST['DetallePlanilla']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_detalle_planilla));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'DetallePlanilla')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('DetallePlanilla');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new DetallePlanilla('search');
		$model->unsetAttributes();

		if (isset($_GET['DetallePlanilla']))
			$model->setAttributes($_GET['DetallePlanilla']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}