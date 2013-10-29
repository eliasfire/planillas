<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
Yii::setPathOfAlias('editable', dirname(__FILE__).'/../extensions/x-editable');
Yii::setPathOfAlias('ptl',dirname(__FILE__).'/../portlets');


// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'language'=>'es',// Este es el lenguaje en el que quieres que muestre las cosas
	'sourceLanguage'=>'en',// Este es el lenguaje por defecto de los archivos
	'name'=>'Sistema para Carga de Planillas',
	'theme'=>'bootstrap',
		
		
	// preloading 'log' component
	'preload'=>array(
			//'log',
			'bootstrap',
			),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.rights.*',
   		'application.modules.rights.components.*',
		'ext.giix-components.*',
		'editable.*', //easy include of editable classes
		'ext.EDataTables.*',
		'ext.components.database.*',
		'ext.widgets.portlet.XPortlet',
		'ext.helpers.XHtml',
		'ext.modules.help.models.*',
		'ext.modules.lookup.models.*',
		'ext.AweCrud.components.*', // AweCrud components
		'ext.gtc.components.*', // Gii Template Collection
		'ext.multimodelform.MultiModelForm',
	),

	'modules'=>array(
		//modulo de admin de usuarios rights
		'rights'=>array(
      		'install'=>false,// Enables the installer.
      		'debug'=>false,
      		
		),
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array(
					'ext.gtc',
					'ext.giix-core', // giix generators
					'bootstrap.gii',
				//	'ext.AweCrud.generators', // AweCrud generators
					'ext.gtc',   // extensions/Gii Template Collection
			),
			'params' => array(
					'gtc.fullCrud.providers' => array(
							'p2.gii.fullCrud.providers.P2FieldProvider',
					)
			)
		),
		'lookup'=>array(
				'class'=>'ext.modules.lookup.LookupModule',
				'lookupLayout'=>'application.views.layouts.leftbar',
				'lookupTable'=>'tbl_lookup',
				'safeTypes'=>array('eyecolor'),
				'leftPortlets'=>array(
						'ptl.ModuleMenu'=>array()
				)
		),
		'help'=>array(
				'class'=>'ext.modules.help.HelpModule',
				'helpLayout'=>'application.views.layouts.leftbar',
				'helpTable'=>'tbl_help',
				'leftPortlets'=>array(
						'ptl.ModuleMenu'=>array()
				),
				'editorCSS'=>'editor.css',
				'editorUploadRoute'=>'/request/uploadFile',
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'class'=>'RWebUser',
			'allowAutoLogin'=>false,
		),
			
		
	 'authManager'=>array(
			'class'=>'RDbAuthManager',
		  	'connectionID'=>'db',
			// The itemTable name (default: AuthItem)
			'itemTable' => 'authitem',
			// The assignmentTable name (default: AuthAssignment)
			'assignmentTable' => 'authassignment',
			// The itemChildTable name (default: AuthItemChild)
			'itemChildTable' => 'authitemchild',
			// The itemWeightTable (default: AuthItemWeight)
			//'itemWeightTable' => 'authitemweight',
		  	),
		
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'pgsql:host=localhost;port=5432;dbname=planillas',
			'emulatePrepare' => true,
			'username' => 'postgres',
			'password' => 'arturito',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),
		'bootstrap' => array(
				'class' => 'ext.bootstrap.components.Bootstrap',
				'responsiveCss' => true,
		),
		//X-editable config
		'editable' => array(
				'class'     => 'editable.EditableConfig',
				'form'      => 'bootstrap',        //form style: 'bootstrap', 'jqueryui', 'plain'
				'mode'      => 'popup',            //mode: 'popup' or 'inline'
				'defaults'  => array(              //default settings for all editable elements
						'emptytext' => 'Click to edit'
				)
		),
		'clientScript' => array(
				'scriptMap' => array(
						'jquery-ui.css'=> dirname($_SERVER['SCRIPT_NAME']).'/css/jui/custom/jquery-ui.css',
				),
		),
		'widgetFactory'=>array(
				'enableSkin'=>true,
		),
		/*'urlManager'=>array(
				'class' => 'ext.components.language.XUrlManager',
				'urlFormat'=>'path',
				'showScriptName'=>false,
				'appendParams'=>false,
				'rules'=>array(
						'<language:\w{2}>' => 'site/index',
						'<language:\w{2}>/<_c:\w+>' => '<_c>',
						'<language:\w{2}>/<_c:\w+>/<_a:\w+>'=>'<_c>/<_a>',
						'<language:\w{2}>/<_m:\w+>' => '<_m>',
						'<language:\w{2}>/<_m:\w+>/<_c:\w+>' => '<_m>/<_c>',
						'<language:\w{2}>/<_m:\w+>/<_c:\w+>/<_a:\w+>' => '<_m>/<_c>/<_a>',
				),
		),*/
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);