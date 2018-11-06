<?php

/* @var $title string */
/* @var $doctors array app\models\Doctor */

?>

<section class="section align-center">
    <div class="container">

        <?php if($title !== null):?>
        <h2><?=$title?></h2>
        <?php endif ?>

        <div class="row">
            <?php foreach($doctors as $i => $doctor):?>

                <div class="col-lg-3 col-md-6 col-sm-12">

                    <?=$this->render('@app/views/doctor/_basic-item',[
                        'model' => $doctor
                    ])?>

                    <div class="clearfix"></div>

                </div>

                <?php if((($i+1) % 4) === 0):?>
                    <div class="clearfix visible-lg"></div>
                <?php endif?>

                <?php if((($i+1) % 2) === 0):?>
                    <div class="clearfix visible-md"></div>
                <?php endif?>

            <?php endforeach;?>
        </div>

    </div>
</section>