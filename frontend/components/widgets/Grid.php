<?php

namespace frontend\components\widgets;

use yii\base\Widget;

class Grid extends Widget
{

    public $grid;

    public function run()
    {

        return $this->render('grid', [
            'grid' => $this->grid,
        ]);
    }
}