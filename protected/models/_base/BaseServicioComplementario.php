<?php

/**
 * This is the model base class for the table "detalle_planilla".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "DetallePlanilla".
 *
 * Columns in table "detalle_planilla" available as properties of the model,
 * followed by relations of table "detalle_planilla" available as properties of the model.
 *
 * @property integer $id_detalle_planilla
 * @property integer $id_sala_ciclo_anio
 * @property integer $id_nivel
 * @property integer $id_seccion
 * @property integer $id_orientacion
 * @property integer $id_caracter_actividad
 * @property integer $alu_mat_tot
 * @property integer $alu_mat_var
 * @property integer $alu_mat_muj
 * @property integer $alu_rep_tot
 * @property integer $alu_rep_var
 * @property integer $alu_rep_muj
 * @property integer $nec_esp_edu
 * @property integer $alu_ser_tot
 * @property integer $alu_ser_var
 * @property integer $alu_ser_muj
 * @property integer $alu_obl_tot
 * @property integer $alu_obl_var
 * @property integer $alu_obl_muj
 * @property integer $alu_opt_tot
 * @property integer $alu_opt_var
 * @property integer $alu_opt_muj
 * @property integer $id_turno
 * @property integer $id_planilla
 * @property string $nombre_taller
 * @property integer $id_actividad_taller
 * @property string $nombre_seccion
 * @property integer $asistencia_medica
 * @property integer $id_localizacion
 * @property integer $alu_tot_ind
 * @property integer $alu_tot_mul
 * @property integer $tot_ind_alf
 * @property integer $tot_ind_pri
 * @property integer $tot_ind_sec
 * @property integer $tot_mul_alf
 * @property integer $tot_mul_pri
 * @property integer $tot_mul_sec
 * @property string $created_at
 * @property string $last_login
 * @property string $ingresador
 * @property integer $alu_tot_sec
 * @property integer $alu_tot_pri
 * @property integer $alu_tot_alf
 * @property integer $alu_mul_ind
 * @property integer $tot_alu_act
 * @property integer $tot_act_var
 * @property integer $tot_act_muj
 *
 * @property Seccion $idSeccion
 * @property Planilla $idPlanilla
 * @property Localizacion $idLocalizacion
 * @property SalaCicloAnio $idSalaCicloAnio
 * @property NivelServicio $idNivel
 * @property Orientacion $idOrientacion
 * @property Turno $idTurno
 * @property CaracterActividad $idCaracterActividad
 */
