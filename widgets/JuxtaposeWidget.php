<?php

namespace app\widgets;

/**
 *  Yii2 widget juxtapose.js
 *
 *  Plugin link:
 *  https://github.com/NUKnightLab/juxtapose
 *
 * @property string $left_image
 * @property string $right_image
 * todo: other options from plugin
 * @author seacjs
 */
class JuxtaposeWidget extends \yii\bootstrap\Widget
{
    public $left_image = null;
    public $right_image = null;

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        if($this->left_image != null && $this->right_image != null) {
            echo $this->render('juxtapose-widget', [
                'left_image' => $this->left_image,
                'right_image' => $this->right_image,
            ]);
        }

    }
}
