<?php



?>

<div class="blog-list-item">

    <div class="blog-image-wrap">
        <?php if(isset($model->file)):?>
            <img src="<?=$model->file->thumbnail?>" class="blog-image">
        <?php endif ?>
    </div>

    <div class="blog-content">
        <div class="blog-date">
            <?php Yii::$app->formatter->locale = 'ru-RU';
                echo Yii::$app->formatter->asDate($model->created_at,'long');
            ?>
        </div>
        <div class="blog-title"><?=$model->name?></div>
        <div class="blog-text"><?=\yii\helpers\StringHelper::truncate(strip_tags($model['content']), 150, '...');?></div>
        <a href="/blog/<?=$model->slug?>" class="blog-more">Читать дальше</a>
    </div>

    <div class="clearfix"></div>

</div>
<div class="clearfix"></div>

