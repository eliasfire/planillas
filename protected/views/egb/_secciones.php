	<?php $cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$cs->registerCoreScript('jquery.ui');
		$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/bootstrap/jquery-ui.css');
?>	

<script type="text/javascript">
   /* $(document).ready(function() {
        $("#addnew").click(function() {
          $('#example tbody>tr:last').clone(true).insertAfter('#example tbody>tr:last');
          return false;
        });
    });
    <input type="button" id="addnew" name="addnew" value="Add new item" /> */
</script>

 
	<script type="text/javascript">
		$('#alu_mat_muj').keyup(function(){
		  var total = parseInt($("#alu_mat_tot").val());
		  var mujeres = parseInt($("#alu_mat_muj").val());
		  var varones = parseInt($("#alu_mat_var").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot").css('background-color', '#7FFFD4');
		  }
		});
	</script>
		<script type="text/javascript">
		$('#alu_mat_muj1').keyup(function(){
		  var total = parseInt($("#alu_mat_tot1").val());
		  var mujeres = parseInt($("#alu_mat_muj1").val());
		  var varones = parseInt($("#alu_mat_var1").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot1").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot1").css('background-color', '#7FFFD4');
		  }
		});
	</script>
		<script type="text/javascript">
		$('#alu_mat_muj2').keyup(function(){
		  var total = parseInt($("#alu_mat_tot2").val());
		  var mujeres = parseInt($("#alu_mat_muj2").val());
		  var varones = parseInt($("#alu_mat_var2").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot2").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot2").css('background-color', '#7FFFD4');
		  }
		});
	</script>
		<script type="text/javascript">
		$('#alu_mat_muj3').keyup(function(){
		  var total = parseInt($("#alu_mat_tot3").val());
		  var mujeres = parseInt($("#alu_mat_muj3").val());
		  var varones = parseInt($("#alu_mat_var3").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot3").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot3").css('background-color', '#7FFFD4');
		  }
		});
	</script>
		<script type="text/javascript">
		$('#alu_mat_muj4').keyup(function(){
		  var total = parseInt($("#alu_mat_tot4").val());
		  var mujeres = parseInt($("#alu_mat_muj4").val());
		  var varones = parseInt($("#alu_mat_var4").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot4").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot4").css('background-color', '#7FFFD4');
		  }
		});
	</script>
		<script type="text/javascript">
		$('#alu_mat_muj5').keyup(function(){
		  var total = parseInt($("#alu_mat_tot5").val());
		  var mujeres = parseInt($("#alu_mat_muj5").val());
		  var varones = parseInt($("#alu_mat_var5").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot5").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot5").css('background-color', '#7FFFD4');
		  }
		});
	</script>
		<script type="text/javascript">
		$('#alu_mat_muj6').keyup(function(){
		  var total = parseInt($("#alu_mat_tot6").val());
		  var mujeres = parseInt($("#alu_mat_muj6").val());
		  var varones = parseInt($("#alu_mat_var6").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot6").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot6").css('background-color', '#7FFFD4');
		  }
		});
	</script>
		<script type="text/javascript">
		$('#alu_mat_muj7').keyup(function(){
		  var total = parseInt($("#alu_mat_tot7").val());
		  var mujeres = parseInt($("#alu_mat_muj7").val());
		  var varones = parseInt($("#alu_mat_var7").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot7").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot7").css('background-color', '#7FFFD4');
		  }
		});
	</script>
		<script type="text/javascript">
		$('#alu_mat_muj8').keyup(function(){
		  var total = parseInt($("#alu_mat_tot8").val());
		  var mujeres = parseInt($("#alu_mat_muj8").val());
		  var varones = parseInt($("#alu_mat_var8").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot8").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot8").css('background-color', '#7FFFD4');
		  }
		});
	</script>
		<script type="text/javascript">
		$('#alu_mat_muj9').keyup(function(){
		  var total = parseInt($("#alu_mat_tot9").val());
		  var mujeres = parseInt($("#alu_mat_muj9").val());
		  var varones = parseInt($("#alu_mat_var9").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot9").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot9").css('background-color', '#7FFFD4');
		  }
		});
	</script>
		<script type="text/javascript">
		$('#alu_mat_muj10').keyup(function(){
		  var total = parseInt($("#alu_mat_tot10").val());
		  var mujeres = parseInt($("#alu_mat_muj10").val());
		  var varones = parseInt($("#alu_mat_var10").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot10").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot10").css('background-color', '#7FFFD4');
		  }
		});
	</script>
		<script type="text/javascript">
		$('#alu_mat_muj11').keyup(function(){
		  var total = parseInt($("#alu_mat_tot11").val());
		  var mujeres = parseInt($("#alu_mat_muj11").val());
		  var varones = parseInt($("#alu_mat_var11").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot11").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot11").css('background-color', '#7FFFD4');
		  }
		});
	</script>
		<script type="text/javascript">
		$('#alu_mat_muj12').keyup(function(){
		  var total = parseInt($("#alu_mat_tot12").val());
		  var mujeres = parseInt($("#alu_mat_muj12").val());
		  var varones = parseInt($("#alu_mat_var12").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot12").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot12").css('background-color', '#7FFFD4');
		  }
		});
	</script>
		<script type="text/javascript">
		$('#alu_mat_muj13').keyup(function(){
		  var total = parseInt($("#alu_mat_tot13").val());
		  var mujeres = parseInt($("#alu_mat_muj13").val());
		  var varones = parseInt($("#alu_mat_var13").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot13").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot13").css('background-color', '#7FFFD4');
		  }
		});
	</script>
	<script type="text/javascript">
		$('#alu_mat_muj114').keyup(function(){
		  var total = parseInt($("#alu_mat_tot14").val());
		  var mujeres = parseInt($("#alu_mat_muj14").val());
		  var varones = parseInt($("#alu_mat_var14").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot14").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot14").css('background-color', '#7FFFD4');
		  }
		});
	</script>
	<script type="text/javascript">
		$('#alu_mat_muj15').keyup(function(){
		  var total = parseInt($("#alu_mat_tot15").val());
		  var mujeres = parseInt($("#alu_mat_muj15").val());
		  var varones = parseInt($("#alu_mat_var15").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot15").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot15").css('background-color', '#7FFFD4');
		  }
		});
	</script>
	<script type="text/javascript">
		$('#alu_mat_muj16').keyup(function(){
		  var total = parseInt($("#alu_mat_tot16").val());
		  var mujeres = parseInt($("#alu_mat_muj16").val());
		  var varones = parseInt($("#alu_mat_var16").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot16").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot16").css('background-color', '#7FFFD4');
		  }
		});
	</script>
	<script type="text/javascript">
		$('#alu_mat_muj17').keyup(function(){
		  var total = parseInt($("#alu_mat_tot17").val());
		  var mujeres = parseInt($("#alu_mat_muj17").val());
		  var varones = parseInt($("#alu_mat_var17").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot17").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot17").css('background-color', '#7FFFD4');
		  }
		});
	</script>
	<script type="text/javascript">
		$('#alu_mat_muj18').keyup(function(){
		  var total = parseInt($("#alu_mat_tot18").val());
		  var mujeres = parseInt($("#alu_mat_muj18").val());
		  var varones = parseInt($("#alu_mat_var18").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot18").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot18").css('background-color', '#7FFFD4');
		  }
		});
	</script>
	<script type="text/javascript">
		$('#alu_mat_muj19').keyup(function(){
		  var total = parseInt($("#alu_mat_tot19").val());
		  var mujeres = parseInt($("#alu_mat_muj19").val());
		  var varones = parseInt($("#alu_mat_var19").val());
		  if (total != varones+mujeres){
		    $("#alu_mat_tot19").css('background-color', '#E9967A');
		  }  else {
		    $("#alu_mat_tot19").css('background-color', '#7FFFD4');
		  }
		});
	</script>	
	

