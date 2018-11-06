<?php

if(
    (Yii::$app->controller->id == 'site') &&
    (Yii::$app->controller->action->id == 'index')
) {
    \app\widgets\assets\JuxtaposeCrutchAsset::register($this);
} else {
    \app\widgets\assets\JuxtaposeAsset::register($this);
}

?>

<div class="juxtapose" data-showlabels="false" data-showcredits="false">
    <img src="<?php echo $left_image?>" />
    <img src="<?php echo $right_image?>" />
</div>

<!--<style>-->
<!--    .jx-knightlab {display: none !important;}-->
<!--    .juxtapose img {width: 400px !important;}-->
<!--</style>-->