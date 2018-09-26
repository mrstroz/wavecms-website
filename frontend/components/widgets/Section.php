<?php

namespace frontend\components\widgets;

use yii\base\Widget;

class Section extends Widget
{

    public $section;

    public function run()
    {

        return $this->render('section', [
            'section' => $this->section,
        ]);
    }
}