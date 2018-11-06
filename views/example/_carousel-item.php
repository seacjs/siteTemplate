<?php

/* @var $model app\models\Example */

$showArrows = isset($showArrows) && $showArrows !== false ? true : false;

?>

<div class="example-item">
    <div class="row">

        <div class="col-md-5">
            <div class="example-item-image">
                <?php if((isset($model->files)) && (!empty($model->files) && (count($model->files) >= 2))):?>

                    <?php echo \app\widgets\JuxtaposeWidget::widget([
                        'left_image' => $model->files[0]->thumbnail,
                        'right_image' =>$model->files[count($model->files) - 1]->thumbnail ,
                    ]) ?>

                <?php endif?>
            </div>
        </div>

        <div class="col-md-7 position-relative">
            <div class="example-item-text">
                <div class="example-item-description"><?=$model->description?></div>
                <a class="example-item-link" href="/example/<?=$model->slug?>">Подробнее о работе</a>

<!--                --><?php //if($showArrows):?>
                    <div class="example-arrows">
                        <div class="review-carousel-arrow-left"></div>
                        <div class="review-carousel-arrow-right"></div>
                    </div>
<!--                --><?php //endif?>

            </div>
        </div>

    </div>
</div>

