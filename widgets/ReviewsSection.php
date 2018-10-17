<?php
namespace app\widgets;

use app\models\Settings;
use Yii;

class ReviewsSection extends \yii\bootstrap\Widget
{

    public $reviews = [];
    /**
     * {@inheritdoc}
     */
    public function run()
    {

        echo $this->render('reviews-section', [
            'reviews' => $this->reviews,
        ]);

    }
}
