<?php
namespace app\widgets;

use app\models\Interior;

class InteriorSection extends \yii\bootstrap\Widget
{

    public $images = [];
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        if(empty($this->images)) {
            $model = Interior::find()->one();
            $this->images = $model->files;
        }

        echo $this->render('interior-section', [
            'images' => $this->images,
        ]);

    }
}
