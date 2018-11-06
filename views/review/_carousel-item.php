<?php

/* @var $model app\models\Review */


?>
<div class="review-item position-relative">
    <div class="review-item-date">
        <?php
        Yii::$app->formatter->locale = 'ru-RU';
        echo Yii::$app->formatter->asDate($model->created_at,'long');

        ?>
    </div>
    <h3 class="review-item-name"><?=$model->name?></h3>

    <div class="review-item-doctors">
        <span class="review-item-doctors-title">Врачи: </span>
        <?php foreach($model->doctors as $doctor):?>
            <span class="review-item-doctor"><?=$doctor->name?></span>
        <?php endforeach ?>
    </div>

    <div class="review-item-content" style="">
        <?=$model->content?>
    </div>

    <div class="review-item-services">
        <span class="review-item-services-title">Оказанные услуги</span>
        <?php foreach($model->services as $service):?>
            <span class="review-item-service"><?=$service->name?></span>
        <?php endforeach ?>
    </div>
</div>