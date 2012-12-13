<?php
/* @var $this PropertyController */
/* @var $model Property */
?>

<h1><?php echo 'New property'; ?></h1>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
)); ?>