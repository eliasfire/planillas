<?php
// example code for the view "_relational" that returns the HTML content
echo CHtml::tag('h3',array(),'Filas de la planilla nro : "'.$id.'"');
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
		'type'=>'striped bordered',
		'dataProvider' => $gridDataProvider,
		'template' => "{items}",
		'columns' => $gridColumns,
));
?>