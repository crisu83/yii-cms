<?php

/**
 * This is the model class for table "property_rule".
 *
 * The followings are the available columns in table 'property_rule':
 * @property string $id
 * @property string $propertyId
 * @property string $validator
 * @property array $validatorConfig
 *
 * The followings are the available model relations:
 * @property Property $property
 */
class PropertyRule extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PropertyRule the static model class
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
		return 'property_rule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('propertyId, validator', 'required'),
			array('propertyId', 'length', 'max'=>10),
			array('validator', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, propertyId, validator', 'safe', 'on'=>'search'),
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
			'property' => array(self::BELONGS_TO, 'Property', 'propertyId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'propertyId' => 'Property',
			'validator' => 'Validator',
			'validatorConfig' => 'Validator configuration',
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
		$criteria->compare('propertyId',$this->propertyId,true);
		$criteria->compare('validator',$this->validator,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    protected function beforeSave()
    {
        if (parent::beforeSave())
        {
            if (isset($this->validatorConfig) && is_array($this->validatorConfig))
                $this->validatorConfig = CJSON::encode($this->validatorConfig);
        }
    }

    protected function afterFind()
    {
        parent::afterFind();
        if (isset($this->validatorConfig))
            $this->validatorConfig = CJSON::decode($this->validatorConfig);
    }
}