<?php

class TbFormButtonElement extends CFormButtonElement {

    public $buttonType = 'submit';
    public $htmlOptions = array();

    public function render()
    {
        ob_start();
        $this->getParent()->getOwner()->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>$this->buttonType,
            'type'=>$this->type,
            'label'=>$this->label,
            'htmlOptions'=>$this->htmlOptions,
        ));
        return ob_get_clean();
    }
}
