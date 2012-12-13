<?php
/* @var $this EntityController */
/* @var $model Entity */
$this->breadcrumbs=array(
	'Entities',
);
?>
<h1>Entities</h1>

<?php $this->widget('TbButton', array(
	'label'=>'New entity',
	'url'=>array('create'),
)); ?>

<?php $this->widget('TbGridView', array(
	'type'=>'striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'template'=>"{items}\n{pager}",
	'columns'=>array(
		'name',
		array(
			'filter'=>Entity::model()->typeOptions(),
			'header'=>'Type',
			'name'=>'typeId',
			'value'=>function($data) {
				echo $data->type->name;
			}
		),
		array(
			'class'=>'TbButtonColumn',
		),
	),
)); ?>
