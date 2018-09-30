<?php
/**
 * @param $this \yii\web\View
 */

use yii\bootstrap\Html;

$this->registerCssFile('/css/carousel-doctor-item.css');

?>

<div class="carouser-doctor-item">

    <div class="col-sm-12">
        <div class="doctor-wrap">
            <div class="doctor-img"><?=$doctor['image']?></div>
            <div class="doctor-title"><?=$doctor['title']?></div>
            <div class="doctor-desc"><?=$doctor['description']?></div>
            <div class="doctor-work"><?=$doctor['work']?></div>
            <div class="doctor-button"></div>
        </div>
    </div>

</div>


