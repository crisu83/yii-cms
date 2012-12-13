<?php
/* @var $this TypeController */
/* @var $model Type */
?>

<h1><?php echo 'Type '.$model->name; ?></h1>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
)); ?>