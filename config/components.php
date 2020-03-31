<?php
declare(strict_types = 1);

// 组件配置
return [
    'request' => [
        'cookieValidationKey' => 'YXmv_c5tk1awxDAmrdv0PlZj9uClRPG_',
    ],
    'cache' => [
        'class' => 'yii\caching\FileCache',
    ],
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
];