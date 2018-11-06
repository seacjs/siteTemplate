<?php

namespace app\modules\admin\controllers;

use app\actions\FileDeleteAction;
use app\actions\FileSortAction;
use app\actions\FileUploadAction;
use app\actions\FileUploadCkeAction;

use app\models\Doctor;
use app\models\Example;
use app\models\Review;
use app\models\Service;
use app\modules\admin\models\search\ExampleSearch;
use app\models\File;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ExampleController extends FrontController
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


    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'file-upload-cke' => [
                'class' => FileUploadCkeAction::class,
                'modelName' => Example::class,
            ],
            'file-upload' => [
                'class' => FileUploadAction::class,
                'modelName' => Example::class,
            ],
            'file-delete' => [
                'class' => FileDeleteAction::class,
                'modelName' => Example::class,
            ],
            'file-sort' => [
                'class' => FileSortAction::class,
                'modelName' => Example::class,
            ],
        ]);
    }


    /**
     * Lists all Example models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExampleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Example model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        $post = $request->post();
        if($request->isPost && isset($post['ids'])) {
            foreach($post['ids'] as $key => $postId) {
                $file = File::findOne(['id' => $postId]);
                if($file !== null) {
                    $file->alt = $post['alts'][$key];
                    $file->title = $post['titles'][$key];
                    $file->save();
                }
            }
            $this->findModel($id)->trigger('beforeContent');
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Example model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Example();
        $model->scenario = $model::SCENARIO_CREATE;
        $model->status = $model::STATUS_DRAFT;
        $model->name = 'no-name';
        $model->save();
        return $this->redirect(['update', 'id' => $model->id]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $fileModel = new File();
        $fileModel->multiple = true;
        $fileModel->files = $model->files;
        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->save()) {

            if(isset($post['Example']['doctors'])) {
                $model->processLinks(Doctor::class, 'doctors', $post['Example']['doctors']);
            }
            if(isset($post['Example']['services'])) {
                $model->processLinks(Service::class, 'services', $post['Example']['services']);
            }
            if(isset($post['Example']['reviews'])) {
                $model->processLinks(Review::class, 'reviews', $post['Example']['reviews']);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'fileModel' => $fileModel,
        ]);
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Example the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $model = Example::findOne($id);
        if (($model) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}