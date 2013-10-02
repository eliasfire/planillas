<?php

class EducacionNoFormalController extends GxController {

	
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'EducacionNoFormal'),
		));
	}

	public function actionCreate() {
		$model = new EducacionNoFormal;


		if (isset($_POST['EducacionNoFormal'])) {
			$model->setAttributes($_POST['EducacionNoFormal']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_educacion_no_formal));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'EducacionNoFormal');


		if (isset($_POST['EducacionNoFormal'])) {
			$model->setAttributes($_POST['EducacionNoFormal']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_educacion_no_formal));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'EducacionNoFormal')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('EducacionNoFormal');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new EducacionNoFormal('search');
		$model->unsetAttributes();

		if (isset($_GET['EducacionNoFormal']))
			$model->setAttributes($_GET['EducacionNoFormal']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}