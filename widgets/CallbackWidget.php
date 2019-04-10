<?php
namespace app\widgets;

use app\models\forms\CallbackForm;
use Yii;

class CallbackWidget extends \yii\bootstrap\Widget
{

    /**
     * {@inheritdoc}
     */
    public $send = false;
    public $toggleButtonClass = 'btn btn-top';

    public function run()
    {

        $callbackModel = new CallbackForm();
        $post = Yii::$app->request->post();

        if($callbackModel->load($post) && $callbackModel->validate()) {
            if (!isset(Yii::$app->params['callback-form-send'])) {
                Yii::$app->params['callback-form-send'] = true;
                $this->send = true;
                $callbackModel->sendForm();
            } else {
                $callbackModel->setNull();
            }
        }

        echo $this->render('@app/views/widgets/callback', [
            'model' => $callbackModel,
            'send' => $this->send,
            'toggleButtonClass' => $this->toggleButtonClass
        ]);

    }
}
