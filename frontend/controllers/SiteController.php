<?php

namespace frontend\controllers;

use mrstroz\wavecms\form\models\Form;
use mrstroz\wavecms\form\models\FormSettings;
use mrstroz\wavecms\metatags\components\helpers\MetaTags;
use mrstroz\wavecms\news\models\News;
use common\models\page\Page;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Home page
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $page = Page::find()->byType('home')->one();

        MetaTags::register($page);

        return $this->render('index', [
            'page' => $page
        ]);
    }

    /**
     * Simple text page
     *
     * @param $link
     * @return mixed
     */
    public function actionPage($link)
    {
        $page = Page::find()->getByLink($link)->one();
        MetaTags::register($page);

        return $this->render($page->template ?: 'page', [
            'page' => $page
        ]);
    }

    /**
     * Contact page with form
     *
     * @param $link
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     */
    public function actionContact($link)
    {
        $page = Page::find()->getByLink($link)->one();
        MetaTags::register($page);

        $model = new Form();
        $model->scenario = Form::SCENARIO_WEB;
        $formSettings = false;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();

            $formSettings = FormSettings::find()->getSettings('contact')->one();
            $formSettings->replaceTags($model);
            $formSettings->replaceExtraTag('tag', 'value');

            if ($formSettings->send_email) {
                Yii::$app->mailer->compose()
                    ->setSubject($formSettings->subject)
                    ->setFrom([$formSettings->from_email => $formSettings->from_name])
                    ->setHtmlBody($formSettings->text)
                    ->setTo(explode(',', $formSettings->recipient))
                    ->send();
            }

            if ($formSettings->user_send_email) {
                Yii::$app->mailer->compose()
                    ->setSubject($formSettings->user_subject)
                    ->setFrom([$formSettings->user_from_email => $formSettings->user_from_name])
                    ->setHtmlBody($formSettings->user_text)
                    ->setTo($model->email)
                    ->send();
            }
        }

        return $this->render('contact', [
            'page' => $page,
            'model' => $model,
            'formSettings' => $formSettings
        ]);
    }

    /**
     * News grid page
     *
     * @param $link
     * @return mixed
     */
    public function actionNews($link)
    {
        $page = Page::find()->getByLink($link)->one();
        MetaTags::register($page);

        $dataProvider = new ActiveDataProvider([
            'query' => News::find()->byAllCriteria()->byType('news')
        ]);

        $dataProvider->sort->defaultOrder = ['create_date' => SORT_DESC];
        $dataProvider->pagination->pageSize = 9;
        $dataProvider->pagination->validatePage = false;

        return $this->render('news', [
            'page' => $page,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * News detail page
     *
     * @param $link
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionNewsDetail($link, $news_link)
    {
        $page = Page::find()->getByLink($link)->one();

        $news = News::find()->getByLink($news_link)->one();

        if (!$news) {
            throw new NotFoundHttpException();
        }

        MetaTags::register($news);

        return $this->render('news-detail', [
            'page' => $page,
            'news' => $news
        ]);
    }

}
