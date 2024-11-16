<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'appServiserAdmin',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'appServiserAdmin\controllers',
    'timeZone' => 'America/Bogota',
    // set source language to be English
    'sourceLanguage' => 'en-US',
    // set target language to be Russian
    'language' => 'es-CO',
    'bootstrap' => ['log'],
    'modules' => [
        'calendar' => [
            'class' => 'appServiserAdmin\modules\calendar\Module',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
            // 'downloadAction' => 'gridview/export/download' // Opcional: habilita la exportación de datos si la necesitas
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-appServiserAdmin',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-appServiserAdmin', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-appServiserAdmin',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        // This is needed to map the theme files for the design
        // https://www.yiiframework.com/extension/hail812/yii2-adminlte3
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views',
                    '@vendor/hail812/yii2-adminlte3/src/views'
                ],
            ],
        ],
        // Internationalization
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'defaultTimeZone' => 'America/Bogota', // Cambia esto a tu zona horaria
        ],
        'activityLogger' => [
            'class' => 'common\components\ActivityLogger',
        ],
    ],
    'params' => $params,
];
