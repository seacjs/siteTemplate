<?php
namespace app\widgets;


use app\models\Sertificate;

class SertificateSection extends \yii\bootstrap\Widget
{

    public $images = [];
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        if(empty($this->images)) {
            $model = Sertificate::find()->one();
            $this->images = $model->files;
        }

        echo $this->render('sertificates-section', [
            'images' => $this->images,
        ]);

    }
}
