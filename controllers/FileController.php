<?php
/* todo: delete this controller after edit actions */
namespace app\controllers;

use Yii;
use yii\helpers\VarDumper;
use yii\web\Response;
use app\models\File;
use yii\helpers\ArrayHelper;

class FileController extends \yii\web\Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            /* todo: this when ready auth part */

//            'access' => [
//                'class' => AccessControl::class,
//                'denyCallback' => function($rule, $action) {
//                    return Yii::$app->response->redirect('/admin/default/login');
//                },
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'actions' => ['login'],
//                        'roles' => ['?']
//                    ],
//                    [
//                        'allow' => true,
//                        'actions' => ['logout'],
//                        'roles' => ['@']
//                    ],
//                    [
//                        'allow' => true,
//                        'roles' => ['admin','superAdmin','developer'],
//                    ]
//                ],
//            ],

        ];
    }

    public function actionUpload()
    {
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost) {
            $className = $post['model'];
            $model = $className::findOne($post['component_id']);

            if($post['multiple'] == 'true') {
                $uploadModel = false;
            } else {
                $uploadModel = $model;
            }

            $fileModel = new File();
            $uploadedFiles = $fileModel->upload($uploadModel);

            foreach($uploadedFiles as $key=> $uploadedFile) {
                $uploadedFile->component = $post['component'];
                $uploadedFile->component_id = $post['component_id'];
                $uploadedFile->sort = count($model->files) + $key;
                $uploadedFile->save();
            }

            return json_encode([
                'initialPreview' => \app\models\File::initialPreview($uploadedFiles),
                'initialPreviewConfig' => \app\models\File::initialPreviewConfig($uploadedFiles)
            ]);

        }
        return json_encode(false);

    }

    /* todo: add beghvior to access user to delete file */
    public function actionDelete($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        File::findOne($id)->detach(true);
        return json_encode(true);
    }

    public function actionSort($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $post = Yii::$app->request->post('sort');
        $model = Yii::$app->request->post('model');

        $files = File::find()->where([
            'component' => $model
        ])->andWhere(['component_id' => $id])
            ->andWhere([
                ($post['oldIndex'] > $post['newIndex'] ? '>=' : '<='),
                'sort',
                $post['newIndex']
            ])
            ->andWhere([
                ($post['oldIndex'] > $post['newIndex'] ? '<' : '>'),
                'sort',
                $post['oldIndex']
            ])
            ->orderBy(['sort' =>  ($post['oldIndex'] > $post['newIndex'] ? SORT_ASC : SORT_DESC)])->all();

        $currentfile = File::find()
            ->where(['sort' => $post['oldIndex']])
            ->andWhere(['component_id' => $id])
            ->andWhere(['component' => $model])
            ->one();
        $currentfile->sort = $post['newIndex'];
//        return json_encode($id);
        $currentfile->save();

        foreach($files as $file) {
            $file->sort = $file->sort + ($post['oldIndex'] > $post['newIndex'] ? 1 : -1);
            $file->save();
        }

        return json_encode(true);
    }

}
