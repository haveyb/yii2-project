<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$redis = require __DIR__ . '/redis.php';
//$queue = require __DIR__ . '/queue.php';
$modules = require __DIR__ . '/modules.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => $modules,
    'components' => [
        'request' => [
            'cookieValidationKey' => 'YXmv_c5tk1awxDAmrdv0PlZj9uClRPG_',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => $db,
//        'queue' => $queue,
//        'redis' => $redis,
//        'user' => [
//            'identityClass' => 'app\models\User', // User must implement the IdentityInterface
//            'enableAutoLogin' => true,
//            // 'loginUrl' => ['user/login'],
//            // ...
//        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        // 支持 PathInfo
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '',
            'rules' => [
            ],
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
