<?php

namespace app\widgets\assets;

use yii\web\AssetBundle;

class CallbackAsset extends AssetBundle
{
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
