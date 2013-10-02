<?php

/**
 * This is the model base class for the table "user".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "User".
 *
 * Columns in table "user" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $nombres
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $username
 * @property string $password
 * @property string $activo
 * @property string $email
 * @property string $creado
 * @property string $direccion
 * @property integer $telefono
 * @property string $salud
 * @property string $prevision
 * @property string $foto_src
 * @property string $run
 * @property string $last_login
 *
 */
abstract class BaseUser extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'user';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'User|Users', $n);
	}

	public static function representingColumn() {
		return 'creado';
	}

	public function rules() {
		return array(
			array('creado', 'required'),
			array('telefono', 'numerical', 'integerOnly'=>true),
			array('nombres, password, direccion', 'length', 'max'=>60),
			array('username, email, salud, prevision, foto_src, run', 'length', 'max'=>45),
			array('activo', 'length', 'max'=>3),
			array('apellido_paterno, apellido_materno, last_login', 'safe'),
			array('nombres, apellido_paterno, apellido_materno, username, password, activo, email, direccion, telefono, salud, prevision, foto_src, run, last_login', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, nombres, apellido_paterno, apellido_materno, username, password, activo, email, creado, direccion, telefono, salud, prevision, foto_src, run, last_login', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'nombres' => Yii::t('app', 'Nombres'),
			'apellido_paterno' => Yii::t('app', 'Apellido Paterno'),
			'apellido_materno' => Yii::t('app', 'Apellido Materno'),
			'username' => Yii::t('app', 'Username'),
			'password' => Yii::t('app', 'Password'),
			'activo' => Yii::t('app', 'Activo'),
			'email' => Yii::t('app', 'Email'),
			'creado' => Yii::t('app', 'Creado'),
			'direccion' => Yii::t('app', 'Direccion'),
			'telefono' => Yii::t('app', 'Telefono'),
			'salud' => Yii::t('app', 'Salud'),
			'prevision' => Yii::t('app', 'Prevision'),
			'foto_src' => Yii::t('app', 'Foto Src'),
			'run' => Yii::t('app', 'Run'),
			'last_login' => Yii::t('app', 'Ultimo Login'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('nombres', $this->nombres, true);
		$criteria->compare('apellido_paterno', $this->apellido_paterno, true);
		$criteria->compare('apellido_materno', $this->apellido_materno, true);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('activo', $this->activo, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('creado', $this->creado, true);
		$criteria->compare('direccion', $this->direccion, true);
		$criteria->compare('telefono', $this->telefono);
		$criteria->compare('salud', $this->salud, true);
		$criteria->compare('prevision', $this->prevision, true);
		$criteria->compare('foto_src', $this->foto_src, true);
		$criteria->compare('run', $this->run, true);
		$criteria->compare('last_login', $this->last_login, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	

	public function validatePassword($password)
	{
		return $this->hashPassword($password)===$this->password;
	}
	public function hashPassword($password)
	{
		return md5($password);
	}
	
	public function getNombreCompleto(){
		return $this->nombres.' '.$this->apellido_paterno.' '.$this->apellido_materno;
	}
	
	public function scopes(){
		return array(
				'activo'=>array(
						'condition'=>'activo=1',
				),
				'inactivo'=>array(
						'condition'=>'activo=0',
				),
	
		);
	}
}