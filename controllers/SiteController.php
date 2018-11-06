<?php

namespace app\controllers;

use app\models\Blog;
use app\models\Doctor;
use app\models\Example;
use app\models\Price;
use app\models\Review;
use app\models\Sales;
use app\models\Service;
use app\models\Settings;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'blogs' => Blog::find()->where(['status' => Blog::STATUS_ACTIVE])->limit(3)->all(),
            'settings' =>  Settings::find()->one(),
            'reviews' => Review::find()->where(['status' => Review::STATUS_ACTIVE])->all(),
            'services' => Service::find()->where(['status' => Service::STATUS_ACTIVE])->andWhere([
                'parent_id' => null
            ])->all(),
            'doctors' => Doctor::find()->where(['status' => Doctor::STATUS_ACTIVE])->all(),
            'sales' => Sales::find()->where(['status' => Sales::STATUS_ACTIVE])
                ->andWhere(['>=','date_at',time()])->all(),
            'examples' => Example::find()->where(['status' => Review::STATUS_ACTIVE])->all(),
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays prices page.
     *
     * @return string
     */
    public function actionPrices()
    {
        $services = Service::find()
            ->where(['service.status' => Service::STATUS_ACTIVE])
            ->andWhere(['service.parent_id' => null])
            ->joinwith('prices')
            ->orderBy(['price.category_id' => SORT_ASC])
            ->all();

        return $this->render('prices',[
            'services' => $services,
            'settings' => Settings::find()->one(),
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about',[
            'settings' => Settings::find()->one(),
        ]);
    }

    public function actionContacts()
    {
        return $this->render('contacts',[
            'settings' => Settings::find()->one(),
        ]);
    }

    public function actionSales()
    {
        return $this->render('sales',[
            'sales' => Sales::find()->where(['status' => Sales::STATUS_ACTIVE])->all(),
            'settings' => Settings::find()->one(),
        ]);
    }
}
