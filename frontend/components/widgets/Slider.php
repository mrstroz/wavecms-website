<?php

namespace frontend\components\widgets;

use yii\base\Widget;

class Slider extends Widget
{

    public $slider;

    public function run()
    {

        return $this->render('slider', [
            'slider' => $this->slider,
        ]);
    }
}