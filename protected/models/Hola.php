<?php

Yii::import('application.models._base.BaseHola');

class Hola extends BaseHola
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}