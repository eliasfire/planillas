<?php

Yii::import('application.models._base.BasePlanillaDetalle');

class PlanillaDetalle extends BasePlanillaDetalle
{
    /**
     * @return PlanillaDetalle
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'PlanillaDetalle|PlanillaDetalles', $n);
    }

}