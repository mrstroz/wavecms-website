<?php

namespace common\models\page;

use mrstroz\wavecms\page\models\query\PageItemQuery;
use yii\db\ActiveQuery;

/**
 * @inheritdoc
 */
class PageItemLang extends \mrstroz\wavecms\page\models\PageItemLang
{


    /**
     * @inheritdoc
     * @return array
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            // Behaviors
        ]);
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            // Rules
        ]);
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            // Labels
        ]);
    }

}