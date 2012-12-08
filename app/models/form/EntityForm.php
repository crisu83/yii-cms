<?php

class EntityForm extends CFormModel
{
    private $_attributes = array();

    public function __set($name, $value)
    {
        if (isset($this->_attributes[$name]))
            $this->_attributes[$name] = $value;
        else
            parent::__set($name, $value);
    }

    public function __get($name)
    {
        if (isset($this->_attributes[$name]))
            return $this->_attributes[$name];
        else
            return parent::__get($name);
    }

    public function initAttributes(array $names)
    {
        if (empty($this->_attributes))
        {
            foreach ($names as $name)
                $this->_attributes[$name] = '';
        }
    }
}
