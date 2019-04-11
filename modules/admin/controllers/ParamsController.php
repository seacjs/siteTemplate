<?php

namespace app\modules\admin\controllers;

use app\actions\FileDeleteAction;
use app\actions\FileSortAction;
use app\actions\FileUploadAction;
use app\actions\FileUploadCkeAction;

use app\models\Settings;
use app\modules\admin\models\search\SettingsSearch;

use app\models\File;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ParamsController extends FrontController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ]);
    }

    public $defaultAction = 'update';

    public function actionUpdate()
    {

        $params = require_once (Yii::$app->getAlias('@app').'config/params.php');

        $post = Yii::$app->request->post();

        if (Yii::$app->request->isPost) {

            file_put_contents(Yii::$app->getAlias('@app').'config/params.php');

        }

        return $this->render('update', [
            'params' => $params,
        ]);
    }
}
