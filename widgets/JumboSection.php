<?php
namespace app\widgets;

use app\models\Settings;
use Yii;

class JumboSection extends \yii\bootstrap\Widget
{

    public $image = null;
    public $h1 = 'Наша Стоматология';
    public $description = 'Установка брекетов Mini Diamond<br>13 500 руб.';

    /**
     * {@inheritdoc}
     */
    public function run()
    {

        echo $this->render('jumbo-section', [
            'image' => $this->image,
            'h1' => $this->h1,
            'description' => $this->description,
        ]);

    }
}
