<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

use mrstroz\wavecms\page\models\Page;

Page::$templates['news'] = Yii::t('admin', 'News');
Page::$templates['contact'] = Yii::t('admin', 'Contact');