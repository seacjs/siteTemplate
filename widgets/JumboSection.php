<?php
namespace app\widgets;

use app\models\Settings;
use Yii;

class JumboSection extends \yii\bootstrap\Widget
{

    /**
     * {@inheritdoc}
     */
    public function run()
    {

        echo $this->render('jumbo-section');

    }
}
