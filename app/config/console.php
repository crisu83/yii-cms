<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
$config = array(
	'basePath'=>__DIR__.'/..',
	'name'=>'yii-cms console',

	// preloading 'log' component
	'preload'=>array('log'),

    'commandMap'=>array(
        'migrate'=>array(
            'migrationTable'=>'migration',
        ),
    ),

	// application components
	'components'=>array(
		'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=yii_cms',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
);

return file_exists(__DIR__.'/consoleLocal.php') ? CMap::mergeArray($config, require(__DIR__ . '/consoleLocal.php')) : $config;