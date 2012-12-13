<?php

class EntityForm extends DynamicFormModel
{
	public $name;

	public function rules()
	{
		return CMap::mergeArray(parent::rules(), array(
			array('name', 'required'),
		));
	}
}
