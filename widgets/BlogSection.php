<?php
namespace app\widgets;

use app\models\Settings;
use Yii;

class BlogSection extends \yii\bootstrap\Widget
{

    public $blogs = [];
    public $title = 'Почитайте интересное из нашего блога';

    /**
     * {@inheritdoc}
     */
    public function run()
    {

        echo $this->render('blog-section', [
            'blogs' => $this->blogs,
            'title' => $this->title
        ]);

    }
}
