<?php

/**
 * This is the model base class for the table "inicial_egb_poli_prima_secu".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "InicialEgbPoliPrimaSecu".
 *
 * Columns in table "inicial_egb_poli_prima_secu" available as properties of the model,
 * followed by relations of table "inicial_egb_poli_prima_secu" available as properties of the model.
 *
 * @property integer $id_inicial_egb_poli_prima_secu
 * @property integer $id_sala
 * @property integer $id_nivel
 * @property integer $id_turno
 * @property integer $id_seccion
 * @property integer $id_orientacion
 * @property integer $tot_alu_mat
 * @property integer $var_alu_mat
 * @property integer $muj_alu_mat
 * @property integer $tot_alu_rep
 * @property integer $var_alu_rep
 * @property integer $muj_alu_rep
 * @property integer $necesidad_esp
 * @property string $fecha
 * @property integer $id_establecimiento
 * @property string $mes
 * @property integer $anio
 *
 * @property NivelServicio $idNivel
 * @property Turno $idTurno
 * @property Orientacion $idOrientacion
 * @property Establecimiento $idEstablecimiento
 * @property Seccion $idSeccion
 * @property Sala $idSala
 */
abstract class BaseInicialEgbPoliPrimaSecu extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'inicial_egb_poli_prima_secu';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'InicialEgbPoliPrimaSecu|InicialEgbPoliPrimaSecus', $n);
	}

	public static function representingColumn() {
		return 'fecha';
	}

	public function rules() {
		return array(
			array('id_inicial_egb_poli_prima_secu', 'required'),
			array('id_inicial_egb_poli_prima_secu, id_sala, id_nivel, id_turno, id_seccion, id_orientacion, tot_alu_mat, var_alu_mat, muj_alu_mat, tot_alu_rep, var_alu_rep, muj_alu_rep, necesidad_esp, id_establecimiento, anio', 'numerical', 'integerOnly'=>true),
			array('mes', 'length', 'max'=>12),
			array('fecha', 'safe'),
			array('id_sala, id_nivel, id_turno, id_seccion, id_orientacion, tot_alu_mat, var_alu_mat, muj_alu_mat, tot_alu_rep, var_alu_rep, muj_alu_rep, necesidad_esp, fecha, id_establecimiento, mes, anio', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id_inicial_egb_poli_prima_secu, id_sala, id_nivel, id_turno, id_seccion, id_orientacion, tot_alu_mat, var_alu_mat, muj_alu_mat, tot_alu_rep, var_alu_rep, muj_alu_rep, necesidad_esp, fecha, id_establecimiento, mes, anio', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idNivel' => array(self::BELONGS_TO, 'NivelServicio', 'id_nivel'),
			'idTurno' => array(self::BELONGS_TO, 'Turno', 'id_turno'),
			'idOrientacion' => array(self::BELONGS_TO, 'Orientacion', 'id_orientacion'),
			'idEstablecimiento' => array(self::BELONGS_TO, 'Establecimiento', 'id_establecimiento'),
			'idSeccion' => array(self::BELONGS_TO, 'Seccion', 'id_seccion'),
			'idSala' => array(self::BELONGS_TO, 'Sala', 'id_sala'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_inicial_egb_poli_prima_secu' => Yii::t('app', 'Id Inicial Egb Poli Prima Secu'),
			'id_sala' => null,
			'id_nivel' => null,
			'id_turno' => null,
			'id_seccion' => null,
			'id_orientacion' => null,
			'tot_alu_mat' => Yii::t('app', 'Tot Alu Mat'),
			'var_alu_mat' => Yii::t('app', 'Var Alu Mat'),
			'muj_alu_mat' => Yii::t('app', 'Muj Alu Mat'),
			'tot_alu_rep' => Yii::t('app', 'Tot Alu Rep'),
			'var_alu_rep' => Yii::t('app', 'Var Alu Rep'),
			'muj_alu_rep' => Yii::t('app', 'Muj Alu Rep'),
			'necesidad_esp' => Yii::t('app', 'Necesidad Esp'),
			'fecha' => Yii::t('app', 'Fecha'),
			'id_establecimiento' => null,
			'mes' => Yii::t('app', 'Mes'),
			'anio' => Yii::t('app', 'Anio'),
			'idNivel' => null,
			'idTurno' => null,
			'idOrientacion' => null,
			'idEstablecimiento' => null,
			'idSeccion' => null,
			'idSala' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_inicial_egb_poli_prima_secu', $this->id_inicial_egb_poli_prima_secu);
		$criteria->compare('id_sala', $this->id_sala);
		$criteria->compare('id_nivel', $this->id_nivel);
		$criteria->compare('id_turno', $this->id_turno);
		$criteria->compare('id_seccion', $this->id_seccion);
		$criteria->compare('id_orientacion', $this->id_orientacion);
		$criteria->compare('tot_alu_mat', $this->tot_alu_mat);
		$criteria->compare('var_alu_mat', $this->var_alu_mat);
		$criteria->compare('muj_alu_mat', $this->muj_alu_mat);
		$criteria->compare('tot_alu_rep', $this->tot_alu_rep);
		$criteria->compare('var_alu_rep', $this->var_alu_rep);
		$criteria->compare('muj_alu_rep', $this->muj_alu_rep);
		$criteria->compare('necesidad_esp', $this->necesidad_esp);
		$criteria->compare('fecha', $this->fecha, true);
		$criteria->compare('id_establecimiento', $this->id_establecimiento);
		$criteria->compare('mes', $this->mes, true);
		$criteria->compare('anio', $this->anio);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}