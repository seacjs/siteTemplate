<?php

namespace app\modules\admin\controllers;

use app\actions\FileDeleteAction;
use app\actions\FileSortAction;
use app\actions\FileUploadAction;
use app\actions\FileUploadCkeAction;
use app\actions\FindModelAction;

use app\models\Blog;
use app\models\File;
use app\modules\admin\models\search\BlogSearch;
use Yii;
//use app\modules\admin\models\search\BlogSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * NewsController implements the CRUD actions for News model.
 */
class BlogController extends FrontController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
//          TODO:: add access to only admins
//            'access' => [
//                'class' => AccessControl::class,
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'actions' => ['index','create','error','sort'],
//                        'roles' => ['admin','developer','superAdmin'],
//                    ],
//                ],
//            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'file-upload-cke' => [
                'class' => FileUploadCkeAction::class,
                'modelName' => Blog::class,
            ],
            'file-upload' => [
                'class' => FileUploadAction::class,
                'modelName' => Blog::class,
            ],
            'file-delete' => [
                'class' => FileDeleteAction::class,
                'modelName' => Blog::class,
            ],
            'file-sort' => [
                'class' => FileSortAction::class,
                'modelName' => Blog::class,
            ],
        ]);
    }


    /**
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blog model.
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
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Blog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blog();
        $model->scenario = $model::SCENARIO_CREATE;
        $model->status = $model::STATUS_DRAFT;
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
//        VarDumper::dump($model,10,1);die;

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
     * @return Blog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Searching files in content, when save it in new folder and as app\models\File
     *
     */
    protected function searchFilesInContent($content)
    {
        /*
            todo: Добавить событие afterSave() что бы эта штука работала после сохранения данных
            todo: и перенести это в бихавиор или в трейт

        */
    }
}
