<?php

namespace common\models\page;


/**
 * Class PageSettings
 *
 * @inheritdoc
 */
class PageSettings extends \mrstroz\wavecms\page\models\PageSettings
{

    public function init()
    {
        parent::init();

        $this->setLanguageAttributes(array_merge($this->getLanguageAttributes(), []));
    }

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