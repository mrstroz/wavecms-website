<?php

namespace common\models\page;

/**
 * @inheritdoc
 */
class PageItem extends \mrstroz\wavecms\page\models\PageItem
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