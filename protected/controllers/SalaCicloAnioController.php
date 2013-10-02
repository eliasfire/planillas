<?php

class SalaCicloAnioController extends GxController {

	public function filters()
	{
		return array(
				'rights', // perform access control for CRUD operations
		);
	}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'SalaCicloAnio'),
		));
	}

	public function actionCreate() {
		$model = new SalaCicloAnio;


		if (isset($_POST['SalaCicloAnio'])) {
			$model->setAttributes($_POST['SalaCicloAnio']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id_sala_ciclo_anio));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'SalaCicloAnio');


		if (isset($_POST['SalaCicloAnio'])) {
			$model->setAttributes($_POST['SalaCicloAnio']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id_sala_ciclo_anio));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'SalaCicloAnio')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('SalaCicloAnio');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new SalaCicloAnio('search');
		$model->unsetAttributes();

		if (isset($_GET['SalaCicloAnio']))
			$model->setAttributes($_GET['SalaCicloAnio']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}