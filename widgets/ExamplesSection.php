<?php
namespace app\widgets;

use app\models\Settings;
use Yii;

class ExamplesSection extends \yii\bootstrap\Widget
{

    public $examples= [];
    /**
     * {@inheritdoc}
     */
    public function run()
    {

        echo $this->render('examples-section', [
            'examples' => $this->examples,
        ]);

    }
}
