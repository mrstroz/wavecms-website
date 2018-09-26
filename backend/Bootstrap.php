<?php

namespace backend;

use mrstroz\wavecms\components\helpers\FontAwesome;
use mrstroz\wavecms\page\models\Page;
use Yii;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{

    public function bootstrap($app)
    {

        // USAGE EXAMPLE - Adding menu items to admin panel

//        Yii::$app->params['nav']['offer'] = [
//            'label' => FontAwesome::icon('leaf') . Yii::t('admin', 'Offer'),
//            'url' => 'javascript: ;',
//            'options' => [
//                'class' => 'drop-down'
//            ],
//            'permission' => 'offer',
//            'position' => 2000,
//            'items' => [
//                [
//                    'label' => FontAwesome::icon('ellipsis-h') . Yii::t('admin', 'Series'),
//                    'url' => ['/offer/series/index']
//                ],
//                [
//                    'label' => FontAwesome::icon('ellipsis-h') . Yii::t('admin', 'Products'),
//                    'url' => ['/offer/product/index']
//                ],
//
//            ]
//        ];


//        Yii::$app->params['nav']['extra'] = [
//            'label' => FontAwesome::icon('user') . Yii::t('admin', 'Extra'),
//            'url' => ['/extra/extra/index'],
//            'permission' => 'extra',
//            'position' => 8999,
//
//        ];


    }
}