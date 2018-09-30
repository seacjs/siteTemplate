<?php
/**
 * @param $this \yii\web\View
 */

use yii\bootstrap\Html;

$this->registerCssFile('/css/carousel-doctor-item.css');

?>

<div class="carouser-review-item">

    <div class="col-sm-12">

        <div class="review-header">

            <div class="review-wrap">
                <div class="review-img"><?=$review['image']?></div>
                <div class="review-name"><?=$review['name']?></div>
                <div class="review-text"><?=$review['text']?></div>
            </div>

        </div>
        <div class="review-body"></div>

    </div>

</div>