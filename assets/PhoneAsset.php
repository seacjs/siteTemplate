<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PhoneAsset extends AssetBundle
{
    public $css = [
        'https://cdn.envybox.io/widget/cbk.css'
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];
    public $js = [
        'https://cdn.envybox.io/widget/cbk.js?wcb_code=8ca4430d4331708ad3f1b38690dc0c93',
    ];
}
