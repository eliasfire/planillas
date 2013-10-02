<?php

Yii::import('application.models._base.BaseNoFormal');

class NoFormal extends BaseNoFormal
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}