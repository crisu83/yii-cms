<?php
/* @var $this EntityController */
/* @var $model Entity */
?>

<h1><?php echo 'Create '.$model->entityType->name; ?></h1>

<?php echo $model->buildForm()->render(); ?>