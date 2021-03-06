<?php

/**
 * This is the model base class for the table "planilla".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Planilla".
 *
 * Columns in table "planilla" available as properties of the model,
 * followed by relations of table "planilla" available as properties of the model.
 *
 * @property integer $id_planilla
 * @property string $mes
 * @property integer $anio
 * @property integer $id_tipo_planilla
 * @property integer $id_establecimiento
 * @property string $ingresador
 * @property integer $alu_tot_ind
 * @property integer $tot_ind_alf
 * @property integer $tot_ind_pri
 * @property integer $tot_ind_sec
 * @property integer $alu_tot_mul
 * @property integer $tot_mul_alf
 * @property integer $tot_mul_pri
 * @property integer $tot_mul_sec
 * @property integer $alu_mul_ind
 * @property integer $alu_tot_alf
 * @property integer $alu_tot_pri
 * @property integer $alu_tot_sec
 * @property string $fecha_creado
 * @property string $ultimo_login
 * @property integer $tot_ind_pol
 * @property integer $tot_mul_pol
 * @property integer $alu_tot_pol
 * @property integer $confirmado
 *
 * @property DetallePlanilla[] $detallePlanillas
 * @property TipoPlanilla $idTipoPlanilla
 * @property Establecimiento $idEstablecimiento
 */
abstract class BasePlanilla extends GxActiveRecord {
	
