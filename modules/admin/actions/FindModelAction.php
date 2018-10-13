<?php

namespace app\actions;

use Yii;
use yii\base\Action;
use app\models\File;
use yii\base\InvalidConfigException;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;

/**
 * Action for delete files
 *
 * For example:
 *
 * ```php
 * public function actions()
 * {
 *    return [
 *       'sort' => [
 *          'class' => FileModelAction::class,
 *          'modelName' => Model::class,
 *       ],
 *   ];
 * }
 * ```
 *
 * @author seacjs
 */
class FindModelAction extends Action
{
    public $modelName;

    protected function run($id)
    {
        $modelName = $this->modelName;
        if (($model = $modelName::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}