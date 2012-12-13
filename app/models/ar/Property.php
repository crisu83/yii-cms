<?php

/**
 * This is the model class for table "property".
 *
 * The followings are the available columns in table 'property':
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $input
 * @property array $htmlOptions
 *
 * The followings are the available model relations:
 * @property PropertyRule[] $rules
 * @property PropertyValue[] $values
 */
class Property extends ActiveRecord
{
	public $inputWidget = 'bootstrap.widgets.TbInput';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Property the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'property';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, input', 'required'),
			array('name, input', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, input', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'rules' => array(self::HAS_MANY, 'PropertyRule', 'propertyId'),
            'values' => array(self::HAS_MANY, 'PropertyValue', 'propertyId'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'input' => 'Input',
			'htmlOptions' => 'HTML options',
		);
	}

	public function inputOptions()
	{
		return array(
			'checkbox' => 'Checkbox',
			'checkboxlist' => 'Checkbox list',
			'dropdown' => 'Dropdown',
			'file' => 'File',
			'radiobutton' => 'Radio button',
			'radiobuttonlist' => 'Radio button list',
			'text' => 'Text',
			'textarea' => 'Textarea',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('input',$this->input,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    protected function beforeSave()
    {
        if (parent::beforeSave())
        {
            if (isset($this->htmlOptions) && is_array($this->htmlOptions))
                $this->htmlOptions = CJSON::encode($this->htmlOptions);
        }
    }

    protected function afterFind()
    {
        parent::afterFind();
        if (isset($this->htmlOptions))
            $this->htmlOptions = CJSON::decode($this->htmlOptions);
    }

    public function buildRules()
    {
        $rules = array();
        foreach ($this->rules as $rule)
        {
            $config = array($this->name, $rule->validator);
            if (isset($rule->validatorConfig))
            {
                foreach ($rule->validatorConfig as $key => $value)
                    $config[$key] = $value;
            }
            $rules[] = $config;
        }
        return $rules;
    }
}