<?php

namespace app\controllers;

use app\models\Article;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class EquipmentController extends Controller
{

    public function actionIndex()
    {

        $query = Article::find()->where(['status' => Article::STATUS_ACTIVE]);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 100,
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
        $model = Article::find()
            ->where(['slug' => $slug])
            ->one();
        if (($model) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
