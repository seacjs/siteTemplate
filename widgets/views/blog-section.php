<?php

/* @var $title string */
/* @var $doctors array app\models\Blog */

?>

<section class="section align-center">
    <div class="container">

        <h2><?=$title?></h2>

        <div class="row">
            <?php foreach($blogs as $model):?>

                <div class="col-lg-4 col-md-6 col-sm-12">

                    <?=$this->render('@app/views/blog/_basic-item',[
                        'model' => $model
                    ])?>

                    <div class="clearfix"></div>

                </div>

            <?php endforeach;?>
        </div>

    </div>
</section>