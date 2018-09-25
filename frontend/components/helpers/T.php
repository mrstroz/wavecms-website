<?php

namespace frontend\components\helpers;

use Yii;

class T
{

    /**
     * Get web translations
     * @param $text
     * @return string
     */
    public static function __($category,$text): string
    {
        return Yii::t($category, $text);
    }
}
