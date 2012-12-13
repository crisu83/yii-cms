<?php

class DynamicFormModel extends CFormModel
{
	private $_values = array();
	private $_rules = array();

	public function __set($name, $value)
	{
		if (isset($this->_values[$name]))
			$this->_values[$name] = $value;
		else
			parent::__set($name, $value);
	}

	public function __get($name)
	{
		if (isset($this->_values[$name]))
			return $this->_values[$name];
		else
			return parent::__get($name);
	}

	public function rules()
	{
		return $this->_rules;
	}

	public function setAttributeNames(array $names)
	{
		if (empty($this->_values))
		{
			foreach ($names as $name)
				$this->_values[$name] = '';
		}
	}

	public function attributeNames()
	{
		return CMap::mergeArray(parent::attributeNames(), array_keys($this->_values));
	}

	public function getAttributes($names = null)
	{
		$values = array();
		foreach ($this->attributeNames() as $name)
		{
			if (isset($this->_values[$name]))
				$values[$name] = $this->_values[$name];
			else
				$values[$name] = $this->$name;
		}

		if (is_array($names))
		{
			$values2 = array();
			foreach ($names as $name)
				$values2[$name] = isset($values[$name]) ? $values[$name] : null;

			return $values2;
		}
		else
			return $values;
	}

	public function addRule(array $rule)
	{
		$this->_rules[] = $rule;
	}

	public function hasProperty($name)
	{
		if (isset($this->_values[$name]))
			return true;
		else
			return parent::hasProperty($name);
	}
}
