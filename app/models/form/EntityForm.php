<?php

class EntityForm extends CFormModel
{
    private $_rules = array();
    private $_properties = array();

    public function __set($name, $value)
    {
        if (isset($this->_properties[$name]))
            $this->_properties[$name] = $value;
        else
            parent::__set($name, $value);
    }

    public function __get($name)
    {
        if (isset($this->_properties[$name]))
            return $this->_properties[$name];
        else
            return parent::__get($name);
    }

    public function rules()
    {
        return $this->_rules;
    }

    public function setPropertyNames(array $names)
    {
        if (empty($this->_properties))
        {
            foreach ($names as $name)
                $this->_properties[$name] = '';
        }
    }

    public function setRules(array $rules)
    {
        $this->_rules = $rules;
    }
}
