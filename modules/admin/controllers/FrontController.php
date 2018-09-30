<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class FrontController extends Controller
{

    public $layout = 'main';
    public $enableCsrfValidation = true;

    /**
     * @inheritdoc
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
     * Displays Error page.
     *
     * @return string
     */
    public function actionError()
    {
        return $this->render('error');
    }


}