abstract class BaseServicioComplementario extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'detalle_planilla';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'DetallePlanilla|DetallePlanillas', $n);
	}

	public static function representingColumn() {
		return 'id_detalle_planilla';
	}

	public function rules() {
		return array(
			array('id_sala_ciclo_anio, id_nivel, id_seccion, id_orientacion, id_caracter_actividad, alu_mat_tot, alu_mat_var, alu_mat_muj, alu_rep_tot, alu_rep_var, alu_rep_muj, nec_esp_edu, alu_ser_tot, alu_ser_var, alu_ser_muj, alu_obl_tot, alu_obl_var, alu_obl_muj, alu_opt_tot, alu_opt_var, alu_opt_muj, id_turno, id_planilla, id_actividad_taller, asistencia_medica, id_localizacion, alu_tot_ind, alu_tot_mul, tot_ind_alf, tot_ind_pri, tot_ind_sec, tot_mul_alf, tot_mul_pri, tot_mul_sec, alu_tot_sec, alu_tot_pri, alu_tot_alf, alu_mul_ind, tot_alu_act, tot_act_var, tot_act_muj', 'numerical', 'integerOnly'=>true),
			array('nombre_taller', 'length', 'max'=>100),
			array('nombre_seccion', 'length', 'max'=>30),
			array('ingresador', 'length', 'max'=>40),
			array('created_at, last_login', 'safe'),
			array('id_sala_ciclo_anio, id_nivel, id_seccion, id_orientacion, id_caracter_actividad, alu_mat_tot, alu_mat_var, alu_mat_muj, alu_rep_tot, alu_rep_var, alu_rep_muj, nec_esp_edu, alu_ser_tot, alu_ser_var, alu_ser_muj, alu_obl_tot, alu_obl_var, alu_obl_muj, alu_opt_tot, alu_opt_var, alu_opt_muj, id_turno, id_planilla, nombre_taller, id_actividad_taller, nombre_seccion, asistencia_medica, id_localizacion, alu_tot_ind, alu_tot_mul, tot_ind_alf, tot_ind_pri, tot_ind_sec, tot_mul_alf, tot_mul_pri, tot_mul_sec, created_at, last_login, ingresador, alu_tot_sec, alu_tot_pri, alu_tot_alf, alu_mul_ind,  tot_alu_act, tot_act_var, tot_act_muj', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id_detalle_planilla, id_sala_ciclo_anio, id_nivel, id_seccion, id_orientacion, id_caracter_actividad, alu_mat_tot, alu_mat_var, alu_mat_muj, alu_rep_tot, alu_rep_var, alu_rep_muj, nec_esp_edu, alu_ser_tot, alu_ser_var, alu_ser_muj, alu_obl_tot, alu_obl_var, alu_obl_muj, alu_opt_tot, alu_opt_var, alu_opt_muj, id_turno, id_planilla, nombre_taller, id_actividad_taller, nombre_seccion, asistencia_medica, id_localizacion, alu_tot_ind, alu_tot_mul, tot_ind_alf, tot_ind_pri, tot_ind_sec, tot_mul_alf, tot_mul_pri, tot_mul_sec, created_at, last_login, ingresador, alu_tot_sec, alu_tot_pri, alu_tot_alf, alu_mul_ind, tot_alu_act, tot_act_var, tot_act_muj', 'safe', 'on'=>'search'),
			array('nombre_taller, id_caracter_actividad, id_turno, alu_mat_tot, alu_mat_var', 'required'),
		);
	}

	public function relations() {
		return array(
			'idSeccion' => array(self::BELONGS_TO, 'Seccion', 'id_seccion'),
			'idPlanilla' => array(self::BELONGS_TO, 'Planilla', 'id_planilla'),
			'idLocalizacion' => array(self::BELONGS_TO, 'Localizacion', 'id_localizacion'),
			'idSalaCicloAnio' => array(self::BELONGS_TO, 'SalaCicloAnio', 'id_sala_ciclo_anio'),
			'idNivel' => array(self::BELONGS_TO, 'NivelServicio', 'id_nivel'),
			'idOrientacion' => array(self::BELONGS_TO, 'Orientacion', 'id_orientacion'),
			'idTurno' => array(self::BELONGS_TO, 'Turno', 'id_turno'),
			'idCaracterActividad' => array(self::BELONGS_TO, 'CaracterActividad', 'id_caracter_actividad'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id_detalle_planilla' => Yii::t('app', 'Id Detalle Planilla'),
			'id_sala_ciclo_anio' => null,
			'id_nivel' =>  'Nivel',
			'id_seccion' => null,
			'id_orientacion' => null,
			'id_caracter_actividad' => null,
			'alu_mat_tot' => Yii::t('app', 'Alu Mat Tot'),
			'alu_mat_var' => Yii::t('app', 'Alu Mat Var'),
			'alu_mat_muj' => Yii::t('app', 'Alu Mat Muj'),
			'alu_rep_tot' => Yii::t('app', 'Alu Rep Tot'),
			'alu_rep_var' => Yii::t('app', 'Alu Rep Var'),
			'alu_rep_muj' => Yii::t('app', 'Alu Rep Muj'),
			'nec_esp_edu' => Yii::t('app', 'Nec Esp Edu'),
			'alu_ser_tot' => Yii::t('app', 'Alu Ser Tot'),
			'alu_ser_var' => Yii::t('app', 'Alu Ser Var'),
			'alu_ser_muj' => Yii::t('app', 'Alu Ser Muj'),
			'alu_obl_tot' => Yii::t('app', 'Alu Obl Tot'),
			'alu_obl_var' => Yii::t('app', 'Alu Obl Var'),
			'alu_obl_muj' => Yii::t('app', 'Alu Obl Muj'),
			'alu_opt_tot' => Yii::t('app', 'Alu Opt Tot'),
			'alu_opt_var' => Yii::t('app', 'Alu Opt Var'),
			'alu_opt_muj' => Yii::t('app', 'Alu Opt Muj'),
			'id_turno' => null,
			'id_planilla' => null,
			'nombre_taller' => Yii::t('app', 'Nombre Taller'),
			'id_actividad_taller' => Yii::t('app', 'Id Actividad Taller'),
			'nombre_seccion' => Yii::t('app', 'Nombre Seccion'),
			'asistencia_medica' => Yii::t('app', 'Asistencia Medica'),
			'id_localizacion' => null,
			'alu_tot_ind' => Yii::t('app', 'Alu Tot Ind'),
			'alu_tot_mul' => Yii::t('app', 'Alu Tot Mul'),
			'tot_ind_alf' => Yii::t('app', 'Tot Ind Alf'),
			'tot_ind_pri' => Yii::t('app', 'Tot Ind Pri'),
			'tot_ind_sec' => Yii::t('app', 'Tot Ind Sec'),
			'tot_mul_alf' => Yii::t('app', 'Tot Mul Alf'),
			'tot_mul_pri' => Yii::t('app', 'Tot Mul Pri'),
			'tot_mul_sec' => Yii::t('app', 'Tot Mul Sec'),
			'created_at' => Yii::t('app', 'Created At'),
			'last_login' => Yii::t('app', 'Last Login'),
			'ingresador' => Yii::t('app', 'Ingresador'),
			'alu_tot_sec' => Yii::t('app', 'Alu Tot Sec'),
			'alu_tot_pri' => Yii::t('app', 'Alu Tot Pri'),
			'alu_tot_alf' => Yii::t('app', 'Alu Tot Alf'),
			'alu_mul_ind' => Yii::t('app', 'Alu Mul Ind'),
			'tot_alu_act' => Yii::t('app', 'Tot Alu Act'),
			'tot_act_var' => Yii::t('app', 'Tot Act Var'),
			'tot_act_muj' => Yii::t('app', 'Tot Act Muj'),
			'idSeccion' => null,
			'idPlanilla' => null,
			'idLocalizacion' => null,
			'idSalaCicloAnio' => null,
			'idNivel' => null,
			'idOrientacion' => null,
			'idTurno' => null,
			'idCaracterActividad' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id_detalle_planilla', $this->id_detalle_planilla);
		$criteria->compare('id_sala_ciclo_anio', $this->id_sala_ciclo_anio);
		$criteria->compare('id_nivel', $this->id_nivel);
		$criteria->compare('id_seccion', $this->id_seccion);
		$criteria->compare('id_orientacion', $this->id_orientacion);
		$criteria->compare('id_caracter_actividad', $this->id_caracter_actividad);
		$criteria->compare('alu_mat_tot', $this->alu_mat_tot);
		$criteria->compare('alu_mat_var', $this->alu_mat_var);
		$criteria->compare('alu_mat_muj', $this->alu_mat_muj);
		$criteria->compare('alu_rep_tot', $this->alu_rep_tot);
		$criteria->compare('alu_rep_var', $this->alu_rep_var);
		$criteria->compare('alu_rep_muj', $this->alu_rep_muj);
		$criteria->compare('nec_esp_edu', $this->nec_esp_edu);
		$criteria->compare('alu_ser_tot', $this->alu_ser_tot);
		$criteria->compare('alu_ser_var', $this->alu_ser_var);
		$criteria->compare('alu_ser_muj', $this->alu_ser_muj);
		$criteria->compare('alu_obl_tot', $this->alu_obl_tot);
		$criteria->compare('alu_obl_var', $this->alu_obl_var);
		$criteria->compare('alu_obl_muj', $this->alu_obl_muj);
		$criteria->compare('alu_opt_tot', $this->alu_opt_tot);
		$criteria->compare('alu_opt_var', $this->alu_opt_var);
		$criteria->compare('alu_opt_muj', $this->alu_opt_muj);
		$criteria->compare('id_turno', $this->id_turno);
		$criteria->compare('id_planilla', $this->id_planilla);
		$criteria->compare('nombre_taller', $this->nombre_taller, true);
		$criteria->compare('id_actividad_taller', $this->id_actividad_taller);
		$criteria->compare('nombre_seccion', $this->nombre_seccion, true);
		$criteria->compare('asistencia_medica', $this->asistencia_medica);
		$criteria->compare('id_localizacion', $this->id_localizacion);
		$criteria->compare('alu_tot_ind', $this->alu_tot_ind);
		$criteria->compare('alu_tot_mul', $this->alu_tot_mul);
		$criteria->compare('tot_ind_alf', $this->tot_ind_alf);
		$criteria->compare('tot_ind_pri', $this->tot_ind_pri);
		$criteria->compare('tot_ind_sec', $this->tot_ind_sec);
		$criteria->compare('tot_mul_alf', $this->tot_mul_alf);
		$criteria->compare('tot_mul_pri', $this->tot_mul_pri);
		$criteria->compare('tot_mul_sec', $this->tot_mul_sec);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('last_login', $this->last_login, true);
		$criteria->compare('ingresador', $this->ingresador, true);
		$criteria->compare('alu_tot_sec', $this->alu_tot_sec);
		$criteria->compare('alu_tot_pri', $this->alu_tot_pri);
		$criteria->compare('alu_tot_alf', $this->alu_tot_alf);
		$criteria->compare('alu_mul_ind', $this->alu_mul_ind);
		$criteria->compare('tot_alu_act', $this->tot_alu_act);
		$criteria->compare('tot_act_var', $this->tot_act_var);
		$criteria->compare('tot_act_muj', $this->tot_act_muj);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	
	public function getGridDataProvider($id) {

		$this->calcularMujeres($id);
		
		$criteria = new CDbCriteria;
	
		$criteria->compare('id_planilla', $id);
	
		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
				'sort'=>array(
						'attributes'=>array(
							'id_localizacion',array(
                  			  'asc' => 'id_localizacion ASC, id_nivel ASC',
              			      'desc' => 'id_localizacion DESC, id_nivel ASC',
                          ) 
						),
						'defaultOrder' => 'id_localizacion,id_nivel',
				),
				'pagination' => array(
						'pagesize' => 30,
				),
		));
		
	}
	
	public function calcularMujeres($id)
	{
		
		$items=ServicioComplementario::model()->findAll(array('condition'=>'id_planilla=:x', 'params'=>array(':x'=>$id)));
			
			foreach($items as $i=>$item)
			{
				$item->alu_mat_muj= $item->alu_mat_tot - $item->alu_mat_var;
				$item->save() ;
			}
	}
	
}