	public $detalle;

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'planilla';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Planilla|Planillas', $n);
	}

	public static function representingColumn() {
		return 'mes';
	}

	public function rules() {
		return array(
			array('anio, id_tipo_planilla, id_establecimiento, alu_tot_ind, tot_ind_alf, tot_ind_pri, tot_ind_sec, alu_tot_mul, tot_mul_alf, tot_mul_pri, tot_mul_sec, alu_mul_ind, alu_tot_alf, alu_tot_pri, alu_tot_sec, tot_ind_pol, tot_mul_pol, alu_tot_pol, confirmado', 'numerical', 'integerOnly'=>true),
			array('mes', 'length', 'max'=>10),
			array('ingresador', 'length', 'max'=>30),
			array('fecha_creado, ultimo_login', 'safe'),
			array('mes, anio, id_tipo_planilla, id_establecimiento, ingresador, alu_tot_ind, tot_ind_alf, tot_ind_pri, tot_ind_sec, alu_tot_mul, tot_mul_alf, tot_mul_pri, tot_mul_sec, alu_mul_ind, alu_tot_alf, alu_tot_pri, alu_tot_sec, fecha_creado, ultimo_login, tot_ind_pol, tot_mul_pol, alu_tot_pol, confirmado', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id_planilla, mes, anio, id_tipo_planilla, id_establecimiento, ingresador, alu_tot_ind, tot_ind_alf, tot_ind_pri, tot_ind_sec, alu_tot_mul, tot_mul_alf, tot_mul_pri, tot_mul_sec, alu_mul_ind, alu_tot_alf, alu_tot_pri, alu_tot_sec, fecha_creado, ultimo_login, tot_ind_pol, tot_mul_pol, alu_tot_pol, confirmado', 'safe', 'on'=>'search'),
			array('id_tipo_planilla, id_establecimiento, alu_tot_ind, tot_ind_alf, tot_ind_pri, tot_ind_sec, alu_tot_mul, tot_mul_alf, tot_mul_pri, tot_mul_sec, alu_mul_ind, alu_tot_alf, alu_tot_pri, alu_tot_sec, tot_ind_pol, tot_mul_pol, alu_tot_pol, ingresador', 'required', 'on'=>'adulto'),
			array('id_tipo_planilla, id_establecimiento, ingresador', 'required', 'on'=>'inicial'),
		);
	}

	public function relations() {
		return array(
			'detallePlanillas' => array(self::HAS_MANY, 'DetallePlanilla', 'id_planilla'),
			'idTipoPlanilla' => array(self::BELONGS_TO, 'TipoPlanilla', 'id_tipo_planilla'),
			'idEstablecimiento' => array(self::BELONGS_TO, 'Establecimiento', 'id_establecimiento'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_planilla' => Yii::t('app', 'Id Planilla'),
			'mes' => Yii::t('app', 'Mes'),
			'anio' => Yii::t('app', 'Año'),
			'id_tipo_planilla' => null,
			'id_establecimiento' => null,
			'ingresador' => Yii::t('app', 'Ingresador'),
			'alu_tot_ind' => Yii::t('app', 'Alu Tot Ind'),
			'tot_ind_alf' => Yii::t('app', 'Tot Ind Alf'),
			'tot_ind_pri' => Yii::t('app', 'Tot Ind Pri'),
			'tot_ind_sec' => Yii::t('app', 'Tot Ind Sec'),
			'alu_tot_mul' => Yii::t('app', 'Alu Tot Mul'),
			'tot_mul_alf' => Yii::t('app', 'Tot Mul Alf'),
			'tot_mul_pri' => Yii::t('app', 'Tot Mul Pri'),
			'tot_mul_sec' => Yii::t('app', 'Tot Mul Sec'),
			'alu_mul_ind' => Yii::t('app', 'Alu Mul Ind'),
			'alu_tot_alf' => Yii::t('app', 'Alu Tot Alf'),
			'alu_tot_pri' => Yii::t('app', 'Alu Tot Pri'),
			'alu_tot_sec' => Yii::t('app', 'Alu Tot Sec'),
			'fecha_creado' => Yii::t('app', 'Fecha Creado'),
			'ultimo_login' => Yii::t('app', 'Ultimo Login'),
			'tot_ind_pol' => Yii::t('app', 'Tot Ind Pol'),
			'tot_mul_pol' => Yii::t('app', 'Tot Mul Pol'),
			'alu_tot_pol' => Yii::t('app', 'Alu Tot Pol'),
			'confirmado' => Yii::t('app', 'Confirmado'),
			'detallePlanillas' => null,
			'idTipoPlanilla' => null,
			'idEstablecimiento' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_planilla', $this->id_planilla);
		$criteria->compare('mes', $this->mes, true);
		$criteria->compare('anio', $this->anio);
		$criteria->compare('id_tipo_planilla', $this->id_tipo_planilla);
		$criteria->compare('id_establecimiento', $this->id_establecimiento);
		$criteria->compare('ingresador', $this->ingresador, true);
		$criteria->compare('alu_tot_ind', $this->alu_tot_ind);
		$criteria->compare('tot_ind_alf', $this->tot_ind_alf);
		$criteria->compare('tot_ind_pri', $this->tot_ind_pri);
		$criteria->compare('tot_ind_sec', $this->tot_ind_sec);
		$criteria->compare('alu_tot_mul', $this->alu_tot_mul);
		$criteria->compare('tot_mul_alf', $this->tot_mul_alf);
		$criteria->compare('tot_mul_pri', $this->tot_mul_pri);
		$criteria->compare('tot_mul_sec', $this->tot_mul_sec);
		$criteria->compare('alu_mul_ind', $this->alu_mul_ind);
		$criteria->compare('alu_tot_alf', $this->alu_tot_alf);
		$criteria->compare('alu_tot_pri', $this->alu_tot_pri);
		$criteria->compare('alu_tot_sec', $this->alu_tot_sec);
		$criteria->compare('fecha_creado', $this->fecha_creado, true);
		$criteria->compare('ultimo_login', $this->ultimo_login, true);
		$criteria->compare('tot_ind_pol', $this->tot_ind_pol);
		$criteria->compare('tot_mul_pol', $this->tot_mul_pol);
		$criteria->compare('alu_tot_pol', $this->alu_tot_pol);
		$criteria->compare('confirmado', $this->confirmado);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	
	public function getGridDataProvider($id) {
	
		$idusu=Yii::app()->user->id;
	
		$establecimientousuario = UsuEstPla::model()->find('id_usuario = :id_uno',array(':id_uno'=>$idusu));
		$establecimiento = Establecimiento::model()->find('id_establecimiento = :id_uno',array(':id_uno'=>$establecimientousuario->id_establecimiento));
	
		$criteria = new CDbCriteria;
	
		//$criteria->compare('id_planilla', $id);
		$criteria->compare('id_establecimiento', $establecimientousuario->id_establecimiento);
	
		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
				'sort'=>array(
						'defaultOrder' => 'id_planilla',
				),
				'pagination' => array(
						'pagesize' => 30,
				),
		));
	
	}
}