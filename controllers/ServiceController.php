<?php

namespace app\controllers;

use app\models\Doctor;
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
use yii\web\NotFoundHttpException;

class ServiceController extends Controller
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

    public function actionIndex()
    {
        return $this->render('index', [
            'services' => Service::find()->all(),
            'settings' => Settings::find()->one(),
        ]);
    }

    public function actionView($slug)
    {

        $service = $this->findModel($slug);
        return $this->render('view', [
            'service' => $service,
            'settings' => Settings::find()->one(),
            'prices' => Price::find()->where(['service_id' => $service->id])->orderBy('category_id')->all(),
        ]);
    }

    protected function findModel($slug)
    {
        $model = Service::find()
            ->where(['slug' => $slug])
            ->with('examples')
            ->with('doctors')
            ->with('reviews')
            ->one();
        if (($model) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


}
