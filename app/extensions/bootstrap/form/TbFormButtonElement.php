<?php

class TbFormButtonElement extends CFormButtonElement {

    public $buttonType;
    public $type;
    public $size;
    public $icon;
    public $url;
    public $block = false;
    public $active = false;
    public $disabled = false;
    public $encodeLabel = true;
    public $toggle;
    public $loadingText;
    public $completeText;
    public $items = array();
    public $htmlOptions = array();
    public $ajaxOptions = array();
    public $dropdownOptions = array();

    public function render()
    {
        ob_start();
        $this->getParent()->getOwner()->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>isset($this->buttonType) ? $this->buttonType : null,
            'type'=>isset($this->type) ? $this->type : null,
            'size'=>isset($this->size) ? $this->size : null,
            'icon'=>$this->icon,
            'label'=>$this->label,
            'url'=>$this->url,
            'block'=>$this->block,
            'active'=>$this->active,
            'disabled'=>$this->disabled,
            'encodeLabel'=>$this->encodeLabel,
            'toggle'=>$this->toggle,
            'loadingText'=>$this->loadingText,
            'completeText'=>$this->completeText,
            'items'=>$this->items,
            'htmlOptions'=>$this->htmlOptions,
            'ajaxOptions'=>$this->ajaxOptions,
            'dropdownOptions'=>$this->dropdownOptions,
        ));
        return ob_get_clean();
    }
}
