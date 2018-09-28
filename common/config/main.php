<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => 'your siteKey',
            'secret' => 'your secret key',
        ],
        'i18n' => [
            'translations' => [
                'admin*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/../messages',
                    'fileMap' => [
                        'admin' => 'admin.php',
                    ],
                ],
                'common*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/../messages',
                    'fileMap' => [
                        'common' => 'common.php',
                    ],
                ],
                'web*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                ],

            ],
        ],
    ],
];
