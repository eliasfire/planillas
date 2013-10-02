<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SelectPlanilla extends CFormModel
{
	public $descripcion;


	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
		
			// phone_no and message are required
			array('descripcion', 'required','message'=>''),
		
		
		);
	}

	/**
	 * Declares attribute labels.
	 */

}
