<?php
/**
 * Created by PhpStorm.
 * User: seacjs
 * Date: 16.10.2018
 * Time: 16:34
 */

$image = ($image === null ? '/images/jumbo.png' : $image);

?>


<section class="section" id="jumbo" style="background: url(<?=$image?>) no-repeat center; background-size: cover;">

    <div class="container">
        <h1><?=$h1?></h1>
        <p class="description"><?=$description?></p>
        <a class="btn btn-main" href="#callbackwidget">Записаться</a>
    </div>

</section>
