<?php

namespace app\modules\admin;

use Yii;
use yii\filters\AccessControl;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            /* todo: this */
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


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Yii::$app->errorHandler->errorAction = 'admin/default/error';
        // custom initialization code goes here
    }
}
