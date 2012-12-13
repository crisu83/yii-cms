<?php
/* @var $this PropertyController */
/* @var $form TbActiveForm */
/* @var $model Property */
?>

<?php $form = $this->beginWidget('TbActiveForm', array(
	'type'=>'horizontal',
)); ?>

<?php echo $form->textFieldRow($model, 'name'); ?>
<?php echo $form->textAreaRow($model, 'description', array('class'=>'span8', 'rows'=>3)); ?>
<?php echo $form->dropDownListRow($model, 'input', CMap::mergeArray(array(''=>'Select ...'), Property::model()->inputOptions())); ?>

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
