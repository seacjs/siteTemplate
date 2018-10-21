<?php

/* @var $model app\models\Review */

?>
<div class="review-item">
    <h3 class="review-item-name"><?=$model->name?></h3>

    <div class="review-item-doctors">
        <span class="review-item-doctors-title"></span>
        <?php foreach($model->doctors as $doctor):?>
            <span class="review-item-doctor"><?=$doctor?></span>
        <?php endforeach ?>
    </div>

    <div class="review-item-content" style="">
        <div style="width: 100px;">
            <?=\app\widgets\JuxtaposeWidget::widget([
                'left_image' => 'https://pp.userapi.com/c629514/v629514735/2ff6f/nYtJrjpXs88.jpg?ava=1',
                'right_image' => 'https://pp.userapi.com/c629514/v629514735/2ff6f/nYtJrjpXs88.jpg?ava=1',
            ]);?>
        </div>
    </div>

    <div class="review-item-services">
        <span class="review-item-services-title"></span>
        <?php foreach($model->services as $service):?>
            <span class="review-item-service"><?=$service?></span>
        <?php endforeach ?>
    </div>
</div>