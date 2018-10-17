<?php

/* @var $model app\models\Doctor */

$work = (intval(date('Y')) - $model->start_working);


if(preg_match("|(1)$|",$work)) {
    $comment = 'год';
} elseif(preg_match("/(2|3|4)$/",$work)) {
    $comment = 'года';
} else {
    $comment = 'лет';
}

if(preg_match("/(1)[0-9]$/",$work)) {
    $comment = 'лет';
}

?>
<div class="doctor-basic">
    <div class="doctor-basic-img">
        <?php if(isset($model->file)):?>
            <img src="<?=$model->file->image?>">
        <?php endif?>
    </div>
    <div class="doctor-basic-name"><?=$model->name?></div>
    <div class="doctor-basic-description">
        <div class="doctor-basic-position"><?=$model->position?></div>
        <div class="doctor-basic-specialization"><?=$model->specialization?></div>
        <div class="doctor-basic-scientist"><?=$model->scientist?></div>
    </div>
    <div class="doctor-basic-start_working">Опыт работы <?= $work ?> <?=$comment?></div>
    <a href="" class="doctor-basic-button">страница врача</a>
</div>