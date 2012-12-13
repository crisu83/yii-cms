<?php
/* @var $this TypeController */
/* @var $model Type */
$this->breadcrumbs=array(
	'Types',
);
?>
<h1>Types</h1>

<?php $this->widget('TbButton', array(
	'label'=>'New type',
	'url'=>array('create'),
)); ?>

<?php $this->widget('TbGridView', array(
	'type'=>'striped',
	'dataProvider'=>$model->search(),
	'filter'=>null,
	'template'=>"{items}\n{pager}",
	'columns'=>array(
		'name',
		array(
			'class'=>'TbButtonColumn',
		),
	),
)); ?>