<h1>Planilla Educacion para Adultos</h1>
		
<table  WIDTH="200px"  border="1" id="example">
	<thead>
		<tr>
			<th>Fila</th>
			<th>Localizacion</th>
			<th>Nivel/Servicio</th>
			<th>Año de estudio</th>
			<th>Turno</th>
			<th>Sección/División</th>
			<th>Orientación</th>
			<th>Total</th>
			<th>Varones</th>
			<!-- <th>Mujeres</th>-->
		</tr>
	</thead>
	<tbody>

	 	<tr>
	 	    <td><?php echo '1' ?></td>
		<td> <?php echo CHtml::dropDownList($model, 'id_localizacion', 
		GxHtml::listDataEx(Localizacion::model()->findAll(array(
				'select'=>'t.id_localizacion, t.nombre',
				'condition'=>"t.id_establecimiento = 'Yii::app()->getSession()->get('id_establecimiento')'")),'id_localizacion','nombre'),
		array(
				'ajax'=>array(
						'type'=>'POST',
						'url'=>CController::createUrl('Planilla/Selectdos'),
						'update'=>'#'.CHtml::activeId($model,'id_tipo_planilla'),
						'beforeSend' => 'function(){
						$("#Planilla_id_tipo_planilla").find("option").remove();
						
		}', ),
				'prompt'=>'Seleccione',
			    'class'=>'span2'
			
		)); ?><td>
			<td><?php echo CHtml::dropDownList('niveles', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('anios_estudio', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot','',$data, array('class' => 'cambio')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var','',$data); ?></td>
		<!-- 	<td><?php echo CHtml::textField('alu_mat_muj','',$data); ?></td> -->
		</tr>

		

<tr>
			<td><?php echo '2' ?></td>
			<td> <?php echo CHtml::dropDownList($model, 'id_localizacion', 
		GxHtml::listDataEx(Localizacion::model()->findAll(array(
				'select'=>'t.id_localizacion, t.nombre',
				'condition'=>"t.id_establecimiento = 'Yii::app()->getSession()->get('id_establecimiento')'")),'id_localizacion','nombre'),
		array(
				'ajax'=>array(
						'type'=>'POST',
						'url'=>CController::createUrl('Planilla/Selectdos'),
						'update'=>'#'.CHtml::activeId($model,'id_tipo_planilla'),
						'beforeSend' => 'function(){
						$("#Planilla_id_tipo_planilla").find("option").remove();
						
		}', ),
				'prompt'=>'Seleccione',
			    'class'=>'span2'
			
		)); ?><td>
			<td><?php
			echo CHtml::dropDownList('niveles1', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('anios_estudio1', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno1', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion1', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion1', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot1','',$data,array('class' => 'cambio')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var1','',$data); ?></td>
				<!--<td><?php echo CHtml::textField('alu_mat_muj1','',$data); ?></td>-->
		</tr>
		<tr>
		<td><?php echo '3' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles2', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio2', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno2', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion2', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion2', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot2','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var2','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj2','',$data); ?></td>-->
		</tr>
		<tr>
		<td><?php echo '4' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles3', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio3', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno3', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion3', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion3', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot3','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var3','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj3','',$data); ?></td>-->
		</tr>
		<tr>
		<td><?php echo '5' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles4', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio4', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno4', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion4', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion4', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot4','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var4','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj4','',$data); ?></td>-->
		</tr>
		<tr>
		<td><?php echo '6' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles5', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio5', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno5', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion5', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion5', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot5','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var5','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj5','',$data); ?></td>-->
		</tr>
		<tr>
		    <td><?php echo '7' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles6', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio6', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno6', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion6', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion6', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot6','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var6','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj6','',$data); ?></td>-->
		</tr>
		<tr>
		   <td><?php echo '8' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles7', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio7', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno7', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion7', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion7', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot7','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var7','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj7','',$data); ?></td>-->
		</tr>
		<tr>
	    	<td><?php echo '9' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles8', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio8', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno8', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion8', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion8', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
	    	<td><?php echo CHtml::textField('alu_mat_tot8','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var8','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj8','',$data); ?></td>-->
		</tr>
		<tr>
		    <td><?php echo '10' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles9', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio9', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno9', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion9', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion9', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot9','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var9','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj9','',$data); ?></td>-->
		</tr>
		<tr>
		    <td><?php echo '11' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles10', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio10', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno10', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion10', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion10', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot10','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var10','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj10','',$data); ?></td>-->
		</tr>
		<tr>
			<td><?php echo '12' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles11', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio11', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno11', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion11', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion11', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot11','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var11','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj11','',$data); ?></td>-->
		</tr>
		<tr>
			<td><?php echo '13' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles12', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio12', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno12', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion12', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion12', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
		    <td><?php echo CHtml::textField('alu_mat_tot12','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var12','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj12','',$data); ?></td>-->
		</tr>
		<tr>
			<td><?php echo '14' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles13', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio13', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno13', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion13', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion13', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
		    <td><?php echo CHtml::textField('alu_mat_tot13','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var13','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj13','',$data); ?></td>-->
		</tr>
		<tr>
			<td><?php echo '15' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles14', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio14', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno14', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion14', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion14', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot14','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var14','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj14','',$data); ?></td>-->
		</tr>
		<tr>
			<td><?php echo '16' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles15', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio15', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno15', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion15', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion15', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot15','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var15','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj15','',$data); ?></td>-->
		</tr>
		<tr>
			<td><?php echo '17' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles16', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio16', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno16', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion16', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion16', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
	        <td><?php echo CHtml::textField('alu_mat_tot16','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var16','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj16','',$data); ?></td>-->
		</tr>
		<tr>
			<td><?php echo '18' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles17', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio17', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno17', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion17', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion17', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot17','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var17','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj17','',$data); ?></td>-->
		</tr>
		<tr>
			<td><?php echo '19' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles18', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio18', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno18', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion18', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion18', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot18','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var18','',$data); ?></td>
			<!--<td><?php echo CHtml::textField('alu_mat_muj18','',$data); ?></td>-->
		</tr>
		<tr>
			<td><?php echo '20' ?></td>
			<td><?php 
			echo CHtml::dropDownList('niveles19', $data, GxHtml::listData(NivelServicio::model()->findAll(array(
						'condition'=>"t.id_nivel = 8 or t.id_nivel = 10")),'id_nivel','descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
						
			<td><?php echo CHtml::dropDownList('anios_estudio19', $data, GxHtml::listData(SalaCicloAnio::model()->findAll(),'id_sala_ciclo_anio', 'descripcion'),
					array('prompt'=>'Seleccione'));  ?></td>
			<td><?php echo CHtml::dropDownList('turno19', $data, GxHtml::listData(Turno::model()->findAll(),'id_turno', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('seccion19', $data, GxHtml::listData(Seccion::model()->findAll(),'id_seccion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::dropDownList('orientacion19', $data, GxHtml::listData(Orientacion::model()->findAll(),'id_orientacion', 'descripcion'),
					array('prompt'=>'Seleccione')); ?></td>
			<td><?php echo CHtml::textField('alu_mat_tot19','',$data); ?></td>
			<td><?php echo CHtml::textField('alu_mat_var19','',$data); ?></td>
		<!--	<td><?php //echo CHtml::textField('alu_mat_muj19','',$data); ?></td> -->
		</tr>
	
  
	 </tbody>
</table>


