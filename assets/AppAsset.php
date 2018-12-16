<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        /* fonts */
//        'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic',
//        'https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=cyrillic',
//        'https://fonts.googleapis.com/css?family=PT+Sans|PT+Sans+Caption|PT+Sans+Narrow|PT+Serif|Ubuntu',
//        'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext',
//        'https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i',

        /* CDN css*/
        'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css',

        /* components */
        'css/components/callout.css',

        /* style */
//        'css/components/color.less',
        'css/style.css'
    ];



    public $js = [
//        'js/less-render.js',
//        'https://cdnjs.cloudflare.com/ajax/libs/less.js/2.6.1/less.min.js',
//        'js/jquery.maskedinput.min.js',
        'js/layout.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
//        'app\assets\BootstrapAsset',
//        YII_DEBUG ? ['css/bootstrap.css'] : ['css/bootstrap.min.css']
    ];
}
