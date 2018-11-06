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

class DoctorController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index', [
            'doctors' => Doctor::find()->all(),
            'settings' => Settings::find()->one(),
            'sales' => Sales::find()->where(['status' => Sales::STATUS_ACTIVE])
                ->andWhere(['>=','date_at',time()])->all(),
        ]);
    }

    public function actionView($slug)
    {

        $doctor = $this->findModel($slug);
        return $this->render('view', [
            'doctor' => $doctor,
            'settings' => Settings::find()->one(),
            'prices' => Price::find()->where(['service_id' => $doctor->id])->orderBy('category_id')->all(),
        ]);
    }

    protected function findModel($slug)
    {
        $model = Doctor::find()
            ->where(['slug' => $slug])
            ->with('examples')
            ->with('services')
            ->with('reviews')
            ->one();
        if (($model) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


}