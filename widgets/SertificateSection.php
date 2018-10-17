<?php
namespace app\widgets;


class SertificateSection extends \yii\bootstrap\Widget
{

    public $sertificates = [];
    /**
     * {@inheritdoc}
     */
    public function run()
    {

        echo $this->render('sertificates-section', [
            'sertificates' => $this->sertificates,
        ]);

    }
}
