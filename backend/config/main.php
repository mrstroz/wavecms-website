<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => [
        'log',
        'backend\Bootstrap'
    ],
    'modules' => [
        'wavecms' => [
            'class' => 'mrstroz\wavecms\Module',
            'languages' => ['en', 'pl'],
            /*
             * Override classes
            'classMap' => [
                'User' => \common\models\User::class
            ]
            */
        ],
        'wavecms-page' => [
            'class' => 'mrstroz\wavecms\page\Module',
            /*
             * Override classes
            'classMap' => [
                'Page' => 'common\models\Page',
            ]
            */
        ],
        'wavecms-news' => [
            'class' => 'mrstroz\wavecms\news\Module',
            /*
             * Override classes
            'classMap' => [
                'News' => 'common\models\News',
            ]
            */
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'mrstroz\wavecms\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'view' => [
            'theme' => [
                'basePath' => '@app/themes/admin',
                'baseUrl' => '@web/themes/admin',
                'pathMap' => [
                    '@wavecms/views' => '@app/themes/admin/wavecms',
                    '@wavecms_page/views' => '@app/themes/admin/wavecms-page',
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['@'],
            'disabledCommands' => ['netmount'],
            'roots' => [
                [
                    'baseUrl' => '@frontWeb',
                    'basePath' => '@frontWebroot',
                    'path' => 'userfiles',
                    'name' => 'Files'
                ]
            ]
        ]
    ],
    'params' => $params,
];
