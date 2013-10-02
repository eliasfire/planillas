<?php

/**
 * This is the model base class for the table "establecimiento".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Establecimiento".
 *
 * Columns in table "establecimiento" available as properties of the model,
 * followed by relations of table "establecimiento" available as properties of the model.
 *
 * @property integer $id_establecimiento
 * @property string $cue
 * @property string $nombre
 * @property integer $c_sector
 * @property integer $id_responsable
 * @property integer $c_estado
 *
 * @property UsuEstPla[] $usuEstPlas
 * @property Localizacion[] $localizacions
 * @property Planilla[] $planillas
 * @property Responsable $idResponsable
 */
abstract class BaseEstablecimiento extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'establecimiento';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Establecimiento|Establecimientos', $n);
	}

	public static function representingColumn() {
		return 'nombre';
	}

	public function rules() {
		return array(
			array('cue, nombre, c_sector, id_responsable, c_estado', 'required'),
			array('c_sector, id_responsable, c_estado', 'numerical', 'integerOnly'=>true),
			array('id_establecimiento, cue, nombre, c_sector, id_responsable, c_estado', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'usuEstPlas' => array(self::HAS_MANY, 'UsuEstPla', 'id_establecimiento'),
			'localizacions' => array(self::HAS_MANY, 'Localizacion', 'id_establecimiento'),
			'planillas' => array(self::HAS_MANY, 'Planilla', 'id_establecimiento'),
			'idResponsable' => array(self::BELONGS_TO, 'Responsable', 'id_responsable'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_establecimiento' => Yii::t('app', 'Id Establecimiento'),
			'cue' => Yii::t('app', 'Cue'),
			'nombre' => Yii::t('app', 'Establecimiento'),
			'c_sector' => Yii::t('app', 'C Sector'),
			'id_responsable' => null,
			'c_estado' => Yii::t('app', 'C Estado'),
			'usuEstPlas' => null,
			'localizacions' => null,
			'planillas' => null,
			'idResponsable' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_establecimiento', $this->id_establecimiento);
		$criteria->compare('cue', $this->cue, true);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('c_sector', $this->c_sector);
		$criteria->compare('id_responsable', $this->id_responsable);
		$criteria->compare('c_estado', $this->c_estado);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}