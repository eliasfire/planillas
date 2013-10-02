<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_datos_est')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_datos_est),array('view','id'=>$data->id_datos_est)); ?>
	<br />


	<?php echo GxHtml::encode($data->getAttributeLabel('id_planilla')); ?>:
	<?php echo GxHtml::encode($data->id_planilla); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_dic_cla')); ?>:
	<?php echo GxHtml::encode($data->tot_dic_cla); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_dic_tit')); ?>:
	<?php echo GxHtml::encode($data->tot_dic_tit); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_dic_int')); ?>:
	<?php echo GxHtml::encode($data->tot_dic_int); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_dic_tra')); ?>:
	<?php echo GxHtml::encode($data->tot_dic_tra); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_dic_sup')); ?>:
	<?php echo GxHtml::encode($data->tot_dic_sup); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_dic_sin')); ?>:
	<?php echo GxHtml::encode($data->tot_dic_sin); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_dic_pas')); ?>:
	<?php echo GxHtml::encode($data->tot_dic_pas); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_dic_com')); ?>:
	<?php echo GxHtml::encode($data->tot_dic_com); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_dic_lic')); ?>:
	<?php echo GxHtml::encode($data->tot_dic_lic); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_dic_con')); ?>:
	<?php echo GxHtml::encode($data->tot_dic_con); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_jar_mat')); ?>:
	<?php echo GxHtml::encode($data->tot_jar_mat); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_mat_tit')); ?>:
	<?php echo GxHtml::encode($data->tot_mat_tit); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_mat_int')); ?>:
	<?php echo GxHtml::encode($data->tot_mat_int); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_mat_tra')); ?>:
	<?php echo GxHtml::encode($data->tot_mat_tra); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_mat_sup')); ?>:
	<?php echo GxHtml::encode($data->tot_mat_sup); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_mat_sin')); ?>:
	<?php echo GxHtml::encode($data->tot_mat_sin); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_mat_pas')); ?>:
	<?php echo GxHtml::encode($data->tot_mat_pas); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_mat_com')); ?>:
	<?php echo GxHtml::encode($data->tot_mat_com); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_mat_lic')); ?>:
	<?php echo GxHtml::encode($data->tot_mat_lic); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_mat_con')); ?>:
	<?php echo GxHtml::encode($data->tot_mat_con); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_jar_inf')); ?>:
	<?php echo GxHtml::encode($data->tot_jar_inf); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_inf_tit')); ?>:
	<?php echo GxHtml::encode($data->tot_inf_tit); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_inf_int')); ?>:
	<?php echo GxHtml::encode($data->tot_inf_int); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_inf_tra')); ?>:
	<?php echo GxHtml::encode($data->tot_inf_tra); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_inf_sup')); ?>:
	<?php echo GxHtml::encode($data->tot_inf_sup); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_inf_sin')); ?>:
	<?php echo GxHtml::encode($data->tot_inf_sin); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_inf_pas')); ?>:
	<?php echo GxHtml::encode($data->tot_inf_pas); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_inf_com')); ?>:
	<?php echo GxHtml::encode($data->tot_inf_com); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_inf_lic')); ?>:
	<?php echo GxHtml::encode($data->tot_inf_lic); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_inf_con')); ?>:
	<?php echo GxHtml::encode($data->tot_inf_con); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_hor_egb')); ?>:
	<?php echo GxHtml::encode($data->tot_hor_egb); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_egb_tit')); ?>:
	<?php echo GxHtml::encode($data->tot_egb_tit); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_egb_int')); ?>:
	<?php echo GxHtml::encode($data->tot_egb_int); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_egb_tra')); ?>:
	<?php echo GxHtml::encode($data->tot_egb_tra); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_egb_sup')); ?>:
	<?php echo GxHtml::encode($data->tot_egb_sup); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_egb_sin')); ?>:
	<?php echo GxHtml::encode($data->tot_egb_sin); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_egb_pas')); ?>:
	<?php echo GxHtml::encode($data->tot_egb_pas); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_egb_com')); ?>:
	<?php echo GxHtml::encode($data->tot_egb_com); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_egb_lic')); ?>:
	<?php echo GxHtml::encode($data->tot_egb_lic); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_egb_con')); ?>:
	<?php echo GxHtml::encode($data->tot_egb_con); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_hor_sec')); ?>:
	<?php echo GxHtml::encode($data->tot_hor_sec); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_sec_tit')); ?>:
	<?php echo GxHtml::encode($data->tot_sec_tit); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_sec_int')); ?>:
	<?php echo GxHtml::encode($data->tot_sec_int); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_sec_tra')); ?>:
	<?php echo GxHtml::encode($data->tot_sec_tra); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_sec_sup')); ?>:
	<?php echo GxHtml::encode($data->tot_sec_sup); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_sec_sin')); ?>:
	<?php echo GxHtml::encode($data->tot_sec_sin); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_sec_pas')); ?>:
	<?php echo GxHtml::encode($data->tot_sec_pas); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_sec_com')); ?>:
	<?php echo GxHtml::encode($data->tot_sec_com); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_sec_lic')); ?>:
	<?php echo GxHtml::encode($data->tot_sec_lic); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_sec_con')); ?>:
	<?php echo GxHtml::encode($data->tot_sec_con); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_hor_pol')); ?>:
	<?php echo GxHtml::encode($data->tot_hor_pol); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_pol_tit')); ?>:
	<?php echo GxHtml::encode($data->tot_pol_tit); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_pol_int')); ?>:
	<?php echo GxHtml::encode($data->tot_pol_int); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_pol_tra')); ?>:
	<?php echo GxHtml::encode($data->tot_pol_tra); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_pol_sup')); ?>:
	<?php echo GxHtml::encode($data->tot_pol_sup); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_pol_sin')); ?>:
	<?php echo GxHtml::encode($data->tot_pol_sin); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_pol_pas')); ?>:
	<?php echo GxHtml::encode($data->tot_pol_pas); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_pol_com')); ?>:
	<?php echo GxHtml::encode($data->tot_pol_com); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_pol_lic')); ?>:
	<?php echo GxHtml::encode($data->tot_pol_lic); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_pol_con')); ?>:
	<?php echo GxHtml::encode($data->tot_pol_con); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_act_fun')); ?>:
	<?php echo GxHtml::encode($data->tot_act_fun); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_fun_tit')); ?>:
	<?php echo GxHtml::encode($data->tot_fun_tit); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_fun_int')); ?>:
	<?php echo GxHtml::encode($data->tot_fun_int); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_fun_tra')); ?>:
	<?php echo GxHtml::encode($data->tot_fun_tra); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_fun_sup')); ?>:
	<?php echo GxHtml::encode($data->tot_fun_sup); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_fun_sin')); ?>:
	<?php echo GxHtml::encode($data->tot_fun_sin); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_fun_pas')); ?>:
	<?php echo GxHtml::encode($data->tot_fun_pas); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_fun_com')); ?>:
	<?php echo GxHtml::encode($data->tot_fun_com); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_fun_lic')); ?>:
	<?php echo GxHtml::encode($data->tot_fun_lic); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_fun_con')); ?>:
	<?php echo GxHtml::encode($data->tot_fun_con); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_hor_ins')); ?>:
	<?php echo GxHtml::encode($data->tot_hor_ins); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_ins_tit')); ?>:
	<?php echo GxHtml::encode($data->tot_ins_tit); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_ins_int')); ?>:
	<?php echo GxHtml::encode($data->tot_ins_int); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_ins_tra')); ?>:
	<?php echo GxHtml::encode($data->tot_ins_tra); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_ins_sup')); ?>:
	<?php echo GxHtml::encode($data->tot_ins_sup); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_ins_sin')); ?>:
	<?php echo GxHtml::encode($data->tot_ins_sin); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_ins_pas')); ?>:
	<?php echo GxHtml::encode($data->tot_ins_pas); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_ins_com')); ?>:
	<?php echo GxHtml::encode($data->tot_ins_com); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_ins_lic')); ?>:
	<?php echo GxHtml::encode($data->tot_ins_lic); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_ins_con')); ?>:
	<?php echo GxHtml::encode($data->tot_ins_con); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_per_adm')); ?>:
	<?php echo GxHtml::encode($data->tot_per_adm); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_adm_var')); ?>:
	<?php echo GxHtml::encode($data->tot_adm_var); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tor_adm_muj')); ?>:
	<?php echo GxHtml::encode($data->tor_adm_muj); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_per_ser')); ?>:
	<?php echo GxHtml::encode($data->tot_per_ser); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_ser_var')); ?>:
	<?php echo GxHtml::encode($data->tot_ser_var); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_ser_muj')); ?>:
	<?php echo GxHtml::encode($data->tot_ser_muj); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_per_pla')); ?>:
	<?php echo GxHtml::encode($data->tot_per_pla); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_pla_var')); ?>:
	<?php echo GxHtml::encode($data->tot_pla_var); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_pla_muj')); ?>:
	<?php echo GxHtml::encode($data->tot_pla_muj); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_per_con')); ?>:
	<?php echo GxHtml::encode($data->tot_per_con); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_con_var')); ?>:
	<?php echo GxHtml::encode($data->tot_con_var); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_con_muj')); ?>:
	<?php echo GxHtml::encode($data->tot_con_muj); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_per_nod')); ?>:
	<?php echo GxHtml::encode($data->tot_per_nod); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_per_var')); ?>:
	<?php echo GxHtml::encode($data->tot_per_var); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_per_muj')); ?>:
	<?php echo GxHtml::encode($data->tot_per_muj); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_doc_act')); ?>:
	<?php echo GxHtml::encode($data->tot_doc_act); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_act_var')); ?>:
	<?php echo GxHtml::encode($data->tot_act_var); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_act_muj')); ?>:
	<?php echo GxHtml::encode($data->tot_act_muj); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_per_pas')); ?>:
	<?php echo GxHtml::encode($data->tot_per_pas); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_pas_var')); ?>:
	<?php echo GxHtml::encode($data->tot_pas_var); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_pas_muj')); ?>:
	<?php echo GxHtml::encode($data->tot_pas_muj); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_doc_fun')); ?>:
	<?php echo GxHtml::encode($data->tot_doc_fun); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_doc_var')); ?>:
	<?php echo GxHtml::encode($data->tot_doc_var); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_doc_muj')); ?>:
	<?php echo GxHtml::encode($data->tot_doc_muj); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_doc_otr')); ?>:
	<?php echo GxHtml::encode($data->tot_doc_otr); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_otr_var')); ?>:
	<?php echo GxHtml::encode($data->tot_otr_var); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_otr_muj')); ?>:
	<?php echo GxHtml::encode($data->tot_otr_muj); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('dom_act')); ?>:
	<?php echo GxHtml::encode($data->dom_act); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('telefono')); ?>:
	<?php echo GxHtml::encode($data->telefono); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lugar_fecha')); ?>:
	<?php echo GxHtml::encode($data->lugar_fecha); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('secretario')); ?>:
	<?php echo GxHtml::encode($data->secretario); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('vicedirector')); ?>:
	<?php echo GxHtml::encode($data->vicedirector); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('director')); ?>:
	<?php echo GxHtml::encode($data->director); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fec_ini_act')); ?>:
	<?php echo GxHtml::encode($data->fec_ini_act); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fec_ina')); ?>:
	<?php echo GxHtml::encode($data->fec_ina); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fec_ani')); ?>:
	<?php echo GxHtml::encode($data->fec_ani); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_pol_tar')); ?>:
	<?php echo GxHtml::encode($data->tot_pol_tar); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_fun_tar')); ?>:
	<?php echo GxHtml::encode($data->tot_fun_tar); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tot_ins_tar')); ?>:
	<?php echo GxHtml::encode($data->tot_ins_tar); ?>
	<br />
	*/ ?>



</div>