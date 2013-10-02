<?php
/**
 * BootstrapCode class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

Yii::import('gii.generators.crud.CrudCode');

Yii::setPathOfAlias("bootstrap", dirname(__FILE__) . DIRECTORY_SEPARATOR . '');
Yii::import('bootstrap.CodeProvider');

class BootstrapCode extends CrudCode
{
	public $identificationColumn = null;
	public $codeProvider;
	
	/**
	 * @var string The type of authentication.
	 */
	public $authtype = 'auth_none';
	/**
	 * @var int Specifies if ajax validation is enabled. 0 represents false, 1 represents true.
	 */
	public $enable_ajax_validation = 0;
	/**
	 * @var string The controller base class name.
	 */
	public $baseControllerClass = 'GxController';
	
	/**
	 * Adds the new model attributes (class properties) to the rules.
	 * #MethodTracker
	 * This method overrides {@link CrudCode::rules}, from version 1.1.7 (r3135). Changes:
	 * <ul>
	 * <li>Adds the rules for the new attributes in the code generation form: authtype; enable_ajax_validation.</li>
	 * </ul>
	 */
	
	public function prepare()
	{
		$this->codeProvider = new CodeProvider;
		if (!$this->identificationColumn) {
			$this->identificationColumn = $this->tableSchema->primaryKey;
		}
	
		if (!array_key_exists($this->identificationColumn, $this->tableSchema->columns)) {
			$this->addError('identificationColumn',
					'The specified column can not be found in the models attributes. <br /> Please specify a valid attribute. If unsure, leave the field empty.');
		}
	
		parent::prepare();
	}
	public function generateActiveRow($modelClass, $column)
	{
	if (!$column->isForeignKey) {
		if ($column->type === 'boolean')
			return "\$form->checkBoxRow(\$model,'{$column->name}')";
		else if (stripos($column->dbType,'text') !== false)
			return "\$form->textAreaRow(\$model,'{$column->name}',array('rows'=>6, 'cols'=>50, 'class'=>'span8'))";
		else
		{
			if (preg_match('/^(password|pass|passwd|passcode)$/i',$column->name))
				$inputField='passwordFieldRow';
			else
				$inputField='textFieldRow';

			if ($column->type!=='string' || $column->size===null)
				return "\$form->{$inputField}(\$model,'{$column->name}',array('class'=>'span5'))";
			else
				return "\$form->{$inputField}(\$model,'{$column->name}',array('class'=>'span5','maxlength'=>$column->size))";
		}
	}
	else { // FK.
			// Find the related model for this column.
			$relation = $this->findRelation($modelClass, $column);
			$relationName = $relation[0];
			$relatedModelClass = $relation[3];
			return "array(
			'name'=>'{$column->name}',
			'value'=>'GxHtml::valueEx(\$data->{$relationName})',
			'filter'=>GxHtml::listDataEx({$relatedModelClass}::model()->findAllAttributes(null, true)),
			)";
	}
	}
	
	public function generateGridViewColumn($modelClass, $column) {
		if (!$column->isForeignKey) {
			// Boolean or bit.
			if (strtoupper($column->dbType) == 'TINYINT(1)'
					|| strtoupper($column->dbType) == 'BIT'
					|| strtoupper($column->dbType) == 'BOOL'
					|| strtoupper($column->dbType) == 'BOOLEAN') {
				return "array(
				'name' => '{$column->name}',
				'value' => '(\$data->{$column->name} === 0) ? Yii::t(\\'app\\', \\'No\\') : Yii::t(\\'app\\', \\'Yes\\')',
				'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
				)";
			} else // Common column.
			return "'{$column->name}'";
			} else { // FK.
			// Find the related model for this column.
			$relation = $this->findRelation($modelClass, $column);
			$relationName = $relation[0];
			$relatedModelClass = $relation[3];
			return "array(
			'name'=>'{$column->name}',
			'value'=>'GxHtml::valueEx(\$data->{$relationName})',
			'filter'=>GxHtml::listDataEx({$relatedModelClass}::model()->findAllAttributes(null, true)),
			)";
	}
	}
	
	public function generateDetailViewAttribute($modelClass, $column) {
		if (!$column->isForeignKey) {
			if (strtoupper($column->dbType) == 'TINYINT(1)'
					|| strtoupper($column->dbType) == 'BIT'
					|| strtoupper($column->dbType) == 'BOOL'
					|| strtoupper($column->dbType) == 'BOOLEAN') {
				return "'{$column->name}:boolean'";
			} else
				return "'{$column->name}'";
		} else {
		// Find the relation name for this column.
			$relation = $this->findRelation($modelClass, $column);
			$relationName = $relation[0];
			$relatedModelClass = $relation[3];
			$relatedControllerName = strtolower($relatedModelClass[0]) . substr($relatedModelClass, 1);
	
			return "array(
					'name' => '{$relationName}',
					'type' => 'raw',
					'value' => \$model->{$relationName} !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx(\$model->{$relationName})), array('{$relatedControllerName}/view', 'id' => GxActiveRecord::extractPkValue(\$model->{$relationName}, true))) : null,
					)";
		}
		}
	
	public function findRelation($modelClass, $column) {
		if (!$column->isForeignKey)
			return null;
		$relations = GxActiveRecord::model($modelClass)->relations();
		// Find the relation for this attribute.
		foreach ($relations as $relationName => $relation) {
			// For attributes on this model, relation must be BELONGS_TO.
			if ($relation[0] == GxActiveRecord::BELONGS_TO && $relation[2] == $column->name) {
				return array(
						$relationName, // the relation name
						$relation[0], // the relation type
						$relation[2], // the foreign key
						$relation[1] // the related active record class name
				);
			}
		}
		// None found.
		return null;
	}
	
	public function generateActiveField($modelClass, $column) {
		if ($column->isForeignKey) {
			$relation = $this->findRelation($modelClass, $column);
			$relatedModelClass = $relation[3];
			return " \$form->dropDownListRow(\$model, '{$column->name}', GxHtml::listDataEx({$relatedModelClass}::model()->findAllAttributes(null, true)))";
		}
	
		if (strtoupper($column->dbType) == 'TINYINT(1)'
		|| strtoupper($column->dbType) == 'BIT'
		|| strtoupper($column->dbType) == 'BOOL'
		|| strtoupper($column->dbType) == 'BOOLEAN') {
		return " \$form->checkBoxRow(\$model, '{$column->name}')";
		} else if (strtoupper($column->dbType) == 'DATE') {
		return "\$form->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => \$model,
				'attribute' => '{$column->name}',
		'value' => \$model->{$column->name},
		'options' => array(
		'showButtonPanel' => true,
		'changeYear' => true,
		'dateFormat' => 'yy-mm-dd',
		),
		));\n";
		} else if (stripos($column->dbType, 'text') !== false) { // Start of CrudCode::generateActiveField code.
		return "\$form->textAreaRow(\$model,'{$column->name}',array('rows'=>3, 'cols'=>50, 'class'=>'span5'))";
		} else {
			$passwordI18n = Yii::t('app', 'password');
			$passwordI18n = (isset($passwordI18n) && $passwordI18n !== '') ? '|' . $passwordI18n : '';
			$pattern = '/^(password|pass|passwd|passcode' . $passwordI18n . ')$/i';
			if (preg_match($pattern, $column->name))
		 $inputField = 'passwordFieldRow';
		else
		 $inputField='textFieldRow';
		
		
		if ($column->type!=='string' || $column->size===null)
			return "\$form->{$inputField}(\$model,'{$column->name}',array('class'=>'span5'))";
			 else
			return "\$form->{$inputField}(\$model,'{$column->name}',array('class'=>'span5','maxlength'=>$column->size))";
	
		} // End of CrudCode::generateActiveField code.
		}
		
		public function generateSearchField($modelClass, $column) {
			if (!$column->isForeignKey) {
				// Boolean or bit.
				if (strtoupper($column->dbType) == 'TINYINT(1)'
						|| strtoupper($column->dbType) == 'BIT'
						|| strtoupper($column->dbType) == 'BOOL'
						|| strtoupper($column->dbType) == 'BOOLEAN')
					return " \$form->dropDownListRow(\$model, '{$column->name}', array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')), array('prompt' => Yii::t('app', 'All')))";
					else // Common column. generateActiveField method will add 'echo' when necessary.
					return $this->generateActiveField($this->modelClass, $column);
			} else { // FK.
				// Find the related model for this column.
				$relation = $this->findRelation($modelClass, $column);
				$relatedModelClass = $relation[3];
				return " \$form->dropDownListRow(\$model, '{$column->name}', GxHtml::listDataEx({$relatedModelClass}::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All')))";
			}
			}
			
			/**
			 * Checks whether this AR has a MANY_MANY relation.
			 * @param string $modelClass The model class name.
			 * @return boolean Whether this AR has a MANY_MANY relation.
			 */
			public function hasManyManyRelation($modelClass) {
				$relations = $this->getRelations($modelClass);
				foreach ($relations as $relationData) {
					if ($relationData[1] == GxActiveRecord::MANY_MANY) {
						return true;
					}
				}
				return false;
			}
			
			/**
			 * Returns all the relations of the specified model.
			 * @param string $modelClass The model class name.
			 * @return array The relations. Each array item is
			 * a relation as an array, having 3 items:
			 * 0: the relation name,
			 * 1: the relation type,
			 * 2: the foreign key,
			 * 3: the related active record class name.
			 * Or an empty array if no relations were found.
			 */
			public function getRelations($modelClass) {
				$relations = GxActiveRecord::model($modelClass)->relations();
				$result = array();
				foreach ($relations as $relationName => $relation) {
					$result[] = array(
							$relationName, // the relation name
							$relation[0], // the relation type
							$relation[2], // the foreign key
							$relation[1] // the related active record class name
					);
				}
				return $result;
			}
}
