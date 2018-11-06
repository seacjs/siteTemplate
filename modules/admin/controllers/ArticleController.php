<?php

namespace app\modules\admin\controllers;

use app\actions\FileDeleteAction;
use app\actions\FileSortAction;
use app\actions\FileUploadAction;
use app\actions\FileUploadCkeAction;

use app\models\Article;
use app\modules\admin\models\search\ArticleSearch;

use app\models\File;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ArticleController extends FrontController
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
                'modelName' => Article::class,
            ],
            'file-upload' => [
                'class' => FileUploadAction::class,
                'modelName' => Article::class,
            ],
            'file-delete' => [
                'class' => FileDeleteAction::class,
                'modelName' => Article::class,
            ],
            'file-sort' => [
                'class' => FileSortAction::class,
                'modelName' => Article::class,
            ],
        ]);
    }


    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        $post = $request->post();
        if($request->isPost) {
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
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();
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
        $fileModel->multiple = false;
        $fileModel->files = $model->files;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

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
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $model = Article::findOne($id);
        if (($model) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
