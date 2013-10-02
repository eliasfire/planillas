<?php

class NivelServicioController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'NivelServicio'),
		));
	}

	public function actionCreate() {
		$model = new NivelServicio;


		if (isset($_POST['NivelServicio'])) {
			$model->setAttributes($_POST['NivelServicio']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_nivel));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'NivelServicio');


		if (isset($_POST['NivelServicio'])) {
			$model->setAttributes($_POST['NivelServicio']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_nivel));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'NivelServicio')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('NivelServicio');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new NivelServicio('search');
		$model->unsetAttributes();

		if (isset($_GET['NivelServicio']))
			$model->setAttributes($_GET['NivelServicio']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}