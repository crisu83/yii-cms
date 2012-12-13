<?php
/* @var $this PropertyController */
/* @var $model Property */
?>

<h1><?php echo 'Property '.$model->name; ?></h1>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
)); ?>