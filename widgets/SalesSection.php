<?php
namespace app\widgets;

use app\models\Settings;
use Yii;

class SalesSection extends \yii\bootstrap\Widget
{

    public $sales= [];
    public $noMargin = false;
    /**
     * {@inheritdoc}
     */
    public function run()
    {

        echo $this->render('sales-section', [
            'sales' => $this->sales,
            'noMargin' => $this->noMargin,
        ]);

    }
}