<?php

?>


<div class="blog-basic-item">
    <div class="blog-image-wrap">
        <?php if(isset($model->file)):?>
            <img src="<?=$model->file->thumbnail?>" class="blog-image">
        <?php endif ?>
    </div>
    <div class="blog-title"><a href="/blog/<?=$model->slug?>"><?=$model->name?></a></div>
    <div class="blog-text"><?=\yii\helpers\StringHelper::truncate(strip_tags($model['content']), 150, '...');?></div>
</div>
