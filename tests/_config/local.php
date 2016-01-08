<?php


return [
    'aliases' => [
        '@dmstr/modules/redirect' => '@vendor/dmstr/yii2-redirect-module',
        '@tests' => '@vendor/dmstr/yii2-redirect-module/tests'
    ],
    'components' => [
        'db' => [
            'tablePrefix' => '',
        ],
    ],
    'modules' => [
        'redirects' => [
            'class' => 'dmstr\modules\redirect\Module',
            'layout' => '@admin-views/layouts/main',
        ],
    ],
    'params' => [
        'yii.migrations' => [
            '@vendor/dmstr/yii2-redirect-module/migrations'
        ]
    ]
];