<?php
/* @var $this EntityController */
/* @var $model Entity */
/* @var $form TbForm */
?>

<h1><?php echo $model->type->getPrettyName().' '.$model->name; ?></h1>

<?php echo $form->render(); ?>