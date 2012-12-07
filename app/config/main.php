<?php

// Define the base path for the bootstrap extension.
Yii::setPathOfAlias('bootstrap',__DIR__.'/../extensions/bootstrap');

// Define namespaces.
Yii::setPathOfAlias('cniska_yii_cms',__DIR__.'/..');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$config = array(
    'basePath'=>__DIR__.'/..',
    'name'=>'yii-cms',
    'theme'=>'bootstrap',

    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.components.*',
        'application.models.ar.*',
        'application.models.form.*',
    ),

    'modules'=>array(
        'cms',
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'1234',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
        ),
    ),

    // application components
    'components'=>array(
        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=yii_cms',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager'=>array(
            'showScriptName'=>false,
            'urlFormat'=>'path',
            'rules'=>array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'webmaster@example.com',
    ),
);

return file_exists(__DIR__.'/mainLocal.php') ? CMap::mergeArray($config, require(__DIR__ . '/mainLocal.php')) : $config;