<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css',
//        'css/animate.css',
//        'css/style/layout.css',
        /* components */
        'css/components/callout.css',

        /* style */
//        'css/style.css'
    ];

    public $js = [
//        'js/less-render.js',
//        'https://cdnjs.cloudflare.com/ajax/libs/less.js/2.6.1/less.min.js',
//        'js/jquery.maskedinput.min.js',
//        'js/layout.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
//        'app\assets\BootstrapAsset',
//        YII_DEBUG ? ['css/bootstrap.css'] : ['css/bootstrap.min.css']
    ];
}
