<?php

namespace frontend\controllers;

use mrstroz\wavecms\metatags\components\helpers\MetaTags;
use mrstroz\wavecms\page\models\Page;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

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

}
