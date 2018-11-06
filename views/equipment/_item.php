<?php


?>

<div class="equipment-list-item">

    <div class="equipment-image-wrap">
        <?php if(isset($model->file)):?>
            <img src="<?=$model->file->thumbnail?>" class="equipment-image">
        <?php endif ?>
    </div>

    <div class="equipment-content">
        <div class="equipment-title"><?=$model->name?></div>
        <div class="equipment-text"><?=$model['content']?></div>
    </div>

    <div class="clearfix"></div>

</div>
<div class="clearfix"></div>