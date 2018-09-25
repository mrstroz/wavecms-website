<?php

namespace frontend\components\widgets;

use mrstroz\wavecms\page\models\Menu;
use yii\base\Widget;

class Header extends Widget
{

    public function run()
    {
        $menu = Menu::find()->getMenu('top')->all();

        return $this->render('header', [
            'menu' => $menu,
        ]);
    }
}