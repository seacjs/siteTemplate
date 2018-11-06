<?php

namespace app\widgets\assets;

use omicronsoft\owlcarousel\OwlCarouselAsset;
use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class JuxtaposeCrutchAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdn.knightlab.com/libs/juxtapose/latest/css/juxtapose.css'
    ];
    public $js = [
        '/js/juxtapose.js',
//        'https://cdn.knightlab.com/libs/juxtapose/latest/js/juxtapose.min.js'
    ];

}
