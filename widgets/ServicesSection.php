<?php
namespace app\widgets;

use app\models\Settings;
use Yii;

class ServicesSection extends \yii\bootstrap\Widget
{

    public $services = [];
    public $title = 'Услуги клиники';
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        echo $this->render('services-section', [
            'title' => $this->title,
            'services' => $this->services,
        ]);

    }
}
