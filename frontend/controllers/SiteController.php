<?php

namespace frontend\controllers;

use mrstroz\wavecms\metatags\components\helpers\MetaTags;
use mrstroz\wavecms\news\models\News;
use mrstroz\wavecms\page\models\Page;
use Yii;
use yii\base\InvalidParamException;
use yii\data\ActiveDataProvider;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
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
     * Displays homepage.
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

    public function actionPage($link)
    {
        $page = Page::find()->getByLink($link)->one();

        MetaTags::register($page);

        return $this->render($page->template ?: 'page', [
            'page' => $page
        ]);
    }

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
