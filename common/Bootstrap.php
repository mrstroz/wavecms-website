<?php

namespace common;

use mrstroz\wavecms\page\models\Page;
use mrstroz\wavecms\page\models\PageItem;
use Yii;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{

    public function bootstrap($app)
    {

        Page::$templates['news'] = Yii::t('admin', 'News');
        Page::$templates['contact'] = Yii::t('admin', 'Contact');

        PageItem::$templates['blank'] = Yii::t('admin', 'Blank');
        PageItem::$templates['image_left'] = Yii::t('admin', 'Image left');
        PageItem::$templates['image_right'] = Yii::t('admin', 'Image right');

    }
}