<?php

namespace app\controllers;

use app\components\CityRequest;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Session;

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

        $session = new Session();
        $sessionCity = $session->get('city', false);

        if($sessionCity) {
            $session->set('city', \Yii::$app->params['city']);
        } else {
            /* ip */
            $geo = new \jisoft\sypexgeo\Sypexgeo();
            $geo->get();                // also returned geo data as array

//            $ipCity = City::find()->where([
//                'name' => $geo->city
//            ])->andWhere([
//                'active' => 1
//            ])->one();
//
//            if($ipCity == null) {
//
//                $city = City::find()->one();
//
//            } else {
//                $city = $ipCity;
//            }

             $city = [
                 'id' => 1,
                 'slug' => 'spb',
                 'name' => 'Piter',
             ];

//            \Yii::$app->params['city'] = $city['slug'];
            // \yii\helpers\VarDumper::dump($city, 10, true);
//            \yii\helpers\VarDumper::dump($city['slug'], 10, true);
//            \yii\helpers\VarDumper::dump(\Yii::$app->params['city'], 10, true);
//            \yii\helpers\VarDumper::dump(Url::to(['/'.\Yii::$app->request->pathInfo]), 10, true);
//            echo $geo->ip, '<br>';
//            echo $geo->ipAsLong, '<br>';
//            \yii\helpers\VarDumper::dump($geo->country, 10, true);
//            echo '<br>';
//            \yii\helpers\VarDumper::dump($geo->region, 10, true);
//            echo '<br>';
//            \yii\helpers\VarDumper::dump($geo->city, 10, true);
//            echo '<hr>';

//             \yii\helpers\VarDumper::dump(\Yii::$app->request->pathInfo, 10, true);

//            die;

            Yii::$app->params['city'] = $city['slug'];
            $session->set('city', $city['slug']);
            $this->redirect(Url::to(['/'.\Yii::$app->request->pathInfo]));
        }
//        $currentCity = City::find()->where([
//            'slug' => $session->get('city')
//        ])->andWhere([
//            'active' => 1
//        ])->one();
        $currentCity = [
            'id' => 1,
            'slug' => 'spb',
            'name' => 'Piter',
        ];
        $this->_removeCityFromUrl();

//        VarDumper::dump(,10,1);



//        if($currentCity == null) {
//            $city = City::find()->one();
//            \Yii::$app->params['city'] = $city['slug'];
//            $session->set('city', $city['slug']);
//            $this->redirect(Url::to(['/'.\Yii::$app->request->pathInfo]));
//        }

        return parent::beforeAction($action);

    }

    protected function _removeCityFromUrl() {
//        $currentPath = $this->resolvePathInfo();

        $currentPath = (new CityRequest())->getUrl();
        $newPath = false;
        foreach($this->_getCitiesList() as $city) {
            $strPos = strpos($currentPath, '/'.$city);
            if($strPos !== false && $strPos === 0) {
                $newPath = str_replace('/'.$city,'',$currentPath);
                $session = new Session();
                $session->set('city', $city);
                break;
            }

        }
        if($newPath != false && $currentPath != $newPath) {
            return $this->redirect($newPath);
        }
    }
    protected function _getCitiesList() {
        return [
            'spb',
            'msk'
        ];
    }

    public function beforeActionSeo($action)
    {

        /* SEO START*/
        // todo: check this
//        $seo = \app\models\Seo::find()
//            ->select(['slug','title','description','keywords','h1'])
//            ->where(['slug' => 'main'])
//            ->orWhere(['slug' => 'default'])
//            ->one();
//
//        $this->title = $seo->title;
//        $this->registerMetaTag(['name' => 'keywords', 'content' => $seo->keywords], 'keywords');
//        $this->registerMetaTag(['name' => 'description', 'content' => $seo->description], 'description');

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
