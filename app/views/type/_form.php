<?php
/* @var $this PropertyController */
/* @var $form TbActiveForm */
/* @var $model Type */
?>

<?php $form = $this->beginWidget('TbActiveForm', array(
	'type'=>'horizontal',
)); ?>

<?php echo $form->textFieldRow($model, 'name'); ?>

<div class="form-actions">
	<?php $this->widget('TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Save',
	)); ?>
	<?php $this->widget('TbButton', array(
		'type'=>'link',
		'label'=>'Cancel',
		'url'=>array('admin'),
	)); ?>
</div>

<?php $this->endWidget(); ?>
