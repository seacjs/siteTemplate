<?php

namespace app\modules\admin\controllers;

use app\models\Category;
use app\models\DynamicDiscount;
use app\models\File;
use app\models\Invoices;
use app\models\Product;
use app\models\Spendings;
use app\models\Subcategory;
use app\models\User;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\imagine\Image;


/**
 * Default controller for the `admin` module
 */
class DefaultController extends FrontController
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }


    /**
     * Change User password.
     *
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionChangePassword()
    {
        $id = Yii::$app->user->id;

        try {
            $model = new \app\models\ChangePasswordForm($id);
        } catch (InvalidParamException $e) {
            throw new \yii\web\BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->changePassword()) {
            Yii::$app->session->setFlash('success', 'Password Changed!');
        }

        return $this->render('change-password', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/admin');
        }

        $model = new \app\modules\admin\models\LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin');
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

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

    /**
     * Displays Error page.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('/admin');
    }


}
