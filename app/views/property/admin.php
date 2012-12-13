<?php
/* @var $this PropertyController */
/* @var $model Property */
$this->breadcrumbs=array(
	'Properties',
);
?>
<h1>Properties</h1>

<?php $this->widget('TbButton', array(
	'label'=>'New property',
	'url'=>array('create'),
)); ?>

<?php $this->widget('TbGridView', array(
	'type'=>'striped',
	'dataProvider'=>$model->search(),
	'filter'=>null,
	'template'=>"{items}\n{pager}",
	'columns'=>array(
		'name',
		'input',
		array(
			'class'=>'TbButtonColumn',
		),
	),
)); ?>
