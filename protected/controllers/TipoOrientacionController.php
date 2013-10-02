<?php

class TipoOrientacionController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'TipoOrientacion'),
		));
	}

	public function actionCreate() {
		$model = new TipoOrientacion;


		if (isset($_POST['TipoOrientacion'])) {
			$model->setAttributes($_POST['TipoOrientacion']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_tipo_orientacion));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'TipoOrientacion');


		if (isset($_POST['TipoOrientacion'])) {
			$model->setAttributes($_POST['TipoOrientacion']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_tipo_orientacion));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'TipoOrientacion')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('TipoOrientacion');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new TipoOrientacion('search');
		$model->unsetAttributes();

		if (isset($_GET['TipoOrientacion']))
			$model->setAttributes($_GET['TipoOrientacion']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}