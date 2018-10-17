<?php
namespace app\widgets;



class InteriorSection extends \yii\bootstrap\Widget
{

    /**
     * {@inheritdoc}
     */
    public function run()
    {

        echo $this->render('interior-section');
    }
}
