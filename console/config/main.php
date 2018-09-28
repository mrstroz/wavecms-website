<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'modules' => [
        'wavecms' => [
            'class' => 'mrstroz\wavecms\Module'
        ],
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
        ],
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => [
                '@app/migrations',
                '@yii/rbac/migrations/',
                '@yii/i18n/migrations/',
                '@vendor/mrstroz/yii2-wavecms/migrations/',
                '@vendor/yii2mod/yii2-settings/migrations/',
                '@vendor/mrstroz/yii2-wavecms-page/migrations',
                '@vendor/mrstroz/yii2-wavecms-metatags/migrations',
                '@vendor/mrstroz/yii2-wavecms-news/migrations',
                '@vendor/mrstroz/yii2-wavecms-form/migrations'
            ],
        ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
];
