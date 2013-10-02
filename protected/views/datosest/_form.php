<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'datosest-form',
	'enableAjaxValidation'=>false,
	'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'
		)	
)); ?>

	<fieldset>
		<legend>
			<p class="note">Los campos con <span class="required">*</span> son requeridos</p>
		</legend>

		<?php
    $this->widget( 'ext.EChosen.EChosen',
        array('target'=>'select')
    );
?>	<?php echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span10')); ?>
		
 <div class="control-group">		
			<div class="span4">
			
<?php echo $form->textFieldRow($model,'id_datos_est',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'id_planilla',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_dic_cla',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_dic_tit',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_dic_int',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_dic_tra',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_dic_sup',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_dic_sin',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_dic_pas',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_dic_com',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_dic_lic',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_dic_con',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_jar_mat',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_mat_tit',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_mat_int',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_mat_tra',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_mat_sup',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_mat_sin',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_mat_pas',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_mat_com',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_mat_lic',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_mat_con',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_jar_inf',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_inf_tit',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_inf_int',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_inf_tra',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_inf_sup',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_inf_sin',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_inf_pas',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_inf_com',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_inf_lic',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_inf_con',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_hor_egb',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_egb_tit',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_egb_int',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_egb_tra',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_egb_sup',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_egb_sin',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_egb_pas',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_egb_com',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_egb_lic',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_egb_con',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_hor_sec',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_sec_tit',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_sec_int',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_sec_tra',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_sec_sup',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_sec_sin',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_sec_pas',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_sec_com',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_sec_lic',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_sec_con',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_hor_pol',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_pol_tit',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_pol_int',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_pol_tra',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_pol_sup',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_pol_sin',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_pol_pas',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_pol_com',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_pol_lic',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_pol_con',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_act_fun',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_fun_tit',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_fun_int',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_fun_tra',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_fun_sup',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_fun_sin',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_fun_pas',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_fun_com',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_fun_lic',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_fun_con',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_hor_ins',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_ins_tit',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_ins_int',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_ins_tra',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_ins_sup',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_ins_sin',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_ins_pas',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_ins_com',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_ins_lic',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_ins_con',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_per_adm',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_adm_var',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tor_adm_muj',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_per_ser',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_ser_var',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_ser_muj',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_per_pla',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_pla_var',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_pla_muj',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_per_con',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_con_var',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_con_muj',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_per_nod',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_per_var',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_per_muj',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_doc_act',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_act_var',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_act_muj',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_per_pas',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_pas_var',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_pas_muj',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_doc_fun',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_doc_var',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_doc_muj',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_doc_otr',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_otr_var',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_otr_muj',array('class'=>'span5')); ?>
<?php echo $form->textAreaRow($model,'dom_act',array('rows'=>3, 'cols'=>50, 'class'=>'span5')); ?>
<?php echo $form->textAreaRow($model,'telefono',array('rows'=>3, 'cols'=>50, 'class'=>'span5')); ?>
<?php echo $form->textAreaRow($model,'email',array('rows'=>3, 'cols'=>50, 'class'=>'span5')); ?>
<?php echo $form->textAreaRow($model,'lugar_fecha',array('rows'=>3, 'cols'=>50, 'class'=>'span5')); ?>
<?php echo $form->textAreaRow($model,'secretario',array('rows'=>3, 'cols'=>50, 'class'=>'span5')); ?>
<?php echo $form->textAreaRow($model,'vicedirector',array('rows'=>3, 'cols'=>50, 'class'=>'span5')); ?>
<?php echo $form->textAreaRow($model,'director',array('rows'=>3, 'cols'=>50, 'class'=>'span5')); ?>
<?php echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'fec_ini_act',
		'value' => $model->fec_ini_act,
		'options' => array(
		'showButtonPanel' => true,
		'changeYear' => true,
		'dateFormat' => 'yy-mm-dd',
		),
		));
; ?>
<?php echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'fec_ina',
		'value' => $model->fec_ina,
		'options' => array(
		'showButtonPanel' => true,
		'changeYear' => true,
		'dateFormat' => 'yy-mm-dd',
		),
		));
; ?>
<?php echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'fec_ani',
		'value' => $model->fec_ani,
		'options' => array(
		'showButtonPanel' => true,
		'changeYear' => true,
		'dateFormat' => 'yy-mm-dd',
		),
		));
; ?>
<?php echo $form->textFieldRow($model,'tot_pol_tar',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_fun_tar',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model,'tot_ins_tar',array('class'=>'span5')); ?>
                       </div>   
  </div>
 
 	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			 'icon'=>'ok white', 
			'label'=>$model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'),
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset',
             'icon'=>'remove',  
			'label'=> Yii::t('app', 'Reset'),
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'link',
			'url'=>Yii::app()->controller->createUrl('admin'),
            'icon'=>'remove-sign',  
			'label'=> Yii::t('app', 'Cancel'),
		)); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>
</div>

<?php $cs = Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
$cs->registerCoreScript('jquery.ui');
$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/bootstrap/jquery-ui.css');
?>	
   <script>
	$(".btnreset").click(function(){
		$(":input","datosest-form").each(function() {
		var type = this.type;
		var tag = this.tagName.toLowerCase(); // normalize case
		if (type == "text" || type == "password" || tag == "textarea") this.value = "";
		else if (type == "checkbox" || type == "radio") this.checked = false;
		else if (tag == "select") this.selectedIndex = "";
	  });
	});
   </script>

