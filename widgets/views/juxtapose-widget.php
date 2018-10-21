<?php

use app\widgets\assets\JuxtaposeAsset;
JuxtaposeAsset::register($this);

?>

<div class="juxtapose" data-showlabels="false" data-showcredits="false">
    <img src="<?php echo $left_image?>" />
    <img src="<?php echo $right_image?>" />
</div>

<style>
    .jx-knightlab {display: none !important;}
    .juxtapose img{width: auto !important;}
</style>