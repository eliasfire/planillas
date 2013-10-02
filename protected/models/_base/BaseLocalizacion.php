<?php

/**
 * This is the model base class for the table "localizacion".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Localizacion".
 *
 * Columns in table "localizacion" available as properties of the model,
 * followed by relations of table "localizacion" available as properties of the model.
 *
 * @property integer $id_localizacion
 * @property integer $id_establecimiento
 * @property string $anexo
 * @property string $nombre
 * @property integer $c_estado
 *
 * @property Establecimiento $idEstablecimiento
 */
abstract class BaseLocalizacion extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'localizacion';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Localizacion|Localizaciones', $n);
	}

	public static function representingColumn() {
		return 'nombre';
	}

	public function rules() {
		return array(
			array('id_establecimiento, anexo, nombre, c_estado', 'required'),
			array('id_establecimiento, c_estado', 'numerical', 'integerOnly'=>true),
			array('id_localizacion, id_establecimiento, anexo, nombre, c_estado', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idEstablecimiento' => array(self::BELONGS_TO, 'Establecimiento', 'id_establecimiento'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_localizacion' => Yii::t('app', 'Id Localizacion'),
			'id_establecimiento' => null,
			'anexo' => Yii::t('app', 'Anexo'),
			'nombre' => Yii::t('app', 'Localizacion'),
			'c_estado' => Yii::t('app', 'C Estado'),
			'idEstablecimiento' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_localizacion', $this->id_localizacion);
		$criteria->compare('id_establecimiento', $this->id_establecimiento);
		$criteria->compare('anexo', $this->anexo, true);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('c_estado', $this->c_estado);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	
	public function getGridDataProvider($id) {
		$criteria = new CDbCriteria;
	
		$criteria->compare('id_establecimiento', $id);
	
		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}
	
	function getLocalizacionAnexo()
	{
		return $this->nombre.' ----> ANEXO : '.$this->anexo;
	}
}