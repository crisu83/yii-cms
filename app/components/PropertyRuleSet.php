<?php
class PropertyRuleSet
{
    public $_rules = array();

    public function addRule(array $rule)
    {
        $this->_rules[] = $rule;
    }

    public function addPropertyRules(Property $property)
    {
        $rules = $property->buildRules();
        foreach ($rules as $rule)
            $this->addRule($rule);
    }

    public function getRules()
    {
        return $this->_rules;
    }
}
