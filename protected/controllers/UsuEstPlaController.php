<?php

class UsuEstPlaController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'UsuEstPla'),
		));
	}

	public function actionCreate() {
		$model = new UsuEstPla;


		if (isset($_POST['UsuEstPla'])) {
			$model->setAttributes($_POST['UsuEstPla']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_usu_est_pla));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'UsuEstPla');


		if (isset($_POST['UsuEstPla'])) {
			$model->setAttributes($_POST['UsuEstPla']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_usu_est_pla));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'UsuEstPla')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('UsuEstPla');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new UsuEstPla('search');
		$model->unsetAttributes();

		if (isset($_GET['UsuEstPla']))
			$model->setAttributes($_GET['UsuEstPla']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}