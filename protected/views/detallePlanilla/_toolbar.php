<div class="btn-toolbar">
    <div class="btn-group">
        <?php  ?><?php
            switch($this->action->id) {
                case "create":
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"Manage",
                        "icon"=>"icon-list-alt icon-white",
                        "url"=>array("admin")
                    ));
                    break;
                case "admin":
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"Create",
                        "icon"=>"icon-plus",
                        "url"=>array("create")
                    ));
                    break;
                case "view":
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"Manage",
                        "icon"=>"icon-list-alt icon-white",
                        "url"=>array("admin")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"Update",
                        "icon"=>"icon-edit icon-white",
                        "url"=>array("update","id"=>$model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"Create",
                        "icon"=>"icon-plus",
                        "url"=>array("create")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"Delete",
                        "type"=>"danger",
                        "icon"=>"icon-remove icon-white",
                        "htmlOptions"=> array(
                            "submit"=>array("delete","id"=>$model->{$model->tableSchema->primaryKey}, "returnUrl"=>Yii::app()->request->getParam("returnUrl")),
                            "confirm"=>"Do you want to delete this item?")
                         )
                    );
                    break;
                case "update":
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"Manage",
                        "icon"=>"icon-list-alt icon-white",
                        "url"=>array("admin")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"View",
                        "icon"=>"icon-eye-open",
                        "url"=>array("view","id"=>$model->{$model->tableSchema->primaryKey})
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"Delete",
                        "type"=>"danger",
                        "icon"=>"icon-remove icon-white",
                        "htmlOptions"=> array(
                            "submit"=>array("delete","id"=>$model->{$model->tableSchema->primaryKey}, "returnUrl"=>Yii::app()->request->getParam("returnUrl")),
                            "confirm"=>"Do you want to delete this item?")
                         )
                    );
                    break;
            }
        ?>    </div>
    <?php if($this->action->id == 'admin'): ?>    <div class="btn-group">
        <?php
    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"Search",
                        "icon"=>"icon-search",
                        "htmlOptions"=>array("class"=>"search-button")
                    ));?>    </div>

            <div class="btn-group">
            <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'buttons'=>array(
                array('label'=>'Relations', 'icon'=>'icon-search', 'items'=>array(array('label'=>'idSeccion - Seccion', 'url' =>array('seccion/admin')),array('label'=>'idActividadTaller - ActividadTaller', 'url' =>array('actividadTaller/admin')),array('label'=>'idPlanilla - Planilla', 'url' =>array('planilla/admin')),array('label'=>'idSalaCicloAnio - SalaCicloAnio', 'url' =>array('salaCicloAnio/admin')),array('label'=>'idNivel - NivelServicio', 'url' =>array('nivelServicio/admin')),array('label'=>'idOrientacion - Orientacion', 'url' =>array('orientacion/admin')),array('label'=>'idTurno - Turno', 'url' =>array('turno/admin')),array('label'=>'idCaracterActividad - CaracterActividad', 'url' =>array('caracterActividad/admin')),
            )
          ),
        ),
    ));
?>        </div>

        
    <?php endif; ?></div>

<?php if($this->action->id == 'admin'): ?><div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
<?php endif; ?>