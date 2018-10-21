<?php

/* @var $model app\models\Service */


$imageStyle = isset($model->file) ? 'background: url('.$model->file->image.') no-repeat left top; background-size: 100px;' : '';

?>

<a href="/service/<?=$model->slug?>">
    <div class="service-basic-item">
        <div class="service-basic-item-image" style="<?=$imageStyle?>">
            <div class="service-basic-item-title"><?=$model->name?></div>
            <div class="service-basic-item-description"><?=$model->short_content?></div>
        </div>
    </div>
</a>
