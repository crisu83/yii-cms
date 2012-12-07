<?php

Yii::import('bootstrap.form.*');

class TbForm extends CForm {

    public $buttonElementClass = 'TbFormButtonElement';
    public $inputElementClass = 'TbFormInputElement';
    public $activeForm = array('class'=>'bootstrap.widgets.TbActiveForm');

    public function renderElement($element)
    {
        if(is_string($element))
        {
            if(($e=$this[$element])===null && ($e=$this->getButtons()->itemAt($element))===null)
                return $element;
            else
                $element=$e;
        }
        if($element->getVisible())
        {
            if($element instanceof CFormInputElement)
            {
                if($element->type==='hidden')
                    return '<div class="hidden">'.$element->render().'</div>';
                else
                    return $element->render();
            }
            else
                return $element->render();
        }
        return '';
    }

    public function renderButtons()
    {
        $output='';
        foreach($this->getButtons() as $button)
            $output.=$this->renderElement($button);
        return $output!=='' ? '<div class="form-actions">'.$output.'</div>' : '';
    }
}
