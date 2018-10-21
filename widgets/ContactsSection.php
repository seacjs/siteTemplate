<?php
namespace app\widgets;

use app\models\Settings;
use Yii;

class ContactsSection extends \yii\bootstrap\Widget
{

    public $settings = null;
    /**
     * {@inheritdoc}
     */
    public function run()
    {

        \Yii::$app->params['settings'] = \app\models\Settings::find()->one();

        if($this->settings != null) {
            echo $this->render('contacts-section', [
                'settings' => \Yii::$app->params['settings'],
            ]);
        }
    }
}
