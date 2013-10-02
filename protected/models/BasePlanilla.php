<?php

/**
 * This is the model base class for the table "planilla".
 *
 * Columns in table "planilla" available as properties of the model:
 * @property integer $id_planilla
 * @property string $mes
 * @property integer $anio
 * @property integer $id_localizacion
 *
 * There are no model relations.
 */
abstract class BasePlanilla extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'planilla';
	}

	public function rules()
	{
		return array(
			array('id_planilla', 'required'),
			array('mes, anio, id_localizacion', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id_planilla, anio, id_localizacion', 'numerical', 'integerOnly'=>true),
			array('mes', 'length', 'max'=>10),
			array('id_planilla, mes, anio, id_localizacion', 'safe', 'on'=>'search'),
		);
	}

    public function behaviors() {
        return array_merge(
            parent::rules(),
            array(
                'savedRelated' => array(
                'class' => 'vendor.phundament.gii-template-collection.components.CSaveRelationsBehavior'
            )
        )
        );
    }

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id_planilla' => Yii::t('crud', 'Id Planilla'),
			'mes' => Yii::t('crud', 'Mes'),
			'anio' => Yii::t('crud', 'Anio'),
			'id_localizacion' => Yii::t('crud', 'Id Localizacion'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.id_planilla', $this->id_planilla);
		$criteria->compare('t.mes', $this->mes, true);
		$criteria->compare('t.anio', $this->anio);
		$criteria->compare('t.id_localizacion', $this->id_localizacion);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function get_label()
	{
		return '#'.$this->id_planilla;		
		
			}
	
}
