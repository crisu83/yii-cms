<?php

class TbFormInputElement extends CFormInputElement {

    public $data;
    public $htmlOptions = array();

    public function render()
    {
        $form = $this->getParent();
        return $form->getActiveFormWidget()->inputRow($this->type, $form->getModel(), $this->name, $this->data, $this->htmlOptions);
    }

    protected function evaluateVisible()
    {
        return true;
    }
}
