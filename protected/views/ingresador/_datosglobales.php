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
		$this->widget(
			'bootstrap.widgets.TbLabel',
			array(
					'type' => 'warning',
					'label' => 'Localizacion: '. Yii::app()->getSession()->get('nombre_localizacion'),
			)
	);
		$this->widget(
				'bootstrap.widgets.TbLabel',
				array(
						'type' => 'warning',
						'label' => 'Anexo: '. Yii::app()->getSession()->get('anexo'),
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
 <h3 style="margin-top: 25px;"></h3>