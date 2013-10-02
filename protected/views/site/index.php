<style type="text/css">
#contenedor {
	overflow: hidden;
}

#izquierda {
	float: left;
	color: #fff;
}

#derecha {
	float: right;
	color: #fff;
}
</style>

<div id="contenedor">
	<div id="izquierda">
		<?php if (!Yii::app()->user->isGuest) {

			$this->widget(
				'bootstrap.widgets.TbLabel',
				array(
						'type' => 'success',
						'label' => 'Establecimiento: '. Yii::app()->getSession()->get('nombre_establecimiento'),
				)
		);
	}?>

	</div>
	<div id="derecha">
		<?php 		
		if(!Yii::app()->user->isGuest and isset(Yii::app()->user->last_login)){
			$this->widget(
				'bootstrap.widgets.TbLabel',
				array(
						'type' => 'important',
						'label' => 'Mes vigente: ' . Yii::app()->getSession()->get('mesvigente') . '  ',
				)
		);
		}
		if(!Yii::app()->user->isGuest and isset(Yii::app()->user->last_login)){
		$this->widget(
				'bootstrap.widgets.TbLabel',
				array(
						'type' => 'inverse',
						'label' => 'Año vigente: ' . Yii::app()->getSession()->get('aniovigente'),
				)
		);
		}?>

	</div>
</div>

<div class="block-error">
		<?php	
		$this->widget('bootstrap.widgets.TbAlert', array(
		    'block'=>true, // display a larger alert block?
		    'fade'=>true, // use transitions?
		    'closeText'=>'×', // close link text - if set to false, no close link is displayed
		    'alerts'=>array( // configurations per alert type
			    'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
		    	'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'),
		    ),
));?>
	</div>
	
<!-- <div id="page-wrap">
		<h1>Bienvenido al sistema de carga de planillas</h1>
		<p>En este sitio usted podrá cargar planillas de educacion.</p>
</div> -->
<?php $this->beginWidget(
    'bootstrap.widgets.TbHeroUnit',
    array(
        'heading' => 'Bienvenido al  '.CHtml::encode(Yii::app()->name),
    )
); ?>
   <?php /* if (!Yii::app()->user->isGuest) {
   
   	$this->widget(
    'bootstrap.widgets.TbLabel',
    array(
        'type' => 'success',
        // 'success', 'warning', 'important', 'info' or 'inverse'
        'label' => 'Establecimiento: '. $establecimiento->nombre,
   		 )
	);
	} */?>    
     <p>En este sitio podrá cargar 
    planillas del Ministerio de Educacion.

    </p>
 
    <p><?php 
    if (Yii::app()->user->isGuest) 
    $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'type' => 'primary',
                'size' => 'large',
                'label' => 'Iniciar Sesión',
				'url'=>array('/site/login'), 
          
        )); ?></p>
 
<?php $this->endWidget(); ?>

	<div style="text-align: right;">
		<?php 		
		if(!Yii::app()->user->isGuest and isset(Yii::app()->user->last_login)){
		$this->widget(
				'bootstrap.widgets.TbLabel',
				array(
					'type' => 'info',
					'label' => 'Ultimo Acceso: ' . Yii::app()->dateFormatter->format("d-M-y h:m a", Yii::app()->user->last_login),
				)
		);
		} ?>
	</div>


	<?php /*
		<div id="rotator">
		
			<div id="block-1" class="active">
				<h2>Valores y Principios</h2>
				<div>
					<h1>Valores y Principios</h1>
					<img src="/planillas/images/spacefrog.jpg" alt="space frog" width="200" height="180">
					<p>En el Colegio Ciudad Educativa se entregan valores y principios que son la base de nuestro objetivo de entregar educación integral, de calidad y que aporte al crecimiento y fortalecimiento de la familia.</p>
				</div>
			</div>
			
			<div id="block-2" class="non-active-top">
				<h2>Misión</h2>
				<div>
					<h1>Misión</h1>
					<img src="/planillas/images/goblins.jpg" alt="goblins" width="200" height="180">
					<p>Nuestra propuesta pedagógica se fundamenta en la escuela que aprende. Donde su principal preocupación es trabajar con los niños de escasos recursos y comprobar, en terreno, que todos tienen posibilidad de crecer y desarrollarse sin considerar su pobreza como un impedimento para lograr su mas alto desarrollo.</p>
				</div>			
			</div>
			
			<div id="block-3" class="non-active-bottom">
				<h2>Visión</h2>				
				<div>
					<h1>Visión</h1>
					<img src="/planillas/images/globins2.png" alt="goblins2" width="200" height="180">
					<p>Nuestra Visión es alcanzar cada hogar de la provincia, donde las ganas de aprender se junten con el esfuerzo y la dedicación y donde el educar sea tarea de padres, apoderados y del establecimiento educacional.</p>
				</div>			
			</div>
		    
		</div>
	
	</div>  ?>
	
	 <?php /* $this->widget('bootstrap.widgets.TbCarousel', array(
    'items'=>array(
        array('image'=>'/planillas/images/spacefrog.jpg', 'label'=>'Valores y Principios', 'caption'=>'En educacion se entregan valores y principios que son la base de nuestro objetivo de entregar educación integral, de calidad y que aporte al crecimiento y fortalecimiento de la familia.'),
        array('image'=>'/planillas/images/goblins.jpg', 'label'=>'Misión', 'caption'=>'Nuestra propuesta pedagógica se fundamenta en la escuela que aprende. Donde su principal preocupación es trabajar con los niños de escasos recursos y comprobar, en terreno, que todos tienen posibilidad de crecer y desarrollarse.'),
        array('image'=>'/planillas/images/globins2.png', 'label'=>'Visión', 'caption'=>'Nuestra Visión es alcanzar cada hogar de la provincia, donde las ganas de aprender se junten con el esfuerzo y la dedicación y donde el educar sea tarea de padres, apoderados y del establecimiento educacional.'),
    ),
)); */ ?> 