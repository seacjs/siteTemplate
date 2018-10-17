<?php

/* @var $title string */
/* @var $doctors array app\models\Doctor */

?>

<section class="section align-center">
    <div class="container">

        <h2><?=$title?></h2>

        <div class="row">
            <?php foreach($doctors as $doctor):?>

                <div class="col-lg-3 col-md-6 col-sm-12">

                    <?=$this->render('@app/views/doctor/_basic-item',[
                        'model' => $doctor
                    ])?>

                </div>

            <?php endforeach;?>
        </div>

    </div>
</section>