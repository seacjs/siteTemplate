<?php

namespace app\controllers;

use app\models\Review;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ReviewController extends Controller
{

    public function actionIndex()
    {

        $query = Review::find()->where(['status' => Review::STATUS_ACTIVE]);

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
        $model = Review::find()
            ->where(['slug' => $slug])
            ->one();
        if (($model) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
