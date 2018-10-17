<?php
namespace app\widgets;

use app\models\Settings;
use Yii;

class DoctorsSection extends \yii\bootstrap\Widget
{

    public $doctors = [];
    public $title = 'Наши специалисты';

    /**
     * {@inheritdoc}
     */
    public function run()
    {

        echo $this->render('doctors-section', [
            'doctors' => $this->doctors,
            'title' => $this->title
        ]);

    }
}
