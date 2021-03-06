<?php

/**
 * This is the model base class for the table "planilla_detalle".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "PlanillaDetalle".
 *
 * Columns in table "planilla_detalle" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id_establecimiento
 * @property integer $id_detalle
 *
 */
abstract class BasePlanillaDetalle extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'planilla_detalle';
    }

    public static function representingColumn() {
        return array(
            'id_establecimiento',
            'id_detalle',
        );
    }

    public function rules() {
        return array(
            array('id_establecimiento, id_detalle', 'required'),
            array('id_establecimiento, id_detalle', 'numerical', 'integerOnly'=>true),
            array('id_establecimiento, id_detalle', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id_establecimiento' => Yii::t('app', 'Id Establecimiento'),
                'id_detalle' => Yii::t('app', 'Id Detalle'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id_establecimiento', $this->id_establecimiento);
        $criteria->compare('id_detalle', $this->id_detalle);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}