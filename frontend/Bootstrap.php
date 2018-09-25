<?php

namespace frontend;

use mrstroz\wavecms\page\models\Page;
use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     * @throws \yii\base\InvalidConfigException
     */
    public function bootstrap($app)
    {
        Yii::$app->urlManager->parseRequest(Yii::$app->request);
        $modelPage = Yii::createObject(Page::class);
        $pages = $modelPage::find()->select(['link'])->byAllCriteria()->byType(['text'])->column();

        if ($pages) {
            Yii::$app->getUrlManager()->addRules([
                '<link:(' . implode('|', $pages) . ')>' => 'site/page'
            ]);
        }

    }
}