<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="es" />

<!-- blueprint CSS framework -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"	media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tablas.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"	media="print" />
<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sesion.css" />


<?php 
	$jqueryslidemenupath = Yii::app()->assetManager->publish(Yii::app()->basePath.'/scripts/jqueryslidemenu/');
 	//Register jQuery, JS and CSS files
 	$jqueryrutpath = Yii::app()->assetManager->publish(Yii::app()->basePath.'/scripts/rut/');
 	$rotatorpath = Yii::app()->assetManager->publish(Yii::app()->basePath.'/scripts/rotator/');
 	
 	Yii::app()->clientScript->registerScriptFile($jqueryrutpath.'/jquery.Rut.js');
	Yii::app()->clientScript->registerCssFile($jqueryslidemenupath.'/jqueryslidemenu.css');
 	Yii::app()->clientScript->registerCoreScript('jquery');
 	Yii::app()->clientScript->registerScriptFile($jqueryslidemenupath.'/jqueryslidemenu.js');
 	Yii::app()->clientScript->registerScriptFile($rotatorpath.'/rotator.js');
 	Yii::app()->clientScript->registerCssFile($rotatorpath.'/rotator.css');
 	
 ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	
	<div class="container" id="page">
<?php
/* avatar de Usuario
		if(!Yii::app()->user->isGuest){
		echo '<div class="avatar">';
			$usuario = User::model()->findByPK(Yii::app()->user->id);
			if(!$usuario->foto_src==null){
				echo Chtml::image(Yii::app()->baseUrl.$usuario->foto_src,'Imagen Usuario');
			}
			else{
				$carpeta=Yii::app()->baseUrl.'/images/user/';
				echo CHtml::image($carpeta.'no-profile.png','sin imagen de perfil');
			}
			echo '</div>';
		}
		*/
	?>

		<div id="header">
			<div id="logo">
			 <?php echo Chtml::image(Yii::app()->baseUrl.'/images/head.png','Logo Head'); ?>
			</div>
		</div>
		
		
		<!-- header -->

		<div id="myslidemenu" class="jqueryslidemenu">
			
			
		<?php /*$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
		array('label'=>'Inicio', 'url'=>array('/site/index')),
		array('label'=>'Usuarios','visible'=> Yii::app()->user->checkAccess('User.Create'), 'url'=>array(''),
				'items'=>array(
					array('label'=>'Administradores','visible'=>Yii::app()->user->checkAccess('User.*'),'url'=>array('/user/listarAdmin'),
							'items'=>array(
								array('label'=>'Listar/Buscar','visible'=> Yii::app()->user->checkAccess('User.*'), 'url'=>array('/user/listarAdmin')),
								array('label'=>'Crear','visible'=> Yii::app()->user->checkAccess('User.*'), 'url'=>array('/user/crearAdministrador')),
							),
						),
					array('label'=>'Administrativos','url'=>array('/user/listarAdminis'),
							'items'=>array(
								array('label'=>'Listar/Buscar','visible'=> Yii::app()->user->checkAccess('Administrativos'), 'url'=>array('/user/listarAdminis')),
								array('label'=>'Crear','visible'=> Yii::app()->user->checkAccess('Administrativos'), 'url'=>array('/user/crearAdministrativo')),
							),
						),
					array('label'=>'Profesores','url'=>array('/user/listarProfes'),
							'items'=>array(
								array('label'=>'Listar/Buscar','visible'=> Yii::app()->user->checkAccess('Administrativos'), 'url'=>array('/user/listarProfes')),
								array('label'=>'Crear','visible'=> Yii::app()->user->checkAccess('Administrativos'), 'url'=>array('/user/crearProfesor')),
							),
						),
					array('label'=>'Administrar','visible'=> Yii::app()->user->checkAccess('rights'), 'url'=>array('/user/admin')),
					array('label'=>'Cuentas Desactivadas','visible'=> Yii::app()->user->checkAccess('User.ListarCuentasDesactivadas'), 'url'=>array('/user/listarCuentasDesactivadas')),
				),
		),
		array('label'=>'Tareas Administrativas','visible'=> Yii::app()->user->checkAccess('Administrativos'), 'url'=>array(''),
				'items'=>array(
						array('label'=>'Periodo Escolar','url'=>array('/periodoEscolar/admin'),
							'items'=>array(
									array('label'=>'Estados','url'=>array('/estado/admin'),
										'items'=>array(
												array('label'=>'Listar/Buscar', 'url'=>array('/estado/admin')),
												array('label'=>'Crear', 'url'=>array('/estado/create')),
												)
									),
									array('label'=>'Listar/Buscar', 'url'=>array('/periodoEscolar/admin')),
									array('label'=>'Crear', 'url'=>array('/periodoEscolar/create')),
								)
							),
						array('label'=>'Cursos','url'=>array('/administrarCursos/admin'),
							'items'=>array(
									array('label'=>'Listar/Buscar', 'url'=>array('/administrarCursos/admin')),
									array('label'=>'Crear', 'url'=>array('/administrarCursos/create')),
								)
							),
		array('label'=>'Alumnos','url'=>array('/alumno/admin'),
						'items'=>array(
								array('label'=>'Listar/Buscar', 'url'=>array('/alumno/admin')),
								array('label'=>'Matricular', 'url'=>array('/alumno/matricular')),
								array('label'=>'Inasistencias','url'=>array('/inasistencias/admin'),
									'items'=>array(
										array('label'=>'Listar/Buscar', 'url'=>array('/inasistencias/admin')),
										array('label'=>'Ingresar', 'url'=>array('/inasistencias/create')),
										)
									),
								)
			),
		array('label'=>'Asignaturas','url'=>array('/asignatura/admin'),
						'items'=>array(
								array('label'=>'Listar/Buscar', 'url'=>array('/asignatura/admin')),
								array('label'=>'Crear', 'url'=>array('/asignatura/create')),
							)
			),
		array('label'=>'Clases','url'=>array('/clases/admin'),
						'items'=>array(
								array('label'=>'Listar/Buscar', 'url'=>array('/clases/admin')),
								array('label'=>'Asignar', 'url'=>array('/clases/create')),
							)
			),
		
		array('label'=>'Certificados y Reportes','url'=>array('/alumno/certificados'),
						'items'=>array(
		array('label'=>'Certificados Alumno', 'url'=>array('/alumno/certificados')),
		array('label'=>'Reportes Cursos', 'url'=>array('/administrarCursos/admin')),
		)
			
		),
		),
		),
		array('label'=>'Cambiar Permisos','visible'=> Yii::app()->user->checkAccess('rights'), 'url'=>array('/rights')),
		array('label'=>'Menú Profesor','visible'=>Yii::app()->user->checkAccess('Profesor'),'url'=>array(''),
			'items'=>array(
				array('label'=>'Mis Clases','url'=>array('Clases/MisClases')),
				array('label'=>'Crear Evaluación','url'=>array('Evaluacion/Create'))
			)
		),
		array('label'=>'Menú Alumno','url'=>array(''),'visible'=>Yii::app()->user->checkAccess('Alumno'),
			'items'=>array(
				array('label'=>'Mis Notas','url'=>array('Alumno/MisNotas')),
				array('label'=>'Mis Inasistencias', 'url'=>array('Alumno/MisInasistencias')),
				array('label'=>'Calendario de Evaluaciones', 'url'=>array('Alumno/MiCalendarioEvaluacion')),
			)		
		),
		array('label'=>'Iniciar Sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
		array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
		),
		)); */?>
		</div>
		<!-- mainmenu -->
		
	<?php	$this->widget('bootstrap.widgets.TbNavbar', array(
	'type'=>null, // null or 'inverse'
	'brand'=>'Direccion de Estadistica',
	'brandUrl'=>'#',
	'collapse'=>true, // requires bootstrap-responsive.css
	'items'=>array(
		array(
			'class'=>'bootstrap.widgets.TbMenu',
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index'), 'active'=>true),
				/*array('label'=>'Educacion Adultos','visible'=> Yii::app()->user->checkAccess('User.Create'), 'url'=>array(''),
						'items'=>array(
								array('label'=>'Cargar planilla', 'url'=>array('/adulto/create')),
								array('label'=>'Ver planillas cargadas', 'url'=>'#'),
								array('label'=>'Consultar planilla', 'url'=>'#'),
					)),*/
				array('label'=>'Menú Ingresador','url'=>array(''),'visible'=>Yii::app()->user->checkAccess('Ingresador'),
						'items'=>array(
								array('label'=>'Ver planillas cargadas', 'url'=>array('/ingresador/admin')),
								array('label'=>'Cargar planillas', 'url'=>array('/ingresador/selectlocalizacion')),
								array('label'=>'Cargar datos de establecimiento', 'url'=>array('/ingresador/datosest')),
					)),
				array('label'=>'Menú Administrador','url'=>array(''),'visible'=>Yii::app()->user->checkAccess('Administrador'),
						'items'=>array(
								array('label'=>'Ver planillas cargadas por localizacion', 'url'=>array('/administrador/adminloc')),
								array('label'=>'Ver planillas cargadas por establecimiento', 'url'=>array('/administrador/adminest')),
								array('label'=>'Cargar planilla', 'url'=>array('/administrador/selectplanilla')),
					)),
				/*array('label'=>'Educacion Integral','visible'=> Yii::app()->user->checkAccess('User.Create'), 'url'=>array(''),
						'items'=>array(
								array('label'=>'Cargar planilla', 'url'=>'#'),
								array('label'=>'Ver planillas cargadas', 'url'=>'#'),
								array('label'=>'Consultar planilla', 'url'=>'#'),
						)),
				array('label'=>'Educacion Especial','visible'=> Yii::app()->user->checkAccess('User.Create'), 'url'=>array(''),
						'items'=>array(
								array('label'=>'Cargar planilla', 'url'=>'#'),
								array('label'=>'Ver planillas cargadas', 'url'=>'#'),
								array('label'=>'Consultar planilla', 'url'=>'#'),
						)),
				array('label'=>'Inicial Primario Secundario','visible'=> Yii::app()->user->checkAccess('User.Create'), 'url'=>array(''),
						'items'=>array(
								array('label'=>'Cargar planilla', 'url'=>'#'),
								array('label'=>'Ver planillas cargadas', 'url'=>'#'),
								array('label'=>'Consultar planilla', 'url'=>'#'),
						)),*/
				array('label'=>'Configuracion','visible'=> Yii::app()->user->checkAccess('Administrador'), 'url'=>array(''),
						'items'=>array(
								array('label'=>'Salas', 'url'=>array('/salaCicloAnio/admin')),
								array('label'=>'Turnos', 'url'=>array('/turno/admin')),
								array('label'=>'Secciones', 'url'=>array('/seccion/admin')),
								array('label'=>'Caracter Actividad', 'url'=>array('/caracterActividad/admin')),
								array('label'=>'Ciclo Año', 'url'=>array('/cicloAnio/admin')),
								array('label'=>'Nivel Sercivio', 'url'=>array('/nivelServicio/admin')),
								array('label'=>'Servicios Complementarios', 'url'=>array('/servicioComplementario/admin')),								
								'---',
								array('label'=>'Orientaciones', 'url'=>array('/orientacion/admin')),
								array('label'=>'Tipo Orientacion', 'url'=>array('/tipoOrientacion/admin')),
								'---',
								array('label'=>'Establecimientos', 'url'=>array('/establecimiento/admin')),
								array('label'=>'Localizaciones', 'url'=>array('/localizacion/admin')),
								array('label'=>'Usuario/Estable/Planilla', 'url'=>array('/usuEstPla/admin')),
						)),
					array('label'=>'Configuracion Planillas','visible'=> Yii::app()->user->checkAccess('rights'), 'url'=>array(''),
						'items'=>array(
								array('label'=>'Planillas', 'url'=>array('/planilla/admin')),
								array('label'=>'Tipos Planilla', 'url'=>array('/tipoplanilla/admin')),
								array('label'=>'Localizacion Planilla', 'url'=>array('/localizacionplanilla/admin')),
								array('label'=>'Detalle Planilla', 'url'=>array('/detalleplanilla/admin')),
							)),
				   array('label'=>'Permisos','visible'=> Yii::app()->user->checkAccess('rights'), 'url'=>array('/rights'),
				   		'items'=>array(
				   				array('label'=>'Usuarios', 'url'=>array('/user/admin')),
				   				array('label'=>'Cambiar Permisos', 'url'=>array('/rights')),
				   		)),
			),
		),
		'<form class="navbar-search pull-left" action=""></form>',
		array(
			'class'=>'bootstrap.widgets.TbMenu',
			'htmlOptions'=>array('class'=>'pull-right'),
			'items'=>array(
				array('label'=>'Iniciar Sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Salir ('.Yii::app()->user->id.'.'.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		),
	),
));
	?>


	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Desarrollado por Abraham Jurado.<br/>
		Todos los derechos reservados.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div>
	<!-- page -->

</body>
</html>
