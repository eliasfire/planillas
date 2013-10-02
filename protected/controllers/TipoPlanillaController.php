<?php

class TipoPlanillaController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'TipoPlanilla'),
		));
	}

	public function actionCreate() {
		$model = new TipoPlanilla;


		if (isset($_POST['TipoPlanilla'])) {
			$model->setAttributes($_POST['TipoPlanilla']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_tipo_planilla));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'TipoPlanilla');


		if (isset($_POST['TipoPlanilla'])) {
			$model->setAttributes($_POST['TipoPlanilla']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_tipo_planilla));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'TipoPlanilla')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('TipoPlanilla');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new TipoPlanilla('search');
		$model->unsetAttributes();

		if (isset($_GET['TipoPlanilla']))
			$model->setAttributes($_GET['TipoPlanilla']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}