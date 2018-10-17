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
        if($this->settings != null) {
            echo $this->render('contacts-section', [
                'settings' => $this->settings,
            ]);
        }
    }
}
