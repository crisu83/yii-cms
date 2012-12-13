<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet/less" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/less/styles.less" />

    <?php Yii::app()->bootstrap->registerYiiCss(); ?>
    <?php Yii::app()->bootstrap->registerCoreScripts(); ?>

	<?php Yii::app()->less->registerJsCompiler(); ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Contact', 'url'=>array('/site/contact')),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
            ),
        ),
		array(
			'class'=>'bootstrap.widgets.TbMenu',
			'htmlOptions'=>array('class'=>'pull-right'),
			'items'=>array(
				array('label'=>'Administration', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
					array('label'=>'Entities', 'url'=>array('/entity/admin')),
					array('label'=>'Types', 'url'=>array('/type/admin')),
					array('label'=>'Properties', 'url'=>array('/property/admin')),
					'---',
					array('icon'=>'off', 'label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				)),
			),
		),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<hr>

	<div id="footer">
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
