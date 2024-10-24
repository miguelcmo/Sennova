<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-sennovalab',
    'name' => 'SennovaLab',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'appSennovalab\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-app-sennovalab',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-app-sennovalab', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-app-sennovalab',
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
        'urlManager' => [
            'enablePrettyUrl' => false,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        // componente agregado para envio de emails
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mail',
            'useFileTransport' => false, // Establece esto en false para enviar correos de verdad
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp-relay.brevo.com',  // El host del servidor SMTP
                'username' => '7c7fdb001@smtp-brevo.com',
                'password' => '60wRxhH3kSPj8Dav',
                'port' => '587', // El puerto del servidor SMTP
                'encryption' => 'tls', // Utiliza 'tls' o 'ssl'
            ],
        ],
    ],
    'params' => $params,
];
