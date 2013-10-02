<?php
	Yii::app()->clientscript
		->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap.css' )
		->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap-responsive.css' )
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $this->pageTitle; ?></title>
<meta name="description" content="">
<meta name="author" content="">


<!-- blueprint CSS framework -->


<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Le styles -->
<style>
	body {
		padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	}

	@media (max-width: 980px) {
		body{
			padding-top: 0px;
		}
	}
</style>

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
<!--Uncomment when required-->
<!--<link rel="apple-touch-icon" href="images/apple-touch-icon.png">-->
<!--<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">-->
<!--<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">-->
</head>

<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#"><?php echo Yii::app()->name ?></a>
				<div class="nav-collapse">
					<?php /*$this->widget('zii.widgets.CMenu',array(
						'htmlOptions' => array( 'class' => 'nav' ),
						'activeCssClass'	=> 'active',
						'items'=>array(
							array('label'=>'Home', 'url'=>array('/site/index')),
							array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
							array('label'=>'Contact', 'url'=>array('/site/contact')),
							array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
						),
					)); */?>
					
					<?php	$this->widget('bootstrap.widgets.TbNavbar', array(
	'type'=>'inverse', // null or 'inverse'
	'brand'=>'Direccion de Estadistica',
	'brandUrl'=>'#',
	'collapse'=>true, // requires bootstrap-responsive.css
	'items'=>array(
		array(
			'class'=>'bootstrap.widgets.TbMenu',
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index'), 'active'=>true),

				array('label'=>'Menú Ingresador','url'=>array(''),'visible'=>Yii::app()->user->checkAccess('Ingresador'),
						'items'=>array(
								array('label'=>'Ver planillas cargadas', 'url'=>array('/ingresador/admin')),
								array('label'=>'Cargar planilla', 'url'=>array('/ingresador/selectlocalizacion')),
								array('label'=>'Cargar datos de establecimiento', 'url'=>array('/ingresador/datosest')),
					)),
				array('label'=>'Menú Administrador','url'=>array(''),'visible'=>Yii::app()->user->checkAccess('Administrador'),
						'items'=>array(
								array('label'=>'Ver planillas cargadas por localizacion', 'url'=>array('/administrador/adminloc')),
								array('label'=>'Ver planillas cargadas por establecimiento', 'url'=>array('/administrador/adminest')),
								array('label'=>'Cargar planilla', 'url'=>array('/administrador/selectplanilla')),
					)),
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
				array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		),
	),
));
	?>

					<?php /*if (!Yii::app()->user->isGuest) : ?>'.Yii::app()->user->id.'.
					<p class="navbar-text pull-right">Logged in as <a href="#">username</a></p>
					<?php endif; */?>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>

	<div class="container">
		<?php echo $content ?>
	</div> <!-- /container -->
	
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Desarrollado por Abraham Jurado.<br/>
		Todos los derechos reservados.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->
	
</body>
</html>
