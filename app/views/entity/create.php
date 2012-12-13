<?php
/* @var $this EntityController */
/* @var $form TbActiveForm */
/* @var $model Property */
?>

<h1><?php echo 'New entity'; ?></h1>

<?php $form = $this->beginWidget('TbActiveForm', array(
	'type'=>'horizontal',
)); ?>

<?php echo $form->textFieldRow($model, 'name'); ?>
<?php echo $form->dropDownListRow($model, 'typeId', CMap::mergeArray(array(''=>'Select ...'), Entity::model()->typeOptions())); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Continue',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'type'=>'link',
		'label'=>'Cancel',
		'url'=>array('admin'),
	)); ?>
</div>

<?php $this->endWidget(); ?>
