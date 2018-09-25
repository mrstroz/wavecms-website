<?php

namespace frontend\components\widgets;

use mrstroz\wavecms\page\models\Menu;
use yii\base\Widget;

class Footer extends Widget
{

    public function run()
    {
        $menu = Menu::find()->getMenu('bottom')->all();

        return $this->render('footer', [
            'menu' => $menu,
        ]);
    }
}