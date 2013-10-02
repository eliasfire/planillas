<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SelectLocalizacion extends CFormModel
{
	public $id_localizacion;


	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
		
			// phone_no and message are required
			array('id_localizacion', 'required','message'=>''),
		
		
		);
	}

	/**
	 * Declares attribute labels.
	 */

}
