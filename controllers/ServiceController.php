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
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class ServiceController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index', [
            'services' => Service::find()->where([
                'parent_id' => null
            ])->andWhere([
                'status' => Service::STATUS_ACTIVE
            ])->all(),
            'settings' => Settings::find()->one(),
        ]);
    }

    public function actionView($slug, $childslug = null, $childslug2 = null,$childslug3 = null)
    {

        $parents = [];
        if($childslug != null) {
            $parents[] = $this->findModel($slug);
            if($childslug2 != null) {
                $parents[] = $this->findModel($childslug);
                if($childslug3 != null) {
                    $parents[] = $this->findModel($childslug2);
                    $service = $this->findModel($childslug3);
                } else {
                    $service = $this->findModel($childslug2);
                }
            } else {
                $service = $this->findModel($childslug);
            }
        } else {
            $service = $this->findModel($slug);
        }

        $ids = [];
        $ids[] = $service->id;
        $ids = ArrayHelper::merge($ids, $service->getChildrenIds());

        return $this->render('view', [
            'parents' => $parents,
            'service' => $service,
            'settings' => Settings::find()->one(),
            'prices' => Price::find()->where(['in','service_id', $ids])->orderBy('category_id')->all(),
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
