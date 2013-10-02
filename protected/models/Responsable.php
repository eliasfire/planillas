<?php

Yii::import('application.models._base.BaseResponsable');

class Responsable extends BaseResponsable
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}