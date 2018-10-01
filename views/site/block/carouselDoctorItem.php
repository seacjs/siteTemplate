<?php
/**
 * @param $this \yii\web\View
 */

use yii\bootstrap\Html;


?>

<div class="carouser-doctor-item">

    <div class="col-sm-12">
        <div class="doctor-wrap">
            <div class="doctor-img"><img src="/images/doctor.png"></div>
            <div class="doctor-title"><?=$doctor['title']?></div>
            <div class="doctor-desc"><?=$doctor['description']?></div>
            <div class="doctor-work"><?=$doctor['work']?></div>
            <div class="doctor-button">Записаться к этому врачу</div>
        </div>
    </div>

</div>


