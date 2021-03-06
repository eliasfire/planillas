<?php

/**
 * This is the model base class for the table "tipo_orientacion".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "TipoOrientacion".
 *
 * Columns in table "tipo_orientacion" available as properties of the model,
 * followed by relations of table "tipo_orientacion" available as properties of the model.
 *
 * @property integer $id_tipo_orientacion
 * @property string $descripcion
 *
 * @property Orientacion[] $orientacions
 */
abstract class BaseTipoOrientacion extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tipo_orientacion';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'TipoOrientacion|TipoOrientacions', $n);
	}

	public static function representingColumn() {
		return 'descripcion';
	}

	public function rules() {
		return array(
			array('descripcion', 'safe'),
			array('descripcion', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id_tipo_orientacion, descripcion', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'orientacions' => array(self::HAS_MANY, 'Orientacion', 'id_tipo_orientacion'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_tipo_orientacion' => Yii::t('app', 'Id Tipo Orientacion'),
			'descripcion' => Yii::t('app', 'Descripcion'),
			'orientacions' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_tipo_orientacion', $this->id_tipo_orientacion);
		$criteria->compare('descripcion', $this->descripcion, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	
	public function SelectPlanDeEstudio()
	{
		/* echo "<PRE>";
		 print_r($_POST);
		echo "</PRE>"; */
		$id_localizacion= Yii::app()->getSession()->get('id_localizacion');
	
	
	
		$sql = "Select distinct
		titulo_tipo.c_titulo,
		titulo_tipo.descripcion
		From
		oferta_local Inner Join
		oferta_tipo On oferta_local.c_oferta = oferta_tipo.c_oferta Inner Join
		localizacion On oferta_local.id_localizacion = localizacion.id_localizacion
		Inner Join
		establecimiento On localizacion.id_establecimiento =
		establecimiento.id_establecimiento Inner Join
		estado_tipo On oferta_local.c_estado = estado_tipo.c_estado And
		localizacion.c_estado = estado_tipo.c_estado And establecimiento.c_estado =
		estado_tipo.c_estado Inner Join
		titulo_oferta_tipo On titulo_oferta_tipo.c_oferta = oferta_tipo.c_oferta
		Inner Join
		titulo_tipo On titulo_oferta_tipo.c_titulo = titulo_tipo.c_titulo Inner Join
		plan_estudio_local On plan_estudio_local.id_oferta_local =
		oferta_local.id_oferta_local And plan_estudio_local.c_titulo_oferta =
		titulo_oferta_tipo.c_titulo_oferta Inner Join
		plan_estudio_local_secundaria
		On plan_estudio_local_secundaria.id_plan_estudio_local =
		plan_estudio_local.id_plan_estudio_local Inner Join
		orientacion_tipo On plan_estudio_local_secundaria.c_orientacion =
		orientacion_tipo.c_orientacion
		Where
		localizacion.id_localizacion = '$id_localizacion' And
		oferta_local.c_estado = 1 And
		plan_estudio_local.c_requisito <> 2";
	
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$lista = $command->queryAll();
	
		return $lista;
	
	}
	
	public function SelectOrientacion()
	{
		/* echo "<PRE>";
			print_r($_POST);
		echo "</PRE>"; */
	
		$id_uno = $_POST['id'];
		$id_localizacion= Yii::app()->getSession()->get('id_localizacion');
	
	
		$sql = "Select
		orientacion_tipo.c_orientacion,
		orientacion_tipo.descripcion
		From
		oferta_local Inner Join
		oferta_tipo On oferta_local.c_oferta = oferta_tipo.c_oferta Inner Join
		localizacion On oferta_local.id_localizacion = localizacion.id_localizacion
		Inner Join
		establecimiento On localizacion.id_establecimiento =
		establecimiento.id_establecimiento Inner Join
		estado_tipo On oferta_local.c_estado = estado_tipo.c_estado And
		localizacion.c_estado = estado_tipo.c_estado And establecimiento.c_estado =
		estado_tipo.c_estado Inner Join
		titulo_oferta_tipo On titulo_oferta_tipo.c_oferta = oferta_tipo.c_oferta
		Inner Join
		titulo_tipo On titulo_oferta_tipo.c_titulo = titulo_tipo.c_titulo Inner Join
		plan_estudio_local On plan_estudio_local.id_oferta_local =
		oferta_local.id_oferta_local And plan_estudio_local.c_titulo_oferta =
		titulo_oferta_tipo.c_titulo_oferta Inner Join
		plan_estudio_local_secundaria
		On plan_estudio_local_secundaria.id_plan_estudio_local =
		plan_estudio_local.id_plan_estudio_local Inner Join
		orientacion_tipo On plan_estudio_local_secundaria.c_orientacion =
		orientacion_tipo.c_orientacion
		Where
		localizacion.id_localizacion = '$id_localizacion' And
		oferta_local.c_estado = 1 And
		plan_estudio_local.c_requisito <> 2 ";
	
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql);
		$lista = $command->queryAll();
		return $lista;
	
		
		}
}