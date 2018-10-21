<?php
/* @var $model app\models\Sales */

?>


<div class="sales-card">
    <div class="sales-image">
        <?php if(isset($model->file)):?>
            <img src="<?=$model->file->image?>">
        <?php endif?>
    </div>
    <div class="sales-date">
        <img src="/images/watch.png" class="sales-watch"><?=$model->date?>
    </div>
    <div class="sales-name"><?=$model->name?></div>
</div>
