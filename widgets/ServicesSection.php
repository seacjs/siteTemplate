<?php
namespace app\widgets;

use app\models\Settings;
use Yii;

class ServicesSection extends \yii\bootstrap\Widget
{

    public $services = [];
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        echo $this->render('services-section', [
            'services' => $this->services,
        ]);

    }
}
