<?php





?>

<div class="example-item">
    <div class="row">

        <div class="col-md-5">
            <div class="example-item-image">
                <?php if((isset($model->files)) && (!empty($model->files) && (count($model->files) >= 2))):?>

                    <?php echo \app\widgets\JuxtaposeWidget::widget([
                        'left_image' => $model->files[0]->image,
                        'right_image' =>$model->files[count($model->files) - 1]->image ,
                    ]) ?>

                <?php endif?>
            </div>
        </div>

        <div class="col-md-7">
            <div class="example-item-text">
                <div class="example-item-description"><?=$model->description?></div>
                <a class="example-item-link" href="/example/<?=$model->slug?>">Подробнее о работе</a>
            </div>
        </div>

    </div>
</div>

