<?php
/* @var $this EntityController */
/* @var $model Entity */
/* @var $dataProvider CArrayDataProvider */
?>

<h1><?php echo $model->getPrettyName(); ?> <small><?php echo $model->entityType->name; ?></small></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'type'=>'striped',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'hideHeader'=>true,
    'columns'=>array(
        'property',
        'value',
    ),
)); ?>