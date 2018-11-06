<?php

namespace app\controllers;

use app\models\Blog;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BlogController extends Controller
{

    public function actionIndex()
    {

        $query = Blog::find()->where(['status' => Blog::STATUS_ACTIVE]);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'name' => SORT_ASC,
                ]
            ],
        ]);


        return $this->render('index', [
            'provider' => $provider
        ]);
    }

    public function actionView($slug)
    {

        $model = $this->findModel($slug);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    protected function findModel($slug)
    {
        $model = Blog::find()
            ->where(['slug' => $slug])
            ->one();
        if (($model) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
