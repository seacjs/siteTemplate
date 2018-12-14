<?php

namespace app\controllers;

use app\models\Settings;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class FrontController extends Controller
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
    public function beforeAction($action)
    {

        /* SEO START*/
        // todo: check this
        $seo = \app\models\Seo::find()
            ->select(['slug','title','description','keywords','h1'])
            ->where(['slug' => 'main'])
            ->orWhere(['slug' => 'default'])
            ->one();

        $this->title = $seo->title;
        $this->registerMetaTag(['name' => 'keywords', 'content' => $seo->keywords], 'keywords');
        $this->registerMetaTag(['name' => 'description', 'content' => $seo->description], 'description');

        /* SEO END*/

        return parent::beforeAction($action);
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


}
