<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-23">
		<div id="content">
	<?php $flashMessages = Yii::app()->user->getFlashes();
if ($flashMessages) {
	echo '<ul class="flashes">';
	foreach($flashMessages as $key => $message) {
		echo '<li><div class="flash-' . $key . '">' . $message . "</div></li>\n";
	}
	echo '</ul>';
}
?>	<?php echo $content; ?>
		</div>
		<!-- content -->
	</div>
	<div class="span-5 last">
		<div id="sidebar">
			
			
		<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Acciones',
		));
		$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		?>
		</div>
		<!-- sidebar -->
	</div>
</div>

<?php $this->endContent(); ?>