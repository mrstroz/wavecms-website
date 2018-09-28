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

        $pages = $modelPage::find()->select(['link'])
            ->andWhere(['<>', 'template', 'news'])
            ->andWhere(['<>', 'template', 'contact'])
            ->byAllCriteria()->byType(['text'])->column();
        if ($pages) {
            Yii::$app->getUrlManager()->addRules([
                '<link:(' . implode('|', $pages) . ')>' => 'site/page'
            ]);
        }

        $news = $modelPage::find()->select(['link'])->andWhere(['=', 'template', 'news'])->byAllCriteria()->byType(['text'])->column();
        if ($news) {
            Yii::$app->getUrlManager()->addRules([
                '<link:(' . implode('|', $news) . ')>' => 'site/news',
                '<link:(' . implode('|', $news) . ')>/<news_link>' => 'site/news-detail'
            ]);
        }

        $contact = $modelPage::find()->select(['link'])->andWhere(['=', 'template', 'contact'])->byAllCriteria()->byType(['text'])->column();
        if ($contact) {
            Yii::$app->getUrlManager()->addRules([
                '<link:(' . implode('|', $contact) . ')>' => 'site/contact',
            ]);
        }

    }
}