<?php

Yii::import('bootstrap.form.TbForm');

/**
 * This is the model class for table "entity".
 *
 * The followings are the available columns in table 'entity':
 * @property string $id
 * @property string $typeId
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Type $type
 * @property Property[] $properties
 * @property PropertyValue[] $values
 */
class Entity extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Entity the static model class
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
		return 'entity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('typeId, name', 'required'),
			array('typeId', 'length', 'max'=>10),
			array('name', 'length', 'max'=>255),
            array('name', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, typeId, name', 'safe', 'on'=>'search'),
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
			'type' => array(self::BELONGS_TO, 'Type', 'typeId'),
            'properties' => array(self::MANY_MANY, 'Property', 'type_property(typeId, propertyId)'),
            'values' => array(self::HAS_MANY, 'PropertyValue', 'entityId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'typeId' => 'Type',
			'name' => 'Name',
		);
	}

	public function typeOptions()
	{
		$options = array();

		/** @var $types Type[] */
		$types = Type::model()->findAll();
		foreach ($types as $type)
			$options[$type->name] = $type->getPrettyName();

		return $options;
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
		$criteria->compare('type.name',$this->typeId, true);
		$criteria->compare('name',$this->name,true);

		$criteria->with[] = 'type';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getPrettyName()
    {
        return ucfirst($this->name);
    }
}